<?php require_once '../config.php';
$idpage = "checkCarsNew";
$thisTable = $checkCarsTable;
include("h.php");

if ($nametype != 1) {
    header("location:admin");
}

// get all company category
$allCompany = $db->query("select * from $companyTable WHERE sub_cat='0'");

$id = isset($_REQUEST['id']) && checkUID($_REQUEST['id']) ? $_REQUEST['id'] : false;
$information = false;
$getVideoLink = (isset($_POST['video_link'])) ? $_POST['video_link'] : '';
$getImage = (isset($_FILES['image'])) ? $_FILES['image'] : '';
$getCompanyID = (isset($_POST['companyID'])) ? $_POST['companyID'] : '';
$getModel = (isset($_POST['model'])) ? $_POST['model'] : '';
$getYear = (isset($_POST['year'])) ? $_POST['year'] : '';
$getAtributies = (isset($_POST['atributies'])) ? $_POST['atributies'] : '';
$getGearbox = (isset($_POST['gearbox'])) ? $_POST['gearbox'] : '';
$getEngineVolume = (isset($_POST['engine_volume'])) ? $_POST['engine_volume'] : '';
$getDifferential = (isset($_POST['differential'])) ? $_POST['differential'] : '';
$getCylinder = (isset($_POST['cylinder'])) ? $_POST['cylinder'] : '';
$getNumSopup = (isset($_POST['num_sopup'])) ? $_POST['num_sopup'] : '';
$getHorseSteam = (isset($_POST['horse_steam'])) ? $_POST['horse_steam'] : '';
$getTorque = (isset($_POST['torque'])) ? $_POST['torque'] : '';
$getLength = (isset($_POST['length'])) ? $_POST['length'] : '';
$getWidth = (isset($_POST['width'])) ? $_POST['width'] : '';
$getHeight = (isset($_POST['height'])) ? $_POST['height'] : '';
$getWeight = (isset($_POST['weight'])) ? $_POST['weight'] : '';
$getTireSize = (isset($_POST['tire_size'])) ? $_POST['tire_size'] : '';
$getMaximumSpeed = (isset($_POST['maximum_speed'])) ? $_POST['maximum_speed'] : '';
$getAcceleration = (isset($_POST['acceleration'])) ? $_POST['acceleration'] : '';
$getUseFuel = (isset($_POST['use_fuel'])) ? $_POST['use_fuel'] : '';
$getFuelTank = (isset($_POST['fuel_tank'])) ? $_POST['fuel_tank'] : '';
$getEnvironmentalStandard = (isset($_POST['environmental_standard'])) ? $_POST['environmental_standard'] : '';
$getAirBags = (isset($_POST['air_bags'])) ? $_POST['air_bags'] : '';
$getBreaks = (isset($_POST['breaks'])) ? $_POST['breaks'] : '';
$getChair = (isset($_POST['chair'])) ? $_POST['chair'] : '';
$getAirConditioning = (isset($_POST['air_conditioning'])) ? $_POST['air_conditioning'] : '';
$getWindowLift = (isset($_POST['window_lift'])) ? $_POST['window_lift'] : '';
$getMirror = (isset($_POST['mirror'])) ? $_POST['mirror'] : '';
$getLamp = (isset($_POST['lamp'])) ? $_POST['lamp'] : '';
$getOther = (isset($_POST['other'])) ? $_POST['other'] : '';


