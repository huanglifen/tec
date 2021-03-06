<?php include APPPATH . 'views/admin/header.php' ?>
    <div id="wraper">
        <div id="left">
            <?php $current = 5; ?>
            <?php include APPPATH . 'views/admin/left.php' ?>
        </div>
        <div id="right">
            <div class = 'bread_nav'> 修改密码 </div>
            <a href="<?php echo $baseUrl ?>admin/administrator">
                <div class="button fr_button">返回</div>
            </a>
            <div class="nav_wrap" style="margin-top:60px;">
                <div class="nav_main">
                    <form action="<?php echo $baseUrl ?>admin/changePassword" method="post">
                        <table class="wrap_table">
                            <tr>
                                <td width="150px">原密码</td>
                                <td class="no_right_border">
                                    <div style="float:left;margin-right:10px;">
                                        <input type="password" class="input_text long" name="oldPassword" />
                                    </div>
                                    <div class="error"><?php  echo $error['oldPassword']; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td>新密码</td>
                                <td class="no_right_border">
                                    <div style="float:left;margin-right:10px;">
                                        <input type="password" class="input_text long" name="password" />
                                    </div>
                                    <div class="error"><?php  echo $error['password']; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td>确认密码</td>
                                <td class="no_right_border">
                                    <div style="float:left;margin-right:10px;">
                                        <input type="password" class="input_text long" name="confirm"/>
                                    </div>
                                    <div class="error"><?php echo $error['confirm'];?></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="no_bottom_border"></td>
                                <td class="no_right_border no_bottom_border">
                                    <input type="submit" class="button" value="确认"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include APPPATH . 'views/admin/footer.php' ?>