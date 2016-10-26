<script>
    $(document).ready(function(){
        loadSaleList();
    })
</script>
<div class="sale_item_details">
<i class="fa fa-times" aria-hidden="true"></i>
<h1>Cкидка: <b><?= $sale->sale ?></b></h1>
<span><?= $sale->name ?></span>
<img src="<?=img_url('/logos/'.$sale->image) ?>">
<p><?=$sale->description ?></p>
<div class="sale_terms col-lg-8 col-md-8 col-sm-12 col-xs-12">
    <h3>Условия акции:</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec eros sit amet dolor facilisis malesuada sit amet ac felis. Curabitur eget faucibus eros, eu dictum est. Integer feugiat, purus vel elementum egestas, quam mauris luctus nisl, non faucibus elit enim nec lacus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
</div>
<div class="sale_date col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <h3>Действует до:</h3>
    <span><?= $sale->date ?></span>
    <h3>Адрес: </h3>
    <?php foreach($sale->address as $address): ?>
    <span><?= $address ?></span>
    <?php endforeach ?>
</div>
    <div class="fix"></div>
</div>
