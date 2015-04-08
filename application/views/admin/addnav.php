<?php include APPPATH .'views/admin/header.php'?>
    <div id="wraper">
        <div id="left">
            <?php $current = 2;?>
            <?php include APPPATH .'views/admin/left.php'?>
        </div>
        <?php
        $nameError = isset($error['name']) ? $error['name'] : '';
        $sortError = isset($error['sort']) ? $error['sort'] : '';
        $linkError = isset($error['link']) ? $error['link'] : '';
        ?>
        <div id="right">
            <div class = 'bread_nav'> 自定义导航栏 </div>
            <a href="<?php echo $baseUrl ?>admin/nav"><div class="button fr_button">返回</div></a>
            <div class="nav_wrap">
                <div class="nav_top">
                    <ul class="nav_type">
                        <li class="nav_page <?php if($type !=2 ){ ?>cur <?php } ?> JsTab" target="0">添加站内导航</li>
                        <li class="nav_page <?php if($type ==2 ){ ?>cur <?php } ?> JsTab" target="1">添加自定义导航</li>
                    </ul>
                </div>
                <div class="nav_main">
                    <div class="JsTabPage <?php if($type == 2 ){ ?>display_none <?php } ?>">
                        <form action="<?php echo $baseUrl?>admin/addNavAction/1" method="post"  enctype="multipart/form-data">
                            <table class="wrap_table">
                                <tr>
                                    <td width="150px">导航名称</td>
                                    <td class="no_right_border">
                                        <div style="float:left;margin-right:10px;">
                                        <input type="text" class="input_text long" name="name"/>
                                            </div>
                                        <div class="error" ><?php if($type == 1){echo $nameError;}?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>导航位置</td>
                                    <td class="no_right_border">
                                      主导航<input type="radio" value="1" class="mr10" name="position" checked/>
                                        顶部<input type="radio" value="2" class="mr10" name="position"/>
                                        底部<input type="radio" value="3" class="mr10" name="position"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>排序</td>
                                    <td class="no_right_border">
                                        <div style="float:left;margin-right:10px;">
                                        <input type="text" class="input_text long" style="width:50px;" value="50" name="sort" />
                                            <span>（排序越小越靠前）</span>
                                            </div>
                                        <div class="error"><?php if($type == 1){echo $sortError;}?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>系统内容</td>
                                    <td class="no_right_border">
                                      <select name="link" class="my_select">
                                          <option value="<?php echo $baseUrl;?>">首页</option>
                                          <?php foreach($pages as $page) {?>
                                              <option value="<?php echo $page->id;?>"><?php echo $page->name;?></option>
                                          <?php } ?>
                                      </select>
                                    </td>
                                </tr>
                                <tr >
                                    <td>logo</td>
                                    <td class="no_right_border">
                                        <div style="float:left;margin-top:15px;">
                                            <input type="file" name="userfile" size="20" />
                                        </div>
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
                    <div class="JsTabPage <?php if($type !=2 ){ ?>display_none<?php } ?>">
                        <form action="<?php echo $baseUrl?>admin/addNavAction/2" method="post"  enctype="multipart/form-data">
                            <table class="wrap_table">
                                <tr>
                                    <td width="150px">导航名称</td>
                                    <td class="no_right_border">
                                        <div style="float:left;margin-right:10px;">
                                            <input type="text" class="input_text long" name="name"/>
                                            </div>
                                        <div class="error"><?php if($type == 2){echo $nameError;}?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>导航位置</td>
                                    <td class="no_right_border">
                                        主导航<input type="radio" value="1" class="mr10" checked name="position"/>
                                        顶部<input type="radio" value="2" class="mr10" name="position"/>
                                        底部<input type="radio" value="3" class="mr10" name="position"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>排序</td>
                                    <td class="no_right_border">
                                        <div style="float:left;margin-right:10px;">
                                            <input type="text" class="input_text long" style="width:50px;" value="50" name="sort"/>
                                            <span>（排序越小越靠前）</span>
                                        </div>
                                        <div class="error ml400"><?php if($type == 2){echo $sortError;}?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>链接地址</td>
                                    <td class="no_right_border">
                                        <div style="float:left;margin-right:10px;"><input type="text" class="input_text long" name="link"/></div>
                                        <div class="error "><?php if($type == 2){echo $linkError;}?></div>
                                    </td>
                                </tr>
                                <tr >
                                    <td>logo</td>
                                    <td class="no_right_border">
                                        <div style="float:left;margin-top:15px;">
                                            <input type="file" name="userfile" size="20" />
                                        </div>
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
    </div>
<script>
$(function() {
    $(".JsTab").click(function() {
        var that = this;
        $(that).siblings().removeClass("cur");
        $(that).addClass('cur');
        var page = $(".JsTabPage");
        page.hide();

        var list = $(that).attr('target');
        $(".nav_main").children().eq(list).show();



    })
})
</script>
<?php include APPPATH .'views/admin/footer.php'?>