<?php
$conn = mysqli_connect("localhost:3307", "root", "", "miniproject");
if (!$conn) {
    die('Could not Connect MySql Server:' . mysqli_error($conn));
}
session_start();
if (isset($_POST['emailid'])) {
    $emailid = stripslashes($_REQUEST['emailid']);
    $password = stripslashes($_REQUEST['password']);

    // $sql = "INSERT INTO StudentLogin(emailid,password)
    // VALUES ('$emailid','$password')";

    $query = "SELECT * FROM maintable WHERE email_id='$emailid'
               AND password='$password'";

    // if (mysqli_query($conn, $sql)) {
    //  echo "New record has been added successfully !";
    //  header("Location: http://localhost/TNP/student.html");
    //  exit();
    // }
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        $_SESSION['emailid'] = $emailid;
        // Redirect to user student page
        header("Location:home_login.html");
    } else {
        echo " <script>
        alert('Username or Password Invalid .!');
        location = 'login.html';
        </script>";
    }
    mysqli_close($conn);
}
