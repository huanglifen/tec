<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link href="<?php echo $baseUrl; ?>public/css/install.css" rel="stylesheet"/>
</head>
<body>
<?php
   $error = isset($error) ? $error : '';
   $host = isset($host) ? $host : '';
   $database = isset($database) ? $database : '';
   $dbname = isset($dbname) ? $dbname : '';
   $dbprefix = isset($dbprefix) ? $dbprefix : 'hx';
   $username = isset($username) ? $username : '';
?>
<div class="box">
    <h3>请设置数据库和管理员信息：</h3>
    <div class="error"><?php echo $error; ?></div>
    <form method="post" action="<?php echo $baseUrl; ?>install">
    <table class="set_table">
    <tr>
        <td><strong>主机名：</strong></td>
        <td><input type="text" name="host" class="input_text" value="<?php echo $host; ?>"/></td>
    </tr>
    <tr>
        <td><strong>数据库名：</strong></td>
        <td><input type="text" name="database" class="input_text" value="<?php echo $database; ?>"/></td>
    </tr>
    <tr>
       <td><strong>数据库帐号：</strong></td>
        <td><input type="text" name="dbname" class="input_text" value="<?php echo $dbname; ?>"/></td>
    </tr>
    <tr>
        <td><strong>数据库密码：</strong></td>
        <td><input type="password" name="dbpwd" class="input_text"/></td>
    </tr>
    <tr>
        <td><strong>数据表前缀：</strong></td>
        <td><input type="text" name="dbprefix" class="input_text" value="<?php echo $dbprefix; ?>"/></td>
    </tr>

    <tr>
        <td><strong>管理员用户名：</strong></td>
        <td><input type="text" name="username" class="input_text" value="<?php echo $username; ?>"/></td>
    </tr>
    <tr>
       <td><strong>登录密码：</strong></td>
        <td><input type="password" name="password"class="input_text"/></td>
    </tr>
    <tr>
        <td><strong>确认密码：</strong></td>
        <td><input type="password" name="passwordConfirm" class="input_text"/></td>
    </tr>
    </table>
    <input type="submit" class="button ml200" value="安装" />
</form>
</div>
</body>
</html>