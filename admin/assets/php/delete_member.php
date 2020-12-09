<?php
require_once __DIR__ . '/../config/bootstrap_admin.php';

if(isset($_POST['deletemember'])){

    if(!isset($_POST['confirmedelete'])){
      ajouterFlash('error','Merci de confirmer la suppression !');
      header('location: ../../team.php');
  
    }else{

    $req_delete = $pdo->prepare(
        'DELETE FROM team 
        WHERE id_team_member = :id_team_member'
    );

    $req_delete->bindParam(':id_team_member',$_POST['delete_id'],PDO::PARAM_INT);
    $req_delete->execute();

    if($req_delete){
        ajouterFlash('success','Membre supprimé !');
        header('location: ../../team.php');
 
    }else{
        ajouterFlash('error','echec delete !');
        header('location: ../../team.php');
    }

    }

}


?>
