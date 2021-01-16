
<?php
$servername = 'localhost';
$username = 'root';
$password = 'root';
$dbname = "miniproject";
$conn = mysqli_connect($servername, $username, $password, "$dbname");
if (!$conn) {
    die('Could not Connect MySql Server:' . mysqli_error());
}

if (isset($_POST['submit'])) {
    $ownerName = $_POST['ownername'];
    $ownerID = $_POST['userid'];
    $ownerEmail = $_POST['email'];
    $ownerContact = $_POST['num'];
    $propertyID = $_POST['proid'];
    $location = $_POST['location'];
    $established_year = $_POST['edate'];
    $amenities = $_POST['amme'];
    $close_by_service = $_POST['cbs'];
    $rate_per_sqft = $_POST['rps'];
    $PropertyType = $_POST['typeofproperty'];
    $expectedPrice = $_POST['exp'];
    $brokerID = $_POST['brokers'];
    $zip = $_POST['zip'];
    $BHK = $_POST['bhk'];
    $building_name = $_POST['building_name'];
    $Carpet_Area = $_POST['Carpet_Area'];
    $res_house_name = $_POST['res_house_name'];
    $res_house_no = $_POST['res_house_no'];
    $com_shop_no = $_POST['com_shop_no'];
    $res_address = $_POST['res_address'];
    $com_address = $_POST['com_address'];
    $counter = 0;

    $sq3 = "INSERT INTO prop_owner(owner_id,owner_name,email_id,broker_id)
      VALUES ('$ownerid','$name','$email','$brokerid')";
    if (mysqli_query($conn, $sq3)) {
        // echo "New record has been added successfully !";
        $counter = $counter + 1;
    } else {
        echo "Error: " . $sq3 . ":-" . mysqli_error($conn);
    }

    $sq2 = "INSERT INTO owner_contact(owner_id,owner_contact_no)
      VALUES ('$ownerid','$contact')";
    if (mysqli_query($conn, $sq2)) {
        // echo "New record has been added successfully !";
        $counter = $counter + 1;
    } else {
        echo "Error: " . $sq2 . ":-" . mysqli_error($conn);
    }

    $sq4 = "INSERT INTO seller(owner_id,expected_price,zip,broker_id)
      VALUES ('$ownerid','$exp','$brokerid')";
    if (mysqli_query($conn, $sq4)) {
        // echo "New record has been added successfully !";
        $counter = $counter + 1;
    } else {
        echo "Error: " . $sq4 . ":-" . mysqli_error($conn);
    }

    $sql = "INSERT INTO property(property_id,location,established_date,owner_id)
     	VALUES ('$propid','$location','$edate','$zip','$ownerid')";
    if (mysqli_query($conn, $sql)) {
        // echo "New record has been added successfully !";
        $counter = $counter + 1;
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }

    $sql1 = "INSERT INTO ammeneties(property_id,ammenities)
      VALUES ('$propid','$amme')";
    if (mysqli_query($conn, $sql1)) {
        // echo "New record has been added successfully !";
        $counter = $counter + 1;
    } else {
        echo "Error: " . $sql1 . ":-" . mysqli_error($conn);
    }

    $sq5 = "INSERT INTO services(property_id,close_by_services)
      VALUES ('$propid','$cbs')";
    if (mysqli_query($conn, $sq5)) {
        // echo "New record has been added successfully !";
        $counter = $counter + 1;
    } else {
        echo "Error: " . $sq5 . ":-" . mysqli_error($conn);
    }

    if ($top == "residential") {
        $hname = $_POST['hname'];
        $hno = $_POST['hno'];
        $bhk = $_POST['bhk'];
        $sq6 = "INSERT INTO residential_property(property_id,house_no,house_name,res_address,bhk,rate_per_sqft)
      VALUES ('$propid','$hno','$hname','$bhk','$res_address','$rps')";
        if (mysqli_query($conn, $sq6)) {
            // echo "New record has been added successfully !";
            $counter = $counter + 1;
        } else {
            echo "Error: " . $sq6 . ":-" . mysqli_error($conn);
        }
    } else {
        $bname = $_POST['bname'];
        $sno = $_POST['sno'];
        $sq7 = "INSERT INTO commercial_property(property_id,shop_no,com_address,building_name,rate_per_sqft)
           VALUES ('$propid','$sno','$com_address','$bname','$rps')";
        if (mysqli_query($conn, $sq7)) {
            // echo "New record has been added successfully !";
            $counter = $counter + 1;
        } else {
            echo "Error: " . $sq7 . ":-" . mysqli_error($conn);
        }
    }

    if ($counter == 7) {
        echo " <script>
        alert('Successfully Saved');
        location = 'accounthome.html';
        </script>";
        // header("Location: accounthome.html");
    }

    mysqli_close($conn);
}
?>