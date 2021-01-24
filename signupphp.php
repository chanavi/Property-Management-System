<?php
$conn = mysqli_connect("localhost:3307", "root", "", "miniproject");
if (!$conn) {
    die('Could not Connect MySql Server:' . mysqli_error($conn));
}


$name = $_POST['name'];
$contactno = $_POST['contactno'];
$emailid = $_POST['emailid'];
$passw = $_POST['passw'];

$sql = "INSERT INTO maintable (name,contact_no,email_id,password)
     VALUES ('$name','$contactno','$emailid','$passw')";

if (mysqli_query($conn, $sql)) {
    echo "<script>
        alert('Account Generated. Please LogIn.');
        location = 'Login.html';
        </script>";
    //echo "New record has been added successfully !";
    // header("Location: login.html");
    exit();
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
}
mysqli_close($conn);
