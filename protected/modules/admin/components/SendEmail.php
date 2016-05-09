<?php
class SendEmail
{
	public static function sendChangeCusInfo($email = NULL, $key = NULL, $data){
		if(isset(Yii::app()->params[$key])){
			$params = Yii::app()->params[$key];
			##
			if(empty($email))
				return false;
			##	
			if(!is_array($email))
				$email = array($email);	
						
			$mail = Yii::app()->mail;
			$mail->ClearAllRecipients();
			$mail->CharSet = "UTF-8";
			
			$mail->SetFrom(Yii::app()->params['sender']['mail'], Yii::app()->params['sender']['alias']);
			
			foreach($email as $e)
				$mail->AddAddress($e);
			
			if($content = self::replace("application.config.mail.{$params['template']}", $data)){
				$mail->Subject = $params['subject'];
				//$mail->MsgHTML($content);
				$mail->Body =  $content; 
				return $mail->Send();
			}
		}
		
		return false;
	}
	
	public static function send($email = NULL, $key=NULL, $data = array(), $bcc = ''){
		if(isset(Yii::app()->params[$key])){
			$params = Yii::app()->params[$key];
			
			if(empty($email) && !empty($params['address'])){
				$email = $params['address'];
			}
			
			if(empty($email))
				return false;
				
			if(!is_array($email))
				$email = array($email);	
						
			$mail = Yii::app()->mail;
			$mail->ClearAllRecipients();
			$mail->CharSet = "UTF-8";
			
			$mail->SetFrom(Yii::app()->params['sender']['mail'], Yii::app()->params['sender']['alias']);
			
			foreach($email as $e)
				$mail->AddAddress($e);
			
			if ( $bcc != '' ){
				if(!is_array($bcc))
				$bcc = array($bcc);	
				foreach($bcc as $e)
					$mail->AddBCC($e);
			}
			
			if($content = self::replace("application.config.mail.{$params['template']}", $data)){
				$mail->Subject = $params['subject'];
				//$mail->MsgHTML($content);
				$mail->Body =  $content; 
				return $mail->Send();
			}
		}
		
		return false;
	}
	
	public static function replace($alias, $data = array()){
		$path = Yii::getPathOfAlias($alias) . ".txt";		
		if(file_exists($path)){			
			$text = file_get_contents($path);
			
			$param = array();
			if(!empty($data)){
				foreach($data as $k=>$v){
					$param['{'.$k.'}'] = $v;
				}					
			}
			return strtr($text, $param);
		}
	}
}