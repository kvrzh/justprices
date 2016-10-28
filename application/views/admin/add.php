<div class="admin">
    <h1>Add Sale</h1>
    <form action="" method="post">
        <label for="shop">Выберите магазин:</label>
        <select name="shop">
            <option selected disabled>Выберите магазин, в котором скидка</option>
            <?php foreach ($shops as $shop): ?>
                <option value="<?= $shop['id'] ?>"><?= $shop['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="sale">Укажите скидку</label>
        <input name="sale" type="text" placeholder="Укажите скидку">
        <label for="date">Укажите дату, до которой дествительна скидка</label>
        <input type="date" name="date">
        <label for="category">Выберите категорию скидки:</label>
        <select name="category">
            <option selected disabled>Выберите категорию скидки</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="category">Выберите город:</label>
        <select name="category">
            <option selected disabled>Выберите город</option>
            <?php foreach ($cities as $city): ?>
                <option value="<?= $city['city_id'] ?>"><?= $city['city_name'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="description">Описание</label>
        <textarea name="description">Описание</textarea>
        <label for="address">Адресс(через ; каждый новый адресс)</label>
        <input type="text" name="address">
        <input type="submit" class="btn btn-success">
    </form>
</div>