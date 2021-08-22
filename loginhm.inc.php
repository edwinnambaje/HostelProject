<?php
if (isset($_POST['login'])) {

  require 'config.inc.php';

  $username = $_POST['username'];
  $password = $_POST['password'];

  if (empty($username) || empty($password)) {
    echo"<script>alert('Input All Fields');window.location='loginhostel.php'</script>";
    exit();
  }
  else {
    $sql = "SELECT * FROM admins WHERE Username = '$username' AND password='$password'";
    $result = mysqli_query($db, $sql);
    if($row = mysqli_fetch_assoc($result)){
      $passwordCheck =true;
      if($passwordCheck == false){
        echo"<script>alert('Incorrect Password');window.location='loginhostel.php'</script>";
        exit();
      }
      else {
          echo"<script>window.location='homeadmin.php'</script>";
          exit();
        }
        }
    }
}
