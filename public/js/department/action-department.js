// $(document).ready(function(){
// 	alert('ready na')
// });
var input_name;
var input_email;
var modal_btn;
var errors = [];

$(document).ready(function() {

	// SHOW ADD Box
	$('#add-department-btn').click(function(){
		$btn = $(this)
		$btn_cancel2 = $btn.next('button#add-department-cancel2')
		$tbody_list = $(this).closest('tbody#tbody-department-list')
		$tr = $('#tr-department-new');

		if ($btn.hasClass('unclickable')) { return false }

		// prevent the other actionbox to be clickable
		make_other_action_unclickable()

		// hide add button then show cancel2 button
		$btn.addClass('hide')
		$btn_cancel2.removeClass('hide')
		$tr.removeClass('hide');

		// focus in the input name
		$tr.find('input[name="new_name"]').focus()
	})

	// HIDE ADD Box
	$('#add-department-cancel').click(function() {
		$container = $(this).closest('tr')
		$tbody_list = $(this).closest('tbody#tbody-department-list')
		$btn_cancel2 = $('button#add-department-cancel2')
		$btn_add = $('#add-department-btn')
		$error_box = $('#error-messages')

		// make the other actionbox clickable again
		make_other_action_clickable_again()

		// re-hide the error box if its not hidden
		if ( !$error_box.hasClass('hide') )
			$error_box.addClass('hide')

		errors = []

		$btn_cancel2.addClass('hide')
		$btn_add.removeClass('hide')
		$container.addClass('hide');
	})

	// HIDE ADD Box via Cancel2 button
	$('#add-department-cancel2').click(function() {
		$btn_cancel2 = $(this)
		$container = $('tr#tr-department-new')
		$tbody_list = $(this).closest('tbody#tbody-department-list')
		$btn_add = $('#add-department-btn')
		$error_box = $('#error-messages')

		// make the other actionbox clickable again
		make_other_action_clickable_again()

		// re-hide the error box if its not hidden
		if ( !$error_box.hasClass('hide') )
			$error_box.addClass('hide')

		$btn_cancel2.addClass('hide')
		$btn_add.removeClass('hide')
		$container.addClass('hide');
	})

	// ACTION: ADD NEW
	$('#add-department-save').click(function() {
		$btn = $(this)		
		$container = $(this).closest('tr')
		$input_name = $container.find('input[name="new_name"]')
		$input_email = $container.find('input[name="new_email"]')
		$error_box = $('#error-messages')

		// re-hide the error box if its not hidden
		if ( !$error_box.hasClass('hide') )
			$error_box.addClass('hide')

		// clear the erros message on errorbox
		$error_box.find('ul').text('')

		// return false if not valid input
		if ( !input_must_not_be_empty($input_name.val(), $input_email.val()) ) {
			errors.forEach(show_error_message)
			return false	
		}

		save_new_department($input_name.val(), $input_email.val())

	})

	// SHOW EDIT Box
	$('.action-edit').click(function(){
		$tr = $(this).closest('tr')
		$tbody_list = $tr.closest('tbody#tbody-department-list')

		$actionbox = $tr.find('div.actionbox')
		$editingbox = $tr.find('div.editingbox')

		// failsafe: in case the the css(unclickable) is not working in some browser, add another js security
		if($actionbox.hasClass('unclickable')) { return false }

		// prevent the other actionbox to be clickable
		make_other_action_unclickable()

		// hide and edit/remove button and show the save/cancel button for editing
		$actionbox.addClass('hide')
		$editingbox.removeClass('hide')

		$input_name = $tr.find("input[name='name']")
		$input_email = $tr.find("input[name='email']")		

		// make the 2 input to be editable
		$input_name.removeAttr('disabled')
		$input_email.removeAttr('disabled')

		// push the input value to be able to revert back if cancelled 
		input_name = $input_name.val()
		input_email = $input_email.val()

		// focus on the input name
		$input_name.focus()
	})

	// CANCEL EDIT Box
	$('.action-edit-cancel').click(function(){
		$tr = $(this).closest('tr')
		$tbody_list = $tr.closest('tbody#tbody-department-list')

		$actionbox = $tr.find('div.actionbox')
		$editingbox = $tr.find('div.editingbox')

		// make the other actionbox clickable again
		make_other_action_clickable_again()

		// hide and edit/remove button and show the save/cancel button for editing
		$actionbox.removeClass('hide')
		$editingbox.addClass('hide')

		$input_name = $tr.find("input[name='name']")
		$input_email = $tr.find("input[name='email']")

		// make the 2 input to be non-editable
		$input_name.attr('disabled','')
		$input_email.attr('disabled', '')

		// revert back the initial value if changed
		$input_name.val(input_name)
		$input_email.val(input_email)
	})

	// SAVE EDIT Box
	$('.action-edit-save').click(function(){
		$btn = $(this)
		$tr = $btn.closest('tr')
		$actionbox = $tr.find('.actionbox')
		$editingbox = $tr.find('.editingbox')
		$input_id = $tr.find('input[name="id"]')
		$input_name = $tr.find('input[name="name"]')
		$input_email = $tr.find('input[name="email"]')

		// delete the html of error message if exists
		$('tr#editing-error-tr').remove()
		// show error message & return false if input is not valid
		if ( !input_must_not_be_empty($input_name.val(), $input_email.val()) ) {
			var ul_error_msg = ""
			errors.forEach(function(val){
				ul_error_msg += '<li>'+val+'</li>'
			})

			$tr.after('<tr id="editing-error-tr"><td colspan="2"><div class="alert alert-danger"><ul>'+ul_error_msg+'</ul></div></td><td></td></tr>')
			return false	
		}

		save_edited_department($tr, $input_name.val(), $input_email.val(), $input_id.val())
	})

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
	})
	$('#modal-remove-department').on('show.bs.modal', function(event){
		var button = modal_btn
		var name = button.data('dname')
		var email = button.data('demail')
		var id = button.data('did')

		var modal = $(this)
		modal.find('#department-name').text(name)
		modal.find('#id-to-be-deleted').val(id)
	})

	$('#remove-department-save').click(function(){
		$modal = $('#modal-remove-department')
		var id = $modal.find('#id-to-be-deleted').val()
		
		if (!$.isNumeric(id)) {
			console.log('fatal error: department id is invalid!')
			$modal.modal('toggle')
			return false
		}
		$modal.modal('toggle')
		delete_department(id)
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

function input_must_not_be_empty(name, email) {
	errors = []

	if ( !$.trim(name) ) {
		errors.push('Department name cannot be empty.')
	}

	if ( !$.trim(email) ) {
		errors.push('Routing email cannot be empty.')
	}

	if ( errors.length > 0 )
		return false;
	else
		return true
}

function show_error_message(value, index, array) {
	$error_box = $('#error-messages')

	$error_box.find('ul').append("<li>"+value+"</li>")

	$error_box.removeClass('hide')
}

function save_new_department(name, email) {

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$.ajax({
		type: 'POST',
		url: "/ajax/departments/new/save",
		data: { name: name, email: email },
		success: function(data){
			if (data == 'success') {
				location.reload()
			}
		},
		error: function(xhr, status, response) {
			var error = jQuery.parseJSON(xhr.responseText)
			// console.log(error)
			var $error_box = $('#error-messages')
			$error_box.addClass('hide').find('ul').empty()
			for(var k in error.message) {
				if (error.message.hasOwnProperty(k)) {
					error.message[k].forEach(function(val) {
						$error_box.find('ul').append('<li>'+val+'</li>')
					})
				}
			}
			$error_box.removeClass('hide')
		},
	})
	.done(function(data) {
		// console.log(data)
	})
}

function save_edited_department($tr, name, email, id) {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$.ajax({
		type: 'POST',
		url: "/ajax/departments/edit/save",
		data: { name:name, email:email, id:id },
		success: function(data){
			if (data == 'success') {
				location.reload()
			}
		},
		error: function(xhr, status, response) {
			var error = jQuery.parseJSON(xhr.responseText)
			// console.log(error)
			var ul_error_msg = ""
			for(var k in error.message) {
				if (error.message.hasOwnProperty(k)) {
					error.message[k].forEach(function(val) {
						ul_error_msg += '<li>'+val+'</li>'
					})
				}
			}
			$tr.after('<tr id="editing-error-tr"><td colspan="2"><div class="alert alert-danger"><ul>'+ul_error_msg+'</ul></div></td><td></td></tr>')
			return false
		},
	})
	.done(function(data) {
		// console.log(data)
	})
}

function delete_department(id) {
	// return false
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$.ajax({
		type: 'POST',
		url: "/ajax/departments/delete",
		data: { id:id },
		success: function(data){
			if (data == 'success') {
				location.reload()
			}
		},
		error: function(xhr, status, response) {
			// not expecting error except, internal error
		},
	})
	.done(function(data) {
		console.log(data)
	})
}