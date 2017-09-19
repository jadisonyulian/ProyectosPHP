/*======================================================
=            VALIDAR USUARIO EXISTENTE AJAX            =
======================================================*/



$("#usuarioRegistro").change(function() {


    var usuario = $("#usuarioRegistro").val();
    var datos = new FormData();
    datos.append("validarUsuario", usuario);

    $.ajax({
        url: "views/modules/ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {


            if (respuesta == 0) {

                $("label[for='usuarioRegistro'] span").html('<p>Este usuario ya existe en la base de datos</p>');


            } else {

                $("label[for='usuarioRegistro'] span").html("");


            }

        }

    });


});




/*=====  End of VALIDAR USUARIO EXISTENTE AJAX  ======*/


/*====================================================
=            VALIDAR MAIL EXISTENTE EN DB            =
====================================================*/



$("#emailRegistro").change(function() {


    var email = $("#emailRegistro").val();
    var datos = new FormData();
    datos.append("validarEmail", email);

    $.ajax({
        url: "views/modules/ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

            console.log("respuesta", respuesta);

            if (respuesta == 0) {

                $("label[for='emailRegistro'] span").html('<p>Este usuario ya existe en la base de datos</p>');


            } else {

                $("label[for='emailRegistro'] span").html("");


            }

        }

    });


});





/*=====  End of VALIDAR MAIL EXISTENTE EN DB  ======*/







/*=============================================
VALIDAR REGISTRO
=============================================*/
function validarRegistro() {
    var usuario = document.querySelector("#usuarioRegistro").value;
    var password = document.querySelector("#passwordRegistro").value;
    var email = document.querySelector("#emailRegistro").value;
    var terminos = document.querySelector("#terminos").checked;


    /* VALIDAR USUARIO */
    if (usuario != "") {
        var caracteres = usuario.length;
        var expresion = /^[a-zA-Z0-9]*$/;
        if (caracteres > 6) {
            document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>Escriba por favor menos de 6 caracteres.";
            return false;
        }
        if (!expresion.test(usuario)) {
            document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>No escriba caracteres especiales.";
            return false;
        }
    }





    /* VALIDAR PASSWORD */
    if (password != "") {
        var caracteres = password.length;
        var expresion = /^[a-zA-Z0-9]*$/;
        if (caracteres < 6) {
            document.querySelector("label[for='passwordRegistro']").innerHTML += "<br>Escriba por favor más de 6 caracteres.";
            return false;
        }
        if (!expresion.test(password)) {
            document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>No escriba caracteres especiales.";
            return false;
        }
    }




    /* VALIDAR EMAIL*/
    if (email != "") {
        var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
        if (!expresion.test(email)) {
            document.querySelector("label[for='emailRegistro']").innerHTML += "<br>Escriba correctamente el Email.";
            return false;


        }
    }




    /* VALIDAR TÉRMINOS*/
    if (!terminos) {
        document.querySelector("form").innerHTML += "<br>No se logró el registro, acepte términos y condiciones!.";
        document.querySelector("#usuarioRegistro").value = usuario;
        document.querySelector("#passwordRegistro").value = password;
        document.querySelector("#emailRegistro").value = email;
        return false;
    }
    return true;
}
/*=====  FIN VALIDAR REGISTRO  ======*/