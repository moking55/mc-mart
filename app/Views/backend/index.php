  <!-- Start Hero -->
  <section class="hero has-background-image is-fullheight">
      <div class="hero-body">
          <div class="container" style="margin-top: 10vh;">
              <div class="columns">
                  <div class="column is-two-thirds">
                      <div class="card">
                          <div class="card-content">
                              <div class="content">
                                  <?= $page ?>
                              </div>
                          </div>
                      </div>

                  </div>
                  <div class="column">
                      <nav class="panel" style="background: white">
                          <div class="p-3">
                              <a href="/backend/manage" class="panel-block is-active">
                                  <span class="panel-icon has-text-primary">
                                      <i class="fas fa-caret-right fa-lg"></i>
                                  </span>
                                  เมนูหลัก
                              </a>
                              <a href="/backend/manage?page=addProduct" class="panel-block is-active">
                                  <span class="panel-icon has-text-primary">
                                      <i class="fas fa-caret-right fa-lg"></i>
                                  </span>
                                  เพิ่มสินค้า
                              </a>
                              <a href="/backend/manage?page=addNews" class="panel-block is-active">
                                  <span class="panel-icon has-text-primary">
                                      <i class="fas fa-caret-right fa-lg"></i>
                                  </span>
                                  เพิ่มข่าวสาร
                              </a>
                              <a href="/backend/manage?page=addCoupon" class="panel-block is-active">
                                  <span class="panel-icon has-text-primary">
                                      <i class="fas fa-caret-right fa-lg"></i>
                                  </span>
                                  เพิ่มคูปอง
                              </a>
                          </div>
                          <div class="p-3">
                              <a href="/backend/manage?page=products" class="panel-block is-active">
                                  <span class="panel-icon has-text-primary">
                                      <i class="fas fa-caret-right fa-lg"></i>
                                  </span>
                                  จัดการสินค้า
                              </a>
                              <a href="/backend/manage?page=annoucements" class="panel-block is-active">
                                  <span class="panel-icon has-text-primary">
                                      <i class="fas fa-caret-right fa-lg"></i>
                                  </span>
                                  จัดการข่าวสาร
                              </a>
                              <a href="/backend/manage?page=coupons" class="panel-block is-active">
                                  <span class="panel-icon has-text-primary">
                                      <i class="fas fa-caret-right fa-lg"></i>
                                  </span>
                                  จัดการคูปอง
                              </a>
                              <a href="/backend/manage?page=members" class="panel-block is-active">
                                  <span class="panel-icon has-text-primary">
                                      <i class="fas fa-caret-right fa-lg"></i>
                                  </span>
                                  จัดการสมาชิก
                              </a>
                          </div>
                          <div class="p-3">
                              <a href="/backend/manage?page=webSettings" class="panel-block is-active">
                                  <span class="panel-icon has-text-primary">
                                      <i class="fas fa-caret-right fa-lg"></i>
                                  </span>
                                  ตั้งค่าหน้าเว็บ
                              </a>
                              <a href="/backend/manage?page=topupSettings" class="panel-block is-active">
                                  <span class="panel-icon has-text-primary">
                                      <i class="fas fa-caret-right fa-lg"></i>
                                  </span>
                                  ตั้งค่าระบบเติมเงิน
                              </a>
                              <a href="/backend/manage?page=serverSettings" class="panel-block is-active">
                                  <span class="panel-icon has-text-primary">
                                      <i class="fas fa-caret-right fa-lg"></i>
                                  </span>
                                  ตั้งค่าเซิร์ฟเวอร์
                              </a>
                              <a href="/backend/manage?page=systemInfo" class="panel-block is-active">
                                  <span class="panel-icon has-text-primary">
                                      <i class="fas fa-caret-right fa-lg"></i>
                                  </span>
                                  เกี่ยวกับระบบ
                              </a>
                          </div>

                      </nav>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- End Hero -->

  <script src="/js/adminpanel.js"></script>
  <script src="/js/jquery.dataTables.min.js"></script>
  <script src="/js/dataTables.bulma.min.js"></script>