<!-- BAR -->
<div class="bar-wrap">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="title-bar">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="span12">
                <div class="sorting-bar clearfix">
                    <div>
                        <label>Các Chương trình khuyến mãi</label>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- BAR -->

<!-- PRODUCT-OFFER -->
<div class="product_wrap">

    <div class="container">
        <div class="row">
            <div class="span9">
                <div class=" product-list clearfix">
                    <?php 
                    foreach ($list_saleoff as $key => $value) { ?>
                        <div class="product clearfix">
                            <figure>
                                <a href="<?=$base_url.'saleoff/listsale?prm='.$value['code'] ?>">
                                    <?php if ($value['image']) { ?>
                                        <img src="<?= $base_url ?>public/images/saleoff/<?= $value['image']?>" alt="">
                                    <?php }else{ ?>
                                        <img src="http://placehold.it/270x186" alt="">
                                    <?php } ?>
                                </a>
                            </figure>
                            <div class="detail">
                                <h4><?= $value['name'] ?></h4>
                                <span>Giảm giá : <?= $value['value'] ?>%</span>
                                <p>
                                    <?= $value['description'] ?>
                                </p>
                                <a href="<?=$base_url.'saleoff/listsale?prm='.$value['code'] ?>">
                                    <button class="btn btn-primmary">Xem chi tiết</button>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                    
                </div>

                <div class="pagination clearfix">
                    <p>Items 1 to 9 of 12 total</p>
                    <ul class="clearfix">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">></a></li>
                    </ul>
                </div>
            </div>

            <!-- RIGHT_BAR -->
            
            <?= $this->render('../layouts/right_bar', [
            ]) ?>
        </div>
    </div>
</div>
<!-- PRODUCT-OFFER -->
