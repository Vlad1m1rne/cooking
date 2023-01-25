$(document).ready(function(){
$('.dn').on({
  "click" : function(){ $('body').toggleClass('night');
  if($('body').attr('class') == 'night'){
    $('.dn').attr('src',"./images/day.png");
    $("li img").attr("src","./images/arrow2.png");
  }
  else{ $('.dn').attr('src',"./images/night.png");
  $("li img").attr("src","./images/arrow1.png");
}
}


});












});