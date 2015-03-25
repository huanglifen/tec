<?php include APPPATH . 'views/admin/header.php' ?>
    <div id="wraper">
        <div id="left">
            <?php $current = 2; ?>
            <?php include APPPATH . 'views/admin/left.php' ?>
        </div>
        <?php
        $nameError = isset($error['name']) ? $error['name'] : '';
        $sortError = isset($error['sort']) ? $error['sort'] : '';
        $linkError = isset($error['link']) ? $error['link'] : '';
        ?>
        <div id="right">
            <div class='bread_nav'> 自定义导航栏</div>
            <a href="<?php echo $baseUrl ?>admin/nav">
                <div class="button fr_button">返回</div>
            </a>

            <div class="nav_wrap">
                <div class="nav_top">
                    <ul class="nav_type">
                        <li class="nav_page cur  JsTab" target="0">编辑导航</li>
                    </ul>
                </div>
                <div class="nav_main">
                    <form action="<?php echo $baseUrl ?>admin/editNavAction" method="post" enctype="multipart/form-data">
                        <input type="hidden"  name="id" value="<?php echo $id;?>"/>
                        <table class="wrap_table">
                            <tr>
                                <td width="150px">导航名称</td>
                                <td class="no_right_border">
                                    <div style="float:left;margin-right:10px;">
                                        <input type="text" class="input_text long" name="name" value="<?php echo $nav->name;?>"/>
                                    </div>
                                    <div class="error"><?php
                                            echo $nameError; ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>导航位置</td>
                                <td class="no_right_border">
                                    主导航<input type="radio" value="1" class="mr10" name="position"
                                    <?php if($nav->type != 2 && $nav->type != 3) {?>checked <?php } ?>/>
                                    顶部<input type="radio" value="2" class="mr10" name="position" <?php if($nav->type ==2 ) {?>checked <?php } ?>/>
                                    底部<input type="radio" value="3" class="mr10" name="position" <?php if($nav->type == 3) {?>checked <?php } ?>/>
                                </td>
                            </tr>
                            <tr>
                                <td>排序</td>
                                <td class="no_right_border">
                                    <div style="float:left;margin-right:10px;">
                                        <input type="text" class="input_text long" style="width:50px;" value="<?php echo $nav->sort;?>"
                                               name="sort"/>
                                        <span>（排序越小越靠前）</span>

                                    </div>
                                    <div class="error"><?php echo $sortError;?></div>
                                </td>
                            </tr>
                            <?php
                            $category = 1;
                            if(! preg_match('/^(https?:\/\/|www\.).*/', $nav->link)) {
                                $link = $baseUrl . "page/".$nav->link;
                            }else{
                                if($nav->link != $baseUrl){
                                    $category = 3;
                                }else{
                                    $category = 2;
                                }
                                $link = $nav->link;
                            }
                            ?>
                            <tr>
                                <td>链接类型</td>
                                <td class="no_right_border">
                                    系统内容<input type="radio" name="category" value="1" <?php if($category != 3) {?> checked <?php }?>>
                                    自定义<input type="radio" name="category" value="2" <?php if($category == 3) {?> checked <?php }?>>
                                </td>
                            </tr>
                            <tr>
                                <td>链接地址</td>
                                <td class="no_right_border">

                                    <input type="text" class="input_text long <?php if($category !=  3) { ?> display_none <?php } ?>" value="<?php echo $link;?>"
                                           name="linkC" />
                                        <select name="linkS" class="my_select <?php if($category ==  3) { ?> display_none <?php } ?>">
                                            <option value="<?php echo $baseUrl;?>">首页</option>
                                            <?php foreach($pages as $page) {?>
                                                <option value="<?php echo $page->id;?>" <?php if($page->id == $nav->link) {?>selected<?php } ?>><?php echo $page->name;?></option>
                                            <?php } ?>
                                        </select>
                                </td>
                            </tr>
                            <tr>
                            <tr >
                                <td>logo</td>
                                <td class="no_right_border">
                                    <div style="float:left;margin-top:15px;">
                                        <input type="file" name="userfile" size="20" />
                                    </div>
                                    <div class="success">当前logo ：<?php if($nav->logo) {?>
                                        <img style="height:30px;" src="<?php echo $baseUrl."public/img/".$nav->logo ?>" alt="<?php echo $nav->logo ?>"/>
                                        <?php } else { echo '无'; }?>
                                    </div>
                                </td>
                            </tr>
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
<script>
$("input[name=category]").on('click', function() {
    var value = $(this).val();
    if(value == '1') {
        $("select[name=linkS]").removeClass('display_none');
        $("input[name=linkC]").addClass('display_none');
    }else{
        $("select[name=linkS]").addClass('display_none');
        $("input[name=linkC]").removeClass('display_none');
    }
})
</script>
<?php include APPPATH .'views/admin/footer.php'?>