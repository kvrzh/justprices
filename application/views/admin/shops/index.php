<div class="admin">
    <h1>Shops</h1>
    <a href="<?= base_url('admin') ?>">Вернутся</a>
    <div class="table_sales col-md-6 col-lg-12 col-sm-12">
        <a class="btn btn-default" href="/admin/shops/add">Добавить новую запись</a>
        <table class="table table-hover table-condensed table-bordered">
            <thead>
            <tr>
                <th>Actions</th>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($shops as $shop): ?>
                <tr>
                    <td><a class="btn btn-primary" href="/admin/shops/edit/<?= $shop['id'] ?>">Редактировать</a>
                        <a class="btn btn-danger" href="/admin/shops/delete/<?= $shop['id'] ?>">Удалить</a>
                    </td>
                    <td><?= $shop['id'] ?></td>
                    <td><?= $shop['name'] ?></td>
                    <td><?= $shop['description'] ?></td>
                    <td><?= $shop['image'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="fix"></div>
</div>

