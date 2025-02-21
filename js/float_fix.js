function toggleSidebar(){
    var sidebar = document.getElementById("sidebar");
    if (sidebar) {
        // 切换自定义类.open，用于CSS中控制显示/隐藏
        sidebar.classList.toggle("open");
    }
	console.log(sidebar.classList)
}