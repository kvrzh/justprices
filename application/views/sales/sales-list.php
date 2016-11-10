<div class="sales-list-load">
    <h1><?=$city ?></h1>
    <?php if($sales == false): ?>
        <div class="filter_error">
            <h2>Извините, по запросу не было найдено ни одной скидки.</h2>
            <i class="fa fa-exclamation" aria-hidden="true"></i>
            <button class="btn btn-success">Сбросить фильтр</button>
        </div>
    <?php else: ?>
        <?php foreach ($sales as $sale): ?>
            <div class="sales-list-item">
            <h3><?= $sale['name'] ?></h3>
            <img src="<?= img_url('logos/' . $sale['image']) ?>">
            <div class="sale-shop-info">
                <span><?= $sale['category_name'] ?></span>
                <p><?= $sale['sale_description'] ?></p>
            </div>
            <div class="sale-info">
                <input name="sales_id" type="hidden" value="<?= $sale['sales_id'] ?>">
                <span>Скидка<br><b><?= $sale['sale'] ?></b></span>
                <small>Действует до<br><b><?= $sale['date'] ?></b></small>
                <button class="btn btn-success">Подробнее</button>
            </div>
        </div>
        <?php endforeach; ?>
        <?php if (isset($new_sales) && $new_sales == true): ?>
        <div class="button_pagination">
            <button class="btn btn-success">Больше скидок</button>
        </div>
        <?php endif; ?>
    <?php endif; ?>
</div>