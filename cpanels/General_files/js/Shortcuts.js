$(document).keypress(function (e) {
var code = e.keyCode;
        var hh = "<ul class=list-group>\n\
<li class=list-group-item>التواصل<span class='label label-danger' id='lab'>&nbsp;&nbsp;Press+1</span></li>\n\
<li class=list-group-item>تطبيق متابع<span class='label label-primary' id='lab'>&nbsp;&nbsp;Press+2</span></li>\n\
<li class=list-group-item>الشروحات<span class='label label-success' id='lab'>&nbsp;&nbsp;Press+3</span></li>\n\
<li class=list-group-item> قصة اليوم<span class='label label-info' id='lab'>&nbsp;&nbsp;Press+4</span></li>\n\
<li class=list-group-item>التطبيقات<span class='label label-warning' id='lab'>&nbsp;&nbsp;Press+5</span></li>\n\
<li class=list-group-item> المدونة<span class='label label-danger' id='lab'>&nbsp;&nbsp;Press+6</span></li>\n\
<li class=list-group-item> اراء العملاء <span class='label label-default' id='lab'>Press+7</span></li>\n\
\n\
\n\
\n\
\n\
\n\
\n\
\n\
\n\
</li>\n\
</ul>";
        if (code == 49) {
var url = "../../pages/contact/spreadsheet.php";
        window.open(url, '_blank');
} else if (code == 50) {
var url = "../../pages/follower/spreadsheet.php";
        window.open(url, '_blank');
} else if (code == 51) {
var url = "../../pages/explanations/spreadsheet.php";
        window.open(url, '_blank');
} else if (code == 52) {
var url = "../../pages/story/spreadsheet.php";
        window.open(url, '_blank');
} else if (code == 53) {
var url = "../../pages/app/spreadsheet.php";
        window.open(url, '_blank');
} else if (code == 54) {
var url = "../../pages/blog/spreadsheet.php";
        window.open(url, '_blank');
} else if (code == 55) {
var url = "../../pages/testimonials/spreadsheet.php";
        window.open(url, '_blank');
}  else if (code == 104) {

Swal.fire({
title: "<i>Shortcut Assistant</i>",
        html: hh,
        confirmButtonText: " <u>Confirmation</u>",
});
} else if (code == 1575) {

Swal.fire({
title: "<i>Shortcut Assistant</i>",
        html: hh,
        confirmButtonText: " <u>Confirmation</u>",
});
}

});




