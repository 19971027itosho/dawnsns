$(function () {
    $('.menu-trigger').click(function () { //ハンバーガーボタン(.menu-trigger)をクリック
      $(this).toggleClass('active'); //ハンバーガーボタンに(.active)を追加・削除
      if ($(this).hasClass('active')) { //もしハンバーガーボタンに(.active)があれば
        $('.g-navi').addClass('active'); //(.g-navi)にも(.active)を追加
      } else { //それ以外の場合は、
        $('.g-navi').removeClass('active'); //(.g-navi)にある(.active)を削除
      }
    });
  });