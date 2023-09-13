<div class="columns is-multiline">
    <div class="column is-half">
        <div class="field">
            <label class="label">ชื่อคูปอง</label>
            <div class="control">
                <input id="coupon_title" class="input" type="text" placeholder="ป้อนชื่อคูปอง">
            </div>
        </div>
    </div>
    <div class="column is-half">
        <div class="field">
            <label class="label">คำสั่งในเกม</label>
            <div class="control has-icons-left has-icons-right">
                <input id="coupon_action" class="input" type="text" placeholder="คำสั่ง (ไม่ต้องมี /)">
                <span class="icon is-small is-left">
                    <b>/</b>
                </span>
            </div>
            <small class="helper">แทนที่ชื่อผู้เล่นใช้แท็ก [player]</small>
        </div>
    </div>
    <div class="column is-12 has-text-centered">
        <button type="button" id="createCoupon" class="button is-primary">สร้างคูปอง</button>
    </div>
</div>