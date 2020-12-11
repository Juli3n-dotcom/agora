<?php 
// récupération des membres
function getUser(PDO $pdo):array
{
  $req=$pdo->query(
    'SELECT *
    FROM user
  ');
 $user = $req->fetchAll(PDO::FETCH_ASSOC);
return $user;
}