<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.79.0">
  <!-- CDNs -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500&display=swap" rel="stylesheet">
  <!-- stylesheet -->
  <link rel="stylesheet" href="buy.css">
  <link rel="stylesheet" href="buy_media.css">
  <title>PMS</title>

</head>

<body>
  <main>
    <div class="section-1">

      <header>
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <a class="navbar-brand" href="#">Property Mangement System</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#expandme">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="expandme">

            <div class="navbar-nav">
                <div class="btn-group">
                    <button class="btn"><a href="home_login.html" class="nav-item nav-link">Home</a></button>
                    <button class="btn"><a href="buy.php" class="nav-item nav-link">Buy</a></button>
                    <button class="btn"><a href="sell.php" class="nav-item nav-link">Sell</a></button>
                    <button class="btn"><a href="buy.php" class="nav-item nav-link">Rent In</a></button>
                    <button class="btn"><a href="sell.php" class="nav-item nav-link">Rent Out</a></button>
                    <button class="btn"><a href="broker.html" class="nav-item nav-link">Broker</a></button>
                    <button class="btn"><a href="Property Services/property_services.html"
                            class="nav-item nav-link">Services</a></button>
                    <button class="btn"><a href="about_us.html" class="nav-item nav-link">About Us</a></button>
                    <button class="btn"><a href="Home.html" class="nav-item nav-link">Logout</a></button>
                </div>

            </div>
        </div>
    </nav>
      </header>

      <img class="header bg-img img-fluid" src="images/bg-buy.png" alt="">
      <img class="header sm-img img-fluid" src="images/bg-buy-sm.png" alt="">
      <section>
        <h1 class="main-heading">Discover a place you'll love to live in</h1>
        <div class="row">
          <div class=".col-6 mx-auto">
            <p class="main-btns">
              <a href="#prop" onclick="buyProp()" class="mainbtn btn btn-dark btn-lg my-2">Buy</a>
              <a href="#prop" onclick="rentProp()" class="mainbtn btn btn-outline-dark btn-lg my-2">Rent In</a>
            </p>
          </div>
        </div>
      </section>
    </div>


    <div id="prop" class="album py-5 bg-light invisible">
      <div class="container">
        <h1 id="heading" class="fw-light"></h1>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Enter a location">
          <button class="btn btn-dark invisible" type="button" id="button-addon1" onclick="clearLocation();">X</button>
          <button class="btn btn-outline-dark" type="button" id="button-addon2" onclick="locate();">Search</button>
        </div>

        <div class="filter-applied invisible">
          <p>Applied Filters: </p>
        </div>

        <div id="box-prop" class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-3 g-3">

        <?php
    		$conn = mysqli_connect("localhost:3307", "root", "", "miniproject");
    // Check connection
    		if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
    		}

        //properties on rent
    		$sql0 = "SELECT * FROM landlord";
    		$result0 = $conn->query($sql0);
    		if ($result0->num_rows > 0) {
          // output data of each row
    			while($row0 = $result0->fetch_assoc()) {
    				$ownerid = $row0["owner_id"];
    				$sql2 = "SELECT * FROM property where owner_id = $ownerid ";
    				$result2 = $conn->query($sql2);
    				$row2 = $result2->fetch_assoc();
    				$pro = $row2["property_id"];

    				$sql = "SELECT * FROM residential_property where property_id = $pro";
    				$result = $conn->query($sql);
    				$row = $result->fetch_assoc();
            if($result->num_rows > 0){
              $cr="Residential";
              $prop_name=$row["house_name"];
            }

    				$sql5 = "SELECT * FROM commercial_property where property_id = $pro";
    				$result5 = $conn->query($sql5);
    				$row5 = $result5->fetch_assoc();
            if($result2->num_rows > 0){
              $cr="Commercial";
              $prop_name=$row5["building_name"];
            }

    				$sql1 = "SELECT * FROM ammeneties where property_id = $pro ";
    				$result1 = $conn->query($sql1);
    				$row1 = $result1->fetch_assoc();

    				$sql3 = "SELECT * FROM services where property_id = $pro ";
    				$result3 = $conn->query($sql3);
    				$row3 = $result3->fetch_assoc();

    				$sql4 = "SELECT * FROM prop_owner where owner_id = $ownerid ";
    				$result4 = $conn->query($sql4);
    				$row4 = $result4->fetch_assoc();
    				$brokid = $row4["broker_id"];

            echo"<div id='".$pro."'class='col rent invisible'>
                <div class='card shadow-sm'>
                  <svg class='bd-placeholder-img card-img-top img-fluid' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Placeholder: Thumbnail' preserveAspectRatio='xMidYMid slice' focusable='false' style='background-image:url(apt_images/".$pro."-img1.jpg);'>
                  </svg>

                  <div class='card-body v_details'>
                    <h5 class='card-title'>".$prop_name."</h5>
                    <div class='view_details d-flex justify-content-between align-items-center'>
                      <div class='btn-group'>
                        <button type='button' class='btn btn-sm btn-outline-dark vdetails' onclick='viewdetails()'>View Details</button>
                      </div>
                      <div class='btn-group filters'>
                        <button type='button' class='btn btn-sm btn-dark fil location' onclick='filterStart()'>".$row2["location"]."</button>
                        <button type='button' class='btn btn-sm btn-dark fil c-r' onclick='filterStart()'>".$cr."</button>
                        <button type='button' class='btn btn-sm btn-dark fil buyselltag invisible'>rent</button>
                      </div>
                    </div>
                  </div>
                  <div class='hide_details card-body invisible' style='position: relative;'>
                  <div class='d-flex justify-content-between align-items-center'>
                    <p class='prop-desc'> Ammenities : ".$row1["ammenities"]."
                      <br>
                      Established Date : " .$row2["established_date"]."
                      <br>
                      Close By Services : " .$row3["close_by_services"]."
                      <br>
                      Rate Per SQFT : " . $row5["rate_per_sqft"]. "
                      <br>
                      <button type='button' class='btn btn-sm btn-outline-dark' data-toggle='modal' data-target='#exampleModalCenter'>Rent In</button>
                    </p>
                    <button type='button' class='btn btn-sm btn-dark cdetails' onclick='hdetails()'>
                      <i class='fas fa-angle-up'></i>
                    </button>
                  </div>
                  </div>
                </div>
              </div>";
    			}
    		} else { echo "0 results"; }

        //properties on sale:
        $sql0 = "SELECT * FROM seller";
    		$result0 = $conn->query($sql0);
    		if ($result0->num_rows > 0) {
          // output data of each row
    			while($row0 = $result0->fetch_assoc()) {
    				$ownerid = $row0["owner_id"];

    				$sql2 = "SELECT * FROM property where owner_id = $ownerid ";
    				$result2 = $conn->query($sql2);
    				$row2 = $result2->fetch_assoc();
    				$pro = $row2["property_id"];


    				$sql = "SELECT * FROM residential_property where property_id = $pro";
    				$result = $conn->query($sql);
    				$row = $result->fetch_assoc();

    				$sql5 = "SELECT * FROM commercial_property where property_id = $pro";
    				$result5 = $conn->query($sql5);
    				$row5 = $result5->fetch_assoc();

    				$sql1 = "SELECT * FROM ammeneties where property_id = $pro ";
    				$result1 = $conn->query($sql1);
    				$row1 = $result1->fetch_assoc();


    				$sql3 = "SELECT * FROM services where property_id = $pro ";
    				$result3 = $conn->query($sql3);
    				$row3 = $result3->fetch_assoc();

    				$sql4 = "SELECT * FROM prop_owner where owner_id = $ownerid ";
    				$result4 = $conn->query($sql4);
    				$row4 = $result4->fetch_assoc();
    				$brokid = $row4["broker_id"];

    				if ($result->num_rows > 0){
    				$cr="Residential";
            $rps= $row["rate_per_sqft"];
            $prop_name=$row["house_name"];
    			}
    			else if($result5->num_rows > 0){
    				$cr="Commercial";
            $rps=$row5["rate_per_sqft"];
            $prop_name=$row5["building_name"];
    			}

          echo"<div id='".$pro."'class='col buy invisible'>
              <div class='card shadow-sm'>
                <svg class='bd-placeholder-img card-img-top img-fluid' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Placeholder: Thumbnail' preserveAspectRatio='xMidYMid slice' focusable='false' style='background-image:url(apt_images/".$pro."-img1.jpg);'>
                </svg>
                <div class='card-body v_details'>
                  <h5 class='card-title'>".$prop_name."</h5>
                  <div class='view_details d-flex justify-content-between align-items-center'>
                    <div class='btn-group'>
                      <button type='button' class='btn btn-sm btn-outline-dark vdetails' onclick='viewdetails()'>View Details</button>
                    </div>
                    <div class='btn-group filters'>
                      <button type='button' class='btn btn-sm btn-dark fil location' onclick='filterStart()'>".$row2["location"]."</button>
                      <button type='button' class='btn btn-sm btn-dark fil c-r' onclick='filterStart()'>".$cr."</button>
                      <button type='button' class='btn btn-sm btn-dark fil buyselltag invisible'>buy</button>
                    </div>
                  </div>
                </div>
                <div class='hide_details card-body invisible' style='position: relative;'>
                <div class='d-flex justify-content-between align-items-center'>
                  <p class='prop-desc'> Ammenities : ".$row1["ammenities"]."
                    <br>
                    Established Date : " .$row2["established_date"]."
                    <br>
                    Close By Services : " .$row3["close_by_services"]."
                    <br>
                    Rate Per SQFT : " . $rps. "
                    <br>
                    <button type='button' class='btn btn-sm btn-outline-dark' data-toggle='modal' data-target='#exampleModalCenter'>Buy</button>
                  </p>
                  <button type='button' class='btn btn-sm btn-dark cdetails' onclick='hdetails()'>
                    <i class='fas fa-angle-up'></i>
                  </button>
                </div>
                </div>
              </div>
            </div>";

    			}
    			// echo "</table>";
    		} else { echo "0 results"; }

    		$conn->close();
    		?>
      </div>
  </main>

