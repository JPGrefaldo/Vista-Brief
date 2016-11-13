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