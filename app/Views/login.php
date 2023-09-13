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
                <div class="column is-4 animate__animated animate__backInLeft login-form">
                    <h3 class="is-size-3 has-text-centered mb-3 ">เข้าสู่ระบบ</h3>
                    <form action="" method="post">
                        <div class="field">
                            <div class="control has-icons-left">
                                <input class="input is-medium" name="username" id="loginUsername" type="text" placeholder="Username">
                                <span class="icon is-left">
                                    <i class="fas fa-user fa-sm"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control has-icons-left">
                                <input class="input is-medium" name="password" id="loginPassword" type="password" placeholder="Password">
                                <span class="icon is-left">
                                    <i class="fas fa-key fa-sm"></i>
                                </span>
                            </div>
                        </div>
                        <div class="has-text-centered">
                            <button type="button" id="submitLogin" class="button is-primary">เข้าสู่ระบบ</button>
                        </div>
                    </form>
                </div>
                <div class="column is-8 animate__animated animate__backInLeft animate__delay-1s">
                    <div class="ml-4">
                        <h4 class="is-size-4">จะเข้าสู่ระบบได้อย่างไร?</h4>
                        <p>คุณสามารถเข้าสู่ระบบได้โดยใช้ Username กับ Password ที่สมัครไว้ในเซิร์ฟเวอร์</p>
                        <h4 class="is-size-4 mt-3">ฉันลืมรหัสผ่านต้องทำอย่างไร?</h4>
                        <p>โปรดติดต่อทีมงานที่เกี่ยวข้องภายในเซิร์ฟเวอร์เพื่อดำเนินการแก้ไขต่อไป</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/login.js"></script>