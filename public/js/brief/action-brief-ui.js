
var departmentModule = (function(){
	//cache DOM
	var $el = $('#departmentCBModule')
	var $cboxDepartments = $el.find('input[type="checkbox"]')
	var $attachFileBlock = $('#departmentAttachmentListBlock')
	//liDFile

	//bind events
	$cboxDepartments.on('click', scanCheckbox)

	_onLoad()

	function scanCheckbox(e) {
		var $input = $(e.target)
		if ($input.is(':checked')) {
			showAttachedFile($input.val())
		} else {
			hideAttachedFile($input.val())
		}
	}

	function showAttachedFile(id) {
		var $liFile = $attachFileBlock.find('li#liDFile-'+id)

		$liFile.removeClass('hide')
	}

	function hideAttachedFile(id) {
		var $liFile = $attachFileBlock.find('li#liDFile-'+id)

		$liFile.removeClass('hide')
		$liFile.addClass('hide')
	}

	function scanAllCheckbox() {		
		$cboxDepartments.each(function(){
			var $input = $(this)
			if($input.is(':checked')) {
				showAttachedFile($input.val())
			}
		})
	}

	function _onLoad() {
		scanAllCheckbox()
	}

	
})()

$(document).ready(function() {
	$('[data-toggle="tooltip"]').tooltip()

	updatePanelColor();

	$('#select-projectstatus').change(function() {
		var $selected = $(this).find('option:selected')
		var $panel = $('.brief-panel')

		if ( $selected.val() ) {
			var color = $selected.attr('data-color')

			if (color == 'Red') {
				$panel.removeClass('panel-default panel-info')
				$panel.addClass('panel-danger')
				return
			}
			else if (color =='Blue') {
				$panel.removeClass('panel-default panel-danger')
				$panel.addClass('panel-info')
				return
			}
		}

		// back to default
		$panel.removeClass('panel-info panel-danger')
		$panel.addClass('panel-default')
		return
	})
})

function updatePanelColor() {
	var $select_projectstatus = $('#select-projectstatus')
	var $selected = $select_projectstatus.find('option:selected')
	var $panel = $('.brief-panel')

	if ( $selected.val() ) {
		var color = $selected.attr('data-color')

		if (color == 'Red') {
			$panel.removeClass('panel-default panel-info')
			$panel.addClass('panel-danger')
			return
		}
		else if (color =='Blue') {
			$panel.removeClass('panel-default panel-danger')
			$panel.addClass('panel-info')
			return
		}
	}

	// back to default
	$panel.removeClass('panel-info panel-danger')
	$panel.addClass('panel-default')
	return
}