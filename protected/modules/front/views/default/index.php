<?php
	if (isset($_GET['key'])){
		if ($_GET['key']==''){
			if(isset($_SESSION['reg_user']))
        		unset($_SESSION['reg_user']);
			$_SESSION['error'] = 1;
			$_SESSION['go_by_get_path']='1';
			echo '<script>'
        				.'if(confirm("お手元に申込書類をご用意いただき、　次の画面の入力フォームに優待コードを入力してください。"))'
        				.'window.location.href="'.(Yii::app()->request->baseUrl . '/regist2.php').'";'
        						.'else{'
        								.'window.location.href="'.'https://dev.docomo-anshinpartner.jp'.'";'
        										.'}'
        												.'</script>";';       
		}
		if(isset($_SESSION['reg_user']))
        	unset($_SESSION['reg_user']);
		$_SESSION['error']=1;
        $_SESSION['go_by_get_path']=$_GET['key'];       		
	}
    if(isset($_POST['key']))
    {
        //"ユーザ管理ID"がない状態でも動くようにするため (userid = blank also OK, so don't care $_POST['userid'])
        if(isset($_POST['callback']) && isset($_POST['return']) && $_POST['callback']!='' && $_POST['return']!=''){
        	if ($_POST['key']==''){
        		if(isset($_SESSION['reg_user']))
        			unset($_SESSION['reg_user']);
        		$_SESSION['error'] = 1;
        		$_SESSION['reg_user']['key']='';
        		if(isset($_POST['userid']))
        			$_SESSION['reg_user']['userid']=$_POST['userid'];
        		else 
        			$_SESSION['reg_user']['userid']='';
        		$_SESSION['reg_user']['callback']=$_POST['callback'];
        		$_SESSION['reg_user']['return']=$_POST['return'];
        		if (isset($_SESSION['go_by_get_path']))
        			unset($_SESSION['go_by_get_path']);
        		echo '<script>'
        				.'if(confirm("お手元に申込書類をご用意いただき、　次の画面の入力フォームに優待コードを入力してください。"))'
        				.'window.location.href="'.(Yii::app()->request->baseUrl . '/regist2.php').'";'
        						.'else{'
        								.'window.location.href="'.'https://dev.docomo-anshinpartner.jp'.'";'
        										.'}'
        												.'</script>";';        		
        	}else{
        		$_SESSION['error']=1;
        		$_SESSION['reg_user']=$_POST;
        		$key=explode(',',$_POST['key']);
        		$_SESSION['reg_user']['key']=$key[0];
        		$model = FContract::model()->findByAttributes(array('licence_key'=>$key[0]));
        		if (isset($_SESSION['go_by_get_path']))
        			unset($_SESSION['go_by_get_path']);
        		if ( $model['email1'] != "" || $model['email2'] != "" ){
        			$this -> redirect(Yii::app()->request->baseUrl . '/regist2.php');
        		}        		
        	}
        }else{
        	if (isset($_SESSION['go_by_get_path']))
        		unset($_SESSION['go_by_get_path']);
        	if(isset($_SESSION['reg_user']))
        		unset($_SESSION['reg_user']);
        	echo '<script>alert("利用者情報登録に必要な情報が不足しています。");';
			echo 'window.location.href="https://dev.docomo-anshinpartner.jp/";';
			echo '</script>';
        }
    }
    
    else
    {
    	if (!isset($_GET['key'])){
    		if (isset($_SESSION['go_by_get_path']))
    			unset($_SESSION['go_by_get_path']);
    	
	        if(isset($_SESSION['reg_user']))
	            unset($_SESSION['reg_user']); 
	        $_SESSION['error']=1;
    	}
	    //#12768 : Permit acces directly to /regist.php
		/*
        echo '<script>alert("利用者情報登録に必要な情報が不足しています。");';
        echo 'window.location.href="'.'https://dev.docomo-anshinpartner.jp'.'";';
        echo '</script>';
        */
    }
	
        
?>
<div id="contents" class="red">

	<!-- <h1 id="pageCopy"><img src="<?php echo Yii::app()->request->baseUrl; ?>/global/images/copy_r.gif" alt="家のあんしんパートナー"></h1> -->

	

    <!-- <p class="p10">ドコモから送付された、「家のあんしんパートナー優待コードのご案内」をお手元にご用意ください。</p>-->

    <p class="p10">メールの受信拒否等を設定している場合は、下記アドレスからのメールを受信できるように設定変更をお願いします。<br/>no-reply@docomo-anshinpartner.jp</p>

	<p class="p10">下記、利用規約をお読みいただき、同意の上ご登録ください</p>



	 <div style=" height:150px;margin:10px 15px 20px 10px;"> 

		<div style=" overflow: auto;-webkit-overflow-scrolling:touch;width: 100%;height: 100%;border: 1px solid #e0e0e0; ">

			<iframe src="<?php echo Yii::app()->request->baseUrl; ?>/article/index.html" style=" width: 100%;height: 100%;border: none;vertical-align: top;">

			

			</iframe>

		</div>	 

	</div>



<div style="width:50%;color:#fff;font-weight:bold;text-align:center;background:#231815;padding:8px 0px;margin: 0 auto;">

	<a style="color:#fff;text-decoration:none" href="http://docomo-anshinpartner.jp/">

		<button style="text-align: center;width: 100%;background: #231815;border: medium none;cursor: pointer;color: #fff;font-size: 100%;font-weight: bold;font-family: inherit;">同意しない</button>

		</a>

</div>

<br />



<div style="text-align:center;width:50%;background:#014099;padding:8px 0px;margin: 0 auto;cursor: pointer;">

	<a style="line-height: 1.5;width:100%;color:#fff;text-decoration:none" 

		   href="<?php //if(isset($_GET['key'])) 

							//{echo Yii::app()->request->baseUrl .'/regist2.php?key='.$_GET['key'];	}

						//else{
					   		echo Yii::app()->request->baseUrl .'/regist2.php'; ?>">

		<button style="text-align: center;width: 100%;background:#014099;border: medium none;cursor: pointer;color: #fff;font-size: 100%;font-weight: bold;font-family: inherit;">同意</button>

	</a>

</div>

</div>

<script type="text/javascript">
  (function () {
    var tagjs = document.createElement("script");
    var s = document.getElementsByTagName("script")[0];
    tagjs.async = true;
    tagjs.src = "//s.yjtag.jp/tag.js#site=QrQCLbH";
    s.parentNode.insertBefore(tagjs, s);
  }());
</script>
<noscript>
  <iframe src="//b.yjtag.jp/iframe?c=QrQCLbH" width="1" height="1" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
</noscript>
