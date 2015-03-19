<?php include APPPATH .'views/admin/header.php'?>
<div id="wraper">
    <div id="left">
        <?php $current = 1;?>
        <?php include APPPATH .'views/admin/left.php'?>
    </div>
    <div id="right">
        <div class = 'bread_nav'> 系统设置 </div>
        <?php
        $siteName =  isset($config['siteName']) ? $config['siteName'] : '';
        $siteTitle = isset($config['siteTitle']) ? $config['siteTitle'] : '';
        $siteDesc =  isset($config['siteDesc']) ? $config['siteDesc'] : '';
        $siteLogo =  isset($config['siteLogo']) ? json_decode($config['siteLogo'], true) : array();
        $address =  isset($config['address']) ? $config['address'] : '';
        $close =  isset($config['close']) ? $config['close'] : '';
        $icp = isset($config['icp']) ? $config['icp'] : '';
        $telephone =  isset($config['telephone']) ? $config['telephone'] : '';

        ?>
        <form action="<?php echo $baseUrl?>admin/setBase" method="post" enctype="multipart/form-data">
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
                        <input type="text" class="input_text long" name="siteName"
                               value="<?php echo $siteName; ?>"
                            />
                    </td>
                </tr>
                <tr >
                    <td>站点标题</td>
                    <td class="no_right_border">
                        <input type="text" class="input_text long" name="siteTitle"
                            value="<?php echo $siteTitle; ?>"
                            />
                    </td>
                </tr>
                <tr style="height:80px;">
                    <td>站点描述</td>
                    <td class="no_right_border">
                        <input type="text" class="input_text long" name="siteDesc"
                            value="<?php echo $siteDesc; ?>"
                            />
                    </td>
                </tr>
                <tr>
                    <td>站点标志</td>
                    <td class="no_right_border">
                        <div style="float:left;margin-top:15px;">
                            <input type="file" name="userfile" size="20" />
                        </div>
                        <div class="success" style="margin-left: 410px;">
                            当前logo：<?php echo $siteLogo['origName']; ?>
                        </div>

                    </td>
                </tr>
                <tr>
                    <td>公司地址</td>
                    <td class="no_right_border">
                        <input type="text" class="input_text long" name="address"
                            value="<?php echo $address ?>"
                            />
                    </td>
                </tr>
                <tr>
                    <td>客户电话</td>
                    <td class="no_right_border">
                        <input type="text" class="input_text long" name="telephone"
                            value="<?php echo $telephone ?>"
                            />
                    </td>
                </tr>
                <tr>
                    <td>ICP备案证书号</td>
                    <td class="no_right_border">
                        <input type="text" class="input_text long" name="ICP"
                            value="<?php echo $icp ?>"
                            />
                    </td>
                </tr>
                <tr>
                    <td>是否关闭网站</td>
                    <td class="no_right_border">
                        是<input type="radio" name="close" value="1" <?php if($close == 1) {echo "checked"; }?>/>
                        否<input type="radio" name="close" value="0" <?php if($close == 0) {echo "checked"; }?>/>
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