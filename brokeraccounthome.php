<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    * {
        box-sizing: border-box;
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

    table {
        margin: 0 auto;
        font-size: large;
        border: 1px solid black;
    }

    h1 {
        text-align: center;
        color: #17a2b8;
        ;
        font-size: xx-large;
        font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
    }

    td {
        background-color: #E4F5D4;
        border: 1px solid black;
    }

    th,
    td {
        font-weight: bold;
        border: 1px solid black;
        padding: 10px;
        text-align: center;
    }

    td {
        font-weight: lighter;
    }

    .btn-dark {
        background-color: #17a2b8;
        border: #17a2b8;
        font-size: large;
    }

    .btn-dark:hover {
        background-color: #0141BD;
        border: #0141BD;
    }

    .btn-dark:focus {
        background-color: #17a2b8;
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
                    <button class="btn"><a href="brokerlogin.html" class="nav-item nav-link">Broker</a></button>
                    <button class="btn"><a href="property_services.html" class="nav-item nav-link">Services</a></button>
                    <button class="btn"><a href="about_us.html" class="nav-item nav-link">About Us</a></button>
                    <button class="btn"><a href="Home.html" class="nav-item nav-link">Logout</a></button>
                </div>

            </div>
        </div>
    </nav>

    <?php
		$conn = mysqli_connect("localhost", "root", "", "miniproject");
        // Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
        }

        
if (isset($_POST['button1'])) {
$sql15 = "DELETE FROM property where property_id = 9001";
if (mysqli_query($conn, $sql15)) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record:" . $conn->error;
  }
}
    
    if(isset($_POST['button2'])){
        $sql16 = "Call update_cust()";
        if (mysqli_query($conn, $sql16)) {
            echo "Connection established successfully!";
          } else {
            echo "Error deleting record: " . $conn->error;
          }
    }
    
    if(isset($_POST['button3'])){
        $sql17 = "UPDATE property set cust_id = NULL where property_id = $propertyID1";
        if (mysqli_query($conn, $sql17)) {
            echo "Cancel the booking";
          } else {
            echo "Error deleting record: " . $conn->error;
          }
    }//if isset
    ?>

</html>
</form>
</body>

</html>

<?php 
  
// Username is root 
$user = 'root'; 
$password = '';  
$database = 'miniproject';   
$servername='localhost'; 
$mysqli = new mysqli($servername, $user,  
                $password, $database); 
  
// Checking for connections 
if ($mysqli->connect_error) { 
    die('Connect Error (' .  
    $mysqli->connect_errno . ') '.  
    $mysqli->connect_error); 
} 

  
// SQL query to select data from database 
$sql20 = "SELECT * FROM property"; 
$result20 = $mysqli->query($sql20); 

$sql21 = "SELECT * FROM registration"; 
$result21 = $mysqli->query($sql21); 

$sql22 = "SELECT * FROM property"; 
$result22 = $mysqli->query($sql22); 
$mysqli->close(); 


?>


<body>
    <section>


        <h1 style="padding-top: 100px">Property Table</h1>

        <div style="text-align: center">
            <form name="form" method="post" style="margin : auto">
                <div style="padding: 10px">
                    <input type="submit" name="button2" value="Make Connection" class="btn-dark" />

                </div>

            </form>
        </div>
        <!-- TABLE CONSTRUCTION-->
        <table>
            <tr>
                <th>Property ID</th>
                <th>Location</th>
                <th>Established Date</th>
                <th>Owner ID</th>
                <th>Customer ID</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA  
                while($rows=$result20->fetch_assoc()) 
                { 
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH  
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['property_id'];?></td>
                <td><?php echo $rows['location'];?></td>
                <td><?php echo $rows['established_date'];?></td>
                <td><?php echo $rows['owner_id'];?></td>
                <td><?php echo $rows['cust_id'];?></td>
            </tr>
            <?php 
                } 
             ?>
        </table>
    </section>

    <br>
    <br>
    <br>
    <section>
        <div style="text-align: center">
            <form name="form" method="post" style="margin : auto" action="brokeraccounthome.php">
                <div style="margin:20px">
                    <input type="submit" name="button3" value="Cancel Booking" class="btn-dark" />
                    <input type="text" name="property_id1">
                    <?php $propertyID1 = $_POST['property_id1']; ?>
                </div>

                <div style="margin:20px">
                    <input type="submit" name="button1" value="Confirm Resgitration" class="btn-dark" />
                    <input type="text" name="property_id2">
                    <?php $propertyID2 = $_POST['property_id2']; ?>
                </div>

            </form>
        </div>

        <h1>Registration</h1>
        <!-- TABLE CONSTRUCTION-->
        <table>
            <tr>
                <th>Registration ID</th>
                <th>Date of Deal</th>
                <th>Owner ID</th>
                <th>Property ID</th>
                <th>Customer ID</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA  
                while($rows=$result21->fetch_assoc()) 
                { 
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH  
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['registration_id'];?></td>
                <td><?php echo $rows['date_of_deal'];?></td>
                <td><?php echo $rows['owner_id'];?></td>
                <td><?php echo $rows['property_id'];?></td>
                <td><?php echo $rows['cust_id'];?></td>
            </tr>
            <?php 
                } 
             ?>
        </table>
    </section>
</body>

</html>