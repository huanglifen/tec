<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $title ?></title>
    <link href="<?php echo $baseUrl; ?>public/css/main.css" rel="stylesheet" />
    <link href="<?php echo $baseUrl; ?>public/css/global.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo $baseUrl; ?>public/js/jquery-1.11.2.min.js"></script>
    <script>
        var baseUrl = '<?php echo $baseUrl?>';
    </script>
</head>
<?php
$navId = isset($navId) ? $navId : 0;
?>
<body>
<div class="top_bg">
    <div class="main_wrap">
        <div class="f_l">
            <?php
            $siteLogo = $logo ? $path .$logo : "public/images/logo.gif"
            ?>
            <img src="<?php echo $baseUrl. $siteLogo ?>" width="341" height="41" class="logo"/>
        </div>
        <div class="f_r right_top">
         <?php foreach($navs['head'] as $head) { ?>
            <span class="head_nav"  <?php if($head->logo) { ?>style="background: url(<?php echo $baseUrl. $path . $head->logo ?>) no-repeat left 3px; padding-left:20px;" <?php } ?>>
                <a href="<?php echo $baseUrl. $head->link; ?>"><?php echo $head->name ?></a>
            </span>
         <?php } ?>
        </div>
    </div>
</div>
<div class="nav">
    <div class="main_wrap">
        <ul class="nav_list" >
            <li <?php if($navId == 0) {?>class="on"<?php } ?> data-id="0"><a href="<?php echo $baseUrl;?>">首页</a></li>
            <?php foreach($navs['main'] as $main) { ?>
            <li <?php if($navId == $main->id) { ?> class="on" <?php }?> data-id="<?php echo $main->id;?>"><a href="<?php echo $main->link.'?nav='.$main->id;?>"><?php echo $main->name;?></a></li>
            <?php }?>
        </ul>
        <div class="search f_r">
            <input type="text" value="搜索华信杰通" class="search_input">
            <input type="button" class="search_btn" name="">
        </div>
    </div>
</div>