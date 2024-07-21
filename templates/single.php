<div class="container" style="margin-top: 10px">
    <div class="row">
        <div class="col-lg-wide-75 col-md-wide-7 col-xs-1 padding-0">
            <?php if (op_get_showtime_movies() || op_get_notify()) : ?>
            <div class="myui-panel myui-panel-bg clearfix">
                <div class="myui-panel-box clearfix">
                    <div class="myui-panel_bd">
                        <?php if (op_get_showtime_movies()): ?>
                            <p><strong>Lịch chiếu : </strong> <?= op_get_showtime_movies(); ?></p>
                        <?php endif ?>
                        <?php if (op_get_notify()) : ?>
                            <p><strong>Thông báo : </strong> <?= op_get_notify() ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <?php endif ?>
            <div class="myui-panel myui-panel-bg clearfix">
                <div class="myui-panel-box clearfix">
                    <div class="col-xs-1">
                        <span class="text-muted">Trang chủ：</span>
                        <a href="">Phim</a> <i class="fa fa-angle-right text-muted"></i>
                        <span class="text-muted"><?php the_title() ?></span>
                    </div>
                    <div class="col-xs-1">
                        <div class="myui-content__thumb">
                            <a class="myui-vodlist__thumb picture" href="<?= watchUrl() ?>" title="<?php the_title() ?>">
                                <img class="lazyload" src="<?= get_template_directory_uri() ?>/assets/images/20230123-6dad92d2f.png"
                                     data-original="<?= op_get_thumb_url() ?>">
                                <span class="play hidden-xs"></span>
                            </a>
                        </div>
                        <div class="myui-content__detail">
                            <h1 class="title"><?php the_title() ?> <span class="year">(<?= op_get_year(' ') ?>)</span></h1>
                            <p class="otherbox"><?= op_get_lang() ?> <?= op_get_quality() ?></p>
                            <p class="data"><span class="text-muted">Đạo diễn：</span><?= op_get_directors(10, ', ') ?> </p>
                            <p class="data"><span class="text-muted">Diễn viên：</span><?= op_get_actors(10, ', ') ?> </p>
                            <p class="data"><span class="text-muted">Thể loại ：</span><?= op_get_genres(', ') ?> </p>
                            <p class="data"><span class="text-muted">Trạng thái ：</span><?= op_get_status() ?> </p>
                            <p class="data"><span class="text-muted">Thời lượng ：</span><?= op_get_runtime() ?> | <?= op_get_episode() ?>
                                | <?= op_get_total_episode() ?></p>
                            <p class="data hidden-xs"><span class="text-muted">Tag：</span><?= op_get_tags(', ') ?> </p>
                            <p class="data hidden-xs"><span class="text-muted">Đánh giá：</span>
                            <div class="rating-content">
                                <div id="movies-rating-star"></div>
                                <div>
                                    (<?= op_get_rating(); ?>
                                    sao
                                    /
                                    <?= op_get_rating_count() ?> đánh giá)
                                </div>
                                <div id="movies-rating-msg"></div>
                            </div>
                            </p>
                        </div>
                        <div class="myui-content__operate">
                            <?php if(watchUrl()) : ?>
                            <a class="btn btn-warm" href="<?= watchUrl() ?>"><i class="fa fa-play"></i>Xem Phim</a>
                            <?php endif ?>
                            <?php if (op_get_trailer_url()) :
                                parse_str(parse_url(op_get_trailer_url(), PHP_URL_QUERY), $my_array_of_vars);
                                $video_id = $my_array_of_vars['v'];
                                ?>
                                <a class="btn btn-warm fancybox fancybox.iframe" href="https://www.youtube.com/embed/<?= $video_id ?>"><i class="fa fa-play"></i>Trailer</a>
                            <?php endif ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="myui-panel myui-panel-bg clearfix" id="desc">
                <div class="myui-panel-box clearfix">
                    <div class="myui-panel_hd">
                        <div class="myui-panel__head active bottom-line clearfix">
                            <h3 class="title">
                                Nội dung
                            </h3>
                        </div>
                    </div>
                    <div class="myui-panel_bd">
                        <div class="col-pd text-collapse content">
                            <?php the_content() ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="myui-panel myui-panel-bg clearfix" >
                <div class="myui-panel-box clearfix">
                    <div class="myui-panel_hd">
                        <div class="myui-panel__head active bottom-line clearfix">
                            <h3 class="title">
                               Bình luận
                            </h3>
                        </div>
                    </div>
                    <div class="myui-panel_bd">
                        <div class="col-pd text-collapse content">
                            <div style="width: 100%; background-color: #fff">
                                <div class="fb-comments w-full" data-href="<?= getCurrentUrl() ?>" data-width="100%"
                                     data-numposts="5" data-colorscheme="light" data-lazy="true">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="myui-panel myui-panel-bg clearfix">
                <div class="myui-panel-box clearfix">
                    <div class="myui-panel_hd">
                        <div class="myui-panel__head active bottom-line clearfix">
                            <h3 class="title">Có thể bạn thích </h3>
                        </div>
                    </div>
                    <div class="tab-content myui-panel_bd">
                        <ul id="type" class="myui-vodlist__bd tab-pane fade in active clearfix">
                            <?php
                            $postType = 'ophim';
                            $taxonomyName = 'ophim_genres';
                            $taxonomy = get_the_terms(get_the_id(), $taxonomyName);
                            if ($taxonomy) {
                                $category_ids = array();
                                foreach ($taxonomy as $individual_category) $category_ids[] = $individual_category->term_id;
                                $args = array('post_type' => $postType, 'post__not_in' => array(get_the_id()), 'posts_per_page' => 12, 'tax_query' => array(array('taxonomy' => $taxonomyName, 'field' => 'term_id', 'terms' => $category_ids,),));
                                $my_query = new wp_query($args);

                                if ($my_query->have_posts()):
                                    while ($my_query->have_posts()):$my_query->the_post();
                                echo ' <li class="col-lg-6 col-md-6 col-sm-4 col-xs-3">';
                                        get_template_part('templates/section/section_thumb_item');
                                        echo ' </li>';
                                    endwhile;
                                endif;
                                wp_reset_query();
                            }
                            ?>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <?php get_sidebar('ophim'); ?>
