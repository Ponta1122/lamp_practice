//select要素の取得
var select = document.querySelector("#word");
 
//option要素の取得（配列）
var options = document.querySelectorAll("#word option");
 
//select要素のchangeイベントの登録
select.addEventListener('change', function(){
 
        //選択されたoption番号を取得
        var index =  this.selectedIndex;
        //options[ index ].value にoption要素のvalue属性値
        //options[ index ].innerHTML にoption要素内の文字列
 
});
