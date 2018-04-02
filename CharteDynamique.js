// alert("hello")

// window.location.reload()


var PDF = document.getElementById("PDF")

PDF.addEventListener("click", function(){
		alert("hey")
	});

var Indd = "/Applications/Adobe InDesign CC 2017/Adobe InDesign CC 2017.app"

function execAppli(app) 
{
    var wshShell = new ActiveXObject("WScript.Shell");
    wshShell.Run(app+".exe", 1, true);
}
