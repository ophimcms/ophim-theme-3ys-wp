<div class="myui-panel myui-panel-bg clearfix">
    <div class="myui-panel-box clearfix">
        <div class="myui-panel_hd">
            <div class="myui-panel__head clearfix">
                <h3 class="title"><?php echo $title; ?></h3>
                <a class="more text-muted" href="<?php echo $slug; ?><">Xem thêm <i class="fa fa-angle-right"></i></a>
            </div>
        </div>
        <div class="myui-panel_bd">
            <ul class="myui-vodlist__text col-pd clearfix">
                <?php $key =0;
                while ($query->have_posts()) : $query->the_post(); $key++;
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
                        <span class="flex justify-between items-center">
                            <span class="badge <?= $class_top ?>"><?= $key?></span>
                            <span class="text-overflow"><?php the_title(); ?></span>
                            <span class="text-muted"> <?= op_get_year(' ') ?></span>
                        </span>
                        </a>
                    </li>
                <?php
                endwhile; ?>
            </ul>
        </div>
    </div>
</div>