</div>
<?php add_action('wp_footer', function () { ?>
    <script src="<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/jquery.raty.js"></script>
    <link href="<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/jquery.raty.css" rel="stylesheet"
          type="text/css"/>
    <script>
        var rated = false;
        $('#movies-rating-star').raty({
            score: <?= op_get_rating(); ?>,
            number: 10,
            numberMax: 10,
            hints: ['quá tệ', 'tệ', 'không hay', 'không hay lắm', 'bình thường', 'xem được', 'có vẻ hay', 'hay',
                'rất hay', 'siêu phẩm'
            ],
            starOff: '<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/images/star-off.png',
            starOn: '<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/images/star-on.png',
            starHalf: '<?= get_template_directory_uri() ?>/assets/plugins/jquery-raty/images/star-half.png',
            click: function (score, evt) {
                if (rated) return
                $.ajax({
                    url: '<?php echo admin_url('admin-ajax.php')?>',
                    type: 'POST',
                    data: {
                        action: "ratemovie",
                        rating: score,
                        postid: '<?php echo get_the_ID(); ?>',
                    },
                }).done(function (data) {
                    $('#movies-rating-msg').html(`Bạn đã đánh giá ${score} sao cho phim này!`);
                });
                rated = true;
                //$('#movies-rating-star').data('raty').readOnly(true);
            }
        });
    </script>
    <script src="<?= get_template_directory_uri() ?>/assets/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css"
          href="<?= get_template_directory_uri() ?>/assets/source/jquery.fancybox.css?v=2.1.5" media="screen"/>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".fancybox").fancybox({
                maxWidth: 800,
                maxHeight: 600,
                fitToView: false,
                width: '70%',
                height: '70%',
                autoSize: false,
                closeClick: false,
                openEffect: 'none',
                closeEffect: 'none'
            });
        });

    </script>
<?php }) ?>


