function getProgram() {
	var bidang = $("#bidang").val();
	$.ajax({
		method	: "POST",
		url		: "ajax/getProgram.php",
		data	: "bidang=" + bidang,
		success:function(html){
			$("#program").html(html);
		}
	});
}

function goSearch(page) {
	var key = $("#search").val(); 
	window.location=(page + ".php?key=" + key);
}