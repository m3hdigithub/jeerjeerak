<?php include_once "jdf.php";
/***** get time ago *****/
function getTimeAgo($lastTime, $parts = 6, $reShow = 0)
{
    $lastTime = strtotime($lastTime);

    /******** re show time *******/
    //$reTime = ($reShow) ? $reShow : 0;
    /******** re show time *******/


    /******** set summery time *******/
    $summerTime = jdate('f', time());
    if (in_array($summerTime, array('بهار', 'تابستان'))) {
        $lastTime += 3600;
    }
    /******** set summery time *******/

    $eTime = time() - $lastTime;

    $now = new DateTime(date("Y-m-d h:i:s", time()));
    $tsStr = new DateTime(date("Y-m-d h:i:s", $lastTime));

    $diffArr = $tsStr->diff($now);


    $agoStr = "";
    $p = 0;
    if (in_array($parts, array(1, 2, 3, 4, 5, 6))) {
        foreach ($diffArr as $key => $val) {
            $keyArr = array('Y', 'm', 'd', 'h', 'i', 's');
            if ($val != 0 && in_array($key, $keyArr)) {
                $agoStr .= $val . " $key";
                $p++;

                if ($key == "s" || $p == $parts) {
                    $agoStr .= " پیش";
                    break;
                } else {
                    $agoStr .= " و ";
                }
            }
        }
    } else {
        return false;
    }


    $t1 = 60; // 1 minute
    $t2 = 60 * 60; // 1 horse
    $t3 = 60 * 60 * 12; // horses ago
    $t4 = 60 * 60 * 24; // today / 1 day
    $t5 = 60 * 60 * 24 * 2; // yesterday / 2 day
    $t6 = 60 * 60 * 24 * 3; //  / 3 day
    $t7 = 60 * 60 * 24 * 7; // week / 7 days
    $t8 = 60 * 60 * 24 * 7 * 2; // 2 week / 14 days
    $t9 = 60 * 60 * 24 * 7 * 3; // 3 week / 21 days
    $t10 = 60 * 60 * 24 * 30; // month / 1 month
    $t11 = 60 * 60 * 24 * 30 * 12; // year / 1 year

    // just now or future
    if ($parts == 1) {
        if ($eTime < 0) {
            return 'آینده';
        } elseif ($eTime < $t1) {
            return "لحظاتی پیش";
        } elseif ($eTime >= $t1 && $eTime < $t2) {
            return "دقایقی پیش";
        } elseif ($eTime >= $t2 && $eTime < $t3) {
            return "ساعاتی پیش";
        } elseif ($eTime >= $t3 && $eTime < $t4) {
            return "امروز";
        } elseif ($eTime >= $t4 && $eTime < $t5) {
            return "دیروز";
        } elseif ($eTime >= $t5 && $eTime < $t6) {
            return "پریروز";
        } elseif ($eTime == $t7 && $eTime < ($t7 + $t4)) {
            return "هفته پیش";
        } elseif ($eTime == $t8 && $eTime < ($t8 + $t4)) {
            return "دو هفته پیش";
        } elseif ($eTime == $t9 && $eTime < ($t9 + $t4)) {
            return "سه هفته پیش";
        } elseif ($eTime == $t10 && $eTime < ($t10 + $t4)) {
            return "یک ماه پیش";
        } elseif ($eTime == $t11 && $eTime < ($t11 + $t4)) {
            return "یک سال پیش";
        } else {
            $agoStr = str_replace(array('y', 'm', 'd', 'h', 'i', 's'), array('سال', 'ماه', 'روز', 'ساعت', 'دقیقه', 'ثانیه'), $agoStr);
        }
    } else {
        $agoStr = str_replace(array('y', 'm', 'd', 'h', 'i', 's'), array('سال', 'ماه', 'روز', 'ساعت', 'دقیقه', 'ثانیه'), $agoStr);

    }
    if ($reShow) {
        $agoStr = str_replace('پیش', 'مانده', $agoStr);
    }
    return ($agoStr != "") ? str_replace('-', '', $agoStr) : false;
}

/***** Data Cleaning and Sanitizing Functions *****/
function cleanInput(&$input)
{

    $search = array(
        '@<script[^>]*?>.*?</script>@si', // Strip out javascript
        '@<[\/\!]*?[^<>]*?>@si', // Strip out HTML tags
        '@<style[^>]*?>.*?</style>@siU', // Strip style tags properly
        '@<![\s\S]*?--[ \t\n\r]*>@' // Strip multi-line comments
    );

    $output = preg_replace($search, '', $input);
    $input = $output;
    return $output;
}

function sanitize(&$input)
{
    global $db;
    if (is_array($input)) {
        foreach ($input as $var => $val) {
            $output[$var] = sanitize($val);
        }
    } else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        $input = cleanInput($input);
        $output = $db->real_escape_string($input);
    }
    $input = $output;
    return $output;
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function sanInput($input, $type)
{
    $err = array('string' => true, 'int' => true, 'email' => true, 'url' => true);

    // string
    if ($type == 'string') {
        $input = strip_tags($input);
        $input = filter_var($input, FILTER_SANITIZE_STRING); // -> not a tag
        if (!$input) {
            $err['string'] = false;
        }
    }

    // int
    if ($type == 'int') {
        $input = strip_tags($input);
        $int_options = array("options" => array("min_range" => 0, "max_range" => PHP_INT_MAX));
        $input = filter_var($input, FILTER_SANITIZE_NUMBER_INT, $int_options);
        if (!$input) {
            $err['int'] = false;
        }
    }

    // email
    if ($type == 'email') {
        $input = strip_tags($input);
        $input = filter_var($input, FILTER_VALIDATE_EMAIL);
        if (!$input) {
            $err['email'] = false;
        }
    }

    // url
    if ($type == 'url') {
        $input = strip_tags($input);
        $input = filter_var($input, FILTER_SANITIZE_URL);
        if (!$input) {
            $err['url'] = false;
        }
    }

    foreach ($err as $item => $value) {
        if ($value == false) {
            return false;
        }
    }
    return $input;
}

