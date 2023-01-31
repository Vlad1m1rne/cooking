$(document).ready(function () {
  $('.dn').click(function () {
    $('body').toggleClass('night');
    if ($('body').attr('class') == 'night') {
      $('.dn').attr('src', "./images/day.png");
      $("li img").attr("src", "./images/arrow2.png");
    }
    else {
      $('.dn').attr('src', "./images/night.png");
      $("li img").attr("src", "./images/arrow1.png");
    }
  });

  $('ul li').click(function(){
   
 if($(this).attr('class')=='li1'){
  $('main > h3').text('Первые блюда');
      $('img.mainImg').hide().attr('src','./images/first.jpg').fadeIn(1000);
    }

    if($(this).attr('class')=='li2'){
      $('main > h3').text('Вторые блюда');
      $('img.mainImg').hide().attr('src','./images/second.jpg').fadeIn(1000);
      }
      if($(this).attr('class')=='li3'){
        $('main > h3').text('Салаты');
        $('img.mainImg').hide().attr('src','./images/salat.jpg').fadeIn(1000);
        }
        if($(this).attr('class')=='li4'){
          $('main > h3').text('Выпечка');
          $('img.mainImg').hide().attr('src','./images/cake.jpg').fadeIn(1000);
          }
          if($(this).attr('class')=='li5'){
            $('main > h3').text('Другие блюда');
            $('img.mainImg').hide().attr('src','./images/other.jpg').fadeIn(1000);
            }
  });

  $('#btn1').click(function(){
    $('#btn1').hide();
    $('.add_form').show();
    console.log('btn1');

  });

  $('#btn2').click(function(){
    console.log('btn2');
    $('#btn1').show();
    $('.add_form').hide();
  })




});




