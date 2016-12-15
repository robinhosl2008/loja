/**
 * Created by Robson on 25/10/2016.
 */

if($('.alert').is(':visible')){
    $('.alert').fadeOut(4000);
}

function cadastrarUsuario(){
    $.ajax({
        method: 'POST',
        dataType: 'json',
        url: './cadastra-usuario.php',
        data: {
            email:     $("#email").val(),
            senha:     $("#senha").val(),
            confSenha: $("#confSenha").val()
        },
        success: function(data){
            alert(data);
        }
    });
}