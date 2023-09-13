<link rel="stylesheet" href="/css/bulma-steps.css">
<!-- Start Hero -->
<section class="hero has-background-image is-fullheight">
    <div class="hero-body">
        <div class="container">
            <div class="columns pb-6 pt-6">
                <div class="column is-three-fifths is-offset-one-fifth animate__animated animate__backInUp">
                    <div class="card">
                        <div class="card-content">
                            <ul class="steps is-narrow is-medium is-centered has-content-centered is-hidden-mobile">
                                <li class="steps-segment">
                                    <span class="steps-marker">
                                        <span class="icon">
                                            <i class="fa fa-shopping-cart"></i>
                                        </span>
                                    </span>
                                    <div class="steps-content">
                                        <p class="heading">เลือกสินค้า</p>
                                    </div>
                                </li>
                                <li class="steps-segment">
                                    <span class="steps-marker">
                                        <span class="icon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </span>
                                    <div class="steps-content">
                                        <p class="heading">ข้อมูลผู้เล่น</p>
                                    </div>
                                </li>
                                <li id="active_wait" class="steps-segment is-active">
                                    <span class="steps-marker">
                                        <span class="icon">
                                            <i class="fas fa-dollar-sign"></i>
                                        </span>
                                    </span>
                                    <div class="steps-content">
                                        <p class="heading">จ่ายเงิน</p>
                                    </div>
                                </li>
                                <li id="active_success" class="steps-segment">
                                    <span class="steps-marker is-hollow">
                                        <span class="icon">
                                            <i class="fa fa-check"></i>
                                        </span>
                                    </span>
                                    <div class="steps-content">
                                        <p class="heading">สำเร็จแล้ว</p>
                                    </div>
                                </li>
                            </ul>


                            <div class="content pl-4 pr-4">
                                <div id="payment_pending" class="columns">
                                    <div class="column is-half pt-4">
                                        <h5 class="is-size-5">ยืนยันคำสั่งซื้อ</h5>
                                        <div style="line-height: 0.8em">
                                            <p><strong>ชื่อสินค้า : </strong><?= $product['product_name'] ?></p>
                                            <p><strong>ราคา : </strong><?= $product['product_price'] ?> พ้อยต์</p>
                                            <strong>คำอธิบาย : </strong>
                                            <textarea class="textarea mt-2" placeholder="นี่อาจจะเป็นการเริ่มต้นที่ยิ่งใหญ่ก็ได้!" readonly><?= $product['product_description'] ?></textarea>
                                        </div>
                                        <p class="mt-4">จงหาผลรวม: <span type="text" id="a"></span></p>
                                        <div class="field has-addons">
                                            <div class="control is-expanded">
                                                <input class="input is-small" type="text" id="b" placeholder="ป้อนตัวเลข">
                                            </div>
                                            <div class="control">
                                                <button type="button" id="c" class="button is-dark is-outlined is-small">
                                                    ตรวจสอบ
                                                </button>
                                            </div>
                                        </div>

                                        <div class="has-text-centered mt-3">
                                            <button class="button is-outlined is-dark" type="button" id="buyItem" value="<?= $product['product_key'] ?>" disabled>ซื้อสินค้า</button>
                                        </div>
                                    </div>
                                    <div class="column is-half"><img src="<?= (!empty($product['product_image'])) ? $product['product_image'] : '/img/itemframe.png' ?>" alt="" /></div>
                                </div>

                                <center id="payment_success" class="is-hidden">
                                    <h1 class="is-1">🎉</h1>
                                    <h3 class="is-3">ขอบคุณ!</h3>
                                    <p>การสั่งซื้อเสร็จสมบูรณ์</p>
                                    <a href="/" class="button is-secondary">กลับไปยังร้านค้า</a>
                                </center>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Hero -->