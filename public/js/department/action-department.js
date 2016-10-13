// $(document).ready(function(){
// 	alert('ready na')
// });
var input_name;
var input_email;
var modal_btn;

$(document).ready(function() {

	// SHOW ADD Box
	$('#add-department-btn').click(function(){
		$btn = $(this)
		$tbody_list = $(this).closest('tbody#tbody-department-list')
		$container = $('#tr-department-new');

		if ($btn.hasClass('unclickable')) { return false }

		// prevent the other actionbox to be clickable
		make_other_action_unclickable()

		$container.removeClass('hide');
	});

	// HIDE ADD Box
	$('#add-department-cancel').click(function() {
		$container = $(this).closest('tr')
		$tbody_list = $(this).closest('tbody#tbody-department-list')

		// make the other actionbox clickable again
		make_other_action_clickable_again()

		$container.addClass('hide');
	});

	// SHOW EDIT Box
	$('.action-edit').click(function(){
		$container = $(this).closest('tr');
		$tbody_list = $container.closest('tbody#tbody-department-list')

		$actionbox = $container.find('div.actionbox');
		$editingbox = $container.find('div.editingbox');

		// failsafe: in case the the css(unclickable) is not working in some browser, add another js security
		if($actionbox.hasClass('unclickable')) { return false }

		// prevent the other actionbox to be clickable
		make_other_action_unclickable()

		// hide and edit/remove button and show the save/cancel button for editing
		$actionbox.addClass('hide');
		$editingbox.removeClass('hide');

		$input_name = $container.find("input[name='name']");
		$input_email = $container.find("input[name='email']");

		// make the 2 input to be editable
		$input_name.removeAttr('disabled');
		$input_email.removeAttr('disabled');

		// push the input value to be able to revert back if cancelled 
		input_name = $input_name.val();
		input_email = $input_email.val();

	});


	$('.action-edit-cancel').click(function(){
		$container = $(this).closest('tr');
		$tbody_list = $container.closest('tbody#tbody-department-list')

		$actionbox = $container.find('div.actionbox');
		$editingbox = $container.find('div.editingbox');

		// make the other actionbox clickable again
		make_other_action_clickable_again()

		// hide and edit/remove button and show the save/cancel button for editing
		$actionbox.removeClass('hide');
		$editingbox.addClass('hide');

		$input_name = $container.find("input[name='name']");
		$input_email = $container.find("input[name='email']");

		// make the 2 input to be non-editable
		$input_name.attr('disabled','');
		$input_email.attr('disabled', '');

		// revert back the initial value if changed
		$input_name.val(input_name);
		$input_email.val(input_email);

	});

	// SHOW REMOVE Modal
	$('.action-remove').click(function(){
		$tbody_list = $(this).closest('tbody#tbody-department-list')
		$container = $(this).closest('tr');

		$actionbox = $container.find('div.actionbox');
		$editingbox = $container.find('div.editingbox');

		// failsafe: in case this button is suppose to be unclickable
		if($actionbox.hasClass('unclickable')) { return false }

		$modal_view = $('#modal-remove-department')

		modal_btn = $(this)
		$modal_view.modal({backdrop:false})
		// $modal_view.modal('show');


	});
	$('#modal-remove-department').on('show.bs.modal', function(event){
		var button = modal_btn
		var name = button.data('dname')
		var email = button.data('demail')

		var modal = $(this)
		modal.find('#department-name').text(name)
	})

})

function make_other_action_unclickable () {
	$tbody_list = $('tbody#tbody-department-list')

	$tbody_list.find('div.actionbox').each(function() {
		$(this).addClass('unclickable text-muted')
	});

	// disable add button
	$('#add-department-btn').removeClass('btn-success')
	$('#add-department-btn').addClass('unclickable btn-muted')
}

function make_other_action_clickable_again () {
	$tbody_list = $('tbody#tbody-department-list')

	$tbody_list.find('div.actionbox').each(function() {
		$(this).removeClass('unclickable text-muted')
	});

	// enabled back the add button
	$('#add-department-btn').removeClass('unclickable btn-muted')
	$('#add-department-btn').addClass('btn-success')
}