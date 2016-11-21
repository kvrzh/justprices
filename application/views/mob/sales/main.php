<div class="sales">
    <header>
        <div class="menu">
            <i class="fa fa-bars" aria-hidden="true"></i>
            <h1>Киев</h1>
        </div>
    </header>
    <div class="all-menu">
        <h1>Just<b>Sales</b></h1>
        <form action="" id="formsearch" method="post" class="search">
            <input type="search" autocomplete="off" name="search" placeholder="Поиск" id="search" class="input"/>
            <input type="submit" name="" value="" class="submit"/>
        </form>
        <div id="search_advice_wrapper"></div>
        <div class="filter-item">
            <label for="city">Выберите город:</label>
            <select name="city">
                <option disabled>Город</option>
                <?php foreach ($cities as $item): ?>
                    <?php if ($city == $item['city_name']): ?>
                        <option selected value="<?= $item['id'] ?>"><?= $item['city_name'] ?></option>
                    <?php else: ?>
                        <option value="<?= $item['id'] ?>"><?= $item['city_name'] ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="filter-item">
            <label for="category">Выберите категорию:</label>
            <select name="category">
                <option selected value="0">Все категории</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button class="btn btn-success">Поиск</button>
        <span>Сбросить фильтр</span>
    </div>
    <div class="sales-list">
        <div class="sales-list-load">
            <?php foreach ($sales as $sale): ?>
                <div class="sales-list-item">
                    <img src="<?= img_url('logos/' . $sale['image']) ?>">
                    <div class="sale-info">
                        <h4><?= $sale['name'] ?></h4>
                        <span><?= $sale['category_name'] ?></span>
                        <small>Действует до:<b><?= $sale['date'] ?></b></small>
                    </div>
                    <span><?= $sale['sale'] ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
