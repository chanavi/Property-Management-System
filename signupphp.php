<?php
$conn = mysqli_connect("localhost", "root", "", "miniproject");
if (!$conn) {
    die('Could not Connect MySql Server:' . mysqli_error($conn));
}

$name = $_POST['name'];
$contactno = $_POST['contactno'];
$emailid = $_POST['emailid'];
$passw = $_POST['passw'];


$sql="Select MAX(user_id) from maintable";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$ID=$row['MAX(user_id)'];
$ID++;

$sql = "INSERT INTO maintable (user_id,name,contact_no,email_id,password)
     VALUES ('$ID','$name','$contactno','$emailid','$passw')";

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