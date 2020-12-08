<?php
require_once __DIR__ . '/../config/bootstrap.php';
require_once __DIR__ . '/../functions/team_functions.php';

$msg = '';
$status = '';

if(!preg_match('~^[a-zA-Z-]+$~',$_POST['name'])){
    $status = 'error';
    $msg = 'Nom manquant';
}elseif (!preg_match('~^[a-zA-Z-]+$~',$_POST['prenom'])) {
        $status = 'error';
        $msg = 'Prénom manquant';
}elseif(getMembreBy($pdo, 'email', $_POST['email'])!==null){
        $status = 'error';
        $msg = 'Email déja utilisé !';
}elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $status = 'error';
        $msg = 'Email non valide ou manquant!';   
}else{

    
    //création d'un mot de passe aléatoire
    function passgen($nbChar) {
    $chaine ="mnoTUzS5678kVvwxy9WXYZRNCDEFrslq41GtuaHIJKpOPQA23LcdefghiBMbj0@#";
    srand((double)microtime()*1000000);
    $pass = '';
    for($i=0; $i<$nbChar; $i++){
        $pass .= $chaine[rand()%strlen($chaine)];
        }
    return $pass;
    }

    $mdp = passgen(8);
    $hash = password_hash($mdp, PASSWORD_DEFAULT);
    
    //création de l'username + création du name
    $first_name = $_POST['prenom'];
    $a = $first_name[0];
    $explode_name = explode(' ',$_POST['name']);
    $explode_fn = explode(' ',$_POST['first_name']);

    $username = $a.$explode_name[0];
    $name = 'Fr'.$explode_fn[0].$explode_name[0].bin2hex(random_bytes(6));

    //autres valeurs
    $token = bin2hex(random_bytes(16));
    $civilite = $_POST['civilite'];
    $statut = $_POST['statut'];

    // requete SQL
    $req = $pdo->prepare(
            'INSERT INTO team (
                civilite,
                username,
                nom,
                prenom,
                email,
                password,
                photo_id,
                statut,
                date_enregistrement,
                confirmation,
                token,
                name
            )
            VALUES (
                :civilite,
                :username,
                :nom,
                :prenom,
                :email,
                :password,
                :photo_id,
                :statut,
                :date,
                :confirmation,
                :token,
                :name
            )'
        );

        $req->bindParam(':civilite',$civilite);
        $req->bindParam(':username',$username);
        $req->bindParam(':nom',htmlspecialchars($_POST['name']));
        $req->bindParam(':prenom',htmlspecialchars($_POST['prenom']));
        $req->bindParam(':email',$_POST['email']);
        $req->bindParam(':password',$hash);
        $req->bindValue(':photo_id',NULL);
        $req->bindValue(':statut',$statut);
        $req->bindValue(':date',(new DateTime())->format('Y-m-d H:i:s'));
        $req->bindValue(':confirmation',0);
        $req->bindParam(':token',$token);
        $req->bindParam(':name',$name);
        $req->execute();

        if($req){
            $status = 'success';
            $msg = 'Membre ajouté';   
        }

}
    $resultat = '';
    $resultat .= '<div id="toats" class="notif alert-' .$status. '" onload="killToats()"';
    $resultat .= '<div class="toats_headers">';
    $resultat .= '<a class="toats_die">X</a>';
    $resultat .= '<h5><i class="fas fa-exclamation-circle"></i> Notification :</h5>';
    $resultat .= '<div class="toats_core">';
    $resultat .= '<p>' .$msg. '</p>';
    $resultat .= '</div>';      
    $resultat .= '</div>';


    $resultat.= '<tbody>';
    //         while ($member = $Allmembres->fetch() ){

    //         // changement format date
    //         $date = str_replace('/', '-', $member['date_enregistrement']);
    //         //récupération de la photo de profil
    //         $id_photo = $member['photo_id'];
    //         $data = $pdo->query("SELECT * FROM photo WHERE id_photo = '$id_photo'");
    //         $photo = $data->fetch(PDO::FETCH_ASSOC);

    // $resultat.= '<tr>';
    //     $resultat .= '<td>'.$member['nom'].'</td>';
    //     $resultat .= '<td>'.$member['prenom'].'</td>';
    //     $resultat .= '<td class="td-team">';
    //                      if ($member['photo_id'] == NULL) {
    //                         if($member['civilite'] == 0) {
    //                           echo "<div class='img-profil' style='background-image: url(assets/photos/male.svg)'></div>";
    //                           }elseif($member['civilite'] == 1){
    //                           echo "<div class='img-profil' style='background-image: url(assets/photos/female.svg)'></div>";
    //                         }else{
    //                           echo "<div class='img-profil' style='background-image: url(assets/photos/profil.svg)'></div>";
    //                         }
    //                       }else{
    //                         echo "<div class='img-profil' style='background-image: url(assets/photos/ " .$photo['profil']. " )'></div>";
    //                       }
    //     $resultat .= '</td>';
    //     $resultat .= '<td><a href="mailto:'.$member['email'].'" class="email_member">'.$member['email'].'</a></td>';
    //     $resultat .= '<td>';
    //                       if ($member['statut'] == 0){
    //                             echo '<p class="badge admin">Admin</p>';
    //                       } elseif($member['statut'] == 1){
    //                             echo '<p class="badge user">User</p>';
    //                       }else{
    //                             echo '<p class="badge editer">Editeur</p>';
    //                       }
    //     $resultat .= '</td>';
    //     $resultat .= '<td>';
    //                       if ($member['confirmation'] == 0){
    //                           echo '<p class="badge danger confirmation">Non</p>';
    //                       }else{
    //                           echo '<p class="badge success confirmation">Oui</p>';
    //                       }
    //     $resultat .= '</td>';   
    //     $resultat .= '<td>'. date('d-m-Y', strtotime($date)).'</td>';   
    //     $resultat .= '<td></td>';
    // $resultat .= '</tr>';
    //         }
$resultat .= '</tbody> ';

    $tableau['resultat'] = $resultat;

    $tableau['status'] = $status; 
    echo json_encode($tableau);


    

?>
