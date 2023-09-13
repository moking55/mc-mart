<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตรวจสอบข้อมูล</title>
</head>

<body>
    <table style="width:100%">
        <thead>
            <tr style="background: gray">
                <th>วันที่ทำรายการ</th>
                <th>ชื่อรายการ</th>
                <th>ราคา</th>
                <th>รหัสอ้างอิง</th>
                <th>ชำระโดย</th>
            </tr>
        </thead>
        <tbody style="background: lightgray">
            <?php foreach ($trans as $col) : ?>
                <tr>
                    <td><?= $col->created_at ?></td>
                    <td><?= $col->payment_name ?></td>
                    <td><?= $col->payment_value ?></td>
                    <td><?= $col->payment_id ?></td>
                    <td><?= $col->payment_method ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>