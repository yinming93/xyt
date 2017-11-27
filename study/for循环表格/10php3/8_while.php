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

    // 输出十行十列隔行变色表格
    // while双层循环输出十行十列表格，外层循环循环一次，内层循环循环10次。 

    echo '<table width="800" border="1" align="center">';

    echo '<caption>十行十列隔行变色表格</caption>';

    // 初值
    $i=0;

    // 循环条件,在这里，搞定了十行
    while($i<10){

        // 产生颜色
        if( $i % 2 == 0 ){
            $bgcolor = '#ffffff';
        }else{
            $bgcolor = '#abcdef';
        }

        echo '<tr style="background:'.$bgcolor.'">';

        // 内层循环的初值
        $j = 0;

        // 内层循环的条件
        while( $j < 10 ){

            echo '<td>'.($i*10).'</td>';

            // 内层循环的增量
            $j++;
        }

        echo '</tr>';

        // 增量
        $i++;
    }

    echo '</table>';
