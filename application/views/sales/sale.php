<script>
    $(document).ready(function(){
        loadSaleList();
    })
</script>
<div class="sale_item_details">
<i class="fa fa-times" aria-hidden="true"></i>
<h1>Cкидка: <b><?= $sale->sale ?></b></h1>
<h3><?= $sale->name ?></h3>
    <span><b><?= decode_encode_category((int)$sale->category_id) ?></b></span>
<img src="<?=img_url('/logos/'.$sale->image) ?>">

<p><?=$sale->description ?></p>
<div class="sale_terms col-lg-8 col-md-8 col-sm-12 col-xs-12">
    <h3>Условия акции:</h3>
    <p><?= $sale->sale_description ?></p>
</div>
<div class="sale_date col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <h3>Действует до:</h3>
    <span><?= $sale->date ?></span>
    <h3>Адрес: </h3>
    <span><b><?= decode_encode_city((int)$sale->city_id) ?></b></span>
    <?php foreach($sale->address as $address): ?>
    <span><?= $address ?></span>
    <?php endforeach ?>
</div>
    <div class="fix"></div>
</div>
