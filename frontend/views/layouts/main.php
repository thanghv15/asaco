<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\components\ComponentBase;
use frontend\modules\danhmuc\models\Danhmuc;
use backend\modules\users\models\User;
use backend\modules\users\models\Userinfo;
use frontend\modules\banner\models\Banner;

AppAsset::register($this);
$components = new ComponentBase();
$base_url = $components->Base_url();
$base_url_frontend = $components->Base_url_images();

$danhmuc = new Danhmuc();
$cate_list = $danhmuc->get_cate_all();

$model_user = Userinfo::find()->where(['user_id'=> '20'])->all();
// echo "<pre>";
// print_r($model_user);die;
$list_banner_left = Banner::find()->where(['type' => 1])->orderBy(['sort'=>SORT_ASC])->all();
$list_banner_right = Banner::find()->where(['type' => 2])->orderBy(['sort'=>SORT_ASC])->all();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mầm non tuổi hoa</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?=$base_url ?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=$base_url ?>css/site.css">
        <script src="<?=$base_url ?>js/jquery.min.js"></script>
        <script src="<?=$base_url ?>js/bootstrap.min.js"></script>
        <style>
          body {
            margin: 0;
            padding: 0;
            font-size: 12px;
            color: Black;
            font-family: Arial;
            background-image: url(<?=$base_url ?>image/bg_website.jpg);
            background-repeat: repeat-x;
            background-position: top;
        }
            .logo{
                padding-left: 0px;
            }
            .panel-logo{
                width: 262px;
                height: 232px;
            }
            .slice1{
                padding-left: 8px;
            }
            .slice2{
                padding-right: 0px;
            }
        </style>
         <?= Html::csrfMetaTags() ?>
    </head>
    <body>
        <div class="jumbotron">
            <div class="container text-center">
                <h2>Tương lai của con bạn là trách nghiệm của chúng tôi</h2>
            </div>
        </div>
        <nav class="navbar navbar-inverse container">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="<?=$base_url  ?>"><span class="glyphicon glyphicon-home"></span> Trang chủ</a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li><a href="#">Giới thiệu thành viên trường</a></li>
                            <li><a href="#">Ý kiến phản hồi</a></li>
                            <li><a href="#">Liên hệ</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                        
                        </ul>
                    </div>
                </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 margin-top-10 height-max-60" >
                    <div class="col-sm-3 logo">
                        <div class="panel panel-primary panel-logo">
                            <div class="panel-body"><img src="<?=$base_url ?>public/images_logo/logo.png" class="img-responsive image-logo" alt="Image"></div>
                        </div>
                    </div>
                    <div class="col-sm-4 slice1">
                        <div class="panel panel-primary">

                            <div class="panel-body">
                                <?php 
                                    if ($list_banner_left) {
                                        // var_dump($list_banner_left);die;
                                        foreach ($list_banner_left as $key => $value) {
                                        ?>
                                        <img class="mySlides image_menu" src="<?=$base_url ?>public/images/image_banner/<?= $value ['image']?>" class="img-responsive" style="width:100%">
                                        <?php
                                        }
                                    }
                                 ?>
                                <!-- <img class="mySlides image_menu" src="<?=$base_url ?>public/images_banner/banner-3.jpg" class="img-responsive" style="width:100%">
                                <img class="mySlides image_menu" src="<?=$base_url ?>public/images_banner/banner-4.jpg" class="img-responsive" style="width:100%">
                                <img class="mySlides image_menu" src="<?=$base_url ?>public/images_banner/banner-5.jpg" class="img-responsive" style="width:100%">
                                <img class="mySlides image_menu" src="<?=$base_url ?>public/images_banner/banner-6.jpg" class="img-responsive" style="width:100%">
                                <img class="mySlides image_menu" src="<?=$base_url ?>public/images_banner/banner-7.jpg" class="img-responsive" style="width:100%">
                                <img class="mySlides image_menu" src="<?=$base_url ?>public/images_banner/banner-8.jpg" class="img-responsive" style="width:100%">
                                <img class="mySlides image_menu" src="<?=$base_url ?>public/images_banner/banner-9.jpg" class="img-responsive" style="width:100%">
                                <img class="mySlides image_menu" src="<?=$base_url ?>public/images_banner/banner-11.jpg" class="img-responsive" style="width:100%"> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 slice2">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <?php 
                                    if ($list_banner_right) {
                                        // var_dump($list_banner_left);die;
                                        foreach ($list_banner_right as $key => $value) {
                                        ?>
                                        <img class="mySlides_two image_menu" src="<?=$base_url ?>public/images/image_banner/<?= $value ['image']?>" class="img-responsive" style="width:100%">
                                        <?php
                                        }
                                    }
                                 ?>
                                <!-- <img class="mySlides_two image_menu" src="<?=$base_url ?>public/images_banner/banner-12.jpg" class="img-responsive" style="width:100%">
                                <img class="mySlides_two image_menu" src="<?=$base_url ?>public/images_banner/banner-13.jpg" class="img-responsive" style="width:100%">
                                <img class="mySlides_two image_menu" src="<?=$base_url ?>public/images_banner/banner-14.jpg" class="img-responsive" style="width:100%">
                                <img class="mySlides_two image_menu" src="<?=$base_url ?>public/images_banner/banner-15.jpg" class="img-responsive" style="width:100%">
                                <img class="mySlides_two image_menu" src="<?=$base_url ?>public/images_banner/banner-16.jpg" class="img-responsive" style="width:100%">
                                <img class="mySlides_two image_menu" src="<?=$base_url ?>public/images_banner/banner-17.jpg" class="img-responsive" style="width:100%">
                                <img class="mySlides_two image_menu" src="<?=$base_url ?>public/images_banner/banner-18.jpg" class="img-responsive" style="width:100%">
                                <img class="mySlides_two image_menu" src="<?=$base_url ?>public/images_banner/banner-19.jpg" class="img-responsive" style="width:100%"> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <?php foreach ($cate_list as $key => $value) { ?>
                                <div class="col-sm-12 none-padding">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading"><?= $value[0][1] ?></div>
                                        <?php $parent = $value[0][0] ?>
                                            <div class="collapse navbar-collapse" id="">
                                                <ul class="nav navbar-nav menu-left">
                                                    <?php foreach ($value as $key2 => $value_2) { ?>
                                                    <?php if ($value_2[2] == $parent) { 
                                                        ?>
                                                         <li class="active" id="cate"><a href="<?= $base_url ?>danhmuc/danhmuc?prm=<?=$value_2[8] ?>"  class="<?php echo ($value_2[6] == '1') ?  'menu-father-left' :  'menu-child-left'; ?>"><?= $value_2[1] ?></a></li>
                                                            <?php $parent2 = $value_2[0] ?>
                                                   
                                                    <?php } ?>
                                                <?php } ?>
                                                  
                                                </ul>
                                            </div>
                                    </div>
                                </div>
                    <?php } ?>
                </div>
                <div class="col-sm-9">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <?= $content ?>
                        </div>
                           
                    </div>

                </div>
            </div>
        </div>
        <br><br>
        <footer class="container-fluid text-center">
            <form class="form-inline">Đăng kí nhận thông tin
                <input type="email" class="form-control" size="50" placeholder="Email Address">
                <button type="button" class="btn btn-danger">Đăng kí</button>
            </form>
            <div class="container mar-top-10">
            <div class="row">

                <div class="footer clearfix">

                    <div class="col-md-4">
                        <div class="widget">
                            <h4>GIỚI THIỆU</h4>
                            <ul>
                                <li><a href="#">Giới thiệu</a></li>
                                <li><a href="#">Quy chế hoạt động</a></li>
                                <li><a href="#">Chính sách bảo mật</a></li>
                                <li><a href="#">Điều khoản</a></li>
                            </ul>
                        </div>
                    </div>
                   

                    <div class="col-md-4">
                        <div class="widget">
                            <h4>LIÊN HỆ</h4>
                            <ul>
                                <li><?php if($model_user){
                                    echo $model_user[0]['fullname'];
                                } ?></li>
                                <li><?php if($model_user){
                                    echo $model_user[0]['email'];
                                } ?></li>
                                <li><?php if($model_user){
                                    echo $model_user[0]['phone'];
                                } ?></li>
                                <li><?php if($model_user){
                                    echo $model_user[0]['address'];
                                } ?></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <footer class="clearfix">
                   
                    <div class="span2 back-top">
                        <a href="#"> <img src="<?=$base_url ?>image/back.png" alt=""></a>
                    </div>
                </footer>
            </div>
        </div>
        </footer>


        <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
               x[i].style.display = "none";  
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            setTimeout(carousel, 4000); // Change image every 2 seconds
        }
        </script>
        <script>
        var myIndex_two = 0;
        carousel_two();

        function carousel_two() {
            var i;
            var x = document.getElementsByClassName("mySlides_two");
            for (i = 0; i < x.length; i++) {
               x[i].style.display = "none";  
            }
            myIndex_two++;
            if (myIndex_two > x.length) {myIndex_two = 1} 
            x[myIndex_two-1].style.display = "block";  
            setTimeout(carousel_two, 4000); // Change image every 2 seconds
        }
        $("#cate").click(function(){
            $("#cate").css({"background-color":"#06ADBA","color":"white"});
        });
        </script>
    </body>
</html>
