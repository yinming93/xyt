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

    // do...while();
    // 不管是否满足循环条件，都执行一次。

    //初值
    $i=0;

    do{
        echo $i.'--haha<br/>';
        $i++;   // 增量
    }while($i<10);   // 循环条件
