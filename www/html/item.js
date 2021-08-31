//select要素の取得
const element = document.querySelector('#menu');

element.addEventListener('change', function(){
    $.ajax({
        url: "index.php",
        type: "GET",
        dataType: "text",
        data:{'menu':$('#menu').val()}
    }).done(function (response) {
        alert("success");
    }).fail(function (xhr,textStatus,errorThrown) {
        alert('error');
    });
});