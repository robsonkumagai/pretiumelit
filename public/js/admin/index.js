jQuery(document).ready(function ($) {

    $(document).ready(function(){
    $("#cadBtn").click(function(){
        $("#cadModal").modal();
    });
});

$(function() {
    $('a[href*=#]:not([href=#],[data-toggle],[data-target],[data-slide])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
});

/*$('#CADASTRAR').on('click', function () {
    var $nome       = $('#NOME');
    var $cidade     = $('#CIDADE');
    var $email      = $('#EMAIL');
    var $telefone   = $('#TELEFONE');
    var $site       = $('#SITE');
    var $sugestao   = $('#SUGESTAO');

    var cadastro = {
        nome: $nome.val(),
        cidade: $cidade.val(),
        email: $email.val(),
        telefone: $telefone.val(),
        site: $site.val(),
        sugestao: $sugestao.val()
    };

    $.ajax({
        type: 'POST',
        url: '/portal/store',
        data: cadastro,
        success: function (data) {
            for(var i=0;data.length>i;i++){
                $('#tabela').append('<tr><td>'+data[i].id+'</td><td>'+data[i].nome+'</td><td>'+data[i].email+'</td><td>'+data[i].cpf+'</td><td>'+data[i].telefone+'</td></tr>');
            }
        }

    });
});*/


});

