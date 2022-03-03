var box = document.getElementsByClassName("box");
var btn = document.getElementsByClassName("entry_boxes");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
    box.style.display = "block";
}
span.onclick = function() {
    box.style.display = "none";
    }
window.onclick = function(event) {
    if (event.target == box) {
        box.style.display = "none";
    }
}
