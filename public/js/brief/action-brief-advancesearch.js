


$(document).ready(function() {

	// SHOW Advance Search Modal
	$('#open-advancesearch-modal').click(function(){
		$modal_view = $('#modal-advance-search')

		// $modal_view.modal({backdrop:false})
		$modal_view.modal('show');
	})
	// $('#modal-confirm-delete-client').on('show.bs.modal', function(event){

	// 	var modal = $(this)
	// 	modal.find('#client-name').text(name)
	// 	modal.find('#id-to-be-deleted').val(id)
	// })

	// $('#btn-client-delete').click(function(){
	// 	var id = $('#id-to-be-deleted').val()
	// 	window.location = '/admin/clients/delete/'+id
	// })
})