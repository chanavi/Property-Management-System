<?php
		$conn = mysqli_connect("localhost", "root", "", "miniproject");
        // Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
        }
        if(isset($_POST['submit'])){

        $sql15 = "DELETE * FROM property where property_id = 9007";
				//$result15= $conn->query($sql15);
                // $row15 = $result15->fetch_assoc();
                
    if(mysqli_connect($conn,$sql15))            
    {
        echo " <script>

        alert('Account Generated. Please LogIn.');

        location = 'brokeraccounthome.php';

        </script>";

        //echo "New record has been added successfully !";

        // header("Location: login.html");
        exit();
    }​​ 
    // else {
    //     echo "Error:" . $sql15 . ":-" . mysqli_error($conn);
    // }

    mysqli_close($conn);
        }
    ?>