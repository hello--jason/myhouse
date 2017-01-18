            </dl>
            <p class="bnt">
                <a href="javascript:void(0);" class="js-btn-step2">提交</a>
            </p>
        </form>
    </div>

</div>

<script>
    khm.use(['defaul'],function(d){});
    
    /*业务类别选择事件*/
    $(".js-i-type").bind("change", function(){
        var id = $(this).val();
        $.ajax({
            type: "GET",
            url: "<?php echo U('Wap/Demand/getHtmlByType');?>",
            data: {typeid:id},
            success: function(redata){
                if (redata.status > 0) {
                    removeNextAll($(".js-i-areas"));
                    $(".js-items").append(redata.html);
                }
            }
        });
    });
    
    /*删除同级以下的所有对象元素*/
    function removeNextAll(object){
        var next = object.next();
        if (next.length > 0) {
            next.remove();
            removeNextAll(object);
        }
    }
    
    $(".js-btn-step2").bind("click", function(){
        var form    = $(this).closest("form");
        var url     = "<?php echo U("Wap/Demand/checkStep2");?>";
        var method  = "POST";
        var data    = form.serialize();
        $.ajax({
            type: method,
            url: url,
            data: data,
            success: function(data){
                if (data.status > 0) {
                    alert(data.info);
                    window.location.href=data.url;
                } else {
                    alert(data.info);
                }
            }
        });
    });
    
    $(".js-i-province").bind("change", function(){
        var id = $(this).val();
        $.ajax({
            type: "get",
            url: "<?php echo U("Wap/Demand/getRegion");?>",
            data: {parentid:id},
            success: function(data){
                if (data.status > 0) {
                    $(".js-i-city").children().remove();
                    $(".js-i-city").append("<option value='0'>请选择</option>");
                    
                    $(".js-i-area").children().remove();
                    $(".js-i-area").append("<option value='0'>请选择</option>");  
                    $.each(data.region, function(i, n){
                        var html = "<option value='"+ n.id +"'>"+ n.short_name +"</option>";
                        $(".js-i-city").append(html);
                    });
                }
            }
        });
    });
    
    $(".js-i-city").bind("change", function(){
        var id = $(this).val();
        $.ajax({
            type: "get",
            url: "<?php echo U("Wap/Demand/getRegion");?>",
            data: {parentid:id},
            success: function(data){
                if (data.status > 0) {
                    $(".js-i-area").children().remove();
                    $(".js-i-area").append("<option value='0'>请选择</option>");                    
                    $.each(data.region, function(i, n){
                        var html = "<option value='"+ n.id +"'>"+ n.short_name +"</option>";
                        $(".js-i-area").append(html);
                    });
                }
            }
        });
    });
</script>
</body>
</html>