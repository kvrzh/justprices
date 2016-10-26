<div class="sales">
    <header>
        <div class="logo col-lg-4 col-md-4 col-sm-6 col-xs-6 col-lg-offset-0 col-md-offset-0 ">
            <div class="menu-search col-md-2 col-sm-2 col-xs-2 hidden-lg"><i class="fa fa-search"
                                                                             aria-hidden="true"></i></div>
            <a href="/"><img class="img-responsive col-lg-6" src="<?= img_url('logo.png'); ?>"></a>
            <div class="social_header col-lg-6">
                <a href="#"><i class="fa fa-vk" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="search col-lg-4 col-md-4 col-sm-6 col-xs-6">
            <form action="" method="post" class="search">
                <input type="search" name="search" placeholder="Поиск" id="search" class="input"/>
                <input type="submit" name="" value="" class="submit"/>
            </form>
            <div id="search_advice_wrapper">Начните вводить запрос</div>
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
                <option selected value="1">Киев</option>
                <option value="2">Львов</option>
            </select>
        </div>
        <div class="filter-item">
            <label for="category">Выберите категорию:</label>
            <select name="category">
                <option value="0">Все категории</option>
                <option selected value="1">Магазины одежды</option>
                <option value="2">Рестораны и кафе</option>
            </select>
        </div>

        <button class="btn btn-success">Поиск</button>
        <span>Сбросить фильтр</span>
    </div>
    <div class="sales-list col-md-12 col-lg-8">

