<?php include APPPATH . 'views/header.php' ?>
    <link href="<?php echo $baseUrl; ?>public/css/page.css" rel="stylesheet"/>
    <div id="main">
    <div class="left">
    <div class="menu">
    <div class="ico_right"></div>
    <div class="menu_list">
    <div class="big_title">
        <?php echo $pageInfo['parent']->title; ?>
    </div>
        <div class="clear_both"></div>
<?php $count = count($pageInfo['siblings']); if ($count) { ?>
    <ul class="menu_list_ul">
        <li <?php if($pageInfo['page']->id == $pageInfo['parent']->id) {?>class="on"<?php } ?>>
            <a href="<?php echo $baseUrl .'page/'.$pageInfo['parent']->id . '?nav='.$navId?>"><?php echo $pageInfo['parent']->name; ?></a>
        </li>
        <?php foreach ($pageInfo['siblings'] as $key => $sibling) { ?>
            <li <?php if($pageInfo['page']->id == $sibling->id) {?>class="on"<?php } ?>>
              <a href="<?php echo $baseUrl .'page/'.$sibling->id . '?nav='.$navId?>"> <?php echo $sibling->name; ?></a>
            </li>
        <?php } ?>
    </ul>
    <?php } ?>
    </div>
    </div>
    <div class="cover">
        <?php if($pageInfo['parent']->picture) {
            $picture = json_decode($pageInfo['parent']->picture, true);
            $picture = $picture['fileName'];
            ?>
            <img src="<?php echo $baseUrl . $path . $picture;?>" width="229px"/>
        <?php } ?>
    </div>
    </div>
    <div class="page_content"><?php echo $pageInfo['page']->content; ?></div>

    </div>
    <?php include APPPATH . 'views/footer.php' ?>