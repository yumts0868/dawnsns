//アコーディオンメニュー機能
$(function () {
  $('.title').on('click', function () {//タイトル要素をクリックしたら
    var findElm = $(this).next(".box");//直後のアコーディオンを行うエリアを取得し
    console.log(findElm);
    $(findElm).slideToggle();//アコーディオンの上下動作

    if ($(this).hasClass('close')) {//タイトル要素にクラス名closeがあれば
      $(this).removeClass('close');//クラス名を除去し
    } else {//それ以外は
      $(this).addClass('close');//クラス名closeを付与
    }
  });
});

//モーダル画面表示機能
$(function () {
  $('.modalopen').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      console.log(modal);
      $(modal).fadeIn();
      return false;
    });
  });
  $('.modalClose').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});

//つぶやき削除モーダル表示
function Check() {
  var checked = confirm("このつぶやきを削除します。よろしいでしょうか？");
  if (checked == true) {
    return true;
  } else {
    return false;
  }
}

//マウスオーバー時の処理を記述
function hoge() {
  var elm = document.getElementById("pic");
  elm.src = "images/trash_h.png";
}

//マウスアウト時の処理を記述
function foo() {
  var elm = document.getElementById("pic");
  elm.src = "images/trash.png";
}
