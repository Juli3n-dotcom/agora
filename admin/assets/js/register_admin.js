$(document).ready(function () {


    $('#nom').blur(function () {
        if (!$(this).val()) {
        $(this).parent().addClass('error');
            $(this).attr("placeholder", "nom manquant");
             name = false
        } else if($(this).val()) {
            $(this).parent().addClass('success');
            $(this).parent().removeClass('error');
             name = true;
        };
        
    });


    $('#prenom').blur(function () {
        if (!$(this).val()) {
        $(this).parent().addClass('error');
            $(this).attr("placeholder", "prenom manquant");
            var lname = false;
        } else if($(this).val()) {
            $(this).parent().addClass('success');
            $(this).parent().removeClass('error');
            var lname = true;
        };
    });

    $('#email').blur(function () {
        if (!$(this).val()) {
        $(this).parent().addClass('error');
            $(this).attr("placeholder", "email manquant");
            var email = false;
        } else if($(this).val()) {
            $(this).parent().addClass('success');
            $(this).parent().removeClass('error');
            var email = true;
        };
    });

    $('#password').blur(function () {
        if (!$(this).val()) {
        $(this).parent().addClass('error');
            $(this).attr("placeholder", "mot de passe manquant");
            var mdp = false;
        } else if($(this).val()) {
            $(this).parent().addClass('success');
            $(this).parent().removeClass('error');
            var mdp = true;
        };
    });

    $('#confirme').blur(function () {
        if (!$(this).val()) {
            $(this).parent().addClass('error');
            $(this).attr("placeholder", "vous devez confirmer votre mot de passe");
            var confirme = false;
        } else if ($(this).val() != $('#password').val()) {
            $(this).val('');
           $(this).parent().addClass('error');
            $(this).attr("placeholder", "les mots de passe ne correspond pas");
            var confirme = false;
        } else if ($(this).val() === $('#password').val()){
             $(this).parent().addClass('success');
            $(this).parent().removeClass('error');
            var confirme = true;
        } else {
             $(this).parent().addClass('success');
            $(this).parent().removeClass('error');
            var confirme = true;
        };
    });


});