if ($id) {
    $information = $db->query("SELECT * FROM $thisTable WHERE id='$id'")->fetch_all(1);
    $information = ($information) ? $information[0] : false;

    $getVideoLink = ($information['video_link']) ? $information['video_link'] : '';
    $getImage = ($information['image']) ? $information['image'] : '';
    $getCompanyID = ($information['company_id']) ? $information['company_id'] : '';
    $getModel = ($information['model_id']) ? $information['model_id'] : '';
    $getYear = ($information['year']) ? $information['year'] : '';
    $getAtributies = (isset($information['atributies'])) ? $information['atributies'] : '';
    $getGearbox = (isset($information['gearbox'])) ? $information['gearbox'] : '';
    $getEngineVolume = (isset($information['engine_volume'])) ? $information['engine_volume'] : '';
    $getDifferential = (isset($information['differential'])) ? $information['differential'] : '';
    $getCylinder = (isset($information['cylinder'])) ? $information['cylinder'] : '';
    $getNumSopup = (isset($information['num_sopup'])) ? $information['num_sopup'] : '';
    $getHorseSteam = (isset($information['horse_steam'])) ? $information['horse_steam'] : '';
    $getTorque = (isset($information['torque'])) ? $information['torque'] : '';
    $getLength = (isset($information['length'])) ? $information['length'] : '';
    $getWidth = (isset($information['width'])) ? $information['width'] : '';
    $getHeight = (isset($information['height'])) ? $information['height'] : '';
    $getWeight = (isset($information['weight'])) ? $information['weight'] : '';
    $getTireSize = (isset($information['tire_size'])) ? $information['tire_size'] : '';
    $getMaximumSpeed = (isset($information['maximum_speed'])) ? $information['maximum_speed'] : '';
    $getAcceleration = (isset($information['acceleration'])) ? $information['acceleration'] : '';
    $getUseFuel = (isset($information['use_fuel'])) ? $information['use_fuel'] : '';
    $getFuelTank = (isset($information['fuel_tank'])) ? $information['fuel_tank'] : '';
    $getEnvironmentalStandard = (isset($information['environmental_standard'])) ? $information['environmental_standard'] : '';
    $getAirBags = (isset($information['air_bags'])) ? $information['air_bags'] : '';
    $getBreaks = (isset($information['breaks'])) ? $information['breaks'] : '';
    $getChair = (isset($information['chair'])) ? $information['chair'] : '';
    $getAirConditioning = (isset($information['air_conditioning'])) ? $information['air_conditioning'] : '';
    $getWindowLift = (isset($information['window_lift'])) ? $information['window_lift'] : '';
    $getMirror = (isset($information['mirror'])) ? $information['mirror'] : '';
    $getLamp = (isset($information['lamp'])) ? $information['lamp'] : '';
    $getOther = (isset($information['other'])) ? $information['other'] : '';
}

