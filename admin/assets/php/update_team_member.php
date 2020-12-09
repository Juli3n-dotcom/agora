<?php
require_once __DIR__ . '/../config/bootstrap_admin.php';

if(isset($_POST['updatemember'])){


$req_update = $pdo->prepare(
        'UPDATE team SET
        civilite = :civilite,
        nom = :nom,
        prenom = :prenom,
        email = :email,
        statut = :statut,
        confirmation = :confirmation
        WHERE id_team_member = :id_team_member'
    );

    $req_update->bindValue(':civilite',$_POST['update_civilite']);
    $req_update->bindValue(':nom',$_POST['update_name_member']);
    $req_update->bindValue(':prenom',$_POST['update_prenom_member']);
    $req_update->bindValue(':email',$_POST['update_email_member']);
    $req_update->bindValue(':statut',$_POST['update_statut']);
    $req_update->bindValue(':confirmation',$_POST['update_confirmation']);
    $req_update->bindParam(':id_team_member',$_POST['update_id'],PDO::PARAM_INT);
    $req_update->execute();

    if($req_update){
        ajouterFlash('success','Membre modifié !');
        header('location: ../../team.php');
 
    }else{
        ajouterFlash('error','echec update !');
        header('location: ../../team.php');
    }
}


?>
