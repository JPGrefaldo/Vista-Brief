var routingEmails = (function(){
	//var emails = [];

	//cache DOM
	var $el = $('#routingEmailModule')
	var $emailBlockTemplate = $('#emailBlockTemplate').html()
	//var $emailBlocks = $el.find('.emailBlocks')
	//var $inputs = $emailBlocks.find('input')
	var $removeBtns = $el.find('.btnRemoveEmail')
	var $AddBox = $el.find('#AddEmailBox')
	var $addBtn = $el.find('#btnAddEmail')

	//bind events
	$addBtn.on('click', addEmailBox)
	$el.delegate('button.btnRemoveEmail', 'click', removeEmailBox)

	//_render();

	//function _render() {
		//
	//}

	function addEmailBox(e){
		e.preventDefault()
		$AddBox.before($emailBlockTemplate)

		var $last = $el.find('.emailBlocks').last()
		$last.find('input').attr('name', 'email[]')
	}

	function removeEmailBox(e){
		e.preventDefault()
		$(e.target).closest('.emailBlocks').remove()		
	}	
})()

var attachFile = (function(){
	//cache DOM
	var $el = $('#attachfileModule')
	var $currentFileBlock = $el.find('#fileCurrent')
	var $btnUploadNew = $currentFileBlock.find('button#btnUploadNew')
	var $btnDeleteCurrentFile = $currentFileBlock.find('button#btnDeleteCurrent')

	var $fileUploadBlock = $el.find('#fileUploadBlock')
	var $fileInput = $fileUploadBlock.find('input')
	var $btnCancelUploadNew = $fileUploadBlock.find('button')

	var $currentFileDeletedBlock = $el.find('#fileDeletedBlock')
	var $inputDeletedFlag = $currentFileDeletedBlock.find('input')
	var $btnDeletedUndo = $currentFileDeletedBlock.find('button')

	//bind events
	$btnUploadNew.on('click', showfileUploadBlock)
	$btnCancelUploadNew.on('click', cancelUploadNew)
	$btnDeleteCurrentFile.on('click', showDeletedCurrentFile)
	$btnDeletedUndo.on('click', undoDeletedFile)

	function showfileUploadBlock(e) {
		e.preventDefault()
		//deletedFileFlagYes()
		
		hideCurrentFileBlock()
		hideCurrentFileDeletedBlock()		

		$fileUploadBlock.removeClass('hide')
	}

	function showDeletedCurrentFile(e) {
		e.preventDefault()
		deletedFileFlagYes()
		
		hideCurrentFileBlock()
		hideFileUploadBlock()

		$currentFileDeletedBlock.removeClass('hide')
	}

	function undoDeletedFile(e) {
		e.preventDefault()
		deletedFileFlagNo()
		
		hideCurrentFileDeletedBlock()
		hideFileUploadBlock()

		$currentFileBlock.removeClass('hide')
	}

	function cancelUploadNew(e) {
		e.preventDefault()
		clearFileInput()
		deletedFileFlagNo()
		
		hideCurrentFileDeletedBlock()
		hideFileUploadBlock()

		$currentFileBlock.removeClass('hide')
	}

	function clearFileInput() {
		$fileInput.val('')
	}

	function deletedFileFlagYes() {
		$inputDeletedFlag.val('1')
	}

	function deletedFileFlagNo() {
		$inputDeletedFlag.val('0')
	}

	function hideCurrentFileBlock() {
		$currentFileBlock.removeClass('hide')
		$currentFileBlock.addClass('hide')
	}

	function hideCurrentFileDeletedBlock() {
		$currentFileDeletedBlock.removeClass('hide')
		$currentFileDeletedBlock.addClass('hide')
	}

	function hideFileUploadBlock() {
		$fileUploadBlock.removeClass('hide')
		$fileUploadBlock.addClass('hide')
	}
})()