/*
	script on submit button is click
	-to disable submit buttons
	-display animated loading image inside the submit button
	-change submit button's label into a `submitting message`
*/

var btnLoadingModule = (function(){
	//cache DOM
	var $btn_submit = $('#btn-submit')
	var $btn_submitting = $('#btn-submitting')

	//bind events
	$btn_submit.on('click', onSubmit)

	function onSubmit(e) {
		$btn_submit.hide()
		$btn_submitting.removeClass('hide')
	}
})()