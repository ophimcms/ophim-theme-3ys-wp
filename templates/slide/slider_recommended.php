<script type="text/javascript">
    MyTheme.Other.Headroom();
</script>
<div class="mt10 wrap myui-panel hidden-xs">
    <div class="gray">
        <div class="qy20-h-carousel__inner">
            <ul class="list">
                <?php $key = 0;
                while ($query->have_posts()) : $query->the_post(); ?>
                    <li class="sitem show"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><img
                                    src="<?= op_get_poster_url() ?>"></a></li>
                <?php endwhile; ?>
            </ul>
        </div>
        <ul class="pointList">
            <?php $key = -1;
            while ($query->have_posts()) : $query->the_post();
                $key++ ?>
                <li class="point show" data-index="<?= $key ?>">
                    <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                        <p><?= op_get_original_title() ?></p>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</div>
<div class="swiper mySwiper visible-xs">
    <div class="swiper-wrapper">
        <?php $key = 0;
        while ($query->have_posts()) : $query->the_post();
            $key++ ?>
            <div class="swiper-slide"><a href="<?php the_permalink(); ?>" target="_blank"><img
                            src="<?= op_get_poster_url() ?>"></a></div>
        <?php endwhile; ?>
    </div>
    <div class="swiper-pagination"></div>
</div>
<script>
    var swiper = new Swiper(".mySwiper", {
        autoplay: {
            disableOnInteraction: false,
        },
        loop: true,
        pagination: {
            el: ".swiper-pagination",
        },
    });
</script>
