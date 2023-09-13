<div class="notification">
    <div class="field has-addons is-fullwidth">
        <div class="control is-expanded">
            <input class="input" id="playerName" type="text" placeholder="ค้นหาผู้เล่น">
        </div>
        <div class="control">
            <button type="button" id="btnPlayerSearch" class="button is-info">
                ค้นหา
            </button>
        </div>
    </div>
</div>

<div id="playerData" class="card is-hidden">
    <div class="card-content">
        <div class="media">
            <div class="media-left">
                <figure class="image is-96x96">
                    <img id="skin" src="https://mc-heads.net/avatar/SMP_Steve/96" alt="Placeholder image">
                </figure>
            </div>
            <div class="media-content">
                <p class="title is-4">พบข้อมูลผู้เล่นในระบบ</p>
                <p class="subtitle is-6">Authme</p>
            </div>
        </div>

        <div class="content">
            <div class="container">
                <div class="columns is-multiline ">
                    <div class="column is-4">
                        <div class="field">
                            <label class="label">ชื่อผู้เล่น</label>
                            <div class="control">
                                <input class="input" id="username" type="text" placeholder="username" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="column is-4">
                        <div class="field">
                            <label class="label">ชื่อจริง</label>
                            <div class="control">
                                <input class="input" id="realName" type="text" placeholder="real name" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="column is-4">
                        <div class="field">
                            <label class="label">IP:</label>
                            <div class="control">
                                <input class="input" id="ipAddress" type="text" placeholder="IpAddress" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="column is-4">
                        <div class="field">
                            <label class="label">พ้อยต์</label>
                            <div class="control">
                                <input class="input" id="credits" type="text" placeholder="credits">
                            </div>
                        </div>
                    </div>
                    <div class="column is-4">
                        <div class="field">
                            <label class="label">ตรวจสอบข้อมูลซื้อขาย</label>
                            <div class="control">
                                <a id="transections" class="button is-primary is-outlined is-fullwidth">ตรวจสอบ</a>
                            </div>
                        </div>
                    </div>
                    <div class="column is-4">
                        <div class="field">
                            <label class="label">การดำเนินการ</label>
                            <div class="field is-grouped">
                                <p class="control">
                                    <button type="button" id="saveBtn" class="button is-link">
                                        บันทึก
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<p id="nf" class="is-hidden">กำลังค้นหา.....</p>