</main>

</div> <!-- fin div main__content-->

<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  
<?php
if (stripos($_SERVER['REQUEST_URI'], 'login_admin.php')){
     echo '<script type="text/javascript" src="assets/js/login_admin.js"></script>';
}
else{
     echo '';
   
}
?>   

</body>
</html>