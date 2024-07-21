<header class="myui-header__top clearfix" id="header-top">
    <div class="container">
        <div class="row">
            <div class="myui-header_bd clearfix">
                <div class="myui-header__logo">
                    <a href="/" class="logo" title="">
                        <?php op_the_logo('max-height:60px;width:100%') ?>
                    </a>
                </div>
                <ul class="myui-header__menu nav-menu">
                    <?php
                    $menu_items = op_get_menu_array('primary-menu');
                    foreach ($menu_items as $key => $item) : ?>
                        <?php if (empty($item['children'])) { ?>
                            <li class="hidden-sm hidden-xs"><a href="<?= $item['url'] ?>"><?= $item['title'] ?></a></li>
                        <?php } else { ?>
                            <li class="dropdown-hover">
                                <a href="javascript:"><?= $item['title'] ?> <i class="fa fa-angle-down"></i></a>
                                <div class="dropdown-box bottom fadeInDown clearfix">
                                    <ul class="item nav-list clearfix">
                                        <?php foreach ($item['children'] as $k => $child): ?>
                                            <li class="col-lg-5 col-md-5 col-sm-5 col-xs-3"><a
                                                        class="btn btn-sm btn-block btn-warm"
                                                        href="<?= $child['url'] ?>"><?= $child['title'] ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </li>
                        <?php } ?>
                    <?php endforeach; ?>
                </ul>
                <div class="myui-header__search search-box">
                    <form id="" name="search" method="get" action="/">
                        <input type="text" id="search" name="s" class="search_wd form-control" value="<?php echo "$s"; ?>"  onkeyup="fetch()"
                               placeholder="Tìm kiếm"
                               autocomplete="off" style=" padding-left: 12px; ">
                        <button class="submit search_submit" id="searchbutton" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                    <a class="search-close visible-xs" href="javascript:"><i class="fa fa-close"></i></a>

                    <div class="" id="result"></div>
                </div>
            </div>
        </div>
    </div>
</header>