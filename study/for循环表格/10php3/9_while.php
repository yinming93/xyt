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
    // 单层循环输出十行十列表格

    $str = '<table width="800" border="1" align="center">';

    $str .= '<caption>单层输入十行十列表格</caption>';

    $i = 0;

    while($i < 100){
        // 输出tr 
        if($i%10 == 0){

            if($i % 20 == 0){
                $bgcolor = '#000000';
            }else{
                $bgcolor = '#ffffff';
            }

            $str .= '<tr style="background:'.$bgcolor.'">';
        }

        $str .= '<td>'.$i.'</td>';


        // 在$i取余10等于9的时候输出</tr>
        if($i % 10 == 9){
            $str .= '</tr>';
        }
    
        $i++;
    }

    $str .= '</table>';


    // 打印表格
    echo $str;
