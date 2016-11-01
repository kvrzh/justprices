<div class="admin">
    <?php if (isset($status)): ?>
        <div class="popup_status">
            <span><?= $status ?></span>
        </div>
    <?php endif ?>
    <a href="<?= base_url('admin/categories') ?>">Вернутся</a>
    <h1>Edit category</h1>
    <form action="" method="post">
        <label for="category_name">Укажите название категории</label>
        <input name="category_name" type="text" value="<?= $categories[0]['category_name'] ?>"
               placeholder="Укажите город" required>
        <input type="submit" class="btn btn-success">
    </form>
</div>
