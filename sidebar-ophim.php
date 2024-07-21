<div class="col-lg-wide-25 col-md-wide-3 col-xs-1 myui-sidebar hidden-sm hidden-xs">
    <?php
    if ( is_active_sidebar('left-sidebar') ) {
        dynamic_sidebar( 'left-sidebar' );
    } else {
        _e(' Go to Appearance -> Widgets to add some widgets.', 'ophim');
    }
    ?>
</div>
