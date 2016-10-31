<div class="admin">
    <?php if (isset($status)): ?>
        <div class="popup_status">
            <span><?= $status ?></span>
        </div>
    <?php endif ?>
    <a href="<?= base_url('admin/shops') ?>">Вернутся</a>
    <h1>Edit shop</h1>
    <form action="" method="post">
        <form action="" method="post">
            <label for="name">Укажите название магазина</label>
            <input name="name" type="text" value="<?= $shops[0]['name'] ?>" placeholder="Укажите название" required>
            <label for="description">Укажите описание магазина</label>
            <textarea rows="10" cols="45" name="description"><?= $shops[0]['description'] ?></textarea>
            <label for="image">Укажите название изображения</label>
            <input name="image" type="text" value="<?= $shops[0]['image'] ?>" placeholder="Укажите название изображения"
                   required>
            <input type="submit" class="btn btn-success">
        </form>
    </form>
</div>
