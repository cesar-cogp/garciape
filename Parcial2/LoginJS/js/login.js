$('document').ready(function () {

    $('#botonAceptar').click(botonIniciarSesion);
    
    $('#login-pass').keypress(function(e) {
            if (e.keyCode == 13 ) { botonIniciarSesion(); }
    });

function botonIniciarSesion() {

    var vLog = $('#login-name').val();
    var vPas = $('#login-pass').val();

        if (vLog == 'cesargp' && vPas=='7887') {

            console.log('login correcto');

            $('#miModal .modal-header').addClass('modal-header-success');
            $('#miModal .modal-header h2').text('Credenciales correctas');
            $('#miModal .modal-body h3').text('Ha inciado sesión correctamente. ¡Bienvenido!');
            $('#miModal').modal();

            $("#miModal").on('shown.bs.modal',function() {
                $('#botonCerrar').focus();
                });
            $("#miModal").on('hidden.bs.modal',function() {
                $('#miModal .modal-header').removeClass('modal-header-success');
                $(location).attr('href',"main.html");
                });

        }
        else {
            console.log('login incorrecto');

            $('#miModal .modal-header').addClass('modal-header-danger');
            $('#miModal .modal-header h2').text('Credenciales incorrectas');
            $('#miModal .modal-body h3').text('Verifique que sea correcto el usario o contraseña e intente de nuevo.');
            $('#miModal').modal();

            $("#miModal").on('shown.bs.modal',function() {
                $('#botonCerrar').focus();
            });
            $("#miModal").on('hidden.bs.modal',function() {
                $('#miModal .modal-header').removeClass('modal-header-danger');
                $('#login-name').focus();
            });

        }

}});