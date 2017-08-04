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
    
    // 请用while循环输出0-100之间的偶数
    $num = 0;


    while( $num <= 100 ){

        // 排除0
        if( $num !== 0 ){
        
            // 排除奇数
            if( $num % 2 == 0 )
                echo $num.'<br/>';
        }

        $num++;
    }
