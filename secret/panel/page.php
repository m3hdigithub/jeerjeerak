<?php require_once '../config.php';
$idpage = "page";
$thisTable = $pageTable;
include("h.php");

if ($nametype != 1) {
    header("location:admin");
}
$edirectJS = "<script type='text/javascript'>setTimeout(function () {window.location = '" . $idpage . "';}, 2000);</script>";

$information = $db->query("SELECT * FROM $thisTable")->fetch_all(1);

$information = ($information) ? $information[0] : false;
$getSiteTitle = ($information != false && $information['site_title'] != '') ? $information['site_title'] : '';
$getSiteDesc = ($information != false && $information['site_desc'] != '') ? $information['site_desc'] : '';
$getPhone1 = ($information != false && $information['phone1'] != '') ? $information['phone1'] : '';
//$getPhone2 = ($information != false && $information['phone2'] != '') ? $information['phone2'] : '';
//$getFax = ($information != false && $information['fax'] != '') ? $information['fax'] : '';
$getEmail = ($information != false && $information['email'] != '') ? $information['email'] : '';
$getAddress = ($information != false && $information['address'] != '') ? $information['address'] : '';

$getLogo = ($information != false && $information['logo'] != '') ? $information['logo'] : '';

$getBanner = ($information != false && $information['banner'] != '') ? $information['banner'] : '';
$getBannerLink = ($information != false && $information['banner_link'] != '') ? $information['banner_link'] : '';

$getBanner1 = ($information != false && $information['banner1'] != '') ? $information['banner1'] : '';
$getBannerLink1 = ($information != false && $information['banner_link1'] != '') ? $information['banner_link1'] : '';

$getBanner2 = ($information != false && $information['banner2'] != '') ? $information['banner2'] : '';
$getBannerLink2 = ($information != false && $information['banner_link2'] != '') ? $information['banner_link2'] : '';


$getGuide = ($information != false && $information['guide_text'] != '') ? $information['guide_text'] : '';
$getAbout = ($information != false && $information['about_text'] != '') ? $information['about_text'] : '';
$getRules = ($information != false && $information['rules_text'] != '') ? $information['rules_text'] : '';
$getAdvertising = ($information != false && $information['advertising_text'] != '') ? $information['advertising_text'] : '';

