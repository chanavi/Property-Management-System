<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Arapey&family=Josefin+Slab:wght@500&family=Neucha&family=Raleway:wght@500;600&display=swap"
        rel="stylesheet">
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    * {
        box-sizing: border-box;
    }


    * {
        font-family: "Raleway", Arial, Helvetica, sans-serif;
    }

    /* Button used to open the contact form - fixed at the bottom of the page */
    .open-button {
        background-color: #555;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        /* position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;*/
    }


    .form-popup {
        display: none;
        /*position: fixed;
  bottom: 0;
  right: 15px;*/
        border: 3px solid #f1f1f1;
        z-index: 9;
    }


    .form-container {
        max-width: 300px;
        padding: 10px;
        background-color: white;
    }

    /*
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}


.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}*/

    /* Set a style for the submit/login button */
    .form-container .btn {
        background-color: #4CAF50;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom: 10px;
        opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
        background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover,
    .open-button:hover {
        opacity: 1;
    }
    </style>
    <title>Broker</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark  bg-info fixed-top">
        <a class="navbar-brand" href="#">Property Mangement System</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#expandme">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="expandme">

            <div class="navbar-nav">
                <div class="btn-group">
                    <button class="btn"><a href="home_login.html" class="nav-item nav-link">Home</a></button>
                    <button class="btn"><a href="buy.php" class="nav-item nav-link">Buy</a></button>
                    <button class="btn"><a href="sellrent.html" class="nav-item nav-link">Sell</a></button>
                    <button class="btn"><a href="buy.php" class="nav-item nav-link">Rent In</a></button>
                    <button class="btn"><a href="sellrent.html" class="nav-item nav-link">Rent Out</a></button>
                    <button class="btn"><a href="broker.html" class="nav-item nav-link">Broker</a></button>
                    <button class="btn"><a href="property_services.html" class="nav-item nav-link">Services</a></button>
                    <button class="btn"><a href="about_us.html" class="nav-item nav-link">About Us</a></button>
                    <button class="btn"><a href="Home.html" class="nav-item nav-link">Logout</a></button>
                </div>

            </div>
        </div>
    </nav>

    <table border=1>
        <!-- <tr>
			<th>Student ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Branch</th>
			<th>E-mail</th>
			<th>Contact No.</th> 
		</tr> -->
        <tr>

            <?php
		$conn = mysqli_connect("localhost", "root", "", "miniproject");
// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		session_start();
    	if(!isset($_SESSION["emailid"])) {
      		header("Location: AdminLogin.php");
      		exit();
    	}
		$admin = $_SESSION['emailid']; 
		echo $admin;
		$sql0 = "SELECT * FROM broker WHERE email_id = '$admin'";
		$result0 = $conn->query($sql0);
	if ($result0->num_rows > 0) {
			$row0 = $result0->fetch_assoc();
			$broker_id = $row0["broker_id"];
			$sql4 = "SELECT * FROM prop_owner where broker_id = '$broker_id' ";
				$result4 = $conn->query($sql4);
			//$row4 = 1;
// output data of each row
			while($row4 = $result4->fetch_assoc()) {
				echo "<td>";
				echo "<table>";
				
				$ownerid = $row4["owner_id"];

				$sql2 = "SELECT * FROM property where owner_id = '$ownerid' ";
				$result2 = $conn->query($sql2);
				$row2 = $result2->fetch_assoc();
				$pro = $row2["property_id"];

				$sql = "SELECT * FROM residential_property where property_id = $pro";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();

				$sql5 = "SELECT * FROM commercial_property where property_id = $pro";
				$result5 = $conn->query($sql5);
				$row5 = $result5->fetch_assoc();
					
				$sql1 = "SELECT * FROM customer where broker_id = $broker_id ";
				$result1 = $conn->query($sql1);
				$row1 = $result1->fetch_assoc();

				$sql6 = "SELECT * FROM seller where owner_id = $ownerid ";
				$result6 = $conn->query($sql6);
				$row6 = $result6->fetch_assoc();
				
				$sql7 = "SELECT * FROM landlord where owner_id = $ownerid ";
				$result7 = $conn->query($sql7);
				$row7 = $result7->fetch_assoc();

				$sql8 = "SELECT * FROM buyer where broker_id = $broker_id ";
				$result8 = $conn->query($sql8);
				$row8 = $result8->fetch_assoc();
				
				$sql9 = "SELECT * FROM tenant where broker_id = $broker_id ";
				$result9 = $conn->query($sql9);
				$row9 = $result9->fetch_assoc();


			if ($result->num_rows > 0) {
				echo '<tr><td> OwnerID : ' . $row4["owner_id"]. '</td></tr><tr><td> Owner Name : ' . $row4["owner_name"] . '</td></tr><tr><td> Owner EMail Id : '
				. $row4["email_id"]. '</td></tr><tr><td> CustomerID : ' . $row1["cust_id"]. '</td></tr><tr><td> Customer Name ' . $row1["cust_name"]. '</td></tr>
				<tr><td> Customer EMail Id : '.$row1["email_id"].'</td></tr>
				<tr><td> Property ID : ' .$row2["property_id"].'</td></tr>
				<tr><td> House No. : ' . $row["house_no"] . '</td></tr><tr><td> House Name : '
				. $row["house_name"]. '</td></tr><tr><td> BHK : ' . $row["bhk"]. '</td></tr><tr><td> Rate Per SQFT : ' . $row["rate_per_sqft"].' </td></tr>
				<tr><td> Expected Price by Seller : ' .$row6["expected_price"].'</td></tr>
				<tr><td> Expected/Maximum Price by Buyer : ' .$row8["max_price"].'</td></tr>
				<tr><td> Expected Rent by Landlord : ' .$row7["expected_rent"].'</td></tr>
				<tr><td> Expected/Maximum Price by Tenant : ' .$row9["max_rent"].'</td></tr>';
				echo "</table>";
				echo "</td>";

			}

			if($result5->num_rows > 0){
				echo '<tr><td> OwnerID : ' . $row4["owner_id"]. '</td></tr><tr><td> Owner Name : ' . $row4["owner_name"] . '</td></tr><tr><td> Owner EMail Id : '
				. $row4["email_id"]. '</td></tr><tr><td> CustomerID : ' . $row1["cust_id"]. '</td></tr><tr><td> Customer Name ' . $row1["cust_name"]. '</td></tr>
				<tr><td> Customer EMail Id : '.$row1["email_id"].'</td></tr>
				<tr><td> Property ID : ' .$row2["property_id"].'</td></tr>
				<tr><td> House No. : ' . $row5["shop_no"] . '</td></tr><tr><td> Building Name : '
				. $row5["building_name"]. '</td></tr><tr><td> Rate Per SQFT : ' . $row5["rate_per_sqft"]. '</td></tr>
				<tr><td> Expected Price by Seller : ' .$row6["expected_price"].'</td></tr>
				<tr><td> Expected/Maximum Price by Buyer : ' .$row8["max_price"].'</td></tr>
				<tr><td> Expected Rent by Landlord : ' .$row7["expected_rent"].'</td></tr>
				<tr><td> Expected/Maximum Price by Tenant : ' .$row9["max_rent"].'</td></tr>';
				echo "</table>";
				echo "</td>";
	
			}
			echo "</table>";
		}
		 else { echo "0 results"; }
		
		$conn->close();
		?>

        </tr>
    </table>
</body>

</html>