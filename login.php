<?php
$mailPhone = $_POST['usr'];
$password = $_POST['pass'];
$pMailErr = $pwdErr = "";

// Required field
if (isset($_POST['Login'])) {
    if (empty($mailPhone)) {
        $pMailErr = "Phone or Email required";
        echo $pMailErr . "<br>";
    } else {
        $mailPhone = test_input($mailPhone);
        if (!filter_var($mailPhone, FILTER_VALIDATE_EMAIL)) {
            $pMailErr = "Invalid Email format";
            echo $pMailErr . "<br><br>";
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
            echo "<a href='index.html'> Back to Login Page</a>";;
        }
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>