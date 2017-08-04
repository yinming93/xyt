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
    // 0-12 童年
    // 12-18 骚年
    // 18-28 青年
    // 28-40 壮年
    // 40-50 中年
    // 50-60 中老年
    // 60-?  老年
    // if(){}elseif(){}else{}

    $age = empty($_GET['age'])?55:(int)$_GET['age'];

    $age = abs($age);       // 取绝对值

    if( $age <= 12 ){
        echo '童年';
    }elseif($age <= 18){
        echo '骚年';
    }else if( $age <= 28 ){
        echo '青年';
    }elseif( $age <= 40 ){
        echo '壮年';
    }else if( $age <= 50 ){
        echo '中年';
    }elseif( $age <= 60 ){
        echo '中老年';
    }else{
        echo '老年';
    }
