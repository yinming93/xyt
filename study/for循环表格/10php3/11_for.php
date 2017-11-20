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

    /*
    for($i=0; $i<10; $i++){
        echo $i.'<br/>';
    }
     */

    // for循环输出十行十列隔行变色表格
    
    echo '<table width="800" border="1" align="center">';

    echo '<caption>十行十列隔行变色表格</caption>';

    // 输出十行 
    for($i=0; $i<10; $i++){

        /*
        // 隔行变色
        if($i%2==0){
            echo '<tr bgcolor="red">';
        }else{
            echo '<tr bgcolor="blue">';
        }
        */

        // 第二套隔行变色方案
        if($i%2 == 0){
            $color = 'yellow';
        }else{
            $color = 'orange';
        }

        echo '<tr bgcolor="'.$color.'">';

        // 输出十个单元格
        for($j=0; $j<10; $j++){
            echo '<td>'.($i*10+$j).'</td>';
        }

        echo '</tr>';
    }

    echo '</table>';
