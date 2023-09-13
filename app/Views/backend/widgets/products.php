<table id="dataTable" class="table is-striped" style="width:100%">
    <thead>
        <tr>
            <th width="5%">ID</th>
            <th width="20%">ชื่อสินค้า</th>
            <th width="5%">ราคา</th>
            <th width="20%">คำสั่ง</th>
            <th width="7%">Key</th>
            <th width="1%">แก้ไข?</th>
            <th width="1%">ลบ</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product) : ?>
        <tr>
            <td><?= $product['pid'] ?></td>
            <td><?= $product['product_name'] ?></td>
            <td><?= $product['product_price'] ?></td>
            <td><?= $product['product_command'] ?></td>
            <td><?= $product['product_key'] ?></td>
            <td><a href="/backend/manage?page=products&edit=<?= $product['pid'] ?>" class="button is-small is-warning"><i class="fas fa-pen"></i></a></td>
            <td><button onclick="removeProduct(<?= $product['pid'] ?>)" class="button is-small is-danger"><i class="fas fa-trash"></i></button></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>