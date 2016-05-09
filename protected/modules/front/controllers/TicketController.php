<?php
class TicketController extends FController
{
	public function detectIMode(){
		$devide_imode = '';
		//if(stripos($_SERVER['HTTP_USER_AGENT'],"ISIM")!==false)  $devide_imode = 'imode/';
		if ( isset($_SESSION["imode"]) && !empty($_SESSION["imode"]) ){	
			$devide_imode = $_SESSION["imode"]; 
			header('Content-Type: text/html; charset=shift-jis');
		} 
		return $devide_imode;
	}
	
	public function checkImodeGetValue($value){
		if ( $this -> detectIMode() == 'imode/' ){
			if ( mb_detect_encoding($value,array('UTF-8', 'Shift-JIS')) == 'UTF-8' )
				$value = mb_convert_encoding($value, 'SJIS', 'UTF-8');
		}
		return $value;
	}
	
	public function actionTicket()
	{
		$data = array();
        if(!isset($_POST["key"])){ //back
		   // if(isset($_SESSION["POST"]) && isset($_SESSION["POST"]['last_name1']) && isset($_SESSION["POST"]['number'])){
			if(isset($_SESSION["POST"])){
                 $this->renderPartial($this->detectIMode().'ticket',array('POST' => $_SESSION["POST"]));
            }
        }else{
			//if ( !isset($_POST["regist_type"]) )
				$_POST["regist_type"] = 5;
            $_SESSION["POST"] = $_POST;
            $data = FContract::model()->findByAttributes(array('licence_key'=>$_SESSION["POST"]['key']));
			if(empty($data)){
				echo "There is no licence_key";
            }elseif(!empty($data['email1'])){
                //$this->sendToHome();
                header('Location: shitter_phone.php');
            }else{
				$resultProvideArr = $this->getOrderInfoFromTicketID($_POST['ticket_id']);
				$_SESSION["POST"]['first_name1'] = $this -> checkImodeGetValue($data['first_name1']);
				$_SESSION["POST"]['last_name1'] = $this -> checkImodeGetValue($data['last_name1']);
				$_SESSION["POST"]['number'] = $this -> checkImodeGetValue($data['mobile1']);
				$_SESSION["POST"]['ticket_id'] = $this -> checkImodeGetValue($_POST['ticket_id']);
				$_SESSION["POST"]['settlement'] = $this -> checkImodeGetValue($_POST['settlement']);
				$_SESSION["POST"]['userid'] = $this -> checkImodeGetValue($data['id']);
				$_SESSION["POST"]['provider_info'] = $resultProvideArr;
				try{
					$this->renderPartial($this->detectIMode().'ticket',array('POST' => $_SESSION["POST"]));
				}catch (Exception $e) {
					echo 'Caught exception: ',  $e->getMessage(), "\n";
				}
            }
        }
	}
	
	public function actionConfirm(){
		if ( isset($_SESSION["on_phone"]) && $_SESSION["on_phone"] == "on_phone" ){
			unset($_SESSION["on_phone"]);
			if ( $this -> detectIMode() == '' )
				header('Location: http://home.idc.nttdocomo.co.jp/');
		}
		if(isset($_POST["ticketconfirmclick"])){
			$this->saveTicket();
			header('Location: shitter_phone.php');
		}
		if(isset($_POST['name'])||isset($_POST['number'])){
			$_SESSION['POST']['first_name1'] = $this -> checkImodeGetValue($_POST['first_name1']);
			$_SESSION['POST']['last_name1'] = $this -> checkImodeGetValue($_POST['last_name1']);
			$_SESSION['POST']['number'] = $this -> checkImodeGetValue($_POST['number']);
			$_SESSION["POST"]['ticket_id'] = $this -> checkImodeGetValue($_POST['ticket_id']);
			$_SESSION["POST"]['settlement'] = $this -> checkImodeGetValue($_POST['settlement']);
			
			$_SESSION["POST"]['provider_info'] = $this->getOrderInfoFromTicketID($_POST['ticket_id']);
		}
		$this->renderPartial($this->detectIMode().'ticket_confirm',array('POST' => $_SESSION['POST']));

	}
	public function actionEdit(){
		if(isset($_POST['name'])||isset($_POST['number'])){
			$_SESSION['POST']['first_name1'] = $this -> checkImodeGetValue($_POST['first_name1']);
			$_SESSION['POST']['last_name1'] = $this -> checkImodeGetValue($_POST['last_name1']);
			$_SESSION['POST']['number'] = $this -> checkImodeGetValue($_POST['number']);
			$_SESSION["POST"]['ticket_id'] = $this -> checkImodeGetValue($_POST['ticket_id']);
			$_SESSION["POST"]['settlement'] = $this -> checkImodeGetValue($_POST['settlement']);
			$_SESSION["POST"]['provider_info'] = $this->getOrderInfoFromTicketID($_POST['ticket_id']);
		}
		$this->renderPartial($this->detectIMode().'ticket_edit',array('POST' => $_SESSION['POST']));
	}
	
