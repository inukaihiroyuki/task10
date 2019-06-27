<html>
<head>
<meta charset="utf-8">
<title>POST練習</title>
<script src="js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">

</head>
<body>
	希望物件登録フォーム
<!-- <?php include("menu.html"); ?>	 -->

<!-- <form action="check.php" method="post"> actionがsubmit時におけるページ読み込みの役割 -->
<form id="form_id" action="check.php" method="post"> <!--actionがsubmit時におけるページ読み込みの役割-->
	<dl>
		<div class="form">
			<dt class="form-title">郵便番号</dt>
			<div class="form-outer">
			<dd><input type="text" id="postcode" class="form-inner0" name="postcode" size="10" maxlength="8"></dd>
			<input type="button" id="postaddress" value="住所入力">	
			</div>			

			<dt class="form-title">都道府県</dt>
			<div class="form-outer">
				<dd><input type="text" id="pref" name="pref" class="form-inner" name="" size="60"></dd>
			</div>
			
			<dt class="form-title">市区町村</dt>
			<div class="form-outer">
				<dd><input type="text" id="city" name="city" class="form-inner" name="" size="60"></dd>
			</div>

			<dt class="form-title">番地</dt>
			<div class="form-outer">
				<dd><input type="text" id="block" name="block" class="form-inner" name="" size="60"></dd>
			</div>
			
			<dt class="form-title">氏名
			</dt>
			<div class="form-outer">
				<dd><input type="text" name="name" id="name" class="form-inner"></dd>
			</div>

			<dt class="form-title">年齢</dt>
			<div class="form-outer">
				<dd><select name="age" id="age" class="form-inner" input type="text"><option value="">選択してください</option></select></dd>
			</div>

			<dt class="form-title">電話番号
			</dt>
			<div class="form-outer">
				<dd><input type="tel" name="phone" id="phone"  class="form-inner"></dd>
			</div>
							
			<dt class="form-title">mail</dt>
			<div class="form-outer">
				<dd><input type="email" id="mail" name="mail" id="" class="form-inner"></dd>
			</div>

			<h2 id=num0>希望物件情報</h2>

			<dt class="form-title">職場最寄り駅
			</dt>
			<div class="form-outer">
				<dd><input type="text" name="close" id="close" class="form-inner"></dd>
			</div>

			<dt class="form-title">通勤時間
			</dt>
			<div class="form-outer">
				<dd><input type="number" name="distance" id="distance" class="form-inner3"></dd>
				<p class="unit">分以内</p>
			</div>
			
			<dt class="form-title">予算
			</dt>
			<div class="form-outer">
				<dd><input type="numner" name="budjet" id="budjet" class="form-inner3"></dd>
				<p class="unit">万円</p>
			</div>

			<dt class="form-title">広さ
				</dt>
				<div class="form-outer">
					<dd><input type="number" name="width" id="width" class="form-inner3"></dd>
					<p class="unit">㎡</p>
				</div>


			<dt class="form-title">間取り</dt>
			<dd class="form-outer">
				<select name="madori" id="madori" class="form-inner-select">
					<option name="madori" value="">選択してください</option>
					<option name="madori" value="4LDK以上">4LDK以上</option>
					<option name="madori" value="3LDK">3LDK</option>
					<option name="madori" value="2LDK">2LDK</option>
					<option name="madori" value="1LDK">1LDK</option>
					<option name="madori" value="1K">1K</option>
					<option name="madori" value="その他">その他</option>
				</select>                                
			</dd>
			
			
			<dt class="form-title2">その他</dt>
				<dd class="form-outer2"><textarea name="comment" id="comment" cols="30" rows="10" class="form-inner2"></textarea></dd>
			
		</div>

	</dl>

	<div class="button">

	  <!-- type="button"を省略すると、submitされる。 -->
	<button type="button" id="btn_id" class="save">登録</button>		
	<!-- <input type="submit" value="登録"  class="save" id="save2"> -->
	<input type="reset" value="消去"  class="save" id="clear">
	</div> 
	<!-- <input type="submit" value="送信"> -->

</form>


<ul>
<li><a href="list.php">登録リスト</a></li>
</ul>


<?php 
echo <<<EOM

<script type="text/javascript">
$("#clear").click(function () {
function clearFormAll() {
    for (var i=0; i<document.forms.length; ++i) {
        clearForm(document.forms[i]);
    }
}
function clearForm(form) {
    for(var i=0; i<form.elements.length; ++i) {
        clearElement(form.elements[i]);
    }
}
function clearElement(element) {
    switch(element.type) {
        case "hidden":
        case "submit":
        case "reset":
        case "button":
        case "image":
            return;
        case "file":
            return;
        case "text":
        case "password":
        case "textarea":
            element.value = "";
            return;
        case "checkbox":
        case "radio":
            element.checked = false;
            return;
        case "select-one":
        case "select-multiple":
            element.selectedIndex = 0;
            return;
        default:
    }
}
});
</script>
EOM;
?>	

<?php 
echo <<<EOM
<script type="text/javascript">

    //検索ボタンをクリックされたときに実行
    $("#postaddress").click(function () {
        //入力値をセット
        var param = {zipcode: $('#postcode').val()}
        //zipcloudのAPIのURL
        var send_url = "http://zipcloud.ibsnet.co.jp/api/search";
        $.ajax({
            type: "GET",
            cache: false,
            data: param,
            url: send_url,
            dataType: "jsonp",
            success: function (data) {
                //結果によって処理を振り分ける
                if (data.status == 200) {
                    //処理が成功したとき
                    //該当する住所を表示
                        var result = data.results[0];
                        console.log(data.results);
                        $("#pref").val(result.address1)
                        $("#city").val(result.address2)
                        $("#block").val(result.address3)
                } else {
                    //エラーだった時
                    //エラー内容を表示
                    alert(data.message); 
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest);
            }
        });
	});
	</script>
EOM;
?>	

<?php 
echo <<<EOM
<script type="text/javascript">

	$(function(){
		$('#btn_id').click(function(){
			// バリデーションチェックや、データの加工を行う。
			const d = $("#postcode").val();
			if(d==""){	
				alert("郵便番号が入力されていません")
			}else{
		  		$('#form_id').submit();
			}
	});
  })

  // 年齢のプルダウン
  let agenum =""
  for(let i=20; i<=60; i++){
	agenum += '<option value="'+i+'">'+i+'</option>';
  };
  $("#age").append(agenum);


</script>
EOM;
?>	

</body>

</html>