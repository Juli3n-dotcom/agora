<?php
require_once __DIR__.'/../functions/menu_functions.php';
?>



<?= nav_item('index.php','Accueil', $class);?>
<?= nav_item('admin/index.php','Admin', $class);?>
<?= nav_item('user/index.php','User',$class);?> 
<?= nav_item('company/index.php','Company',$class);?> 