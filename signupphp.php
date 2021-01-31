<?php
$conn = mysqli_connect("localhost", "root", "", "miniproject");
if (!$conn) {
    die('Could not Connect MySql Server:' . mysqli_error($conn));
}


$name = $_POST['name'];
$contactno = $_POST['contactno'];
$emailid = $_POST['emailid'];
$passw = $_POST['passw'];

$sql1 = "SELECT MAX(user_id) FROM maintable";
if (mysqli_query($conn, $sql)) {
    $row0 = $result0->fetch_assoc();
	$user_id = $row0["MAX(user_id)"];
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
}

$user_id++;
echo 'result is'. $result1;
$sql = "INSERT INTO maintable (user_id,name,email_id,contact_no,password)
     VALUES ('$user_id','$name','$emailid','$contactno','$passw')";

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