// register
if (isset($_POST['registerForm'])) {
    $videoLink = (isset($_POST['video_link']) && $_POST['video_link'] != '') ? $_POST['video_link'] : false;
    $image = (isset($_FILES['image']) && $_FILES['image']['name'] != '') ? $_FILES['image'] : false;
    $companyID = (isset($_POST['company_id']) && $_POST['company_id'] != '') ? $_POST['company_id'] : false;
    $modelID = (isset($_POST['model_id']) && $_POST['model_id'] != '') ? $_POST['model_id'] : false;
    $year = (isset($_POST['year']) && $_POST['year'] != '') ? sanitize($_POST['year']) : false;
    $atributies = (isset($_POST['atributies']) && $_POST['atributies'] != '') ? sanitize($_POST['atributies']) : false;
    $gearbox = (isset($_POST['gearbox']) && $_POST['gearbox'] != '') ? sanitize($_POST['gearbox']) : false;
    $engineVolume = (isset($_POST['engine_volume']) && $_POST['engine_volume'] != '') ? sanitize($_POST['engine_volume']) : false;
    $differential = (isset($_POST['differential']) && $_POST['differential'] != '') ? sanitize($_POST['differential']) : false;
    $cylinder = (isset($_POST['cylinder']) && $_POST['cylinder'] != '') ? sanitize($_POST['cylinder']) : false;
    $numSopup = (isset($_POST['num_sopup']) && $_POST['num_sopup'] != '') ? sanitize($_POST['num_sopup']) : false;
    $horseSteam = (isset($_POST['horse_steam']) && $_POST['horse_steam'] != '') ? sanitize($_POST['horse_steam']) : false;
    $torque = (isset($_POST['torque']) && $_POST['torque'] != '') ? sanitize($_POST['torque']) : false;
    $length = (isset($_POST['length']) && $_POST['length'] != '') ? sanitize($_POST['length']) : false;
    $width = (isset($_POST['width']) && $_POST['width'] != '') ? sanitize($_POST['width']) : false;
    $height = (isset($_POST['height']) && $_POST['height'] != '') ? sanitize($_POST['height']) : false;
    $weight = (isset($_POST['weight']) && $_POST['weight'] != '') ? sanitize($_POST['weight']) : false;
    $tireSize = (isset($_POST['tire_size']) && $_POST['tire_size'] != '') ? sanitize($_POST['tire_size']) : false;
    $maximumSpeed = (isset($_POST['maximum_speed']) && $_POST['maximum_speed'] != '') ? sanitize($_POST['maximum_speed']) : false;
    $acceleration = (isset($_POST['acceleration']) && $_POST['acceleration'] != '') ? sanitize($_POST['acceleration']) : false;
    $useFuel = (isset($_POST['use_fuel']) && $_POST['use_fuel'] != '') ? sanitize($_POST['use_fuel']) : false;
    $fuelTank = (isset($_POST['fuel_tank']) && $_POST['fuel_tank'] != '') ? sanitize($_POST['fuel_tank']) : false;
    $environmentalStandard = (isset($_POST['environmental_standard']) && $_POST['environmental_standard'] != '') ? sanitize($_POST['environmental_standard']) : false;
    $airBags = (isset($_POST['air_bags']) && $_POST['air_bags'] != '') ? sanitize($_POST['air_bags']) : false;
    $breaks = (isset($_POST['breaks']) && $_POST['breaks'] != '') ? sanitize($_POST['breaks']) : false;
    $chair = (isset($_POST['chair']) && $_POST['chair'] != '') ? sanitize($_POST['chair']) : false;
    $airConditioning = (isset($_POST['air_conditioning']) && $_POST['air_conditioning'] != '') ? sanitize($_POST['air_conditioning']) : false;
    $windowLift = (isset($_POST['window_lift']) && $_POST['window_lift'] != '') ? sanitize($_POST['window_lift']) : false;
    $mirror = (isset($_POST['mirror']) && $_POST['mirror'] != '') ? sanitize($_POST['mirror']) : false;
    $lamp = (isset($_POST['lamp']) && $_POST['lamp'] != '') ? sanitize($_POST['lamp']) : false;
    $other = (isset($_POST['other']) && $_POST['other'] != '') ? sanitize($_POST['other']) : false;


    if ($videoLink && $image && $companyID && $modelID && $year && $gearbox && $engineVolume && $differential && $cylinder && $numSopup && $horseSteam && $torque && $length && $width && $height && $weight && $tireSize && $maximumSpeed && $acceleration && $useFuel && $fuelTank && $environmentalStandard && $airBags && $breaks && $chair && $airConditioning && $windowLift && $mirror && $lamp) {

        $imgName = changeAndGetFileName('CheckCar', $image['name']);
        $uploadFilePath = $uploadDirOriginal . $imgName;
        if (move_uploaded_file($image['tmp_name'], $uploadFilePath)) {
            createAndGetThumbURL2($uploadFilePath, $uploadDirImage, $imgName, $image['type']);
            @unlink($uploadFilePath); // delete original
        } else {
            $imgName = '';
        }


        $modelTitle = getField($companyTable,'title','id',$modelID);

        $result = $db->query("INSERT INTO $thisTable (video_link,image,company_id,model_id,model_title,year,atributies,gearbox,engine_volume,differential,cylinder,num_sopup,horse_steam,torque,length,width,height,weight,tire_size,maximum_speed,acceleration,use_fuel,fuel_tank,environmental_standard,air_bags,breaks,chair,air_conditioning,window_lift,mirror,lamp,other,update_time) VALUES('$videoLink','$imgName','$companyID','$modelID','$modelTitle','$year','$atributies','$gearbox','$engineVolume','$differential','$cylinder','$numSopup','$horseSteam','$torque','$length','$width','$height','$weight','$tireSize','$maximumSpeed','$acceleration','$useFuel','$fuelTank','$environmentalStandard','$airBags','$breaks','$chair','$airConditioning','$windowLift','$mirror','$lamp','$other','$nowTime')");

        if ($result) {
            $class = 'success';
            $content = 'عملیات ثبت با موفقیت انجام شد';
        } else {
            $class = 'danger';
            $content = 'عملیات ثبت با خطا مواجه شد';
        }
    } else {

        $class = 'danger';
        $content = 'اطلاعات الزامی حتما باید به صورت صحیح تکمیل شوند';
    }


    echo '<div class="col-lg-12">
               				<div class="alert alert-dismissable alert-' . $class . '">
               				  <button type="button" class="close" data-dismiss="alert">&times;</button>' . $content . '</div>
               			  </div>';

    if ($class == 'success') {
        echo '<script>window.setTimeout(function(){window.location.href = "' . $idpage . '";}, 2000);</script>';
    }
}