	public function actionPhone()
	{			
		if(!isset($_SESSION['POST']['regist_type']))
            die;
		if ( $this->detectIMode() == '' )
        	$device = $this->checkDevice();
		else
			$device = false;
		$_SESSION["on_phone"] = "on_phone";
        
        $this->renderPartial($this->detectIMode()."ticket_phone",array('device' => $device));
    } 
	
 	public function actionAgreement()
	{			
		if(!isset($_SESSION['POST']['regist_type']))
            die;
		if ( $this->detectIMode() == '' )
        	$device = $this->checkDevice();
		else
			$device = false;
		$_SESSION["on_phone"] = "on_phone";
        
        $this->renderPartial($this->detectIMode()."ticket_phone",array('device' => $device));
    } 
	
	protected function saveTicket(){
		if(!isset($_SESSION["POST"]['key']))
    		die;
		$data = FContract::model()->findByAttributes(array('licence_key'=>$_SESSION["POST"]['key']));
		if ( mb_detect_encoding($_SESSION["POST"]['first_name1'],array('UTF-8', 'Shift-JIS')) == 'SJIS' )
			$data->first_name1 = mb_convert_encoding($_SESSION["POST"]['first_name1'], 'UTF-8', 'SJIS');
		else
			$data->first_name1 = $_SESSION["POST"]['first_name1'];
		if ( mb_detect_encoding($_SESSION["POST"]['last_name1'],array('UTF-8', 'Shift-JIS')) == 'SJIS' )	
			$data->last_name1 =  mb_convert_encoding($_SESSION["POST"]['last_name1'], 'UTF-8', 'SJIS');
		else
			$data->last_name1 = $_SESSION["POST"]['last_name1'];
		if ( mb_detect_encoding($_SESSION["POST"]['number'],array('UTF-8', 'Shift-JIS')) == 'SJIS' )
			$data->mobile1 = mb_convert_encoding($_SESSION["POST"]['number'], 'UTF-8', 'SJIS');
		else 
			$data->mobile1 = $_SESSION["POST"]['number'];
		if ( mb_detect_encoding($_SESSION["POST"]['ticket_id'],array('UTF-8', 'Shift-JIS')) == 'SJIS' )
			$data->ticket_id = mb_convert_encoding($_SESSION["POST"]['ticket_id'], 'UTF-8', 'SJIS');
		else 
			$data->ticket_id = $_SESSION["POST"]['ticket_id'];
		if ( !empty($_SESSION["POST"]['userid']) )
			$data->openid = $_SESSION["POST"]['userid'];
		$data->user_regist_date = date('Y/m/d H:i:s');
		$data->save();
		
        $param = array(
            'userid' => $_SESSION["POST"]['userid'],
            'key' => $_SESSION["POST"]['key']
        );
		$param_string = json_encode($param);
		$url = $_SESSION["POST"]['callback'];
        
		$ch=curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $param_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Connection:keep-alive',
			'Content-Type: application/json;charset=utf-8',                                                                                
		    'Content-Length: ' . strlen($param_string))                                                                       
		);
        $result = curl_exec($ch);
        curl_close($ch);
    }
	
	
	/* 	echo "<br/> actionDliving<br/>--------<br/>";
		foreach ($_POST as $key => $value){
			echo $key . " => " . $value . " <br/>";
		}
		//var_dump($_POST);
		
		echo "<br/> <br/>";
		$resultArr = $this->getOrderInfoFromTicketID($_POST['ticket_id']);
		if(is_array($resultArr)){
			foreach ($resultArr as $key => $value){
				echo $key . " => " . $value . " <br/>";
			}
		}
		//var_dump($resultArr);*/
	/**
	* 
	*  - purchasedProductInformationTemplate: A1A2A3A4 B1B2B3B4 C1C2C3C4 T1T2T3T4T5T6 y1y2y3y4m1m2d1d2 S1S2S3S4S5S6S7S8S9S10 
	*  - payment_number: A1A2A3A4-B1B2B3B4-C1C2C3C4
	*  - partner: T1T2 T3T4 T5T6 (map to an array - $partnerIdentifierCodeArr)
	*  - settlement_date: y1y2y3y4/m1m2/d1d2
	*  - item_number: S1S2S3S4S5S6S7S8S9S10
	* 
	**/

	/**
	* 
	* get Order Infomation from TicketID
	* 
	* param: string ticketID
	* return: array
	* 
	**/
	public function getOrderInfoFromTicketID($ticketID){
		if(!is_numeric($ticketID) || (strlen($ticketID) <> 37))
			return null;
		
		$returnArr = array("payment_number" => "", 
							"partner" => "", 
							"settlement_date" => "", 
							"item_number" => "");

		$fittingConversionArr = $this->fittingConversion($ticketID[15], $ticketID);

		$returnArr["payment_number"] = $this->getPaymentNumber($fittingConversionArr);
		$returnArr["partner"] = $this->getPartner($fittingConversionArr);								
		$returnArr["settlement_date"] = $this->getSettlementDate($fittingConversionArr);
		$returnArr["item_number"] = $this->getItemNumber($fittingConversionArr);
		
		return $returnArr;
	}

	/**
	* 
	* convert from ticketID string to template array
	* 
	* param: integer index at 15 (start from  index 0) of string
	* param: string ticketID
	* return: array
	* 
	**/
	public function fittingConversion($index, $string){
		$locateKeyEvenArr = array (
			1 => "d1", 2 => "S7", 3 => "T2", 4 => "C2", 5 => "T6", 6 => "A2", 7 => "C4", 8 => "B2", 9 => "C1", 10 => "T3", 
			11 => "y1", 12 => "S10", 13 => "A1", 14 => "y2", 15 => "S6", 16 => "-", 17 => "S3", 18 => "A4", 19 => "S8", 20 => "m1", 
			21 => "B1", 22 => "S5", 23 => "y4", 24 => "T1", 25 => "S2", 26 => "B4", 27 => "m2", 28 => "d2", 29 => "T5", 30 => "A3", 
			31 => "C3", 32 => "B3", 33 => "S9", 34 => "S4", 35 => "S1",  36 => "y3", 37 => "T4"
		);

		$locateKeyOddArr = array (
			1 => "B3", 2 => "S7", 3 => "B2", 4 => "m2", 5 => "C3", 6 => "C2", 7 => "S4", 8 => "A1", 9 => "T3", 10 => "S9",
			11 => "S2", 12 => "T5", 13 => "A2", 14 => "C4", 15 => "S6", 16 => "-", 17 => "y3", 18 => "m1", 19 => "d2", 20 => "T6", 
			21 => "y1", 22 => "S5", 23 => "S3", 24 => "T2", 25 => "B4", 26 => "A3", 27 => "d1", 28 => "S8", 29 => "B1", 30 => "S10",
			31 => "T1", 32 => "y4", 33 => "T4", 34 => "A4", 35 => "S1", 36 => "y2", 37 => "C1"
		);
		
		if($index%2 == 0){
			return $this->mapValuetoArray($locateKeyEvenArr, $string);		
		}else{
			return $this->mapValuetoArray($locateKeyOddArr, $string);
		}
	}

	/**
	* 
	* mapping value for new array from a template array
	*
	* param: array templateArr
	* param: string str
	* return: array
	* 
	**/
	public function mapValuetoArray($templateArr, $str){
		$returnArr = null;
		if(!is_array($templateArr)){
			return null;
		}
		
		$i = 0;
		foreach ($templateArr as $key => $value) {
			if(isset($templateArr[$key])){
				$returnArr[$templateArr[$key]] = $str[$i];
				$i++;
			}
		}
		
		return $returnArr;
	}
	/**
	* 
	* get payment number from a template array
	*
	* param: array conArr
	* return: string
	* 
	**/
	public function getPaymentNumber($conArr){
		if(!is_array($conArr))
			return null;
		
		$rtn = $conArr["A1"].$conArr["A2"].$conArr["A3"].$conArr["A4"]."-".
				$conArr["B1"].$conArr["B2"].$conArr["B3"].$conArr["B4"]."-".
				$conArr["C1"].$conArr["C2"].$conArr["C3"].$conArr["C4"];
				
		return $rtn;
	}

	/**
	* 
	* get partner ID from a template array
	* 
	* param: array conArr
	* return: string
	* 
	**/
	public function getPartner($conArr){
		if(!is_array($conArr))
			return null;
		
		$partnerIdentifierCodeArr = array(
		"00" => "0", "01" => "1", "02" => "2", "03" => "3",	"04" => "4", "05" => "5", "06" => "6", "07" => "7",	"08" => "8", "09" => "9",
		"10" => "A", "11" => "B", "12" => "C", "13" => "D", "14" => "E", "15" => "F", "16" => "G", "17" => "H", "18" => "I", "19" => "J",
		"20" => "K", "21" => "L", "22" => "M", "23" => "N", "24" => "O", "25" => "P", "26" => "Q", "27" => "R", "28" => "S", "29" => "T",
		"30" => "U", "31" => "V", "32" => "W", "33" => "X",	"34" => "Y", "35" => "Z", "36" => "-", "37" => ".",	"38" => " ", "39" => "$",
		"40" => "/", "41" => "+", "42" => "%"
		);
		
		$str1 = $conArr["T1"].$conArr["T2"];
		$str2 = $conArr["T3"].$conArr["T4"];
		$str3 = $conArr["T5"].$conArr["T6"];
		
		if(isset($partnerIdentifierCodeArr[$str1]) && isset($partnerIdentifierCodeArr[$str2]) && isset($partnerIdentifierCodeArr[$str3])){
			$rtn = $partnerIdentifierCodeArr[$str1].$partnerIdentifierCodeArr[$str2].$partnerIdentifierCodeArr[$str3];
		}else{
			return null;
		}
		
		return $rtn;
	}

	/**
	* 
	* get settlement date from a template array
	* 
	* param: array conArr
	* return: string
	* 
	**/
	public function getSettlementDate($conArr){
		if(!is_array($conArr))
			return null;
		
		$rtn = $conArr["y1"].$conArr["y2"].$conArr["y3"].$conArr["y4"]."/".
				$conArr["m1"].$conArr["m2"]."/".
				$conArr["d1"].$conArr["d2"];
				
		return $rtn;
	}

	/*
	*
	* get item number from a template array
	*
	* param: array conArr
	* return: string
	*
	**/
	public function getItemNumber($conArr){
		if(!is_array($conArr))
			return null;
		
		$rtn = $conArr["S1"].$conArr["S2"].$conArr["S3"].$conArr["S4"].$conArr["S5"].$conArr["S6"].$conArr["S7"].$conArr["S8"].$conArr["S9"].$conArr["S10"];
				
		return $rtn;
	}
}
?>