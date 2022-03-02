var rect = $("#container")[0].getBoundingClientRect();
var mouse = { x: 0, y: 0, moved: false };

$("#container").mousemove(function (e) {
  mouse.moved = true;
  mouse.x = e.clientX - rect.left;
  mouse.y = e.clientY - rect.top;
});

// Ticker event will be called on every frame
TweenLite.ticker.addEventListener("tick", function () {
  if (mouse.moved) {
    parallaxIt(".slide", -15);
    parallaxIt(".distance", -6);
    parallaxIt(".approach", 7);
    // parallaxIt(".background_svg", -7);
  }
  mouse.moved = true;
});

function parallaxIt(target, movement) {
  TweenMax.to(target, 0.3, {
    x: ((mouse.x - rect.width / 2) / rect.width) * movement,
    y: ((mouse.y - rect.height / 2) / rect.height) * movement,
  });
}
// const div = document.querySelector(".background_svg");
// document.querySelector(".container_").addEventListener("mousemove", (e) => {
//   let x = e.layerX;
//   let y = e.layerY;
//   div.style.backgroundPosition = `${x / 100}px ${y / 100}px`;
// });