// edit
if (isset($_POST['editForm'])) {
    $id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : false;
    $videoLink = (isset($_POST['video_link']) && $_POST['video_link'] != '') ? $_POST['video_link'] : false;
    $image = (isset($_FILES['image']) && $_FILES['image']['name'] != '') ? $_FILES['image'] : false;
    $companyID = (isset($_POST['company_id']) && $_POST['company_id'] != '') ? sanitize($_POST['company_id']) : false;
    $modelID = (isset($_POST['model_id']) && $_POST['model_id'] != '') ? sanitize($_POST['model_id']) : false;
    $year = (isset($_POST['year']) && $_POST['year'] != '') ? sanitize($_POST['year']) : false;
    $atributies = (isset($_POST['atributies']) && $_POST['atributies'] != '') ? sanitize($_POST['atributies']) : false;
    $gearbox = (isset($_POST['gearbox']) && $_POST['gearbox'] != '') ? sanitize($_POST['gearbox']) : false;
    $engineVolume = (isset($_POST['engine_volume']) && $_POST['engine_volume'] != '') ? sanitize($_POST['engine_volume']) : false;
    $differential = (isset($_POST['differential']) && $_POST['differential'] != '') ? sanitize($_POST['differential']) : false;
    $cylinder = (isset($_POST['cylinder']) && $_POST['cylinder'] != '') ? sanitize($_POST['cylinder']) : false;
    $numSopup = (isset($_POST['num_sopup']) && $_POST['num_sopup'] != '') ? sanitize($_POST['num_sopup']) : false;
    $horseSteam = (isset($_POST['horse_steam']) && $_POST['horse_steam'] != '') ? sanitize($_POST['horse_steam']) : false;
    $torque = (isset($_POST['torque']) && $_POST['torque'] != '') ? sanitize($_POST['torque']) : false;
    $length = (isset($_POST['length']) && $_POST['length'] != '') ? sanitize($_POST['length']) : false;
    $width = (isset($_POST['width']) && $_POST['width'] != '') ? sanitize($_POST['width']) : false;
    $height = (isset($_POST['height']) && $_POST['height'] != '') ? sanitize($_POST['height']) : false;
    $weight = (isset($_POST['weight']) && $_POST['weight'] != '') ? sanitize($_POST['weight']) : false;
    $tireSize = (isset($_POST['tire_size']) && $_POST['tire_size'] != '') ? sanitize($_POST['tire_size']) : false;
    $maximumSpeed = (isset($_POST['maximum_speed']) && $_POST['maximum_speed'] != '') ? sanitize($_POST['maximum_speed']) : false;
    $acceleration = (isset($_POST['acceleration']) && $_POST['acceleration'] != '') ? sanitize($_POST['acceleration']) : false;
    $useFuel = (isset($_POST['use_fuel']) && $_POST['use_fuel'] != '') ? sanitize($_POST['use_fuel']) : false;
    $fuelTank = (isset($_POST['fuel_tank']) && $_POST['fuel_tank'] != '') ? sanitize($_POST['fuel_tank']) : false;
    $environmentalStandard = (isset($_POST['environmental_standard']) && $_POST['environmental_standard'] != '') ? sanitize($_POST['environmental_standard']) : false;
    $airBags = (isset($_POST['air_bags']) && $_POST['air_bags'] != '') ? sanitize($_POST['air_bags']) : false;
    $breaks = (isset($_POST['breaks']) && $_POST['breaks'] != '') ? sanitize($_POST['breaks']) : false;
    $chair = (isset($_POST['chair']) && $_POST['chair'] != '') ? sanitize($_POST['chair']) : false;
    $airConditioning = (isset($_POST['air_conditioning']) && $_POST['air_conditioning'] != '') ? sanitize($_POST['air_conditioning']) : false;
    $windowLift = (isset($_POST['window_lift']) && $_POST['window_lift'] != '') ? sanitize($_POST['window_lift']) : false;
    $mirror = (isset($_POST['mirror']) && $_POST['mirror'] != '') ? sanitize($_POST['mirror']) : false;
    $lamp = (isset($_POST['lamp']) && $_POST['lamp'] != '') ? sanitize($_POST['lamp']) : false;
    $other = (isset($_POST['other']) && $_POST['other'] != '') ? sanitize($_POST['other']) : false;

    if ($id && $companyID && $modelID && $videoLink && $year && $gearbox && $engineVolume && $differential && $cylinder && $numSopup && $horseSteam && $torque && $length && $width && $height && $weight && $tireSize && $maximumSpeed && $acceleration && $useFuel && $fuelTank && $environmentalStandard && $airBags && $breaks && $chair && $airConditioning && $windowLift && $mirror && $lamp) {


        $imgName = $getImage;
        if ($image) {
            $imgName = changeAndGetFileName('CheckCar', $image['name']);
            $uploadFilePath = $uploadDirOriginal . $imgName;
            if (move_uploaded_file($image['tmp_name'], $uploadFilePath)) {
                createAndGetThumbURL2($uploadFilePath, $uploadDirImage, $imgName, $image['type']);
                @unlink($uploadDirImage . $getImage); // delete before image
                @unlink($uploadFilePath); // delete original
            } else {
                $imgName = $getImage;
            }
        }

        $modelTitle = getField($companyTable,'title','id',$modelID);

        $result = $db->query("UPDATE $thisTable SET video_link='$videoLink',image='$imgName',company_id='$companyID',model_id='$modelID',model_title='$modelTitle',year='$year',atributies='$atributies',gearbox='$gearbox',engine_volume='$engineVolume',differential='$differential',cylinder='$cylinder',num_sopup='$numSopup',horse_steam='$horseSteam',torque='$torque',length='$length',width='$width',height='$height',weight='$weight',tire_size='$tireSize',maximum_speed='$maximumSpeed',acceleration='$acceleration',use_fuel='$useFuel',fuel_tank='$fuelTank',environmental_standard='$environmentalStandard',air_bags='$airBags',breaks='$breaks',chair='$chair',air_conditioning='$airConditioning',window_lift='$windowLift',mirror='$mirror',lamp='$lamp',other='$other',update_time='$nowTime' WHERE id='$id'");
        if ($result) {
            $class = 'success';
            $content = 'عملیات ثبت با موفقیت انجام شد';
        } else {
            $class = 'success';
            $content = 'عملیات ثبت با خطا مواجه شد';
        }
    } else {
        $class = 'danger';
        $content = 'اطلاعات الزامی حتما باید به صورت صحیح تکمیل شوند';
    }

    echo '<div class="col-lg-12">
                           				<div class="alert alert-dismissable alert-' . $class . '">
                           				  <button type="button" class="close" data-dismiss="alert">&times;</button>' . $content . '</div>
                           			  </div>';

    if ($class == 'success') {
        echo '<script>window.setTimeout(function(){window.location.href = "' . str_replace('New', '', $idpage) . '";}, 2000);</script>';
    }

}

