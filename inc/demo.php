<?php

function add_theme_widgets() {
    $activate = array(
        'widget-footer' => array(
            'wg_footer-0',
        )
    );
    update_option('widget_wg_footer', array(
        0 => array('footer' => '<div class="myui-foot clearfix">
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
</div>')
    ));
    update_option('sidebars_widgets',  $activate);

}

add_action('after_switch_theme', 'add_theme_widgets', 10, 2);