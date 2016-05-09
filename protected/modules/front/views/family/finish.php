<?php
    if(isset($_SESSION['reg_user']))
    {
        $postdata=$_SESSION['reg_user']; 
        unset($_SESSION['reg_user']);
        unset($_SESSION['error']);
    }
    else
    {
        $this->redirect('/regist.php');
    }

/*	echo '<p class="p10 mB50">';
	echo '疎通テスト用確認情報<br>';
	if(isset($postdata['userid']))
		echo '利用者ID：' . $postdata['userid'] . '<br>';
	else
		echo '利用者ID：null<br>';
	if(isset($postdata['callback']))
		echo ' CBURL：' . $postdata['callback'] . '<br>';
	else 
		echo 'CBURL：null<br>';
	if(isset($postdata['key']))
		echo ' 優待コード：' .  $postdata['key'] . '<br>';
	else
		echo ' 優待コード：null<br>';*/
    if($postdata['edit']==0 && isset($postdata['callback']))
    {
        $data = array("key" => $postdata['key'], "userid" => $postdata['userid']);
        $data_string = json_encode($data);
		$ch = curl_init($postdata['callback']);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                       
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',                                          
            'Content-Length: ' . strlen($data_string))
        );
		$result = curl_exec($ch);
/*		echo 'サーバからのレスポンス：' . $result . '<br><br>';

		echo '利用登録が完了いたしました。<br>'	;*/
		
    }

?>

<div id="contents" class="red">



	<!-- <h1 id="pageCopy"><img src="<?php echo Yii::app()->request->baseUrl; ?>/global/images/copy_r.gif" alt="家のあんしんパートナー"></h1> -->



	

<?php if ( isset($postdata['key']) && isset($postdata['callback']) && trim($postdata['key']) != "" && trim($postdata['callback']) != "" && (!isset($_SESSION['go_by_get_path']) ) ){ ?>
<p class="p10 mB50">
利用登録が完了いたしました。<br>
ご登録いただいたメールアドレス宛に確認メールをお送りしますのでご確認ください。<br><br>

本件につきまして、登録確認等の電話対応は行っておりません。<br>
また、登録確認メールにご返信いただいても、対応することが出来ません。<br><br>

サービス利用・お問い合わせにつきましては、専用フリーダイヤルまでお電話ください。<br>
家のあんしんパートナー会員様用フリーダイヤル　0120-024-541（24時間365日受付）<br><br>

終了する場合は、必ず「家のあんしんリンクに戻る」ボタンを押してください。<br>
ボタンを押さずに画面を閉じてしまうと、正常に登録が完了しない場合があります。<br><br>
</p>
<?php
		if(isset($postdata['return'])) 
			$returnurl = $postdata['return'];
		else 
			$returnurl = '/';
        echo '<p class="backBt"><a href="'.$returnurl.'">家のあんしんリンクに戻る</a></p>';
?>
<?php }else{ unset($_SESSION['go_by_get_path']);?>
<p class="p10 mB50">
利用登録が完了いたしました。<br>
ご登録いただいたメールアドレス宛に確認メールをお送りしますのでご確認ください。<br><br>

本件につきまして、登録確認等の電話対応は行っておりません。<br>
また、登録確認メールにご返信いただいても、対応することが出来ません。<br><br>

サービス利用・お問い合わせにつきましては、専用フリーダイヤルまでお電話ください。<br>
家のあんしんパートナー会員様用フリーダイヤル　0120-024-541（24時間365日受付） 
</p>
<?php
		/*if(isset($postdata['return'])) 
			$returnurl = $postdata['return'];
		else 
			$returnurl = "https://dev.docomo-anshinpartner.jp";*/
        echo '<p class="backBt"><a href="/">サービス内容画面に戻る</a></p>';
?>

<?php } ?>
</div>