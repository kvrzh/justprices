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
            <option disabled>Выберите магазин, в котором скидка</option>
            <?php foreach ($shops as $shop): ?>
                <?php if ($shop['shops_id'] == $sale[0]['shop']): ?>
                    <option selected value="<?= $shop['shops_id'] ?>"><?= $shop['name'] ?></option>
                <?php else: ?>
                    <option value="<?= $shop['shops_id'] ?>"><?= $shop['name'] ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <label for="sale">Укажите скидку</label>
        <input name="sale" type="text" placeholder="Укажите скидку" value="<?= $sale[0]['sale'] ?>" required>
        <label for="date">Укажите дату, до которой дествительна скидка</label>
        <input type="date" name="date" value="<?= $sale[0]['date'] ?>" required>
        <label for="category_id">Выберите категорию скидки:</label>
        <select name="category_id" required>
            <option selected disabled>Выберите категорию скидки</option>
            <?php foreach ($categories as $category): ?>
                <?php if ($category['category_id'] == $sale[0]['category_id']): ?>
                    <option selected value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
                <?php else: ?>
                    <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <label for="city_id">Выберите город:</label>
        <select multiple name="cities[]" required>
            <option selected disabled>Выберите город</option>
            <?php foreach ($cities as $city): ?>
                <?php for ($i = 0; $i < count($sale[0]['city_id']); $i++): ?>
                    <?php if ($city['id'] == $sale[0]['city_id'][$i]): ?>
                        <option selected value="<?= $city['id'] ?>"><?= $city['city_name'] ?></option>
                        <?php break ?>
                    <?php endif; ?>
                    <?php if ($i == count($sale[0]['city_id']) - 1): ?>
                        <option value="<?= $city['id'] ?>"><?= $city['city_name'] ?></option>
                        <?php break ?>
                    <?php endif; ?>
                <?php endfor; ?>
            <?php endforeach; ?>
        </select>
        <label for="address">Адресс(через ; каждый новый адресс)</label>
        <input type="text" name="address" value="<?= $sale[0]['address'] ?>" required>
        <label for="sale_description">Укажите описание скидки</label>
        <textarea rows="10" cols="45" name="sale_description"><?= $sale[0]['sale_description'] ?></textarea>
        <input type="submit" class="btn btn-success">
    </form>
</div>
