<div class="sales">
    <header>
        <div class="logo col-lg-4 col-md-4 col-sm-6 col-xs-6 col-lg-offset-0 col-md-offset-0 ">
            <div class="menu-search col-md-2 col-sm-2 col-xs-2 hidden-lg"><i class="fa fa-search"
                                                                             aria-hidden="true"></i></div>
            <img class="img-responsive col-lg-6" src="<?= img_url('logo.png'); ?>">
            <div class="social_header col-lg-6">
                <a href="#"><i class="fa fa-vk" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="search col-lg-4 col-md-4 col-sm-6 col-xs-6">
            <form action="" method="post" class="search">
                <input type="search" name="" placeholder="Поиск" class="input"/>
                <input type="submit" name="" value="" class="submit"/>
            </form>
        </div>
        <div class="login col-lg-4 col-md-4 hidden-sm hidden-xs">
            <span>You can't see me - my time is now!</span>
        </div>
    </header>
    <div class="filter col-lg-2 hidden-md hidden-sm hidden-xs">
        <div class="filter-item">
            <label for="city">Выберите город:</label>
            <select>
                <option value="0" disabled>Город</option>
                <option selected value="1">Киев</option>
                <option value="2">Львов</option>
            </select>
        </div>
        <div class="filter-item">
            <label for="category">Выберите категорию:</label>
            <select>
                <option value="0">Все категории</option>
                <option selected value="1">Магазины одежды</option>
                <option value="2">Рестораны и кафе</option>
            </select>
        </div>

        <button class="btn btn-success">Поиск</button>
        <span>Сбросить фильтр</span>
    </div>
    <div class="sales-list col-md-12 col-lg-8">
        <?php foreach ($sales as $sale): ?>
            <div class="sales-list-item" onload="setPadding()">
                <img src="<?= img_url('logos/' . $sale['image']) ?>">
                <div class="sale-shop-info">
                    <h3><?= $sale['name'] ?></h3>
                    <p><?= $sale['description'] ?></p>
                </div>
                <div class="sale-info">
                    <input name="sales_id" type="hidden" value="<?=$sale['sales_id'] ?>">
                    <span>Скидка<br><b><?= $sale['sale'] ?></b></span>
                    <small>Действует до<br><b><?= $sale['date'] ?></b></small>
                    <button class="btn btn-success">Подробнее</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

