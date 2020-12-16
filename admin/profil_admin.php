<?php

require_once __DIR__ . '/assets/config/bootstrap_admin.php';
require_once __DIR__ . '/assets/functions/team_functions.php';



$page_title ='Profil';
include __DIR__. '/assets/includes/header_admin.php';
?>

<div class="profil__card">
    <div class="profil__card-header">
        <?php
            if ($Membre['photo_id'] == NULL) {
                if($Membre['civilite'] == 0) {
                    echo "<img src='assets/img/male.svg' alt='photo_profil_male' class='profil-img'>";
                }elseif($Membre['civilite'] == 1){
                    echo "<img src='assets/img/female.svg' alt='photo_profil_female' class='profil-img'>";
                }else{
                    echo "<img src='assets/img/profil.svg' alt='photo_profil_other' class='profil-img'>";
                }
            }else{
                    echo "<img src='assets/photos/ " .$photo['profil']. " )' alt='photo_profil' class='profil-img'>";
            }
        ?>
    </div>
    <div class="profil__card-body">
            <h5 class="fullname"><?= $Membre['prenom'] ?> <?= $Membre['nom'] ?></h5>
            <p class="username"><strong>Username : </strong><?= $Membre['username']?></p>
            <p class="email"><strong>Email: </strong><?= $Membre['email']?></p>
            <p class="role"><strong>Role: </strong>
                <?php if($Membre['statut'] == 0){
                        echo 'Admin';
                      }else if($Membre['statut'] == 1){
                        echo 'User';
                      }else{
                        echo 'Editeur';
                      }
                ?>
            </p>
    </div>
    <div class="profil__card-footer">
        <a href="#">Edit</a>
    </div>
</div>

<?php
include __DIR__. '/assets/includes/footer_admin.php';
?>