<?php include APPPATH .'views/admin/header.php'?>
    <div id="wraper">
    <div id="left">
        <?php $current = isset($current)?$current :1;?>
        <?php include APPPATH .'views/admin/left.php'?>
    </div>
    <div id="right">
        <div class = 'bread_nav'> <?php echo $bread;?> </div>
        <div class="error" style="margin-left : 31px;font-size : 18px; font-weight: bold; margin-top : 70px;"><?php echo  $error; ?></div>
    </div>
    </div>

<script>
    var t = 0;
    setInterval("delay()", 3000);
    function delay() {
        window.location.href = '<?php echo $redirect?>'
    }
</script>
<?php include APPPATH .'views/admin/footer.php'?>