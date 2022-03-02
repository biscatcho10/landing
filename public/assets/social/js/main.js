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
    parallaxIt(".mov_svg", 20);
    parallaxIt(".rean_svg", -20);
  }
  mouse.moved = true;
});

function parallaxIt(target, movement) {
  TweenMax.to(target, 0.7, {
    x: ((mouse.x - rect.width) / rect.width) * movement,
    y: ((mouse.y - rect.height / 2) / rect.height) * movement,
  });
}
