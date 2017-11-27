<?php
    header("content-type:text/html;charset=utf-8");
    /**
    *  循环
    *   条件为真就重复，条件为假停止重复
    *
    *  while(循环条件){
    *     循环体...
    *  }
    *
    *  布尔型循环
    *
    *  do{
    *
    *  }while();
    *
    *  for(){
    *
    *  }
    **/

    // for()循环
    // 记数型循环

    // 标准型
    for($i=0; $i<10; $i++){
        echo "$i<br/>";
    }
    echo '<hr/>';


    // 变异模式1
    $i=0;
    for(; $i<10; $i++){
        echo "$i<br/>";
    }
    echo '<hr/>';
    
    // 变异模式2
    $i=0;

    for(; $i<10; ){

        echo "$i<br/>";

        $i++;

    }
    echo '<hr/>';

    // 变异模式2
    $i=0;

    for(; ; ){

        if($i>9){
            break;  // 终止循环，进入后续代码
        }

        echo "$i<br/>";

        $i++;

    }
    echo '<hr/>';

