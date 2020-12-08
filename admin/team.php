<?php
require_once __DIR__ . '/assets/config/bootstrap.php';
require_once __DIR__ . '/assets/config/functions_global_admin.php';
require_once __DIR__ . '/assets/functions/team_functions.php';

// $sql =$pdo->query('SELECT COUNT(*) as nb FROM team WHERE statut = 0');
// $data_membre = $sql->fetch();
// $admin =$data_membre['nb'];

$page_title ='Team';
include __DIR__. '/assets/includes/header_admin.php';
?>
<?php include __DIR__.'/assets/includes/flash.php';?>

<div class="dash__cards">

    <div class="card__single">
      <div class="card__body">
        <i class="fas fa-user-shield"></i>
        <div>
          <h5>Admin</h5>
          <h4><?= $admin ?></h4>
        </div>
      </div>
      <div class="card__footer">
      <a href="">View all</a>
      </div>
    </div>

    <div class="card__single">
      <div class="card__body">
        <i class="fas fa-user"></i>
        <div>
          <h5>User</h5>
          <h4><?= $user ?></h4>
        </div>
      </div>
      <div class="card__footer">
      <a href="">View all</a>
      </div>
    </div>

    <div class="card__single">
      <div class="card__body">
        <i class="fas fa-user-edit"></i>
        <div>
          <h5>Editeur</h5>
          <h4><?= $editeur?></h4>
        </div>
      </div>
      <div class="card__footer">
      <a href="">View all</a>
      </div>
    </div>

  </div>

<section class="recent">
    <div class="team__grid">
      <div class="team__card">
          <div class="card__header">
            <h3>All Team </h3>
            <button id="add_team_member">
                <i class="fas fa-user-plus"></i>
                Ajouter
            </button>
          </div>

        <div class="table-responsive">
             <table>

          <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Photo</th>
                <th>Email</th>
                <th>Status</th>
                <th>Confirmation</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
          </thead>

          <div class="resultat">
              
          <tbody>
            <?php while ($member = $Allmembres->fetch() ): ?>
                <?php
                // changement format date
                $date = str_replace('/', '-', $member['date_enregistrement']);

                //récupération de la photo de profil
                $id_photo = $member['photo_id'];
                $data = $pdo->query("SELECT * FROM photo WHERE id_photo = '$id_photo'");
                $photo = $data->fetch(PDO::FETCH_ASSOC);

                ?>
                <tr>
                    <td><?=$member['nom']?></td>
                    <td><?=$member['prenom']?></td>
                    <td class="td-team">
                        <?php
                          if ($member['photo_id'] == NULL) {
                            if($member['civilite'] == 0) {
                              echo "<div class='img-profil' style='background-image: url(assets/photos/male.svg)'></div>";
                              }elseif($member['civilite'] == 1){
                              echo "<div class='img-profil' style='background-image: url(assets/photos/female.svg)'></div>";
                            }else{
                              echo "<div class='img-profil' style='background-image: url(assets/photos/profil.svg)'></div>";
                            }
                          }else{
                            echo "<div class='img-profil' style='background-image: url(assets/photos/ " .$photo['profil']. " )'></div>";
                          }
                        ?>
                    </td>
                     <td><a href="mailto:<?=$member['email']?>" class="email_member"><?=$member['email']?></a></td>
                    <td>
                        <?php if ($member['statut'] == 0):?>
                            <?= '<p class="badge admin">Admin</p>';?>
                        <?php elseif($member['statut'] == 1) :?>
                            <?= '<p class="badge user">User</p>';?>
                        <?php else :?>
                             <?= '<p class="badge editer">Editeur</p>';?>
                        <?php endif;?>  
                    </td>
                    <td>
                         <?php if ($member['confirmation'] == 0):?>
                        <?= '<p class="badge danger confirmation">Non</p>';?>
                    <?php else:?>
                        <?= '<p class="badge success confirmation">Oui</p>';?>
                    <?php endif;?>   
                    </td>
                    <td><?= date('d-m-Y', strtotime($date))?> </td>
                    <td class="member_action">

                        <a href="#"><i class="fas fa-edit"></i></a>

                        <a 
                          href="#id=<?=$member['id_team_member']?>" 
                          class="delete_team_member">
                            <i class="fas fa-trash-alt"></i>
                        </a>

                    </td>
                </tr>


            <?php endwhile; ?>
          </tbody>

          </div><!-- fin div résultat ajax-->

        </table>
        </div>
       
      </div>

     
    </div>

<div class="pagination">
      <nav aria-label="...">
        <ul class="">
        <?php
            for($i=1;$i<=$pageTotales;$i++){
            if($i == $pageCourante){
                echo '<li class=" active" aria-current="page"><span class="page-link">'.$i.'<span class="sr-only">(current)</span></span></li>';
            }else{
                echo'<li class=""><a class="page-link" href="team.php?page='.$i.'">'.$i.'</a></li> ';
            }
            }
        ?>
      </ul>
      </nav>
    </div>

  </section>



  

  <div class="modal-bg"> <!--  modal d'ajout de membre -->
      <div class="modal">
          <span class="modal-close">X</span>
          <div class="modal__title">
            <h2>Ajouter un membre</h2>
          </div>
          
          <form>
            <div>
            <label class="" for="statut">Civilité :</label>
                <select class="custom-select" name="civilite" id="member_civilite">
                    <option> ... </option>
                        <option value="<?= FEMME ?>">Madame</option>
                        <option value="<?= HOMME ?>">Monsieur</option>
                        <option value="<?= AUTRE ?>">Autre</option>
                </select>
            </div>

            <label for="name">Nom: </label>
            <input type="text" name="name">

            <label for="name">Prenom: </label>
            <input type="text" name="prenom">

            <label for="name">Email: </label>
            <input type="email" name="email">

          <div>
            <label class="" for="statut">Statut :</label>
                <select class="custom-select" name="statut" id="member_statut">
                    <option> ... </option>
                        <option value="<?= ROLE_ADMIN ?>">Admin</option>
                        <option value="<?= ROLE_USER ?>">User</option>
                        <option value="<?= ROLE_EDITEUR ?>">Editeur</option>
                </select>
            </div>
            <div class="modal__footer">
                <input type="submit" class="modal_submit" id="add_team_member" name="add_team_member" value="Valider" >
            </div>
          </form>
      </div>
  </div>

  

<?php 
include __DIR__. '/assets/includes/footer_admin.php';
?>