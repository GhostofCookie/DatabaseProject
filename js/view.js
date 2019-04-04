window.onload = function()
{
	var prevBlock;
	var block;

	if(document.getElementById("carsbtn"))
	document.getElementById("carsbtn").addEventListener("click", function() {
		BoxClick(document.getElementById("carsform"));
	});
    if(document.getElementById("salesbtn"))
	document.getElementById("salesbtn").addEventListener("click", function() {
		BoxClick(document.getElementById("salesform"));		
	});
    if(document.getElementById("salespersonbtn"))
	document.getElementById("salespersonbtn").addEventListener("click", function() {
		BoxClick(document.getElementById("salespersonform"));
	});
    if(document.getElementById("warrantiesbtn"))
	document.getElementById("warrantiesbtn").addEventListener("click", function() {
		BoxClick(document.getElementById("warrantiesform"));
	});
    if(document.getElementById("paymentsbtn"))
	document.getElementById("paymentsbtn").addEventListener("click", function() {
		BoxClick(document.getElementById("paymentsform"));
	});
	
	function BoxClick(obj) {
		prevBlock = block;
		block = obj;
		
		if (prevBlock != null)
			prevBlock.classList.toggle("viewsforms__form--active");
		block.classList.toggle("viewsforms__form--active");
	}
}