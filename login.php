<?php
$mailPhone = $_POST['usr'];
$password = $_POST['pass'];
$count = 0;
$pMailErr =  $pwdErr = "";

// Required field and Data validation
if (isset($_POST['Login'])) {
    if (empty($mailPhone)) {
        $pMailErr = "Phone or Email required";
        echo $pMailErr . "<br>";
    } else {
        $mailPhone = test_input($mailPhone);
        if (!filter_var($mailPhone, FILTER_VALIDATE_EMAIL)) {
            $pMailErr = "Invalid Email format";
            echo $pMailErr . "<br><br>";
            $count = $count + 1;
        }
    }
    if (empty($password)) {
        $pwdErr = "Password required";
        echo $pwdErr . "<br><br><br>";
        echo "<a href='index.html'> Back to Login Page</a>";
    } else {
        $password = test_input($password);
        if (!preg_match('/^(?=.*[0-9])(?=.*[A-Z]).{8,20}$/', $password)) {
            $pwdErr = "Password Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters";
            echo $pwdErr . "<br><br><br>";
            echo "<a href='index.html'> Back to Login Page</a>";
            $count = $count + 1;
        }
    }
}
//Function for data sanitization
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// Login Data validation with respect to database
if ($count == 0) {
    $db =   mysqli_connect('localhost', 'root', '', 'userlogindata');
    if ($db) {

        $sql = "select EmailPhone, pass from loginrecord WHERE EmailPhone='" . $mailPhone . "' and  pass='" . $password . "'";
        $res = mysqli_query($db, $sql);
        if ($res->num_rows == 1) {
            echo "<script>window.location.href='index.html';</script>";
        } else {
            echo "<script>alert('You have entered Wrong Cridentials')</script>";
            echo "<script>window.location.href='index.html';</script>";
        }
    } else {
        die("Connection failed: " . mysqli_connect_error());
    }
}

?>