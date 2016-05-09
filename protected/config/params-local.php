<?php
return array(
  /*Sender Alias*/
  'sender'=>array('mail'=>'no-reply@docomo-anshinpartner.jp', 'alias'=>'no-reply@docomo-anshinpartner.jp'),
  
  'send_to_admin' => array(
    'address'   => array('phucnd@shinway.vn'),
    'subject'   => '家のあんしんパートナー　利用者登録',
    'template'  => 'admin'    
  ),
  
  'send_to_customer' => array(
    'subject'   => '家のあんしんパートナー　利用者登録が完了しました',
    'template'  => 'customer'    
  ),
	'send_to_admin_zaitaku' => array(
	    'address'   => array('phucnd@shinway.vn'),
	    'subject'   => '家のあんしんパートナー　利用者登録',
	    'template'  => 'admin_zaitaku'    
  	),
  
  	'send_to_customer_zaitaku' => array(
	    'subject'   => '家のあんしんパートナー　利用者登録が完了しました',
	    'template'  => 'customer_zaitaku'    
  	),
	'zaitaku_finished_mail' => array(
			'subject'   => '【家のあんしんパートナー】　在宅確認者様ご本人確認完了のお知らせ',
			'template'  => 'zaitaku_finished'
	),		
	'zaitaku_not_finished_mail' => array(
			'subject'   => '【家のあんしんパートナー】　在宅確認者様ご本人確認が行えなかった旨のお知らせ',
			'template'  => 'zaitaku_not_finished'
	),
	'active_https_flag' => 0, // 1: active\
  	'google_analytics_code' => 'UA-60161286-1',
	'zaitaku_send_mail_bcc' => 'phucnd_shinway@gmail.com',
	
	'change_customer_infor' => array(
			'subject'   => 'お客様のご登録情報を登録いたしました',
			'template'  => 'change_customer_infor'
	),
);