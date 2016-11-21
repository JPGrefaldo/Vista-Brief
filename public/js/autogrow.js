

var autoGrowModule = (function(){
	//cache DOM
	var $jobSpec = $('#job_spec')

	//init
	autogrowHeight($jobSpec)

	//auto height
	function autogrowHeight(el) {
		//el.style.height = "5px"
		el.height(element.height())+"px"
		//alert(element.scrollHeight)
	}
})()