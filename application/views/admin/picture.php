<?php include APPPATH .'views/admin/header.php'?>
    <div id="wraper">
        <div id="left">
            <?php $current = 3;?>
            <?php include APPPATH .'views/admin/left.php'?>
        </div>
        <div id="right">
            <div class = 'bread_nav'> 轮播图列表 </div>
            <div><a href="<?php echo $baseUrl ?>admin/picOperate?id=0"> <div class="button fr_button">新增图片</div></a></div>
            <?php

            ?>
            <div class="nav_main" style="margin-top:60px;">
                <table class="wrap_table" style="width:85%;">
                    <?php $len = count($pictures) - 1;?>
                    <thead>
                    <th  <?php if($len == -1) {?> class="no_bottom_border"<?php }?>>
                        图片预览
                    </th>
                    <th  width="250px"<?php if($len == -1) {?> class="no_bottom_border"<?php }?>>
                        图片名称
                    </th>
                    <th width="15%"  <?php if($len == -1) {?> class="no_bottom_border"<?php }?>>
                        链接地址
                    </th>
                    <th width="15%" <?php if($len == -1) {?> class="no_bottom_border"<?php }?>>
                        排序
                    </th>
                    <th width="150px" class="no_right_border <?php if($len == -1) {?> no_bottom_border<?php }?>">操作</th>
                    </thead>
                    <?php foreach($pictures as $key => $picture) { ?>
                        <tr style="line-height: 60px;">
                            <td <?php if($len == $key) {?> class="no_bottom_border"<?php }?>>
                                <img src="<?php echo $baseUrl . $imageUrl . $picture->path ?>" height="55px">
                            </td>
                            <td <?php if($len == $key) {?> class="no_bottom_border"<?php }?>><?php echo $picture->name ?></td>
                            <td <?php if($len == $key) {?> class="no_bottom_border"<?php }?>><?php echo $picture->link ?></td>
                            <td <?php if($len == $key) {?> class="no_bottom_border"<?php }?>><?php echo $picture->sort ?></td>
                            <td class="no_right_border <?php if($len == $key) {?> no_bottom_border<?php }?>">
                                <a href="<?php echo $baseUrl.'admin/picOperate?id='. $picture->id; ?>">
                                    <span class="small_button JsEdit">编辑</span>
                                </a> <span class="small_button JsDelete" data-id="<?php echo $picture->id ?>">删除</span></td>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <div class="nav_page">
                    <?php if($totalPage > 1) { for($i = 1; $i <= $totalPage; $i++) {?>
                        <a href="<?php echo $baseUrl."admin/picture/" .$i; ?>">
                            <div class="page <?php if($page == $i){?> current <?php } ?>"><?php echo $i; ?></div></a>
                    <?php }} ?>
                </div>
            </div>
        </div>
    </div>
<script>
    $(".JsDelete").on('click', function () {
        if (!confirm('确定要删除该图片？')) {
            return false;
        }
        var dataId = $(this).attr('data-id');
        var data = 'id=' + dataId;
        $.ajax({
            'data': data,
            'url': baseUrl + "admin/deletePic",
            'dataType': 'json',
            'type': 'post',
            'success': function (json) {
                 if(json.status == 0) {
                     alert('操作成功！');
                     window.location.reload();
                 }else if(json.status == 1001) {
                     window.location.href = baseUrl + 'adminlogin/index';
                 }else{
                     alert('操作失败，请重试！');
                 }
            }
        });
    })
</script>
<?php include APPPATH .'views/admin/footer.php'?>