if (isset($_POST['regUsers'])) {
    $siteTitle = (isset($_POST['siteTitle']) && $_POST['siteTitle'] != '') ? $_POST['siteTitle'] : '';
    $siteDesc = (isset($_POST['siteDesc']) && $_POST['siteDesc'] != '') ? $_POST['siteDesc'] : '';
    $phone1 = (isset($_POST['phone1']) && $_POST['phone1'] != '') ? $_POST['phone1'] : '';
    //$phone2 = (isset($_POST['phone2']) && $_POST['phone2'] != '') ? $_POST['phone2'] : '';
    //$fax = (isset($_POST['fax']) && $_POST['fax'] != '') ? $_POST['fax'] : '';
    $email = (isset($_POST['email']) && $_POST['email'] != '') ? $_POST['email'] : '';
    $address = (isset($_POST['address']) && $_POST['address'] != '') ? $_POST['address'] : '';
    $logo = (isset($_FILES['logo']) && $_FILES['logo']['name'] != '') ? $_FILES['logo'] : false;
    $banner = (isset($_FILES['banner']) && $_FILES['banner']['name'] != '') ? $_FILES['banner'] : false;
    $bannerLink = (isset($_POST['bannerLink']) && $_POST['bannerLink'] != '') ? $_POST['bannerLink'] : '';
    $banner1 = (isset($_FILES['banner1']) && $_FILES['banner1']['name'] != '') ? $_FILES['banner1'] : false;
    $bannerLink1 = (isset($_POST['bannerLink1']) && $_POST['bannerLink1'] != '') ? $_POST['bannerLink1'] : '';
    $banner2 = (isset($_FILES['banner2']) && $_FILES['banner2']['name'] != '') ? $_FILES['banner2'] : false;
    $bannerLink2 = (isset($_POST['bannerLink2']) && $_POST['bannerLink2'] != '') ? $_POST['bannerLink2'] : '';

    $rules = (isset($_POST['rules']) && $_POST['rules'] != '') ? $_POST['rules'] : '';
    $about = (isset($_POST['about']) && $_POST['about'] != '') ? $_POST['about'] : '';
    $guide = (isset($_POST['guide']) && $_POST['guide'] != '') ? $_POST['guide'] : '';
    //$advertising = (isset($_POST['advertising']) && $_POST['advertising'] != '') ? $_POST['advertising'] : '';

    $logoName = $getLogo;
    if ($logo) {
        $logoName = changeAndGetFileName('Logo', $logo['name']);
        $uploadFilePath = $uploadDirImage . $logoName;
        if (move_uploaded_file($logo['tmp_name'], $uploadFilePath)) {
            @unlink($uploadDirImage . $getLogo); // delete before image
        } else {
            $logoName = $getLogo;
        }
    }

    $bannerName = $getBanner;
    if ($banner) {
        $bannerName = changeAndGetFileName('Banner', $banner['name']);
        $uploadFilePath = $uploadDirImage . $bannerName;
        if (move_uploaded_file($banner['tmp_name'], $uploadFilePath)) {
            @unlink($uploadDirImage . $getBanner); // delete before image
        } else {
            $bannerName = $getBanner;
        }
    }
    $bannerName1 = $getBanner1;
    if ($banner1) {
        $bannerName1 = changeAndGetFileName('Banner', $banner1['name']);
        $uploadFilePath = $uploadDirImage . $bannerName1;
        if (move_uploaded_file($banner1['tmp_name'], $uploadFilePath)) {
            @unlink($uploadDirImage . $getBanner1); // delete before image
        } else {
            $bannerName1 = $getBanner1;
        }
    }

    $bannerName2 = $getBanner2;
    if ($banner2) {
        $bannerName2 = changeAndGetFileName('Banner', $banner2['name']);
        $uploadFilePath = $uploadDirImage . $bannerName2;
        if (move_uploaded_file($banner2['tmp_name'], $uploadFilePath)) {
            @unlink($uploadDirImage . $getBanner2); // delete before image
        } else {
            $bannerName2 = $getBanner2;
        }
    }

    if ($information != false) {
        $sql = "UPDATE $thisTable SET site_title='$siteTitle',site_desc='$siteDesc', phone1='$phone1',email='$email',address='$address',logo='$logoName',banner='$bannerName',banner_link='$bannerLink',banner1='$bannerName1',banner_link1='$bannerLink1',banner2='$bannerName2',banner_link2='$bannerLink2',rules_text='$rules',about_text='$about',guide_text='$guide'";
    } else {
        $sql = "INSERT INTO $thisTable (site_title,site_desc,phone1,phone2,fax,email,address,logo,banner,banner_link,rules_text,about_text,guide_text,advertising_text) VALUES('$siteTitle','$siteDesc','$phone1','$email','$address','$logoName','$bannerName','$bannerLink','$bannerName1','$bannerLink1','$bannerName2','$bannerLink2','$rules','$about','$guide')";
    }
    $result = $db->query($sql);
    if ($result) {
        echo '          <div class="col-lg-12">
                               <div class="alert alert-dismissable alert-success">
                            
                                 <button type="button" class="close" data-dismiss="alert">&times;</button>
اطلاعات با موفقیت به روز رسانی شد
                               </div>
                             </div>';
        echo $edirectJS;
    } else {
        echo '          <div class="col-lg-12">
                               <div class="alert alert-dismissable alert-danger">
                                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                                عملیات به روز رسانی اطلاعات با خطا مواجه شد!
                               </div>
                             </div>';
    }
} ?>

