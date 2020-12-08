<?php

// gestion de l'affichage
$membresParPage = 20;
$membresTotalesReq = $pdo->query('SELECT id_team_member FROM team');
$membresTotales = $membresTotalesReq->rowCount();
$pageTotales = ceil($membresTotales/$membresParPage);

if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page']<=$pageTotales){
    $_GET['page'] = intval($_GET['page']);
    $pageCourante = $_GET['page'];
}else{
    $pageCourante = 1;
}
$depart = ($pageCourante-1)*$membresParPage;

$Allmembres = $pdo->query('SELECT * FROM team ORDER BY date_enregistrement DESC LIMIT '.$depart.','.$membresParPage);


function getMembreBy(PDO $pdo, string $colonne, $valeur): ?array
     {
       $req =$pdo->prepare(sprintf(
       'SELECT *
       FROM team
       WHERE %s = :valeur',
       $colonne
       ));
    
     $req->bindParam(':valeur', $valeur);
     $req->execute();

     $utilisateur =$req->fetch(PDO::FETCH_ASSOC);
     return $utilisateur ?: null;
      }
