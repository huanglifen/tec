<?php include APPPATH .'views/admin/header.php'?>
    <div id="wraper">
        <div id="left">
            <?php $current = 2;?>
            <?php include APPPATH .'views/admin/left.php'?>
        </div>
        <div id="right">
            <div class = 'bread_nav'> 自定义导航栏 </div>
           <a href="<?php echo $baseUrl ?>admin/addNav"> <div class="button fr_button">新增导航</div></a>
            <div class="nav_wrap">
                <div class="nav_top">
                <ul class="nav_type">
                    <li class="nav_page <?php if($type == 1) {?>cur<?php }?>"><a href="<?php echo $baseUrl; ?>admin/nav/1">主导航</a></li>
                    <li class="nav_page <?php if($type == 2) {?>cur<?php }?>"><a href="<?php echo $baseUrl; ?>admin/nav/2">顶部</a></li>
                    <li class="nav_page <?php if($type == 3) {?>cur<?php }?>"><a href="<?php echo $baseUrl; ?>admin/nav/3">底部</a></li>
                </ul>
                </div>
                <div class="nav_main">
                    <?php $len = count($navs) - 1;?>
                    <table class="wrap_table">
                        <thead>
                        <th width="150px" <?php if($len == -1) {?> class="no_bottom_border"<?php }?>>
                            导航名
                        </th>
                        <th style="text-align : left;padding-left : 12px;" <?php if($len == -1) {?> class="no_bottom_border"<?php }?>>
                            链接
                        </th>

                        <th width="150px" <?php if($len == -1) {?> class="no_bottom_border"<?php }?>>
                            导航位置
                        </th>
                        <th width="150px" <?php if($len == -1) {?> class="no_bottom_border"<?php }?>>
                            排序
                        </th>
                        <th width="150px" class="no_right_border <?php if($len == -1) {?> no_bottom_border<?php }?>">操作</th>
                        </thead>

                        <?php foreach($navs as $key => $nav) {?>
                            <?php
                            $positionArr = array(
                                1 => "主导航",
                                2 => "顶部",
                                3 => "底部"
                            );
                            $pos = $positionArr[$nav->type];
                            if(! preg_match('/^(https?:\/\/|www\.).*/', $nav->link)) {
                                $link = $baseUrl . "page/".$nav->link;
                            }else{
                                $link = $nav->link;
                            }
                            ?>
                        <tr data-id = "<?php echo $nav->id; ?>">
                            <td <?php if($len == $key) {?> class="no_bottom_border"<?php }?> ><?php echo $nav->name ?></td>
                            <td <?php if($len == $key) {?> class="no_bottom_border"<?php }?> ><?php echo $link ?></td>
                            <td <?php if($len == $key) {?> class="no_bottom_border"<?php }?> ><?php echo $pos ?></td>
                            <td <?php if($len == $key) {?> class="no_bottom_border"<?php }?> ><?php echo $nav->sort ?></td>
                            <td class="no_right_border <?php if($len == $key) {?> no_bottom_border<?php }?>">
                                <a href="<?php echo $baseUrl.'admin/editNav/'. $nav->id; ?>"><span class="small_button JsEdit">编辑</span></a> <span class="small_button JsDel">删除</span></td>
                        </tr>
                        <?php } ?>
                    </table>

                </div>
                <div class="nav_page">
                <?php if($page > 1) { for($i = 1; $i <= $page; $i++) {?>
                    <a href="<?php echo $baseUrl."admin/nav/".$type."/".$i; ?>"><div class="page <?php if($currentPage == $i){?> current <?php } ?>"><?php echo $i; ?></div></a>
                <?php }} ?>
                </div>
            </div>
        </div>
    </div>
<script>
    $(function() {
      $(".JsDel").on('click', function() {
          if(confirm('确定要删除该导航？')){
              var id = $(this).parents("tr").attr('data-id');

              $.ajax({
                  'type': 'post',
                  'dataType': 'json',
                  'data': "id=" + id,
                  'url' : '<?php echo $baseUrl ?>' + 'admin/delNav',
                  'success': function (json) {
                    if(json.status == 0) {
                        window.location.reload();
                    }else{
                        alert('删除失败，请重试！');
                    }
                  }
              });
          }
      })
    });
</script>
<?php include APPPATH .'views/admin/footer.php'?>