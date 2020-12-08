$(document).ready(function(){
// add team member
    $(function(){
        $(" form #add_team_member").click(function (e) {
            e.preventDefault();
            var $form = $(this).closest('form');
            var civilite = $form.find('#member_civilite').val();
            var memberName = $form.find('input[name="name"]').val();
            var memberPrenom = $form.find('input[name="prenom"]').val();
            var memberEmail = $form.find('input[name="email"]').val();
            var statut = $form.find('#member_statut').val();
            var parameters = "civilite="+civilite+"&name=" + memberName + "&prenom=" + memberPrenom + '&email=' + memberEmail + "&statut="+ statut;
            $.ajax({
                url:'assets/script/add_team_member.php',
                method : 'post',
                data: parameters,
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('.modal-bg').removeClass('active');
                        console.log(data.status)
                        retour = $('.resultat').html(data.resultat);
                        return retour;
                    } else {
                        console.log(data.status)
                        retour = $('.resultat').html(data.resultat);
                        return retour;
                    }
                }
            });
        });
    });

   

    
    
});