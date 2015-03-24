<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>北京华信杰通</title>
    <link href="<?php echo $baseUrl; ?>public/css/main.css" rel="stylesheet" />
    <link href="<?php echo $baseUrl; ?>public/css/global.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo $baseUrl; ?>public/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="<?php echo $baseUrl; ?>public/js/slides.min.jquery.js"></script>
    <script type="text/javascript">
        var baseUrl = '<?php echo $baseUrl; ?>';
        $(function(){
            $(".nav_list li").click(function(){
                $(this).addClass("on").siblings("li").removeClass("on");})

        })
    </script>

    <script>
        $(function(){
            $('#slides').slides({
                preload: true,
                preloadImage: baseUrl + 'images/loading.gif',
                play: 5000,
                pause: 2500,
                hoverPause: true,
                animationStart: function(){
                    $('.caption').animate({
                        bottom:-35
                    },100);
                },
                animationComplete: function(current){
                    $('.caption').animate({
                        bottom:0
                    },200);
                    if (window.console && console.log) {
                        // example return of current slide number
                        console.log(current);
                    };
                }
            });
        });
    </script>
</head>
<body>
<div class="top_bg">
    <div class="main_wrap">
        <div class="f_l">
            <img src="<?php echo $baseUrl; ?>public/images/logo.gif" width="341" height="41" class="logo"/>
        </div>
        <div class="f_r right_top">
            <span class="contact_ico"><a href="#">联系我们</a></span>
            <span class="cp_ico"><a href="#">诚聘英才</a></span>
        </div>
    </div>
</div>
<div class="nav">
    <div class="main_wrap">
        <ul class="nav_list">
            <li class="on"><a href="#">首页</a></li>
            <li><a href="#">产品&解决方案</a></li>
            <li><a href="#">服务客户</a></li>
            <li><a href="#">合作伙伴</a></li>
            <li><a href="#">诚聘英才</a></li>
        </ul>
        <div class="search f_r">
            <input type="text" value="搜索华信杰通" class="search_input">
            <input type="button" class="search_btn" name="">
        </div>
    </div>
</div>
<div class="index_banner">
    <div id="container">
        <div id="slides">
            <div class="slides_container" >
                <div><a href=""><img src="<?php echo $baseUrl; ?>public/images/banner1.jpg" width="1000" height="348" /></a></div>
                <div><a href=""><img src="<?php echo $baseUrl; ?>public/images/banner1.jpg" width="1000" height="348" /></a></div>
                <div><a href=""><img src="<?php echo $baseUrl; ?>public/images/banner1.jpg" width="1000" height="348" /></a></div>
            </div>
            <a href="#" class="prev"><img src="<?php echo $baseUrl; ?>public/images/arrow_l.png" width="26" height="43" alt="Arrow Prev"></a>
            <a href="#" class="next"><img src="<?php echo $baseUrl; ?>public/images/arrow_r.png" width="26" height="43" alt="Arrow Next"></a>
        </div>

    </div>
</div>
<div class="main_wrap">
    <div class="gs_main">
        <div class="main_bg" style="margin:0px;">
            <h2>关于华信杰通</h2>
            <a href="#" class="link_txt">>>详情</a>
            <p class="detail_txt">北京华信杰通科技有限公司，总部位于北京，集研发、销售、服务于一体，致力于为通信运营商提供端到端解决方案。</p>
        </div>
        <div class="main_bg" style="width:510px;">
            <h2>产品&解决方案</h2>
            <a href="#" class="link_txt">>>详情</a>
            <ul>
                <li>
                    <p><img src="<?php echo $baseUrl; ?>public/images/product_ico1.gif" width="53" height="43" /></p>
                    <p><a href="#">中国移动办公平台</a></p>
                </li>
                <li>
                    <p><img src="<?php echo $baseUrl; ?>public/images/product_ico2.gif" width="59" height="46" /></p>
                    <p><a href="#">卫生厅项目</a></p>
                </li>
                <li>
                    <p><img src="<?php echo $baseUrl; ?>public/images/product_ico1.gif" width="53" height="43" /></p>
                    <p><a href="#">中国移动办公平台</a></p>
                </li>
            </ul>
        </div>
        <div class="main_bg" style=" width:200px;">
            <h2>关于我们</h2>
            <div class="contact_txt">
                <p>联系电话：0311-67792177</p>
                <p>传真电话：0311-67792177</p>
                <p>地址：河北石家庄长安区剑桥春雨</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
