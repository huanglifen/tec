<?php include APPPATH . 'views/admin/header.php' ?>
    <script src="<?php echo $baseUrl; ?>public/js/ueditor/ueditor.config.js" type="text/javascript"></script>
    <script src="<?php echo $baseUrl; ?>public/js/ueditor/ueditor.all.min.js" type="text/javascript"></script>
    <div id="wraper">
        <div id="left">
            <?php $current = 4; ?>
            <?php include APPPATH . 'views/admin/left.php' ?>
        </div>
        <div id="right">
            <div class='bread_nav'> 编辑区域</div>
            <a href="<?php echo $baseUrl ?>admin/editIndex">
                <div class="button fr_button">返回</div>
            </a>

            <div class="wrap">
                <table>
                    <tr>
                        <td width="110px">区域名称</td>
                        <td><input type="text" name="name" class="input_text long low" value="<?php echo $row->name ?>"/></td>
                    </tr>
                    <tr>
                        <td>高度（单位:px）</td>
                        <td><input type="text" name="height" class="input_text long low" value="<?php echo $row->height ?>"/></td>
                    </tr>
                    <tr>
                        <td>排序</td>
                        <td><input type="text" name="sort" class="input_text long low" value="<?php echo $row->sort ?>"/></td>
                    </tr>
                    <tr style="line-height: 60px;">
                        <td></td>
                        <td>
                            <div class="gray_button" id="JsAddColumn">新增子区域</div>
                            <div class="gray_button" style="margin-left:20px;" id="JsSave">保存</div>
                        </td>
                    </tr>
                </table>
                <div class="nav_wrap" style="margin-left:0;margin-top:10px;">
                    <div class="nav_top">
                        <ul class="nav_type">
                            <li class="nav_page cur">编辑子区域</li>
                        </ul>
                    </div>
                </div>
                <div class="column_list" id="JsColumn">
                    <?php foreach($row->columns as $key =>$column) { ?>
                    <div class="column_child "  data-id="<?php echo $key+1 ?>" target-id="<?php echo $column->id;?>">
                        <div class="small_page column JsColumnWrap">
                            <div style="padding-bottom: 10px;font-weight: bold;color:#1f4da0">产品&解决方案</div>
                            <img src="<?php echo $baseUrl; ?>public/images/product_ico1.gif" style="width:35px;margin-left:25px;">
                            <img src="<?php echo $baseUrl; ?>public/images/product_ico2.gif"  style="width:35px;margin-left:25px;">
                        </div>
                        <div class="column_button_wrap JsButtonWrap">
                            <img title="编辑" class="JsEdit" src="<?php echo $baseUrl; ?>public/images/edit.png" style="cursor: pointer;width:20px;margin:5px 33px;">
                            <img title="删除" class="JsDelete" src="<?php echo $baseUrl; ?>public/images/delete.png" style="cursor:pointer;width:20px;margin:5px 0px;">
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div id="JsEditColumnWrap" class="display_none " style="margin-top : 180px;">
                    <table>
                        <tr>
                            <td width="80px">
                                <label>宽度百分比:</label>
                            </td>
                            <td>
                                <input type="text" name="width" class="input_text long low"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>排序:</label>
                            </td>
                            <td>
                                <input type="text" name="childSort" class="input_text long low"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                <label>内容:</label>
                            </td>
                            <td >
                                <script id="container" name="content" type="text/plain"  style="width:500px;height:280px;">
                                </script>
                            </td>
                        </tr>
                        <tr>
                            <td >

                            </td>
                            <td>
                                <div class="gray_button" id="JsSaveCache">暂存</div>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            var ue = UE.getEditor('container');
            var data = {};
            var column = <?php echo $row->column_num ?>;
            var dataObject = {};
            initData();

            function initData() {
                var columns = [];
                var object = $(".column_child");
                <?php foreach($row->columns as $column) { ?>
                var columnId = "<?php echo $column->id; ?>";
                var width = "<?php echo $column->width; ?>";
                var sort = "<?php echo $column->sort; ?>";
                var content = '<?php echo $column->content; ?>';
                var data = {"columnId":columnId, "width" : width, "sort" :sort, "content" : content};
                columns.push(data);
                <?php } ?>

                $.each(columns, function(key, col) {
                    var columnId = col.columnId;
                    var width = col.width;
                    var sort = col.sort;
                    var content = col.content;
                    $.each(object, function(i, item) {
                        var targetId = $(item).attr('target-id');
                        if(targetId == columnId) {
                            $(item).data('width', width);
                            $(item).data('sort', sort);
                            $(item).data('content', content);
                            $(item).data('columnId', columnId);
                        }
                    });
                });

            }

            /**
             * 栏数变更事件
             */
            $("#JsAddColumn").on('click', function() {

                if(column >= 4) {
                    alert('每个区域最多有四个子区域！');
                    return false;
                }
                column++;
                var html = '<div class="column_child" data-id="' + column + '" target-id="0">';
                html += '<div class="small_page column JsColumnWrap" >';
                html += '<div style="padding-bottom: 10px;font-weight: bold;color:#1f4da0">产品&解决方案</div>';
                html += '<img src="<?php echo $baseUrl; ?>public/images/product_ico1.gif" style="width:35px;margin-left:25px;">';
                html += '<img src="<?php echo $baseUrl; ?>public/images/product_ico2.gif"  style="width:35px;margin-left:25px;">';
                html += '</div>';
                html += '<div class="column_button_wrap JsButtonWrap">';
                html += '<img title="编辑" class="JsEdit" src="<?php echo $baseUrl; ?>public/images/edit.png" style="margin:5px 33px;cursor: pointer;width:20px;">';
                html += '<img title="删除" class="JsDelete" src="<?php echo $baseUrl; ?>public/images/delete.png" style="margin:5px 0px;cursor:pointer;width:20px;">';
                html += '</div>';
                html += '</div>';
                $("#JsColumn").append(html);
            });

            /**
             * 删除子区域
             */
            $("#JsColumn").on('click', '.JsDelete', function() {
                if(column == 1) {
                    alert('至少保留一个子区域');
                    return false;
                }
                var that = this;
                var parent = $(this).parents(".column_child");
                if(parent.data('columnId') == $(dataObject).data('columnId')) {
                    dataObject = {};
                    clearEditColumn();
                }
                parent.remove();
                column--;
                var children = $(".column_child");
                $.each(children, function(i,child){
                    $(child).attr('data-id', i+1);
                })
            })

            function clearEditColumn() {
                $("input[name=width]").val('');
                $("input[name=childSort]").val('');

                var content = '';
                ue.setContent(content, false);

                $("#JsEditColumnWrap").hide();
            }

            $("#JsColumn").on('click', '.JsEdit', function() {
                $(".JsColumnWrap").removeClass('border_blue');
                $(".JsButtonWrap").removeClass('border_blue');

                var parents = $(this).parents(".column_child");
                dataObject = parents;

                parents.find(".JsButtonWrap").addClass("border_blue");
                parents.find(".JsColumnWrap").addClass("border_blue");

                $("input[name=width]").val(dataObject.data('width'));
                $("input[name=childSort]").val(dataObject.data('sort'));

                var content = dataObject.data('content') ? dataObject.data('content') : '';
                ue.setContent(content, false);

                $("#JsEditColumnWrap").show();
            })

            $("#JsSaveCache").on('click', function() {
                var width = $("input[name=width]").val();
                var sort = $("input[name=childSort]").val();
                var columnId = $(dataObject).data('columnId') ?  $(dataObject).data('columnId') : 0;
                var reg = new RegExp(/^\d+$/);
                if(! reg.test(width) ||width <= 0 || width > 100) {
                    alert('宽度百分比必须为正整数且不能大于100');
                    return false;
                }else if(! reg.test(sort)|| sort <= 0) {
                    alert('排序值必须为正整数');
                    return false;
                }

                var content = ue.getContent();
                dataObject.data('width', width);
                dataObject.data('sort', sort);
                dataObject.data('content', content);
                dataObject.data('id', columnId);

                $("#JsEditColumnWrap").hide();
            });

            $("#JsSave").on('click', function() {
                var reg = new RegExp(/^\d+$/);

                var name = $("input[name=name]").val();
                var height = $("input[name=height]").val();
                var sort = $("input[name=sort]").val();
                if(! reg.test(height) ||height <= 0) {
                    alert('高度为正整数!');
                    return false;
                }else if(! reg.test(sort)|| sort <= 0) {
                    alert('排序值必须为正整数!');
                    return false;
                }else if(name == '') {
                    alert('请填写区域名称!');return false;
                }

                var childData = [];
                var children = $(".column_child ");
                $.each(children, function(i, item){
                    var width = $(item).data('width') ?  $(item).data('width') : '';
                    var sort = $(item).data('sort') ? $(item).data('sort') : '';
                    var content = $(item).data('content') ?$(item).data('content') : '';
                    var id = $(item).data('columnId') ?$(item).data('columnId') : 0;
                    if(width == '' || sort == '' || content == '') {
                        alert('请填写第' + (i+1) + "个子区域的相关信息");
                        return false;
                    }
                    var arr = {"width":width, "sort":sort, "content":content, 'id' : id};
                    childData.push(arr);
                });

                var data = {'name':name, 'height' : height, 'sort' : sort, 'columns' : childData, 'id' : <?php echo $id ?>};

                $.ajax({
                    'type' : 'post',
                    'dataType' : 'json',
                    'data' : data,
                    'url' : '<?php echo $baseUrl; ?>'+'admin/editRowAction',
                    'success' : function(json) {
                        if(json.status == 0) {
                            alert('操作成功！');
                            window.location.href = baseUrl + 'admin/editIndex';
                        }else if(json.status == 1001) {
                            window.location.href = baseUrl + 'adminlogin/index';
                        }else {
                            alert('操作失败，请重试！');
                        }

                    }
                });
            })

        })
    </script>
<?php include APPPATH . 'views/admin/footer.php' ?>