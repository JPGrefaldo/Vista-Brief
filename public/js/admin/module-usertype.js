
var userTypeModule = (function(){
	//cache DOM
	var $el = $('#userTypeModule')
	var $btn_standard = $el.find('#btn_standard')
	var $btn_admin = $el.find('#btn_admin')
	var $input = $el.find('input')

	//bind events
	$btn_standard.on('click', selectStandard)
	$btn_admin.on('click', selectAdmin)

	init()

	function init() 
	{
		var currentSelected = $input.val()

		if(currentSelected == 'standard')
			changeToStandard()
		else if(currentSelected == 'admin')
			changeToAdmin()
		else
			changeToStandard()
	}

	function selectStandard(e) 
	{
		e.preventDefault()
		if (getCurrentSelected() == 'standard')
			return false
		
		changeToStandard()
	}

	function selectAdmin(e) 
	{
		e.preventDefault()
		if (getCurrentSelected() == 'admin')
			return false
		
		changeToAdmin()
	}

	function changeToStandard() {
		$input.val('standard')

		$btn_standard.removeClass('btn-default').addClass('btn-info')
		$btn_standard.find('span').removeClass('text-muted')

		$btn_admin.removeClass('btn-info').addClass('btn-default')
		$btn_admin.find('span').addClass('text-muted')
	}

	function changeToAdmin() {
		$input.val('admin')

		$btn_admin.removeClass('btn-default').addClass('btn-info')
		$btn_admin.find('span').removeClass('text-muted')

		$btn_standard.removeClass('btn-info').addClass('btn-default')
		$btn_standard.find('span').addClass('text-muted')
	}

	function getCurrentSelected() {
		return $input.val()
	}

})()