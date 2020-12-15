<?php
require_once __DIR__ . '/../config/bootstrap_admin.php';

if(isset($_POST['login'])){
    
    $req = $pdo->prepare(
        'SELECT *
        FROM team
        WHERE username = :username
        OR email = :email'
    );
    $req->bindParam(':username', $_POST['username']);
    $req->bindParam(':email', $_POST['username']);
    $tmember = $req->fetch(PDO::FETCH_ASSOC);

    if(!$tmembre){

        ajouterFlash('error','Membre inconnue');
         header('location: ../../login_admin.php');

    }elseif(!password_verify($_POST['password'], $tmembre['password'])){

        ajouterFlash('error','Mot de passe erroné');
         header('location: ../../login_admin.php');

    }else{

    unset($_POST);
    $_SESSION['team']=$tmembre;
    // session_write_close();
    // header('Location: index_admin.php');
    ajouterFlash('success','Bonjour');

    }
}