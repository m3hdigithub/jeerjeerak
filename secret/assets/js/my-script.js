/************** global variable ****************/
var reActionTime = 120;
/************** global variable ****************/



// set contact us
$('.sendContactFormBtn').click(function (e) {
    e.preventDefault();

    var url = "actions.php?contactForm=1";
    $(this).html('در حال ارسال...');

    $.ajax({
        type: "POST",
        url: url,
        data: $("#contactUsForm").serialize(),
        success: function (response) {
            var obj = JSON.parse(response);
            $('.sendContactFormBtn').html('ارسال');
            $('.set-alert').html(obj[1]).fadeIn();
            setTimeout(function () {
                if (obj[0] == true) {
                    window.location.href = "contact";
                }
                $('.set-alert').fadeOut();
            }, 3000);
        }
    });
});

// profile edit form
$('.sendAcountFormBtn').click(function (e) {
    e.preventDefault();

    var url = "actions.php?profileEditForm=1";
    $(this).html('در حال ارسال...');

    $.ajax({
        type: "POST",
        url: url,
        data: $("#profileAcountForm").serialize(),
        success: function (response) {
            var obj = JSON.parse(response);
            $('.sendAcountFormBtn').html('ویرایش');
            $('.set-alert-acount').html(obj[1]).fadeIn();
            setTimeout(function () {
                if (obj[0] == true) {
                    window.location.href = "profile";
                }
                $('.set-alert-acount').fadeOut();
            }, 3000);
        }
    });
});


// profile change password form
$('.sendChangePassFormBtn').click(function (e) {
    e.preventDefault();

    var url = "actions.php?profileChangePass=1";
    $(this).html('در حال ارسال...');

    $.ajax({
        type: "POST",
        url: url,
        data: $("#profilePasswordForm").serialize(),
        success: function (response) {
            var obj = JSON.parse(response);
            $('.sendChangePassFormBtn').html('ثبت');
            $('.set-alert-pass').html(obj[1]).fadeIn();
            setTimeout(function () {
                if (obj[0] == true) {
                    window.location.href = "profile";
                }
                $('.set-alert-pass').fadeOut();
            }, 3000);
        }
    });
});


// add to listen
$('.addToListenBtn').click(function (e) {
    e.preventDefault();

    var url = "actions.php?addToListenForm=1";
    $(this).html('در حال ارسال...');

    $.ajax({
        type: "POST",
        url: url,
        data: $("#addToListenForm").serialize(),
        success: function (response) {
            var obj = JSON.parse(response);
            $('.addToListenBtn').html('ثبت');
            $('.set-alert-listen').html(obj[1]).fadeIn();
            setTimeout(function () {
                if (obj[0] == true) {
                    window.location.href = "profile";
                }
                $('.set-alert-listen').fadeOut();
            }, 3000);
        }
    });
});


// add to gallery
$('.addToGallery').click(function (e) {
    e.preventDefault();
    var getId = $(this).attr('id');
    getId = getId.split('-');
    var itemId = getId[0];
    var itemType = getId[1];
    var url = "actions.php?addToGallery=1&itemId=" + itemId + "&itemType=" + itemType;
    $(this).addClass('rotScaling');

    $.ajax({
        type: "POST",
        url: url,
        //data: $("#addToListenForm").serialize(),
        success: function (response) {
            var obj = JSON.parse(response);
            if (obj[0] == true) {
                $(".addToGallery").hide();
                $(".addToGallery-disable").show();
            }
        }
    });
});

// del of gallery
$('.delOfGallery').click(function (e) {
    e.preventDefault();
    var getId = $(this).attr('id');
    getId = getId.split('-');
    var itemId = getId[0];
    var parentId = getId[1];
    var url = "actions.php?delOfGallery=1&id=" + itemId;
    $(this).addClass('rotScaling');

    $.ajax({
        type: "POST",
        url: url,
        //data: $("#addToListenForm").serialize(),
        success: function (response) {
            var obj = JSON.parse(response);
            $('.delOfGallery').removeClass('rotScaling');
            if (obj[0] == true) {
                $("#" + parentId).css({"background-color": "rgba(255, 0, 0, 0.20)"}).fadeIn('slow');
                setTimeout(function () {
                    $("#" + parentId).fadeOut('slow');
                }, 1000);
            }
        }
    });
});

