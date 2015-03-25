<?php include APPPATH . 'views/header.php' ?>
    <link href="<?php echo $baseUrl; ?>public/css/page.css" rel="stylesheet"/>
<div id="main">
    <?php foreach($results as $result) { ?>
        <?php
        $replace = '<span class="keyword"> ' . $keyword . '</span>';
        $name = str_replace($keyword, $replace, $result->name);
        $key = str_replace($keyword, $replace, $result->keyword);
        $content = preg_replace('/<.*?>|&nbsp;/','', $result->content);
        $pos = mb_strpos($content, $keyword);
        $start = $pos < 30 ? 0 : $pos - 10;
        $length = mb_strlen($content);
        $total = 200;
        $content = mb_substr($content, $start, $total);
        $content = str_replace($keyword, $replace, $content);
        if($start != 0) {
            $content = "……".$content;
        }
        if($length > $total) {
            $content .="……";
        }
        ?>
    <div class="key_wrap">
        <div><a href="<?php echo $baseUrl.'page/' . $result->id; ?>" target="_blank"><?php echo $name;?></a></div>
        <div class="font_size_12"><?php echo $content; ?></div>
        <div>关键字：<span class="font_size_12"><?php echo $key ?></span></div>
    </div>
    <?php } ?>
    <div class="nav_page">
        <?php if($totalPage > 1) { for($i = 1; $i <= $totalPage; $i++) {?>
            <a href="<?php echo $baseUrl."search/".$i ."?key=".$keyword; ?>"><div class="page <?php if($page == $i){?> current <?php } ?>"><?php echo $i; ?></div></a>
        <?php }} ?>
    </div>
</div>


<?php include APPPATH . 'views/footer.php' ?>