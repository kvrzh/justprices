<div class="admin">
    <h1>Cities</h1>
    <a href="<?= base_url('admin') ?>">Вернутся</a>
    <div class="table_sales col-md-6 col-lg-12 col-sm-12">
        <a class="btn btn-default" href="/admin/cities/add">Добавить новую запись</a>
        <table class="table table-hover table-condensed table-bordered">
            <thead>
            <tr>
                <th>Actions</th>
                <th>ID</th>
                <th>Name</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cities as $city): ?>
                <tr>
                    <td><a class="btn btn-primary" href="/admin/cities/edit/<?= $city['city_id'] ?>">Редактировать</a>
                        <a class="btn btn-danger" href="/admin/cities/delete/<?= $city['city_id'] ?>">Удалить</a>
                    </td>
                    <td><?= $city['city_id'] ?></td>
                    <td><?= $city['city_name'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="fix"></div>
</div>

