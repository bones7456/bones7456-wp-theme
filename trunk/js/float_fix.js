// This small script fix IE6/Win "float" bug
// Original Author: Aaron Boodman, [http://youngpup.net]

if (document.all && window.attachEvent) window.attachEvent("onload", fixWinIE);
function fixWinIE() {
	if (document.body.scrollHeight < document.all.sidebar.offsetHeight) {
		document.all.sidebar.style.display='block';
	}
}
function hide_sidebar(){
	document.getElementById("sidebar").style.display = "None";
	document.getElementById("content").style.marginRight = "0.5em";
	document.getElementById("footer").style.marginRight = "0.5em";
}

