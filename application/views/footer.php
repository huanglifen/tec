<div class="clear_both"></div>
<div class="footer">
    <?php if(count($navs['bottom'])) {foreach($navs['bottom'] as $bottom) { ?>
    <span><a href="<?php echo $bottom->link;?>"><?php echo $bottom->name; ?></a></span>
    <?php }} else { ?>
        <span>版本所有北京华信杰通</a></span>
    <?php } ?>
</div>
</body>
</html>