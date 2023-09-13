<div class="container">
    <div class="columns is-multiline">
        <div class="column is-half">
            <div class="field">
                <label class="label">เบอร์โทรศัพท์ที่ลงทะเบียน True Wallet</label>
                <div class="control">
                    <input class="input" id="tw_phone" value="<?= $config['tw_phone'] ?>" type="text" placeholder="เบอร์มือถือ">
                </div>
            </div>
        </div>
        <div class="column is-half">
            <div class="field">
                <label class="label">ตัวคูณของค่าเงิน</label>
                <div class="control">
                    <input class="input" value="<?= $config['coin_multiplier'] ?>" id="coin_multiplier" type="number" min="1" max="100">
                </div>
            </div>
            <p class="help">ตัวคูณของค่าเงินคือ เงินที่เติม คูณด้วยค่าเงินพ้อยต์ ต่อ 1 บาท เช่นหากต้องการเติมเงิน คุณสอง เมื่อเติม 100 บาทจะได้รับ 200 พ้อยต์</p>
        </div>
        <div class="column">
            <p class="is-size-5 has-text-danger"><b>คำเตือน โปรดอ่าน!</b></p>
            <p>หากท่านกรอกข้อมูลการเงินผิดแล้วเงินไม่เข้าบัญชีของท่าน ทางผู้พัฒนาขอสงวนสิทธิ์ไม่รับผิดชอบทุกกรณี โปรดตรวจสอบข้อมูลของท่านให้ถูกต้องก่อนบันทึกทุกครั้ง</p>
            <p>ทางซอฟต์แวร์จะไม่มีการหักค่าเปอร์เซ็นจากรายได้ทั้งหมดแต่อย่างได</p>
        </div>
        <div class="column is-12 has-text-centered">
            <button type="button" id="saveTopup" class="button is-primary">บันทึกข้อมูล</button>
        </div>
    </div>
</div>