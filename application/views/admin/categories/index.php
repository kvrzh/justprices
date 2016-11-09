<div class="admin">
    <h1>categories</h1>
    <a href="<?= base_url('admin') ?>">Вернутся</a>
    <div class="table_sales col-md-6 col-lg-12 col-sm-12">
        <a class="btn btn-default" href="/admin/categories/add">Добавить новую запись</a>
        <table class="table table-hover table-condensed table-bordered">
            <thead>
            <tr>
                <th>Actions</th>
                <th>ID</th>
                <th>Name</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><a class="btn btn-primary"
                           href="/admin/categories/edit/<?= $category['id'] ?>">Редактировать</a>
                        <a class="btn btn-danger" href="/admin/categories/delete/<?= $category['id'] ?>">Удалить</a>
                    </td>
                    <td><?= $category['id'] ?></td>
                    <td><?= $category['category_name'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="fix"></div>
</div>

