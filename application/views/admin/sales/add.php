
<div class="admin">
    <?php if (isset($status)): ?>
        <div class="popup_status">
            <span><?= $status ?></span>
        </div>
    <?php endif ?>
    <a href="<?= base_url('admin/sales') ?>">Вернутся</a>
    <h1>Add Sale</h1>
    <form action="" method="post">
        <label for="shop">Выберите магазин:</label>
        <select name="shop" required>
            <option selected disabled>Выберите магазин, в котором скидка</option>
            <?php foreach ($shops as $shop): ?>
                <option value="<?= $shop['shops_id'] ?>"><?= $shop['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="sale">Укажите скидку</label>
        <input name="sale" type="text" placeholder="Укажите скидку" required>
        <label for="date">Укажите дату, до которой дествительна скидка</label>
        <input type="date" name="date" required>
        <label for="category_id">Выберите категорию скидки:</label>
        <select name="category_id" required>
            <option selected disabled>Выберите категорию скидки</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="cities">Выберите город:</label>
        <select multiple name="cities[]" required>
            <option selected disabled>Выберите город</option>
            <?php foreach ($cities as $city): ?>
                <option value="<?= $city['id'] ?>"><?= $city['city_name'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="address">Адресс(через ; каждый новый адресс)</label>
        <input type="text" name="address" required>
        <label for="sale_description">Укажите описание скидки</label>
        <textarea rows="10" cols="45" name="sale_description"></textarea>
        <input type="submit" class="btn btn-success">
    </form>
</div>
