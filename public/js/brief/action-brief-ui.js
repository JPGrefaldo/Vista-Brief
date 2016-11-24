
$(document).ready(function() {
	$('[data-toggle="tooltip"]').tooltip()

	updatePanelColor();

	$('#select-projectstatus').change(function() {
		var $selected = $(this).find('option:selected')
		var $panel = $('.brief-panel')

		if ( $selected.val() ) {
			var color = $selected.attr('data-color')

			if (color == 'Red') {
				$panel.removeClass('panel-brand1 panel-info')
				$panel.addClass('panel-brandred1')
				return
			}
			else if (color =='Blue') {
				$panel.removeClass('panel-brand1 panel-brandred1')
				$panel.addClass('panel-info')
				return
			}
		}

		// back to brand1
		$panel.removeClass('panel-info panel-brandred1')
		$panel.addClass('panel-brand1')
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
			$panel.removeClass('panel-brand1 panel-info')
			$panel.addClass('panel-brandred1')
			return
		}
		else if (color =='Blue') {
			$panel.removeClass('panel-brand1 panel-brandred1')
			$panel.addClass('panel-info')
			return
		}
	}

	// back to brand1
	$panel.removeClass('panel-info panel-brandred1')
	$panel.addClass('panel-brand1')
	return
}