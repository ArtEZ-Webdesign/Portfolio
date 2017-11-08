let thumbnails = document.querySelectorAll('.slide-thumbnail');

let fullsize = document.querySelector('.slide-current-image');
let caption = document.querySelector('.slide-current-caption');

for (let i=0; i<thumbnails.length; i++) {
	thumbnails[i].addEventListener('click', thumbnailClicked);
}

function thumbnailClicked() {
	fullsize.style.backgroundImage = 'url("' + this.dataset.imageUrl + '")';

	caption.innerHTML = this.dataset.imageCaption;
}
