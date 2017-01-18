</body>
</html>
<script type="text/javascript">
    $(".js-sub-btn").bind("click", function(){
        var _this   = $(this);
        var form    = $(this).closest("form");
        var url     = form.prop("action");
        var method  = form.prop("method");
        var data    = form.serialize();
        if (_this.hasClass("submitting")) {
            return false;
        }
        _this.addClass("submitting");
        $.ajax({
            type: method,
            url: url,
            data: data,
            success: function(data){
                if (data.status < 1) {
                    alert(data.info);
                    _this.removeClass("submitting");
                } else {
                    _this.removeClass("submitting");
                    window.location.href = data.url;
                }
            }
         });
    });
    
    $(".js-del-btn").bind("click", function(){
        var url = $(this).attr("data-url");
        if (confirm("确定要删除吗？")) {
            $.ajax({
                type: 'GET',
                url: url,
                data: {},
                success: function(data) {
                    if (data.status < 1) {
                        alert(data.info);
                    } else {
                        window.location.reload();
                    }
                }
            });
        } 
    });
    
    $(".js-btn-back").bind("click", function(){
        console.log("lll");
        history.go(-1);
    });
    
    $(".refresh").bind("click", function(){
       location.reload(); 
    });
</script>