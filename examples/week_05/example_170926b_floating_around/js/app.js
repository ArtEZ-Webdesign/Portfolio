// querySelector will only return the first result
// querySelectorAll will return an array of all results

function distributeDivs() {
	let projectDivs = document.querySelectorAll('.project');

	for (let i=0; i < projectDivs.length; i++ ) {
		let projectDiv = projectDivs[i];

		projectDiv.style.left = (Math.random() * 90) + "%";
		projectDiv.style.top = (Math.random() * 90) + "%";
	}
}

distributeDivs();

let clickables = document.querySelectorAll('.clickable');

for (let i=0; i < clickables.length; i++ ) {
	let clickable = clickables[i];

	clickable.addEventListener('click', distributeDivs);
}
