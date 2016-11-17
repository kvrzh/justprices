<div class="sales">
    <header>
        <div class="logo col-lg-4 col-md-4 col-sm-6 col-xs-6 col-lg-offset-0 col-md-offset-0 ">
            <div class="menu-search col-md-2 col-sm-2 col-xs-2 hidden-lg"><i class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <a href="/"><img class="img-responsive col-lg-6 hidden-xs"" src="<?= img_url('logo.png'); ?>"></a>
            <div class="social_header col-lg-6">
                <a href="https://www.facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="search col-lg-4 col-md-4 col-sm-6 col-xs-6">
            <form action="" id="formsearch" method="post" class="search">
                <input type="search" autocomplete="off" name="search" placeholder="Поиск" id="search" class="input"/>
                <input type="submit" name="" value="" class="submit"/>
            </form>
            <div id="search_advice_wrapper"></div>
        </div>
        <div class="login col-lg-4 col-md-4 hidden-sm hidden-xs">
            <span>You can't see me - my time is now!</span>
        </div>
    </header>
    <div class="filter col-lg-2 hidden-md hidden-sm hidden-xs">
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
    <div class="sales-list col-md-12 col-lg-8 col-sm-12 col-xs-12 ">

