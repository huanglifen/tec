<?php include APPPATH . 'views/admin/header.php' ?>
    <div id="wraper">
        <div id="left">
            <?php $current = 3; ?>
            <?php include APPPATH . 'views/admin/left.php' ?>
        </div>
        <div id="right">
            <div class = 'bread_nav'> 编辑图片 </div>
            <a href="<?php echo $baseUrl ?>admin/picture">
                <div class="button fr_button">返回</div>
            </a>
            <div class="nav_wrap" style="margin-top:60px;">
                <div class="nav_main">
                    <form action="<?php echo $baseUrl ?>admin/picOperate" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $id; ?>" name="id" />
                        <input type="hidden" value="<?php echo $picture->origname; ?>" name="origname" />
                        <input type="hidden" value="<?php echo $picture->path; ?>" name="path" />
                        <table class="wrap_table">
                            <tr>
                                <td width="150px">图片名称</td>
                                <td class="no_right_border">
                                    <div style="float:left;margin-right:10px;">
                                        <input type="text" class="input_text long" name="name" value="<?php echo $picture->name; ?>" />
                                    </div>
                                    <div class="error"><?php  echo $error['name']; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td>上传图片</td>
                                <td class="no_right_border">
                                    <div style="float:left;margin-right:10px;margin-top:10px;">
                                        <input type="file"  name="userfile" size="20"/>
                                    </div>
                                   <?php if($picture->origname) {?> <div class="success" style="margin-left:470px;">已上传图片：<?php echo $picture->origname ?></div> <?php } ?>
                                    <div class="error" style="margin-left:470px;"><?php  echo $error['upload']; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td>排序</td>
                                <td class="no_right_border">
                                    <div style="float:left;margin-right:10px;">
                                        <input type="text" class="input_text long" style="width:50px;" value="<?php echo $picture->sort; ?>"
                                               name="sort"/>
                                        <span>（排序越小越靠前）</span>
                                    </div>
                                    <div class="error"><?php echo $error['sort'];?></div>
                                </td>
                            </tr>
                            <tr>
                                <td>链接地址</td>
                                <td class="no_right_border">
                                    <div style="float:left;margin-right:10px;">
                                        <input type="text" class="input_text long" name="link" value="<?php echo $picture->link ? $picture->link : '#'; ?>"/>
                                    </div>
                                    <div class="error"><?php  echo $error['link']; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="no_bottom_border"></td>
                                <td class="no_right_border no_bottom_border">
                                    <input type="submit" class="button" value="提交"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include APPPATH . 'views/admin/footer.php' ?>