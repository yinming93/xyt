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
            exit('程序到此为止吧');       // 打住程序，并说句话。 
        }

        echo '<tr>';

        for($j=1; $j<=$i; $j++){

            echo '<td>'."{$j}x{$i}=".($j*$i).'</td>';

        }

        echo '</tr>';
    }

    echo '</table>';



    echo '1.当你手中抓住一件东西不放时，你只能拥有一件东西，如果肯放手，就有机会选择更多。2.当你对自己诚实的时候，世界上就没有 人能够欺骗得了你。3.因为你不爱我，一切必要的都没必要了；因为我爱你，一切不该原谅的都原谅了。4.我希望躺在向日葵上，即使沮丧，也能朝着阳光。';
