<?php
require_once __DIR__ . '/assets/config/bootstrap.php';

 $counter =$pdo->query('SELECT COUNT(*) as nb FROM team ');
        $data_membre = $counter->fetch();
        $totalMembre =$data_membre['nb'];

$page_title ='test';
include __DIR__. '/assets/includes/header_admin.php';
?>

<h1>test</h1>

 <p class="card-text"><?= $totalMembre; ?></p>