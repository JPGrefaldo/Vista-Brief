
var editCLient = (function(){
	//cache DOM
	var $clientModule = 	$('#client-list-module')
	var $editTemplate_ = $('#client-edit-template').html()
	//var $nameBlock = $clientModule.find('.client-name-block')
	//var $editBlock = $clientModule.find('.client-edit-block')
	var $btnTriggerEdit = $clientModule.find('.action-trigger-edit')
	var $btnTriggerDelete = $clientModule.find('.action-delete')

	//bind events
	$btnTriggerEdit.on('click', prepareEditForm)
	$clientModule.delegate('button.btn-edit-cancel', 'click', cancelEditForm)

	function prepareEditForm(e) 
	{
		var $btn = $(e.target)

		if ($btn.closest('td').hasClass('disabled')) {
			return false
		}

		disableEditBtns()
		disableDeleteBtns()

		var $nameBlock = $btn.closest('tr').find('.client-name-block')
		var $editBlock = $nameBlock.siblings('.client-edit-block')
		var client_id = $btn.closest('td').find('.action-delete').attr('data-did')

		hideNameBlock($nameBlock)

		$editBlock.html($editTemplate_)
		$editBlock.find('input[name="name"]').val($nameBlock.html().trim())
		$editBlock.find('input[name="id"]').val(client_id)
	}

	function cancelEditForm(e) 
	{
		e.preventDefault()
		$btn = $(e.target)

		enableEditBtns()
		enableDeleteBtns()

		var $nameBlock = $btn.closest('tr').find('.client-name-block')
		var $editBlock = $nameBlock.siblings('.client-edit-block')

		showNameBlock($nameBlock)

		$editBlock.html('')
	}

	function hideNameBlock(nameBlock) 
	{
		nameBlock.addClass('hide')
	}

	function showNameBlock(nameBlock) 
	{
		nameBlock.removeClass('hide')
	}

	function disableEditBtns() 
	{
		$btnTriggerEdit.find('i').removeClass('text-brand-1').addClass('text-muted')
		$btnTriggerEdit.closest('td').addClass('disabled')
	}

	function disableDeleteBtns() 
	{
		$btnTriggerDelete.find('i').removeClass('text-danger').addClass('text-muted')
		$btnTriggerDelete.closest('td').addClass('disabled')
	}

	function enableEditBtns() 
	{
		$btnTriggerEdit.find('i').addClass('text-brand-1').removeClass('text-muted')
		$btnTriggerEdit.closest('td').removeClass('disabled')
	}

	function enableDeleteBtns() 
	{
		$btnTriggerDelete.find('i').addClass('text-danger').removeClass('text-muted')
		$btnTriggerDelete.closest('td').removeClass('disabled')
	}
})()