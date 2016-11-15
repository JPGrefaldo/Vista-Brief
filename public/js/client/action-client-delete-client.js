
var modal_btn;

$(document).ready(function() {

	// SHOW REMOVE Modal
	$('.action-delete').click(function(){
		if ($(this).closest('td').hasClass('disabled')) {
			return false
		}
		$modal_view = $('#modal-confirm-delete-client')

		modal_btn = $(this)
		$modal_view.modal({backdrop:false})
		$modal_view.modal('show');
	})
	$('#modal-confirm-delete-client').on('show.bs.modal', function(event){
		var button = modal_btn
		var name = button.data('dname')
		var id = button.data('did')

		var modal = $(this)
		modal.find('#client-name').text(name)
		modal.find('#id-to-be-deleted').val(id)
	})

	$('#btn-client-delete').click(function(){
		var id = $('#id-to-be-deleted').val()
		window.location = '/admin/clients/delete/'+id
	})
})