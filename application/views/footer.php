
<footer>
    <div id="bg_dark"></div>

</footer>

<script src="static/js/bootstrap-rtl.js"></script>
<script src="static/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="static/js/owl.carousel.min.js"></script>
<script src="static/js/custom.js"></script>
<script>
    function show_form(item) {
        $('#content3').html('');
        if(item===1){
            $('#content3').load("<?php echo $baseUrl?>index/load_form_login");
        }
        if(item===0){
            $('#content3').load("<?php echo $baseUrl?>index/load_form_register");
        }


    }
</script>

</body>

</html>
