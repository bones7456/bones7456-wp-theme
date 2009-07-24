<script type="text/javascript">
/* <![CDATA[ */
// This small script fix IE6/Win "float" bug
// Original Author: Aaron Boodman, [http://youngpup.net]

if (document.all && window.attachEvent) window.attachEvent("onload", fixWinIE);
function fixWinIE() {
	if (document.body.scrollHeight < document.all.sidebar.offsetHeight) {
		document.all.sidebar.style.display='block';
	}
}
/* ]]> */
</script>
