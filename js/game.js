function getXmlHttp(){
	var xmlhttp;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
		}
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function setInfo(from, to){
var req = getXmlHttp()  
	var el = document.getElementById(to) ;
	req.onreadystatechange = function() {  
		if (req.readyState == 4) { 
			el.innerHTML = req.responseText;
			document.getElementById("loading").style.display = "none";
		}
	}
	document.getElementById("loading").style.display = "block";
	req.open('GET', from, true);  
	req.send(null);
}

window.onload=function(){
	startGame();
}

function startGame(){
	refresh();
}

function refresh(){
	refreshMail();
	refreshUserInfo();
	refreshField();
	refreshBuildList();
	/*drawCellImages();*/
}

function refreshMail(get=""){
	var url = 'php/mail.php' + get;
	setInfo(url, 'mailListUl');
}


function refreshBuildList(){
	setInfo('php/buildList.php','buildListUl')
}

function refreshField(cell=""){
	if (cell.startsWith('c')){
		setInfo('php/field.php?cell='+cell+'&type='+document.getElementById(cell).getAttribute('data-building'), cell);
	} else {
		setInfo('php/field.php','field')
	}
}

function refreshUserInfo(get=""){
	var url = 'php/user.php' + get;
	setInfo(url, 'userInfoUl');
}