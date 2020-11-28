<?php
require_once __DIR__ . '/assets/config/bootstrap.php';

$notification = '';
$username = '';
$username_post = '';
$mdp = '';
$mdp_post = '';

if(isset($_POST['submit'])){

  $req = $pdo->prepare(
    'SELECT * 
    FROM team
    WHERE
    username = :username'
  );
  $req->bindParam(':username',$_POST['username']);
  $req->execute();
  $membre = $req->fetch(PDO::FETCH_ASSOC);

  $username = $membre['username'];
  $mdp = $membre['password'];
  $username_post = $_POST['username'];
  $mdp_post = $_POST['password'];
  

  if (!$membre) {
    $notification = 'Membre inconnu.';

  }elseif (!password_verify($_POST['password_login'], $membre['password'])){
      $notification = 'Mot de passe erroné!';

  }else{
    $notification = 'Ok';
    unset($membre['password']);
    $_SESSION['membre']=$membre;
    session_write_close();
    header('Location: index_admin.php');
  }
}


$page_title ='Connexion';
include __DIR__. '/assets/includes/header_admin.php';
?>

<img src="assets/img/wave.png" alt="wave" class="wave">

<div class="login__container">
    <div class="login__img">
        <img src="assets/img/login.svg" alt="image">
    </div>
    <div class="login__box">
        <form action="" method="POST">
            <img class="login__avatar" src="assets/img/profil.svg" alt="image de profil">

            <h2>Bienvenue</h2>
             <p><?= $notification?></p>
            <p><?= $username?></p>
            <p><?= $mdp?></p>
            <p><?= $username_post?></p>
            <p><?= $mdp_post?></p>

            <div class="login__input--div username">

                <div class="login__input--div-i">
                    <i class="fas fa-user"></i>
                </div>

                <div>
                    <h5>Username</h5>
                    <input 
                    type="text" 
                    class="input__login" 
                    name="username"
                    value=""
                    />
                </div>

            </div> <!-- end login__input--div-->

            <div class="login__input--div password">

                <div class="login__input--div-i">
                    <i class="fas fa-user"></i>
                </div>

                <div>
                    <h5>Password</h5>
                    <input 
                    type="password" 
                    class="input__login"
                    name="password"
                    />
                </div>

            </div> <!-- end login__input--div-->

            <a href="#" class="forgot__password">Mot de passe oublié</a>

            <input 
            type="submit" 
            class="login__btn" 
            name="submit"
            value="Connexion"
            />
        </form>
     </div>
</div>

<?php
include __DIR__. '/assets/includes/footer_admin.php';
?>