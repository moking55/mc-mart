<div class="container">
    <div class="columns is-multiline">
        <div class="column is-12">
            <div class="field">
                <label class="label">หัวข้อข่าว</label>
                <div class="control">
                    <input class="input" id="newsTitle" type="text" placeholder="สวัสดีคร้าบ... ท่านสมาชิค">
                </div>
            </div>
        </div>
        <div class="column is-12">
            <textarea class="textarea" id="newsContent" placeholder="นี่อาจจะเป็นก้าวที่ยิ่งใหญ่ก็ได้"></textarea>
        </div>
        <div class="column is-12 has-text-centered">
            <button class="button is-primary is-outlined" id="createNews">บันทึกข้อมูล</button>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
<!-- CKEditor -->
<script>
    CKEDITOR.replace('newsContent');
</script>