<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="icon" type="image/png" sizes="32x32" href="/img/logo.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/logo.png">
    <meta name="theme-color" content="#404EED">

    <meta name="title" content="<?= $config['site_name'] ?> — Powered by MC-Mart">
    <meta name="description" content="<?= $config['site_description'] ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= current_url() ?>">
    <meta property="og:title" content="<?= $config['site_name'] ?> — Powered by MC-Mart">
    <meta property="og:description" content="<?= $config['site_description'] ?>">
    <meta property="og:image" content="/img/background.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= current_url() ?>">
    <meta property=" twitter:title" content="<?= $config['site_name'] ?> — Powered by MC-Mart">
    <meta property="twitter:description" content="<?= $config['site_description'] ?>">
    <meta property="twitter:image" content="/img/background.png">

    <!-- Main css -->
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="/css/bulma.min.css">
    <link rel="stylesheet" href="/css/iziToast.min.css">
    <link rel="stylesheet" href="/css/webshop.css">


    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/iziToast.min.js"></script>
</head>

<body>
    <nav class="navbar fixed is-transparent pt-2 pb-2" style="border-radius: 0 0 5px 5px;" role="navigation" aria-label="main navigation">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    <img src="/img/logo.png" width="50px" height="50px">
                </a>

                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasic">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasic" class="navbar-menu">
                <div class="navbar-start">
                    <a href="/" class="navbar-item hover-underline-animation">
                        ร้านค้า
                    </a>
                    <a href="/topup" class="navbar-item hover-underline-animation">
                        เติมเงิน
                    </a>
                    <a href="/news" class="navbar-item hover-underline-animation">
                        ข่าวสาร
                    </a>
                    <?php if ($config['enableDownload'] == '1') : ?>
                        <a href="/download" class="navbar-item hover-underline-animation">
                            ดาวน์โหลด
                        </a>
                    <?php endif ?>
                    <a href="/history" class="navbar-item hover-underline-animation">
                        รายการของฉัน
                    </a>
                    <a href="https://codename-t.com/support/" class="navbar-item hover-underline-animation">
                        วิธีใช้
                    </a>
                    <?php if (session()->has('isAdmin') && session()->get('isAdmin') == '1') : ?>
                        <a href="/backend/manage" class="navbar-item hover-underline-animation">
                            จัดการหลังร้าน
                        </a>
                    <?php endif ?>
                </div>
                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <?php if (service('request')->getPath() != "login" && !session()->has('isLogin')) : ?>
                                <a class="button is-primary" href="/login">
                                    เข้าสู่ระบบ
                                </a>
                            <?php elseif (service('request')->getPath() != "login" && session()->has('isLogin')) : ?>
                                <button id="logoutBtn" class="button is-danger">
                                    ออกจากระบบ
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>