<header class="myui-header__top clearfix" id="header-top">
    <div class="container">
        <div class="row">
            <div class="myui-header_bd clearfix">

                <!-- Logo -->
                <div class="myui-header__logo">
                    <a href="/" class="logo" title="">
                        <?php op_the_logo('max-height:60px;width:100%'); ?>
                    </a>
                </div>

                <!-- Mobile toggles -->
                <button class="mobile-menu-toggle visible-xs" id="mobile-menu-toggle">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </button>

                <button class="mobile-search-toggle visible-xs" id="mobile-search-toggle">
                    <i class="fa fa-search"></i>
                </button>

                <!-- Navigation menu -->
                <ul class="myui-header__menu nav-menu" id="main-menu">
                    <?php $menu_items = op_get_menu_array('primary-menu'); ?>
                    <?php foreach ($menu_items as $index => $item): ?>
                        <?php if (empty($item['children'])): ?>
                            <li><a href="<?= $item['url'] ?>"><?= $item['title'] ?></a></li>
                        <?php else: ?>
                            <li class="dropdown-hover">
                                <a href="javascript:;" class="dropdown-toggle" data-dropdown="dropdown-<?= $index ?>">
                                    <?= $item['title'] ?> <i class="fa fa-angle-down"></i>
                                </a>
                                <div class="dropdown-box bottom fadeInDown clearfix" id="dropdown-<?= $index ?>">
                                    <ul class="item nav-list clearfix">
                                        <?php foreach ($item['children'] as $child): ?>
                                            <li class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                <a class="btn btn-sm btn-block btn-warm" href="<?= $child['url'] ?>">
                                                    <?= $child['title'] ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>

                <!-- Search Box -->
                <div class="myui-header__search search-box" id="search-box">
                    <form method="get" action="/">
                        <input type="text" name="search" id="search"
                               class="search_wd form-control"
                               value="<?= htmlspecialchars($s ?? '') ?>"
                               placeholder="Tìm kiếm" autocomplete="off" onkeyup="fetch()"
                               style="padding-left:12px;">
                        <button type="submit" class="submit search_submit" id="searchbutton">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                    <a class="search-close visible-xs" href="javascript:;" id="search-close">
                        <i class="fa fa-close"></i>
                    </a>
                    <div id="result"></div>
                </div>

            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu Overlay -->
<div class="mobile-menu-overlay" id="mobile-menu-overlay"></div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const $mainMenu = $('#main-menu');
        const $menuToggle = $('#mobile-menu-toggle');
        const $menuOverlay = $('#mobile-menu-overlay');
        const $body = $('body');
        const $searchBox = $('#search-box');
        const $searchToggle = $('#mobile-search-toggle');
        const $searchClose = $('#search-close');
        const $searchInput = $('#search');

        // Clear search results on body click
        document.body.addEventListener("click", () => $('#result').html(''));

        // Toggle mobile menu
        $menuToggle.on('click', function () {
            $mainMenu.toggleClass('mobile-menu-active');
            $menuOverlay.toggleClass('active');
            $(this).toggleClass('menu-open');
            $body.toggleClass('menu-open');
        });

        // Toggle mobile search
        $searchToggle.on('click', function () {
            $searchBox.toggleClass('search-active');
            if ($searchBox.hasClass('search-active')) $searchInput.focus();
        });

        // Close search box
        $searchClose.on('click', () => $searchBox.removeClass('search-active'));

        // Dropdown toggle (only mobile)
        $('.dropdown-toggle').on('click', function (e) {
            if ($(window).width() <= 767) {
                e.preventDefault();
                const target = $(this).data('dropdown');
                $('#' + target).toggleClass('mobile-dropdown-active');
                $(this).parent().toggleClass('mobile-dropdown-open');
            }
        });

        // Click outside to close menu
        $(document).on('click', function (e) {
            if (!$(e.target).closest('.myui-header__menu, .mobile-menu-toggle').length) {
                $mainMenu.removeClass('mobile-menu-active');
                $menuOverlay.removeClass('active');
                $menuToggle.removeClass('menu-open');
                $body.removeClass('menu-open');
            }
        });

        // Overlay click closes menu
        $menuOverlay.on('click', () => {
            $mainMenu.removeClass('mobile-menu-active');
            $menuOverlay.removeClass('active');
            $menuToggle.removeClass('menu-open');
            $body.removeClass('menu-open');
        });
    });
</script>
