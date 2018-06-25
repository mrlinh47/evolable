// Copy Function
function slc79_copyToClipboard(elementId) {
    var x = document.createElement("input");
    x.setAttribute("value", document.getElementById(elementId).innerHTML);
    document.body.appendChild(x);
    x.select();
    var y = document.execCommand("copy");
    document.body.removeChild(x);
}