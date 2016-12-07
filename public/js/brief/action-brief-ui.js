
var panel_default = "panel-brand1"
var panel_blue = "panel-brand1"
var panel_red = "panel-brandltblue1"

$(document).ready(function() {
	$('[data-toggle="tooltip"]').tooltip()

	updatePanelColor();

	$('#select-projectstatus').change(function() {
		var $selected = $(this).find('option:selected')
		var $panel = $('.brief-panel')

		if ( $selected.val() ) {
			var color = $selected.attr('data-color')

			if (color == 'Red') {
				// $panel.removeClass('panel-brand1 panel-info')
				$panel.removeClass(panel_default)
				$panel.removeClass(panel_blue)
				// $panel.addClass('panel-brandred1')
				$panel.addClass(panel_red)
				return
			}
			else if (color =='Blue') {
				// $panel.removeClass('panel-brand1 panel-brandred1')
				$panel.removeClass(panel_default)
				$panel.removeClass(panel_red)
				// $panel.addClass('panel-info')
				$panel.addClass(panel_blue)
				return
			}
		}

		// back to brand1
		// $panel.removeClass('panel-info panel-brandred1')
		$panel.removeClass(panel_blue)
		$panel.removeClass(panel_red)
		// $panel.addClass('panel-brand1')
		$panel.addClass(panel_default)
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
			// $panel.removeClass('panel-brand1 panel-info')
			$panel.removeClass(panel_default)
			$panel.removeClass(panel_blue)
			// $panel.addClass('panel-brandred1')
			$panel.addClass(panel_red)
			return
		}
		else if (color =='Blue') {
			// $panel.removeClass('panel-brand1 panel-brandred1')
			$panel.removeClass(panel_default)
			$panel.removeClass(panel_red)
			// $panel.addClass('panel-info')
			$panel.addClass(panel_blue)
			return
		}
	}

	// back to brand1
	// $panel.removeClass('panel-info panel-brandred1')
	$panel.removeClass(panel_blue)
	$panel.removeClass(panel_red)
	// $panel.addClass('panel-brand1')
	$panel.addClass(panel_default)
	return
}