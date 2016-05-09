<?php

class ContractController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionRequest() {
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/jquery-ui/jquery-ui.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-ui-month-picker-master/MonthPicker.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/jquery-ui/jquery-ui.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/js/jquery-ui-month-picker-master/css/MonthPicker.css');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.maskedinput.min.js');
        $model = new CContract();
        if (isset($_GET["start_date"])) {
            $model->start_date = $_GET["start_date"];
        }
        if (isset($_GET["end_date"])) {
            $model->end_date = $_GET["end_date"];
        }

        if (isset($_GET["pageSize"])) {
            $model->pageSize = $_GET["pageSize"];
        } else
            $model->pageSize = Yii::app()->params['pageSizeDefault'];

        $this->render('request', array(
            'model' => $model
        ));
    }

    public function actionCancel() {
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/jquery-ui/jquery-ui.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-ui-month-picker-master/MonthPicker.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/jquery-ui/jquery-ui.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/js/jquery-ui-month-picker-master/css/MonthPicker.css');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.maskedinput.min.js');
        $model = new CContract();
        if (isset($_GET["start_date"])) {
            $model->start_date = $_GET["start_date"];
        }
        if (isset($_GET["end_date"])) {
            $model->end_date = $_GET["end_date"];
        }
        if (isset($_GET["pageSize"])) {
            $model->pageSize = $_GET["pageSize"];
        } else
            $model->pageSize = Yii::app()->params['pageSizeDefault'];
        $this->render('cancel', array(
            'model' => $model
        ));
    }

    public function actionUsers() {
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/jquery-ui/jquery-ui.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-ui-month-picker-master/MonthPicker.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/jquery-ui/jquery-ui.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/js/jquery-ui-month-picker-master/css/MonthPicker.css');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.maskedinput.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/jquery-ui/i18n/datepicker-ja.js', CClientScript::POS_END);
        $model = new CContract();
		if (isset($_GET["start_date"])) {
            $model->start_date = $_GET["start_date"];
        }
        if (isset($_GET["end_date"])) {
            $model->end_date = $_GET["end_date"];
        }
        if (isset($_GET["telephone"])) {
            $model->telephone = $_GET["telephone"];
        }
        if (isset($_GET["name"])) {
            $model->name = $_GET["name"];
        }
        if (isset($_GET["zip_code1"])) {
            $model->zip_code1 = $_GET["zip_code1"];
        }
        if (isset($_GET["licence_key"])) {
            $model->licence_key = $_GET["licence_key"];
        }
		if (isset($_GET["ticket_id"])) {
            $model->ticket_id = $_GET["ticket_id"];
        }
        if (isset($_GET["cboSearch"])) {
            foreach ($_GET['cboSearch'] as $selected) {
                switch ($selected) {
                    case 1:
                        $model->Zaitaku_sub = true;
                        break;
                    case 2:
                        $model->Conf_1_status = "is not null";
                        break;
                    case 3:
                        $model->Conf_2_status = "is not null";
                        break;
                    case 4:
                        $model->Zaitaku_conf = true;
                        break;
                    default:
                        $model->Zaitaku_sub = true;
                        break;
                }
            }
        }
        if (isset($_GET["pageSize"])) {
            $model->pageSize = $_GET["pageSize"];
        } else
            $model->pageSize = Yii::app()->params['pageSizeDefault'];
		if ( isset($_GET["search_usr_null"]) )
			$model -> search_usr_null = 1;

        $this->render('users', array(
            'model' => $model
        ));
    }

    public function actionUExportCSV() {
        Yii::import('ext.ECSVExport');
        $model = new CContract();
        if (isset($_GET["start_date"])) {
            $model->start_date = $_GET["start_date"];
        }
        if (isset($_GET["end_date"])) {
            $model->end_date = $_GET["end_date"];
        }
        if (isset($_GET["telephone"])) {
            $model->telephone = $_GET["telephone"];
        }
        if (isset($_GET["name"])) {
            $model->name = $_GET["name"];
        }
        if (isset($_GET["zip_code1"])) {
            $model->zip_code1 = $_GET["zip_code1"];
        }
        if (isset($_GET["licence_key"])) {
            $model->licence_key = $_GET["licence_key"];
        }
        if (isset($_GET["cboSearch"])) {
            foreach ($_GET['cboSearch'] as $selected) {
                switch ($selected) {
                    case 1:
                        $model->Zaitaku_sub = true;
                        break;
                    case 2:
                        $model->Conf_1_status = "is not null";
                        break;
                    case 3:
                        $model->Conf_2_status = "is not null";
                        break;
                    case 4:
                        $model->Zaitaku_conf = true;
                        break;
                    default:
                        $model->Zaitaku_sub = true;
                        break;
                }
            }
        }
        $data_csv = array();
        $no = 1;
		////
		$csv_dir = Yii::app()->params['admin_dir'] . 'csv/';
		@chmod(Yii::app()->params['admin_dir'], 0777);
		if ( !is_dir($csv_dir) )
			mkdir($csv_dir, 0777);
		
		//$start_time = microtime(true);
		$objExport = new ECSVExport();
		$content_export = '';
		$file_tmp = $csv_dir . time() . ".csv";
		$filename = "Customer_Data_" . date('Ymd') . ".csv";
		///
		$handle = fopen($file_tmp, "a+");
		chmod($file_tmp, 0777);
		////
		$item_csv = array(
            '1' => "No",
            '2' => "ライセンスキー",
            '3' => "契約開始日",
            '4' => "契約廃止日",
            '5' => "利用者登録日時",
            '6' => "【契約者】お名前",
            '7' => "【契約者】フリガナ",
            '8' => "【契約者】年齢",
            '9' => "【契約者】電話番号（ご自宅）",
            '10' => "【契約者】電話番号（携帯電話）",
            '11' => "【契約者】メールアドレス",
            '12' => "【契約者】郵便番号",
            '13' => "【契約者】都道府県",
            '14' => "【契約者】市区町村",
            '15' => "【契約者】町域名",
            '16' => "【契約者】番地",
            '17' => "【契約者】建物名",
            '18' => "【契約者】備考",
            '19' => "【代表者】お名前",
            '20' => "【代表者】フリガナ",
            '21' => "【代表者】年齢",
            '22' => "【代表者】電話番号（ご自宅）",
            '23' => "【代表者】電話番号（携帯電話）",
            '24' => "【代表者】メールアドレス",
            '25' => "【代表者】郵便番号",
            '26' => "【代表者】都道府県",
            '27' => "【代表者】市区町村",
            '28' => "【代表者】町域名",
            '29' => "【代表者】番地",
            '30' => "【代表者】建物名",
            '31' => "【代表者】備考",
            '32' => "【在宅確認】お名前",
            '33' => "【在宅確認】フリガナ",
            '34' => "【在宅確認】電話番号（携帯電話）",
            '35' => "【在宅確認】郵便番号",
            '36' => "【在宅確認】都道府県",
            '37' => "【在宅確認】市区町村",
            '38' => "【在宅確認】以降の住所",
            '39' => "【在宅確認】以降の住所（丁目、番地等）",
            '40' => "【在宅確認】続柄（二親等以内）",
        );
		$content_export = implode(",", $item_csv) . "\r\n";
		$content_export  = mb_convert_encoding($content_export, "SJIS-win", "UTF-8");
		fwrite($handle, $content_export);
		fclose($handle);
		////
		$sql = $model->sql_users_export_csv();
		///
		$start_time = microtime(true);
		$code_new_line = "\r\n";
		$deliminator=",";
		$limit = 10000;
		$loops = true;
		$start = 0;
		$sql_select = $this->getSelectExportUExportCSV() . $sql;
		while($loops){
			$offset = $start*$limit;
			$list = $model->data_query($sql_select . " ORDER BY id ASC LIMIT " . $limit . " OFFSET " . $offset); 
			if ( count($list) ){
				$handle = fopen($file_tmp, "a+");
				$content_export = '';
				//echo $start . ' - ' . count($list) . '<br>';
				////TO DO THIS
				foreach ($list as $values) { 
					$item_csv = array(
						"1" => $no,
						"2" => $objExport -> remove_new_lines($values["licence_key"]),
						"3" => $objExport -> remove_new_lines($values["start_date"]),
						"4" => $objExport -> remove_new_lines($values["end_date"]),
						"5" => $objExport -> remove_new_lines($values["user_regist_date"]),
						"6" => $objExport -> remove_new_lines($values["first_name1"] . $values["last_name1"]),
						"7" => $objExport -> remove_new_lines($values["first_kana1"] . $values["last_kana1"]),
						"8" => $objExport -> remove_new_lines($values["age_group"]),
						"9" => $objExport -> remove_new_lines($values["tel1"]),
						"10" => $objExport -> remove_new_lines($values["mobile1"]),
						"11" => $objExport -> remove_new_lines($values["email1"]),
						"12" => $objExport -> remove_new_lines($values["zip_code1"]),
						"13" => $objExport -> remove_new_lines($values["pref1"]),
						"14" => $objExport -> remove_new_lines($values["address1_1"]),
						"15" => $objExport -> remove_new_lines($values["address1_2"]),
						"16" => $objExport -> remove_new_lines($values["address1_3"]),
						"17" => $objExport -> remove_new_lines($values["address1_4"]),
						"18" => $objExport -> remove_new_lines($values["remark1"], true),
						"19" => $objExport -> remove_new_lines($values["first_name2"] . $values["last_name2"]),
						"20" => $objExport -> remove_new_lines($values["first_kana2"] . $values["last_kana2"]),
						"21" => $objExport -> remove_new_lines($values["age_group2"]),
						"22" => $objExport -> remove_new_lines($values["tel2"]),
						"23" => $objExport -> remove_new_lines($values["mobile2"]),
						"24" => $objExport -> remove_new_lines($values["email2"]),
						"25" => $objExport -> remove_new_lines($values["zip_code2"]),
						"26" => $objExport -> remove_new_lines($values["pref2"]),
						"27" => $objExport -> remove_new_lines($values["address2_1"]),
						"28" => $objExport -> remove_new_lines($values["address2_2"]),
						"29" => $objExport -> remove_new_lines($values["address2_3"]),
						"30" => $objExport -> remove_new_lines($values["address2_4"]),
						"31" => $objExport -> remove_new_lines($values["remark2"], true),
						"32" => $objExport -> remove_new_lines($values["first_name3"] . $values["last_name3"]),
						"33" => $objExport -> remove_new_lines($values["first_kana3"] . $values["last_kana3"]),
						"34" => $objExport -> remove_new_lines($values["mobile3"]),
						"35" => $objExport -> remove_new_lines($values["zip_code3"]),
						"36" => $objExport -> remove_new_lines($values["pref3"]),
						"37" => $objExport -> remove_new_lines($values["address3_1"]),
						"38" => $objExport -> remove_new_lines($values["address3_3"]),
						"39" => $objExport -> remove_new_lines($values["address3_4"]),
						"40" => $objExport -> remove_new_lines($values["relationship3"]),
					);
					$content_export_row = implode(",", $item_csv) . "\r\n";
					$content_export_row  = mb_convert_encoding($content_export_row, "SJIS-win", "UTF-8");
					$content_export .= $content_export_row;
					$no++;
				}////end foreach
				fwrite($handle, $content_export);
				fclose($handle);
					
				if ( count($list) < $limit)
					$loops = false;
				else
					$start++;					
			}else
				$loops = false;
			//$loops = false;
		}
		//echo 'end <br>'; echo  microtime(true) - $start_time; die;
		$content_export = '';
		if ($stream = fopen($file_tmp, 'r')) {
			$content_export = stream_get_contents($stream);
			fclose($stream);
		}
		 
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($filename).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file_tmp));
		echo $content_export;
		unlink($file_tmp);
		exit;
    }
	
	public function getSelectExportUExportCSV(){
		return "SELECT licence_key, start_date, end_date, user_regist_date, first_name1, last_name1, first_kana1, last_kana1, age_group, tel1, mobile1, email1, zip_code1, pref1, address1_1, address1_2, address1_3, address1_4, remark1, first_name2, last_name2, first_kana2, last_kana2, age_group2, tel2, mobile2, email2, zip_code2, pref2, address2_1, address2_2, address2_3, address2_4, remark2, first_name3, last_name3, first_kana3, last_kana3, mobile3, zip_code3, pref3, address3_1, address3_3, address3_4, relationship3 ";
	}

    public function actionCExportCSV() {
        $this->actionExportCSV("02");
    }

    public function actionExportCSV($record_type = '01') {
        Yii::import('ext.ECSVExport');
        $model = new CContract();
        if (isset($_GET["start_date"])) {
            $model->start_date = $_GET["start_date"];
        }
        if (isset($_GET["end_date"])) {
            $model->end_date = $_GET["end_date"];
        }
        $sql = $model->sql_export_csv($record_type);
        //$list = $model->data_query($sql);
        /////#20152810		
		$csv_dir = Yii::app()->params['admin_dir'] . 'csv/';
		@chmod(Yii::app()->params['admin_dir'], 0777);
		if ( !is_dir($csv_dir) )
			mkdir($csv_dir, 0777);
		///
		$file_tmp = $csv_dir . time() . ".csv";
		///
		$objExport = new ECSVExport();
		
		$handle = fopen($file_tmp, "a+");
		chmod($file_tmp, 0777);
		////
		$item_csv = array(
            '1' => "No",
            '2' => "OpenID",
            '3' => "ライセンスキー",
            '4' => "契約開始日",
            '5' => "契約廃止日",
        );
		$content_export = implode(",", $item_csv) . "\r\n";
		$content_export  = mb_convert_encoding($content_export, "SJIS-win", "UTF-8");
		fwrite($handle, $content_export);
		fclose($handle);
		////		
		$limit = 10000;
		$loops = true;
		$start = 0;
		$no = 1;
		while($loops){
			$offset = $start*$limit;
			$list = $model->data_query($sql . " LIMIT " . $limit . " OFFSET " . $offset); 
			if ( count($list) ){
				$handle = fopen($file_tmp, "a+");
				$content_export = '';
				/// TO DO THIS
				foreach ($list as $values) {
					$item_csv = array(
						"1" => $no,
						"2" => $objExport -> remove_new_lines($values["openid"]),
						"3" => $objExport -> remove_new_lines($values["licence_key"]),
						"4" => $objExport -> remove_new_lines($values["start_date"]),
						"5" => $objExport -> remove_new_lines($values["end_date"])
					);
					$content_export_row = implode(",", $item_csv) . "\r\n";
					$content_export_row  = mb_convert_encoding($content_export_row, "SJIS-win", "UTF-8");
					$content_export .= $content_export_row;
					$no++;
				}////end foreach
				/////
				fwrite($handle, $content_export);
				fclose($handle);
					
				if ( count($list) < $limit)
					$loops = false;
				else
					$start++;	
			}else
				$loops = false;
		}
		$content_export = '';
		if ($stream = fopen($file_tmp, 'r')) {
			$content_export = stream_get_contents($stream);
			fclose($stream);
		}
		 
		if ($record_type == '01')
            $filename = "Invoice_Data_" . date('Ym') . ".csv";
        else
            $filename = "Cancel_Data_" . date('Ym') . ".csv"; 
		 
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($filename).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file_tmp));
		echo $content_export;
		unlink($file_tmp);
		exit;
	}


    public function actionImportData() {
        $msg = '';
        if (isset($_POST['aaction'])) {
            if (!empty($_FILES["import_file"]["tmp_name"])) {
                try {
                    $handle = fopen($_FILES["import_file"]["tmp_name"], "r");
                    $MContract = new BaseContract();
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $aUpd = array();
                        if (isset($data[0]))
                            $aUpd['create_date'] = date('Y-m-d', strtotime($data[0]));
                        if (isset($data[1]))
                            $aUpd['licence_key'] = $data[1];
                        if (isset($data[2]))
                            $aUpd['openid'] = $data[2];
                        if (isset($data[3]))
                            $aUpd['record_type'] = $data[3];
                        if (isset($data[4]) && !empty($data[4]))
                            $aUpd['start_date'] = date('Y-m-d', strtotime($data[4]));
                        else
                            $aUpd['start_date'] = date('Y-m-d');
                        if (isset($data[3]) && $data[3] == '02')
                            if (isset($data[5]) && !empty($data[5]))
                                $aUpd['end_date'] = date('Y-m-d', strtotime($data[5]));
                        if (isset($data[3]) && $data[3] == '01')
                            $aUpd['end_date'] = NULL;
                        if (empty($data[1]) || empty($data[0]))
                            $check = 0;
                        else
                            $check = $MContract->updateAll($aUpd, "licence_key=:licence_key", array(':licence_key' => $data[1]));
                        if ($check < 1) {
                            $msg = '不正な契約データが入力されました。\n契約データ取り込み処理を中止します。';
                            break;
                        } else
                            $msg = '契約データの取り込みが正常に終了しました';
                    }
                } catch (Exception $error) {
                    
                }
            }
        }
        $this->render('importdata', array('message' => $msg));
    }

    public function actionDetails($id) {
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/jquery-ui/jquery-ui.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-ui-month-picker-master/MonthPicker.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/jquery-ui/jquery-ui.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/js/jquery-ui-month-picker-master/css/MonthPicker.css');
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/jquery-ui/timepicker/jquery.ui.timepicker.css');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.maskedinput.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/jquery-ui/i18n/datepicker-ja.js', CClientScript::POS_END);
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/jquery-ui/timepicker/jquery.ui.timepicker.js', CClientScript::POS_END);
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/jquery-ui/timepicker/i18n/jquery.ui.timepicker-ja.js', CClientScript::POS_END);
        $model = CContract::model()->findByPk($id);
        if($model == null){
            $this->redirect("users");
        }
        $this->render('details', array(
            'model' => $model
        ));
    }
	
	public  function  actionCheckEmailAjax(){
        header('Content-Type: application/json');
        $email1=$_POST["emailAddress1"];
        $email2=$_POST["emailAddress2"];
        $result=array("result"=>"ok");
        if(!$this->actionCheckEmail($email1)){
            $result["result"]="error";
            $result["entryMail1_1"]=1;
        }
        if(!$this->actionCheckEmail($email2)){
            $result["result"]="error";
            $result["entryMail2_1"]=1;
        }
        echo json_encode($result);
    }
	
	public function actionUpdateStatus(){
		if ( isset($_POST) && $_POST["detailID"] != null){
			$model = new CContract();
			$model->update_status($_POST["detailID"], $_POST["statusA"], $_POST["contact_dateA"] . ' ' . $_POST['contact_timeA'], $_POST["statusB"], $_POST["contact_dateB"] . ' ' . $_POST['contact_timeB'], $_POST["statusC"], $_POST["contact_dateC"] . ' ' . $_POST['contact_timeC']);
		}
		$this->redirect("users");
	}
	
	public function actionResetStatus(){
		if ( isset($_POST) && $_POST["detailID"] != null){
			$model = new CContract();
			$model->reset_status($_POST["detailID"]);
			$this->redirect("users");
		}
	}
	
	public function actionSendMail(){
		if(isset($_POST) && $_POST["email"] != null){
			$statusSelect = Yii::app()->params['statusSelect'];
			$statusSelect2 = Yii::app()->params['statusSelect2'];
			$_POST['first_status'] = $statusSelect[$_POST['first_status']];
			$_POST['second_status'] = $statusSelect[$_POST['second_status']];
			$_POST['third_status'] = $statusSelect2[$_POST['third_status']];
			if($_POST["emailType"] == "success"){
				SendEmail::send($_POST["email"], 'zaitaku_finished_mail', $_POST, Yii::app()->params['zaitaku_send_mail_bcc']);
			} else {
				SendEmail::send($_POST["email"], 'zaitaku_not_finished_mail', $_POST, Yii::app()->params['zaitaku_send_mail_bcc']);
			}
		}
		$this->redirect('details?id='.$_POST["id"]);
	}
	
	public function actionUpdateContract()

	{
	if(!isset($_POST['id']) || !isset($_POST['entryName1_1']) || !isset($_POST['entryName1_2']) || !isset($_POST['entryKana1_1']) || !isset($_POST['entryKana1_2']) || !isset($_POST['entryPhone1']) || !isset($_POST['entryMobile1']) || !isset($_POST['entryMail1_1']) || !isset($_POST['entryZip1']) || !isset($_POST['entryPref1']) || !isset($_POST['entryAddress1_1']) || !isset($_POST['entryAddress1_2']) || !isset($_POST['entryAddress1_3']) || !isset($_POST['entryAddress1_4']) || !isset($_POST['entryRemarks1']) || !isset($_POST['entryName2_1']) || !isset($_POST['entryName2_2']) || !isset($_POST['entryKana2_1']) || !isset($_POST['entryKana2_2']) || !isset($_POST['entryPhone2']) || !isset($_POST['entryMobile2']) || !isset($_POST['entryMail2_1']) || !isset($_POST['entryZip2']) || !isset($_POST['entryPref2']) || !isset($_POST['entryAddress2_1']) || !isset($_POST['entryAddress2_2']) || !isset($_POST['entryAddress2_3']) || !isset($_POST['entryAddress2_4']) || !isset($_POST['entryRemarks2']) || !isset($_POST['ageGroup1']) || !isset($_POST['ageGroup2']))

		{

			exit();

		}
		$_POST['entryPhone1'] = str_replace("-", "", $_POST['entryPhone1']);
		$_POST['entryMobile1'] = str_replace("-", "", $_POST['entryMobile1']);
		$_POST['entryZip1'] = str_replace("-", "", $_POST['entryZip1']);
		$_POST['entryPhone2'] = str_replace("-", "", $_POST['entryPhone2']);
		$_POST['entryMobile2'] = str_replace("-", "", $_POST['entryMobile2']);
		$_POST['entryZip2'] = str_replace("-", "", $_POST['entryZip2']);
		$_POST['mobile3'] = str_replace("-", "", $_POST['mobile3']);
		$_POST['zip_code3'] = str_replace("-", "", $_POST['zip_code3']);

		$check = 0;
		$model = CContract::model()->findByPk($_POST['id']);
		if($model != NULL)
		{
			$check = 1;
		}
		
		if($check == 0){

			echo 'error';

			exit();

		}

		$name1 = $_POST['entryName1_1'].$_POST['entryName1_2'];

		$kana1 = $_POST['entryKana1_1'].$_POST['entryKana1_2'];

		$name2 = $_POST['entryName2_1'].$_POST['entryName2_2'];

		$kana2 = $_POST['entryKana2_1'].$_POST['entryKana2_2'];

		if($name1 == '' || $kana1 == '' || $name2 == '' || $kana2 == '' || $_POST['entryMail1_1'] == '' || $_POST['entryMail2_1'] == '' || $_POST['entryZip1'] == '' || $_POST['entryPref1'] == '' || $_POST['entryMail2_1'] == '' || $_POST['entryMail2_1'] == '' || $_POST['entryZip2'] == '' || $_POST['entryPref2'] == ''){

			exit();

		}
        if((!$this->actionCheckEmail($_POST['entryMail1_1']))){

            exit();

        }

        if((!$this->actionCheckEmail($_POST['entryMail2_1']))){

            exit();

        }

        if(!ctype_digit($_POST['entryZip1']) || !ctype_digit($_POST['entryZip2'])){

			exit();

		}

		if((!ctype_digit($_POST['entryPhone1']) && strcmp($_POST['entryPhone1'],'') != 0) || (!ctype_digit($_POST['entryMobile1']) && strcmp($_POST['entryMobile1'],'') != 0) || (!ctype_digit($_POST['entryPhone2']) && strcmp($_POST['entryPhone2'],'') != 0) || (!ctype_digit($_POST['entryMobile2']) && strcmp($_POST['entryMobile2'],'') != 0)){

			exit();

		}
		$modelArray = array(	
								 'id' => 'id',
								 'first_name1' => 'entryName1_1',
								 'last_name1' => 'entryName1_2', 
								 'first_kana1' => 'entryKana1_1', 
								 'last_kana1' => 'entryKana1_2', 
								 'tel1' => 'entryPhone1', 
								 'mobile1' => 'entryMobile1',
								 'email1' => 'entryMail1_1', 
								 'zip_code1' => 'entryZip1', 
								 'pref1' => 'entryPref1', 
								 'address1_1' => 'entryAddress1_1', 
								 'address1_2' => 'entryAddress1_2',
								 'address1_3' => 'entryAddress1_3', 
								 'address1_4' => 'entryAddress1_4', 
								 'remark1' => 'entryRemarks1',
								 'first_name2' => 'entryName2_1',
								 'last_name2' => 'entryName2_2', 
								 'first_kana2' => 'entryKana2_1', 
								 'last_kana2' => 'entryKana2_2', 
								 'tel2' => 'entryPhone2', 
								 'mobile2' => 'entryMobile2',
								 'email2' => 'entryMail2_1', 
								 'zip_code2' => 'entryZip2', 
								 'pref2' => 'entryPref2', 
								 'address2_1' => 'entryAddress2_1', 
								 'address2_2' => 'entryAddress2_2',
								 'address2_3' => 'entryAddress2_3', 
								 'address2_4' => 'entryAddress2_4', 
								 'remark2' => 'entryRemarks2',
								 'age_group' => 'ageGroup1',
								 'age_group2' => 'ageGroup2',
								 'first_name3' => 'first_name3',
								 'last_name3' => 'last_name3',
								 'first_kana3' => 'first_kana3',
								 'last_kana3' => 'last_kana3',
								 'mobile3' => 'mobile3',
								 'zip_code3' => 'zip_code3',
								 'pref3' => 'pref3',
								 'address3_1' => 'address3_1',
								 'address3_2' => 'address3_2',
								 'address3_3' => 'address3_3',
								 'address3_4' => 'address3_4',
								 'relationship3' => 'relationship3',
								 'remark3' => 'remark3',
								 'ticket_id' => 'ticket_id',
								 'ticket_status' => 'ticket_status'
								 );
		##14779
        $arrayFieldChange =  array(
                                    'first_name1' => 'entryName1_1',
                                    'last_name1' => 'entryName1_2', 
                                    'first_kana1' => 'entryKana1_1', 
                                    'last_kana1' => 'entryKana1_2', 
                                    'age_group' => 'ageGroup1',
                                    'tel1' => 'entryPhone1',
                                    'mobile1' => 'entryMobile1', 
                                    'email1' => 'entryMail1_1', 
                                    'zip_code1' => 'entryZip1', 
                                    'pref1' => 'entryPref1', 
                                    'address1_1' => 'entryAddress1_1', 
                                    'address1_2' => 'entryAddress1_2',
                                    'address1_3' => 'entryAddress1_3', 
                                    'address1_4' => 'entryAddress1_4', 
                                    'remark1' => 'entryRemarks1',               
                                    'first_name2' => 'entryName2_1',
                                    'last_name2' => 'entryName2_2', 
                                    'first_kana2' => 'entryKana2_1', 
                                    'last_kana2' => 'entryKana2_2', 
                                    'age_group2' => 'ageGroup2',
                                    'tel2' => 'entryPhone2',
                                    'mobile2' => 'entryMobile2', 
                                    'email2' => 'entryMail2_1', 
                                    'zip_code2' => 'entryZip2', 
                                    'pref2' => 'entryPref2', 
                                    'address2_1' => 'entryAddress2_1', 
                                    'address2_2' => 'entryAddress2_2',
                                    'address2_3' => 'entryAddress2_3', 
                                    'address2_4' => 'entryAddress2_4', 
                                    'remark2' => 'entryRemarks2',
									'ticket_id' => 'ticket_id',
									'ticket_status' => 'ticket_status'
                                );
		$arrayFieldChange = array_flip($arrayFieldChange);
        $flgChange = false;
		$modelArray = array_flip($modelArray);
		foreach($_POST as $key => $value){
			if(isset($modelArray[$key])){
				$_POST[$modelArray[$key]] = $value;
			}
			///#14779 - check has changed
            if( isset($arrayFieldChange[$key]) && $model->$arrayFieldChange[$key] != $value ){
                $flgChange = true;
            }
		}
		$model->attributes=$_POST;
		
		if(isset($_POST['ticket_id'])){
			$model->ticket_id = $_POST['ticket_id'];
		}
		if(isset($_POST['ticket_status']) && ($_POST['ticket_status'] != $model->ticket_status)){
			$model->ticket_status = $_POST['ticket_status'];
			$model->ticket_date = date('Y-m-d');
		}
		
		if ( $model->save() ){
			//#14779 - check has changed  
			if ( $flgChange ){
				$this -> postBackChange($model->licence_key, $model->openid);
				if ( isset($_POST["change_send_email"]) && $_POST["change_send_email"] == 1 ){##check send mail co su thay doi
					$arrDataSendMail = $model->attributes;
					foreach ( $arrDataSendMail as $fieldName => $value ){
						if ( isset($_POST[$fieldName]) )
							$arrDataSendMail[$fieldName] = $_POST[$fieldName];
					}
					$this -> sendMailChange($_POST["entryMail1_1"], $arrDataSendMail);
				}
			}	
		}
	}
	
	public function sendMailChange($toEmail, $arrDataSendMail){
		SendEmail::sendChangeCusInfo($toEmail, 'change_customer_infor', $arrDataSendMail);
	}
	
	public function postBackChange($key, $userid){
        $url = "https://anshin.docomo-home.jp/site/initial/registered_jbr";
		$param = array(
           				'key'=>$key,
                        'userid'=>$userid
        );
		$param_string = json_encode($param);
		$ch=curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $param_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Connection:keep-alive',
			'Content-Type: application/json;charset=utf-8',                                                                                
		    'Content-Length: ' . strlen($param_string))                                                                       
		);
        $result = curl_exec($ch);
        curl_close($ch);
    }
	
	public function actionCheckEmail($email=""){
        $pattern_user   = '[a-zA-Z0-9_\-\.\+\^!#\$%&*+\/\=\?\`\|\{\}~\']+';
        $pattern_domain = '(?:(?:[a-zA-Z0-9]|[a-zA-Z0-9][a-zA-Z0-9\-]*[a-zA-Z0-9])\.?)+';
        $pattern_ipv4   = '[0-9]{1,3}(\.[0-9]{1,3}){3}';
        $pattern_ipv6   = '[0-9a-fA-F]{1,4}(\:[0-9a-fA-F]{1,4}){7}';
        $pattern = "/^$pattern_user@($pattern_domain|(\[($pattern_ipv4|$pattern_ipv6)\]))$/";
        if((!preg_match($pattern, $email))){
            return false;
        }else{
            return true;
        }
    }
	
	public function actionTickets() {
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/jquery-ui/jquery-ui.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-ui-month-picker-master/MonthPicker.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/jquery-ui/jquery-ui.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/js/jquery-ui-month-picker-master/css/MonthPicker.css');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.maskedinput.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/jquery-ui/i18n/datepicker-ja.js', CClientScript::POS_END);
        $model = new CContract();
        if (isset($_GET["telephone"])) {
            $model->telephone = $_GET["telephone"];
        }
		if (isset($_GET["ticket_id"])) {
            $model->ticket_id = $_GET["ticket_id"];
        }
        if (isset($_GET["pageSize"])) {
            $model->pageSize = $_GET["pageSize"];
        } else
            $model->pageSize = Yii::app()->params['pageSizeDefault'];
		if ( isset($_GET["search_usr_null"]) )
			$model -> search_usr_null = 1;
        $this->render('tickets', array(
            'model' => $model
        ));
    }
		
	public function actionTicketsExportCSV() {
        Yii::import('ext.ECSVExport');
        $model = new CContract();
        if (isset($_GET["telephone"])) {
            $model->telephone = $_GET["telephone"];
        }
		if (isset($_GET["ticket_id"])) {
            $model->ticket_id = $_GET["ticket_id"];
        }
        $data_csv = array();
        $no = 1;
		////
		$csv_dir = Yii::app()->params['admin_dir'] . 'csv/';
		@chmod(Yii::app()->params['admin_dir'], 0777);
		if ( !is_dir($csv_dir) )
			mkdir($csv_dir, 0777);
		
		//$start_time = microtime(true);
		$objExport = new ECSVExport();
		$content_export = '';
		$file_tmp = $csv_dir . time() . ".csv";
		$filename = "Tickets_Data_" . date('Ymd') . ".csv";
		///
		$handle = fopen($file_tmp, "a+");
		chmod($file_tmp, 0777);
		////
		$item_csv = array(
            '1' => "チケットID",
            '2' => "利用日",
            '3' => "ステータス",
            '4' => "ユーザ管理ID",
        );
		$content_export = implode(",", $item_csv) . "\r\n";
		$content_export  = mb_convert_encoding($content_export, "SJIS-win", "UTF-8");
		fwrite($handle, $content_export);
		fclose($handle);
		////
		$sql = $model->sql_tickets_export_csv();
		///
		$start_time = microtime(true);
		$code_new_line = "\r\n";
		$deliminator=",";
		$limit = 10000;
		$loops = true;
		$start = 0;
		$sql_select = $this->getSelectExportTicketsExportCSV() . $sql;
		while($loops){
			$offset = $start*$limit;
			$list = $model->data_query($sql_select . " ORDER BY id ASC LIMIT " . $limit . " OFFSET " . $offset); 
			if ( count($list) ){
				$handle = fopen($file_tmp, "a+");
				$content_export = '';
				//echo $start . ' - ' . count($list) . '<br>';
				////TO DO THIS
				$statusArr = array('1' => '未利用', '2' => '予約中', '3' => '利用済', '4' => '決済取消');
				foreach ($list as $values) { 
					$item_csv = array(
						"1" => $objExport -> remove_new_lines($values["ticket_id"]),
						"2" => $objExport -> remove_new_lines($values["user_regist_date"]),
						"3" => $objExport -> remove_new_lines($statusArr[$values["ticket_status"]]),
						"4" => $objExport -> remove_new_lines($values["id"]),
					);
					$content_export_row = implode(",", $item_csv) . "\r\n";
					$content_export_row  = mb_convert_encoding($content_export_row, "SJIS-win", "UTF-8");
					$content_export .= $content_export_row;
					$no++;
				}////end foreach
				fwrite($handle, $content_export);
				fclose($handle);
					
				if ( count($list) < $limit)
					$loops = false;
				else
					$start++;					
			}else
				$loops = false;
			//$loops = false;
		}
		//echo 'end <br>'; echo  microtime(true) - $start_time; die;
		$content_export = '';
		if ($stream = fopen($file_tmp, 'r')) {
			$content_export = stream_get_contents($stream);
			fclose($stream);
		}
		 
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($filename).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file_tmp));
		echo $content_export;
		unlink($file_tmp);
		exit;
    }
	
	public function getSelectExportTicketsExportCSV(){
		return "SELECT id, licence_key, ticket_id, ticket_status, user_regist_date ";
	}
	
	public function actionTicketsImportCSV(){
		$saveParam = "";
		$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
		if(!in_array($_FILES['csv_import_file']['type'],$mimes)){
			$saveParam = "?msgImport=2";
			$this->redirect('tickets'.$saveParam);
		}else if (!empty($_FILES["csv_import_file"]["tmp_name"])) {
			try {
				$handle = fopen($_FILES["csv_import_file"]["tmp_name"], "r");				
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					$check = 0;
					$model = new CContract();
					if (isset($data[0]))
						$model->product_name = $data[0];
					if (isset($data[1]))
						$model->product_item_number = $data[1];
					if (isset($data[2]))
						$model->product_price = $data[2];
					if (isset($data[3]))
						$model->product_user_flag = $data[3];
					if (isset($data[4]) && !empty($data[4]))
						$model->product_sale_start_date =  date('Y-m-d', strtotime($data[4]));
					else
						$model->product_sale_start_date = date('Y-m-d');
					if (isset($data[5]) && !empty($data[5]))
						$model->product_sale_end_date = date('Y-m-d', strtotime($data[5]));
					else
						$model->product_sale_end_date = date('Y-m-d');
					if (isset($data[6]))
						$model->product_description = $data[6];
					if (isset($data[7]))
						$model->product_company_name = $data[7];
					
					$model->licence_key = $this->randomString(12);
					$model->start_date = date('Y-m-d');
					$model->create_date = date('Y-m-d');
					
					if($model->save()){
						$saveParam = "?msgImport=1";
					}else{
						$saveParam = "?msgImport=3";
					}
				}
			} catch (Exception $error) {
				$saveParam = "?msgImport=3";
			}
		}
		$this->redirect('tickets'.$saveParam);
	}
	//temp function
	function randomString($length = 6) {
		$str = "";
		$characters = array_merge(range('A','Z'), range('0','9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}
}
