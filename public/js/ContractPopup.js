/**
 * Created by p.rodionov on 20.03.2017.
 */
/**
 Событие вызывается в момент открытия modal

 data-toggle="modal"
 data-target="#myModal"

 $('#AnnexModal).on('show.bs.modal', function() {
 // сделать что-нибудь...
 })
 **/

function showAnnexModal( url ) {
    jQuery.get(url, function( data ) {
        response = $(data).find(".panel-default") ;
        $( ".modal-body" ).html( response );
        $("#AnnexModal").modal('show');
    })
};

