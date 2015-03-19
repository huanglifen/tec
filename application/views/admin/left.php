<ul>
    <li class="setting <?php if($current == 1){echo 'current';}?>">
        <img class="nav_img" src="<?php echo $baseUrl; ?>public/images/admin_set.png">
        <a href="<?php echo $baseUrl ?>admin/index">系统设置 </a>
    </li>
    <li class="custome_nav <?php if($current == 2){echo 'current';}?>" >
        <img class="nav_img" src="<?php echo $baseUrl; ?>public/images/admin_nav.png">
        <a href="<?php echo $baseUrl ?>admin/nav">自定义导航栏</a>
    </li>
    <li class="index_pic <?php if($current == 3){echo 'current';}?>" >
        <img class="nav_img" src="<?php echo $baseUrl; ?>public/images/admin_index.png">
        <a href="<?php echo $baseUrl ?>admin/pic">首页轮播图</a>
    </li>
    <li class="single_page <?php if($current == 4){echo 'current';}?>">
        <img class="nav_img" src="<?php echo $baseUrl; ?>public/images/admin_page.png">
        <a href="<?php echo $baseUrl ?>admin/page">页面管理</a>
    </li>
    <li class="noBottom admin_user <?php if($current == 5){echo 'current';}?>">
        <img class="nav_img" src="<?php echo $baseUrl; ?>public/images/admin_user.png">
        <a href="<?php echo $baseUrl ?>admin/user">管理员设置</a>
    </li>
</ul>