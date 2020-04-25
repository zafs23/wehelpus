
//clicked = true;

//$('.a').click(function(e) {
//    e.preventDefault();
//    $(this).css('background-color', 'red');
//})

//$('ul.nav a').click(function(){
//    var color = clicked ? 'red' : 'blue';
//    $(this).css('background-color', color);
//    clicked = !clicked;
//});



$(":a").click(function(){
  $(this).toggleClass('clicked');
});