// del item
$('.delMyItem').click(function (e) {
    e.preventDefault();
    var getId = $(this).attr('id');
    getId = getId.split('-');
    var itemType = getId[0];
    var itemId = getId[1];
    var blockId = getId[2];
    var url = "actions.php?deleteMyItem=1&type=" + itemType + "&id=" + itemId;
    $(this).addClass('rotScaling');
    $.ajax({
        type: "POST",
        url: url,
        //data: $("#addToListenForm").serialize(),
        success: function (response) {
            var obj = JSON.parse(response);
            $('.delMyItem').removeClass('rotScaling');
            if (obj[0] == true) {
                $("#" + blockId).css({"background-color": "rgba(255, 0, 0, 0.20)"}).fadeIn('slow');
                setTimeout(function () {
                    $("#" + blockId).fadeOut('slow');
                }, 1000);
            }
        }
    });
});

// update time item
$('.updateMyItem').click(function (e) {
    e.preventDefault();
    var getId = $(this).attr('id');
    getId = getId.split('-');
    var itemType = getId[0];
    var itemId = getId[1];
    var blockId = getId[2];
    var url = "actions.php?updateMyItem=1&type=" + itemType + "&id=" + itemId;
    $(this).addClass('rotating');
    $.ajax({
        type: "POST",
        url: url,
        //data: $("#addToListenForm").serialize(),
        success: function (response) {
            var obj = JSON.parse(response);
            $('.updateMyItem').removeClass('rotating');
            if (obj[0] == true) {
                $("#" + blockId).css({"background-color": "rgba(0, 128, 0, 0.20)"}).fadeIn('slow');
            }
            setTimeout(function () {
                //$("#" + blockId).css({"background-color": "#ececec"}).fadeIn('slow');
                window.location.reload();
            }, 1000);
        }
    });
});

//************************* popup actions *************************//
// pop login
$('.loginBtn').click(function (e) {
    e.preventDefault();
    var alertClass = '.popLoginAlert';
    var thisClick = this;
    $(thisClick).html('در حال بررسی...');
    var url = "actions.php?popLoginForm=1";
    $.ajax({
        type: "POST",
        url: url,
        data: $("#popLoginForm").serialize(),
        success: function (response) {
            var obj = JSON.parse(response);
            $(thisClick).html('ورود').fadeIn();
            $(alertClass).html(obj[1]).fadeIn();
            if (obj[0] == true) {
                setTimeout(function () {
                    $(alertClass).fadeOut('slow');
                    window.location.href = "index";
                }, 1000);
            }
        }
    });
});

// pop forget
$('.forgetBtn').click(function (e) {
    e.preventDefault();
    var thisClick = this;
    var alertClass = '.popForgetAlert';
    /**************** set timer ***************/
    var timerClass = document.getElementById('timer1');
    $(thisClick).html('در حال بررسی...');

    var url = "actions.php?popForgetForm=1";
    $.ajax({
        type: "POST",
        url: url,
        data: $("#popForgetForm").serialize(),

        success: function (response) {
            var obj = JSON.parse(response);
            $(thisClick).html('دریافت رمز جدید');
            if (obj[0] == true) {

                $('#msgForgetMobile').val(obj[2]);
                off('overlay4');
                on('overlay3');

                $(thisClick).fadeOut();
                startTimer(reActionTime, timerClass);
                //$(alertClass).delay(reActionTime * 1000).fadeOut();
                $(thisClick).delay(reActionTime * 1000).fadeIn();
            } else {
                $(alertClass).html(obj[1]).fadeIn();
                $(alertClass).delay(1000).fadeOut();
            }
        }
    });
});

