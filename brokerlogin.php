 <?php
  $servername='localhost';
  $username='root';
  $password='';
  $dbname = "miniproject";
  $conn=mysqli_connect($servername,$username,$password,"$dbname");
    if(!$conn){
      die('Could not Connect MySql Server:' .mysql_error());
    }
session_start();
if(isset($_POST['emailid']))
{    
     $emailid = stripslashes($_REQUEST['emailid']);
     $password = stripslashes($_REQUEST['password']);
  
     // $sql = "INSERT INTO StudentLogin(emailid,password)
     // VALUES ('$emailid','$password')";

     $query = "SELECT * FROM broker WHERE email_id='$emailid' 
               AND brokerpassword='$password'";

     // if (mysqli_query($conn, $sql)) {
     //  echo "New record has been added successfully !";
     //  header("Location: http://localhost/TNP/student.html");
     //  exit();
     // }
    $result10 = mysqli_query($conn, $query) or die(mysql_error());
    $rows10 = mysqli_num_rows($result10);
    if ($rows10 == 1) {
      $_SESSION['emailid'] = $emailid;
      // Redirect to user student page
      header("Location: brokeraccounthome.php");
    }
    else {
      echo " <script>
        alert('Username or Password Invalid .!');
        location = 'brokerlogin.html';
        </script>";
    }
    mysqli_close($conn);
}
?>