
var errors = []

$(document).ready(function() {

	$('#select-client').change(function() {
		// console.log($(this).val())

		if($(this).val() == 'newclient') {
			var $modal_div = $('#modal-add-client')

			$modal_div.modal('toggle')
		}
	})
	$('#modal-add-client').on('shown.bs.modal', function(event){
		$(this).find('input').focus()
	})
	$('#modal-add-client').on('hide.bs.modal', function(event){
		var $select_client = $('#select-client')
		if ($select_client.val() == 'newclient') 
			$select_client.val('')
	})

	$('#btn-client-create').click(function(){
		var $modal_view = $('#modal-add-client')
		var $input_newclient_name = $('#input-newclient-name')

		// init
		errors = []
		$modal_view.find('div#errorbox').remove()

		if ( !must_not_be_empty($input_newclient_name.val()) ) {
			show_newclient_error()
			return false
		}

		submit_newclient($input_newclient_name.val())

		return
	})
})


function must_not_be_empty(str) {
	if ( !$.trim(str) ) {
		errors.push('Client name must not be empty.')
	}

	if ( errors.length > 0 )
		return false
	else
		return true
}

function show_newclient_error() {
	var $modal_body = $('#modal-add-client div.modal-body')
	$modal_body.find('div#errorbox').remove()

	var li_error = ""
	errors.forEach(function(val){
		li_error += '<li>'+val+'</li>'
	})
	$modal_body.append('<div id="errorbox" class="m-sm p-sm alert-danger"><ul class="m-n">'+li_error+'</ul></div>')
	return
}

function show_newclient_response_error(errors) {
	var $modal_body = $('#modal-add-client div.modal-body')
	$modal_body.find('div#errorbox').remove()

	var li_error = ""
	for(var k in errors.message) {
		if (errors.message.hasOwnProperty(k)) {
			errors.message[k].forEach(function(val) {
				li_error += '<li>'+val+'</li>'
			})
		}
	}
	$modal_body.append('<div id="errorbox" class="m-sm p-sm alert-danger"><ul class="m-n">'+li_error+'</ul></div>')
}

function submit_newclient(clientname) {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$.ajax({
		type: 'POST',
		url: "/ajax/brief/post/create/newclient/save",
		data: { name: clientname },
		success: function(data){
			if (data == 'success') {
				$('#input-newclient-name').val('') // clear input of new client name
				ajaxget_client_list(clientname)
			}
		},
		error: function(xhr, status, response) {
			var error = jQuery.parseJSON(xhr.responseText)
			show_newclient_response_error(error)
			// console.log(error)
		},
	})
	.done(function(data) {
		// console.log(data)
	})
}

function ajaxget_client_list(clientname) {

	$.ajax({
		type: 'GET',
		url: "/ajax/brief/post/create/get/clients",
		data: { },
		dataType: 'JSON',
		success: function(data){			
			update_client_select_list(clientname, data)
		},
		error: function(xhr, status, response) {
			var error = jQuery.parseJSON(xhr.responseText)
			console.log(error)
		},
	})
	.done(function(data) {
		// console.log(data)
	})
}

function update_client_select_list(clientname, clientlist) {
	var $select_client_list = $('#newplanningwrapper').find('#select-client')

	var options = '<option value="">select</option>'

	for (var i=0; i<clientlist.length; i++) {
		var obj = clientlist[i]
		var selected = ""

		if ( obj['name'] == clientname ) {
			selected = 'selected'
		}

		options += '<option value="' +obj['id']+ '" ' +selected+ '>' +obj['name']+ '</option>'
	}

	options += '<option value="newclient">[new client]</option>'

	$select_client_list.html(options)
	

	// close modal view
	$('#modal-add-client').modal('toggle')
}