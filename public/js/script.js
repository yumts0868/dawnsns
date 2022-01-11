//アコーディオンメニュー機能
/* $(function () {
  $('.title').on('click', function () {//タイトル要素をクリックしたら
    var findElm = $(this).next(".accordion-area");//直後のアコーディオンを行うエリアを取得し
    console.log(findElm);
    $(findElm).slideToggle();//アコーディオンの上下動作

    if ($(this).hasClass('close')) {//タイトル要素にクラス名closeがあれば
      $(this).removeClass('close');//クラス名を除去し
    } else {//それ以外は
      $(this).addClass('close');//クラス名closeを付与
    }
  });
}); */

$(function () {
  $('.header-name').click(function () { //メニューボタンタップ後の処理
    $(this).toggleClass('active'); //クリックした要素に「.active」要素を付与
    $('.accordion-area').css('display', 'block');//「.gnavi」要素の非表示を表示する
    if ($(this).hasClass('active')) { //もしクリックした要素に「.active」要素があれば
      $('.accordion-area').addClass('active'); //「.active」要素を付与
    } else {                            //「.active」要素が無ければ
      $('.accordion-area').removeClass('active'); //「.active」要素を外す
    }
  });
});


//モーダル画面表示機能
$(function () {
  $('.modalopen').each(function () {//modalopenクラスに対して繰り返し処理をしてください
    $(this).on('click', function () {//onメソッドのclickイベントを使用して、クリックされたあとに以下の処理を
      var target = $(this).data('target');//dataメソッドで、オブジェクトが持っているdata属性のみ取得
      var modal = document.getElementById(target);//getElementByIdメソッドで、任意のHTML要素に指定したID名(target)にマッチするドキュメント要素(クリックした投稿のモーダル)を取得する
      console.log(modal);
      $(modal).fadeIn();//ゆっくり表示
      return false; //ここで処理終了
    });
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
