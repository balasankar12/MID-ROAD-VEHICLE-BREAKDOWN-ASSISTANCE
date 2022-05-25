<?php
session_start();
$errors = array();
if (isset($_POST['loginuser'])) {
    include('connection.php');
    $mailid = mysqli_real_escape_string($conn, $_POST['uemail']);
    $password = mysqli_real_escape_string($conn, $_POST['upassword']);
    $sql1 = "select user_id,name,password,mail_id,number from user_details where mail_id='$mailid' and password='$password'";

    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['userid'] = $row['user_id'];
        $_SESSION['username'] = $row['name'];
        $_SESSION['num'] = $row['number'];
        $_SESSION['pwd'] = $password;
        $_SESSION['mailid'] = $row['mail_id'];
        header("location: userhome.php");
    }
    else {
        header('Location: userindex.php?userlogin=false');
    }
}
?>