<?php include TMPL_PATH . 'Admin/header.php' ?>
<style>
    .clearborder{border-top: none;}
</style>
<div class="definewidth m20">
    <h4><?php echo $dang['name']; ?></h4>
    <h5>待办事项</h5>
    <table class="table">
        <tr height="100">
            <td style="border-top: none;">待处理的在线初评：<?php echo $count['chuping'];?></td>
            <td style="border-top: none;">待处理的实物鉴定：<?php echo $count['jianding'];?></td>
            <td style="border-top: none;">待处理的当品退还：<?php echo $count['tuihai'];?></td>
        </tr>
        <tr  height="100">
            <td style="border-top: none;">待处理的收当放款：<?php echo $count['fangkuan'];?></td>
            <td style="border-top: none;">待处理的续当申请：<?php echo $count['xdapply'];?></td>
            <td style="border-top: none;">待上传的续档凭证：<?php echo $count['xdvoucher'];?></td>
        </tr>
        <tr height="100">
            <td style="border-top: none;">待处理的赎当申请：<?php echo $count['sdapply'];?></td>
            <td style="border-top: none;">昨日绝当品品数量：<?php echo $count['done'];?></td>
            <td style="border-top: none;">待发货订单：<?php echo $count['wait_send'];?></td>
        </tr>
        <tr height="100">
            <td style="border-top: none;">待处理的退款：0</td>
            <td style="border-top: none;"></td>
            <td style="border-top: none;"></td>
        </tr>
    </table>
</div>
<?php include TMPL_PATH . 'Admin/footer.php' ?>