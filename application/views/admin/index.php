<?php include APPPATH .'views/admin/header.php'?>
<div id="wraper">
    <div id="left">
        <?php $current = 1;?>
        <?php include APPPATH .'views/admin/left.php'?>
    </div>
    <div id="right">
        <div class = 'bread_nav'> 系统设置 </div>
        <form action="<?php echo $baseUrl?>admin/set" method="post">
            <table class="admin_setting">
                <thead>
                 <th width="150px">
                     参数名称
                 </th>
                <th class="no_right_border">
                    参数内容
                </th>
                </thead>
                <tr>
                    <td>站点名称</td>
                    <td class="no_right_border">
                        <input type="text" class="input_text long" name="siteName"/>
                    </td>
                </tr>
                <tr >
                    <td>站点标题</td>
                    <td class="no_right_border">
                        <input type="text" class="input_text long" name="siteTitle"/>
                    </td>
                </tr>
                <tr style="height:80px;">
                    <td>站点描述</td>
                    <td class="no_right_border">
                        <textarea class="input_textarea" name="siteDesc"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>站点标志</td>
                    <td class="no_right_border">
                        <input type="file" name="siteLogo"/>
                    </td>
                </tr>
                <tr>
                    <td>公司地址</td>
                    <td class="no_right_border">
                        <input type="text" class="input_text long" name="address"/>
                    </td>
                </tr>
                <tr>
                    <td>客户电话</td>
                    <td class="no_right_border">
                        <input type="text" class="input_text long" name="telephone"/>
                    </td>
                </tr>
                <tr>
                    <td>ICP备案证书号</td>
                    <td class="no_right_border">
                        <input type="text" class="input_text long" name="ICP"/>
                    </td>
                </tr>
                <tr>
                    <td>是否关闭网站</td>
                    <td class="no_right_border">
                        是<input type="radio" name="close" value="1" />
                        否<input type="radio" name="close" value="0"/>
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
<?php include APPPATH .'views/admin/footer.php'?>