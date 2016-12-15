
var panel_default = "panel-brand1"
var panel_one = "panel-brandltblue1"
var panel_two = "panel-bluegreen1"

$(document).ready(function() {
	$('[data-toggle="tooltip"]').tooltip()

	updatePanelColor();

	$('#select-projectstatus').change(function() {
		var $selected = $(this).find('option:selected')
		var $panel = $('.brief-panel')

		if ( $selected.val() ) {
			var selected_val = $selected.val()

			if (selected_val == 1) {
				$panel.removeClass(panel_default)
				$panel.removeClass(panel_two)
				$panel.addClass(panel_one)
				requiredColorDefault($panel)
				return
			}
			else if (selected_val == 2 || selected_val == 3) {
				$panel.removeClass(panel_default)
				$panel.removeClass(panel_one)
				$panel.addClass(panel_two)
				requiredColorDefault($panel)
				return
			}
		}

		// back to default		
		$panel.removeClass(panel_two)
		$panel.removeClass(panel_one)
		$panel.addClass(panel_default)
		requiredColorWhite($panel)
		return
	})
})

function updatePanelColor() {
	var $select_projectstatus = $('#select-projectstatus')
	var $selected = $select_projectstatus.find('option:selected')
	var $panel = $('.brief-panel')

	if ( $selected.val() ) {
		var selected_val = $selected.val()

		if (selected_val == 1) {
			$panel.removeClass(panel_default)
			$panel.removeClass(panel_two)
			$panel.addClass(panel_one)
			requiredColorDefault($panel)
			return
		}
		else if (selected_val == 2 || selected_val == 3) {
			$panel.removeClass(panel_default)
			$panel.removeClass(panel_one)
			$panel.addClass(panel_two)
			requiredColorDefault($panel)
			return
		}
	}

	// back to default
	$panel.removeClass(panel_two)
	$panel.removeClass(panel_one)
	$panel.addClass(panel_default)
	requiredColorWhite($panel)
	return
}

function requiredColorDefault(panel) {
	panel.find('.panel-required').addClass('custom-text-danger-1')
	panel.find('.panel-required').removeClass('text-white')
}

function requiredColorWhite(panel) {
	panel.find('.panel-required').removeClass('custom-text-danger-1')
	panel.find('.panel-required').addClass('text-white')
}