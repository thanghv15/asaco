 <!-- BAR -->
<div class="bar-wrap">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="title-bar">
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
                <div class="single clearfix">
                    <div class="wrap span5">
                       
                        <?php if ($model_image) { ?> 
                            <div id="carousel-wrapper">
                                <div id="carousel" class="cool-carousel">
                                    <?php foreach ($model_image as $key => $value) { ?>
                                        <span id="image<?=$key ?>"><img src="<?= $base_url ?>public/images/image_products/<?=$value['link_image'] ?>" alt=""/></span>
                                    <?php } ?>
                                </div>
                                <a href="#" class="prev"></a><a href="#" class="next"></a>
                            </div>
                        
                            <div class="bottom">
                                <div id="thumbs-wrapper">
                                    <div id="thumbs">
                                        <?php foreach ($model_image as $key => $value) { ?>
                                            <a href="#image<?=$key ?>" class=""><img src="<?= $base_url ?>public/images/image_products/<?=$value['link_image'] ?>"  alt="" /></a>
                                        <?php } ?>
                                    </div>
                                    <a id="prev" href="#"></a>
                                    <a id="next" href="#"></a>
                                </div>
                            </div>
                        <?php }else{ ?>
                            <div id="carousel-wrapper">
                                <div id="carousel" class="cool-carousel">
                                    <span id="image1"><img src="http://placehold.it/470x311" alt=""/></span>
                                    <span id="image2"><img src="http://placehold.it/470x312" alt="" /></span>
                                    <span id="image3"><img src="http://placehold.it/470x311" alt="" /></span>
                                    <span id="image4"><img src="http://placehold.it/470x311" alt=""/></span>
                                    <span id="image5"><img src="http://placehold.it/470x311" alt=""/></span>
                                    <span id="image6"><img src="http://placehold.it/470x311" alt="" /></span>
                                    <span id="image7"><img src="http://placehold.it/470x311" alt="" /></span>
                                    <span id="image8"><img src="http://placehold.it/470x311" alt=""/></span>
                                </div>
                                <a href="#" class="prev"></a><a href="#" class="next"></a>
                            </div>
                        
                            <div class="bottom">
                                <div id="thumbs-wrapper">
                                    <div id="thumbs">
                                        <a href="#image1" class="selected"><img src="http://placehold.it/97x60"  alt="" /></a>
                                        <a href="#image2"><img src="http://placehold.it/97x60" alt="" /></a>
                                        <a href="#image3"><img src="http://placehold.it/97x60" alt=""/></a>
                                        <a href="#image4"><img src="http://placehold.it/97x60" alt=""/></a>
                                        <a href="#image5"><img src="http://placehold.it/97x60"  alt=""/></a>
                                        <a href="#image6"><img src="http://placehold.it/97x60"  alt=""/></a>
                                        <a href="#image7"><img src="http://placehold.it/97x60" alt=""/></a>
                                        <a href="#image8"><img src="http://placehold.it/97x60" alt=""/></a>
                                    </div>
                                    <a id="prev" href="#"></a>
                                    <a id="next" href="#"></a>
                                </div>
                            </div>
                        <?php } ?>
                        
                    </div>

                    <div class="span4">
                        <div class="product-detail">
                            <h4><?= $model['title'] ?></h4>
                            <span>Giá: <?php 
                                echo number_format($model['sell_price']) . 'đ'. "\n";
                                ?></span>
                            <ul class="l pr-des-featured pr-des-featured-order w-pd-des">
                                <li>Mã sản phẩm: <?= $model['code'] ?></li>
                                <li>Xuất xứ: <?= $model['xuat_xu'] ?></li>
                                <li>Bảo hành: <?= $model['bao_hanh'] ?></li>
                                <li>Màu sắc: <?= $model['mau_sac'] ?></li>
                                <li>Chất liệu: <?= $model['chat_lieu'] ?></li>
                                <li>Kích thước: <?= $model['kich_thuoc'] ?></li>
                            </ul>
                        </div>
                        <div class="pd-specialoffer">
                            <div class="pd-specialoffer-banner">
                                <ul class="l banner-by">
                                    <li>
                                        
                                        <div style="width: 380; height: 100px;" id="map_order_prd"></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="buttons">
                            <!-- <a href="#" class="wish big-button">Add to Wishlist</a>
                            <a href="#" class="cart big-button">Add to Cart</a>
                            <a href="#" class="compare big-button">Add to Compare</a> -->
                            <a href="javascript:;" class="pd-orders-cart fcybox-order" data-id="<?= $model['code'] ?>" title="Đặt Hàng Online">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="product_tabs">
                    <ul class="clearfix">
                        <li><a href="#tabs-1">Chi tiết sản phẩm</a></li>
                        <li><a href="#tabs-2">Chính sách bảo hành</a></li>
                        <li><a href="#tabs-3">Hướng dẫn mua hàng</a></li>
                    </ul>
                    <!--TABS-->
                    <div id="tabs-1" class="tab" >
                        <?= $model['description'] ?>
                    </div>

                    <div id="tabs-2" class="tab" >
                        <div>
                        <p>Thời hạn bảo hành được tính kể từ ngày mua hàng được quy định rõ trên phiếu bảo hành. Đối với những bộ ghế sofa được Nội Thất Xinh áp dụng bảo hành:&nbsp;</p>

                        <ul style="line-height: 20px;color: #646464;margin-left:40px;">
                            <li><strong>Khung gỗ</strong>: Nội Thất Xinh sử dụng khung gỗ Sồi cứng, khỏe, chắc chắn, thời gian bảo hành khung <span style="color:#FF0000"><strong>10&nbsp;năm</strong></span>&nbsp;</li>
                            <li><strong>Chất liệu</strong>: Chất liệu tốt được Nội Thất Xinh đưa vào cải tiến da Malaysia, da American, da Thái được bảo hành <span style="color:#FF0000"><strong>3&nbsp;năm</strong></span>. Đặc biệt dòng&nbsp;da Microfiber,&nbsp;Da Thật được bảo hành <span style="color:#FF0000"><strong>5 năm</strong></span>.&nbsp;Nói "KHÔNG" với các vật liệu kém chất lượng, giá rẻ như da Nhật, da Hàn, da Indonesia.&nbsp;</li>
                            <li><strong>Đệm mút</strong> : Mút cao cấp bảo hành <span style="color:#FF0000"><strong>5 năm</strong></span>.&nbsp;</li>
                        </ul>

                        <p><span style="color:#FF8C00"><strong>Những trường hợp không được bảo hành hoặc phát sinh phí bảo hành</strong></span></p>

                        <p>- Quá thời gian bảo hành.&nbsp;&nbsp;</p>

                        <p>- Phiếu bảo hành bị rách, hay bị sửa đổi .&nbsp;&nbsp;</p>

                        <p>- Khách hàng tự ý can thiệp sửa chữa sản phẩm hoặc đã sửa chữa sản phẩm tại đơn vị khác.&nbsp;&nbsp;</p>

                        <p>- Sản phẩm bị hư hỏng do lỗi người sử dụng, và lỗi hư không nằm trong phạm vi bảo hành.&nbsp;&nbsp;</p>

                        <p>Lưu ý: Tất cả ghế sofa của Nội Thất Xinh đều nằm trong danh sách sản phẩm độc quyền với chất liệu tốt và thiết kế đẹp, cấu tạo đặc biệt, chất lượng cực tốt của Nội Thất Xinh. Trên thị trường có thể xuất hiện nhiều sản phẩm giá rẻ, được gia công và copy hình ảnh của chúng tôi. Chính vì thế, hãy là người tiêu dùng thông minh khi lựa chọn sản phẩm phù hợp với bạn.</p>
                        </div>
                    </div>

                    <div id="tabs-3" class="tab" >
                        <div class="w-detail-content w-pd-info-content" style="">
                            <p style="text-align:justify"><span style="font-size:16px"><span style="color:#FFA500"><span style="font-family:arial,helvetica,sans-serif"><strong>Khi đặt mua hàng tại Nội Thất Xinh bạn có thể lựa chọn các hình thức dưới đây:</strong></span></span></span></p>

                        <p style="text-align:justify"><span style="font-size:18px"><strong><span style="font-family:arial,helvetica,sans-serif">1. Đặt hàng trực tiếp tại showroom</span></strong></span></p>

                        <p style="text-align:justify"><span style="font-size:16px"><span style="font-family:arial,helvetica,sans-serif">Hình thức đặt hàng trực tiếp luôn được khách hàng lựa chọn hàng đầu khi đến với Nội Thất Xinh, đây chính là cách đặt hàng nhanh chóng, thuận tiện trong việc vừa nhận hỗ trợ tư vấn, vừa được trực tiếp tìm hiểu các gói dịch vụ chăm sóc khách hàng tốt nhất mà Nội Thất Xinh mang đến.</span></span></p>

                        <p style="text-align:justify"><span style="font-size:16px">Bạn có thể đến showroom của chúng tôi tại số 321 Trường Chinh, Thanh Xuân, Hà Nội để chọn mẫu và đặt hàng trực tiếp.</span></p>

                        <p style="text-align:center"><span style="font-size:16px"><img alt="" src="/Images/Upload/images/showroom-noi-that-xinh(6).jpg" style="height:486px; width:740px"></span></p>

                        <p style="text-align:justify"><span style="font-size:18px"><strong><span style="font-family:arial,helvetica,sans-serif">2. Đặt hàng qua điện thoại</span></strong></span></p>

                        <p style="text-align:justify"><span style="font-size:16px"><span style="font-family:arial,helvetica,sans-serif">Khách hàng&nbsp;</span><span style="font-family:arial,helvetica,sans-serif">có thể gọi điện đến số <span style="color:#FF0000">0975 90 3333</span> hoặc số </span><span style="color:#FF0000">043.9059999</span><span style="font-family:arial,helvetica,sans-serif"> để được nhân viên của Nội Thất Xinh hỗ trợ tư vấn và đặt hàng.</span></span></p>

                        <p style="text-align:justify"><span style="font-size:18px"><span style="font-family:arial,helvetica,sans-serif"><strong>3. Đặt hàng online</strong></span></span></p>

                        <p style="text-align:justify"><span style="font-size:16px"><span style="font-family:arial,helvetica,sans-serif">Quý khách vào website <span style="color:#FF0000">Noithatxinh.vn</span> và làm theo hướng dẫn sau:</span></span></p>

                        <p style="margin-left:40px; text-align:justify"><span style="font-size:16px"><span style="font-family:arial,helvetica,sans-serif">1, Tìm kiếm, tham khảo thông tin về sản phẩm mà quý khách quan tâm, về các chi tiết, thông số của sản phẩm</span></span></p>

                        <p style="margin-left:40px; text-align:justify"><span style="font-size:16px"><span style="font-family:arial,helvetica,sans-serif">2, Tham khảo thông tin giá và chính sách hỗ trợ, chế độ bảo hành của bên bán sản phẩm mà khách hàng đang có nhu cầu mua.</span></span></p>

                        <p style="margin-left:40px; text-align:justify"><span style="font-size:16px"><span style="font-family:arial,helvetica,sans-serif">3, Khi chọn hàng quý vị ghi nhớ mã sản phẩm để tránh bị nhầm lẫn</span></span></p>

                        <p style="margin-left:40px; text-align:justify"><span style="font-size:16px"><span style="font-family:arial,helvetica,sans-serif">4, Click vào dòng chữ <span style="color:#FF0000">ĐẶT NGAY</span></span></span></p>

                        <p style="margin-left:40px; text-align:center"><img alt="" src="/Images/Upload/images/huong-dan-mua-hang-online-1.png"></p>

                        <p style="margin-left:40px; text-align:justify"><span style="font-size:16px"><span style="font-family:arial,helvetica,sans-serif">5, Khách hàng hoàn thiện thông tin đã có hướng dẫn trong mục <span style="color:#FF0000">THÔNG TIN KHÁCH HÀNG</span>, sau đó click vào nút <span style="color:#FF0000">GỬI ĐƠN HÀNG</span></span></span></p>

                        <p style="margin-left:40px; text-align:center"><span style="font-size:16px"><span style="font-family:arial,helvetica,sans-serif"><span style="color:#FF0000"><img alt="" src="/Images/Upload/images/huong-dan-mua-hang-online-2.png"></span></span></span></p>

                        <p style="margin-left:40px; text-align:justify"><span style="font-size:16px"><span style="font-family:arial,helvetica,sans-serif">6, Hệ thống báo khách hàng đã đặt hàng thành công. Nhân viên bán hàng sẽ liên hệ với bạn để giao hàng theo yêu cầu</span></span></p>

                        <p style="margin-left:40px; text-align:justify"><span style="font-size:16px"><span style="font-family:arial,helvetica,sans-serif">7, Kiểm tra và nhận hàng</span></span></p>

                        <p style="margin-left:40px; text-align:justify"><span style="font-size:16px"><span style="font-family:arial,helvetica,sans-serif">8, Khách hàng thắc mắc, khiếu nại cửa hàng (nếu có)</span></span></p>

                        <p style="text-align:justify">&nbsp;</p>

                        <p style="text-align:justify"><span style="font-size:16px">Với nhiều hình thức hướng dẫn mua hàng linh hoạt, Nội Thất Xinh luôn là cái tên được người tiêu dùng lựa chọn hàng đầu về dịch vụ cung cấp các sản phẩm nội thất chất lượng cao, mang đến sự tiện nghi cho không gian sống trong ngôi nhà của bạn. Hãy liên hệ với chúng tôi để ngôi nhà của bạn được chăm sóc tốt nhất.</span></p>

                        <p style="text-align:justify">&nbsp;</p>

                        <p style="text-align:justify"><span style="font-family:inherit; font-size:18px"><span style="font-family:times new roman,times,serif; font-size:inherit"><span style="color:rgb(255, 140, 0); font-family:inherit; font-size:inherit"><strong>NỘI THẤT XINH</strong></span>&nbsp;- </span></span><span style="font-size:16px"><span style="font-family:arial,helvetica,sans-serif">Nội thất của người Việt<br>
                        Công ty cổ phần Xây Dựng Nội Thất Nhà Xinh<br>
                        Người đại diện: Ông&nbsp;Vũ Trọng Nghĩa – CV: GĐ.<br>
                        GPKD số: <span style="color:#FF0000">0106003120</span> Do sở KHDT Thành Phố Hà Nội cấp.<br>
                        Trụ sở gd: <span style="color:#FF0000">Số 321 Trường Chinh – Thanh Xuân – Hà Nội</span>.<br>
                        Tell: <span style="color:#FF0000">0243.905.9999</span><br>
                        Hotline: <span style="color:#FF0000">0975.90.3333</span><br>
                        Email: <span style="color:#FF0000">sale@noithatxinh.vn</span><br>
                        Đóng góp ý kiến &amp; phản ánh DV: <span style="color:#FF0000">ceo@noithatxinh.vn</span> (Mobile: 0987.26.5555).</span></span></p>

                        </div>
                    </div>

                </div>
                <div style="height: auto; width: 100%">
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11&appId=1769377650030290';
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                    <div class="fb-comments" data-href="https://www.facebook.com/myphamnhatduc/photos/a.1976618959231202.1073741827.1976613575898407/2022986317927799/?type=1&amp;theater" data-width="100%" data-numposts="5"></div>
                </div>
            </div>
            <!-- RIGHT_BAR -->
            
            <?= $this->render('../../../../views/layouts/right_bar', [
            ]) ?>
        
           <!-- PRODUCT-OFFER -->
            
            <?= $this->render('../../../../views/layouts/product_sale', [
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
                <span class="close close_order_modal">&times;</span>
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