
$(document).ready(function() {

	$('#select-client').change(function() {
		// console.log($(this).val())

		if($(this).val() == 'newclient') {
			var $modal_div = $('#modal-add-client')

			$modal_div.modal('toggle')
		}
	})
	$('#modal-add-client').on('hide.bs.modal', function(event){
		var $select_client = $('#select-client')
		$select_client.val('')
	})


})