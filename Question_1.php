<?php
  session_start();

  include "conn.php";

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $sql = "SELECT * FROM users WHERE User_email = '".$email."' and User_password = '".$password."'";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result)<=0)
    {
    echo "<script>alert('Wrong email / password ! Please Try Again!');";
    die("window.history.go(-1);</script>");
  }

  if($row=mysqli_fetch_array($result))
  {
    $_SESSION['email'] = $row['User_email'];
    $_SESSION['pass'] = $row['User_password'];
    $_SESSION['role'] = $row['User_role'];
  }
    echo "<script>alert('Welcome back! ".$_SESSION['email']."');";
    echo "window.location.href='Question_1m.php';</script>";

 ?>