// pop send code
$('.sendCodeBtn').click(function (e) {
    e.preventDefault();
    var thisClick = this;
    var alertClass = '.popSendCodeAlert';
    var alertRegisterCodeClass = '.popRegisterCodeAlert';
    /**************** set timer ***************/
    var timerClass = document.getElementById('timer1');

    $(thisClick).html('در حال بررسی...');

    var url = "actions.php?popSendCodeForm=1";
    $.ajax({
        type: "POST",
        url: url,
        data: $("#popSendCodeForm").serialize(),
        success: function (response) {
            var obj = JSON.parse(response);
            $(thisClick).html('دریافت کد فعالسازی');

            if (obj[0] == true) {
                off('overlay');
                on('overlay2');
                $(alertRegisterCodeClass).html(obj[2]).fadeIn();
                $('#registerCodeMobile').val(obj[3]);

            } else {
                $(alertClass).html(obj[1]).fadeIn();
                $(alertClass).delay(1000).fadeOut();
            }
        }
    });
});

// pop resend form
$('.reSensBtn').click(function (e) {

    e.preventDefault();
    var thisClick = this;
    var alertClass = '.popRegisterCodeAlert';
    /**************** set timer ***************/
    var timerClass = document.getElementById('timer3');

    $(thisClick).html('در حال بررسی...');

    var url = "actions.php?popSendCodeForm=1";
    $.ajax({
        type: "POST",
        url: url,
        data: $("#popRegisterCodeForm").serialize(),
        success: function (response) {
            var obj = JSON.parse(response);
            $(thisClick).html('ارسال مجدد کد');
            $(alertClass).html(obj[1]).fadeIn();

            if (obj[0] == true) {
                $(alertClass).html(obj[2]).fadeIn();
                $('#registerCodeMobile').val(obj[3]);
                $(thisClick).fadeOut();
                $(thisClick).delay(reActionTime * 1000).fadeIn();
                startTimer(reActionTime, timerClass);
            } else {
                $(alertClass).delay(1000).fadeOut();
            }
        }
    });
});

// pop resend form 2
$('.reSensBtn2').click(function (e) {

    e.preventDefault();
    var thisClick = this;
    var alertClass = '.popReSensBtn2Alert';
    /**************** set timer ***************/
    var timerClass = document.getElementById('timer4');

    $(thisClick).html('در حال بررسی...');

    var url = "actions.php?popSendCodeForm=1";
    $.ajax({
        type: "POST",
        url: url,
        data: $("#popReSendForm2").serialize(),
        success: function (response) {
            var obj = JSON.parse(response);
            $(thisClick).html('ارسال مجدد کد');
            $(alertClass).html(obj[1]).fadeIn();

            if (obj[0] == true) {
                $(alertClass).html(obj[2]).fadeIn();
                $('#registerCodeMobile').val(obj[3]);
                $(thisClick).fadeOut();
                $(thisClick).delay(reActionTime * 1000).fadeIn();
                startTimer(reActionTime, timerClass);
            } else {
                //$(alertClass).delay(1000).fadeOut();
            }
        }
    });
});

// pop register
$('.registerBtn').click(function (e) {
    e.preventDefault();
    var thisClick = this;
    var alertClass = '.popRegisterCodeAlert';
    /**************** set timer ***************/
    var timerClass = document.getElementById('timer3');

    $(thisClick).html('در حال بررسی...');

    var url = "actions.php?popRegisterCodeForm=1";
    $.ajax({
        type: "POST",
        url: url,
        data: $("#popRegisterCodeForm").serialize(),
        success: function (response) {
            var obj = JSON.parse(response);
            $(thisClick).html('ثبت نام');
            $(alertClass).html(obj[1]).fadeIn();

            if (obj[0] == true) {
                resetForm('popRegisterCodeForm');
                off('overlay2');
                on('overlay6');

                $(alertRegisterCodeClass).html(obj[2]).fadeIn();
                $('#registerCodeMobile').val(obj[3])
            } else {
                $(alertClass).delay(1000).fadeOut();
            }
        }
    });
});


/**********************************************************************************************************************/

