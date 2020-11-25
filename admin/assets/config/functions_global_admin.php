<?php

function ajouterFlash(string $type, string $messages) : void
  {
      $_SESSION['flash'][] = [
       'type' => $type,
       'message' => $messages,
];
  }

function recupererFlash ():array{

$messages = $_SESSION['flash'] ??[];

unset($_SESSION['flash']);

    return $messages;
  }

   // récupération des membres de la team
function getMembres(PDO $pdo):array
{
  $req=$pdo->query(
    'SELECT *
    FROM team
  ');
 $membre = $req->fetchAll(PDO::FETCH_ASSOC);
return $membre;
}
