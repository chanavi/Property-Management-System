<?php
$conn = mysqli_connect("localhost", "root", "", "miniproject");
if (!$conn) {
    die('Could not Connect MySql Server:' . mysqli_error($conn));
}
    $rent_ownerName = $_POST['rent_ownerName'];
    $rent_ownerID = $_POST['rent_ownerID'];
    $rent_ownerEmail = $_POST['rent_ownerEmail'];
    $rent_Contact = $_POST['rent_Contact'];
    $rent_propertyID = $_POST['rent_propertyID'];
    $rent_location = $_POST['rent_location'];
    $rent_established_year = $_POST['rent_established_year'];
    $rent_amenities = $_POST['rent_amenities'];
    $rent_services = $_POST['rent_services'];
    $rent_expectedRent = $_POST['rent_expectedRent'];
    $rent_brokerID = $_POST['rent_brokerID'];
    $rent_zip = $_POST['rent_zip'];
    $top=$_POST['rent_typeofproperty'];

    $counter = 0;

    $sq3 = "INSERT INTO prop_owner(owner_id,owner_name,email_id,broker_id)
      VALUES ('$rent_ownerID','$rent_ownerName','$rent_ownerEmail','$rent_brokerID')";
    if (mysqli_query($conn, $sq3)) {
        // echo "New record has been added successfully !";
        $counter = $counter + 1;
    } else {
        echo "Error: " . $sq3 . ":-" . mysqli_error($conn);
    }

    $sq2 = "INSERT INTO owner_contact(owner_id,owner_contact_no)
      VALUES ('$rent_ownerID','$rent_Contact')";
    if (mysqli_query($conn, $sq2)) {
        // echo "New record has been added successfully !";
        $counter = $counter + 1;
    } else {
        echo "Error: " . $sq2 . ":-" . mysqli_error($conn);
    }

    $sq4 = "INSERT INTO landlord(owner_id,expected_rent,broker_id)
      VALUES ('$rent_ownerID','$rent_expectedRent','$rent_brokerID')";
    if (mysqli_query($conn, $sq4)) {
        // echo "New record has been added successfully !";
        $counter = $counter + 1;
    } else {
        echo "Error: " . $sq4 . ":-" . mysqli_error($conn);
    }

    $sql = "INSERT INTO property(property_id,location,established_date,owner_id)
     	VALUES ('$rent_propertyID','$rent_location','$rent_established_year','$rent_ownerID')";
    if (mysqli_query($conn, $sql)) {
        // echo "New record has been added successfully !";
        $counter = $counter + 1;
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }

    $sql1 = "INSERT INTO ammeneties(property_id,ammenities)
      VALUES ('$rent_propertyID','$rent_amenities')";
    if (mysqli_query($conn, $sql1)) {
        // echo "New record has been added successfully !";
        $counter = $counter + 1;
    } else {
        echo "Error: " . $sql1 . ":-" . mysqli_error($conn);
    }

    $sq5 = "INSERT INTO services(property_id,close_by_services)
      VALUES ('$rent_propertyID','$rent_services')";
    if (mysqli_query($conn, $sq5)) {
        // echo "New record has been added successfully !";
        $counter = $counter + 1;
    } else {
        echo "Error: " . $sq5 . ":-" . mysqli_error($conn);
    }

    if ($top == "residential") {

          $BHK = $_POST['BHK'];
          $rent_res_house_name = $_POST['rent_res_house_name'];
          $rent_res_house_no = $_POST['rent_res_house_no'];
          $rent_res_address = $_POST['rent_res_address'];
          $rent_rate_per_sqft = $_POST['rent_rate_res'];

        $sq6 = "INSERT INTO residential_property(property_id,house_no,house_name,res_address,bhk,rate_per_sqft)
      VALUES ('$rent_propertyID','$rent_res_house_no','$rent_res_house_name','$rent_res_address','$BHK','$rent_rate_per_sqft')";
        if (mysqli_query($conn, $sq6)) {
            // echo "New record has been added successfully !";
            $counter = $counter + 1;
        } else {
            echo "Error: " . $sq6 . ":-" . mysqli_error($conn);
        }
    } else {

          $rent_com_building_name = $_POST['rent_com_building_name'];
          $rent_Carpet_Area = $_POST['rent_Carpet_Area'];
          $rent_com_shop_no = $_POST['rent_com_shop_no'];
          $rent_com_address = $_POST['rent_com_address'];
          $rent_rate_per_sqft = $_POST['rent_comm_rate'];

        $sq7 = "INSERT INTO commercial_property(property_id,shop_no,com_address,building_name,carpet_area,rate_per_sqft)
           VALUES ('$rent_propertyID','$rent_com_shop_no','$rent_com_address','$rent_com_building_name','$rent_Carpet_Area','$rent_rate_per_sqft')";
        if (mysqli_query($conn, $sq7)) {
            // echo "New record has been added successfully !";
            $counter = $counter + 1;
        } else {
            echo "Error: " . $sq7 . ":-" . mysqli_error($conn);
        }
    }

    if ($counter == 7) {
        echo " <script>
        alert('Your property has been added');
        location = 'sellrent.html';
        </script>";
        // header("Location: accounthome.html");
    }

    mysqli_close($conn);
?>