// $(document).ready(function(){
// 	alert('ready na')
// });
var input_name;
var input_email;
var modal_btn;

$('#add-department-btn').click(function(){
	$container = $('#tr-department-new');
	$container.removeClass('hide');
});

$('#new-department-cancel').click(function() {
	$container = $(this).closest('tr')
	$container.addClass('hide');
});

$('.action-edit').click(function(){
	$container = $(this).closest('tr');

	$actionbox = $container.find('div.actionbox');
	$editingbox = $container.find('div.editingbox');

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

$('.action-cancel').click(function(){
	$container = $(this).closest('tr');

	$actionbox = $container.find('div.actionbox');
	$editingbox = $container.find('div.editingbox');

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

$('.action-remove').click(function(){
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