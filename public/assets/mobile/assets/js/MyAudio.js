let myAudio = document.getElementById("myAudio");
let clickBack = document.querySelector(".iconBack");
let clickNext = document.querySelector(".iconNext");
let inputRange = document.querySelector(".input_range");

// start src audio 
let ArryAudio = [
  "https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/1.mp3",
  "https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/2.mp3",
  "https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/3.mp3",
  "https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/4.mp3",
  "https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/5.mp3",
];
// start play or pause 
document.querySelector("#playAudio").addEventListener("click", (e) => {
  function togglePlay() {
    return myAudio.paused ? myAudio.play() : myAudio.pause();
  }
  togglePlay();
});
// satrt next audio  
i = 1;
clickNext.addEventListener("click", () => {
    if (i < ArryAudio.length) {
        myAudio.setAttribute("src", ArryAudio[i]);
        myAudio.play(); 
        i++
    }
});
// satrt back audio  
clickBack.addEventListener("click", () => {
    if (i > 1) {
        myAudio.setAttribute("src", ArryAudio[i-2]);
        myAudio.play(); 
        i--
    }
});
// start value audio 
inputRange.addEventListener('mousedown' , r => {
        inputRange.addEventListener('mousemove' , r => {
        myAudio.volume = inputRange.value / 100
    })
})