?>

<div class="row">
    <div class="col-lg-12">
        <form action="" method="post" role="form" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> کمپانی</label>
                    <select name="company_id" class="form-control" onchange="getMyJson(this,'model')">
                        <option value="0" style="color: red;">کمپانی را انتخاب کنید</option>
                        <?php
                        foreach ($allCompany as $category => $co):
                            $selected = ($getCompanyID == $co['id']) ? 'selected' : '';
                            ?>
                            <option style="color: #000000; font-weight: bold;"
                                    value="<?php echo $co['id']; ?>" <?php echo $selected; ?>>+
                                <?php echo $co['title']; ?></option>
                            <?php
                            //$tID = $cat['id'];
                            //getSubCat($thisTable, $id, $tID);
                        endforeach; ?>
                    </select>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> مدل</label>
                    <select name="model_id" class="form-control" id="model">
                        <option value="0" style="color: red;">مدل را انتخاب کنید</option>

                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> سال ساخت</label>
                    <select class="form-control edit-input" name="year">
                        <option value="">سال ساخت</option>
                        <?php $beforYear = date('Y', time()) - 5;
                        $thisYear = date('Y', time());
                        while ($beforYear <= $thisYear) {
                            $selected = ($getYear == $beforYear) ? ' selected' : '';
                            echo "<option value='" . $beforYear . "'" . $selected . ">{$beforYear} - " . (getYear($beforYear, 'fa')) . "</option>";
                            $beforYear++;
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-left">
                    <label><span class="requireStar"></span> ویژگی ها</label>
                    <textarea name="atributies" class="form-control" cols="30" rows="1"
                              placeholder="مثلا : موتور 3 سیلندر - دیفرانسیل جلو - ترمز ABS"><?php echo $getAtributies; ?></textarea>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> گیربکس</label>
                    <select class="form-control edit-input" name="gearbox">
                        <option value="">گیربکس</option>
                        <?php echo getValGlobal('gearboxType', '', $getGearbox); ?>
                    </select>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-left">
                    <label><span class="requireStar">*</span> حجم موتور</label>
                    <input type="text" name="engine_volume" class="form-control" placeholder="مثلا : 812 cc"
                           value="<?php echo $getEngineVolume; ?>">
                </div>

            </div>
            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> دیفرانسیل</label>
                    <select class="form-control" name="differential">
                        <option value="">دیفرانسیل</option>
                        <?php echo getValGlobal('differentialType', '', $getDifferential); ?>
                    </select>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> سیلندر</label>
                    <input type="text" name="cylinder" class="form-control" placeholder="مثلا : 4"
                           value="<?php echo $getCylinder; ?>">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> تعداد سوپاپ</label>
                    <input type="text" name="num_sopup" class="form-control" placeholder="مثلا : 6"
                           value="<?php echo $getNumSopup; ?>">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> اسب بخار</label>
                    <input type="text" name="horse_steam" class="form-control" placeholder="مثلا : 6000/51"
                           value="<?php echo $getHorseSteam; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> گشتاور</label>
                    <input type="text" name="torque" class="form-control" placeholder="مثلا : 4000/70"
                           value="<?php echo $getTorque; ?>">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> طول</label>
                    <input type="text" name="length" class="form-control" placeholder="مثلا : 3550 (بر حسب میلی متر)"
                           value="<?php echo $getLength; ?>">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> عرض</label>
                    <input type="text" name="width" class="form-control" placeholder="مثلا : 1495 (بر حسب میلی متر)"
                           value="<?php echo $getWidth; ?>">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> ارتفاع</label>
                    <input type="text" name="height" class="form-control" placeholder="مثلا : 1485 (بر حسب میلی متر)"
                           value="<?php echo $getHeight; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> وزن</label>
                    <input type="text" name="weight" class="form-control" placeholder="مثلا : 880 (بر حسب کیلوگرم)"
                           value="<?php echo $getWeight; ?>">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> سایز تایر</label>
                    <input type="text" name="tire_size" class="form-control" placeholder="مثلا : 155/65R13"
                           value="<?php echo $getTireSize; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> حداکثر سرعت</label>
                    <input type="text" name="maximum_speed" class="form-control"
                           placeholder="مثلا : 130 (بر حسب کیلومتر بر ساعت)" value="<?php echo $getMaximumSpeed; ?>">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> شتاب</label>
                    <input type="text" name="acceleration" class="form-control"
                           placeholder="مثلا : 17.1 (بر حسب ثانیه)" value="<?php echo $getAcceleration; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> سوخت</label>
                    <input type="text" name="use_fuel" class="form-control"
                           placeholder="مثلا : 5.5 (بر حسب لیتر)" value="<?php echo $getUseFuel; ?>">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> ظرفیت مخزن</label>
                    <input type="text" name="fuel_tank" class="form-control" placeholder="مثلا : 35 (بر حسب ثانیه)"
                           value="<?php echo $getFuelTank; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> استاندارد محیط زیست</label>
                    <input type="text" name="environmental_standard" class="form-control"
                           placeholder="مثلا : یورو 3" value="<?php echo $getEnvironmentalStandard; ?>">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> کیسه های هوا</label>
                    <input type="text" name="air_bags" class="form-control" placeholder="مثلا : راننده - سرنشین"
                           value="<?php echo $getAirBags; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> ترمز</label>
                    <input type="text" name="breaks" class="form-control"
                           placeholder="مثلا : جلو دیسکی - عقب کاسه ای - ABS" value="<?php echo $getBreaks; ?>">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> صندلی</label>
                    <input type="text" name="chair" class="form-control" placeholder="مثلا : دستی"
                           value="<?php echo $getChair; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> تهویه مطبوع</label>
                    <input type="text" name="air_conditioning" class="form-control"
                           placeholder="مثلا : دستی" value="<?php echo $getAirConditioning; ?>">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> پنجره</label>
                    <input type="text" name="window_lift" class="form-control" placeholder="مثلا : برقی"
                           value="<?php echo $getWindowLift; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> آینه</label>
                    <input type="text" name="mirror" class="form-control"
                           placeholder="مثلا : برقی" value="<?php echo $getMirror; ?>">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> چراغ</label>
                    <input type="text" name="lamp" class="form-control" placeholder="مثلا : مه شکن جلو وعقب"
                           value="<?php echo $getLamp; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label><span class="requireStar"></span> متفرقه</label>
                    <textarea name="other" class="form-control" cols="30" rows="1"
                              placeholder="مثلا : کروز کنترل - سانروف - سنسور باران - سنسور پارک"><?php echo $getOther; ?></textarea>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-left">
                    <label><span class="requireStar">*</span> لینک ویدئو</label>
                    <textarea name="video_link" class="form-control" cols="30" rows="1"
                              placeholder="مثلا : https://www.google.com"><?php echo $getVideoLink; ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-right">
                    <label><span class="requireStar">*</span> تصویر خودرو</label>
                    <input name="image" type="file" class="form-control">
                </div>
            </div>


            <div class="row text-center">
                <?php
                if ($id != '') {
                    echo '<input type="hidden" name="id" value="' . $id . '">';
                }
                ?>
                <br><br>
                <?php if ($id != '') {
                    echo '<button name="editForm" type="submit" class="btn btn-success">ویرایش</button>';
                } else {
                    echo '<button name="registerForm" type="submit" class="btn btn-success">ذخیره</button>';
                } ?>
                <button type="reset" class="btn btn-default">بازنشانی فرم</button>
            </div>

        </form>
    </div>

</div><!-- /.row -->

</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->

<!-- JavaScript -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/index.js"></script>
<script>
    function getMyJson(thisElement, targetId) {
        $("#" + targetId).html('<option value="">در حال دریافت اطلاعات...</option>');
        var modelArr = ['model', 'model1', 'model2'];
        var cityArr = ['city', 'city1', 'city2', 'city3', 'city4', 'city5', 'city6', 'city7', 'city8', 'city9', 'city10'];
        var allowedModelIndex = modelArr.indexOf(targetId);
        var allowedCityIndex = cityArr.indexOf(targetId);

        var optionTitle;
        if (allowedModelIndex >= 0) {
            optionTitle = 'مدل را انتخاب کنید';
        } else if (allowedCityIndex >= 0) {
            optionTitle = 'شهر یا محله را انتخاب کنید';
        }

        var companyId = $(thisElement).val();
        $.getJSON("getJson.php?getJ=" + targetId, function (result) {
            $("#" + targetId).html('<option value="0" style="color: red;">' + optionTitle + '</option>');
            var arrLength = result.length;
            for (var i = 0; i < arrLength; i++) {
                if (result[i]['sub_cat'] == companyId) {
                    document.getElementById(targetId).innerHTML += '<option value="' + result[i]['id'] + '">' + result[i]['title'] + '</option>';
                }
            }
        });
    }
</script>
</body>
</html>