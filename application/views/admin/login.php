<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link href="<?php echo $baseUrl; ?>public/css/admin.css" rel="stylesheet"/>
    <title><?php echo $title; ?></title>
</head>
<body>
<?php
$errorInfo = isset($error['error']) ? $error['error'] : '';
$nameError = isset($error['name']) ? $error['name'] : '';
$passwordError = isset($error['password']) ? $error['password'] : '';
?>
<div class="box">
    <div class="error" style="margin-left:120px;height:20px;">
        <?php echo $errorInfo ?>
    </div>
    <form method="post" action="<?php echo $baseUrl; ?>adminlogin/index">
        <table class="set_table">
            <tr>
                <td><strong>用户名：</strong></td>
                <td><input type="text" name="name" class="input_text" value=""/></td>
                <td> <div class="error"><?php echo $nameError?></div></td>
            </tr>
            <tr>
                <td><strong>密码：</strong></td>
                <td><input type="password" name="password" class="input_text" value=""/></td>
                <td> <div class="error"><?php echo $passwordError ?></div></td>
            </tr>
        </table>
        <input type="submit" class="button ml180" value="登陆" />
    </form>
</div>
</body>

</html>