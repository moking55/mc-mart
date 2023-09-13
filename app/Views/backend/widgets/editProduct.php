<div class="columns is-multiline">
    <div class="column is-12">
        <div class="field">
            <label class="label">ชื่อสินค้า</label>
            <div class="control">
                <input id="productName" value="<?= $product['product_name'] ?>" class="input" type="text" placeholder="ป้อนชื่อสินค้า">
            </div>
        </div>
    </div>
    <div class="column is-12">
        <div class="field">
            <label class="label">รายละเอียดสินค้า</label>
            <div class="control">
                <textarea id="productInfo" class="textarea" placeholder="e.g. Hello world"><?= $product['product_description'] ?></textarea>
            </div>
        </div>
    </div>
    <div class="column is-6">
        <div class="field">
            <label class="label">รูปภาพ</label>
            <p id="progressText"></p>
            <div class="control">
                <img id="previewPimg" src="<?= $product['product_image'] ?>" class="image">
                <input id="imgUp" type="file" accept="image/*">
                <input id="productImage" class="is-hidden" value="<?= $product['product_image'] ?>" type="text">
            </div>
        </div>
    </div>
    <div class="column is-6">
        <div class="field">
            <label class="label">ราคาขาย (พ้อยต์)</label>
            <div class="control">
                <input id="productPrice" class="input" value="<?= $product['product_price'] ?>" type="number">
            </div>
        </div>
    </div>
    <div class="column is-12">
        <div class="field">
            <label class="label">คำสั่งในเกม</label>
            <div class="control has-icons-left has-icons-right">
                <input id="ingameCommand" class="input" value="<?= $product['product_command'] ?>" type="text" placeholder="คำสั่ง (ไม่ต้องมี /)">
                <span class="icon is-small is-left">
                    <b>/</b>
                </span>
            </div>
            <p class="helper">แทนที่ชื่อผู้เล่นใช้แท็ก [player]</p>
        </div>
    </div>
    <div class="column is-12 has-text-centered">
        <button type="button" value="<?= $product['pid'] ?>" id="editProduct" class="button is-warning">แก้ไขสินค้า</button>
    </div>
</div>