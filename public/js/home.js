/*globals $:false */
/*jslint vars: true, plusplus: true, devel: true, nomen: true, indent: 4, maxerr: 50 */ /*global define */

$(function(){
    "use strict";
    $('[data-toggle="tooltip"]').tooltip();
    $(".side-nav .collapse").on("hide.bs.collapse", function() {
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
    });
    $('.side-nav .collapse').on("show.bs.collapse", function() {
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");
    });
})

    /*$(window).ready(function(){
        "use strict";
        function format ( d ) {
            console.log(d);
            alert(3)
            // `d` is the original data object for the row
            var returnLayout = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                '<tr>'+
                '<td>Link produto:</td>'+
                '<td><a target="_blank" href="'+d.anuncio+'">'+d.anuncio+'</a></td>'+
                '</tr>'+
                '<tr>'+
                '<td>'+d.status+'</td>'+
                '</tr>';

            if(d.concorrentes.length > 0){
                returnLayout = returnLayout + '<tr><td>Concorrentes: </td></tr>';
                $(d.concorrentes).each(function (index, item){
                    returnLayout = returnLayout + '<tr>' +
                        '<td>'+item.nome+'</td>'+
                        '<td>R$'+item.preco.toFixed(2)+'</td>'+
                        '</tr>';
                });

            }
            return returnLayout;
        }

        var concorrente_data_table = $('#relatorioTable').DataTable({
            "ajax": "{{url('api/relatorio')}}",
            "columns": [
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },
                { "data": "mktplace_id"},
                { "data": "nome"},
                { "data": "marca"},
                { "data": "categoria"},
                { "data": "ultima_alteracao"},
                { "data": "precoR"},
                { "data": "buybox"},
                { "data": "difReais"},
                { "data": "difPorc"},
                { "data": "status"}
            ],
            "order": [[3, 'asc']]
        });

        $('#relatorioTable tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = concorrente_data_table.row( tr );

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
        } );


    });*/

$(document).ready(function() {
    "use strict";
    $('#relatorioTable').DataTable( {
        "ajax": "{{url('api/relatorio')}}"
    } );
} );

$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});