(function () {
    var $button = $("<div id='source-button' class='btn btn-primary btn-xs'>&lt; &gt;</div>").click(function () {
        var index = $('.bs-component').index($(this).parent());
        $.get(window.location.href, function (data) {
            var html = $(data).find('.bs-component').eq(index).html();
            html = cleanSource(html);
            $("#source-modal pre").text(html);
            $("#source-modal").modal();
        })
    });

    $('.bs-component [data-toggle="popover"]').popover();
    $('.bs-component [data-toggle="tooltip"]').tooltip();

    $(".bs-component").hover(function () {
        $(this).append($button);
        $button.show();
    }, function () {
        $button.hide();
    });

    function cleanSource(html) {
        var lines = html.split(/\n/);

        lines.shift();
        lines.splice(-1, 1);

        var indentSize = lines[0].length - lines[0].trim().length,
            re = new RegExp(" {" + indentSize + "}");

        lines = lines.map(function (line) {
            if (line.match(re)) {
                line = line.substring(indentSize);
            }

            return line;
        });

        lines = lines.join("\n");

        return lines;
    }

    $(".icons-material .icon").each(function () {
        $(this).after("<br><br><code>" + $(this).attr("class").replace("icon ", "") + "</code>");
    });

})();

$(function () {
    $.material.init();
    $(".shor").noUiSlider({
        start: 40,
        connect: "lower",
        range: {
            min: 0,
            max: 100
        }
    });

    $(".svert").noUiSlider({
        orientation: "vertical",
        start: 40,
        connect: "lower",
        range: {
            min: 0,
            max: 100
        }
    });
});

function changeClass(selectID, beforeClass, afterClass) {
    var element = document.getElementById(selectID);
    element.classList.remove(beforeClass);
    element.classList.add(afterClass);
}

function on(id) {
    document.getElementById(id).style.display = "block";
    $(".allpopup").addClass("actuve");
}

function off(id) {
    document.getElementById(id).style.display = "none";
    $(".allpopup").removeClass("actuve");
}

function radioChange(idOn, arrIdOff) {
    var arrNum = arrIdOff.length;
    document.getElementById(idOn).style.display = "block";


    //******* change button pay (popup register item form) *******//
    var idOnArr = idOn.split('-');
    if (idOnArr[1] != 1) {
        $('.packageRegBtn').css("display",'block');
        $('.packageRegBtn2').css("display",'block');
    } else {
        $('.packageRegBtn').css("display",'none');
        $('.packageRegBtn2').css("display",'none');
    }
    //******* change button pay (popup register item form) *******//

    for (var i = 0; i <= arrNum; i++) {
        document.getElementById(arrIdOff[i]).style.display = "none";
    }
}


// check session for active menu
if (sessionStorage.getItem("profile-menu-active") && sessionStorage.getItem("profile-menu-active") != '') {
    var activeId = sessionStorage.getItem("profile-menu-active");
    $('#' + activeId + '1').addClass('act');
    $('#' + activeId).css('display', 'block');

    // remove active other menu
    var deActiveArr = ['user-acount', 'change-password', 'pakages', 'my-news', 'store', 'zapas', 'listen', 'parking'];
    for (var i = 0; i <= deActiveArr.length; i++) {
        if (activeId != deActiveArr[i]) {
            $('#' + deActiveArr[i]).css('display', 'none');
            $('#' + deActiveArr[i] + '1').removeClass('act');
        }
    }
}

function menuChange(idOn, arrIdOff) {
    var arrNum = arrIdOff.length;
    $('#' + idOn).css("display", "block");
    $('#' + idOn + '1').addClass('act');


    // set session for active menu
    sessionStorage.setItem("profile-menu-active", idOn);

    for (var i = 0; i <= arrNum; i++) {
        $('#' + arrIdOff[i]).css("display", "none");
        $('#' + arrIdOff[i] + '1').removeClass('act');
    }
}

function startTimer(duration, display) {
    var timer = duration, minutes, seconds;

    var setter = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        var output = minutes + ":" + seconds + "<br>زمان باقی مانده";
        $(display).html(output).fadeIn();

        if (--timer < 0) {
            console.log(timer);
            timer = 0;
            $(display).html(output).fadeOut();
            clearInterval(setter);
        }
    }, 1000);
}


/********Go Top********/
var amountScrolled = 100;
$('#go-top').hide();
$(window).scroll(function () {
    if ($(window).scrollTop() > amountScrolled) {
        $('#go-top').fadeIn('slow');
    } else {
        $('#go-top').fadeOut('slow');
    }
});

