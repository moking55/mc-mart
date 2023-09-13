  <!-- Start Hero -->
  <section class="hero has-background-image is-fullheight">
      <div class="hero-body">
          <div class="container has-text-centered">

              <!-- Start Hero Title -->
              <p class="title is-1 has-text-white server-name animate__animated animate__fadeIn"><img src="/img/logo.png" style="min-width: 240px" alt=""></p>
              <!-- End Hero Title -->

              <!-- Start Hero Subtitle -->
              <p class="subtitle has-text-white animate__animated animate__fadeIn">
                  <span class="tag is-dark is-size-5">IP: <?= $config['sv_ip'] ?></span>
              </p>
              <!-- End Hero Subtitle -->
          </div>
      </div>
  </section>
  <!-- End Hero -->

  <div class="container p-3 mt-4">
      <div class="columns">
          <div class="column is-one-quarter">
              <nav class="panel is-primary" style="background: white;">
                  <p class="panel-heading">
                      ข้อมูลของฉัน
                  </p>
                  <?php if (session()->has('isLogin')) : ?>
                      <div class="panel-block is-active">
                          <img src="https://mc-heads.net/avatar/<?= $playerData->realname ?>/50" alt="">
                          <p class="ml-2"><?= $playerData->realname ?></p>

                      </div>
                      <a class="panel-block">
                          <span class="panel-icon">
                              <i class="fas fa-coins"></i>
                          </span>
                          <?= $playerData->credits ?> พ้อยต์
                      </a>
                      <a class="panel-block">
                          <span class="panel-icon">
                              <i class="fas fa-sign-in-alt"></i>
                          </span>
                          <?= date("d/m/Y H:i:s", $playerData->lastlogin) ?>
                      </a>
                      <div class="panel-block">
                          <a href="/topup" class="button is-outlined is-info is-fullwidth m-1">
                              <i class="fas fa-hand-holding-usd fa-xs mr-2"></i> เติมเงิน
                          </a>
                          <button onclick="redeemCode()" class="button is-outlined is-secondary is-fullwidth m-1">
                              <i class="fas fa-ticket-alt fa-xs mr-2"></i> แลกโค้ด
                          </button>
                      </div>
                  <?php else : ?>

                      <a href="/login" class="panel-block">
                          <img src="https://mc-heads.net/avatar/MHF_Steve/50" alt="">
                          <p class="ml-2">โปรดเข้าสู่ระบบ</p>
                      </a>

                  <?php endif ?>
              </nav>
              <?php if (!empty($config['site_youtube'])) : ?>
                  <iframe width="100%" height="250px" style="border-radius: 5px;" src="https://www.youtube.com/embed/<?= $config['site_youtube'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              <?php endif ?>
              <div class="card pt-3 mt-2" style="background: #404EED">
                  <div class="card-content">
                      <div class="media">
                          <div class="media-left">
                              <figure class="image is-24x24 mt-2">
                                  <h5 class="has-text-light is-size-5"><i class="fa fa-server fa-lg" aria-hidden="true"></i></h5>
                              </figure>
                          </div>
                          <div class="media-content" style="overflow: hidden;">
                              <h3 class="has-text-light">สถานะเซิร์ฟเวอร์</h3>
                              <h6 class="is-size-6 has-text-light" id="sv_status">กำลังเชื่อมต่อ...</h6>
                          </div>
                      </div>
                  </div>
              </div>

              <nav class="panel is-primary mt-4 is-hidden-mobile" style="background: white;">
                  <p class="panel-heading">
                      รายการล่าสุด
                  </p>
                  <?php foreach ($top10 as $player) : ?>
                      <a class="panel-block">
                          <img src="https://mc-heads.net/avatar/<?= $player->username ?>/25" alt="">
                          <small class="ml-2"><b><?= $player->realname ?></b> <?= $player->payment_name ?></small>
                      </a>
                  <?php endforeach ?>
              </nav>
          </div>
          <div class="column">
              <div class="columns is-multiline">
                  <div class="column is-12">
                      <div class="notification">
                          📣<strong>ประกาศ :</strong> <a href="/news/<?= $news['id'] ?>" class="has-text-dark"><?= $news['title'] ?></a>
                      </div>
                      <img src="/img/banner.png" class="image is-fullwidth" style="border-radius: 5px;object-fit: cover;height: 240px;" alt="Banner">
                  </div>
                  <?php foreach ($products as $product) : ?>
                      <div class="column is-one-third">
                          <div class="card equal-height">
                              <div class="card-image">
                                  <figure class="image is-4by3">
                                      <img src="<?= (!empty($product['product_image'])) ? $product['product_image'] : "/img/itemframe.png" ?>" style="object-fit: cover" alt="Placeholder image">
                                  </figure>
                              </div>
                              <div class="card-content">
                                  <div class="content">
                                      <div class="is-size-5"><?= $product['product_name'] ?></div>
                                  </div>
                              </div>
                              <footer class="card-footer">
                                  <p href="#" class="card-footer-item"><?= $product['product_price'] ?> $</p>
                                  <?php if (session()->has('isLogin')) : ?>
                                      <a href="/buyItem?pid=<?= $product['product_key'] ?>" class="card-footer-item">ดูข้อมูลก่อนซื้อ</a>
                                  <?php else : ?>
                                      <a href="/login" class="card-footer-item">เข้าสู่ระบบ</a>
                                  <?php endif ?>
                              </footer>
                          </div>
                      </div>
                  <?php endforeach ?>
              </div>
          </div>
      </div>
  </div>