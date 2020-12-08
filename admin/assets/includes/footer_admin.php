</main>
</div> <!-- fin div main__content-->

<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous">
</script>
  <script type="text/javascript" src="assets/ajax/team_ajax.js"></script>
<?php
if (stripos($_SERVER['REQUEST_URI'], 'login_admin.php')){
     echo '<script type="text/javascript" src="assets/js/login_admin.js"></script>';
}
else{
     echo '<script type="text/javascript" src="assets/js/app.js"></script>';
   
}
?>   

</body>
</html>