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

    //while

    // 循环的的三要素之一:循环初始值
    $num = 0;

    while( $num < 10 ){ // 循环条件
        
        echo '第'. ( $num+1 ) .'次循环:'. $num .'<br/>';

        $num++;         // 循环增量
    }
