/* Files Upload jQuery */

$(document).ready(function(){
	$("#file").on("change", function() {
		var files = $(this)[0].files;

		if(files.length >= 2) {
			$("#label_span").text(files.length + " files ready to upload");

		} else {
			var filename = "1 file ready to upload";
			$("#label_span").text(filename);
		}
	
	});

});