<div class="row">
    <div class="col-lg-12">
        <form action="" method="post" role="form" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12 pull-right">
                    <label>عنوان وبسایت</label>
                    <input value="<?php echo $getSiteTitle; ?>" name="siteTitle" type="text" class="form-control"
                                           placeholder="عنوان وبسایت را وارد کنید">                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label>توضیحات کوتاه وبسایت</label>
                    <input value="<?php echo $getSiteDesc; ?>" name="siteDesc" type="text" class="form-control" placeholder="توضیحات کوتاه وبسایت را وارد کنید">
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
                    <label>انتخاب لوگو</label>
                    <input name="logo" type="file" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label>عکس تبلیغاتی پروفایل کاربری</label>
                    <input name="banner" type="file" class="form-control">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label>لینک عکس تبلیغاتی پروفایل کاربری</label>
                    <input value="<?php echo $getBannerLink; ?>" name="bannerLink" type="text" class="form-control" placeholder="لینک بنر تبلیغاتی را وارد کنید">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label>عکس بالایی تبلیغاتی پروفایل قرعه کشی</label>
                    <input name="banner" type="file" class="form-control">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label>لینک بالایی تبلیغاتی پروفایل قرعه کشی</label>
                    <input value="<?php echo $getBannerLink; ?>" name="bannerLink" type="text" class="form-control" placeholder="لینک بنر تبلیغاتی را وارد کنید">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label>عکس پایینی تبلیغاتی پروفایل قرعه کشی</label>
                    <input name="banner" type="file" class="form-control">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <label>لینک عکس پایینی تبلیغاتی پروفایل قرعه کشی</label>
                    <input value="<?php echo $getBannerLink; ?>" name="bannerLink" type="text" class="form-control" placeholder="لینک بنر تبلیغاتی را وارد کنید">
                </div>

            </div>
            <div class="form-group">
                <label>شماره تماس</label>
                <input value="<?php echo $getPhone1; ?>" name="phone1" type="text" class="form-control"
                       placeholder="شماره تماس را وارد کنید">
            </div>
            <!--<div class="form-group">
                <label>روابط عمومی</label>
                <input value="<?php /*echo $getPhone2; */?>" name="phone2" type="text" class="form-control"
                       placeholder="شماره تماس را وارد کنید">
            </div>
            <div class="form-group">
                <label>فکس</label>
                <input value="<?php /*echo $getFax; */?>" name="fax" type="text" class="form-control"
                       placeholder="شماره فکس را وارد کنید">
            </div>-->
            <div class="form-group">
                <label>ایمیل</label>
                <input value="<?php echo $getEmail; ?>" name="email" type="email" class="form-control"
                       placeholder="ایمیل را وارد کنید">
            </div>
            <div class="form-group">
                <label>آدرس</label>
                <textarea name="address" class="form-control" cols="30" rows="5"
                          placeholder="آدرس را وارد کنید"><?php echo $getAddress; ?></textarea>
            </div>
            <div class="form-group">
                <label>قوانین و مقررات</label>
                <textarea name="rules" id="editor1" class="form-control" cols="30" rows="10"
                          placeholder="متن قوانین و مقررات را وارد کنید"><?php echo $getRules; ?></textarea>


                <script>
                    CKEDITOR.replace('editor1', {
                        language: 'fa',
                        /*
                         * Ensure that htmlwriter plugin, which is required for this sample, is loaded.
                         */
                        extraPlugins: 'htmlwriter',

                        /*
                         * Style sheet for the contents
                         */
                        contentsCss: 'body {color:#000; background-color#:FFF;}',

                        /*
                         * Simple HTML5 doctype
                         */
                        docType: '<!DOCTYPE HTML>',

                        /*
                         * Allowed content rules which beside limiting allowed HTML
                         * will also take care of transforming styles to attributes
                         * (currently only for img - see transformation rules defined below).
                         *
                         * Read more: http://docs.ckeditor.com/#!/guide/dev_advanced_content_filter
                         */
                        allowedContent: 'h1 h2 h3 p pre[align]; ' +
                        'blockquote code kbd samp var del ins cite q b i u strike ul ol li hr table tbody tr td th caption; ' +
                        'img[!src,alt,align,width,height]; font[!face]; font[!family]; font[!color]; font[!size]; font{!background-color}; a[!href]; a[!name]',

                        /*
                         * Core styles.
                         */
                        coreStyles_bold: {element: 'b'},
                        coreStyles_italic: {element: 'i'},
                        coreStyles_underline: {element: 'u'},
                        coreStyles_strike: {element: 'strike'},

                        /*
                         * Font face.
                         */

                        // Define the way font elements will be applied to the document.
                        // The "font" element will be used.
                        font_style: {
                            element: 'font',
                            attributes: {'face': '#(family)'}
                        },

                        /*
                         * Font sizes.
                         */
                        fontSize_sizes: 'xx-small/1;x-small/2;small/3;medium/4;large/5;x-large/6;xx-large/7',
                        fontSize_style: {
                            element: 'font',
                            attributes: {'size': '#(size)'}
                        },

                        /*
                         * Font colors.
                         */

                        colorButton_foreStyle: {
                            element: 'font',
                            attributes: {'color': '#(color)'}
                        },

                        colorButton_backStyle: {
                            element: 'font',
                            styles: {'background-color': '#(color)'}
                        },

                        /*
                         * Styles combo.
                         */
                        stylesSet: [
                            {name: 'Computer Code', element: 'code'},
                            {name: 'Keyboard Phrase', element: 'kbd'},
                            {name: 'Sample Text', element: 'samp'},
                            {name: 'Variable', element: 'var'},
                            {name: 'Deleted Text', element: 'del'},
                            {name: 'Inserted Text', element: 'ins'},
                            {name: 'Cited Work', element: 'cite'},
                            {name: 'Inline Quotation', element: 'q'}
                        ],

                        on: {
                            pluginsLoaded: configureTransformations,
                            loaded: configureHtmlWriter
                        }
                    });

                    /*
                     * Add missing content transformations.
                     */
                    function configureTransformations(evt) {
                        var editor = evt.editor;

                        editor.dataProcessor.htmlFilter.addRules({
                            attributes: {
                                style: function (value, element) {
                                    // Return #RGB for background and border colors
                                    return CKEDITOR.tools.convertRgbToHex(value);
                                }
                            }
                        });

                        // Default automatic content transformations do not yet take care of
                        // align attributes on blocks, so we need to add our own transformation rules.
                        function alignToAttribute(element) {
                            if (element.styles['text-align']) {
                                element.attributes.align = element.styles['text-align'];
                                delete element.styles['text-align'];
                            }
                        }

                        editor.filter.addTransformations([
                            [{element: 'p', right: alignToAttribute}],
                            [{element: 'h1', right: alignToAttribute}],
                            [{element: 'h2', right: alignToAttribute}],
                            [{element: 'h3', right: alignToAttribute}],
                            [{element: 'pre', right: alignToAttribute}]
                        ]);
                    }

                    /*
                     * Adjust the behavior of htmlWriter to make it output HTML like FCKeditor.
                     */
                    function configureHtmlWriter(evt) {
                        var editor = evt.editor,
                            dataProcessor = editor.dataProcessor;

                        // Out self closing tags the HTML4 way, like <br>.
                        dataProcessor.writer.selfClosingEnd = '>';

                        // Make output formatting behave similar to FCKeditor.
                        var dtd = CKEDITOR.dtd;
                        for (var e in CKEDITOR.tools.extend({}, dtd.$nonBodyContent, dtd.$block, dtd.$listItem, dtd.$tableContent)) {
                            dataProcessor.writer.setRules(e, {
                                indent: true,
                                breakBeforeOpen: true,
                                breakAfterOpen: false,
                                breakBeforeClose: !dtd[e]['#'],
                                breakAfterClose: true
                            });
                        }
                    }

                </script>
            </div>
            <div class="form-group">
                <label>درباره ما</label>
                <textarea name="about" class="form-control" id="editor2" cols="30" rows="10"
                          placeholder="متن درباره ما را وارد کنید"><?php echo $getAbout; ?></textarea>


                <script>
                    CKEDITOR.replace('editor2', {
                        language: 'fa',
                        /*
                         * Ensure that htmlwriter plugin, which is required for this sample, is loaded.
                         */
                        extraPlugins: 'htmlwriter',

                        /*
                         * Style sheet for the contents
                         */
                        contentsCss: 'body {color:#000; background-color#:FFF;}',

                        /*
                         * Simple HTML5 doctype
                         */
                        docType: '<!DOCTYPE HTML>',

                        /*
                         * Allowed content rules which beside limiting allowed HTML
                         * will also take care of transforming styles to attributes
                         * (currently only for img - see transformation rules defined below).
                         *
                         * Read more: http://docs.ckeditor.com/#!/guide/dev_advanced_content_filter
                         */
                        allowedContent: 'h1 h2 h3 p pre[align]; ' +
                        'blockquote code kbd samp var del ins cite q b i u strike ul ol li hr table tbody tr td th caption; ' +
                        'img[!src,alt,align,width,height]; font[!face]; font[!family]; font[!color]; font[!size]; font{!background-color}; a[!href]; a[!name]',

                        /*
                         * Core styles.
                         */
                        coreStyles_bold: {element: 'b'},
                        coreStyles_italic: {element: 'i'},
                        coreStyles_underline: {element: 'u'},
                        coreStyles_strike: {element: 'strike'},

                        /*
                         * Font face.
                         */

                        // Define the way font elements will be applied to the document.
                        // The "font" element will be used.
                        font_style: {
                            element: 'font',
                            attributes: {'face': '#(family)'}
                        },

                        /*
                         * Font sizes.
                         */
                        fontSize_sizes: 'xx-small/1;x-small/2;small/3;medium/4;large/5;x-large/6;xx-large/7',
                        fontSize_style: {
                            element: 'font',
                            attributes: {'size': '#(size)'}
                        },

                        /*
                         * Font colors.
                         */

                        colorButton_foreStyle: {
                            element: 'font',
                            attributes: {'color': '#(color)'}
                        },

                        colorButton_backStyle: {
                            element: 'font',
                            styles: {'background-color': '#(color)'}
                        },

                        /*
                         * Styles combo.
                         */
                        stylesSet: [
                            {name: 'Computer Code', element: 'code'},
                            {name: 'Keyboard Phrase', element: 'kbd'},
                            {name: 'Sample Text', element: 'samp'},
                            {name: 'Variable', element: 'var'},
                            {name: 'Deleted Text', element: 'del'},
                            {name: 'Inserted Text', element: 'ins'},
                            {name: 'Cited Work', element: 'cite'},
                            {name: 'Inline Quotation', element: 'q'}
                        ],

                        on: {
                            pluginsLoaded: configureTransformations,
                            loaded: configureHtmlWriter
                        }
                    });

                    /*
                     * Add missing content transformations.
                     */
                    function configureTransformations(evt) {
                        var editor = evt.editor;

                        editor.dataProcessor.htmlFilter.addRules({
                            attributes: {
                                style: function (value, element) {
                                    // Return #RGB for background and border colors
                                    return CKEDITOR.tools.convertRgbToHex(value);
                                }
                            }
                        });

                        // Default automatic content transformations do not yet take care of
                        // align attributes on blocks, so we need to add our own transformation rules.
                        function alignToAttribute(element) {
                            if (element.styles['text-align']) {
                                element.attributes.align = element.styles['text-align'];
                                delete element.styles['text-align'];
                            }
                        }

                        editor.filter.addTransformations([
                            [{element: 'p', right: alignToAttribute}],
                            [{element: 'h1', right: alignToAttribute}],
                            [{element: 'h2', right: alignToAttribute}],
                            [{element: 'h3', right: alignToAttribute}],
                            [{element: 'pre', right: alignToAttribute}]
                        ]);
                    }

                    /*
                     * Adjust the behavior of htmlWriter to make it output HTML like FCKeditor.
                     */
                    function configureHtmlWriter(evt) {
                        var editor = evt.editor,
                            dataProcessor = editor.dataProcessor;

                        // Out self closing tags the HTML4 way, like <br>.
                        dataProcessor.writer.selfClosingEnd = '>';

                        // Make output formatting behave similar to FCKeditor.
                        var dtd = CKEDITOR.dtd;
                        for (var e in CKEDITOR.tools.extend({}, dtd.$nonBodyContent, dtd.$block, dtd.$listItem, dtd.$tableContent)) {
                            dataProcessor.writer.setRules(e, {
                                indent: true,
                                breakBeforeOpen: true,
                                breakAfterOpen: false,
                                breakBeforeClose: !dtd[e]['#'],
                                breakAfterClose: true
                            });
                        }
                    }

                </script>
            </div>
            <div class="form-group">
                <label>ارتباط با ما</label>
                <textarea name="guide" class="form-control" id="editor3" cols="30" rows="10"
                          placeholder="متن سوالات متداول را وارد کنید"><?php echo $getGuide; ?></textarea>


                <script>
                    CKEDITOR.replace('editor3', {
                        language: 'fa',
                        /*
                         * Ensure that htmlwriter plugin, which is required for this sample, is loaded.
                         */
                        extraPlugins: 'htmlwriter',

                        /*
                         * Style sheet for the contents
                         */
                        contentsCss: 'body {color:#000; background-color#:FFF;}',

                        /*
                         * Simple HTML5 doctype
                         */
                        docType: '<!DOCTYPE HTML>',

                        /*
                         * Allowed content rules which beside limiting allowed HTML
                         * will also take care of transforming styles to attributes
                         * (currently only for img - see transformation rules defined below).
                         *
                         * Read more: http://docs.ckeditor.com/#!/guide/dev_advanced_content_filter
                         */
                        allowedContent: 'h1 h2 h3 p pre[align]; ' +
                        'blockquote code kbd samp var del ins cite q b i u strike ul ol li hr table tbody tr td th caption; ' +
                        'img[!src,alt,align,width,height]; font[!face]; font[!family]; font[!color]; font[!size]; font{!background-color}; a[!href]; a[!name]',

                        /*
                         * Core styles.
                         */
                        coreStyles_bold: {element: 'b'},
                        coreStyles_italic: {element: 'i'},
                        coreStyles_underline: {element: 'u'},
                        coreStyles_strike: {element: 'strike'},

                        /*
                         * Font face.
                         */

                        // Define the way font elements will be applied to the document.
                        // The "font" element will be used.
                        font_style: {
                            element: 'font',
                            attributes: {'face': '#(family)'}
                        },

                        /*
                         * Font sizes.
                         */
                        fontSize_sizes: 'xx-small/1;x-small/2;small/3;medium/4;large/5;x-large/6;xx-large/7',
                        fontSize_style: {
                            element: 'font',
                            attributes: {'size': '#(size)'}
                        },

                        /*
                         * Font colors.
                         */

                        colorButton_foreStyle: {
                            element: 'font',
                            attributes: {'color': '#(color)'}
                        },

                        colorButton_backStyle: {
                            element: 'font',
                            styles: {'background-color': '#(color)'}
                        },

                        /*
                         * Styles combo.
                         */
                        stylesSet: [
                            {name: 'Computer Code', element: 'code'},
                            {name: 'Keyboard Phrase', element: 'kbd'},
                            {name: 'Sample Text', element: 'samp'},
                            {name: 'Variable', element: 'var'},
                            {name: 'Deleted Text', element: 'del'},
                            {name: 'Inserted Text', element: 'ins'},
                            {name: 'Cited Work', element: 'cite'},
                            {name: 'Inline Quotation', element: 'q'}
                        ],

                        on: {
                            pluginsLoaded: configureTransformations,
                            loaded: configureHtmlWriter
                        }
                    });

                    /*
                     * Add missing content transformations.
                     */
                    function configureTransformations(evt) {
                        var editor = evt.editor;

                        editor.dataProcessor.htmlFilter.addRules({
                            attributes: {
                                style: function (value, element) {
                                    // Return #RGB for background and border colors
                                    return CKEDITOR.tools.convertRgbToHex(value);
                                }
                            }
                        });

                        // Default automatic content transformations do not yet take care of
                        // align attributes on blocks, so we need to add our own transformation rules.
                        function alignToAttribute(element) {
                            if (element.styles['text-align']) {
                                element.attributes.align = element.styles['text-align'];
                                delete element.styles['text-align'];
                            }
                        }

                        editor.filter.addTransformations([
                            [{element: 'p', right: alignToAttribute}],
                            [{element: 'h1', right: alignToAttribute}],
                            [{element: 'h2', right: alignToAttribute}],
                            [{element: 'h3', right: alignToAttribute}],
                            [{element: 'pre', right: alignToAttribute}]
                        ]);
                    }

                    /*
                     * Adjust the behavior of htmlWriter to make it output HTML like FCKeditor.
                     */
                    function configureHtmlWriter(evt) {
                        var editor = evt.editor,
                            dataProcessor = editor.dataProcessor;

                        // Out self closing tags the HTML4 way, like <br>.
                        dataProcessor.writer.selfClosingEnd = '>';

                        // Make output formatting behave similar to FCKeditor.
                        var dtd = CKEDITOR.dtd;
                        for (var e in CKEDITOR.tools.extend({}, dtd.$nonBodyContent, dtd.$block, dtd.$listItem, dtd.$tableContent)) {
                            dataProcessor.writer.setRules(e, {
                                indent: true,
                                breakBeforeOpen: true,
                                breakAfterOpen: false,
                                breakBeforeClose: !dtd[e]['#'],
                                breakAfterClose: true
                            });
                        }
                    }

                </script>
            </div>
            <!--<div class="form-group">
                <label>تبلیغات سایت</label>
                <textarea name="advertising" class="form-control" id="editor4" cols="30" rows="10"
                          placeholder="اطلاعات تبلیغات را وارد کنید"><?php /*echo $getAdvertising; */?></textarea>


                <script>
                    CKEDITOR.replace('editor4', {
                        language: 'fa',
                        /*
                         * Ensure that htmlwriter plugin, which is required for this sample, is loaded.
                         */
                        extraPlugins: 'htmlwriter',

                        /*
                         * Style sheet for the contents
                         */
                        contentsCss: 'body {color:#000; background-color#:FFF;}',

                        /*
                         * Simple HTML5 doctype
                         */
                        docType: '<!DOCTYPE HTML>',

                        /*
                         * Allowed content rules which beside limiting allowed HTML
                         * will also take care of transforming styles to attributes
                         * (currently only for img - see transformation rules defined below).
                         *
                         * Read more: http://docs.ckeditor.com/#!/guide/dev_advanced_content_filter
                         */
                        allowedContent: 'h1 h2 h3 p pre[align]; ' +
                        'blockquote code kbd samp var del ins cite q b i u strike ul ol li hr table tbody tr td th caption; ' +
                        'img[!src,alt,align,width,height]; font[!face]; font[!family]; font[!color]; font[!size]; font{!background-color}; a[!href]; a[!name]',

                        /*
                         * Core styles.
                         */
                        coreStyles_bold: {element: 'b'},
                        coreStyles_italic: {element: 'i'},
                        coreStyles_underline: {element: 'u'},
                        coreStyles_strike: {element: 'strike'},

                        /*
                         * Font face.
                         */

                        // Define the way font elements will be applied to the document.
                        // The "font" element will be used.
                        font_style: {
                            element: 'font',
                            attributes: {'face': '#(family)'}
                        },

                        /*
                         * Font sizes.
                         */
                        fontSize_sizes: 'xx-small/1;x-small/2;small/3;medium/4;large/5;x-large/6;xx-large/7',
                        fontSize_style: {
                            element: 'font',
                            attributes: {'size': '#(size)'}
                        },

                        /*
                         * Font colors.
                         */

                        colorButton_foreStyle: {
                            element: 'font',
                            attributes: {'color': '#(color)'}
                        },

                        colorButton_backStyle: {
                            element: 'font',
                            styles: {'background-color': '#(color)'}
                        },

                        /*
                         * Styles combo.
                         */
                        stylesSet: [
                            {name: 'Computer Code', element: 'code'},
                            {name: 'Keyboard Phrase', element: 'kbd'},
                            {name: 'Sample Text', element: 'samp'},
                            {name: 'Variable', element: 'var'},
                            {name: 'Deleted Text', element: 'del'},
                            {name: 'Inserted Text', element: 'ins'},
                            {name: 'Cited Work', element: 'cite'},
                            {name: 'Inline Quotation', element: 'q'}
                        ],

                        on: {
                            pluginsLoaded: configureTransformations,
                            loaded: configureHtmlWriter
                        }
                    });

                    /*
                     * Add missing content transformations.
                     */
                    function configureTransformations(evt) {
                        var editor = evt.editor;

                        editor.dataProcessor.htmlFilter.addRules({
                            attributes: {
                                style: function (value, element) {
                                    // Return #RGB for background and border colors
                                    return CKEDITOR.tools.convertRgbToHex(value);
                                }
                            }
                        });

                        // Default automatic content transformations do not yet take care of
                        // align attributes on blocks, so we need to add our own transformation rules.
                        function alignToAttribute(element) {
                            if (element.styles['text-align']) {
                                element.attributes.align = element.styles['text-align'];
                                delete element.styles['text-align'];
                            }
                        }

                        editor.filter.addTransformations([
                            [{element: 'p', right: alignToAttribute}],
                            [{element: 'h1', right: alignToAttribute}],
                            [{element: 'h2', right: alignToAttribute}],
                            [{element: 'h3', right: alignToAttribute}],
                            [{element: 'pre', right: alignToAttribute}]
                        ]);
                    }

                    /*
                     * Adjust the behavior of htmlWriter to make it output HTML like FCKeditor.
                     */
                    function configureHtmlWriter(evt) {
                        var editor = evt.editor,
                            dataProcessor = editor.dataProcessor;

                        // Out self closing tags the HTML4 way, like <br>.
                        dataProcessor.writer.selfClosingEnd = '>';

                        // Make output formatting behave similar to FCKeditor.
                        var dtd = CKEDITOR.dtd;
                        for (var e in CKEDITOR.tools.extend({}, dtd.$nonBodyContent, dtd.$block, dtd.$listItem, dtd.$tableContent)) {
                            dataProcessor.writer.setRules(e, {
                                indent: true,
                                breakBeforeOpen: true,
                                breakAfterOpen: false,
                                breakBeforeClose: !dtd[e]['#'],
                                breakAfterClose: true
                            });
                        }
                    }

                </script>
            </div>-->
            <br><br>
            <div class="text-center">
                <button type="submit" name="regUsers" class="btn btn-success">به روز رسانی</button>
                <button type="reset" class="btn btn-default">بازنشانی فرم</button>
            </div>
            <br>
        </form>

    </div>


</div><!-- /.row -->


</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->

<!-- JavaScript -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>