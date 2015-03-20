<?php include APPPATH .'views/admin/header.php'?>
    <div id="wraper">
        <div id="left">
            <?php $current = 5;?>
            <?php include APPPATH .'views/admin/left.php'?>
        </div>
        <div id="right">
            <div class = 'bread_nav'> 管理员列表 </div>
            <?php if($admin->hasRight) {?>
            <div><a href="<?php echo $baseUrl ?>admin/addAdmin"> <div class="button fr_button">新增管理员</div></a></div>
            <?php } ?>
            <div class="nav_main" style="margin-top:60px;">
                <table  style="width:600px" class="wrap_table">
                    <?php $len = count($admins) - 1;?>
                    <thead>
                    <th width="50px" <?php if($len == -1) {?> class="no_bottom_border"<?php }?>>
                        编号
                    </th>
                    <th  width="150px"<?php if($len == -1) {?> class="no_bottom_border"<?php }?>>
                        管理员名称
                    </th>
                    <th width="200px"  <?php if($len == -1) {?> class="no_bottom_border"<?php }?>>
                        创建时间
                    </th>
                    <th width="200px"   class="<?php if($len == -1) {?>no_bottom_border<?php }?> no_right_border">
                        状态
                    </th>
                    </thead>
                    <?php foreach($admins as $key => $user) { ?>
                        <?php
                         $statusArr = array(
                             0 => '正常',
                             1 => '注销'
                         );
                        ?>
                        <tr style="line-height: 60px;">
                            <td <?php if($len == $key) {?> class="no_bottom_border"<?php }?>><?php echo $key+1 ?></td>
                            <td <?php if($len == $key) {?> class="no_bottom_border"<?php }?>><?php echo $user->name?></td>
                            <td <?php if($len == $key) {?> class="no_bottom_border"<?php }?>><?php echo $user->time ?></td>
                            <td  class="<?php if($len == $key) {?>no_bottom_border<?php }?> no_right_border" style="text-align:center">
                                <div data-id="<?php echo $user->id ?>"
                                    style="padding:5px 10px; <?php if(!$admin->hasRight || $user->default == 1) { ?>cursor:default; <?php } ?>"
                                     class="<?php if($admin->hasRight && $user->default != 1) {?>JsStatus  button <?php } else { ?>gray_button <?php } ?>">
                                    <?php echo $statusArr[$user->status] ?></div>
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
        $(".JsStatus").on('click', function () {
            var data = 'id=' + $(this).attr('data-id');
            $.ajax({
                'url': baseUrl + 'admin/changeStatus',
                'data': data,
                'dataType': 'json',
                'type': 'post',
                'success': function (json) {
                    if (json.status == 0) {
                        alert('操作成功');
                        window.location.reload();
                    } else if(json.status == 1001){
                        window.location.href = baseUrl + 'adminlogin/index';
                    } else {
                        alert('操作失败，请重试');
                    }
                }
            });
        })
    </script>
<?php include APPPATH .'views/admin/footer.php'?>