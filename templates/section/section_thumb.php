<div class="myui-panel myui-panel-bg clearfix">
    <div class="myui-panel-box clearfix">
        <div class="myui-panel_bd clearfix">
            <div class="col-lg-wide-75 col-md-wide-75 col-xs-1 padding-0">
                <div class="myui-panel_hd">
                    <div class="myui-panel__head clearfix">
                        <h3 class="title"><?= $title; ?></h3>
                        <?php if($slug) : ?>
                        <a class="more text-muted" href="<?= $slug; ?>">
                            Xem thêm
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <?php endif ?>
                    </div>
                </div>
                <ul class="myui-vodlist clearfix">
                    <?php $key =0; while ($query->have_posts()) : $query->the_post(); $key++;
                        echo '<li class="col-lg-5 col-md-6 col-sm-4 col-xs-3">';
                        get_template_part('templates/section/section_thumb_item');
                        echo '</li>';
                    endwhile; ?>
                </ul>
            </div>
            <div class="col-lg-wide-25 col-md-wide-25 hidden-sm hidden-xs">
                <div class="myui-panel_hd">
                    <div class="myui-panel__head clearfix">
                        <h3 class="title">Top view</h3>
                    </div>
                </div>
                <ul class="myui-vodlist__text active clearfix" style="padding: 0 10px;">
                    <?php $key =0;
                    while ($querytop->have_posts()) : $querytop->the_post(); $key++;
                        switch ($key) {
                            case 1:
                                $class_top = 'badge-first';
                                break;
                            case 2:
                                $class_top = 'badge-second';
                                break;
                            case 3:
                                $class_top = 'badge-third';
                                break;
                            default:
                                $class_top = '';
                                break;
                        }?>
                        <li>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
                                <span class="pull-right  text-muted" style="color: ;"> <?= op_get_quality() ?></span>		<span class="badge <?= $class_top ?>"><?= $key ?></span><?php the_title() ?>	</a>
                        </li>
                    <?php
                    endwhile; ?>

                </ul>
            </div>
        </div>
    </div>
</div>