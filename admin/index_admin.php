<?php
require_once __DIR__ . '/assets/config/bootstrap.php';
require_once __DIR__ . '/assets/config/functions_global_admin.php';

$membre = getMembres($pdo, $_GET['id'] ?? null);

$msg = '';

if(($membre === null)){
  $msg = 'membre est null';
  // ajouterFlash('danger','Veuillez vous connecter');
  // header('location:login_admin.php');
}

$page_title ='Back Office';
include __DIR__. '/assets/includes/header_admin.php';


?>

<h1>Back Office</h1>

<p><?= $msg ?></p>