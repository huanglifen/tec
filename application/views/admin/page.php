<?php include APPPATH .'views/admin/header.php'?>
    <div id="wraper">
        <div id="left">
            <?php $current = 4;?>
            <?php include APPPATH .'views/admin/left.php'?>
        </div>
        <div id="right">
            <div class = 'bread_nav'> 页面列表 </div>
            <a href="<?php echo $baseUrl ?>admin/addPage"> <div class="button fr_button">新增页面</div></a>
            <div class="nav_page" style="word-break: break-all">
                <?php if($totalPage > 1) { for($i = 1; $i <= $totalPage; $i++) {?>
                    <a href="<?php echo $baseUrl."admin/page/".$i; ?>"><div class="page <?php if($page == $i){?> current <?php } ?>"><?php echo $i; ?></div></a>
                <?php }} ?>
            </div>
            <div class="page_list">
                <div class="small_page page_index" data-id="0">
                   <div class="small_page_name">首页</div>
                    <div class="small_page_alias">index</div>
                    <div class="small_page_operate"><span><a href="<?php echo $baseUrl?>admin/editIndex">编辑</a></span></div>
                </div>
                <?php foreach($pages as $p) { ?>
                <div class="small_page">
                    <div class="small_page_name"><?php echo $p->name; ?></div>
                    <div class="small_page_alias"><?php echo $p->title; ?></div>
                    <div class="small_page_operate"><span><a href="<?php echo $baseUrl.'admin/addpage/'.$p->id?>">编辑</a></span>|
                        <a href="javascript:;"><span class="JsDelete" data-id="<?php echo $p->id;?>">删除</span></a></div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
<script>
    $(function() {
        $(".JsDelete").on('click', function() {
            if(confirm('确定要删除该页面?')) {
                var dataId = $(this).attr('data-id');
                var data = 'id='+dataId;
                $.ajax({
                    'data' : data,
                    'type' : 'post',
                    'dataType' : 'json',
                    'url' : baseUrl+"admin/deletePage",
                    'success' : function(json) {
                        if(json.status == 0) {
                            alert('操作成功！');
                            window.location.reload();
                        }else if(json.status == 1001) {
                            window.location.href = baseUrl + 'adminlogin/index';
                        }else{
                            alert('操作失败！');
                        }
                    }
                })
            }
        })
    })
</script>
<?php include APPPATH .'views/admin/footer.php'?>