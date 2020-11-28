<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAIR | <?=$page_title?></title>

     <!-- CSS -->
   <link rel="stylesheet" href="assets/css/style.css">
<script src="https://kit.fontawesome.com/3760b9e264.js" crossorigin="anonymous"></script>   <?php
if (stripos($_SERVER['REQUEST_URI'], 'login_admin.php')){
     echo '<link rel="stylesheet" href="assets/css/login_admin.css">';
}
else{
     echo '<p><a href="contact.php">Contact</a></p>';
   
}
?>   
</head>
<body>
    <header>
    <ul>
    <li>
    <a href="login_admin.php">Login</a></li>
    </ul>
    </header>
