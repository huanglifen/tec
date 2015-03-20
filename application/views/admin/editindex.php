<?php include APPPATH .'views/admin/header.php'?>
    <div id="wraper">
        <div id="left">
            <?php $current = 4;?>
            <?php include APPPATH .'views/admin/left.php'?>
        </div>
        <div id="right">
            <div class = 'bread_nav'> 区域列表 </div>
            <?php $rowNum = count($rows) ?>
            <?php if($rowNum >= 10 ) {?>
                <div class="button fr_button" onclick="alert('首页最多有十个区域！')" style="background-color:#B3B8BA">新增区域</div>
            <?php } else { ?>
            <a href="<?php echo $baseUrl ?>admin/addRow"> <div class="button fr_button">新增区域</div></a>
            <?php } ?>
            <div class="page_list">

                <?php foreach($rows as $row) {?>
                <div class="small_page higher">
                   <table class="small_table">
                       <tr>
                           <td width="50px">名称</td>
                           <td class="border_blue_dotted"><?php echo $row->name; ?></td>
                       </tr>
                       <tr>
                           <td>高度</td>
                           <td class="border_blue_dotted"><?php echo $row->height; ?></td>
                       </tr>
                       <tr>
                           <td>排序</td>
                           <td class="border_blue_dotted"><?php echo $row->sort; ?></td>
                       </tr>
                       <tr>
                           <td></td>
                           <td>
                               <a href="<?php echo $baseUrl."admin/editRow/".$row->id; ?>">
                                   <div class="gray_button_small">编辑</div>
                               </a>
                               <div class="gray_button_small JsDelete" style="margin-left:5px;" data-id="<?php echo $row->id ?>">删除</div>
                           </td>
                       </tr>
                   </table>
                </div>

                <?php } ?>
            </div>
        </div>
    </div>
<script>
    $(function() {
        $(".JsDelete").on('click', function() {
            if(confirm('确定删除该区域?')) {
                var id = $(this).attr('data-id');
                var data = 'id='+id;
                $.ajax({
                    'data' : data,
                    'dataType' : 'json',
                    'type' : 'post',
                    'url' : '<?php echo $baseUrl ?>'+'admin/deleteRow',
                    'success' : function(json) {
                        if(json.status == 0){
                            alert('删除成功！');
                            window.location.reload();
                        }else if(json.status == 1001){
                            window.location.href = baseUrl + 'adminlogin/index';
                        }else {
                            alert('删除失败')
                        }
                    }
                })
            }
        })
    })
</script>
<?php include APPPATH .'views/admin/footer.php'?>