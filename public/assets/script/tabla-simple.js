
//loarding
$(document).ready(function (){
// Bind normal buttons
Ladda.bind( '.ladda-button',{ timeout: 6000 });
// Bind progress buttons and simulate loading progress
Ladda.bind( '.progress-demo .ladda-button',{
    callback: function( instance ){
        var progress = 0;
        var interval = setInterval( function(){
            progress = Math.min( progress + Math.random() * 0.1, 1 );
            instance.setProgress( progress );

            if( progress === 1 ){
                instance.stop();
                clearInterval( interval );
            }
        }, 200 );
    }
});


});
//

    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<lf<t>ip>',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},
                {extend: 'print',
                 customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                }
                }
            ],
            "language": {
                            "lengthMenu": "Mostrar _MENU_ Registros",
                            "zeroRecords": "No se encontró registro.",
                            "info": "  _START_ de _END_ ( _TOTAL_ Registros Totales).",
                            "infoEmpty": "0 de 0 de 0 registros",
                            "infoFiltered": "(Encontrado de _MAX_registros)",
                            "search": "Buscar: ",
                            "processing": "Procesando la información",
                            "paginate": {
                                 "first": " |< ",
                                 "previous": "Ant.",
                                 "next": "Sig.",
                                 "last": " >| "
                             }
                         }

        });

    });

