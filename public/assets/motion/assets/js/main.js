var rect = $("#sec__form")[0].getBoundingClientRect();
var mouse = { x: 0, y: 0, moved: false };

$("#sec__form").mousemove(function (e) {
  mouse.moved = true;
  mouse.x = e.clientX - rect.left;
  mouse.y = e.clientY - rect.top;
});

// Ticker event will be called on every frame
TweenLite.ticker.addEventListener("tick", function () {
  if (mouse.moved) {
    parallaxIt(".headphone_svg", -40);
  }
  mouse.moved = true;
});

function parallaxIt(target, movement) {
  TweenMax.to(target, -10, {
    x: ((mouse.x - rect.width) / rect.width) * movement,
    y: ((mouse.y - rect.height / 2) / rect.height) * movement,
  });
}

// my click button 
let myNum = 0;
document.querySelector(".my_video_one").addEventListener("click", (e) => {
  playVideo('one','onevid');
});
document.querySelector(".my_video_two").addEventListener("click", (e) => {
  playVideo("two");
});

// my function playVideo
function playVideo(pram, videosOne) {
  let vidOne = document.getElementById(`myVideoone`);
  let vidTwo = document.getElementById("myVideotwo");
  let svgVideoPaly = document.querySelector(`.my__video .svg_paly_${pram}`);
  let svgVideoStop = document.querySelector(`.my__video .svg_stop_${pram}`);
  // play my video one
  if (videosOne) {
    // close video two
    vidTwo.pause();
    vidOne.style.display = "block";
    // handle click video two
    if (document.querySelector(".play")) {
      vidTwo.style.display = "none";
      vidOne.classList.remove("play");
    }
    // toggle button icno
    document.querySelectorAll(".two").forEach((e) => {
      e.classList.remove("active");
    });
    document.querySelector(".svg_paly_two").classList.add("active");
    // play my video
    if (vidTwo.style.display == "block") {
      vidTwo.style.display = "none";
      vidOne.setAttribute("play-vidoe-one", "play");
    }
    if (vidOne.getAttribute("play-vidoe-one")) {
      vidOne.play();
      svgVideoStop.classList.toggle("active");
      svgVideoPaly.classList.toggle("active");
      vidOne.removeAttribute("play-vidoe-one");
    } else {
      vidOne.pause();
      svgVideoPaly.classList.toggle("active");
      svgVideoStop.classList.toggle("active");
      vidOne.setAttribute("play-vidoe-one", "play");
    }
    myNum = 1
  }
  // play my video two
  else {
    // close video one
    vidOne.pause();
    vidTwo.style.display = "block";
    // toggle button icno
    document.querySelectorAll(".one").forEach((e) => {
      e.classList.remove("active");
    });
    document.querySelector(".svg_paly_one").classList.add("active");
    // play my video
    if (vidOne.style.display == "block") {
      vidOne.style.display = "none";
      vidTwo.setAttribute("play-vidoe-one", "play");
    }
    if (vidTwo.getAttribute("play-vidoe-one") == "play") {
      vidTwo.play();
      vidTwo.removeAttribute("play-vidoe-one");
      svgVideoStop.classList.toggle("active");
      svgVideoPaly.classList.toggle("active");
    } else {
      vidTwo.pause();
      vidTwo.setAttribute("play-vidoe-one", "play");
      svgVideoPaly.classList.toggle("active");
      svgVideoStop.classList.toggle("active");
    }
    if (myNum == 0) {
      console.log(myNum);
      vidTwo.pause();
      myNum++;
      console.log(myNum);
    }else if (myNum == 1) {
      vidTwo.play();
      console.log(myNum);
      myNum++;
      vidTwo.removeAttribute("play-vidoe-one");
    }
  }
}
