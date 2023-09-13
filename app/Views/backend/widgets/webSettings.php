<div class="container">
    <div class="columns is-multiline">
        <div class="column is-half">
            <div class="field">
                <label class="label">ชื่อเว็บไซต์</label>
                <div class="control">
                    <input class="input" id="site_name" value="<?= $config['site_name'] ?>" type="text" placeholder="กรอกชื่อเว็บไซต์">
                </div>
            </div>
        </div>
        <div class="column is-half">
            <div class="field">
                <label class="label">คำอธิบาย</label>
                <div class="control">
                    <textarea class="textarea" id="site_description" placeholder="e.g. Hello world"><?= $config['site_description'] ?></textarea>
                </div>
            </div>
        </div>
        <div class="column is-half">
            <div class="field">
                <label class="label">รูปโลโก้</label>
                <figure class="image">
                    <img id="siteLogo" src="/img/logo.png" style="width: 200px">
                </figure>
                <div class="control">
                    <input type="file" id="site_image">
                </div>
            </div>
        </div>
        <div class="column is-half">
            <div class="field">
                <label class="label">IP เซิร์ฟเวอร์</label>
                <div class="control">
                    <input class="input" value="<?= $config['sv_ip'] ?>" id="sv_ip" type="text" placeholder="IP Address">
                </div>
            </div>
            <div class="field mt-3">
                <label class="label">Youtube Video ID</label>
                <div class="control">
                    <input class="input" id="site_youtube" value="<?= $config['site_youtube'] ?>" type="text" placeholder="Youtube id">
                </div>
            </div>
            <p>* Youtube id หาได้จาก : <br> https://www.youtube.com/watch?v=<strong><span class="has-text-danger" style="border-bottom: 3px solid red;">AuCjrO2jd94</span></strong></p>
        </div>
        <div class="column is-half">
            <div class="field">
                <label class="label">รูปพื้นหลัง</label>
                <figure class="image">
                    <img id="siteBg" src="/img/background.png" style="height: 200px;width: 600px;object-fit: cover;">
                </figure>
                <div class="control">
                    <input type="file" id="siteBg_in">
                </div>
            </div>
        </div>
        <div class="column is-half">
            <div class="field">
                <label class="label">รูปพื้นหลังประกาศ</label>
                <figure class="image">
                    <img id="newsBg" src="/img/newsBackground.png" style="height: 200px;width: 600px;object-fit: cover;">
                </figure>
                <div class="control">
                    <input type="file" id="newsBg_in">
                </div>
            </div>
        </div>
        <div class="column is-12">
            <div class="field">
                <label class="label">รูปแบนเนอร์</label>
                <figure class="image">
                    <img id="banner" src="/img/banner.png" style="height: 200px;width: 600px;object-fit: cover;">
                </figure>
                <div class="control">
                    <input type="file" id="banner_in">
                </div>
            </div>
        </div>
        <div class="column is-12">
            <div class="field">
                <label class="label">หน้าดาวน์โหลดเกม</label>
                <label class="checkbox">
                    <input type="checkbox" id="enableDownload" value="1" <?= ($config['enableDownload'] == 1)? "checked" : null ?>>
                    เปิดใช้งาน
                </label>
                <div class="control">
                    <textarea id="downloadContent" placeholder="e.g. Hello world"><?= htmlspecialchars_decode($config['downloadContent']) ?></textarea>
                </div>
            </div>
        </div>
        <div class="column is-12 has-text-centered">
            <button type="button" id="saveWeb" class="button is-primary">บันทึกข้อมูล</button>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
<!-- CKEditor -->
<script>
    CKEDITOR.replace('downloadContent');
</script>