/*
filedrag.js - HTML5 File Drag & Drop demonstration
*/

	// getElementById
	function $id(id) {
	}


	// output information
	function Output(msg) {
	}


	// file drag hover
	function FileDragHover(e) {


	// file selection
	function FileSelectHandler(e) {
		FileDragHover(e);
		}

		// display an image
			reader.readAsDataURL(file);
		}

		// display text
		if (file.type.indexOf("text") == 0) {
			var reader = new FileReader();
		}

	}


	// upload JPEG files
	function UploadFile(file) {
		var fileExt=getExtension(file.name);
		
					if(xhr.status == 200)Output(xhr.responseText);
}


	// initialize
	function Init() {
		// file select
		// is XHR2 available?
   }

	// call initialization file
	if (window.File && window.FileList && window.FileReader) {
})();



function getExtension(filename) {
    var parts = filename.split('.');
    return parts[parts.length - 1];
}