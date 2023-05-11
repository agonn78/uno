var registerShow = false;
var button = document.getElementById("clickButton");
var clickButton = function() {

    if (registerShow) {
        document.getElementById("registerCard").style.display = "none";
        document.getElementById("loginCard").style.display = "block";
        registerShow = false;
    } else {
        document.getElementById("registerCard").style.display = "block";
        document.getElementById("loginCard").style.display = "none";
        registerShow = true;
    }
}
