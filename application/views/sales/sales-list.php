<script>
    loadSale();
</script>
<div class="sales-list-load">
    <?php foreach ($sales as $sale): ?>
        <div class="sales-list-item" onload="setPadding()">
            <img src="<?= img_url('logos/' . $sale['image']) ?>">
            <div class="sale-shop-info">
                <h3><?= $sale['name'] ?></h3>
                <p><?= $sale['description'] ?></p>
            </div>
            <div class="sale-info">
                <input name="sales_id" type="hidden" value="<?= $sale['sales_id'] ?>">
                <span>Скидка<br><b><?= $sale['sale'] ?></b></span>
                <small>Действует до<br><b><?= $sale['date'] ?></b></small>
                <button class="btn btn-success">Подробнее</button>
            </div>
        </div>
    <?php endforeach; ?>
</div>