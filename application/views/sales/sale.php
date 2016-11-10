<div class="sale_item_details">
    <i><img src="<?= img_url('cross.png'); ?>"/></i>
    <?php if ($status == true && isset($status)): ?>
        <input type="hidden" name="sales_id" value="<?= $sale[0]['sales_id'] ?>">
    <h1>Cкидка: <b><?= $sale[0]['sale'] ?></b></h1>
    <h3><?= $sale[0]['name'] ?></h3>
        <span><b><?= $sale[0]['category_name'] ?></b></span>
    <img src="<?= img_url('/logos/' . $sale[0]['image']) ?>">

    <p><?= $sale[0]['description'] ?></p>
<div class="sale_terms col-lg-8 col-md-8 col-sm-12 col-xs-12">
    <h3>Условия акции:</h3>
    <p><?= $sale[0]['sale_description'] ?></p>
</div>
<div class="sale_date col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <h3>Действует до:</h3>
    <span><?= $sale[0]['date'] ?></span>
    <h3>Адрес: </h3>
    <span><b><?= decode_encode_city((int)$sale[0]['city_id']) ?></b></span>
    <?php foreach ($sale[0]['address'] as $address): ?>
    <span><?= $address ?></span>
    <?php endforeach ?>
</div>
    <?php else: ?>
        <h1>Такой страницы нет</h1>
    <?php endif; ?>
    <div class="fix"></div>
</div>
