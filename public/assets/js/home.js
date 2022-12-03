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


// Compte à rebours
const departMinutes = 5;
let temps = departMinutes * 60;

const timerElement = document.getElementById("timer");

setInterval(() => {
  let minutes = parseInt(temps / 60, 10);
  let secondes = parseInt(temps % 60, 10);

  minutes = minutes < 10 ? "0" + minutes : minutes;
  secondes = secondes < 10 ? "0" + secondes : secondes;

  timerElement.innerText = `${minutes}:${secondes}`;
  temps = temps <= 0 ? 0 : temps - 1;
}, 1000)