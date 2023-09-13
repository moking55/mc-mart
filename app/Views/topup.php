<style>
    .hero.has-background {
        position: relative;
        overflow: hidden;
    }

    .hero-background {
        position: absolute;
        object-fit: cover;
        object-position: center center;
        width: 100%;
        height: 100%;
    }

    .hero-background.is-transparent {
        opacity: 0.3;
    }
</style>
<div class="hero is-fullheight is-dark has-background">
    <img class="hero-background is-transparent" src="/img/background.png" />
    <div class="hero-body">
        <div class="container">
            <div class="columns">
                <div class="column is-three-fifths is-offset-one-fifth">
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                <img class="image mr-2" style="width: 100px" src="https://www.truemoney.com/wp-content/uploads/2020/12/truemoneywallet-logo-20190424.png" alt="">
                                อังเปา True Wallet
                            </p>
                            <a href="#" class="card-header-icon" aria-label="info" title="วิธีสร้างอังเปา">
                                <span class="icon">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                            </a>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <div class="columns">
                                    <div class="column">
                                        <div class="field">
                                            <label class="label">Url True wallet</label>
                                            <div class="control">
                                                <input class="input" type="text" id="twUrlInput" placeholder="Place truewallet url here.">
                                            </div>
                                            <div class="block has-text-centered mt-3">
                                                <button type="button" id="twCheckBtn" class="button is-primary">ตรวจสอบ</button>
                                            </div>
                                            <p><strong>อัตราการเติมเงิน:</strong> จำนวนเงินที่เติม x <?= $coin_multiplier ?> พ้อยต์</p>
                                        </div>
                                    </div>
                                    <div class="column is-two-fifths">
                                        <div class="has-text-centered">
                                            <img style="height: 180px" src="https://www.truemoney.com/wp-content/uploads/2020/11/truemoneywallet_sendgift_CNY_HongPao2020_play_3c.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>