function resizeImage(event, targetCanvas, mode, tWidth, tHeight, model, index) {
	var xThis = this;
	var file = event.target.files[0];
	this.dataErr['fotoKtp'] = '';
	if(file.type.match(/image\/jpeg/)) {
		var reader = new FileReader();
		reader.onload = function (readerEvent) {
			var image = new Image();
			image.onload = function (imageEvent) {
				newSize = {};
				if (!mode || mode == 'fitSmallest') {
					newSize = fitSmallest(image, tWidth, tHeight);
				} else if (mode == 'fitWidth') {
					newSize = fitSmallest(image, tWidth);
				}

				var canvas = document.createElement('canvas');
				canvas.width = newSize.width;
				canvas.height = newSize.height;
				canvas.getContext('2d').drawImage(image, 0, 0, newSize.width, newSize.height);
				
				const dataUrl = canvas.toDataURL('image/jpeg');
				model[index] = dataUrl;
				document.getElementById(targetCanvas).src = dataUrl;
			}
			image.src = readerEvent.target.result;

			
		}
		reader.readAsDataURL(file);
	} else {
		this.dataErr['fotoKtp'] = 'harus berformat gambar (jpeg)';
	}
}

function fitSmallest(image, tWidth, tHeight) {
	if(!tWidth)
		tWidth = 640;
	if(!tHeight)
		tHeight = 480;

	// Resize the image
	var width = image.width,
		height = image.height,
		maxWidth = tWidth,
		maxHeight = tHeight,
		widthRatio = 0,
		heightRatio = 0;
	
	widthRatio = maxWidth / width;
	heightRatio = maxHeight / height;

	if(widthRatio < heightRatio) {
		width = maxWidth;
		height = widthRatio * height;
	} else {
		width = heightRatio * width;
		height = maxHeight;
	}

	return { width, height }
}

function fitWidth(image, tWidth) {
	if(!tWidth)
		tWidth = 640;

	// Resize the image
	var width = image.width,
		height = image.height,
		maxWidth = tWidth,
		widthRatio = 0,
	
	widthRatio = maxWidth / width;
	height = widthRatio * height;

	return { tWidth, height }
}

function viewImageNewTab(elId) {
	var image = new Image();
	image.src = document.getElementById(elId).src;
	
	var w = window.open("");
	w.document.write(image.outerHTML);
}