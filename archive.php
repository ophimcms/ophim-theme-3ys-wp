<?php
get_header();
?>
<div class="container" style="margin-top: 10px">
    <div class="row">
        <div class="myui-panel active myui-panel-bg2 clearfix">
            <div class="myui-panel-box clearfix">
                <div class="myui-panel_hd">
                    <div class="myui-panel__head active  clearfix">
                        <h3 class="title"> <?= single_tag_title(); ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="myui-panel myui-panel-bg clearfix">
            <div class="myui-panel-box clearfix">
                <div class="myui-panel_bd">
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post(); ?>
                            <div class="row" style="margin-bottom: 20px">
                                <div class="col-md-12 blogShort">

                                    <a href="<?php the_permalink(); ?>"><img style="width: 150px;margin-right: 15px" src="<?= op_remove_domain(get_the_post_thumbnail_url()) ?>"
                                                                             alt="<?php the_title(); ?>" class="pull-left img-responsive thumb margin10 img-thumbnail"></a>
                                    <br>
                                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                    <article>
                                        <p>
                                            <?php the_excerpt(); ?>
                                        </p></article>
                                    <a class="btn btn-blog pull-right marginBottom10" href="<?php the_permalink(); ?>">Xem thêm</a>
                                </div>

                            </div>
                        <?php }
                        wp_reset_postdata();
                    } ?>
                </div>
            </div>
        </div>
        <?php ophim_pagination(); ?>

    </div>
</div>
<?php
get_footer();
?>

