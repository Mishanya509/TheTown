function hideBlocks(){
	document.getElementById("infoBlock").style.display = "none";
	document.getElementById("buildListBlock").style.display = "none";
}

function showCellInfo(){
	hideBlocks();
	document.getElementById("infoBlock").style.display = "block";
	var cell = selectedCell;
	var type = cell.getAttribute('data-building');
	document.getElementById("infoBlock").style.display = "block";
	document.getElementById("infoBlockText").innerHTML = type;
}

function showBuildListBlock(){
	hideBlocks();
	document.getElementById("buildListBlock").style.display = "block";
}