<?php
class AreaController extends FController {

    public function actionCheckDevice() {
        $mobile_browser = 0;
        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $mobile_browser++;
        }
        if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/vnd.wap.xhtml+xml') > 0) or ( (isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
            $mobile_browser++;
        }
        $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
        $mobile_agents = array(
            'w3c ', 'acs-', 'alav', 'alca', 'amoi', 'audi', 'avan', 'benq', 'bird', 'blac',
            'blaz', 'brew', 'cell', 'cldc', 'cmd-', 'dang', 'doco', 'eric', 'hipt', 'inno',
            'ipaq', 'java', 'jigs', 'kddi', 'keji', 'leno', 'lg-c', 'lg-d', 'lg-g', 'lge-',
            'maui', 'maxo', 'midp', 'mits', 'mmef', 'mobi', 'mot-', 'moto', 'mwbp', 'nec-',
            'newt', 'noki', 'palm', 'pana', 'pant', 'phil', 'play', 'port', 'prox',
            'qwap', 'sage', 'sams', 'sany', 'sch-', 'sec-', 'send', 'seri', 'sgh-', 'shar',
            'sie-', 'siem', 'smal', 'smar', 'sony', 'sph-', 'symb', 't-mo', 'teli', 'tim-',
            'tosh', 'tsm-', 'upg1', 'upsi', 'vk-v', 'voda', 'wap-', 'wapa', 'wapi', 'wapp',
            'wapr', 'webc', 'winw', 'winw', 'xda ', 'xda-');

        if (in_array($mobile_ua, $mobile_agents)) {
            $mobile_browser++;
        }
        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'opera mini') > 0) {
            $mobile_browser++;
        }

        if ($mobile_browser <= 0) {
             return true;
        }
        if ($mobile_browser > 0) {
              return false;
            
        }
    }

    public function actionIndex() {
        $_SESSION['area']=true;
        if (!$this->actionCheckDevice()) {
            $this->render('index');
        } else {
            $this->render('pc_index');
        }
    }

    public function actionCheckArea() {
        $rs = $_POST['zip_code'];
        $x = AreaModel::model()->getelement1($rs);
        if (strcmp($rs, "") == 0) {
            echo 'blank';
        } else {
            if (!$this->actionCheckinput($rs)) {
                echo 'wrong';
            } else {
                if (empty($x)) {
                    echo 'noexist';
                } else {
                    echo 'yes';
                }
            }
        }
    }

    public function actionResult() {
        $_SESSION['area']=true;
        $input_form = $_GET['zip_code'];
        $x = AreaModel::model()->getelement1($input_form);
        $y = AreaModel::model()->getelement2($input_form);
        $kajidaiko = "";
        $house_cleaning = "";
        $house_cleaning = $x[0]['house_cleaning'];
        $x2 = $x[0]['zip_code'];
        $pref1 = $x[0]['pref1'];
        $pref2 = $x[0]['pref2'];
        $kajidaiko = $y[0]['kajidaiko'];

        if ((strcmp($house_cleaning, "×") == 0) && (strcmp($kajidaiko, "×") == 0)) {

            if (!$this->actionCheckDevice()) {

                $this->render('result2', array('zip_code' => $input_form, 'pref1' => $pref1, 'pref2' => $pref2));
            } else {

                $this->render('pc_result2', array('zip_code' => $input_form, 'pref1' => $pref1, 'pref2' => $pref2));
            }
        } else if ((strcmp($house_cleaning, "○") == 0) && (strcmp($kajidaiko, "×") == 0)) {
            if (!$this->actionCheckDevice()) {

                $this->render('result3', array('zip_code' => $input_form, 'pref1' => $pref1, 'pref2' => $pref2));
            } else {

                $this->render('pc_result3', array('zip_code' => $input_form, 'pref1' => $pref1, 'pref2' => $pref2));
            }
        } else if ((strcmp($house_cleaning, "×") == 0) && (strcmp($kajidaiko, "○") == 0)) {

            if (!$this->actionCheckDevice()) {

                $this->render('result4', array('zip_code' => $input_form, 'pref1' => $pref1, 'pref2' => $pref2));
            } else {
                $this->render('pc_result4', array('zip_code' => $input_form, 'pref1' => $pref1, 'pref2' => $pref2));
            }
        } else {

            if (!$this->actionCheckDevice()) {

                $this->render('result1', array('zip_code' => $input_form, 'pref1' => $pref1, 'pref2' => $pref2));
            } else {
                $this->render('pc_result1', array('zip_code' => $input_form, 'pref1' => $pref1, 'pref2' => $pref2));
            }
        }
    }

    public function actionCheckinput($input) {
        $pattern = "/^[0-9]{7,7}$/";
        if ((!preg_match($pattern, $input))) {
            return false;
        } else {
            return true;
        }
    }

}