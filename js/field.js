var selectedCell = null;

function unselect(){
	selectedCell.firstChild.style.bottom = "0px";
	selectedCell.firstChild.style.right = "0px";
	selectedCell = null;
	hideBlocks();
}

function onCellClick(cell){
	if (selectedCell == cell){
		unselect();
	} else {
		if (selectedCell != null){
			unselect();
		} 
		selectedCell = cell;
		//selectedCell.style.boxShadow = '0 0 10px 2px black';

		selectedCell.firstChild.style.bottom = "20px";
		selectedCell.firstChild.style.right = "20px";

		type = selectedCell.getAttribute('data-building');
		if (type == "empty"){
			showBuildListBlock();
			return;
		}
		showCellInfo();
	}
}

var m = 5, n = 5;

function drawCellImages(){
	for (var i = 0; i < m; i++){
		for (var j = 0; j < n; j++){
			var cid = "c"+i+""+j;	
			var cell = document.getElementById(cid);
			var type = cell.getAttribute('data-building');
			cell.firstChild.src = "img/build/"+type+".png";
		}
	}
}

function clearSelectedCell(){
	if (selectedCell.getAttribute('data-building') == 'empty'){
		return;
	}

	selectedCell.setAttribute('data-building', 'empty');
	showBuildListBlock();
	refreshField(selectedCell.id);

}

function buildOnSelectedCell(type){
	//var money = 

	if (selectedCell.getAttribute('data-building') != 'empty'){
		return;
	}

	selectedCell.setAttribute('data-building', type);
	showCellInfo();
	refreshField(selectedCell.id);
}
