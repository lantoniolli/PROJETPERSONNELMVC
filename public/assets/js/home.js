var myText = document.getElementById("myText");
var wordCount = document.getElementById("wordCount");

myText.addEventListener("keyup", function () {
  var characters = myText.value.split("");
  wordCount.innerText = characters.length;
  if (characters.length > 300) {
    myText.value = myText.value.substring(0, 300);
    wordCount.innerText = 300;
  }
});

