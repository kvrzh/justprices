<div class="sales">
    <header>
        <div class="logo col-lg-4 col-md-4 col-sm-5 col-xs-6 col-sm-offset-1 col-lg-offset-0 col-md-offset-0 ">
            <img class="img-responsive col-lg-6" src="<?= img_url('logo.png'); ?>">
            <div class="col-lg-6">
                <a href="#"><i class="fa fa-vk" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="search col-lg-4 col-md-4 col-sm-5 col-xs-6">
            <form action="" method="post" class="search">
                <input type="search" name="" placeholder="Поиск" class="input"/>
                <input type="submit" name="" value="" class="submit"/>
            </form>
        </div>
        <div class="login col-lg-4 col-md-4 hidden-sm hidden-xs">
            <span>You can't see me - my time is now!</span>
        </div>
    </header>
    <div class="sales-list col-md-12 col-lg-8 col-lg-offset-2">
        <?php foreach ($sales as $sale): ?>

            <div class="sales-list-item" onload="setPadding()">
            <img src="<?= img_url('logos/' . $sale['image']) ?>">
            <div class="sale-shop-info">
                <h3><?= $sale['name'] ?></h3>
                <p><?= $sale['description'] ?></p>
            </div>
            <div class="sale-info">
                <span>Скидка<br><b><?= $sale['sale'] ?></b></span>
                <small>Действует до<br><b><?= $sale['date'] ?></b></small>
                <button class="btn btn-success">Подробнее</button>
            </div>
        </div>

        <?php endforeach; ?>
    </div>
</div>

