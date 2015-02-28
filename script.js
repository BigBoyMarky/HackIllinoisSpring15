// var settingVisibility = false;

// function showSettings() {
//     if (settingVisibility) {
//         document.getElementById("settingspanel").style.display = "none";
//         settingVisibility = false;
//     } else {
//         document.getElementById("settingspanel").style.display = "block";
//         settingVisibility = true;
//     }
// }

/*function showSettings() { 
    if (document.getElementById("settingspanel").style.display==="block") {
        document.getElementById("settingspanel").style.display = "none"; 
    } else { 
        $("#settingspanel").slideDown(450);; 
    }
}*/

function showSettings() { 
	if(document.getElementById("settingspanel").style.display==="block") { 
		$("#settingspanel").slideUp(450); 
	} 
	else { 
		$("#settingspanel").slideDown(450); 
	} 
}