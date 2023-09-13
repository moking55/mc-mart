<style>
    body {
        background: rgb(52, 31, 151);
        background: linear-gradient(180deg, rgba(52, 31, 151, 1) 0%, rgba(255, 255, 255, 0) 100%);
    }
</style>
<section class="hero is-fullheight">
    <div class="hero-body">
        <div class="container">
            <div class="has-text-centered p-6">
                <h3 class="is-size-3 has-text-white">ประวัติการทำรายการ</h3>
            </div>
            <div class="columns">
                <div class="column is-three-fifths is-offset-one-fifth">
                    <table class="table is-fullwidth">
                        <thead>
                            <tr>
                                <th width="20%">วันที่ทำรายการ</th>
                                <th width="50%">ชื่อรายการ</th>
                                <th width="10%">ราคา</th>
                                <th width="20%">รหัสอ้างอิง</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($transaction_data as $column): ?>
                            <tr>
                                <td><?= $column->created_at ?></td>
                                <td><?= $column->payment_name ?></td>
                                <td><?= $column->payment_value ?></td>
                                <td><?= $column->payment_id ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>