<!-- Site footer -->
<footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <h6>About</h6>
        <p class="text-justify">Dunkirk Corp. is a newly established upbeat real estate agency with
          connections PAN India. We handle all types of properties, including houses, condos,
          villas,townhomes, land, and more. We handle sales and rentals to meet all lifestyle needs,
          including vacation homes, waterfront, island, ski, golf, farm, ranch and many others.
          Contact a Dunkirk brand agent today to sell your property, or find a
          new home, around the world.</p>
      </div>
      <div class="col-xs-6 col-md-3">
        <h6>Categories</h6>
        <ul class="footer-links">
          <li>
            <a href="https: //www.investopedia.com/terms/r/realestate.asp">Understand what we do.</a>
          </li>
          <li>
            <a href="https: //www.thebalance.com/real-estate-what-it-is-and-how-it-works-3305882">
              Why invest in real estate?</a>
          </li>
        </ul>
      </div>
      <div class="col-xs-6 col-md-3">
        <h6>Quick Links</h6>
        <ul class="footer-links">
          <li>
            <a href="#">Home</a>
          </li>
          <li>
            <a href="#">Buy</a>
          </li>
          <li>
            <a href="#">Loan</a>
          </li>
          <li>
            <a href="#">Property Services</a>
          </li>
        </ul>
      </div>
    </div>
    <hr>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-6 col-xs-12">
        <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by
          <a href="#">Dunkirk Corp</a>.
        </p>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <ul class="social-icons">
          <li>
            <a class="facebook" href="#">
              <iclass="fa fa-facebook"></i></a>
          </li>
          <li>
            <a class="twitter" href="#">
              <iclass="fa fa-twitter"></i></a>
          </li>
          <li>
            <a class="dribbble" href="#">
              <iclass="fa fa-dribbble"></i></a>
          </li>
          <li>
            <a class="linkedin" href="#">
              <iclass="fa fa-linkedin"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<!-- / Footer -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="buy.js"></script>
</body>
</html>
