
$(document).ready(function() {

	var $parent_element = $('#newbriefwrapper')

	// Quote Required by
	var $quotereq = $parent_element.find('input[name="quotereq"]')
	var $btn_quotereq = $parent_element.find('#btn_quotereq')
	$quotereq.daterangepicker({
		singleDatePicker: true,
		'opens': 'center',
		locale: {
			firstDay: 1,
		},
	})
	$btn_quotereq.click(function() {
		$quotereq.trigger('click')
	})

	// Proposed Required by
	var $proposedreq = $parent_element.find('input[name="proposedreq"]')
	var $btn_proposedreq = $parent_element.find('#btn_proposedreq')
	$proposedreq.daterangepicker({
		singleDatePicker: true,
		'opens': 'center',
		locale: {
			firstDay: 1,
		},
	})
	$btn_proposedreq.click(function() {
		$proposedreq.trigger('click')
	})

	// 1st Stage Required by
	var $stagereq = $parent_element.find('input[name="stagereq"]')
	var $btn_stagereq = $parent_element.find('#btn_stagereq')
	$stagereq.daterangepicker({
		singleDatePicker: true,
		'opens': 'center',
		locale: {
			firstDay: 1,
		},
	})
	$btn_stagereq.click(function() {
		$stagereq.trigger('click')
	})

	// Projects Delivered by
	var $projdelivered = $parent_element.find('input[name="projdelivered"]')
	var $btn_projdelivered = $parent_element.find('#btn_projdelivered')
	$projdelivered.daterangepicker({
		singleDatePicker: true,
		'opens': 'center',
		locale: {
			firstDay: 1,
		},
	})
	$btn_projdelivered.click(function() {
		$projdelivered.trigger('click')
	})



})