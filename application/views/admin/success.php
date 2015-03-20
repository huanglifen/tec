<?php include APPPATH .'views/admin/header.php'?>
    <div id="wraper">
        <div id="left">
            <?php $current = isset($current)?$current :1;?>
            <?php include APPPATH .'views/admin/left.php'?>
        </div>
        <div id="right">
            <div class = 'bread_nav'> <?php echo $bread;?> </div>
            <div class="success" style="margin-left : 31px;font-size : 18px; font-weight: bold; margin-top : 50px;"><?php echo  $success; ?></div>
        </div>
    </div>

    <script>
        var t = 0;
        setInterval("delay()", 3000);
        function delay() {
            window.location.href = '<?php echo $baseUrl.$redirect?>'
        }
    </script>
<?php include APPPATH .'views/admin/footer.php'?>