<!DOCTYPE html>
<?php include(dirname(__DIR__).'/Common/head.php'); ?>
    <link rel="Stylesheet" type="text/css" href="../Public/css/order.css" />
    <script src="../Public/js/order.js"></script>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<body id="main">
<?php include(dirname(__DIR__).'/Common/menu.php'); ?>
<?php include(dirname(__DIR__).'/Common/header.php'); ?>
    <div class="container">
        <b><?php
                    if(isset($messages)){
                        $key=array_search('type',$messages);
                            if($key !=NULL)
                            echo $messages[$key+1];
                    }
                ?></b>
        <b class="info"><?php
                    if(isset($messages)){
                        $key=array_search('info',$messages);
                            if($key !=NULL)
                            echo $messages[$key+1];
                    }
                ?></b>
        
        <label class="custom-file-upload">
            <input type="file"/>
            Choose your file!
        </label>
        <form class="order" action="?page=order" method="POST">
        <b>Enter height (If You want default size leave 0):</b>
        <input type="text" id="heigh" class="enter" name="heigh" placeholder="0.0"/>
        <b>Enter width (If You want default size leave 0):</b>
        <input type="text" id="width" class="enter" name="width" placeholder="0.0"/>
        <b>Choose Infil percentages:</b>
        <div class="box" >
        <select name="infil">
            <option value="10">10%</option>
            <option value="20">20%</option>
            <option value="30">30%</option>
            <option value="40">40%</option>
            <option value="50">50%</option>
            <option value="60">60%</option>
            <option value="70">70%</option>
            <option value="80">80%</option>
            <option value="90">90%</option>
            <option value="100">100%</option>
        </select>
        </div>
        <b>Choose quality:</b>
        <div class="box" >
        <select name="quality">
            <option value="BEST">BEST</option>
            <option value="AVERAGE">AVERAGE</option>
            <option value="LOWEST">LOWEST</option>
            <option value="DRAFT">DRAFT</option>
        </select>
        </div>
        <b>Choose number of parameters:</b>
        <div class="box" >
        <select name="walls">
            <option value="1">ONE</option>
            <option value="2">TWO</option>
            <option value="3">THREE</option>
            <option value="4">FOUR</option>
        </select>
        </div>
        <button class="send" type="submit" name="submit" value="request_order">ORDER<img src="../Public/img/arrow.svg"></button>            
        </form>
    </div>
<?php include(dirname(__DIR__).'/Common/footer.php'); ?>

</body>
</html>