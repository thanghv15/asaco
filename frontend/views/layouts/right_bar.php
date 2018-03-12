<?php 
use frontend\components\ComponentBase;
use frontend\modules\danhmuc\models\Danhmuc;

$danhmuc = new Danhmuc();
$cate_list = $danhmuc->get_cate_all();

$components = new ComponentBase();
$base_url = $components->Base_url();

?>
   <div class="span3">
                <div id="sidebar">
                    <div class="widget">
                        <h4>CHUYÊN MỤC</h4>
                            <div id="accordion">
                                <?php foreach ($cate_list as $key => $value) { ?>
                              
                                    <?php $parent = $value[0][0] ?>
                                    <h5><a href="<?= $base_url.'category?prm='. $value[0][8] ?>"><?= $value[0][1] ?></a></h5>
                                    <div>
                                        <ul>
                                            <?php foreach ($value as $key => $value_2) { ?>
                                                <?php if ($value_2[2] == $parent) { ?>
                                                        <li>
                                                            <a href="<?= $base_url.'category?prm='. $value_2[8] ?>"><?= $value_2[1] ?>
                                                            </a>
                                                        </li>
                                                <?php } ?>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                <?php } ?>
                        </div>

                    </div>

                    <div class="widget">
                        <h4>Sản phẩm nội bật</h4>

                        <div class="featured">
                            <ul>
                                <li class="clearfix">
                                    <figure>
                                        <a href="#"><img src="http://placehold.it/50x50" alt=""></a>
                                    </figure>
                                    <div>
                                        <h5>Brown Wood Chair</h5>
                                        <span>$244.00</span>
                                    </div>
                                </li>

                                <li class="clearfix">
                                    <figure>
                                        <a href="#"><img src="http://placehold.it/50x50" alt=""></a>
                                    </figure>
                                    <div>
                                        <h5>Brown Wood Chair</h5>
                                        <span>$244.00</span>
                                    </div>
                                </li>

                                <li class="clearfix last">
                                    <figure>
                                        <a href="#"><img src="http://placehold.it/50x50" alt=""></a>
                                    </figure>
                                    <div>
                                        <h5>Brown Wood Chair</h5>
                                        <span>$244.00</span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>