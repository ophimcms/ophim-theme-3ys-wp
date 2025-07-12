<div class="myui-panel myui-panel-bg clearfix">
    <div class="myui-panel-box clearfix">
        <div class="myui-panel_hd">
            <div class="myui-panel__head active bottom-line clearfix">
                <h3 class="title">
                    <?php echo $title; ?>
                </h3>
            </div>
        </div>
        <div class="myui-panel_bd clearfix">
            <ul class="myui-newslist__text clearfix">
                <?php $key = 0;
                while ($query->have_posts()) : $query->the_post();
                    $key++ ?>
                <li class="col-md-2 col-sm-2 col-xs-1 text-overflow">
                    <span><?= $key?>. </span><a href="<?php the_permalink(); ?>"
                                      target="_blank" rel="nofollow"><?php the_title(); ?></a></li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</div>