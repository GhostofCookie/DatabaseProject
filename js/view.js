window.onload = function()
{
	var prevBlock;
	var block;
	
	document.getElementById("carsbtn").addEventListener("click", function() {
		BoxClick(document.getElementById("carsform"));
	});
	document.getElementById("salesbtn").addEventListener("click", function() {
		BoxClick(document.getElementById("salesform"));		
	});
	document.getElementById("salespersonbtn").addEventListener("click", function() {
		BoxClick(document.getElementById("salespersonform"));
	});
	document.getElementById("warrantiesbtn").addEventListener("click", function() {
		BoxClick(document.getElementById("warrantiesform"));
	});
	document.getElementById("paymentsbtn").addEventListener("click", function() {
		BoxClick(document.getElementById("paymentform"));
	});
	
	function BoxClick(obj) {
		prevBlock = block;
		block = obj;
		
		if (prevBlock != null)
			prevBlock.classList.toggle("viewsforms__form--active");
		block.classList.toggle("viewsforms__form--active");
	}
}