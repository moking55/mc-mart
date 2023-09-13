<table id="dataTable" class="table is-striped" style="width:100%">
    <thead>
        <tr>
            <th width="5%">ID</th>
            <th width="25%">ชื่อประกาศ</th>
            <th width="5%">แก้ไข?</th>
            <th width="5%">ลบ</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $news) : ?>
        <tr>
            <td><?= $news['id'] ?></td>
            <td><?= $news['title'] ?></td>
            <td><a href="/backend/manage?page=annoucements&edit=<?= $news['id'] ?>" class="button is-small is-warning"><i class="fas fa-pen"></i></a></td>
            <td><button type="button" onclick="removeNews(<?= $news['id'] ?>)" class="button is-small is-danger"><i class="fas fa-trash"></i></button></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>