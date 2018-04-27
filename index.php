<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/27
 * Time: 14:23
 */
define('PX_PATH','http://'.$_SERVER['HTTP_HOST'].'/');
set_time_limit(0);
error_reporting(0);
require 'Func.php';
$url = $url[0];
$image=$image[1]
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pixiv登录背景图</title>

    <link rel="stylesheet" href="//cdn.staticfile.org/todc-bootstrap/3.3.7-3.3.7/css/bootstrap.min.css">
    <style>
        html, body, #carousel-example-generic, .carousel-inner, .item, .item div { height : 100%; }
        .item { background-color : <?='white'?>; }
        .item div { background-position : center; background-repeat : no-repeat; background-attachment : fixed; }
        .carousel-caption { position : static }
        .carousel-control.left, .carousel-control.right { background : none; }
    </style>
</head>
<body>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner" role="listbox">
        <?php foreach ($image as $k => $v): ?>
            <div class="item <?php if ($k == 0) echo 'active'; ?>">
                <a href="<?= $url[$k] ?>" target="_blank">
                    <div class="carousel-caption" style="background-image: url(<?php echo PX_PATH.$v; ?>)"></div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<script src="//cdn.staticfile.org/jquery/2.2.4/jquery.min.js"></script>
<script src="//cdn.staticfile.org/todc-bootstrap/3.3.7-3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
