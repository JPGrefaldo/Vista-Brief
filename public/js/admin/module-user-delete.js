
var deleteUserModule = (function() {
	//cache DOM
	var $el = $('#usersModule')
	var $btns_trigger_delete = $el.find('.action-delete')
	var $btn_trigger_delete_current
	var $modal = $('#modal-confirm-delete-user')
	var $modal_user_name = $modal.find('#user-name')
	var $modal_user_id = $modal.find('#id-to-be-deleted')
	var $modal_btn_confirm_delete = $modal.find('#btn-user-delete')
	var selected_user_name
	var selected_user_id

	//bind events
	$btns_trigger_delete.on('click', openModalDeleteUser)
	$modal.on('show.bs.modal', prepareModal)
	$modal_btn_confirm_delete.on('click', confirmDeleteUser)

	function openModalDeleteUser(e) {
		$btn_trigger_delete_current = $(e.target)

		$modal.modal('show')
	}

	function prepareModal(e) {
		selected_user_name = $btn_trigger_delete_current.attr('data-uname')
		selected_user_id = $btn_trigger_delete_current.attr('data-uid')

		$modal_user_name.text(selected_user_name)
		$modal_user_id.val(selected_user_id)
	}

	function confirmDeleteUser(e) {
		if (selected_user_id.trim() == '')
			return false

		window.location = '/admin/user/delete/'+selected_user_id
	}



})()