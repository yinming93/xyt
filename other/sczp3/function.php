<?php
    /**
    * 成功跳转函数
     **/

    function success($message='报名成功', $url='', $time=1){
        // 如果用户没有传递url这个参数，就让页面跳回上级地址
        if($url == ''){
            $url = $_SERVER['HTTP_REFERER'];
        }

        echo '<center>';
        // 打印成功信息
        echo $message;
        echo '</center>';

        // 多少秒后跳转到哪个页面
        echo '<meta http-equiv="refresh" content="'.$time.';url='.$url.'"/>';
        exit;
    }

     /**
    * 失败的跳转函数
     **/

    function error($message='操作失败', $url='', $time=1){
        // 如果用户没有传递url这个参数，就让页面跳回上级地址
        if($url == ''){
            $url = $_SERVER['HTTP_REFERER'];
        }

        echo '<center>';
        // 打印失败信息
        echo $message;
        echo '</center>';

        // 多少秒后跳转到哪个页面
        echo '<meta http-equiv="refresh" content="'.$time.';url='.$url.'"/>';
        exit;
    }


    /**
     * 专业执行select的函数
     **/
    function query($sql){
        // 发送SQL语句
        $result = mysql_query($sql);

        // 处理结果集
        if($result && mysql_num_rows($result)>0){

            // 声明一个空数组
            $list = array();

            // 将查询到的记录放置到一个数组中
            while($row = mysql_fetch_assoc($result)){
                $list[] = $row;
            }

            // 查询成功，返回大数组
            return $list;
        }

        // 查询失败返回false
        return false;
    }

/**
     * 专业执行delete insert update的SQL语句的函数
     **/
    function execute($sql){
        // 6.发送SQL
        $result = mysql_query($sql);

        // 7.处理结果集
        if($result && mysql_affected_rows()>0){

            // 执行insert的时候，如果有自增id，则返回自增id
            if(mysql_insert_id()){
                return mysql_insert_id();
            }

            // 执行成功返回真
            return true;
        }else{
            // 执行失败返回假
            return false;
        }
    }


/**
     * 文件上传函数
     * @param string $name  表单中文件上传域的name属性值
     * @param string $save_dir 上传文件的保存目录
     * @return 函数执行成功返回新文件名，上传失败返回false
     **/

    function upload($name='myfile', $save_dir='./uploads/', $allow_type=array('jpg','jpeg','gif','png','doc','xls')){

        // 1.判断错误
        if($_FILES[$name]['error'] > 0){
            return false;
        }

        if($_FILES[$name]['size'] >=10*1024*1024){
            die('文件大小超出限制');
        }


        // 2.如果没有错误，说明可以移动文件了

        // 2.1 判断是不是表单POST过来的文件,如果是则移动
        if(!is_uploaded_file($_FILES[$name]['tmp_name'])){
            return false;
        }

       
        
        // 2.2.1.2 产生一个新文件名
        //获取文件后缀
        $subfix = pathinfo($_FILES[$name]['name']);
        $subfix = $subfix['extension'];

        // 判断文件是不是允许上传的类型，如果不是则返回false
        if(!in_array($subfix, $allow_type)){
            return false;
        }
        // echo $subfix;

        //产生新文件名
        $new_file_name = date('YmdHis').md5(uniqid()).'.'.$subfix;
        //echo $new_file_name;


         // 2.2.1.1 在移动之前，判断用户的保存目录是否存在，不存在则创建之
        //
        // 按年，月，日，在用户指定的目录下产生子目录
        $save_dir =  rtrim($save_dir, '/') .'/';
        $save_dir .= substr($new_file_name, 0, 4).'/';
        $save_dir .= substr($new_file_name, 4, 2).'/';
        $save_dir .= substr($new_file_name, 6, 2).'/';
        //echo $save_dir;
        //exit;

        // 判断目录是否存在，不存在则创建，递归创建
        if(!file_exists($save_dir)){
            // 4 2 1  4 2 1  4 2 1
            // r w x  r w x  r w x
            // User   Group  Other
            mkdir($save_dir, 0777, true);  
        }

        // 产生保存新文件的完整路径
        $file_path = $save_dir . $new_file_name;
        //exit;

        // 2.2.2 如果能够来到这里，说明文件合法，则移动之
        if(
            !move_uploaded_file( $_FILES[$name]['tmp_name'], $file_path)
        ){
            return false;
        }

        // 文件上传成功
        return $new_file_name;
    }




    /**
     * 缩放函数
     * @param string    $img_path   图片路径
     * @param int       $width      缩放后的宽
     * @param int       $height     缩放后的高
     * @return  没有返回值，函数自动保存缩放好的图片
     **/
    function zoom($img_path, $width=200, $height=200){

        // 1.获取图片的后缀
        $suffix = ltrim(strrchr($img_path, '.'),'.');

        if($suffix == 'jpg'){
            $suffix = 'jpeg';
        }

        // 拼接两个函数名
        // 创建图片资源的函数名
        // imagecreatefromjpeg imagecreatefrompng imagecreatefromgif
        $func_resource = 'imagecreatefrom'.$suffix;

        // 保存图片的函数名
        // imagejpeg  imagepng   imagegif
        $func_save = 'image'.$suffix;

        //echo $func_resource.'<br/>';
        //echo $func_save.'<br/>';
        //exit;

        // 获取原图的宽和高
        list($src_w, $src_h)=getimagesize($img_path);
        
        // 直接缩放
        // 打开原图产生资源
        $src =$func_resource($img_path);

        // 创建小图
        $dst = imagecreatetruecolor($width, $height);

        // 专业缩放的函数
        imagecopyresampled($dst, $src, 0,0, 0,0, $width, $height, $src_w, $src_h);


        // 处理缩放后的完整图片路径
        $save_path = dirname($img_path).'/'.$width.'_'.basename($img_path);

        //echo $save_path;
          //  exit;

        // 保存缩放后的图片
        // imagejpeg imagepng imagegif  保存成功返回真，保存失败返回假
        $result = $func_save($dst, $save_path);

        echo '缩放<br/>';

        // 销毁资源
        imagedestroy($src);
        imagedestroy($dst);


        return $result;

    }
