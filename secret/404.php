<?php include_once 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $siteName; ?></title>
  <style>
  body {
    background-color: #EFEFEF;
    color: #2E2F30;
    text-align: center;
    font-family: arial, sans-serif;
  }

  div.dialog {
    width: 25em;
    margin: 4em auto 0 auto;
    border: 1px solid #CCC;
    border-right-color: #999;
    border-left-color: #999;
    border-bottom-color: #BBB;
    border-top: #B00100 solid 4px;
    border-top-left-radius: 9px;
    border-top-right-radius: 9px;
    background-color: white;
    padding: 7px 4em 0 4em;
  }

  h1 {
    font-size: 100%;
    color: #730E15;
    line-height: 1.5em;
  }

  body > p {
    width: 33em;
    margin: 0 auto 1em;
    padding: 1em 0;
    background-color: #F7F7F7;
    border: 1px solid #CCC;
    border-right-color: #999;
    border-bottom-color: #999;
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
    border-top-color: #DADADA;
    color: #666;
    box-shadow:0 3px 8px rgba(50, 50, 50, 0.17);
  }
    html{
      direction: rtl;
    }
  @font-face {
      font-family: 'yekan';
      src: url('core/panel/css/fonts/BYekan.eot');
      src: url('core/panel/css/fonts/BYekan.eot') format('embedded-opentype'),
           url('core/panel/css/fonts/BYekan.ttf') format('truetype');
  }
  html,body,*{
      font-family: yekan;
  }
  </style>
</head>

<body>
  <!-- This file lives in public/404.html -->
  <div class="dialog">
    <img src="images/404.gif" alt="">
    <h1>متاسفیم! هیچ صفحه ای پیدا نشد.</h1>
  </div>
  <p>لطفا آدرس خود را دوباره و با دقت وارد کنید.</p>
</body>
</html>