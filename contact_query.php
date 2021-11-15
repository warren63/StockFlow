<?php
session_start();
include ('db.php');
 
if(isset($_POST['send_message'])) {
 
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$message = $_POST['message'];

 
$query_trapper = $conn->prepare('SELECT * FROM tbl_contact WHERE email = ?');
$query_trapper->execute(array($email));
$trapper = $query_trapper->rowCount();
  
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$insert_query = "INSERT INTO tbl_contact (full_name, email, message)
VALUES (?, ?, ?)";
 
$insert = $conn->prepare($insert_query);
$insert->execute(array($full_name, $email, $message));
 
echo "<script>alert('Successfully send your message!'); window.location='index.php'</script>";

}
?>