<?php
    header("content-type:text/html;charset=utf-8");
    /**
     * 流程控制
     *  控制程序的走向。
     *
     * 1.顺序结构
     *
     * 2.分支结构
     *  单向条件分支结构
     *    
     *
     *  双向条件分支结构
     *
     *  多向条件分支结构
     *
     *  巢状条件分支结构
     *
     * 3.循环结构
     *  while
     *
     *  do...while
     *
     *  for
     *
     * 4.特殊流程控制语句
     *
     *  continue
     *
     *  break
     *
     *  exit（die）
     **/

    // 多向条件分支结构
    $day = empty($_GET['day'])?1:(int)$_GET['day'];


    // switch...case

    switch($day){
        case 1:
            echo '周一';
            break;
            

        case 2:
            echo '周二';
            break;

        case 3:
            echo '周三';
            break;

        case 4:
            echo '周四';
            break;  // 遇到break 就跳出switch，执行后续代码

        case 5:
            echo '周五';
            break;

        case 6:
            echo '周六';
            break;

        default:
            echo '周日';
    }



    /*
    if($day == 1){
        echo 'Monday';
    }elseif($day == 2){
        echo 'Tuesday';
    }elseif($day == 3){
        echo 'Wednesday';
    }elseif($day == 4){
        echo 'Thursday';    
    }elseif($day == 5){
        echo 'Friday';
    }elseif($day == 6){
        echo 'Saturday';
    }else{
        echo 'Sunday';
    }
     */
