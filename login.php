<?php
$mailPhone= $_POST['usr'];
$password= $_POST['pass'];
$pMailErr = $pwdErr = "";

// Required field
if(isset($_POST['Login'])){
    if(empty($mailPhone)){
        $pMailErr= "Phone or mail required";
        echo $pMailErr . "<br>";
    }
    else{
        $mailPhone= test_input($mailPhone);
    }
    if(empty($password)){
        $pwdErr= "Password required"; 
        echo $pwdErr . "<br><br><br>";
        echo"<a href='index.html'> Back to Login Page</a>";       
    }
    else{
        $password= test_input($password);
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
