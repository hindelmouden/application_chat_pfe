<?php

require '../config.php';
session_start();
// $id=$_SESSION['unique_id'];
// $sql = "SELECT * FROM `users` where unique_id ='$id' ";
// $result1=mysqli_query($conn,$sql);

// $result = mysqli_fetch_assoc($result1);

// $_SESSION['user_id'] = $result['user_id'];
if ( isset($_SESSION['unique_id'])) {


$id = $_SESSION['unique_id'];

$sql = "DELETE FROM `users` WHERE unique_id='$id'";
mysqli_query ($conn,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($conn));
session_destroy();

     include("../../index.php");
} 


?>