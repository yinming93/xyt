<?php
    if(!empty($_POST)){
        //接收一下操作数和运算符
        $n1 = $_POST['n1'];
        $n2 = $_POST['n2'];
        $operator = $_POST['operator'];

    }else{

        // 第一次进入页面的时候，没有传递数据，给一些些默认值
        $n1 = 0;
        $n2 = 0;
        $operator = '+';
    }

    
    // 通过多向条件分支结构来选择运算符
    switch($operator){
        case '+':
            $result = $n1 + $n2;
            break;

        case '-':
            $result = $n1 - $n2;
            break;

        case 'x':
            $result = $n1 * $n2;
            break;

        case '/':
            $result = $n1 / $n2;
            break;

        case '%':
            $result = $n1 % $n2;
            break;
    }
    
?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>Index</title>
    </head>
    <body>
        <h3>简单计算器</h3>
        <form action="5_jisuanqi.php" method="post">

            <input type="text" name="n1" value="<?php echo $n1 ?>" /><br/>

            <select name="operator">

                <option <?php echo $operator == '+'?'selected':''; ?> value="+">+</option>
                <option <?php echo $operator == '-'?'selected':''; ?> value="-">-</option>
                <option <?php echo $operator == 'x'?'selected':''; ?> value="x">x</option>
                <option <?php echo $operator == '/'?'selected':''; ?> value="/">/</option>
                <option <?php echo $operator == '%'?'selected':''; ?> value="%">%</option>

            </select><br/>

            <input type="text" name="n2" value="<?php echo $n2 ?>" /><br/>
            
            <input type="submit" value="等于" />


        </form>

        <div style="width:200px;height:200px;border:3px solid orange;text-align:center;font:20px/200px 微软雅黑">

            <?php echo $result; ?>

        </div>
    </body>
</html>
