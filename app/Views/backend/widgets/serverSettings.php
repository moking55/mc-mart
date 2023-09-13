<div class="columns is-multiline">
    <div class="column is-half">
        <div class="field">
            <label class="label">Rcon port</label>
            <div class="control">
                <input class="input" id="rcon_port" value="<?= $config['rcon_port'] ?>" type="text" placeholder="Rcon port">
            </div>
        </div>
    </div>
    <div class="column is-half">
        <div class="field">
            <label class="label">Rcon password</label>
            <div class="control">
                <input class="input" id="rcon_password" value="<?= $config['rcon_password'] ?>" type="password" placeholder="Rcon password">
            </div>
        </div>
    </div>
    <div class="column is-12">
        <h5 class="is-size-5">สิ่งนี้คืออะไร?</h5>
        <p>ระบบ RCON ของ Minecraft implement มาจากระบบ RCON ของ Source engine ดังนั้นเครื่องมือเยอะกว่าแน่นอน แล้วไม่ต้องลง plugin อะไรเพิ่มด้วย แค่เข้าไปตั้งค่าก็สามารถใช้งานได้แล้ว</p>
    </div>
    <div class="column is-12">
        <h5 class="is-size-5">ทดสอบการเชื่อมต่อ</h5>
        <p>เพื่อตรวจสอบว่าระบบทุกอย่างทำงานปกติเราจำเป็นต้องทดสอบว่า RCON สามารถใช้งานได้หรือไม่</p>
        <button type="button" id="testRcon" class="button">ทดสอบการเชื่อมต่อ</button> <p id="rconConnect"></p>
    </div>
    <div class="column is-12 has-text-centered">
        <button type="button" id="saveServer" class="button is-primary " disabled>บันทึกข้อมูล</button>
    </div>
</div>