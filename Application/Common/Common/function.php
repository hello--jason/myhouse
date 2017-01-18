<?php

    function sendMail($to, $title, $content) {
        
        include_once MY_COMMON_PATH."Library/PHPMailer/PHPMailerAutoload.php";
        
        //实例化
        $mail = new \PHPMailer(); 
        
        // 启用SMTP
        $mail->IsSMTP();
        
        //smtp服务器的名称（这里以QQ邮箱为例）
        $mail->Host         = C('MAIL_HOST');
        
        //启用smtp认证
        $mail->SMTPAuth     = C('MAIL_SMTPAUTH');
        
        //你的邮箱名
        $mail->Username     = C('MAIL_USERNAME'); 
        
        //邮箱密码
        $mail->Password     = C('MAIL_PASSWORD');
        
        //发件人地址（也就是你的邮箱地址）
        $mail->From         = C('MAIL_FROM');
        
        //发件人姓名
        $mail->FromName     = C('MAIL_FROMNAME');       
        $mail->AddAddress($to,"尊敬的客户");
        
        //设置每行字符长度
        $mail->WordWrap     = 50;
        
        // 是否HTML格式邮件
        $mail->IsHTML(C('MAIL_ISHTML'));
        
        //设置邮件编码
        $mail->CharSet      = C('MAIL_CHARSET');
        
        //邮件主题
        $mail->Subject      = $title;
        
        //邮件内容
        $mail->Body         = $content;
        
        //邮件正文不支持HTML的备用显示
        $mail->AltBody      = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; 
        
        $mail->SMTPDebug    = 0;
        return($mail->Send());
    }
    
    function isMobile($mobile){
        $pattern = "/^1[34578]\d{9}$/";
        if (preg_match($pattern, $mobile)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function isEmail($email){
        $pattern = "/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/";
        if (preg_match($pattern, $email)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function isWebSite($url) {        
        $pattern = "/(http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&amp;:/~\+#]*[\w\-\@?^=%&amp;/~\+#])?/";
        if (preg_match($pattern, $email)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function sendMobile($mobile, $content){
        $data               = array();        
        $data['OperID']     = "batezichan";
        $data['OperPass']   = "NjJZBR5n";
        $data['DesMobile']  = $mobile;
        $data['Content']    = mb_convert_encoding($content, "gbk", "utf-8");
        $data['ContentType']= 8;
        $url                = "http://221.179.180.158:9007/QxtSms/QxtFirewall?";
        $uri                = http_build_query($data);
        $url               .= $uri;
        $result         = file_get_contents($url);
        $result         = xml2array($result); 
            
        
        if (is_array($result)) {
            if (in_array($result['code'], array("03", "01"))) {
                return array_merge(array("status"=>1, "info"=>"发送成功"), $result);
            } else {
                return array_merge(array("status"=>-1, "info"=>"发送失败"), $result);
            }
        } else {
            return array("status"=>-1001, "info"=>"请求失败");
        }
    }
    
    function sendMobileMult($mobiles, $content){
        if (empty($mobiles) || !is_array($mobiles)) {
            return array("status"=>-1001, "info"=>"手机号码不能为空");
        }
        
        foreach ($mobiles as $k=>$v) {
            if (!isMobile($v)) {
                unset($mobiles[$k]);
            }
        }
        
        if (empty($mobiles)) {
            return array("status"=>-1002, "info"=>"手机号码不能为空");
        }
        
        $array  = array_change_key_case($mobiles, 200);
        $return = array();
        $failed = array();
        foreach ($array as $k=>$v) {
            $string             = implode(",", $v);
            $data               = array();        
            $data['OperID']     = "hejins4";
            $data['OperPass']   = "YRqGMnxM";
            $data['DesMobile']  = $string;
            $data['Content']    = mb_convert_encoding($content, "gbk", "utf-8");
            $data['ContentType']= 8;
            $url                = "http://221.179.180.158:9007/QxtSms/QxtFirewall?";
            $uri                = http_build_query($data);
            $url               .= $uri;
            $result             = file_get_contents($url);
            $result             = xml2array($result);
            if (is_array($result)) {
                if (!in_array($result['code'], array("03", "01"))) {
                    $failed = array_merge($failed, $v);
                }
            } else {
                $failed = array_merge($failed, $v);
            }
        }
        
        return array("status"=>1, "failed"=>$failed);
    }
    
    function sendMobileMessages(){
        $data = array();
        $data['01'] = "批量短信提交成功";
        $data['02'] = "IP限制";
        $data['03'] = "单条短信提交成功";
        $data['04'] = "用户名错误";
        $data['05'] = "密码错误";
        $data['07'] = "发送时间错误";
        $data['08'] = "信息内容为黑内容";
        $data['09'] = "该用户的该内容 受同天内，内容不能重复发 限制";
        $data['10'] = "扩展号错误";
        $data['97'] = "短信参数有误";
        $data['11'] = "余额不足";
        $data['-1'] = "程序异常";
    }
    
    function excelToArrary($filename,$encode='utf-8') {
        if (!file_exists($filename)) {
            return array("文件不存在");
        }
        $result     = pathinfo($filename);
        $extension  = $result['extension'];
        include_once MY_COMMON_PATH."Library/PHPExcel/PHPExcel.php";
        if ($extension == "xls") {
            $objReader = PHPExcel_IOFactory::createReader("Excel5");
        } else if ($extension == "xlsx"){
            $objReader = PHPExcel_IOFactory::createReader("Excel2007");
        }

        $objReader->setReadDataOnly(true);

        $objPHPExcel        = $objReader->load($filename);

        $objWorksheet       = $objPHPExcel->getActiveSheet();

        $highestRow         = $objWorksheet->getHighestRow();
        
        $highestColumn      = $objWorksheet->getHighestColumn();
        
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
        
        $excelData = array();
        
        for ($row = 1; $row <= $highestRow; $row++) {
            for ($col = 0; $col < $highestColumnIndex; $col++) {
                $excelData[$row][] = (string) $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
            }
        }
        return $excelData;
    }

    /**
    * @brief   xml2array   XML转数组
    * @Param   $xml        xml字符串
    * @Returns Array
    */ 
   function xml2array($xml) {
       $result = array();
       $xml    = trim($xml);
       if (empty($xml)) {
           return $result;
       }

       $result = @simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
       if (!$result) {
           return array();
       }
       $result = json_decode(json_encode((Array)$result), true);

       return $result;
   }
   
   function createQrcode($value, $dir = ""){
        include_once MY_COMMON_PATH."Library/PHPQrcode/phpqrcode.php";
        
        // 纠错级别：L、M、Q、H
        $level  = 'H';
        
        // 点的大小：1到10,用于手机端4就可以了
        $size   = 6;
        
        // 下面注释了把二维码图片保存到本地的代码,如果要保存图片,用$fileName替换第二个参数false
        if (is_dir($dir)) {
            $name       = date("ymdHis").rand(100000,999999).".png";
            $filename   = $dir.$name;
            QRcode::png($value, $filename, $level, $size);
        } else {
            QRcode::png($value, false, $level, $size);
        }
   }
   
   function loadConfig($filename){
       $file = APP_PATH."Common/Conf/".$filename.".php";
       if (file_exists($file)) {
           return include_once $file;
       }
       
       return array();
   }
   
   function contentReplace($content, $params){
       if (empty($params) || !is_array($params)) {
           return $content;
       }
       
       foreach ($params as $k=>$v) {
           $content = str_replace("<##{$k}##>", $v, $content);
       }
       
       return $content;
   }
   
   function sendSystemMessage($uid, $titel, $content, $send_type = 1){
       $data = array();
       $data['type']        = 0;
       $data['uid']         = intval($uid);
       $data['title']       = trim($titel);
       $data['content']     = trim($content);
       $data['send_type']   = intval($send_type);
       $data['sendtime']    = time();
       $data['addtime']     = time();
       
       $userMessage         = new \Common\Model\UserMessageModel();
       $userMessage->create($data);
       $result = $userMessage->add();
   }
   
   /**
    * 创建缩略图
    * @param string $original       原图地址
    * @param type $width            缩略图宽度
    * @param type $height           缩略图高度
    * @return string                缩略图地址
    */
   function thumb($original, $width, $height){
        if (empty($original)) {
            return "";
        }
        
        $original   = ".".$original;
        $width      = intval($width);
        $height     = intval($height);
        
        if (!file_exists($original)) {
            return "";
        }
        
        if ($width <= 0 || $height <= 0) {
            return "";
        }
        
        $info       = pathinfo($original);
        $new        = $info['dirname']. DIRECTORY_SEPARATOR .$info['filename']."_{$width}x{$height}.".$info['extension'];
        
        if (!file_exists($new)) {
            $image = new \Think\Image(); 
            $image->open($original);
            $image->thumb($width, $height, $image::IMAGE_THUMB_FIXED)->save($new);
        }
        
        return trim($new, ".");
   }
   
   function runlog($filename, $content){
       $date        = date("Y-m-d", time());
       $datetime    = date("Y-m-d H:i:s");
       $dir         = APP_PATH."Runtime/Logs/RunLog/";
       if (!is_dir($dir)) {
           mkDirs($dir);
       }
       $file        = "{$dir}{$filename}{$date}.log";
       
       $url         = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
       $text        = "{$datetime}\t{$url}\t日志内容：{$content}\n";
       file_put_contents($file, $text, FILE_APPEND);
   }
   
   function mkDirs($dir){
        if(!is_dir($dir)){
            if(!mkDirs(dirname($dir))){
                return false;
            }
            if(!mkdir($dir,0777)){
                return false;
            }
        }
        return true;
    }
    
    function isChinese($string){
        if (preg_match('/^[\x{4e00}-\x{9fa5}]+$/u', $string)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function getLocation(){
        $ip     = get_client_ip();
        $ak     = "C735ed6edfdaf2c2e5028ead02b8a760";
        if ($ip == '127.0.0.1') {
            $ip  = "117.25.163.202";
        }
        $url = "http://api.map.baidu.com/location/ip?ak=C735ed6edfdaf2c2e5028ead02b8a760&ip=$ip&coor=bd09ll";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        if(curl_errno($ch)) { 
            echo 'CURL ERROR Code: '.curl_errno($ch).', reason: '.curl_error($ch);
        }
        curl_close($ch);
        $info = json_decode($output, true);
        if (!empty($info['content']) && !empty($info['content']['address_detail'])) {
            $point = $info['content']['point'];
        }
//        
//        $point['y']="24.486527";
//        $point['x']="118.071925";
//        $point = googleConverToBaidu($point);
//        //$url    = "http://api.map.baidu.com/geocoder/v2/?callback=renderReverse&location={$point['longitude']},{$point['latitude']}&output=xml&ak={$ak}";
//        $url    = "http://api.map.baidu.com/geocoder/v2/?callback=renderReverse&location={$point['latitude']},{$point['longitude']}&output=xml&ak={$ak}";
////        echo $url;die;
        $url    = "http://api.map.baidu.com/geocoder/v2/?callback=renderReverse&location={$point['y']},{$point['x']}&output=xml&ak={$ak}";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        if(curl_errno($ch)) { 
            echo 'CURL ERROR Code: '.curl_errno($ch).', reason: '.curl_error($ch);
        }
        curl_close($ch);
        $info = xml2array($output);
   
        //省份
        $province   = "";
        
        //城市
        $city       = "";
        
        //地区
        $area       = "";
        
        if (!empty($info['result']) && !empty($info['result']['addressComponent'])) {
            $detail = $info['result']['addressComponent'];
            
            if (!empty($detail['province'])) {
                $province = $detail['province'];
            }
            
            if (!empty($detail['city'])) {
                $city = $detail['city'];
            }
            
            if (!empty($detail['district'])) {
                $area = $detail['district'];
            }
        }
        
        $regionModel= new \Common\Model\RegionModel();
        
        $province   = $regionModel->where("name='{$province}' || short_name='{$province}'")->find();
        
        $city       = $regionModel->where("parentid = '{$province['id']}' AND (name='{$city}' || short_name='{$city}')")->find();
        
        $area       = $regionModel->where("parentid = '{$city['id']}' AND (name='{$area}' || short_name='{$area}')")->find();
        
        if (!empty($province) && !empty($city)) {
            return array("province"=>$province, "city"=>$city, "area"=>$area);
        }
        
        return array();
    }
    
    /**
     * 谷歌坐标转百度坐标
     * @param type $lng 纬度
     * @param type $lat 经度
     */
    function googleToBd($lng = 0, $lat = 0) {
        if (!is_numeric($lng) || !is_numeric($lat)) {
            return array('lat' => 0, 'lng' => 0);
        }
        
        if (!$lng || !$lat || $lng > 1000 || $lat > 1000) {
            $res = array('lat' => 0, 'lng' => 0);
        } else {
            include_once '../model/MHotel.php';
            $jiudianmodel = new Jd\Model\MHotel();
            $arr = array($lng, $lat);
            $position = $jiudianmodel->googleConverToBaidu($arr);
            $res = array('lat' => $position['latitude'], 'lng' => $position['longitude']);
        }
        
        if ($inajax) {
            exit(json_encode($res));
        }
        return $res;
    }
    
    function googleConverToBaidu($arr) {
        $str  = implode(',', $arr);
        $ak     = "C735ed6edfdaf2c2e5028ead02b8a760";
        $url = "http://api.map.baidu.com/geoconv/v1/?coords={$str}&ak={$ak}&from=3&to=5&output=json";
        $info = file_get_contents($url);        
        $res = json_decode($info, true);         
        if ($res['status'] == 0) {
            $data = array(
                'longitude' => $res['result'][0]['x'],
                'latitude'  => $res['result'][0]['y'],
            );
           
             
            return $data;
        } else {
            return array();
        }
    }
    