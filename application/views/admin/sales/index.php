<div class="admin">
    <h1>Sales</h1>
    <a href="<?= base_url('admin') ?>">Вернутся</a>
    <div class="table_sales col-md-6 col-lg-12 col-sm-12">
        <a class="btn btn-default" href="/admin/sales/add">Добавить новую запись</a>
        <table class="table table-hover table-condensed table-bordered">
            <thead>
            <tr>
                <th>Actions</th>
                <th>ID</th>
                <th>Shop</th>
                <th>Sale</th>
                <th>Date</th>
                <th>Category</th>
                <th>City</th>
                <th>Address</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($sales as $sale): ?>
                <tr>
                    <td><a class="btn btn-primary" href="/admin/sales/edit/<?= $sale['sales_id'] ?>">Редактировать</a>
                        <a class="btn btn-danger" href="/admin/sales/delete/<?= $sale['sales_id'] ?>">Удалить</a>
                    </td>
                    <td><?= $sale['sales_id'] ?></td>
                    <td><?= $sale['name'] ?></td>
                    <td><?= $sale['sale'] ?></td>
                    <td><?= $sale['date'] ?></td>
                    <td><?= $sale['category_name'] ?></td>
                    <td><?php if (is_array($sale['city_name'])): ?>
                            <?php foreach ($sale['city_name'] as $city): ?>
                                <?php echo $city . '<br>' ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <?= $sale['city_name'] ?>
                        <?php endif; ?>
                    </td>
                    <td><?= $sale['address'] ?></td>
                    <td><?= $sale['sale_description'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="fix"></div>
</div>

