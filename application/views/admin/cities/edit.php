<div class="admin">
    <?php if (isset($status)): ?>
        <div class="popup_status">
            <span><?= $status ?></span>
        </div>
    <?php endif ?>
    <a href="<?= base_url('admin/cities') ?>">Вернутся</a>
    <h1>Edit City</h1>
    <form action="" method="post">
        <label for="city_name">Укажите название города</label>
        <input name="city_name" type="text" value="<?= $cities[0]['city_name'] ?>" placeholder="Укажите город" required>
        <input type="submit" class="btn btn-success">
    </form>
</div>
