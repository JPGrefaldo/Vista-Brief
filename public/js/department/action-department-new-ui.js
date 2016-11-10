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

	function _render() {
		//
	}

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