<table id="dataTable" class="table is-striped" style="width:100%">
    <thead>
        <tr>
            <th width="5%">ID</th>
            <th width="25%">ชื่อคูปอง</th>
            <th width="25%">คำสั่งในเกม</th>
            <th width="25%">คีย์</th>
            <th width="15%">ใช้งานแล้ว</th>
            <th width="5%">ลบ</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $coupon) : ?>
        <tr>
            <td><?= $coupon['id'] ?></td>
            <td><?= $coupon['coupon_title'] ?></td>
            <td>/<?= $coupon['coupon_action'] ?></td>
            <td><?= $coupon['coupon_code'] ?></td>
            <td><?= ($coupon['active'] == 1)? 'false' : 'true' ?></td>
            <td><button type="button" onclick="removeCoupon(<?= $coupon['id'] ?>)" class="button is-small is-danger"><i class="fas fa-trash"></i></button></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>