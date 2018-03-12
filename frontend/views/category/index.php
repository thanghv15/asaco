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
                        <label><?=$cate['title'] ?></label>
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
            <div class="span9 product-grid">
                <div class=" clearfix">
                    <?php foreach ($list_product as $key => $value) { ?>
                    <div class="span3 product">

                        <div>
                            <figure>
                                <a href="#"><img src="<?=$base_url.'public/images/image_products/'.$value['image_preset']?>" alt=""></a>
                                <div class="overlay">
                                    
                                    <div class="icon">
                                    <a href="javascript:;" class="fcybox-order" data-id="<?=$value['code'] ?>" title="Đặt Hàng Online">Mua ngay
                                    </a>
                                    </div>
                                </div>
                            </figure>
                            <div class="detail">
                                <span>Giá: <?php 
                                echo number_format($value['sell_price']) . ' đ'. "\n";
                                ?></span>
                                <a href="<?=$base_url.'product/products?prm='.$value['code'] ?>">
                                    <h4><?=$value['title'] ?></h4>
                                </a>
                            </div>
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
   <!-- The Modal -->
    <div id="myModal_order" class="modal_order_cart">

      <!-- Modal content -->
        <div class="modal_order_cart-content">
            <div class="modal_order_cart-header">
                <span class="close close_order_modal fancybox-close"></span>
                <h2>Đặt hàng sản phẩm!</h2>
            </div>
            <div class="modal_order_cart-body">
                <div class="cart cart-order">
                    <div class="cart-l-order">
                        <div class="p-image image_popup_order">
                            
                        </div>
                        <div class="p-name name_product_order">
                            Sofa bán sẵn mã NTX703
                        </div>
                        <div class="p-des">
                            <ul class="l pr-des-featured">
                                <li>Mã sản phẩm: <span class="code_product_order"></span></li>
                                <li>Xuất xứ: <span class="xuat_xu_product_order"></span></li>
                                <li>Bảo hành: <span class="bao_hanh_product_order"></span></li>
                                <li>Màu sắc: <span class="mau_sac_product_order"></span></li>
                                <li>Chất liệu: <span class="chat_lieu_product_order"></span></li>
                                <li>Kích thước: <span class="kich_thuoc_product_order"></span></li></ul>
                            <div class="cl">
                            </div>
                        </div>
                        <div class="cl">
                        </div>
                        <div class="p-price price-draw-large price_product_order">
                            23.500.000 đ
                        </div>
                    </div>
                    <div class="cart-r-order">
                            <h1>
                                Thông tin khách hàng</h1>
                            <div style="height: 15px;">
                            </div>
                            <form action="#" method="post">
                            <ul class="show-cart-order">
                                <li>
                                    <input type="text" placeholder="Họ và tên(*)" name="fullname_order" value="" maxlength="100" required="">
                                </li>
                                <li>
                                    <input type="text" placeholder="Số điện thoại(*)" name="phone_order" value="" maxlength="20" required="">
                                </li>
                                <li>
                                    <input type="text" placeholder="Email(*)" name="email_order" value="" maxlength="100" required="">
                                </li>
                                <li>
                                    <textarea placeholder="Ghi chú khác của quý khách" name="note" rows="5" maxlength="2000"></textarea>
                                </li>
                                <li>
                                    <input type="hidden" name="ProductId" value="11679">
                                    <input type="submit" value="Gửi đơn hàng >>"></li>
                            </ul>
                            </form>
                    </div>
                    <div class="cl">
                    </div>
                </div>
            </div>
            <div class="modal_order_cart-footer">
                
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>
        // Get the modal
        var modal_order = document.getElementById('myModal_order');

        // Get the <span> element that close_order_modals the modal
        var span = document.getElementsByClassName("close_order_modal")[0];


        // When the user clicks the button, open the modal 
        $(".fcybox-order" ).click(function() {
            var code_product = $(this).attr("data-id");
            if (code_product) 
            {
                $.ajax({
                    method: 'POST',
                    url: '<?php echo $base_url ?>product/products/createorder',
                    data: { 'code_product' : code_product},
                    async: true,
                    success: function(result){
                        var data =  JSON.parse(result);
                         $('.name_product_order').empty().html(data[0]['title']);
                         $('.code_product_order').empty().html(data[0]['code']);
                         $('.xuat_xu_product_order').empty().html(data[0]['xuat_xu']);
                         $('.bao_hanh_product_order').empty().html(data[0]['bao_hanh']);
                         $('.mau_sac_product_order').empty().html(data[0]['mau_sac']);
                         $('.chat_lieu_product_order').empty().html(data[0]['chat_lieu']);
                         $('.kich_thuoc_product_order').empty().html(data[0]['kich_thuoc']);
                         $('.image_popup_order').empty().html("<img src='<?=$base_url."public/images/image_products/"?>"+ data[0]['image_preset'] +"' alt='' >");
                         // $('.price_product_order').empty().html(data[0]['sell_price']);
                         console.log(data[0]['sell_price']);
                        var price = parseFloat(data[0]['sell_price']).toFixed(1).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
                        price = (price.substring(0,price.length - 2));
                        $('.price_product_order').empty().html(price + ' đ');
                    }
                });
            }

            modal_order.style.display = "block";
        });
        // When the user clicks on <span> (x), close_order_modal the modal
        $(".close_order_modal" ).click(function() {
              modal_order.style.display = "none";;
        });

        // When the user clicks anywhere outside of the modal, close_order_modal it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal_order.style.display = "none";
            }
        }
    </script>   