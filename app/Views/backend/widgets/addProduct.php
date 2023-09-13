<div class="columns is-multiline">
    <div class="column is-12">
        <div class="field">
            <label class="label">ชื่อสินค้า</label>
            <div class="control">
                <input id="productName" class="input" type="text" placeholder="ป้อนชื่อสินค้า">
            </div>
        </div>
    </div>
    <div class="column is-12">
        <div class="field">
            <label class="label">รายละเอียดสินค้า</label>
            <div class="control">
                <textarea id="productInfo" class="textarea" placeholder="e.g. Hello world"></textarea>
            </div>
        </div>
    </div>
    <div class="column is-6">
        <div class="field">
            <label class="label">รูปภาพ</label>
            <p id="progressText"></p>
            <div class="control">
                <img id="previewPimg" src="" class="image is-hidden">
                <input id="imgUp" type="file" accept="image/*">
                <input id="productImage" class="is-hidden" value="" type="text">
            </div>
        </div>
    </div>
    <div class="column is-6">
        <div class="field">
            <label class="label">ราคาขาย (พ้อยต์)</label>
            <div class="control">
                <input id="productPrice" class="input" value="0" type="number">
            </div>
        </div>
    </div>
    <div class="column is-12">
        <div class="field">
            <label class="label">คำสั่งในเกม</label>
            <div class="control has-icons-left has-icons-right">
                <input id="ingameCommand" class="input" type="text" placeholder="คำสั่ง (ไม่ต้องมี /)">
                <span class="icon is-small is-left">
                    <b>/</b>
                </span>
            </div>
            <p class="helper">แทนที่ชื่อผู้เล่นใช้แท็ก [player]</p>
        </div>
    </div>
    <div class="column is-12 has-text-centered">
        <button type="button" id="createProduct" class="button is-primary">สร้างสินค้า</button>
    </div>
</div>