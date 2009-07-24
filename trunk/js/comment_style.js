<script type="text/javascript">
/* <![CDATA[ */
function listExpand(list)
{
   list.style.height="auto";
   list.style.overflow="visible";
   list.style.backgroundColor="#303030";
}
function listContract(list)
{
   list.style.height="20px";
   list.style.overflow="hidden";
   list.style.backgroundColor="#202020";
}
var els = document.getElementsByTagName("li");
for (var i = 0; i < els.length; i++)
{
   if (els[i].parentNode.id=="recentcomments")
   { 
     els[i].onmouseover = function(){listExpand(this)};
     els[i].onmouseout = function(){listContract(this)};
     listContract(els[i]);
   }
}
/* ]]> */
</script>

