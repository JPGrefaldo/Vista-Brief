
var allow_not_allfiled = false;

$(document).ready(function() {

	//
	$('#btn-fakesubmit').click(function(e){
		e.preventDefault();

		var $btn_fakesubmit = $(this)
		var $btn_realsubmit = $('#btn-submit')
		var $form = $('#form-newbrief')

		var $quotereq = $form.find('input[name="quotereq"]')
		var $proposedreq = $form.find('input[name="proposedreq"]')
		var $stagereq = $form.find('input[name="stagereq"]')
		var $projdelivered = $form.find('input[name="projdelivered"]')

		var $modal = $('#modal-dates-not-allfiled')

		var all_filled = true

		if (allow_not_allfiled == false) {
			if ( 
				$quotereq.val() == '' || 
				$proposedreq.val() == '' || 
				$stagereq.val() == '' || 
				$projdelivered.val() == '' ) {
				all_filled = false				
			}
		}

		if (!all_filled) {
			$modal.modal({backdrop: false})
		} else {
			$btn_realsubmit.trigger('click')
		}
		
		// location.hash = '#required_dates'
	})

	$('#confirm_submit_no').click(function(){
		var $modal = $('#modal-dates-not-allfiled')
		var $dates_anchor = $('#required_dates')

		$modal.modal('hide')

		$(document).scrollTop($dates_anchor.offset().top)
	})

	$('#confirm_submit_yes').click(function(){
		var $modal = $('#modal-dates-not-allfiled')
		var $btn_realsubmit = $('#btn-submit')

		$modal.modal('hide')

		$btn_realsubmit.trigger('click')
	})

})