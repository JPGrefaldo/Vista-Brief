/*
	script on submit button is click
	-to disable submit buttons
	-display animated loading image inside the submit button
	-change submit button's label into a `submitting message`
*/

var btnLoadingModule = (function(){
	//cache DOM
	var $btn_submit = $('#btn-fakesubmit')
	var $confirm_submit = $('#confirm_submit_yes')
	var $btn_draft = $('#btn-draft')
	var $btn_submitting = $('#btn-submitting')

	//bind events
	$confirm_submit.on('click', onSubmit)
	$btn_draft.on('click', onDraft)

	function onDraft(e) {		
		$btn_submit.hide()
		$btn_draft.hide()

		$btn_submitting.find('span').html('Submitting as Draft..')
		$btn_submitting.removeClass('hide')
	}

	function onSubmit(e) {
		$btn_submit.hide()
		$btn_draft.hide()
		$btn_submitting.removeClass('hide')
	}
})()