<?php
if (session_status() === PHP_SESSION_NONE){
    session_start();
  }
  require_once __DIR__ . '/../config/bootstrap_admin.php';

  $Membre = getMembre($pdo, $_GET['id_team_member'] ?? null);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title><?= $web_name ;?> | <?=$page_title?></title>

<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
<!-- CSS -->
<?php
if (stripos($_SERVER['REQUEST_URI'], 'login_admin.php')){
     echo '<link rel="stylesheet" href="assets/css/login_admin.css">';
}
else if(stripos($_SERVER['REQUEST_URI'], 'register.php')){
     echo '<link rel="stylesheet" href="assets/css/register_admin.css">'; 
}else{
     echo '<link rel="stylesheet" href="assets/css/style.css">';
}
?>   
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.min.css">
<script src="https://kit.fontawesome.com/3760b9e264.js" crossorigin="anonymous"></script>
</head>
<body>

    <input type="checkbox" id="sidebar-toggle">
    <div class="sidebar">
         <div class="sidebar__header">
           <h3 class="brand">
              <span class="ti-unlink"></span>
              <span><?= $web_name ;?></span>
           </h3> 
            <label for="sidebar-toggle" class="ti-menu-alt"></label>
         </div>

         <div class="sidebar__menu">
         <ul>
              <li>
                    <a href="index_admin.php">
                         <span class="ti-home"></span>
                         <span>Home</span>
                    </a>
               </li>
                <li>
                    <a href="">
                         <i class="fas fa-users"></i>
                         <span>Users</span>
                    </a>
               </li>
               <li>
                    <a href="">
                         <span class="ti-agenda"></span>
                         <span>Company</span>
                    </a>
               </li>
               <li>
                    <a href="team.php">
                         <i class="fas fa-laugh-beam"></i>
                         <span>Team</span>
                    </a>
               </li>
               <li>
                    <a href="">
                         <span class="ti-folder"></span>
                         <span>Projects</span>
                    </a>
               </li>
               <li>
                    <a href="">
                         <span class="ti-time"></span>
                         <span>Timesheet</span>
                    </a>
               </li>
               <li>
                    <a href="">
                         <span class="ti-book"></span>
                         <span>Contact</span>
                    </a>
               </li>
               <li>
                    <a href="">
                         <span class="ti-settings"></span>
                         <span>Account</span>
                    </a>
               </li>
         </ul>
         </div>
    </div>

    <div class="main__content">

          <header>
               <div class="search__wrapper">
                    <span class="ti-search"></span>
                    <input type="search" placeholder="rechercher">
               </div>
               <div class="social-icons">
                    <span class="ti-bell"></span>
                    <span class="ti-comment"></span>
                    <!-- Menu USER -->
                    <div class="member_menu-action">
                         <div class="profile" onclick="menuTeamToggle();">
                              <?php
                                   if ($Membre['photo_id'] == NULL) {
                                        if($Membre['civilite'] == 0) {
                              echo "<img src='assets/photos/male.svg' alt='photo_profil_male'>";
                              }elseif($Membre['civilite'] == 1){
                              echo "<img src='assets/photos/female.svg' alt='photo_profil_female'>";
                            }else{
                              echo "<img src='assets/photos/profil.svg' alt='photo_profil_other'>";
                            }
                          }else{
                            echo "<img src='assets/photos/ " .$photo['profil']. " )' alt='photo_profil'>";
                          }
                        ?>
                         </div>
                         <div class="member_menu">
                              <h3><?= $Membre['prenom'] ?> <?= $Membre['nom'] ?></h3>
                              <ul>
                                   <li>
                                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                                        <a href="#"> Mon Profil</a>
                                   </li>
                                   <li>
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
                                        <a href="#">Modifier Profil</a>
                                   </li>
                                   <li>
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        <a href="#"> Messagerie</a>
                                   </li>
                                   <li>
                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                        <a href="#"> Help</a>
                                   </li>
                                   <li>
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                                        <a href="assets/php/logout.php"> Déconnexion</a>
                                   </li>
                              </ul>
                         </div>
                    </div>
               </div>
          </header>

    <main>
  <h2 class="dash__title"><?= $page_title?></h2>
