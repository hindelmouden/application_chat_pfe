<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
include_once "php/config.php";
session_start();
$id = $_SESSION['unique_id'];
$sql1 = " SELECT msg FROM messages WHERE incoming_msg_id ='$id' || outgoing_msg_id='$id'";
            $req=mysqli_query ($conn,$sql1) or die ('Erreur SQL !'.$sql1.'<br />'.mysqli_error($conn));
?>
<html>
              <head>
              <meta charset="utf-8" />
              <title>Delete messages</title>
              <link rel="stylesheet" type="text/css" href="style.css">
              </head>
              <body>
			  <div class="wrapper">
                       <section class="form login">
					  
              <form method="POST" action="supprimer_messages.php?action=6"><center>
              
              <h3>This action will delete all messages you have sent</h3>
			  <?php while($d=mysqli_fetch_assoc($req)){ ?>
			  <input type="hidden" name="idd" value="<?php echo $d['msg_id']; ?>" />
              <br><input type="checkbox" name="delete" /><?php echo $d['msg']; ?>
			  <?php } ?>
              <br><div class="field button"><a href="login.php"><h1>Back<h1></a></div>
			  
              <div class="field button"><input type="submit" value="Delete !" /></div>
              </center></form>
              </body>
              </html>
			  
			  
			  
			  <?php 
			   //include_once "php/config.php";
			  //session_start();
			  
			 if(isset($_GET['action']) && $_GET['action'] == 6) {


				//$id = $_SESSION['unique_id'];

           //$sql = " DELETE FROM messages WHERE outgoing_msg_id='$id'";
           $sql = " DELETE FROM messages WHERE msg_id=".$_POST['idd'];;
            mysqli_query ($conn,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($conn));
			
          echo 'Your messages have been successfully deleted. <br /><a href="login.php"><h1>Back<h1></a>';

}
          
          
		  
		  ?>