
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