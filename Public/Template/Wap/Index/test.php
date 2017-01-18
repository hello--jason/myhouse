<!DOCTYPE html>
<html>
    <body>
        <p id="demo">点击这个按钮，获得您的坐标：</p>
        <button onclick="getLocation()">试一下</button>
        <script>
            var x = document.getElementById("demo");
            function getLocation()
            {
                if (navigator.geolocation)
                {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    alert("erroer");
                   
                }
            }
            function showPosition(position)
            {
                alert(position.coords.latitude);
                alert(position.coords.longitude);
            }
        </script>
    </body>
</html>
