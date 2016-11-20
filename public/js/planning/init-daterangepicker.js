
$(document).ready(function() {

	var $parent_element = $('#newplanningwrapper')

	// Quote Required by
	var $pitch_quote_date = $parent_element.find('input[name="pitch_quote_date"]')
	var $btn_pitch_quote_date = $parent_element.find('#btn_pitch_quote_date')
	$pitch_quote_date.daterangepicker({
		singleDatePicker: true,
		'opens': 'center',
		locale: {
			firstDay: 1,
		},
	})
	$btn_pitch_quote_date.click(function() {
		$pitch_quote_date.trigger('click')
	})

	// Proposed Required by
	var $ideal_qa_date = $parent_element.find('input[name="ideal_qa_date"]')
	var $btn_ideal_qa_date = $parent_element.find('#btn_ideal_qa_date')
	$ideal_qa_date.daterangepicker({
		singleDatePicker: true,
		'opens': 'center',
		locale: {
			firstDay: 1,
		},
	})
	$btn_ideal_qa_date.click(function() {
		$ideal_qa_date.trigger('click')
	})

	// 1st Stage Required by
	var $ideal_review_date = $parent_element.find('input[name="ideal_review_date"]')
	var $btn_ideal_review_date = $parent_element.find('#btn_ideal_review_date')
	$ideal_review_date.daterangepicker({
		singleDatePicker: true,
		'opens': 'center',
		locale: {
			firstDay: 1,
		},
	})
	$btn_ideal_review_date.click(function() {
		$ideal_review_date.trigger('click')
	})

	// Projects Delivered by
	var $project_deadline_date = $parent_element.find('input[name="project_deadline_date"]')
	var $btn_project_deadline_date = $parent_element.find('#btn_project_deadline_date')
	$project_deadline_date.daterangepicker({
		singleDatePicker: true,
		'opens': 'center',
		locale: {
			firstDay: 1,
		},
	})
	$btn_project_deadline_date.click(function() {
		$project_deadline_date.trigger('click')
	})

})