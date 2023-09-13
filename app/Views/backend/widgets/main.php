<div class="columns is-multiline has-text-centered">
    <div class="column is-4">
        <div class="card pt-3" style="background: #2C2F33">
            <div class="card-content">
                <h1 class="has-text-light"><i class="fa fa-server fa-lg" aria-hidden="true"></i></h1>
                <h3 class="has-text-light">สถานะเซิร์ฟเวอร์</h3>
                <h6 class="is-size-6 has-text-light" id="sv_status">กำลังเชื่อมต่อ...</h6>
            </div>
        </div>

    </div>
    <div class="column is-4">
        <div class="card pt-3" style="background: #2C2F33">
            <div class="card-content">
                <h1 class="has-text-light"><i class="fas fa-user fa-lg"></i></h1>
                <h3 class="has-text-light">ผู้เล่นทั้งหมด</h3>
                <h6 class="is-size-6 has-text-light"><?= $players ?></h6>
            </div>
        </div>
    </div>
    <div class="column is-4">
        <div class="card pt-3" style="background: #10ac84">
            <div class="card-content">
                <h1 class="has-text-light"><i class="fas fa-dollar-sign fa-lg"></i></h1>
                <h3 class="has-text-light">รายได้โดยรวม</h3>
                <h6 class="is-size-6 has-text-light"><?= $income['total_income'] ?> THB</h6>
            </div>
        </div>
    </div>
</div>