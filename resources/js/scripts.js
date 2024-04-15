
function changeTextSize() {
  var textElement = document.getElementById("text");
  var currentSize = window.getComputedStyle(textElement).fontSize;
  var newSize = parseInt(currentSize) + 2 + "px"; // Increase size by 2 pixels
  textElement.style.fontSize = newSize;
}

function changeTextSize() {
  var paragraphs = document.querySelectorAll("#description, #price");
  paragraphs.forEach(function(paragraph) {
      paragraph.style.fontSize = "20px";
  });
}
