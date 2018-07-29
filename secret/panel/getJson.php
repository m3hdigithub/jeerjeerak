<?php
require_once '../config.php';
require_once '../functions.php';
$data = false;

if (isValidAjaxRequest()) {
    // requests
    $queryArr = ['model', 'model1', 'model2', 'city', 'city1', 'city2', 'city3', 'city4', 'city5', 'city6', 'city7', 'city8', 'city9', 'city10'];
    $getQuery = (isset($_REQUEST['getJ']) && in_array($_REQUEST['getJ'], $queryArr)) ? sanitize($_REQUEST['getJ']) : false;
    $getSurvey = (isset($_REQUEST['getSurvey']) && $_REQUEST['getSurvey'] !='') ? sanitize($_REQUEST['getSurvey']) : false;

    if ($getQuery && in_array($getQuery, ['model', 'model1', 'model2'])) {
        $allData = $db->query("SELECT * FROM $companyTable WHERE sub_cat != '0'")->fetch_all(1);
        if ($allData) {
            $i = 0;
            foreach ($allData as $models => $model) {
                $data[$i]['id'] = $model['id'];
                $data[$i]['sub_cat'] = $model['sub_cat'];
                $data[$i]['title'] = $model['title'];
                $i++;
            }
            $data = json_encode($data);
        } else {
            $data = false;
        }
    }

    if ($getQuery && in_array($getQuery, ['city', 'city1', 'city2', 'city3', 'city4', 'city5', 'city6', 'city7', 'city8', 'city9', 'city10'])) {
        $allData = $db->query("SELECT * FROM $cityTable WHERE sub_cat != '0'")->fetch_all(1);
        if ($allData) {
            $i = 0;
            foreach ($allData as $citys => $city) {
                $data[$i]['id'] = $city['id'];
                $data[$i]['sub_cat'] = $city['sub_cat'];
                $data[$i]['title'] = $city['title'];
                $i++;
            }
            $data = json_encode($data);
        } else {
            $data = false;
        }
    }


    if ($getSurvey) {
        $sql = "SELECT * FROM $checkCarsTable WHERE model_id='$getSurvey' AND status='1'";
        if (!checkUID($getSurvey)){
            $modelTitle = getField($companyTable,'id','title',$getSurvey);
            $sql = "SELECT * FROM $checkCarsTable WHERE model_id='$modelTitle' AND status='1'";
        }
        $allData = $db->query($sql)->fetch_all(1);
        if ($allData) {
            $i = 0;
            foreach ($allData as $key => $value) {
                $data[$i]['val1'] = $baseImageAddress.$value['image'];
                $data[$i]['val2'] = $value['video_link'];
                $data[$i]['val3'] = '<span class="pull-left">'.getField($companyTable,'title','id',$value['company_id']).'، '.getField($companyTable,'title','id',$value['model_id']).'</span><span class="pull-right">[ '.getYear($value['year'],'fa').' - '.$value['year'].' ]</span>';
                $data[$i]['val4'] = ($value['atributies'] !='')?$value['atributies']:'--';
                $data[$i]['val5'] = (getValGlobal('gearboxType',$value['gearbox']) !='')?getValGlobal('gearboxType',$value['gearbox']):'--';
                $data[$i]['val6'] = ($value['engine_volume'] !='')?$value['engine_volume']:'';
                $data[$i]['val7'] = (getValGlobal('differentialType',$value['differential']) !='')?getValGlobal('differentialType',$value['differential']):'--';
                $data[$i]['val8'] = ($value['cylinder'] !='')?$value['cylinder']:'--';
                $data[$i]['val9'] = ($value['num_sopup'] !='')?$value['num_sopup']:'--';
                $data[$i]['val10'] = ($value['horse_steam'] !='')?$value['horse_steam']:'--';
                $data[$i]['val11'] = ($value['torque'] !='')?$value['torque']:'--';
                $data[$i]['val12'] = ($value['length'] != '')?$value['length']:'--';
                $data[$i]['val13'] = ($value['width'] !='')?$value['width']:'--';
                $data[$i]['val14'] = ($value['height'] !='')?$value['height']:'--';
                $data[$i]['val15'] = ($value['weight'] != '')?$value['weight']:'--';
                $data[$i]['val16'] = ($value['tire_size'] !='')?$value['tire_size']:'--';
                $data[$i]['val17'] = ($value['maximum_speed'] !='')?$value['maximum_speed']:'--';
                $data[$i]['val18'] = ($value['acceleration'] !='')?$value['acceleration']:'--';
                $data[$i]['val19'] = ($value['use_fuel'] !='')?$value['use_fuel']:'--';
                $data[$i]['val20'] = ($value['fuel_tank'] !='')?$value['fuel_tank']:'--';
                $data[$i]['val21'] = ($value['environmental_standard'] !='')?$value['environmental_standard']:'--';
                $data[$i]['val22'] = ($value['air_bags'] !='')?$value['air_bags']:'--';
                $data[$i]['val23'] = ($value['breaks'] !='')?$value['breaks']:'--';
                $data[$i]['val24'] = ($value['chair'] !='')?$value['chair']:'--';
                $data[$i]['val25'] = ($value['air_conditioning'] !='')?$value['air_conditioning']:'--';
                $data[$i]['val26'] = ($value['window_lift'] !='')?$value['window_lift']:'--';
                $data[$i]['val27'] = ($value['mirror'] !='')?$value['mirror']:'--';
                $data[$i]['val28'] = ($value['lamp'] !='')?$value['lamp']:'--';
                $data[$i]['val29'] = ($value['other'] !='')?$value['other']:'--';
                $i++;
            }
            $data = json_encode($data);
        } else {
            $data = false;
        }
    }


    echo $data;
} else {
    setAlert('دسترسی غیر مجاز', 'danger', true, 'index');
}


?>