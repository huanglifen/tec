<?php include APPPATH .'views/admin/header.php'?>
    <script src="<?php echo $baseUrl; ?>public/js/ueditor/ueditor.config.js" type="text/javascript"></script>
    <script src="<?php echo $baseUrl; ?>public/js/ueditor/ueditor.all.min.js" type="text/javascript"></script>
<script>
    var id = <?php echo $id ?>;
</script>
    <div id="wraper">
        <div id="left">
            <?php $current = 4;?>
            <?php include APPPATH .'views/admin/left.php'?>
        </div>
        <div id="right">
            <div class = 'bread_nav'> 添加页面 </div>
            <?php
            $nameError = isset($error['name']) ? $error['name'] : '';
            $titleError = isset($error['title']) ? $error['title'] : '';
            $keywordError = isset($error['keyword']) ? $error['keyword'] : '';
            $sortError = isset($error['sort']) ? $error['sort'] : '';
            if($id != 0) {
               $name = $page->name;
                $title = $page->title;
                $parentId = $page->parent_id;
                $content = $page->content;
                $keyword = $page->keyword;
                $sort = $page->sort;
                $picture = json_decode($page->picture, true);

                $picture = $picture['origName'];
            }else{
                $name = '';
                $title = '';
                $parentId = '';
                $content = '';
                $keyword = '';
                $sort = '';
                $picture = '';
            }

            ?>
            <form action="<?php echo $baseUrl?>admin/addPageAction" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id ?> "/>
                <table class="admin_setting">
                    <tr>
                        <td width="80px">标题</td>
                        <td class="no_right_border">
                            <div class="flmr10">
                            <input type="text" class="input_text long" name="name"
                                   value="<?php echo $name ?>"
                                />
                            </div>
                            <div class="error"><?php echo $nameError; ?></div>
                        </td>
                    </tr>
                    <tr >
                        <td>上级分类</td>
                        <td class="no_right_border">
                            <select name="parent" class="my_select" id="JsSelect">
                                <option value="0"<?php if($parentId == 0) { ?> selected <?php } ?>>无</option>
                                <?php foreach($parents as $p) { ?>
                                    <option value="<?php echo $p->id ?>" <?php if($parentId == $p->id) { ?>selected<?php } ?>>
                                        <?php echo $p->title ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr style="<?php if($parentId != 0) { ?> display:none;<?php } ?>" id="JsTitleTr">
                        <td>分类标题</td>
                        <td class="no_right_border">
                            <div class="flmr10">
                            <input type="text" class="input_text long" name="title"
                                   value="<?php echo $title ?>"
                                />
                                </div>
                            <div class="error"><?php echo $titleError; ?></div>
                        </td>
                    </tr>
                    <tr style="<?php if($parentId != 0) { ?> display:none;<?php } ?>" id="JsPicTr">
                        <td>封面图</td>
                        <td class="no_right_border">
                            <div style="float:left;margin-top:15px;">
                                <input type="file" name="userfile" size="20" />
                            </div>
                            <div class="success" style="margin-left: 410px;">
                                当前封面图：<?php echo $picture ?>
                            </div>
                        </td>
                    </tr>
                    <tr style="<?php if($parentId == 0) { ?> display:none;<?php } ?>" id="JsSortTr">
                        <td>排序</td>
                        <td class="no_right_border">
                            <div class="flmr10">
                                <input type="text" class="input_text long" name="sort"
                                       value="<?php echo $sort ?>"
                                    />
                            </div>
                            <div class="error"><?php echo $sortError; ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>页面内容</td>
                        <td class="no_right_border">
                            <script id="container" name="content" type="text/plain"  style="width:900px;height:400px;margin-top:10px;margin-bottom:10px;">
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td>关键字</td>
                        <td class="no_right_border">
                            <div class="flmr10">
                            <input type="text" class="input_text long" name="keyword"
                                   value="<?php echo $keyword ?>"
                                />
                                </div>
                            <div class="error"><?php echo $keywordError; ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="no_bottom_border"></td>
                        <td class="no_right_border no_bottom_border">
                            <input type="submit" class="button" value="保存"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
<script>
    $(function () {
        var ue = UE.getEditor('container');
        var content = '<?php echo $content ?>';
        ue.ready(function () {
            ue.setContent(content, false);
        });
        $("#JsSelect").change(function() {
            var val = $(this).val();
            var tr = $("#JsTitleTr");
            var sortTr = $("#JsSortTr");
            var picTr = $("#JsPicTr");
            if(val == 0) {
                tr.show();
                picTr.show();
                sortTr.hide();
            }else{
                tr.hide();
                picTr.hide();
                sortTr.show();
            }
        })
    });
</script>
<?php include APPPATH .'views/admin/footer.php'?>