var settingVisibility = false;

function showSettings() {
    if (settingVisibility) {
        document.getElementById("settingspanel").style.display = "none";
        settingVisibility = false;
    } else {
        document.getElementById("settingspanel").style.display = "block";
        settingVisibility = true;
    }
}