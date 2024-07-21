<div class="myui-panel myui-panel-bg clearfix">
    <div class="myui-panel-box clearfix">
        <div class="myui-panel_hd">
            <div class="myui-panel__head clearfix">
                <span class="text-muted more pull-right">
                    <span class="split-line"></span>
                    <a href="<?= $slug; ?>">Xem thêm</a>
                </span>
                <h3 class="title"><?= $title; ?></h3>
            </div>
        </div>
        <div class="myui-panel_bd clearfix">
            <ul class="myui-vodlist clearfix">
                <?php $key = 0;
                while ($query->have_posts()) : $query->the_post();
                    $key++; ?>
                    <li class="col-lg-7  col-md-7 col-sm-4 col-xs-2">
                        <div class="myui-vodlist__box">
                            <a class="myui-vodlist__thumb wide lazyload" href="<?php the_permalink(); ?>"
                               title="<?php the_title(); ?>"
                               data-original="<?= op_get_poster_url() ?>"
                               style="background-image: url(<?= op_get_poster_url() ?>);">
                                <span class="play hidden-xs"></span>
                                <span class="pic-tag pic-tag-top">
	                	        	<span class="tag" style="background-color: #00b51d;"><?= op_get_status() ?></span>
                                </span>
                                <span class="pic-text text-right"><?= op_get_episode() ?></span> </a>
                              <div class="myui-vodlist__detail">
                                <h4 class="title text-overflow">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                </h4>
                                <p class="text text-overflow text-muted hidden-xs"><?= op_get_original_title() ?></p>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</div>