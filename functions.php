<?php
function delete_msg() {
  require_once "../config.php";
  $time_out = time()-900;
  $recup_message = $conn->prepare('SELECT * FROM messages WHERE timestamp < :time');
  $recup_message->execute(array(
  'time' => $time_out
  ));
  while ($message = $recup_message->fetch()) {
      $query_1 = $conn->prepare('INSERT INTO ancien_message (message, pseudo) VALUES (:message, :pseudo)');
      $query_1->execute(array(
      'message' => $message['message_text'],
      'pseudo' => $message['pseudo'],
      ));
      }
  $query = $bdd->prepare("DELETE FROM chat_messages WHERE timestamp < :time");
  $query->execute(array(
      'time' => $time_out
      ));
      }

      ?>