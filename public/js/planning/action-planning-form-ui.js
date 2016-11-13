

$(document).ready(function() {

	//
	$('#btn-fakesubmit').click(function(e){
		e.preventDefault();

		var $form = $('#form-newplanning')
		var $btn_fakesubmit = $(this)
		var $btn_realsubmit = $('#btn-submit')

		var $pitch_quote_date = $form.find('input[name="pitch_quote_date"]')
		var $ideal_qa_date = $form.find('input[name="ideal_qa_date"]')
		var $ideal_review_date = $form.find('input[name="ideal_review_date"]')
		var $project_deadline_date = $form.find('input[name="project_deadline_date"]')

		var $modal = $('#modal-dates-not-allfiled')

		var all_filled = true
		
		if ( 
			$pitch_quote_date.val() == '' || 
			$ideal_qa_date.val() == '' || 
			$ideal_review_date.val() == '' || 
			$project_deadline_date.val() == '' ) {
			all_filled = false				
		}		

		if (!all_filled) {
			$modal.modal({backdrop: false})
		} else {
			$btn_realsubmit.trigger('click')
		}
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