$('#go-top').click(function () {
    $('html, body').animate({
        scrollTop: 0
    }, 'slow');
    return false;
});


/******** change detail slider ********/
setTimeout(function () {
    autoAddImageToSlider('big-image-slid', 'slide1', 'slide2', 'slide3', 'slide4')
}, 0);
setTimeout(function () {
    autoAddImageToSlider('big-image-slid', 'slide2', 'slide1', 'slide3', 'slide4')
}, 2000);
setTimeout(function () {
    autoAddImageToSlider('big-image-slid', 'slide3', 'slide1', 'slide2', 'slide4')
}, 4000);
setTimeout(function () {
    autoAddVideoToSlider('big-video-slid', 'slide4', 'slide1', 'slide2', 'slide3')
}, 6000);

function autoAddImageToSlider(id, clickedElement, element2, element3, element4) {
    var imgSrc = document.getElementById(clickedElement).src;
    document.getElementById(id).src = imgSrc;
    document.getElementById(element2).classList.remove('active', 'grayscaling');
    document.getElementById(element3).classList.remove('active', 'grayscaling');
    document.getElementById(element4).classList.remove('active', 'grayscaling');
    document.getElementById(clickedElement).classList.add('active');
    document.getElementById(clickedElement).classList.add('grayscaling');
    document.getElementById('big-video-slid').style.display = "none";
    document.getElementById('big-video-slid').pause();
    document.getElementById(id).style.display = "block";
}

function autoAddVideoToSlider(id, clickedElementID, element2, element3, element4) {
    var videoSrc = $("#" + clickedElementID).html();
    $('#' + id).html(videoSrc);
    $("#big-image-slid").css("display", "none");
    $('#' + id).css("display", "block");
    // $('#' + id).attr('autoplay', true);
    document.getElementById(id).play();

    document.getElementById(clickedElementID).classList.add('active');
    document.getElementById(clickedElementID).classList.add('grayscaling');
    document.getElementById(element2).classList.remove('active', 'grayscaling');
    document.getElementById(element3).classList.remove('active', 'grayscaling');
    document.getElementById(element4).classList.remove('active', 'grayscaling');

}

function adToSlide(id, clickedElement, element2, element3, element4) {
    var imgSrc = clickedElement.src;
    document.getElementById(id).src = imgSrc;
    document.getElementById(element2).classList.remove('active', 'grayscaling');
    document.getElementById(element3).classList.remove('active', 'grayscaling');
    document.getElementById(element4).classList.remove('active', 'grayscaling');
    clickedElement.classList.add('active');
    clickedElement.classList.add('grayscaling');
    document.getElementById('big-video-slid').style.display = "none";
    document.getElementById('big-video-slid').pause();
    document.getElementById(id).style.display = "block";
}

function adVideoToSlide(id, clickedElementID, element2, element3, element4) {
    var videoSrc = $(clickedElementID).html();
    $('#' + id).html(videoSrc);

    document.getElementById('big-image-slid').style.display = "none"; // hide image
    document.getElementById(id).style.display = "block"; // shove video
    document.getElementById(id).play();

    clickedElementID.classList.add('active');
    clickedElementID.classList.add('grayscaling');
    document.getElementById(element2).classList.remove('active', 'grayscaling');
    document.getElementById(element3).classList.remove('active', 'grayscaling');
    document.getElementById(element4).classList.remove('active', 'grayscaling');
}

/******** line scroll ********/
//Get the id of the <path> element and the length of <path>
var lineScrole = document.getElementById("line-scrole");
var length = lineScrole.getTotalLength();

//The start position of the drawing
lineScrole.style.strokeDasharray = length;

//Hide the triangle by offsetting dash. Remove this line to show the triangle before scroll draw
lineScrole.style.strokeDashoffset = length;

//Find scroll percentage on scroll (using cross-browser properties), and offset dash same amount as percentage scrolled
window.addEventListener("scroll", myFunction);

function myFunction() {
    var scrollpercent = (document.body.scrollTop + document.documentElement.scrollTop) / (document.documentElement.scrollHeight - document.documentElement.clientHeight);

    var draw = length * scrollpercent;

    // Reverse the drawing (when scrolling upwards)
    lineScrole.style.strokeDashoffset = length - draw;
}


