<?php
get_header();
?>

<div class="container">
    <div class="row">
        <?php
        $regions = oIsset($_GET,'regions');
        $genres = oIsset($_GET,'genres');
        $years = oIsset($_GET,'years');
        $categories = oIsset($_GET,'categories');
        ?>
        <div class="myui-panel active myui-panel-bg2 clearfix">
            <div class="myui-panel-box clearfix">
                <div class="myui-panel_hd">
                    <div class="myui-panel__head active bottom-line clearfix">
                        <a class="slideDown-btn more pull-right" href="javascript:">Rút gọn <i class="fa fa-angle-up"></i></a>
                        <h3 class="title"><?php if($s) : ?>Tìm kiếm : <?= $s ?> <?php else: echo 'Lọc phim'; endif ?></h3>

                    </div>
                </div>

                <div class="myui-panel_bd">

                    <div class="slideDown-box">

                        <ul class="myui-screen__list nav-slide clearfix" data-align="left">
                            <li>
                                <a class="btn text-muted" href="">Danh mục</a>
                            </li>
                            <li>
                                <?php $slug = get_option('ophim_slug_categories') ? get_option('ophim_slug_categories') : 'genres';
                                foreach (get_terms(array('taxonomy' => 'ophim_categories', 'hide_empty' => false,)) as $categorie) : ?>
                                    <a class="btn <?php if($categorie->slug == $categories) : ?> btn-warm <?php endif?>"
                                       href="<?= home_url( "/?s=".$s."&genres=". $genres."&regions=".$regions."&years=".$years."&categories=".$categorie->slug) ?>"><?= $categorie->name ?></a>
                                <?php endforeach; ?>
                            </li>
                        </ul>
                        <ul class="myui-screen__list nav-slide clearfix" data-align="left">
                            <li>
                                <a class="btn text-muted" href="">Thể loại</a>
                            </li>
                            <li>
                                <?php $slug = get_option('ophim_slug_genres') ? get_option('ophim_slug_genres') : 'genres';
                                foreach (get_terms(array('taxonomy' => 'ophim_genres', 'hide_empty' => false,)) as $genre) : ?>
                                    <a class="btn <?php if($genre->slug == $genres) : ?> btn-warm <?php endif?>"
                                       href="<?= home_url( "/?s=".$s."&genres=". $genre->slug."&regions=".$regions."&years=".$years."&categories=".$categories) ?>"><?= $genre->name ?></a>
                                <?php endforeach; ?>
                            </li>
                        </ul>
                        <ul class="myui-screen__list nav-slide clearfix" data-align="left">
                            <li>
                                <a class="btn text-muted" href="">Quốc gia</a>
                            </li>
                            <li>
                                <?php $slug = get_option('ophim_slug_regions') ? get_option('ophim_slug_regions') : 'regions';
                                foreach (get_terms(array('taxonomy' => 'ophim_regions', 'hide_empty' => false,)) as $region) : ?>
                                    <a class="btn <?php if($region->slug == $regions) : ?> btn-warm <?php endif?>"
                                       href="<?= home_url( "/?s=".$s."&genres=". $genres."&regions=".$region->slug."&years=".$years."&categories=".$categories) ?>"><?= $region->name ?></a>
                                <?php endforeach; ?>
                            </li>

                        </ul>
                        <ul class="myui-screen__list nav-slide clearfix" data-align="left">
                            <li>
                                <a class="btn text-muted" href="">Năm</a>
                            </li>
                            <li>
                                <?php $slug = get_option('ophim_slug_years') ? get_option('ophim_slug_years') : 'years';
                                foreach (get_terms(array('taxonomy' => 'ophim_years', 'hide_empty' => false,)) as $year) : ?>
                                    <a class="btn <?php if($year->slug == $years) : ?> btn-warm <?php endif?>"
                                       href="<?= home_url( "/?s=".$s."&genres=". $genres."&regions=".$regions."&years=".$year->slug."&categories=".$categories) ?>"><?= $year->name ?></a>
                                <?php endforeach; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- &#31579;&#36873; -->

        <div class="myui-panel myui-panel-bg clearfix">
            <div class="myui-panel-box clearfix">
                <div class="myui-panel_bd">
                    <ul class="myui-vodlist clearfix">
                        <?php
                        if (have_posts()) {
                            while (have_posts()) {
                                the_post();
                                echo '<li class="col-lg-7 col-md-6 col-sm-4 col-xs-3">';
                                get_template_part('templates/section/section_thumb_item');
                                echo '</li>';
                            }
                            wp_reset_postdata();
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php ophim_pagination(); ?>

    </div>
</div>
<?php
get_footer();
?>
