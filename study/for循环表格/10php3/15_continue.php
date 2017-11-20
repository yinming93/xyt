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

    // 双层循环输出9*9乘法表

    echo '<table width="800" border="1" align="center" cellspacing="0">';

    echo '<caption>九九乘法表</caption>';

    for($i=1; $i<=9; $i++){

        if($i==5){
            continue;       // 跳出此次循环，执行下一次循环
        }

        echo '<tr>';

        for($j=1; $j<=$i; $j++){

            echo '<td>'."{$j}x{$i}=".($j*$i).'</td>';

        }

        echo '</tr>';
    }

    echo '</table>';
