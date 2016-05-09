<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>家のあんしんパートナー</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/ticket/css/reset.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/ticket/css/base.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/ticket/css/main.css">
    <script src="../js/jquery-1.7.1.min.js"></script>
</head>

<body class="light">
<!-- ヘッダー -->
<div class="header">
    <div class="page-title type-2 dark">
        <a href="shitter_confirm.php"><img src="<?php echo Yii::app()->request->baseUrl; ?>/ticket/img/icn_back_a.png" alt="logo" width="52" height="52"></a>
        利用者登録
    </div>
</div><!-- ヘッダー end -->

<!-- ボディー -->
<div class="container thin-header">
    <div class="info">
        「家のあんしんパートナー」サービスに、ご契約頂いているお名前と電話番号を入力してください。
    </div>

    <form id="frm" action="" method="post">
        <div id="error-msg" style="color: red;display: none"></div>
        <p>
            <label for="name">お名前</label><br>
	                    姓 <input type="text" id="first_name1" name="first_name1" value="<?php echo $POST['first_name1']; ?>" style="width:auto;">
	                     名 <input type="text" id="last_name1" name="last_name1" value="<?php echo $POST['last_name1']; ?>" style="width:auto;">
	    </p>
        <p>
            <label for="number">携帯電話番号</label><br>
            <input type="text" id="mobile1" name="number" value="<?php echo $POST['number']; ?>">
        </p>
		<p>
            <label for="number">チケットID</label><br>
            <input type="text" id="ticket_id" name="ticket_id" value="<?php echo $POST['ticket_id']; ?>">
        </p>
		<p>
            <label for="number">settlement</label><br>
            <input type="text" id="settlement" name="settlement" value="<?php echo $POST['settlement']; ?>">
        </p>

    </form>

    <div class="buttons-box">
        <a href="ticket_confirm.php" class="button special-h green mb5">次へ</a>
    </div>

</div>

<!-- フッター -->
<div class="footer copyright">
    &copy; JBR INC., All Rights Reserved.
</div><!-- フッター end -->

</div> <!-- ボディー end -->
<script>
    var msg_pleaseInput = 'を入力してください。';
	var msg_invalid = 'は数字で入力してください。';
	var msg_length_ticket_id = 'の長さは37でなければなりません。';　
	var filterNumberPhone = /^[0-9-]+$/;
	var filterNumberQuantity11 = /^[0-9]{11}$/;
    $('.special-h').click(function(e){
        e.preventDefault();
        $('#error-msg').css("display","none");
        var first_name1 = $.trim($("#first_name1").val());
		var last_name1 = $.trim($("#last_name1").val());
        var number = $.trim($('#mobile1').val());
		var ticket_id = $.trim($('#ticket_id').val());
		var settlement = $.trim($('#settlement').val());
        var message = "";
        if (first_name1 == '' || last_name1 == ''){
            message = 'お名前' + msg_pleaseInput + '<br />';
        }
//                if(number===''){
//                    error = error + '携帯電話番号を入力してください';
//                    return false;
//                }

        if(number == ''){
            message += '携帯電話番号'+msg_pleaseInput+' <br />';
        }else{
            if ( !filterNumberPhone.test(number) ) {
                message += '携帯電話番号' + msg_invalid + ' <br />';
            } else if(!filterNumberQuantity11.test(number.replace(/-/g, ""))){
                message += '携帯電話番号の桁数に誤りがあります。 <br />';
            }
        }
		if(ticket_id == ''){
			message += 'チケットID'+msg_pleaseInput+' <br />';
		}else if(isNaN(ticket_id)){
			message += 'チケットID'+msg_invalid+' <br />';
		}else if(ticket_id.length != 37){
			message += 'チケットID'+msg_length_ticket_id+' <br />';
		}
		
        if(message != ""){
            $('#error-msg').css("display","inline-block");
            $('#error-msg').html(message);
            return false;
        }
        $.ajax({
            type :"POST",
            datatype: "json",
            url: "/front/Ticket/edit",
            data: {'first_name1':first_name1, 'last_name1':last_name1,'number':number.replace(/-/g, ""),'ticket_id':ticket_id.replace(/-/g, ""),'settlement':settlement},
            success:function (){
                window.location = 'shitter_confirm.php';
            }
        });
    })
</script>
</body>
</html>