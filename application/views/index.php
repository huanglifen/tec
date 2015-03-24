<?php include APPPATH . 'views/header.php' ?>
    <script type="text/javascript" src="<?php echo $baseUrl; ?>public/js/slides.min.jquery.js"></script>
    <script>
        $(function(){
            $('#slides').slides({
                preload: true,
                preloadImage: baseUrl + 'images/loading.gif',
                play: 5000,
                pause: 2500,
                hoverPause: true,
                animationStart: function(){
                    $('.caption').animate({
                        bottom:-35
                    },100);
                },
                animationComplete: function(current){
                    $('.caption').animate({
                        bottom:0
                    },200);
                }
            });
        });
    </script>
    <div class="index_banner">
        <div id="container">
            <div id="slides">
                <div class="slides_container">
                    <?php if(count($pictures)) {  foreach($pictures as $pic) {?>
                    <div><a href="<?php echo $pic->link ? $pic->link : '#'; ?>" target="_blank">
                            <img src="<?php echo $baseUrl . $path . $pic->path; ?>" width="1000" height="348" alt="<?php echo $pic->name;?>"/>
                        </a>
                    </div>
                    <?php }} else { ?>
                        <div><a href="">
                                <img src="<?php echo $baseUrl; ?>public/images/banner1.jpg" width="1000" height="348"/></a>
                        </div>
                        <div><a href="">
                                <img src="<?php echo $baseUrl; ?>public/images/banner1.jpg" width="1000" height="348"/></a>
                        </div>
                    <?php }?>
                </div>
                <a href="#" class="prev"><img src="<?php echo $baseUrl; ?>public/images/arrow_l.png" width="26"
                                              height="43" alt="Arrow Prev"></a>
                <a href="#" class="next"><img src="<?php echo $baseUrl; ?>public/images/arrow_r.png" width="26"
                                              height="43" alt="Arrow Next"></a>
            </div>

        </div>
    </div>
    <div class="main_wrap">
        <?php foreach($rows as  $cur => $row) { ?>
            <?php $count = $row->column_num; ?>
            <?php if($count) {  $rowWidth = 1000 - 10*($count-1) - 20*$count - 2*$count; $remain = $rowWidth; ?>
        <div class="gs_main">
            <?php foreach($row->columns as $key => $column) { ?>

                        <div class="main_bg" style="height:<?php echo $row->height.'px';?>;<?php if($key == 0) {?>margin-left:0px; <?php } ?><?php if($key != $count-1){ $width=floor(($column->width/$row->width)*$rowWidth); $remain = $remain - $width;?>width:<?php echo $width.'px'; }else { ?>width:<?php echo $remain.'px';}?>">
                <?php echo $column->content; ?>
            </div>
            <?php } ?>
        </div>
        <?php } } ?>
    </div>
<?php include APPPATH . 'views/footer.php' ?>