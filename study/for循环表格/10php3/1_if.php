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

    // 单向条件分支结构
    // 满足条件就执行结构中的语句，如果不满足条件就不执行。

    // 这个时候，只能控制一个指令
    if( true )
        echo '1.被人误解的时候能微微一笑，素养；2.受委屈的时候能坦然一笑，大度；3.吃亏的时候能开心一笑，豁达；4.无奈的时候能达观一笑，境界；5.危难的时候能泰然一笑，大气；6.被轻蔑的时候能平静一笑，自信；7.失恋的时候能轻轻一笑，洒脱。<br/><br/>';
    

        // 后续代码  
        echo '问：和女朋友吵架了怎么办？！讲道理？错！冷静？大错！和她争执？大错特错！现在告诉你正解答案！！大吼一声！“老子要不是看你漂亮、温柔、善良、可爱、早他妈和你分手了！”霸气又戳中妹子软肋。据不完全统计、用完这一招，妹纸们的生气程度立马骤降80%！！';


        echo '<hr/>';


        // 带花括号的单向条件分支结构
        // 花括号中的代码是一个代码块
        if( true ){
            
            echo '别把我的个性和态度混为一谈，我的个性是源于我是谁，而我的态度则取决于你是谁。<br/><br/>';

            echo ' 一个女人要是不幸聪明得什么都懂，那就必须同时懂得怎么伪装成什么都不懂。女孩子要学会撒娇。<br/><br/>';
        }

        echo '<hr/><br/>';

        // 替代语法
        if( true ):
            echo '从我遇见你的那一天起，我就在心里恳求你，如果生活是一条单行道，就请你从此走在我的前面，让我时时可以看到你；如果生活是一条双行道，就请你让我牵着你的手，穿行在茫茫人海里，永远不会走丢。<br/><br/>';
            echo '将自己的缺点和不足一览无余的展现给对方 两人却还能紧紧相拥 我想 这就是爱情<br/><br/>';
        endif;
