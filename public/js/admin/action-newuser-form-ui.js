

$(document).ready(function() {

	var $form = $('#form-newuser')
	var $username = $form.find('input[name="username"]')
	var $forename = $form.find('input[name="forename"]')
	var $surname = $form.find('input[name="surname"]')
	var $email = $form.find('input[name="email"]')

	var $btn_make_editable = $('.make_editable')

	$forename.change(function(){
		updateUsername($username, $forename, $surname)
		updateEmail($email, $forename, $surname)
	})

	$surname.change(function(){
		updateUsername($username, $forename, $surname)
		updateEmail($email, $forename, $surname)
	})

	$btn_make_editable.click(function(){
		$(this).closest('div.input-group').find('input').removeAttr('readonly')
	})
})


function updateUsername($username, $forename, $surname) {
	var nameFilled = true

	if ( $forename.val().trim() == '' )
		nameFilled = false
	if ( $surname.val().trim() == '' )
		nameFilled = false

	if (!nameFilled)
		return false

	$username.val($forename.val().toLowerCase()+ '.' + $surname.val().toLowerCase())
}

function updateEmail($email, $forename, $surname) {
	var nameFilled = true

	if ( $forename.val().trim() == '' )
		nameFilled = false
	if ( $surname.val().trim() == '' )
		nameFilled = false

	if (!nameFilled)
		return false

	$email.val($forename.val().toLowerCase() + '.' + $surname.val().toLowerCase())
}