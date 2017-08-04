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

    // for循环输出十行十列隔列变色表格
    
    echo '<table width="800" border="1" align="center">';

    echo '<caption>十行十列隔行变色表格</caption>';

    for($i=0; $i<100; $i++){

        // 在0 10 20 30 40 50 60 70 80 90 编号的<td>前输出<tr>
        if( $i%10==0 )
            echo '<tr>';

        if($i%2==0){
            $bgcolor='yellow';
        }else{
            $bgcolor='green';
        }
        echo '<td bgcolor="'.$bgcolor.'">'.$i.'</td>';

        // 在9 19 29 39 49 59 69 79 89 99 编号的</td>后输出</tr>
        if( $i%10==9 )
            echo '</tr>';
    }

    echo '</table>';