//************************ reset form ************************/
function resetForm(formID) {
    document.getElementById(formID).reset();
}


//************************ pop up upload image and video ************************/


/**************** get models with company select **************/
function getMyJson(thisElement, targetId) {
    $("#" + targetId).html('<option value="">در حال دریافت اطلاعات...</option>');
    var modelArr = ['model', 'model1', 'model2'];
    var cityArr = ['city', 'city1', 'city2', 'city3', 'city4', 'city5', 'city6', 'city7', 'city8', 'city9', 'city10'];
    var allowedModelIndex = modelArr.indexOf(targetId);
    var allowedCityIndex = cityArr.indexOf(targetId);

    var optionTitle;
    if (allowedModelIndex >= 0) {
        optionTitle = 'مدل';
    } else if (allowedCityIndex >= 0) {
        optionTitle = 'شهر یا محله';
    }

    var companyId = $(thisElement).val();
    $.getJSON("panel/getJson.php?getJ=" + targetId, function (result) {
        var arrLength = result.length;
        $("#" + targetId).html('<option value="0">' + optionTitle + '</option>');
        for (var i = 0; i < arrLength; i++) {
            if (result[i]['sub_cat'] == companyId) {
                document.getElementById(targetId).innerHTML += '<option value="' + result[i]['id'] + '">' + result[i]['title'] + '</option>';
            }
        }
    });
}


//******************* start upload and delete with ajax *********************//
function handleFileSelect(evt) {

    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {
        // Only process image files.
        /*if (!f.type.match('image.*')) {
         continue;
         }*/
        var reader = new FileReader();
        // Closure to capture the file information.
        reader.onload = (function (theFile) {
            return function (e) {
                // Render thumbnail.
                var input_id = $(evt.target).attr('id');
                /*  $(evt.target).append('<img src='+e.target.result+'>');*/
                $('#img_' + input_id).attr('src', e.target.result);
                $('#img_' + input_id).css('display', 'block');

                $('#uploadimage_' + input_id).submit();

            }
        })(f);

        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
    }
}

function deleteimage(tag, imgurl, inputHidden) {
    var alertClass = '.popImageAlert';
    var input = $(tag).parents('.advr_pic_item').find('input[type=file]');
    input.val('');
    $(tag).fadeOut(100);
    $(tag).parents('.advr_pic_item').find('img').attr('src', '');
    $(tag).parents('.advr_pic_item').find('img').css('display', 'none');

    var url = "actions.php?popDeleteFileForm=1";
    var data = {'imgurl': imgurl};
    $.post(url, data, function (msg) {
        $('#' + inputHidden).val('');
        console.log(inputHidden + ' => ' + imgurl);
        var obj = JSON.parse(msg);
        console.log(obj[3]);

        $(alertClass).html(obj[1]).fadeIn();
        $(alertClass).delay(1000).fadeOut();
    });
}

//******************* end upload and delete with ajax *********************//


function getSurvey(thisElement, imageContent, otherId, direction) {
    var modelId = $(thisElement).val();
    if (otherId != '') {
        modelId = $('#' + otherId).val();
    }
    var url = "panel/getJson.php?getSurvey=" + modelId;
    $.getJSON(url, function (result) {
        var obj = result[0];
        $('.' + direction + 'links').css({'display': 'block'});
        $('.' + imageContent).attr("src", obj['val1']);
        $('#' + direction + 'linkVideo').attr("alt", obj['val2']);
        for (var i = 3; i <= 29; i++) {
            $('.' + direction + 'val' + i).html(obj['val' + i]);
        }
    });
}


//********************************* change method commented *********************************//
/*function showBtnSubmit(element, arrClassOff, regBtnClass, continueBtnClass) {
 var showClass = $(element).children(":selected").attr("id");
 var arrNum = arrClassOff.length;

 var reg = arrClassOff.indexOf(showClass);

 if (reg < 0) {
 $('.' + regBtnClass).css("display", "block");
 $('.' + continueBtnClass).css("display", "none");
 } else {
 $('.' + regBtnClass).css("display", "none");
 $('.' + continueBtnClass).css("display", "block");
 }
 }*/