/***** show and counter timer *****/
function counterTimeNew($num)
{
    $timer = '<span id="num">' . $num . '</span>
                      <script>
                          var seconds;
                          var temp;
                          function countdown() {
                              seconds = document.getElementById(\'num\').innerHTML;
                              if (seconds == 0) {
                                  temp = document.getElementById(\'num\');
                                  temp.innerHTML = "0";
                                  return;
                              }
                              seconds--;
                              temp = document.getElementById(\'num\');
                              temp.innerHTML = seconds;
                              timeoutMyOswego = setTimeout(countdown, 1000);
                          }
                          countdown();
              </script>';
    return $timer;
}

function checkUID($id)
{
    // check valid numbers sporadic(whole number/integer) *****/
    $i = 1;
    $s = 0;
    $stringLength = strlen($id);
    $pMixedToArr = array();
    while ($i <= $stringLength) {
        $pMixedToArr[] = substr($id, $s, 1);
        $i++;
        $s++;
    }
    $validNumbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    $isValid = true;
    foreach ($pMixedToArr as $pKey => $pVal) {
        if (in_array($pVal, $validNumbers)) {

        } else {
            $isValid = false;
            break;
        }
    }
    return $isValid;
}

function changeDate($date, $type = 'fa', $delimiter1 = '-', $delimiter2 = '-')
{
    $value = false;
    if ($type == 'fa') {
        $dateArr = explode($delimiter1, $date);
        $goY = $dateArr[0];
        $goM = $dateArr[1];
        $goD = $dateArr[2];
        $value = jalali_to_gregorian($goY, $goM, $goD, $delimiter2);
    } elseif ($type == 'en') {
        $dateArr = explode($delimiter1, $date);
        $goY = $dateArr[0];
        $goM = $dateArr[1];
        $goD = $dateArr[2];
        $value = gregorian_to_jalali($goY, $goM, $goD, $delimiter2);
    } else {
        $value = false;
    }
    return $value;
}

function getHash($str)
{
    $saltStr = 'hj65?JH!8*sds6566_.#$kld8&G';
    $hash = sha1($saltStr . md5($str . $saltStr));
    return $hash;
}

/*********** get all cats & sub cats*************/
$i = '';
$j = '';
function getSubCat($table, $editID, $id)
{
    global $db, $i, $j;

    $tID = $id;
    $subCats = $db->query("SELECT id,title FROM $table WHERE sub_cat='$tID'")->fetch_all(1);
    if ($subCats) {
        foreach ($subCats as $sCats => $sub) {
            $i .= '-';
            $j .= '&nbsp;&nbsp;&nbsp;';
            $subCatEdited = $db->query("SELECT sub_cat FROM $table WHERE id='$editID'")->fetch_all(1)[0]['sub_cat'];
            $selected = ($subCatEdited == $sub['id']) ? 'selected' : '';
            echo '<option style="color: #666666;" value="' . $sub['id'] . '" ' . $selected . '>' . $j . $i . $sub['title'] . '</option>';
            getSubCat($table, $editID, $sub['id']);
        }
    } else {
        $i = '';
        $j = '';
    }
}

/************************/

/*********** get all cats & sub cats*************/
$allCatsSub = array();
function getSubCatDelArr($table, $id)
{
    global $db, $allCatsSub;

    $tID = $id;
    $subCats = $db->query("SELECT id,title FROM $table WHERE sub_cat='$tID'")->fetch_all(1);
    if ($subCats) {
        foreach ($subCats as $subCat => $sub) {
            $id = $sub['id'];
            $allCatsSub[] = $id;
            getSubCatDelArr($table, $id);
        }
    }
}

function delSubArr($table, $id)
{
    global $db, $allCatsSub;
    $allCatsSub[] = $id;
    getSubCatDelArr($table, $id);

    $allCatsSub = array_unique($allCatsSub);

    if (count($allCatsSub) > 0) {
        foreach ($allCatsSub as $subCats => $subCat) {
            $image = $db->query("select image from $table WHERE id='$subCat'")->fetch_all(1);
            if ($image) {
                $image = $image[0]['image'];
                @unlink($image);
            }
            $db->query("DELETE FROM $table WHERE id='$subCat'");
        }
    }
}

/************************/
function getTitleCats($table, $catIDs, $price = false)
{
    global $db;

    $allCats = '';
    $allPrice = '';

    $position = strpos($catIDs, '-');
    if ($position > 0) {
        $catArr = explode('-', $catIDs);
        foreach ($catArr as $cat => $c) {
            $catInfo = $db->query("SELECT * FROM $table WHERE id='$c'")->fetch_all(1);
            if ($catInfo) {
                $allCats .= $catInfo[0]['title'] . ' - ';
                @$allPrice += ($catInfo[0]['price'] && $catInfo[0]['price'] != '') ? $catInfo[0]['price'] : 0;
            }
        }
    } else {
        $catInfo = $db->query("SELECT * FROM $table WHERE id='$catIDs'")->fetch_all(1);
        if ($catInfo) {
            $allCats .= $catInfo[0]['title'] . ' - ';
            @$allPrice += ($catInfo[0]['price'] && $catInfo[0]['price'] != '') ? $catInfo[0]['price'] : 0;
        }
    }

    if ($price) {
        return $allPrice;
    } else {
        $allCats = rtrim($allCats, ' - ');
        return $allCats;
    }
}

function getTitleCats2($table, $catIDs, $price = false)
{
    global $db;
    $catArr = explode('-', $catIDs);
    $motherCats = array();
    $subCats = array();
    $exportStr = '';

    # all mother cats
    $i = 0;
    foreach ($catArr as $cat => $c) {
        $isMother = $db->query("SELECT * FROM $table WHERE id='$c' AND sub_cat='0'")->fetch_all(1);
        $catInfo = $db->query("SELECT * FROM $table WHERE id='$c'")->fetch_all(1);

        if ($isMother) {
            $motherCats[$i]['id'] = $isMother[0]['id'];
            $motherCats[$i]['title'] = $isMother[0]['title'];
        }
        $i++;
    }

    # all sub cats
    $j = 0;
    foreach ($catArr as $cat => $c) {
        $isSub = $db->query("SELECT * FROM $table WHERE id='$c' AND sub_cat!='0'")->fetch_all(1);

        if ($isSub) {
            $subCats[$j]['sub_cat'] = $isSub[0]['sub_cat'];
            $subCats[$j]['title'] = $isSub[0]['title'];
        }
        $j++;
    }

    foreach ($motherCats as $mothers => $mother) {
        $exportStr .= '<b>' . $mother['title'] . ' (</b><span style="color:#999999;">';
        foreach ($subCats as $subs => $sub) {
            if ($sub['sub_cat'] == $mother['id']) {
                $exportStr .= $sub['title'] . '-';
            }
        }
        $exportStr = rtrim($exportStr, '-');
        $exportStr .= '</span><b>)</b><br>';
    }

    return $exportStr;
}

function getCharRand($numChar = 5)
{
    $charArr = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'Y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'G', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

    $saltChar = '';

    for ($i = 1; $i <= $numChar; $i++) {
        $saltChar .= $charArr[rand(0, 61)];
    }
    return $saltChar;
}

function getField($table, $field, $con1 = 1, $con2 = 1)
{
    global $db;
    $queryToDB = $db->query("SELECT $field FROM $table WHERE $con1='$con2'")->fetch_all(1);
    if ($queryToDB) {
        return $result = $queryToDB[0][$field];
    } else {
        return false;
    }
}

//*********** of code actions **********//
function checkAlreadyUsedOfCode($userID, $offCodeID)
{
    global $db, $usedOffCodeTable;
    $sql = "SELECT COUNT(*) as c FROM $usedOffCodeTable WHERE user_id='$userID' AND off_code_id='$offCodeID'";
    $res = $db->query($sql)->fetch_object()->c;
    if ($res && $res > 0) {
        return true;
    } else {
        return false;
    }
}

function isOffCode($reqID)
{
    global $db, $requestsTable;
    $sql = "SELECT off_code FROM $requestsTable WHERE id='$reqID'";
    $res = $db->query($sql)->fetch_all(1);
    if ($res) {
        return true;
    } else {
        return false;
    }
}

function ofCodeExpire($offCode)
{
    global $db, $offCodesTable;
    $sql = "SELECT * FROM $offCodesTable WHERE id='$offCode' OR off_code='$offCode'";
    $res = $db->query($sql)->fetch_all(1);
    if ($res) {
        $start = strtotime($res[0]['start_date']);
        $end = strtotime($res[0]['end_date']);
        $thisTime = time();

        if (($thisTime > $start) && ($thisTime < $end)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function setOffCodeToAmount($requestID, $customerID, $amount)
{
    global $db, $requestsTable, $offCodesTable;
    $getOffCode = $db->query("SELECT off_code FROM $requestsTable WHERE id='$requestID'")->fetch_all(1)[0]['off_code'];
    $allOffCodes = $db->query("SELECT * FROM $offCodesTable WHERE off_code='$getOffCode'")->fetch_all(1);
    $lastAmount = $amount;
    if ($allOffCodes) {
        $ofCodeDarsad = $allOffCodes[0]['darsad'];
        $ofCodeID = $allOffCodes[0]['id'];

        if (ofCodeExpire($ofCodeID)) {
            if (!checkAlreadyUsedOfCode($customerID, $ofCodeID)) {
                if ($ofCodeDarsad) {
                    $lastAmount = ($amount * $ofCodeDarsad) / 100;
                    $lastAmount = $amount - $lastAmount;
                } else {
                    $lastAmount = $amount;
                }
            } else {
                $lastAmount = $amount;
            }
        } else {
            $lastAmount = $amount;
        }
    } else {
        $lastAmount = $amount;
    }
    return $lastAmount;
}


//*********** gift credit functions **********//
function checkAlreadyUsedGiftCredit($userID, $offCodeID)
{
    global $db, $usedGiftCreditTable;
    $sql = "SELECT COUNT(*) as c FROM $usedGiftCreditTable WHERE user_id='$userID' AND off_code_id='$offCodeID'";
    $res = $db->query($sql)->fetch_object()->c;
    if ($res && $res > 0) {
        return true;
    } else {
        return false;
    }
}

function GiftCreditExpire($offCode)
{
    global $db, $giftCreditTable;
    $sql = "SELECT * FROM $giftCreditTable WHERE id='$offCode' OR off_code='$offCode'";
    $res = $db->query($sql)->fetch_all(1);
    if ($res) {
        $start = strtotime($res[0]['start_date']);
        $end = strtotime($res[0]['end_date']);
        $thisTime = time();

        if (($thisTime > $start) && ($thisTime < $end)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function setGiftCreditToAmount($giftCode, $customerID)
{
    global $db, $giftCreditTable;
    $allGiftCredits = $db->query("SELECT * FROM $giftCreditTable WHERE off_code='$giftCode'")->fetch_all(1);
    $lastAmount = 0;
    if ($allGiftCredits) {
        $giftCreditAmount = $allGiftCredits[0]['darsad'];
        $ofCodeID = $allGiftCredits[0]['id'];

        if (GiftCreditExpire($ofCodeID)) {
            if (!checkAlreadyUsedGiftCredit($customerID, $ofCodeID)) {
                if ($giftCreditAmount) {
                    $lastAmount = $giftCreditAmount;
                } else {
                    $lastAmount = 0;
                }
            } else {
                $lastAmount = 10;
            }
        } else {
            $lastAmount = 11;
        }
    } else {
        $lastAmount = 12;
    }
    return $lastAmount;
}

function setLastMsgTable($sendID)
{
    global $db, $servicemansTable, $lastMsgTable, $nowTime;
    $userInfo = $db->query("SELECT s_name,s_family,s_thumb FROM $servicemansTable WHERE id='$sendID'")->fetch_all(1)[0];
    $name = $userInfo['s_name'];
    $family = $userInfo['s_family'];
    $thumb = $userInfo['s_thumb'];

    $alreadyExist = $db->query("SELECT COUNT(user_id) as c FROM $lastMsgTable WHERE user_id='$sendID'")->fetch_object()->c;
    if ($alreadyExist > 0) { // update
        // update to last Msg table
        $db->query("UPDATE $lastMsgTable SET date_time='$nowTime' WHERE user_id='$sendID'");
    } else { // insert
        // set to last Msg table
        $db->query("INSERT INTO $lastMsgTable (user_id,user_name,user_family,s_thumb,date_time) VALUES ('$sendID','$name','$family','$thumb','$nowTime')");
    }
}

function existLoginMobile($mobile, $field = 'id')
{
    global $db, $loginTable;
    if ($mobile) {
        $getID = $db->query("SELECT * FROM $loginTable WHERE mobile = '$mobile'")->fetch_assoc();
        $userID = $getID["$field"];
        if ($userID) {
            return $userID;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function checkloginByPass($u, $p)
{
    global $customersTable;
    $u = sanitize(test_input($u));
    $p = sanitize(test_input($p));
    $isUser = getField($customersTable, 'id', 'u_username', $u);
    if ($isUser) {
        $userPass = getField($customersTable, 'u_password', 'id', $isUser);
        if (getHash($p) == $userPass) {
            return 'ok';
        } else {
            return 'failed';
        }
    } else {
        return 'notUser';
    }
}

/*  function getHash($str)
  {
      $saltStr = 'khEdMatNet.cOm';
      $hash = sha1($saltStr . md5($str . $saltStr));
      return $hash;
  }*/

/********** validation iran phone number(without zero) **********/
function validationIranPhoneNumber($phoneNumber)
{
    /*
     .---------------------------------------------------.
     |********************** help ***********************|
     | 1-must your input(phone number) without zero      |
     | 2-must length your input(phone number) 11 number  |
     `---------------------------------------------------`
    */

    // check valid type
    $validTypes = array('integer', 'double', 'string');
    $isValidType = (in_array(gettype($phoneNumber), $validTypes)) ? true : false;

    settype($phoneNumber, 'string');

    // check valid length
    $stringLength = strlen($phoneNumber);
    $isValidLen = ($stringLength == 11) ? true : false;
    $isValidNumberIran = (substr($phoneNumber, 0, 2) == '09') ? true : false;

    // check valid numbers sporadic(whole number/integer) *****/
    $i = 1;
    $s = 0;
    $pMixedToArr = array();
    while ($i <= $stringLength) {
        $pMixedToArr[] = substr($phoneNumber, $s, 1);
        $i++;
        $s++;
    }
    $validNumbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    $isValidNumber = true;
    foreach ($pMixedToArr as $pKey => $pVal) {
        if (in_array($pVal, $validNumbers)) {

        } else {
            $isValidNumber = false;
            break;
        }
    }


    /********** check condition **********/
    if ($isValidType && $isValidLen && $isValidNumberIran && $isValidNumber) {
        return true;
    } else {
        return false;
    }
}

function sendSms($number, $msg)
{
    global $smsPanelUsername, $smsPanelPassword, $smsPanelSenderNumber;
    if (1) {
        try {
            $client = new \SoapClient('http://sms-webservice.ir/v1/v1.asmx?WSDL');

            $parameters['Username'] = $smsPanelUsername;
            $parameters['PassWord'] = $smsPanelPassword;
            $parameters['SenderNumber'] = $smsPanelSenderNumber;
            $parameters['RecipientNumbers'] = array("$number");
            $parameters['MessageBodie'] = "$msg";
            $parameters['Type'] = 1;
            $parameters['AllowedDelay'] = 0;

            $client->SendMessage($parameters);
            return true;
        } catch (SoapFault $ex) {
            return false;
        }
    } else {
        return false;
    }
}

function checkCode($sessionCode, $code)
{
    if ($sessionCode == $code) {
        return true;
    } else {
        return false;
    }
}

/********** get all category **********/
function getAllCats22($catid = null)
{
    global $db, $baseUrlSite, $categoeyTable;
    $table = $categoeyTable;

    if (is_null($catid)) {
        $sql = "SELECT * FROM $table";
    } else {
        $sql = "SELECT * FROM $table WHERE sub_cat='$catid'";
    }

    $result = $db->query($sql);
    $data = $result->fetch_all(1);

    $changeData = array();
    $i = 0;
    $j = 0;
    if ($catid != null) {
        $detile = $db->query("SELECT * FROM $table WHERE id='$catid'")->fetch_all(1)[0];
        foreach ($data as $dat => $d) {
            if ($d['sub_cat'] == $catid) {
                $changeData[$i] = array('id' => $d['id'], 'sub_id' => $d['sub_cat'], 'title' => $d['title'], 'description' => $d['description'], 'icon' => $d['icon'], 'price' => $d['price'], 'image' => str_replace('../../', $baseUrlSite, $d['image']), 'soon' => $d['soon'], 'genderActive' => $d['gender_active'], 'mdActive' => $d['md_active'], 'tarefe' => $d['tarefe']);
            }
            $i++;
        }
        $changeData['detail'] = array('id' => $detile['id'], 'sub_id' => $detile['sub_cat'], 'title' => $detile['title'], 'description' => $detile['description'], 'icon' => $detile['icon'], 'price' => $detile['price'], 'image' => str_replace('../../', $baseUrlSite, $detile['image']), 'soon' => $detile['soon'], 'genderActive' => $detile['gender_active'], 'mdActive' => $detile['md_active'], 'tarefe' => $detile['tarefe']);

    } else {
        foreach ($data as $dat => $d) {
            if ($d['sub_cat'] == 0) {
                $changeData[$i] = array('id' => $d['id'], 'sub_id' => $d['sub_cat'], 'title' => $d['title'], 'description' => $d['description'], 'icon' => $d['icon'], 'price' => $d['price'], 'image' => str_replace('../../', $baseUrlSite, $d['image']), 'soon' => $d['soon'], 'genderActive' => $d['gender_active'], 'mdActive' => $d['md_active'], 'tarefe' => $d['tarefe']);
                foreach ($data as $sDate => $sd) {
                    if ($sd['sub_cat'] != 0 && $sd['sub_cat'] == $d['id']) {
                        $changeData[$i]['sub_cats'][] = array('id' => $sd['id'], 'sub_id' => $sd['sub_cat'], 'title' => $sd['title'], 'description' => $sd['description'], 'icon' => $sd['icon'], 'price' => $sd['price'], 'image' => str_replace('../../', $baseUrlSite, $d['image']), 'soon' => $d['soon'], 'genderActive' => $d['gender_active'], 'mdActive' => $d['md_active'], 'tarefe' => $d['tarefe']);
                        $j++;
                    } else {
                        $j = 0;
                    }
                }
                $i++;
            }
        }
    }

    if ($changeData) {
        return $changeData;
    } else {
        return false;
    }
}

function getAllCats($catid = null)
{
    global $db, $baseUrlSite, $categoeyTable, $backImageAddress;
    $table = $categoeyTable;

    if (is_null($catid)) {
        $sql = "SELECT * FROM $table";
    } else {
        $sql = "SELECT * FROM $table WHERE sub_cat='$catid'";
    }

    $result = $db->query($sql);
    $data = $result->fetch_all(1);

    $changeData = array();
    $changeData['detail'] = 0;
    $i = 0;
    $j = 0;
    if ($catid != null) {
        $detile = $db->query("SELECT * FROM $table WHERE id='$catid'")->fetch_all(1)[0];
        foreach ($data as $dat => $d) {
            if ($d['sub_cat'] == $catid) {
                $numSubCats3 = getField($table, 'COUNT(id)', 'sub_cat', $d['id']);
                $changeData[$i] = array('id' => $d['id'], 'sub_id' => $d['sub_cat'], 'num_sub_cat' => $numSubCats3, 'title' => $d['title'], 'description' => $d['description'], 'icon' => $d['icon'], 'price' => $d['price'], 'image' => str_replace($backImageAddress, $baseUrlSite, $d['image']), 'soon' => $d['soon'], 'genderActive' => $d['gender_active'], 'mdActive' => $d['md_active'], 'tarefe' => $d['tarefe']);
            }
            $i++;
        }
        $numSubCats = getField($table, 'COUNT(id)', 'sub_cat', $detile['id']);
        $changeData['detail'] = array('id' => $detile['id'], 'sub_id' => $detile['sub_cat'], 'num_sub_cat' => $numSubCats, 'title' => $detile['title'], 'description' => $detile['description'], 'icon' => $detile['icon'], 'price' => $detile['price'], 'image' => str_replace($backImageAddress, $baseUrlSite, $detile['image']), 'soon' => $detile['soon'], 'genderActive' => $detile['gender_active'], 'mdActive' => $detile['md_active'], 'tarefe' => $detile['tarefe']);
    } else {
        foreach ($data as $dat => $d) {
            if ($d['sub_cat'] == 0) {
                $numSubCats = getField($table, 'COUNT(id)', 'sub_cat', $d['id']);
                $changeData[$i] = array('id' => $d['id'], 'sub_id' => $d['sub_cat'], 'num_sub_cat' => $numSubCats, 'title' => $d['title'], 'description' => $d['description'], 'icon' => $d['icon'], 'price' => $d['price'], 'image' => str_replace($backImageAddress, $baseUrlSite, $d['image']), 'soon' => $d['soon'], 'genderActive' => $d['gender_active'], 'mdActive' => $d['md_active'], 'tarefe' => $d['tarefe']);
                foreach ($data as $sDate => $sd) {
                    if ($sd['sub_cat'] != 0 && $sd['sub_cat'] == $d['id']) {
                        $numSubCats2 = getField($table, 'COUNT(id)', 'sub_cat', $sd['id']);
                        $changeData[$i]['sub_cats'][] = array('id' => $sd['id'], 'sub_id' => $sd['sub_cat'], 'num_sub_cat' => $numSubCats2, 'title' => $sd['title'], 'description' => $sd['description'], 'icon' => $sd['icon'], 'price' => $sd['price'], 'image' => str_replace($backImageAddress, $baseUrlSite, $d['image']), 'soon' => $d['soon'], 'genderActive' => $d['gender_active'], 'mdActive' => $d['md_active'], 'tarefe' => $d['tarefe']);
                        $j++;
                    } else {
                        $j = 0;
                    }
                }
                $i++;
            }
        }
    }

    if ($changeData) {
        return $changeData;
    } else {
        return false;
    }
}

function checkServicemanZoon($mapLatRequest, $mapLonRequest, $mapLatServicer, $mapLonServicer)
{
    $mLatS = explode('.', $mapLatServicer);
    $mLonS = explode('.', $mapLonServicer);

    $mLatSer = $mLatS[0];
    $mLonSer = $mLonS[0];

    $mLatR = explode('.', $mapLatRequest);
    $mLonR = explode('.', $mapLonRequest);

    $mLatUp = $mLatR[0] + 1;
    $mLonUp = $mLonR[0] + 1;

    $mLatDown = $mLatR[0] - 1;
    $mLonDown = $mLonR[0] - 1;

    $cond1 = ($mLatSer <= $mLatUp && $mLatSer >= $mLatDown) ? true : false;
    $cond2 = ($mLonSer <= $mLonUp && $mLonSer >= $mLonDown) ? true : false;

    if ($cond1 && $cond2) {
        return true;
    } else {
        return false;
    }
}

function getTimeAgoMin($time)
{
    $getTime = strtotime($time);
    $thisTime = time();
    $diff = $thisTime - $getTime;
    if ($diff <= 600) {
        return $diff;
    } else {
        return $diff;
    }
}

function getDiffTime($time)
{
    $getTime = strtotime($time);
    $thisTime = time();
    $diff = $thisTime - $getTime;
    return $diff;
}

/************** get info of user logined ************/
function getUserLoginInfo($mobile, $id = null, $type = 'c')
{
    global $db, $baseUrlSite, $customersTable, $servicemansTable, $backImageAddress;


    if ($type == 'c') {
        if ($id != null) {
            $sql = "SELECT * FROM $customersTable WHERE u_mobile='$mobile'";
        } else {
            $sql = "SELECT * FROM $customersTable WHERE u_mobile='$mobile' OR id='$id'";
        }
    } elseif ($type == 's') {
        if ($id != null) {
            $sql = "SELECT * FROM $servicemansTable WHERE s_mobile='$mobile'";
        } else {
            $sql = "SELECT * FROM $servicemansTable WHERE s_mobile='$mobile' OR id='$id'";
        }
    } else {
        return null;
    }
    $res = $db->query($sql)->fetch_all(1);
    $res = ($res) ? $res[0] : false;
    if ($res) {
        if ($type == 'u') {
            $res['u_thumb'] = str_replace($backImageAddress, $baseUrlSite, $res['u_thumb']);
            $res['u_image'] = str_replace($backImageAddress, $baseUrlSite, $res['u_image']);
        }
        if ($type == 's') {
            $res['s_thumb'] = str_replace($backImageAddress, $baseUrlSite, $res['s_thumb']);
            $res['s_image'] = str_replace($backImageAddress, $baseUrlSite, $res['s_image']);
        }
        return $res;
    } else {
        return false;
    }
}

function checkCanceled($requstID)
{
    global $db, $requestsTable;
    $sql = "SELECT canceled FROM $requestsTable WHERE id='$requstID'";
    $res = $db->query($sql)->fetch_all(1);
    $isCancel = ($res) ? $res[0]['canceled'] : null;

    if ($isCancel != null) {
        if ($isCancel == '1') {
            return true;
        } elseif ($isCancel == '0') {
            return false;
        } else {
            return 'notSet';
        }
    } else {
        return 'isNull';
    }
}

function checkStatusReq($requstID)
{
    global $db, $requestsTable;
    $sql = "SELECT status FROM $requestsTable WHERE id='$requstID'";
    $res = $db->query($sql)->fetch_all(1);
    $isCancel = ($res) ? $res[0]['status'] : null;

    if ($isCancel != null) {
        if ($isCancel == '0') {
            return 'zero';
        } elseif ($isCancel == '1') {
            return 'one';
        } elseif ($isCancel == '2') {
            return 'two';
        } elseif ($isCancel == '3') {
            return 'three';
        } else {
            return 'notSet';
        }
    } else {
        return 'isNull';
    }
}

# get item rate
function getRate($itemID)
{
    global $db, $ratingTable;
    $sql = "SELECT SUM(rate) as s FROM $ratingTable WHERE item_id='$itemID'";
    $countSql = "SELECT count(*) as c FROM $ratingTable WHERE item_id='$itemID'";

    $result = $db->query($sql);
    if ($result) {
        $records = $result->fetch_object()->s;
        $numRecords = $db->query($countSql)->fetch_object()->c;
        $res = ($numRecords > 0) ? round($records / $numRecords) : 4;
        return $res;
    } else {
        return 4;
    }
}

function getNotificationsMsg($table, $userID)
{
    global $db;
    $sql = "SELECT COUNT(*) as c FROM $table WHERE status='pending' AND (getID='$userID' OR sendID='$userID')";
    $data = $db->query($sql)->fetch_object()->c;

    return $data;
}

/*  function getTitleCats($table, $catIDs, $price = false)
  {
      global $db;
      $allCats = '';
      $allPrice = '';
      $catArr = explode('-', $catIDs);

      foreach ($catArr as $cat => $c) {
          $catInfo = $db->query("SELECT * FROM $table WHERE id='$c'")->fetch_all(1);
          if ($catInfo) {
              $allCats .= $catInfo[0]['title'] . ' - ';
              @$allPrice += ($catInfo[0]['price'] && $catInfo[0]['price'] != '') ? $catInfo[0]['price'] : 0;
          }
      }


      if ($price) {
          return $allPrice;
      } else {
          $allCats = rtrim($allCats, ' - ');
          return $allCats;
      }
  }*/

/*  function checkAlreadyUsedOfCode($userID, $offCodeID)
  {
      global $db, $usedOffCodeTable;
      $sql = "SELECT COUNT(*) as c FROM $usedOffCodeTable WHERE user_id='$userID' AND off_code_id='$offCodeID'";
      $res = $db->query($sql)->fetch_object()->c;
      if ($res && $res > 0) {
          return true;
      } else {
          return false;
      }
  }*/

/*  function setOffCodeToAmount($requestID, $customerID, $amount)
  {
      global $db, $requestsTable, $offCodesTable;
      $getOffCode = $db->query("SELECT off_code FROM $requestsTable WHERE id='$requestID'")->fetch_all(1)[0]['off_code'];
      $allOffCodes = $db->query("SELECT * FROM $offCodesTable WHERE off_code='$getOffCode'")->fetch_all(1);
      $lastAmount = $amount;
      if ($allOffCodes) {
          $ofCodeDarsad = $allOffCodes[0]['darsad'];
          $ofCodeID = $allOffCodes[0]['id'];

          if (!checkAlreadyUsedOfCode($customerID, $ofCodeID)) {
              if ($ofCodeDarsad) {
                  $lastAmount = ($amount * $ofCodeDarsad) / 100;
                  $lastAmount = $amount - $lastAmount;
              } else {
                  $lastAmount = $amount;
              }
          } else {
              $lastAmount = $amount;
          }
      } else {
          $lastAmount = $amount;
      }
      return $lastAmount;
  }*/

/*function isReqID($requstID)
{
    global $db;
    global $requestsTable;
    $sql = "SELECT id FROM $requestsTable WHERE id='$requstID'";
    $res = $db->query($sql)->fetch_all(1);
    $isID = ($res) ? true : null;
    if ($isID) {
        return true;
    } else {
        return false;
    }
}*/

function checkAllowPay($id)
{
    global $db, $ordersTable;
    $sql = "SELECT status FROM $ordersTable WHERE id='$id'";
    $res = $db->query($sql)->fetch_all(1);
    $payStatus = ($res) ? $res[0]['status'] : null;
    if ($payStatus != null && $payStatus == '0') {
        return true;
    } else {
        return false;
    }
}

function unacceptThisRequest($servicemanID, $requstID)
{
    global $db, $unacceptRByServiceManTable;
    $sql = "SELECT * FROM $unacceptRByServiceManTable WHERE serviceman_id='$servicemanID'";
    $result = $db->query($sql)->fetch_all(1);
    if ($result) {
        $result = $result[0];
        $allUnacceptRequests = $result['requests'];
        $allUnacceptRequests = rtrim($allUnacceptRequests, '-');
        $allUnacceptRequestsArr = explode('-', $allUnacceptRequests);
        if (in_array($requstID, $allUnacceptRequestsArr)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function setUnacceptRequest($servicemanID, $requstID)
{
    global $db, $unacceptRByServiceManTable;
    if (!unacceptThisRequest($servicemanID, $requstID)) {
        $requestIDD = $requstID . '-';
        $sql = "INSERT INTO $unacceptRByServiceManTable (serviceman_id,requests) VALUES ('$servicemanID','$requestIDD')";
        $alreadyServiceman = getField($unacceptRByServiceManTable, 'requests', 'serviceman_id', $servicemanID);
        if ($alreadyServiceman) {
            $beforRequests = $alreadyServiceman;
            $upRequestVal = $beforRequests . $requestIDD;
            $sql = "UPDATE $unacceptRByServiceManTable SET requests='$upRequestVal' WHERE serviceman_id='$servicemanID'";
        }
        $db->query($sql);
    }
}

//**************login user blocking ****************//
function isNotBlockUser($userID)
{
    global $db, $userLoginBlockTable, $apiLCAllowedNum, $apiLCAllowedTime, $nowTime;

    $isUser = $db->query("SELECT COUNT(id) as c FROM $userLoginBlockTable WHERE user_id='$userID'")->fetch_object()->c;
    if ($isUser > 0) { // second login
        $num = getField($userLoginBlockTable, 'num_login', 'user_id', $userID);
        if ($num >= $apiLCAllowedNum) {
            $lastTimeLogin = getField($userLoginBlockTable, 'date_time', 'user_id', $userID);

            $getTime = strtotime($lastTimeLogin);
            $thisTime = time();
            $diff = $thisTime - $getTime;
            if ($diff <= $apiLCAllowedTime) {
                return false;
            } else {
                $db->query("UPDATE $userLoginBlockTable SET num_login='0',date_time='$nowTime' WHERE user_id='$userID'");
                return true;
            }
        } else {
            return true;
        }

    } else { // first login
        return true;
    }
}

function setAndGetNumLogin($userID, $get = false)
{
    global $db, $userLoginBlockTable, $apiLCAllowedNum, $nowTime;

    if ($get) {
        $num = $db->query("SELECT SUM(num_login) as c FROM $userLoginBlockTable WHERE user_id='$userID'")->fetch_object()->c;
        return $num;
    } else {
        $isUser = $db->query("SELECT COUNT(id) as c FROM $userLoginBlockTable WHERE user_id='$userID'")->fetch_object()->c;
        if ($isUser > 0) {
            // update
            $beforNumLogin = $db->query("SELECT SUM(num_login) as c FROM $userLoginBlockTable WHERE user_id='$userID'")->fetch_object()->c;
            if ($beforNumLogin < $apiLCAllowedNum) {
                $num = $beforNumLogin + 1;
                $db->query("UPDATE $userLoginBlockTable SET num_login='$num',date_time='$nowTime' WHERE user_id='$userID'");
            }
        } else {
            // insert
            $db->query("INSERT INTO $userLoginBlockTable (user_id,num_login) VALUES ('$userID','1')");
        }
    }
}

//**************login api blocking ****************//
function isNotBlockApi($getIp = false)
{
    global $db, $apiLoginBlockTable, $nowTime, $apiLAllowedNum, $apiLAllowedTime;
    $ip = $_SERVER['REMOTE_ADDR'];
    if ($getIp) {
        $ip = $getIp;
    }

    $isUser = $db->query("SELECT COUNT(id) as c FROM $apiLoginBlockTable WHERE ip='$ip'")->fetch_object()->c;
    if ($isUser > 0) { // second login
        $num = getField($apiLoginBlockTable, 'num_login', 'ip', $ip);
        if ($num >= $apiLAllowedNum) {
            $lastTimeLogin = getField($apiLoginBlockTable, 'date_time', 'ip', $ip);
            $getTime = strtotime($lastTimeLogin);
            $thisTime = time();
            $diff = $thisTime - $getTime;
            if ($diff <= $apiLAllowedTime) {
                return false;
            } else {
                $db->query("UPDATE $apiLoginBlockTable SET num_login='0',date_time='$nowTime' WHERE ip='$ip'");
                return true;
            }
        } else {
            return true;
        }
    } else { // first login
        return true;
    }
}

function setAndGetNumLoginApi($get = false)
{
    global $db, $apiLoginBlockTable, $apiLAllowedNum, $nowTime;
    $ip = $_SERVER['REMOTE_ADDR'];

    if ($get) {
        $num = $db->query("SELECT SUM(num_login) as c FROM $apiLoginBlockTable WHERE ip='$ip'")->fetch_object()->c;
        return $num;
    } else {
        $isUser = $db->query("SELECT COUNT(id) as c FROM $apiLoginBlockTable WHERE ip='$ip'")->fetch_object()->c;
        if ($isUser > 0) {
            // update
            $beforNumLogin = $db->query("SELECT SUM(num_login) as c FROM $apiLoginBlockTable WHERE ip='$ip'")->fetch_object()->c;
            if ($beforNumLogin < $apiLAllowedNum) {
                $num = $beforNumLogin + 1;
                $db->query("UPDATE $apiLoginBlockTable SET num_login='$num',date_time='$nowTime' WHERE ip='$ip'");
            }
        } else {
            // insert
            $db->query("INSERT INTO $apiLoginBlockTable (ip,num_login) VALUES ('$ip','1')");
        }
    }
}

function apiUnblokingDate($getIp = false, $showOther = false)
{
    global $apiLoginBlockTable, $apiLAllowedTime;
    $ip = $_SERVER['REMOTE_ADDR'];
    if ($getIp) {
        $ip = $getIp;
    }
    $isUser = getField($apiLoginBlockTable, 'date_time', 'ip', $ip);
    $blockTime = strtotime($isUser) + $apiLAllowedTime;
    if ($showOther) {
        return '[' . date('Y-m-d H:i:s', $blockTime) . ' | ' . jdate('Y/m/d H:i:s', $blockTime) . ']';
    } else {
        return jdate('Y/m/d H:i:s', $blockTime);
    }
}

//----------------- new ------------------//
function setTarakoneshAndDeleteBonkInfo($bankID, $customerID, $Amount, $description, $erjaNumber, $status)
{
    global $db, $tarakoneshTable, $bankTable;
    $db->query("INSERT INTO $tarakoneshTable (customer_id,amount,description,erja_number,status) VALUES ('$customerID','$Amount','$description',$erjaNumber,$status)");
    $db->query("DELETE FROM $bankTable WHERE id='$bankID'");
}

function changeAndGetFileName($baseName, $fileName)
{
    $fileFormat = pathinfo($fileName, PATHINFO_EXTENSION);
    return $baseName . '-' . time() . getCharRand() . '.' . $fileFormat;
}

function getNotifications($table, $notToday = false)
{
    global $db;
    $sql = "SELECT COUNT(*) as c FROM $table WHERE DATE(create_time) = CURDATE()";
    if ($notToday) {
        $sql = "SELECT COUNT(*) as c FROM $table";
    }
    $numRecords = $db->query($sql)->fetch_object()->c;
    return ($numRecords) ? $numRecords : 0;
}

function getNotifications2($table, $one = 1, $two = 1)
{
    global $db;
    $sql = "SELECT count(*) as c FROM $table WHERE $one='$two'";
    $numRecords = $db->query($sql)->fetch_object()->c;
    return $numRecords;
}

function getNotifications3($table, $conOne = '1', $conTwo = '2', $notToday = false)
{
    global $db;
    $sql = "SELECT count(*) as c FROM $table WHERE $conOne='$conTwo' AND DATE(create_time) = CURDATE()";
    if ($notToday) {
        $sql = "SELECT count(*) as c FROM $table WHERE $conOne='$conTwo'";
    }
    $numRecords = $db->query($sql)->fetch_object()->c;
    return $numRecords;
}

/************** create and get thumb image ************/
function createAndGetThumbURL($inputFilePath, $uploadDirThumb, $thumbName, $mime, $w = 150, $h = 150)
{
    list($width, $height) = getimagesize($inputFilePath);
    $thumb = imagecreatetruecolor($w, $h);
    if ($mime == 'image/png') {
        $source = imagecreatefrompng($inputFilePath);
    } else {
        $source = imagecreatefromjpeg($inputFilePath);
    }
//**************** set white background ****************//
    $whiteBackground = imagecolorallocate($thumb, 255, 255, 255);
    imagefill($thumb, 0, 0, $whiteBackground);
//**************** set white background ****************//
    imagecopyresized($thumb, $source, 0, 0, 0, 0, $w, $h, $width, $height);
    $newFilename = $uploadDirThumb . $thumbName;
    if ($mime == 'image/png') {
        imagepng($thumb, $newFilename);
    } else {
        imagejpeg($thumb, $newFilename);
    }
    imagedestroy($thumb);
    imagedestroy($source);
    return $thumbName;
}

function createAndGetThumbURL2($inputFilePath, $uploadDirImage, $thumbName, $mime)
{
    list($width, $height) = getimagesize($inputFilePath);

    $NewW = 800;
    $taghsim = $width / 800;
    $NewH = $height / $taghsim;

    $thumb = imagecreatetruecolor($NewW, $NewH);
    if ($mime == 'image/png') {
        $source = imagecreatefrompng($inputFilePath);
    } else {
        $source = imagecreatefromjpeg($inputFilePath);
    }

//**************** set white background ****************//
    $whiteBackground = imagecolorallocate($thumb, 255, 255, 255);
    imagefill($thumb, 0, 0, $whiteBackground);
//**************** set white background ****************//

    imagecopyresized($thumb, $source, 0, 0, 0, 0, $NewW, $NewH, $width, $height);
    $newFilename = $uploadDirImage . $thumbName;
    if ($mime == 'image/png') {
        imagepng($thumb, $newFilename);
    } else {
        imagejpeg($thumb, $newFilename);
    }
    imagedestroy($thumb);
    imagedestroy($source);
    return $thumbName;
}

function getNotificationsNumLogin($table)
{
    global $db, $apiLCAllowedNum;
    $sql = "SELECT count(*) as c FROM $table WHERE num_login >= '$apiLCAllowedNum' AND DATE(date_time) = CURDATE()";
    $numRecords = $db->query($sql)->fetch_object()->c;
    return $numRecords;
}

function getTimeLang($getTime, $lang = 'fa')
{
    $time = jdate('Y/m/d ساعت H:i:s', strtotime($getTime));
    if ($lang == 'en') {
        $time = date('Y-m-d H:i:s', strtotime($getTime));
    }
    return $time;
}

function printDetail($information, $titles)
{
    foreach ($titles as $key => $value) {

        $title = $key;
        $content = ($information[$value] != '') ? $information[$value] : '<i class="fa fa-times-circle fa-2x">';

        echo "<tr>
            <td>" . $title . "</td>
            <td>" . $content . "</td>
        </tr>";

    }
}

function getValGlobal($valName, $index = '', $select = null)
{
    $outPut = '';
    $valueGlobal = [
        'subjectContact' => [
            'پشتیبانی فنی',
            'روابط عمومی و تبلیغات',
            'مدیریت',
            'پیشنهاد و انتقاد',
            'سایر'
        ],
        'sellerType' => [
            'نمایشگاه',
            'لوازم یدکی',
            'تعمیرگاه',
            'واردات خودرو'
        ],
        'fuelType' => [
            'بنزین',
            'دوگانه سوز',
            'هیبرید',
            'دیزل'
        ],
        'workedType' => [
            'کارکرده',
            'صفر',
            'کارتکس',
            'حواله'
        ],
        'payType' => [
            'نقد',
            'اقساط'
        ],
        'gearboxType' => [
            'دنده ای',
            'اتوماتیک'
        ],
        'pelakType' => [
            'پلاک ملی',
            'گذر موقت',
            'منطقه آزاد'
        ],
        'classType' => [
            'سدان',
            'کوپه',
            'کروک',
            'شاسی',
            'وانت',
            'اسپرت',
            'هاچ بک',
            'هیبرید'
        ],
        'differentialType' => [
            'چهار چرخ محرک',
            'دو دیفرانسیل',
            'دیفرانسیل جلو',
            'دیفرانسیل عقب'
        ],
        'setupType' => [
            'عدم نمایش',
            'در حال نمایش',
            'منقضی شده'
        ]
    ];

    foreach ($valueGlobal as $key => $value) {
        if ($key == $valName) {
            if ($index != '') {

                if (key_exists($index, $value)) {
                    $outPut = $value[$index];
                } else {
                    $outPut = false;
                }

            } else {
                foreach ($value as $k => $v) {
                    $selected = ($select != null && $select == $k) ? 'selected' : '';
                    $outPut .= "<option value='{$k}' {$selected}>{$v}</option>";
                }
            }
        }
    }

    return $outPut;
}

function isValidAjaxRequest()
{
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        return true;
    }
    return false;
}

function getChangeField($id, $table, $field = 'price')
{
    global $db;
    $result = '';
    $info = $db->query("SELECT * FROM $table WHERE id='$id'")->fetch_all(1)[0];
    if ($field == 'price' && $info) {
        $payType = (isset($info['pay_type'])) ? $info['pay_type'] : false;
        $price = (isset($info['price'])) ? $info['price'] : '';
        $prePayment = (isset($info['pre_payment'])) ? $info['pre_payment'] : false;
        $priceInstallment = (isset($info['price_installment'])) ? $info['price_installment'] : false;
        if ($payType) {
            if ($prePayment) {
                $result = "پیش: " . number_format($prePayment) . ' تومان' . "<br>" . "ماهانه: " . number_format($priceInstallment) . ' تومان';
            } else {
                $result = 'تماس بگیرید';
            }
        } else {
            if ($price) {
                $result = number_format($price) . ' تومان';
            } else {
                $result = 'تماس بگیرید';
            }
        }
    }
    return $result;
}

function isExhibition($userID)
{
    global $db, $legalsTable;
    $is = $db->query("SELECT COUNT(*) as c FROM $legalsTable WHERE user_id='$userID' AND type='1'")->fetch_object()->c;

    if ($is) {
        return true;
    } else {
        return false;
    }
}

function getAndSetIdCode($id, $get = false)
{
    if ($get) {
        $outPut = str_replace(substr($id, 0, 5), '', $id);
        $outPut = str_replace(substr($outPut, -5, strlen($outPut)), '', $outPut);
    } else {
        $outPut = getCharRand(3) . rand(11, 99) . $id . rand(11, 99) . getCharRand(3);
    }
    return $outPut;
}

function setAlert($msg, $class, $redirect = false, $target = false, $timer = 1)
{
    $outPut = '<div class="text-center alert alert-' . $class . '">' . $msg . '</div>';
    if ($redirect) {
        $outPut = '<div class="text-center alert alert-' . $class . '">' . $msg . '<br>در حال انتقال...</div>';
        $outPut .= '<script>
        setTimeout(function() {
          window.location.href="' . $target . '";
        },' . $timer . ' * 1000);</script>';


    }
    echo $outPut;
}

function redirectJS($target, $second = 2)
{
    $second = ($second > 0) ? $second * 1000 : 50;
    echo "<script type='text/javascript'>setInterval(function() {window.location.href='" . $target . "';}," . $second . ")</script>";
}

/********************* start Authentication *********************/
function doLogIn($userId)
{
    $_SESSION['site-login'] = true;
    $_SESSION['site-userid'] = $userId;
    return true;
}

function isLogin()
{
    $isLogin = ((isset($_SESSION['site-login']) && $_SESSION['site-login'] === true) && (isset($_SESSION['site-userid']) && $_SESSION['site-userid'] != '')) ? true : false;
    return $isLogin;
}

function doLogOut()
{
    unset($_SESSION['site-login'], $_SESSION['site-userid']);
    echo '<script>window.location.href="index";</script>';
}

/********************* end Authentication *********************/
function isUser($username, $password, $code = false)
{
    global $db, $usersTable;
    $allUsers = $db->query("SELECT * FROM $usersTable")->fetch_all(1);
    if ($allUsers) {
        $idArr = [];
        $usernameArr = [];
        $passwordArr = [];
        $codeArr = [];
        foreach ($allUsers as $users => $user) {
            $idArr[] = $user['id'];
            $usernameArr[] = $user['mobile'];
            $passwordArr[] = $user['password'];
            $codeArr[] = $user['code'];
        }
        $selectArr = $passwordArr;

        if ($code) {
            $selectArr = $codeArr;
        }
        if (in_array($username, $usernameArr) && in_array(getHash($password), $selectArr)) {
            $userID = getField($usersTable, 'id', 'mobile', $username);
            return getAndSetIdCode($userID);
        }
    } else {
        return false;
    }
}

function isUser2($table, $field = 'mobile', $target, $hash = false)
{
    global $db;
    $allGets = $db->query("SELECT * FROM $table")->fetch_all(1);
    if ($allGets) {
        $data = [];
        foreach ($allGets as $gets => $get) {
            $data[] = $get[$field];
        }
        if ($hash) {
            if (in_array(getHash($target), $data)) {
                $thisID = getField($table, 'id', $field, getHash($target));
                return getAndSetIdCode($thisID);
            } else {
                return false;
            }
        } else {
            if (in_array($target, $data)) {
                $thisID = getField($table, 'id', $field, $target);
                return getAndSetIdCode($thisID);
            } else {
                return false;
            }
        }
    } else {
        return false;
    }
}


function getLegalsType($type)
{
    switch ($type) {
        case 0:
            $output = 'لوازم لوکس';
            break;
        case 1:
            $output = 'فروشگاه';
            break;
        case 2:
            $output = 'نمایشگاه';
            break;
        case 3:
            $output = 'تعمیرگاه';
            break;
        case 4:
            $output = 'واردات خودرو';
            break;
        default:
            $output = 'نامشخص';
            break;
    }
    return $output;
}

function getLegalsTypeMsg($type)
{
    switch ($type) {
        case 0:
            $output = 'از پرداخت هرگونه وجه، پیش از صحت و سلامت کالا خودداری فرمائید.';
            break;
        case 1:
            $output = 'از پرداخت هرگونه وجه، پیش از صحت و سلامت کالا خودداری فرمائید.';
            break;
        case 2:
            $output = 'از پرداخت هرگونه وجه، پیش از انجام معامله کتبی خودداری فرمائید.';
            break;
        case 3:
            $output = 'از پرداخت هرگونه وجه، پیش از صحت و سلامت کالا خودداری فرمائید.';
            break;
        case 4:
            $output = 'از پرداخت هرگونه وجه، پیش از انجام معامله کتبی خودداری فرمائید.';
            break;
        default:
            $output = 'از پرداخت هرگونه وجه، پیش از صحت و سلامت کالا خودداری فرمائید.';
            break;
    }
    return $output;
}

function getYear($year, $lan = 'fa')
{
    if ($lan == 'fa') {
        $output = gregorian_to_jalali($year, 0, 0)[0] + 1;
    } elseif ($lan == 'en') {
        $output = jalali_to_gregorian($year, 0, 0)[0];
    }

    return $output;
}

function getYearReng($lenYear = 5, $api = false)
{
    $yearArr = [];
    $beforYear = date('Y', time()) - $lenYear;
    $thisYear = date('Y', time());
    while ($beforYear <= $thisYear) {
        if ($api) {
            $yearArr[] = ['id' => $beforYear, 'title' => $beforYear . ' - ' . getYear($beforYear, 'fa')];
        } else {
            $yearArr[] = [$beforYear, $beforYear . ' - ' . getYear($beforYear, 'fa')];
        }
        $beforYear++;
    }
    return $yearArr;
}


/**************************** packages manager ******************************/
function checkPackegeItems($item, $userId)
{
    global $db, $packagesTable, $usersTable, $usePackageLogsTable;
    $packageId = getField($usersTable, 'package_id', 'id', $userId);
    $packageInfo = $db->query("SELECT * FROM $packagesTable WHERE id='$packageId'")->fetch_all(1);
    if ($packageInfo) {
        $packageInfo = $packageInfo[0];

        $allActiveItem = $packageInfo[$item];

        $buyPackageDate = getField($usersTable, 'buy_package_time', 'id', $userId);
        $buyPackageDate = strtotime($buyPackageDate);

        $allData = $db->query("SELECT * FROM $usePackageLogsTable WHERE user_id='$userId' AND use_field='$item'")->fetch_all(1);
        if ($allData) {
            $i = 0;
            foreach ($allData as $key => $value) {
                $listenDate = strtotime($value['create_time']);
                if ($listenDate >= $buyPackageDate) {
                    $i++;
                }
            }
            return $allActiveItem - $i;
        } else {
            return $allActiveItem;
        }

    } else {
        return 0;
    }

}

function checkTimePackage($userId)
{
    global $db, $usersTable, $packagesTable;
    $packageId = getField($usersTable, 'package_id', 'id', $userId);

    $userBuyPackageTime = getField($usersTable, 'buy_package_time', 'id', $userId);
    $userBuyPackageTime = getDiffTime($userBuyPackageTime); // get different

    $packageCreditTime = getField($packagesTable, 'num_credit_time', 'id', $packageId); // num credit time package

    if ($userBuyPackageTime <= (60 * 60 * 24 * $packageCreditTime)) {
        return true;
    } else {
        return false;
    }


}

function setUsePackageLog($userId, $fieldName)
{
    global $db, $usePackageLogsTable;
    $setToTable = $db->query("INSERT INTO $usePackageLogsTable (user_id,use_field) VALUES ('$userId','$fieldName')");
    if ($setToTable) {
        return true;
    } else {
        return false;
    }
}

function delUsePackageLog($userId)
{
    global $db, $usePackageLogsTable;
    $delLogs = $db->query("DELETE FROM $usePackageLogsTable WHERE user_id='$userId'");
    if ($delLogs) {
        return true;
    } else {
        return false;
    }
}

function getUserPackInfo($userId, $field = null)
{
    global $db, $usersTable, $packagesTable;

    $allPackagesId = $db->query("SELECT id FROM $packagesTable")->fetch_all(1);
    foreach ($allPackagesId as $packages => $package) {
        $allPackagesId[] = $package['id'];
    }

    $getUserPackageId = getField($usersTable, 'package_id', 'id', $userId);

    if ($getUserPackageId) {
        $packageInfo = $db->query("SELECT * FROM $packagesTable WHERE id='$getUserPackageId'")->fetch_all(1)[0];
        if (is_null($field)) {
            if (checkTimePackage($userId)) {
                return true;
            } else {
                return false;
            }
        } else {
            if ($packageInfo[$field] && checkTimePackage($userId)) {
                return true;
            } else {
                return false;
            }
        }


    } else {
        return false;
    }
}

/**************************** packages manager ******************************/


function alreadySetItem($userId, $type)
{
    global $db, $legalsTable;
    $isItem = $db->query("SELECT COUNT(*) as c FROM $legalsTable WHERE user_id='$userId' AND type='$type'")->fetch_object()->c;
    if ($isItem) {
        return true;
    } else {
        return false;
    }


}


function getTypeItem($type)
{
    $typeArr = [100, 0, 1, 2, 3, 4, 200];
    $output = '';
    switch ($type) {
        case 100:
            $output = 'خودرو';
            break;
        case 0:
            $output = 'لوازم لوکس';
            break;
        case 1:
            $output = 'فروشگاه';
            break;
        case 2:
            $output = 'نمایشگاه';
            break;
        case 3:
            $output = 'تعمیرگاه';
            break;
        case 4:
            $output = 'واردات خودو';
            break;
        case 200:
            $output = 'محصول';
            break;
    }
    return $output;
}


function checkEmptyVar($var)
{
    if (!is_null($var) && $var != '' && $var != ' ') {
        return $var;
    } else {
        return '-';
    }
}

function checkEmptyVarBool($var)
{
    if (!is_null($var) && $var != '' && $var != ' ') {
        return $var;
    } else {
        return false;
    }
}

function tomanFormat($amount)
{
    if (!is_null($amount) && $amount != '' && $amount != ' ' && $amount != 0) {
        return number_format($amount) . ' تومان';
    } else {
        return 0;
    }
}

function checkEmptyImage($imageName, $baseUrl, $defaultImage)
{
    if (!is_null($imageName) && $imageName != '' && $imageName != ' ') {
        return $baseUrl . $imageName;
    } else {
        return $defaultImage;
    }
}


function getAttrSelectOrCheck($type, $selectAndCheckTitleArr)
{
    global $db, $selectAttrTable, $checkAttrTable;
    $outPut = [];
    $outPutStr = '';
    if ($type == 'select' && $selectAndCheckTitleArr) {
        $table = $selectAttrTable;
        $selectAndCheckTitleStr = join(',', $selectAndCheckTitleArr);
        $allSelectTitle = $db->query("SELECT id,title,sub_cat FROM $table WHERE id IN($selectAndCheckTitleStr)")->fetch_all(1);
        if ($allSelectTitle) {
            $i = 0;
            foreach ($allSelectTitle as $selectTitle => $st) {
                $outPut[$i] = [
                    'title' => getField($table, 'title', 'id', $st['sub_cat']),
                    'content' => getField($table, 'title', 'id', $st['id'])
                ];


                $i++;
            }

            if ($outPut){
                foreach ($outPut as $key => $value){
                    $outPutStr .= ' [ '.$value['title'].' : '.$value['content'].' ] ';
                }
            }

        }
    }
    if ($type == 'check' && $selectAndCheckTitleArr) {
        $table = $checkAttrTable;
        $selectAndCheckTitleStr = join(',', $selectAndCheckTitleArr);
        $allCheckTitle = $db->query("SELECT id,title FROM $table WHERE id IN($selectAndCheckTitleStr)")->fetch_all(1);
        if ($allCheckTitle) {
            $i = 0;
            foreach ($allCheckTitle as $checkTitle => $ct) {
                $outPut[$i] = [
                    'title' => getField($table, 'title', 'id', $ct['id']),
                ];


                $i++;
            }

            if ($outPut){
                foreach ($outPut as $key => $value){
                    $outPutStr .= ' [ <i class="fa fa-check"></i> '.$value['title'].' ] ';
                }
            }

        }
    }


return $outPutStr;


}

?>