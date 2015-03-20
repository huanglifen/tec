<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link href="<?php echo $baseUrl; ?>public/css/admin.css" rel="stylesheet"/>
    <script src="<?php echo $baseUrl; ?>public/js/jquery-1.11.2.min.js" type="text/javascript"></script>
    <title><?php echo $title; ?></title>
    <script>
        var baseUrl = '<?php echo $baseUrl; ?>';
    </script>
</head>
<body>
<div id="wrap">
<div id="header">
    <div id="logo_title">
       <span>北京华信杰通科技有限公司管理平台</span>
    </div>
    <div id="header_nav">
        <ul class="float_right">
            <li class="noLeft">
                <a href="<?php echo $baseUrl; ?>" target="_blank">查看站点</a>
            </li>
            <li>您好！<?php echo $userName ?></li>
            <li class="noRight"><a href="<?php echo $baseUrl; ?>admin/changePassword">修改密码</a></li>
            <li class="noRight"><a href="<?php echo $baseUrl; ?>adminlogin/logout">退出</a></li>
        </ul>

    </div>
</div>

