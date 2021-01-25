<?php
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];

$to = "bankaratharva@gmail.com";

mail("bankaratharva@gmail.com", "Hi!", "Hi!", "Hello!");
