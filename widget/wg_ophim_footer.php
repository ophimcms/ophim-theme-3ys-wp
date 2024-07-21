<?php
class WG_oPhim_Footer extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'wg_footer', // Base ID
            __( 'Ophim Footer', 'ophim' ), // Name
            array( 'description' => __( 'Mẫu footer', 'ophim' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract($args);
        ob_start();
        echo $instance['footer'] ?? '';
        echo $after_widget;
        $html = ob_get_contents();
        ob_end_clean();
        echo $html;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    function form($instance)
    {
        $instance = wp_parse_args( (array) $instance, array(
            'title' 	=> '',
            'slug' 	=> '#',
            'postnum' 	=> 5,
            'style'		=> '1',
            'status'		=> 'all',
            'orderby'		=> 'new',
            'categories'		=> 'all',
            'actors'		=> 'all',
            'directors'		=> 'all',
            'genres'		=> 'all',
            'regions'		=> 'all',
            'years'		=> 'all',
        ) );
        extract($instance);

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('footer'); ?>"><?php _e('Footer', 'ophim') ?></label>
            <br />
            <textarea class="widefat" rows="10" id="<?php echo $this->get_field_id('footer'); ?>" name="<?php echo $this->get_field_name('footer'); ?>"  ><?php if(isset($instance['footer']) && $instance['footer']){ echo $instance['footer'];}else{ ?>
                    <div class="myui-foot clearfix">
                    <div class="container min">
                    <div class="row">
                    <div class="col-pd text-center">
                    <p>Tất cả thông tin tài nguyên trên trang này được tìm kiếm từ Internet Trang web này không chịu trách nhiệm về nội dung được hiển thị. Nếu bạn cho rằng thông tin trên các trang của trang này vi phạm quyền của bạn, vui lòng đính kèm email chứng nhận bản quyền để thông báo cho chúng tôi trong vòng 48 giờ sau đó. đang nhận email<br>Liên hệ: 123456@gmail.com</p>
                    <p class="hidden-xs">
                    <a target="_blank" href="/map.html">Site map</a><span class="split-line"></span>
                    <a target="_blank" href="/rss/index.xml">RSS</a><span class="split-line"></span>
                    <a target="_blank" href="/rss/baidu.xml">Baidu</a><span class="split-line"></span>
                    <a target="_blank" href="/rss/google.xml">Google</a><span class="split-line"></span>
                    <a target="_blank" href="/rss/bing.xml">Bing</a><span class="split-line"></span>
                    <a target="_blank" href="/rss/so.xml">360</a><span class="split-line"></span>
                    <a target="_blank" href="/rss/sogou.xml">Sogou</a><span class="split-line"></span>

                    </p>
                    <p class="margin-0">
                    ©2024 ophim.cc		</p>
                    <div class="tongji"></div>
                    </div>
                    </div>
                    </div>
                    </div><?php } ?></textarea>
        </p>

        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['footer'] = $new_instance['footer'];
        return $instance;
    }

}
function register_new_widget_Footer() {
    register_widget( 'WG_oPhim_Footer' );
}
add_action( 'widgets_init', 'register_new_widget_Footer' );
