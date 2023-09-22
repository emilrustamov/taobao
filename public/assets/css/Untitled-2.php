<?php
/**
 * Theme Functions
 *
 * @package DTtheme
 * @author DesignThemes
 * @link http://wedesignthemes.com
 */
/* уборка хедера от мусора */
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_generator'); //убираем версию wp
remove_action('wp_head', 'rel_canonical', 9999);
// Отключаем вывод ссылок в header
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
// Полностью убираем версию WordPress
add_filter('the_generator', '__return_empty_string');

// Удаление параметра ver из добавляемых скриптов и стилей
function rem_wp_ver_css_js($src) {
    if (strpos($src, 'ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}

add_filter('style_loader_src', 'rem_wp_ver_css_js', 9999);
add_filter('script_loader_src', 'rem_wp_ver_css_js', 9999);
add_filter('emoji_svg_url', '__return_empty_string');
/**
 * Отключаем emoji's
 */
add_action('init', 'disable_emojis');

function disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
}

/**
 * Отключаем emoji's в tinymce 
 */
function disable_emojis_tinymce($plugins) {
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

//поддержка woocommerce
add_action('after_setup_theme', 'woocommerce_support');

function woocommerce_support() {
    //поддержка woocommerce
    add_theme_support('woocommerce');
    //обавить поддержку тем для новых функций галереи продуктов WooCommerce,
   /* add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );*/
}

# post thumbnails
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    add_image_size( 'image_547_552', 547, 552, true  ); 	// blog - list 
    add_image_size( 'image_30_30', 30, 30 );
    add_image_size( 'image_31_31', 31, 31 );
    add_image_size( 'image_280_235', 280, 235, true );
    add_image_size( 'image_1200_200', 1207, 200, true );
    add_image_size( 'image_17_17', 17, 17 );
    add_image_size( 'image_99999_75', 99999, 75 );
    add_image_size( 'image_82_80', 82, 80 );
    add_image_size( 'image_533_474', 533, 474 );
    add_image_size( 'image_429_242', 429, 242 );   
    add_image_size( 'image_70_75', 75, 70 );
    add_image_size( 'image_122_110', 122, 110 );
    add_image_size( 'image_321_269', 321, 269 );
    add_image_size( 'image_67_65', 67, 65 );
    add_image_size( 'image_66_61', 66, 61 );
    add_image_size( 'image_238_199', 238, 199, true );
    add_image_size( 'image_238_199_full', 238, 199 );
    add_image_size( 'image_382_244', 382, 244, true );
    add_image_size( 'image_999999_90', 99999, 90 );
    add_image_size( 'image_528_331', 528, 331 );
    add_image_size( 'image_150_150', 150, 150 );
    add_image_size( 'image_277_164', 277, 167, true );
    add_image_size( 'image_235_120', 235, 120 );
    add_image_size( 'image_320_209', 320, 209 );
    add_image_size( 'image_181_73', 181, 73 );
    add_image_size( 'image_532_362', 532, 362);
}

//admin css
function admin_css() {
    wp_enqueue_style('style-admin', get_bloginfo('template_directory') . '/css/style-editor.css');
}

add_action('admin_head', 'admin_css');

function styles() {
    //if (is_front_page()) {
        //wp_enqueue_style('animatecss', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css');
        wp_enqueue_style('slick-slider-css', get_bloginfo('template_directory') . '/plugins/slick-slider/slick.css');
    //}
    //wp_enqueue_style('style-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;500;600;700;800;900&display=swap" rel="stylesheet"');
    
    if (is_category()) {
        wp_enqueue_style('gutenberg-category-css', '/wp-content/plugins/ghostkit/gutenberg/blocks/tabs/styles/style.min.css');       
    }
    
    if(is_product_category()){
        wp_enqueue_style('gutenberg-grid-css', '/wp-content/plugins/ghostkit/gutenberg/blocks/grid/styles/style.min.css');
    }
    
    wp_enqueue_style('style-main', get_bloginfo('template_directory') . '/css/main.css');
    wp_enqueue_style('style-page', get_bloginfo('template_directory') . '/css/page.css');
    wp_enqueue_style('factory-post', get_bloginfo('template_directory') . '/css/factory-post.css');
    if(is_404()){
        wp_enqueue_style('404', get_bloginfo('template_directory') . '/css/404.css');
    }   
    if(is_product() or is_single()){
        wp_enqueue_style('style-post', get_bloginfo('template_directory') . '/css/style-post.css');
        wp_enqueue_style('responsive-post-css', get_bloginfo('template_directory') . '/css/responsive-post.css');
    }
    if(is_cart()){
        wp_enqueue_style('style-cart', get_bloginfo('template_directory') . '/css/cart.css');
        wp_enqueue_style('responsive-cart-css', get_bloginfo('template_directory') . '/css/responsive-cart.css');
    }
    if (is_category()) {
        wp_enqueue_style('style-category', get_bloginfo('template_directory') . '/css/category.css');
        wp_enqueue_style('responsive-category', get_bloginfo('template_directory') . '/css/responsive-category.css');
    }
    //if(is_product_category()){
        wp_enqueue_style('catalog-css', get_bloginfo('template_directory') . '/css/catalog.css');
        wp_enqueue_style('responsive-catalog', get_bloginfo('template_directory') . '/css/responsive-catalog.css'); 
    //}
    /*if(is_page()){
        wp_enqueue_style('fancybox-css', get_bloginfo('template_directory') . '/plugins/fancybox/jquery.fancybox.min.css');
    }*/
    
    
    wp_enqueue_style('responsive-css', get_bloginfo('template_directory') . '/css/responsive.css');      
    wp_enqueue_style('responsive-page-css', get_bloginfo('template_directory') . '/css/responsive-page.css');  
    
    wp_enqueue_style('style-theme', get_bloginfo('template_directory') . '/style.css');
   
}

add_action('wp_enqueue_scripts', 'styles', 20);

/*wp_deregister_script( 'jquery' );

add_action( 'wp_enqueue_scripts', 'jquery_script_method' );
function jquery_script_method() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, null, true );
	wp_enqueue_script( 'jquery' );
}   */ 

function scripts() {   
    if (is_category()) {
        wp_register_script('gutenberg-category-js', '/wp-content/plugins/ghostkit/gutenberg/blocks/tabs/frontend.min.js', array('jquery'), '1.0', true);
        wp_enqueue_script('gutenberg-category-js');        
    }
    
    if(is_product_category()){
        wp_register_script('gutenberg-grid-js', '/wp-content/plugins/ghostkit/gutenberg/blocks/grid/frontend.min.js', array('jquery'), '1.0', true);
        wp_enqueue_script('gutenberg-grid-js');
    }
    
    wp_register_script('mask', get_bloginfo('template_directory') . '/plugins/jquery.maskedinput.min.js', array('jquery'), '1.0', true);
    wp_register_script('js-slick', get_bloginfo('template_directory') . '/plugins/slick-slider/slick.min.js', array('jquery'), '1.0', true);
    //wp_register_script('js-cookie', get_bloginfo('template_directory') . '/plugins/jquery.cookie.js', array('jquery'), '1.0', true);
    //wp_register_script('nicescroll', get_bloginfo('template_directory') . '/plugins/jquery.nicescroll.js', array('jquery'), '1.0', true);
    wp_register_script('custom-js', get_bloginfo('template_directory') . '/js/script.js', array('jquery'), '1.0', true);
    
    if (is_category(118)) {
        wp_register_script('blog-js', get_bloginfo('template_directory') . '/js/blog.js', array('jquery'), '1.0', true);
        wp_enqueue_script('blog-js');
    }
    if(is_cart()){
        wp_register_script('cart-js', get_bloginfo('template_directory') . '/js/cart.js', array('jquery'), '1.0', true);
        wp_enqueue_script('cart-js');
    }
    if(is_product_category()){
        wp_register_script('catalog-js', get_bloginfo('template_directory') . '/js/catalog.js', array('jquery'), '1.0', true);
        wp_enqueue_script('catalog-js');
    }
    /*if(is_category()){
        wp_register_script('category-js', get_bloginfo('template_directory') . '/js/category.js', array('jquery'), '1.0', true);
        wp_enqueue_script('category-js');
    }*/
    if(is_page(315)){
        wp_register_script('cooperation-js', get_bloginfo('template_directory') . '/js/cooperation.js', array('jquery'), '1.0', true);
        wp_enqueue_script('cooperation-js');
    }
    if(is_category(200)){
        wp_register_script('discount-js', get_bloginfo('template_directory') . '/js/discount.js', array('jquery'), '1.0', true);
        wp_enqueue_script('discount-js');
    }
    if(is_front_page()){
        wp_register_script('main-page-js', get_bloginfo('template_directory') . '/js/main-page.js', array('jquery'), '1.0', true);
        wp_enqueue_script('main-page-js');
    }
    if(is_front_page() or in_category(118)){
        wp_register_script('main-single-blog-js', get_bloginfo('template_directory') . '/js/main-single-blog.js', array('jquery'), '1.0', true);
        wp_enqueue_script('main-single-blog-js');
    }
    if(is_page(297)){
        wp_register_script('page-about-js', get_bloginfo('template_directory') . '/js/page-about.js', array('jquery'), '1.0', true);
        wp_enqueue_script('page-about-js');
    }
    if(is_page(346)){
        wp_register_script('page-contacts-js', get_bloginfo('template_directory') . '/js/page-contacts.js', array('jquery'), '1.0', true);
        wp_enqueue_script('page-contacts-js');
    }
    if(is_page()){
        wp_register_script('page-js', get_bloginfo('template_directory') . '/js/page.js', array('jquery'), '1.0', true);
        wp_enqueue_script('page-js');
        //wp_register_script('fancybox-js', get_bloginfo('template_directory') . '/plugins/fancybox/jquery.fancybox.min.js', array('jquery'), '1.0', true);
        //wp_enqueue_script('fancybox-js');
    }
    /*if(){
        wp_register_script('post-js', get_bloginfo('template_directory') . '/js/post.js', array('jquery'), '1.0', true);
        wp_enqueue_script('post-js');
    }*/
    if(in_category(118)){
        wp_register_script('single-blog-js', get_bloginfo('template_directory') . '/js/single-blog.js', array('jquery'), '1.0', true);
        wp_enqueue_script('single-blog-js');
    }
    if(is_product()){
        wp_register_script('single-product-js', get_bloginfo('template_directory') . '/js/single-product.js', array('jquery'), '1.0', true);
        wp_enqueue_script('single-product-js');
    }
    
    wp_enqueue_script('js-slick');
    wp_enqueue_script('custom-js');
    wp_enqueue_script('mask');
    //wp_enqueue_script('nicescroll');
    //wp_enqueue_script('js-cookie');   
}

add_action('wp_enqueue_scripts', 'scripts');


/* if (function_exists('add_image_size')) {
  add_image_size('slider_img_540_360', 540, 360);
  } */

remove_filter('the_content', 'wpautop'); // для контента
remove_filter('the_excerpt', 'wpautop'); // для анонсов
remove_filter('comment_text', 'wpautop'); // для комментарий
//menu
add_action('after_setup_theme', 'theme_register_nav_menu');

function theme_register_nav_menu() {
    register_nav_menus(
            array(
                'main-menu' => esc_html__('Главное меню'),
                'category-menu' => esc_html__('Меню с категориями'),
                'bottom-menu' => esc_html__('Нижнее меню Каталог'),
                'bottom-menu-customers' => esc_html__('Нижнее меню Клиентам'),
                'category-page-menu' => esc_html__('Меню на странице магазина'),
            )
    );
}

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form'));
}

function pb_widgets_init() {
    register_sidebar(array(
        'name' => 'Футер первая колонка',
        'id' => "footer-1",
        'description' => '',
        'class' => 'recent-posts-widget',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>\n",
        'before_title' => '<p class="widgettitle">',
        'after_title' => "</p>\n",
    ));
    register_sidebar(array(
        'name' => 'Футер вторая колонка',
        'id' => "footer-2",
        'description' => '',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<p class="widgettitle">',
        'after_title' => "</p>",
    ));
    register_sidebar(array(
        'name' => 'Футер третья колонка',
        'id' => "footer-3",
        'description' => '',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<p class="widgettitle">',
        'after_title' => "</p>",
    ));
    register_sidebar(array(
        'name' => 'Футер четвертая колонка',
        'id' => "footer-4",
        'description' => '',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<p class="widgettitle">',
        'after_title' => "</p>",
    ));
    register_sidebar(array(
        'name' => 'Фильтр товаров',
        'id' => "filter-5",
        'description' => '',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<p class="widgettitle">',
        'after_title' => "</p>",
    ));
    register_sidebar(array(
        'name' => 'Фильтр товаров в категории Распродажа',
        'id' => "filter-6",
        'description' => '',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<p class="widgettitle">',
        'after_title' => "</p>",
    ));
    register_sidebar(array(
        'name' => 'Мини список желаний',
        'id' => "widget_wishlist",
        'description' => '',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<p class="widgettitle">',
        'after_title' => "</p>",
    ));
    register_sidebar(array(
        'name' => 'Поиск',
        'id' => "widget_smart_search",
        'description' => '',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<p class="widgettitle">',
        'after_title' => "</p>",
    ));
    /*register_sidebar(array(
        'name' => 'Отзывы',
        'id' => "widget_reviews",
        'description' => '',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<p class="widgettitle">',
        'after_title' => "</p>",
    ));*/
    /* register_sidebar(array(
      'name' => 'Сайдбар справа',
      'id' => "sidebar_right",
      'description' => '',
      'class' => '',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => "</div>\n",
      'before_title' => '<p class="widgettitle">',
      'after_title' => "</p>\n",
      ));
      register_sidebar(array(
      'name' => 'Сайдбар слева',
      'id' => "sidebar_left",
      'description' => '',
      'class' => '',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => "</div>\n",
      'before_title' => '<p class="widgettitle">',
      'after_title' => "</p>\n",
      )); */
}

add_action('widgets_init', 'pb_widgets_init');

//поддержка svg
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

//pagination
function wpschool_page_navi() {
    global $wp_query;
    $pages = '';
    $maxpages = $wp_query->max_num_pages;
    if (!$currentpage = get_query_var('paged')) {
        $currentpage = 1;
    }
    $link['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
    $link['totalpages'] = $maxpages;
    $link['currentpage'] = $currentpage;
    $totalpages = 0; //1 - вывести "Страница N из N", 0 - не выводить
    $link['mid_size'] = 3; //к-во ссылок показывать слева и справа от текущей
    $link['end_size'] = 1; //к-во ссылок показывать в начале и в конце
    $link['prev_text'] = '<';
    $link['next_text'] = '>';
    if ($maxpages > 1) {
        echo '<div class="navigation">';
    }
    if ($totalpages == 1 && $maxpages > 1) {
        $pages = '<span class="pages">Страница ' . $currentpage . ' из ' . $maxpages . '</span>' . "\r\n";
    }
    echo $pages . paginate_links($link);
    if ($maxpages > 1) {
        echo '</div>';
    }
}

//yoast убираем текущую страницу
/* function wpschool_remove_dublicate_breadcrumbs( $link_output ) {
    if( strpos( $link_output, 'breadcrumb_last' ) !== false ) {
    $link_output = '';
    }
    return $link_output;
    }
add_filter( 'wpseo_breadcrumb_single_link', 'wpschool_remove_dublicate_breadcrumbs' ); */

function filter_wpseo_breadcrumb_single_link( $link, $breadcrumb ) {
    $link_item = '';
    $index_breadcrumb = get_query_var('index_breadcrumb');
    $toponym = '';
    $toponym_breadcrumb = '';
    
    if(is_product_category()){
        $queried_object = get_queried_object();
        global $wp_query;
        if($wp_query->max_num_pages > 1){
            $pageNum = (get_query_var('paged')) ? get_query_var('paged') : 1; // получаем номер текущей страницы и присваиваем значение переменной
            $customizer_repeater_category_title_description_list = get_theme_mod('customizer_repeater_category_title_description_list', json_encode( array(
                /*The content from your default parameter or delete this argument if you don't want a default*/
                //TODO номер страницы
            )) );
            /*This returns a json so we have to decode it*/
            $count = 1;
            $customizer_repeater_category_title_description_list_decoded = json_decode($customizer_repeater_category_title_description_list);
            //print_r($customizer_repeater_category_title_description_list_decoded);
            foreach($customizer_repeater_category_title_description_list_decoded as $key=>$repeater_item){
                if($pageNum == $count){
                    if($repeater_item->text != '' && $repeater_item->text != 'undefined'){
                        $toponym = $repeater_item->text;
                        break;
                    }
                }
                $count++;
            }
        } 

        if($toponym != ''){
            if($breadcrumb['term_id'] === $queried_object->term_id){
                $toponym_breadcrumb = $breadcrumb['text'].' в '.$toponym;
            }
        }
    }
    
    
    if(!isset($index_breadcrumb) or $index_breadcrumb == ''){
        $index_breadcrumb = 0;
    }
    
    
    if( strpos( $link, 'breadcrumb_last' ) !== false ) {
        $link_item .= '<span><span>';
        $link_item .= '<span class="breadcrumb_last" aria-current="page" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="item" url="'.$breadcrumb['url'].'"><span content="🔥 '.($toponym_breadcrumb != "" ? $toponym_breadcrumb : $breadcrumb['text']).'" itemprop="name">'.$breadcrumb['text'].'</span></span><meta itemprop="position" content="'.$index_breadcrumb.'"></span>'; 
        $link_item .= '</span></span>';
    }
    else {
        $link_item .= '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
        $link_item .= '<a href="'.$breadcrumb['url'].'" itemprop="item"><span content="🔥 '.($toponym_breadcrumb != "" ? $toponym_breadcrumb : $breadcrumb['text']).'" itemprop="name">'.$breadcrumb['text'].'</span></a><meta itemprop="position" content="'.$index_breadcrumb.'">';
        $link_item .= '</span>';
    }                                      
               
    apply_filters( 'wpseo_breadcrumb_single_link_index_breadcrumb', $index_breadcrumb);
   
    return $link_item;
}
add_filter( 'wpseo_breadcrumb_single_link', 'filter_wpseo_breadcrumb_single_link', 10, 2 ); 

add_filter( 'wpseo_breadcrumb_single_link_index_breadcrumb', 'filter_wpseo_breadcrumb_single_link_count', 10); 
function filter_wpseo_breadcrumb_single_link_count($index_breadcrumb) {
    $index_breadcrumb = get_query_var('index_breadcrumb');
    if(!isset($index_breadcrumb) or $index_breadcrumb == ''){
        $index_breadcrumb = 0;
    }
    $index_breadcrumb++;
    set_query_var( 'index_breadcrumb', $index_breadcrumb );
    return $index_breadcrumb;
}

// изменяет кол-во выводимых постов в конкретной категории
 /*function get_posts_cat($query) {
    if (!is_admin() && $query->is_main_query() && is_category(13)) {
        $query->set('posts_per_page', -1);
        $query->set('post_status', 'publish');
        $query->set('post_status', 'publish');
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
    }
    if (!is_admin() && $query->is_main_query() && is_category('2043')) {
        $query->set('posts_per_page', 24);
    }
    if (!is_admin() && $query->is_main_query() && is_category('288')) {
        $query->set('posts_per_page', 18);
    }
}
  add_action('pre_get_posts', 'get_posts_cat');*/ 

// изменяет кол-во выводимых постов в поиске
 function search_posts_per_page($query) {
    if (!is_admin() && $query->is_main_query() && is_category('200')) {
        $query->set('posts_per_page', 3);
    }  
    
    if (!is_admin() && $query->is_main_query() && is_search()) {
        $meta_query = [
            'relation' => 'OR',
                [ 
                    'key' => '_sku',
                    'value' => $query->query['s'],
                    'compare' => 'LIKE',
                ],
        ];
        /*if(is_user_logged_in()){
        
            $query->set('meta_query', $meta_query);
            $query->set( 'post_type', 'product' );
            $query->set( 'tax_query', [] );
            error_log(print_r($query, true));
        }*/
    }
}
add_action('pre_get_posts', 'search_posts_per_page'); 

//поддержка шорткодов в виджетах и категориях
add_filter( 'term_description', 'shortcode_unautop');
add_filter( 'term_description', 'do_shortcode' );



require get_template_directory() . '/inc/shortcodes.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/lazyblock.php';
require get_template_directory() . '/inc/currencies.php';
require get_template_directory() . '/inc/woocommerce-hooks.php';
require get_template_directory() . '/inc/integration_bitrix24.php';

//redirect for category
/* add_action( 'template_redirect', function() {
  if(is_category() or is_archive()){

  $cur_url = esc_url_raw(urldecode($_SERVER['REQUEST_URI']));
  //echo $cur_url;
  $ar_cur_url = explode('/', $cur_url);
  $new_ar_cur_url = array_diff($ar_cur_url, array(''));
  $str_url = '';
  $host = '';
  if(count($new_ar_cur_url) >= 4){
  $last = end($new_ar_cur_url);
  $slice_ar_cur_url = array_splice($new_ar_cur_url, 0, 2);
  array_push($slice_ar_cur_url, $last);
  $str_url = '/'.join('/', $slice_ar_cur_url).'/';
  $host = 'http://'.$_SERVER['SERVER_NAME'];
  /*echo '<pre>';
  print_r($host.$str_url);
  echo '</pre>'; */
/*          wp_redirect( $host.$str_url, 301 );
  exit;
  }
  }
  } );

  function true_request( $query ){
  if(is_category() or is_archive()){
  //error_log(print_r($query, true));//[product_cat] => myagkaya-mebel/divany/divan-knizhka/divan-knizhka-v-klassicheskom-stile
  $cur_url = esc_url_raw(urldecode($_SERVER['REQUEST_URI']));
  $ar_cur_url = explode('/', $cur_url);
  $new_ar_cur_url = array_diff($ar_cur_url, array(''));
  $str_url = '';
  $host = '';
  if(count($new_ar_cur_url) >= 4){
  $last = end($new_ar_cur_url);
  $slice_ar_cur_url = array_splice($new_ar_cur_url, 0, 2);
  array_push($slice_ar_cur_url, $last);
  $str_url = join('/', $slice_ar_cur_url);
  $query['product_cat'] = $str_url;
  }
  }
  return $query;
  }
  add_filter( 'request', 'true_request', 9999, 1 );

  function true_term_links( $url, $term, $taxonomy ){
  if(is_category() or is_archive()){
  //$replace = $term->slug;
  $cur_url = esc_url_raw(urldecode($_SERVER['REQUEST_URI']));
  $ar_cur_url = explode('/', $cur_url);
  $new_ar_cur_url = array_diff($ar_cur_url, array(''));
  $str_url = '';
  $host = '';
  if(count($new_ar_cur_url) >= 4){
  $last = end($new_ar_cur_url);
  $slice_ar_cur_url = array_splice($new_ar_cur_url, 0, 2);
  array_push($slice_ar_cur_url, $last);
  $str_url = '/'.join('/', $slice_ar_cur_url).'/';
  $host = 'http://'.$_SERVER['SERVER_NAME'];
  }
  //error_log(print_r($url, true));
  //error_log(print_r($host.$str_url, true));
  $url = str_replace($url, $host.$str_url, $url );
  }
  return $url;
  }
  add_filter( 'term_link', 'true_term_links', 10, 3 ); */

//цвет копуса тип записи
/*add_action('init', 'body_color_register_post_type'); // Использовать функцию только внутри хука init
function body_color_register_post_type() {
    $labels = array(
        'name' => 'Цвет корпуса/ножек',
        'singular_name' => 'Цвет корпуса/ножек', // админ панель Добавить->Функцию
        'add_new' => 'Добавить цвет корпуса/ножек',
        'add_new_item' => 'Добавить новый цвет корпуса/ножек', // заголовок тега <title>
        'edit_item' => 'Редактировать цвет корпуса/ножек',
        'new_item' => 'Новый цвет корпуса/ножек',
        'all_items' => 'Все цвета корпуса/ножек',
        'view_item' => 'Просмотр цвета корпуса/ножек на сайте',
        'search_items' => 'Искать цвет корпуса/ножек',
        'not_found' => 'Цвета корпуса/ножек не найдено.',
        'not_found_in_trash' => 'В корзине нет цвета корпуса/ножек.',
        'menu_name' => 'Цвета корпуса/ножек' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => false,
        'show_ui' => true, // показывать интерфейс в админке
        'show_in_menu' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'query_var' => true,
        'taxonomies' => array( 'factory' ),
        'rewrite' => true,//array( 'slug' => 'catalog-company/%catalog-company%', 'with_front' => false ), // свой слаг в URL
        //'menu_icon' => get_stylesheet_directory_uri() .'/img/function_icon.png', // иконка в меню
        'menu_position' => null, // порядок в меню
        'menu_icon' => null,
        'supports' => array('title', 'editor', 'excerpt', 'comments', 'author', 'thumbnail')
    );
    register_post_type('body_color', $args);
}

// таксономия коллекция для Фабрики
add_action( 'init', 'create_collection_taxonomies' );
// функция, создающая новую таксономию "genres" для постов типа "project"
function create_collection_taxonomies(){
    // Добавляем древовидную таксономию 'catalog' (как категории)
    register_taxonomy('factory', array('body_color'), array(
        'hierarchical'  => false,
        'labels'        => array(
                'name'              => _x( 'Фабрика', 'taxonomy general name' ),
                'singular_name'     => _x( 'Фабрика', 'taxonomy singular name' ),                
                'search_items'      =>  __( 'Найти фабрику' ),
                'all_items'         => __( 'Все фабрики' ),
                'parent_item'       => __( 'Родитель фабрики' ),
                'parent_item_colon' => __( 'Родитель фабрики:' ),
                'edit_item'         => __( 'Редактировать фабрику' ),
                'update_item'       => __( 'Обновить фабрику' ),
                'add_new_item'      => __( 'Добавить новую фабрику' ),
                'new_item_name'     => __( 'Новое название фабрики' ),
                'menu_name'         => __( 'Фабрики' ),
        ),
        'public'        => true,
        'publicly_queryable'    => false, // равен аргументу public
        'show_in_nav_menus'     => true, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_in_menu'          => true, // равен аргументу show_ui
        'show_tagcloud'         => true, // равен аргументу show_ui
        'show_in_rest'          => true, // добавить в REST API
        //'rest_base'             => null, // $taxonomy
        'query_var'     => true,      
        'rewrite'       => false,
        'capabilities' => array('category'),
    ));	
}*/

//фабрика тип записи
/*add_action('init', 'factory_register_post_type'); // Использовать функцию только внутри хука init
function factory_register_post_type() {
    $labels = array(
        'name' => 'Фабрика',
        'singular_name' => 'Фабрика', // админ панель Добавить->Функцию
        'add_new' => 'Добавить фабрику',
        'add_new_item' => 'Добавить новую фабрику', // заголовок тега <title>
        'edit_item' => 'Редактировать фабрику',
        'new_item' => 'Новая фабрика',
        'all_items' => 'Все фабрики',
        'view_item' => 'Просмотр фабрики на сайте',
        'search_items' => 'Искать фабрику',
        'not_found' => 'Фабрик не найдено.',
        'not_found_in_trash' => 'В корзине нет фабрик.',
        'menu_name' => 'Фабрики' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true, // показывать интерфейс в админке
        'show_in_menu' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => 'factory',
        'hierarchical' => false,
        'query_var' => true,
        //'taxonomies' => array( 'catalog-company' ),
        'rewrite' => true,//array( 'slug' => 'catalog-company/%catalog-company%', 'with_front' => false ), // свой слаг в URL
        //'menu_icon' => get_stylesheet_directory_uri() .'/img/function_icon.png', // иконка в меню
        'menu_position' => null, // порядок в меню
        'menu_icon' => null,
        'supports' => array('title', 'editor', 'excerpt', 'comments', 'author', 'thumbnail')
    );
    register_post_type('factory', $args);
}

// таксономия коллекция для Фабрики
add_action( 'init', 'create_collection_taxonomies' );
// функция, создающая новую таксономию "genres" для постов типа "project"
function create_collection_taxonomies(){
    // Добавляем древовидную таксономию 'catalog' (как категории)
    register_taxonomy('collection', array('factory'), array(
        'hierarchical'  => false,
        'labels'        => array(
                'name'              => _x( 'Коллекция', 'taxonomy general name' ),
                'singular_name'     => _x( 'Коллекция', 'taxonomy singular name' ),                
                'search_items'      =>  __( 'Найти коллекцию' ),
                'all_items'         => __( 'Все коллекции' ),
                'parent_item'       => __( 'Родитель коллекции' ),
                'parent_item_colon' => __( 'Родитель коллекции:' ),
                'edit_item'         => __( 'Редактировать коллекцию' ),
                'update_item'       => __( 'Обновить коллекцию' ),
                'add_new_item'      => __( 'Добавить новую коллекцию' ),
                'new_item_name'     => __( 'Новое название коллекции' ),
                'menu_name'         => __( 'Коллекции' ),
        ),
        'public'        => true,
        'publicly_queryable'    => false, // равен аргументу public
        'show_in_nav_menus'     => true, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_in_menu'          => true, // равен аргументу show_ui
        'show_tagcloud'         => true, // равен аргументу show_ui
        'show_in_rest'          => true, // добавить в REST API
        //'rest_base'             => null, // $taxonomy
        'query_var'     => true,      
        'rewrite'       => false,
        'capabilities' => array('category'),
        'meta_box_cb' => 'post_tags_meta_box'
    ));	
}
*/
## Отфильтруем ЧПУ произвольного типа
// сам фильтр: apply_filters( 'post_type_link', $post_link, $post, $leavename, $sample );
/*add_filter('post_type_link', 'products_permalink', 1, 2);

function products_permalink( $permalink, $post ){
	// выходим если это не наш тип записи: без холдера %catalog%
    //error_log(print_r($post->post_type, true));
    if($post->post_type == 'project'){
	/*if( strpos($permalink, '%category%') === FALSE ){
            return $permalink;
        }*/
	// Получаем элементы таксы
/*	$terms = get_the_terms($post, 'catalog');
        

	// если есть элемент заменим холдер
	if( ! is_wp_error($terms) && !empty($terms) && is_object($terms[0]) ){
            $cat_id = $terms[0]->term_id;
            $tax_name = $terms[0]->taxonomy;
 
            $taxonomy_slug =  get_term_parents_list( $cat_id, $tax_name, array(
                'separator' => '/',
                'format'    => 'slug',
                'link'      => false,
                'inclusive' => true,
            ) );          
        }
	else{
            $taxonomy_slug = 'no-catalog/';
        }
      
        $permalink = str_replace('%category%/', $taxonomy_slug, $permalink );
	//return str_replace('%catalog%/', $taxonomy_slug, $permalink );
       
    }
    return $permalink;
}*/

//коллекция тип записи
/*add_action('init', 'collection_register_post_type'); // Использовать функцию только внутри хука init
function collection_register_post_type() {
    $labels = array(
        'name' => 'Коллекция',
        'singular_name' => 'Коллекция', // админ панель Добавить->Функцию
        'add_new' => 'Добавить коллекцию',
        'add_new_item' => 'Добавить новую коллекцию', // заголовок тега <title>
        'edit_item' => 'Редактировать коллекцию',
        'new_item' => 'Новая коллекция',
        'all_items' => 'Все коллекции',
        'view_item' => 'Просмотр коллекции на сайте',
        'search_items' => 'Искать коллекцию',
        'not_found' => 'Коллекций не найдено.',
        'not_found_in_trash' => 'В корзине нет коллекций.',
        'menu_name' => 'Коллекции' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => false,
        'show_ui' => true, // показывать интерфейс в админке
        'show_in_menu' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'query_var' => true,
        //'taxonomies' => array( 'factory' ),
        'rewrite' => true,//array( 'slug' => 'catalog-company/%catalog-company%', 'with_front' => false ), // свой слаг в URL
        //'menu_icon' => get_stylesheet_directory_uri() .'/img/function_icon.png', // иконка в меню
        'menu_position' => null, // порядок в меню
        'menu_icon' => null,
        'supports' => array('title', 'editor', 'excerpt', 'comments', 'author', 'thumbnail')
    );
    register_post_type('collection', $args);
}*/

// таксономии для коллекций
/*add_action( 'init', 'create_collection_taxonomies' );
// функция, создающая новую таксономию "genres" для постов типа "project"
function create_collection_taxonomies(){
    // Добавляем древовидную таксономию 'catalog' (как категории)
    register_taxonomy('factory', array('collection'), array(
        'hierarchical'  => true,
        'labels'        => array(
                'name'              => _x( 'Каталог', 'taxonomy general name' ),
                'singular_name'     => _x( 'Каталог', 'taxonomy singular name' ),                
                'search_items'      =>  __( 'Найти каталог' ),
                'all_items'         => __( 'Все каталоги' ),
                'parent_item'       => __( 'Родитель каталога' ),
                'parent_item_colon' => __( 'Родитель каталога:' ),
                'edit_item'         => __( 'Редактировать каталог' ),
                'update_item'       => __( 'Обновить каталог' ),
                'add_new_item'      => __( 'Добавить новый каталог' ),
                'new_item_name'     => __( 'Новое название каталога' ),
                'menu_name'         => __( 'Каталог' ),
        ),
        'public'        => true,
        'publicly_queryable'    => null, // равен аргументу public
        'show_in_nav_menus'     => true, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_in_menu'          => true, // равен аргументу show_ui
        'show_tagcloud'         => true, // равен аргументу show_ui
        'show_in_rest'          => null, // добавить в REST API
        'rest_base'             => null, // $taxonomy
        'query_var'     => true,
        'rewrite'       =>   array(                               
                                'slug' => 'catalog-category', // ярлык
                                'with_front' => true,
                                'hierarchical' => true // разрешить вложенность, если false - то не будет правильной иерархии категорий
                            ),
        'capabilities' => array('category'),
        
    ));	
}

## Отфильтруем ЧПУ произвольного типа
// сам фильтр: apply_filters( 'post_type_link', $post_link, $post, $leavename, $sample );
add_filter('post_type_link', 'products_permalink', 1, 2);

function products_permalink( $permalink, $post ){
	// выходим если это не наш тип записи: без холдера %catalog%
    //error_log(print_r($post->post_type, true));
    if($post->post_type == 'project'){
	/*if( strpos($permalink, '%category%') === FALSE ){
            return $permalink;
        }*/
	// Получаем элементы таксы
/*	$terms = get_the_terms($post, 'catalog');
        

	// если есть элемент заменим холдер
	if( ! is_wp_error($terms) && !empty($terms) && is_object($terms[0]) ){
            $cat_id = $terms[0]->term_id;
            $tax_name = $terms[0]->taxonomy;
 
            $taxonomy_slug =  get_term_parents_list( $cat_id, $tax_name, array(
                'separator' => '/',
                'format'    => 'slug',
                'link'      => false,
                'inclusive' => true,
            ) );          
        }
	else{
            $taxonomy_slug = 'no-catalog/';
        }
      
        $permalink = str_replace('%category%/', $taxonomy_slug, $permalink );
	//return str_replace('%catalog%/', $taxonomy_slug, $permalink );
       
    }
    return $permalink;
}*/


//страна тип записи страна
add_action('init', 'country_register_post_type'); // Использовать функцию только внутри хука init
function country_register_post_type() {
    $labels = array(
        'name' => 'Страна',
        'singular_name' => 'Страна', // админ панель Добавить->Функцию
        'add_new' => 'Добавить страну',
        'add_new_item' => 'Добавить новую страну', // заголовок тега <title>
        'edit_item' => 'Редактировать страну',
        'new_item' => 'Новая страна',
        'all_items' => 'Все страны',
        'view_item' => 'Просмотр страны на сайте',
        'search_items' => 'Искать страну',
        'not_found' => 'Стран не найдено.',
        'not_found_in_trash' => 'В корзине нет стран.',
        'menu_name' => 'Страны' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => false,
        'show_ui' => true, // показывать интерфейс в админке
        'show_in_menu' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'query_var' => true,
        //'taxonomies' => array( 'catalog-company' ),
        'rewrite' => true,//array( 'slug' => 'catalog-company/%catalog-company%', 'with_front' => false ), // свой слаг в URL
        //'menu_icon' => get_stylesheet_directory_uri() .'/img/function_icon.png', // иконка в меню
        'menu_position' => null, // порядок в меню
        'menu_icon' => null,
        'supports' => array('title', 'editor', 'excerpt', 'comments', 'author', 'thumbnail')
    );
    register_post_type('country', $args);
}


//ВЫВОДИМ ГУТЕНБЕРГ БЛОКИ В РАЗДЕЛАХ
add_filter( 'term_description', 'shortcode_unautop');
add_filter( 'term_description', 'do_shortcode' );
//удаляем автопростановку тегов вордпрессом 
remove_filter('the_content', 'wpautop');
//Выводим через шорткод гутенберг блоки 
add_shortcode("get_wp_block", function($atts, $content = null) {
    extract(shortcode_atts(array(
        'id' => '',
                    ), $atts));
    ob_start();
    if (is_numeric($id)) {
        $post = get_post($id);
        
        if ($post instanceof WP_Post && has_blocks($post->post_content)) {
            $blocks = parse_blocks($post->post_content);
            if (!empty($blocks) && is_array($blocks)) {
                foreach ($blocks as $block) {
                    print render_block($block);
                }
            }
        }
        wp_reset_postdata();
    }
    return ob_get_clean();
});

// use [get_wp_block id="5273"][/get_wp_block]

//бейджи тип записи
add_action('init', 'badge_register_post_type'); // Использовать функцию только внутри хука init
function badge_register_post_type() {
    $labels = array(
        'name' => 'Бейджи',
        'singular_name' => 'Бейджи', // админ панель Добавить->Функцию
        'add_new' => 'Добавить бейдж',
        'add_new_item' => 'Добавить новый бейдж', // заголовок тега <title>
        'edit_item' => 'Редактировать бейдж',
        'new_item' => 'Новый бейдж',
        'all_items' => 'Все бейджи',
        'view_item' => 'Просмотр бейджа на сайте',
        'search_items' => 'Искать бейдж',
        'not_found' => 'Бейджа не найдено.',
        'not_found_in_trash' => 'В корзине нет бейджа.',
        'menu_name' => 'Бейджи' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => false,
        'show_ui' => true, // показывать интерфейс в админке
        'show_in_menu' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'query_var' => true,
        //'taxonomies' => array( 'factory' ),
        'rewrite' => true,//array( 'slug' => 'catalog-company/%catalog-company%', 'with_front' => false ), // свой слаг в URL
        //'menu_icon' => get_stylesheet_directory_uri() .'/img/function_icon.png', // иконка в меню
        'menu_position' => null, // порядок в меню
        'menu_icon' => null,
        'supports' => array('title', 'editor', 'excerpt', 'comments', 'author', 'thumbnail')
    );
    register_post_type('badge', $args);
}

//салоны тип записи
add_action('init', 'salon_register_post_type'); // Использовать функцию только внутри хука init
function salon_register_post_type() {
    $labels = array(
        'name' => 'Салоны',
        'singular_name' => 'Салон', // админ панель Добавить->Функцию
        'add_new' => 'Добавить Салон',
        'add_new_item' => 'Добавить новый Салон', // заголовок тега <title>
        'edit_item' => 'Редактировать Салон',
        'new_item' => 'Новый Салон',
        'all_items' => 'Все Салоны',
        'view_item' => 'Просмотр Салона на сайте',
        'search_items' => 'Искать Салон',
        'not_found' => 'Салонов не найдено.',
        'not_found_in_trash' => 'В корзине нет Салона.',
        'menu_name' => 'Салоны' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => false,
        'show_ui' => true, // показывать интерфейс в админке
        'show_in_menu' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'query_var' => true,
        //'taxonomies' => array( 'factory' ),
        'rewrite' => true,//array( 'slug' => 'catalog-company/%catalog-company%', 'with_front' => false ), // свой слаг в URL
        //'menu_icon' => get_stylesheet_directory_uri() .'/img/function_icon.png', // иконка в меню
        'menu_position' => null, // порядок в меню
        'menu_icon' => null,
        'supports' => array('title', 'editor', 'excerpt', 'comments', 'author', 'thumbnail')
    );
    register_post_type('salon', $args);
}

//добавляем поиск в меню
add_filter( 'wp_nav_menu_items', 'change_nav_menu_items', 10, 2 );

function change_nav_menu_items( $items, $args ) {
    if(!is_front_page()){
        if ( 'category-menu' == $args->theme_location ) {
            //$smart_search = do_shortcode('[smart_search id="1"]');
            //$smart_search = do_shortcode('[wcas-search-form]');
            $args = array('echo' => false);
            $smart_search = get_search_form($args);            
            $items = '<li class="search-item d-flex flex-center"><div class="switch__search-form">' . $smart_search . '</div><span class="menu-image-title-after menu-image-title">Найти мебель</span></li>'.$items;           
        }
    }
    return $items;
}

//аякс быстрый просмотр карточки товара
function short_info(){
    if (isset($_POST['product_id']) && (!empty($_POST['product_id'])) ) {
       
        $product_id = wp_unslash($_POST["product_id"]); //выбранные значения
        $output = '';
       
        global $product;
        $product = wc_get_product($product_id);
        $price = $product->get_price_html();
        $price_from = get_post_meta( $product->id, '_price_from', true );
        $price_from_str = '';
        if ($price_from == 'yes') {
            $price_from_str .= '<span class="price_from">От</span> ';
        }
        $badges = get_post_meta( $product->id, 'badges', true );
        $price_from = get_post_meta( $product->id, '_price_from', true );
        $hidden_field_discont = get_post_meta( $product->id, '_hidden_field_discont', true );
        $str_discont = '';
        $str_badges = '';
        
        $attributes = $product->get_attributes();
    
        foreach($attributes as $attr=>$attr_deets){
            if('pa_razmer' == $attr or 'pa_proizvoditeli' == $attr or 'pa_kollekczii' == $attr or 'pa_stil' == $attr or 'pa_tip-komnaty' == $attr){

                $attribute_label = wc_attribute_label($attr);

                if ( isset( $attributes[ $attr ] ) || isset( $attributes[ 'pa_' . $attr ] ) ) {

                    $attribute = isset( $attributes[ $attr ] ) ? $attributes[ $attr ] : $attributes[ 'pa_' . $attr ];

                    if ( $attribute['is_taxonomy'] ) {

                        $formatted_attributes[$attribute_label] = implode( ', ', wc_get_product_terms( $product->id, $attribute['name'], array( 'fields' => 'names' ) ) );

                    } else {

                        $formatted_attributes[$attribute_label] = $attribute['value'];
                    }

                }
            }
        }
        
        //error_log(print_r($product_attributes, true));
        $output .= '<div class="product-preview_wrap woocommerce">
            <div class="product-preview">
                <div class="product-preview_content">
                    <span class="close-preview">x</span>
                    <div class="wp-block-columns">
                        <div class="wp-block-column">
                            <div class="wp-block-image">';
                                if(!empty($hidden_field_discont) && $hidden_field_discont != ""){
                                    $str_discont = '<div class="badge sale-badge"><a href="/catalog/rasprodazha/" title="Распродажа">Sale</a></div>';
                                }
                                if(!empty($badges) && $badges != ""){
                                    foreach ($badges as $badge) {
                                        $badge_link = get_field('badge_link', $badge);
                                        if($badge_link){
                                            $str_badges .= '<div class="badge '.$badge.'-badge"><a href="'.$badge_link.'" title="'.get_the_title($badge).'">'.get_the_title($badge).'</a></div>';
                                        }
                                        else {
                                            $str_badges .= '<div class="badge '.$badge.'-badge">'.get_the_title($badge).'</div>';
                                        }
                                    }
                                }

                                if((!empty($hidden_field_discont) && $hidden_field_discont != "") or (!empty($badges) && $badges != "")){
                                    $output .= '<div class="badges"><div class="badges-rotate d-flex">'.$str_badges.$str_discont.'</div></div>';
                                }

                                $attachment_ids = $product->get_gallery_attachment_ids();
                                if($attachment_ids){ 
                                $output .= '<div>';
                                   
                                    $output .= '<div class="d-flex flex-column woocommerce-slider-wpap">
                                                    <div class="product-preview-slider">'; 
                                                    foreach( $attachment_ids as $attachment_id ) {
                                                        $output .= '<div class="woocommerce-slide__img">';                                      
                                                            $output .= wp_get_attachment_image( $attachment_id, 'image_321_269' );
                                                        $output .= '</div>';
                                                    }
                                                $output .= '</div>';
                                    $output .= '<div class="product-preview-slider-nav">'; 
                                        foreach( $attachment_ids as $attachment_id ) {
                                            $output .= '<div class="woocommerce-slide__img">';
                                                $output .= wp_get_attachment_image( $attachment_id, 'image_67_65' );
                                            $output .= '</div>';
                                        }
                                    $output .= '</div>';                                                                               
                                    $output .= '</div>    
                                </div>';

                                }
                                else {
                                    $single_img_id = $product->image_id;
                                    $output .= wp_get_attachment_image( $single_img_id, 'image_321_269' );
                                }

                            $output .= '</div>';
                            $output .= '<div class="woocommerce-product-details__short-description">
                                <p class="col-header">'.get_the_excerpt($product->id).'</p>
                            </div>';
                        $output .= '</div>';
                        $output .= '<div class="wp-block-column"><div class="woocommerce-product-details__top-wrap">
                            <p class="woocommerce-loop-product__title" itemprop="name">'.get_the_title($product->id).'</p>';

                            if ( $product->is_in_stock() && $product->is_on_backorder() == 1 ) {
                                $output .= '<div class="stock" >' . __( 'Под заказ', 'envy' ) . '</div>';
                            }
                            else if ( $product->is_in_stock() && $product->is_on_backorder() != 1 ) {
                                $output .= '<div class="stock" >' . __( 'В наличии', 'envy' ) . '</div>';
                            } 
                            else {
                                $output .= '<div class="out-of-stock" >' . __( 'Нет в наличии', 'envy' ) . '</div>';
                            }
                            $output .= '</div>';
                            $output .= '<table class="table-btns">
                                <tr>
                                    <td><a href="?add-to-cart='.$product->id.'" data-quantity="1" class="basket button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="'.$product->id.'" data-product_sku="'.$product->sku.'" aria-label="Добавить &quot;'.$product->name.'&quot; купить" rel="nofollow"></a></td>';
                                    //$output .= '<td>'.do_shortcode("[ti_wishlists_addtowishlist loop='no']").'</td>';
                                 $output .= '</tr>
                            </table>
                            <div class="wrap-product-attributes">
                                <p class="col-header">Характеристики:</p>
                                <table class="woocommerce-product-attributes shop_attributes">';
                                    foreach ( $formatted_attributes as $product_attribute_key => $product_attribute ) :                                       
                                            if('Фабрика' == $product_attribute_key){
                                                $manufacturers = get_the_terms( $product->id, 'pa_proizvoditeli');      
                                                $flag_id = get_term_meta($manufacturers[0]->term_id, "flag", true);
                                                $flag_img = wp_get_attachment_image( $flag_id, 'image_17_17');
                                                $country_relation_id = get_term_meta($manufacturers[0]->term_id, "country_relation", true);
                                            }

                                            $output .= '<tr class="woocommerce-product-attributes-item '.(('Фабрика' == $product_attribute_key) ? ' woocommerce-product-attributes-item--attribute_pa_proizvoditeli' : '').'">
                                                    <th class="woocommerce-product-attributes-item__label">'.$product_attribute_key.'</th>
                                                    <td class="woocommerce-product-attributes-item__value">'.(('Фабрика' == $product_attribute_key) ? '<div class="d-flex flex-items-center">'.$flag_img : '').$product_attribute.(('Фабрика' == $product_attribute_key) ? '</div>' : '').'</td>
                                            </tr>';                           
                                    endforeach; 

                                    $check = 'Нет в наличии';
                                    if ( $product->is_in_stock() && $product->is_on_backorder() == 1 ) {
                                        $check = '<span style="color: #D7002E;">Под заказ</span>';
                                    }
                                    else if ( $product->is_in_stock() && $product->is_on_backorder() != 1 ) {
                                        $check = '<span style="color: #D7002E;">В наличии</span>';
                                    } 
                                    $output .= '<tr class="woocommerce-product-attributes-item"><th class="woocommerce-product-attributes-item__label">Наличие:</th><td class="woocommerce-product-attributes-item__value">'.$check.'</td></tr>';
                                    $output .= '<tr class="woocommerce-product-attributes-item"><th class="woocommerce-product-attributes-item__label">Страна:</th><td class="woocommerce-product-attributes-item__value">'.get_the_title($country_relation_id).'</td></tr>';
                                    $output .= (get_post_meta( $product->id, '_color_product', true ) ? '<tr class="woocommerce-product-attributes-item"><th class="woocommerce-product-attributes-item__label">Цвет:</th><td class="woocommerce-product-attributes-item__value">'.get_post_meta( $product->id, '_color_product', true ).'</td></tr>' : '');
                                    $output .= (get_post_meta( $product->id, '_color_leg_product', true ) ? '<tr class="woocommerce-product-attributes-item"><th class="woocommerce-product-attributes-item__label">Цвет ножек:</th><td class="woocommerce-product-attributes-item__value">'.get_post_meta( $product->id, '_color_leg_product', true ).'</td></tr>' : '');           

                            $output .= '</table>
                            </div>';
                            $output .= $price.
                                  
                               
                        '</div>';
                $output .= '</div>
                </div>   
            </div>
        </div>';  
                            
                            

        if($output){
            return wp_send_json_success(array('shortinfo'=>$output));
        }        
    }
    wp_die();
}
add_action('wp_ajax_short_info', 'short_info');
add_action('wp_ajax_nopriv_short_info', 'short_info');


//кнопка Показать еще на главной
function download_more() {
    if (isset($_POST['badge_id']) && (!empty($_POST['badge_id'])) ) {
        //$exclude_ids = (!empty($_POST['exclude_ids']) ? $_POST['exclude_ids'] : "");
        //error_log(print_r($ar_ids, true));
        //error_log(print_r($_POST['data'], true));
        $badge_id = (stripslashes($_POST['badge_id']));
        $page = intval(stripslashes($_POST['page']));
        $args = array(
            'posts_per_page' => 6,
            'post_type' => 'product',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
            'meta_key' => 'badges',
            'meta_value' => $badge_id, 
            'meta_compare' => 'LIKE',
            //'post__not_in' => $exclude_ids,
            'paged' => $page + 1
        );            
        $posts = new WP_Query($args);
        
        //error_log(print_r($posts, true));
        
        if($posts->have_posts()) {
            //ob_start();
            while($posts->have_posts()) {              
                $posts->the_post();
               
                //error_log(print_r('output', true));
                //error_log(print_r(get_the_ID(), true));
                 //вывод перед ценой "От" и вывод характеристик товара в категориях
                
                //echo get_the_ID();
                wc_get_template_part( 'template-parts/product/content', 'list-product' );                         
            }
        }
        //return ob_get_clean();
           

    
      /*  $args = unserialize( stripslashes( $_POST['data'] ) );
	$args['paged'] = $_POST['page'] + 1; // следующая страница
	$args['post_status'] = 'publish';
 
	$args = array(
            'posts_per_page' => 1,
            'post_type' => 'product',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
            'meta_key' => 'badges',
            'meta_value' => $args['badge_id'], 
            'meta_compare' => 'LIKE'
        );            
        $posts = new WP_Query($args);
	// если посты есть
	if( have_posts() ) :
 
		// запускаем цикл
                while($posts->have_posts()) :              
                    $posts->the_post();
                    global $product, $woocommerce_loop; 
 
                    wc_get_template( 'archive-product.php');
 
		endwhile;
 
	endif;
	die();*/
    }
    die();
}
add_action('wp_ajax_download_more', 'download_more');
add_action('wp_ajax_nopriv_download_more', 'download_more');


//подгрузка при скроле в блоге
function download_more_scroll() {
    $args = unserialize( stripslashes( $_POST['query'] ) );
    $args['paged'] = $_POST['page'] + 1; // следующая страница
    $args['post_status'] = 'publish';
    $num = 1;
    // обычно лучше использовать WP_Query, но не здесь
    query_posts( $args );
    // если посты есть
    if( have_posts() ) :
            // запускаем цикл
        while( have_posts() ): the_post();
            set_query_var( 'num_loop_item', $num );
            get_template_part( 'template-parts/post/content', 'blog' );
            $num++;
        endwhile;
    endif;
    die();
}
add_action('wp_ajax_download_more_scroll', 'download_more_scroll');
add_action('wp_ajax_nopriv_download_more_scroll', 'download_more_scroll');

//подгрузка при скроле в акциях
function download_more_discount_scroll() {
    $args = unserialize( stripslashes( $_POST['query'] ) );
    $args['paged'] = $_POST['page'] + 1; // следующая страница
    $args['post_status'] = 'publish';
    $args['category__in'] = array(200);
    $args['posts_per_page'] = 3;
    $posts = new WP_Query($args);
    if($posts->have_posts()):
        while($posts->have_posts()):             
            $posts->the_post();
            get_template_part( 'template-parts/post/content', 'discount' );
        endwhile;
    endif;
    die();
}
add_action('wp_ajax_download_more_discount_scroll', 'download_more_discount_scroll');
add_action('wp_ajax_nopriv_download_more_discount_scroll', 'download_more_discount_scroll');

/*-------------------------------*/
/*  # Automatically clear autoptimizeCache if it goes beyond 256MB
/*-------------------------------*/
if (class_exists('autoptimizeCache')) {
    $myMaxSize = 256000; # You may change this value to lower like 100000 for 100MB if you have limited server space
    $statArr=autoptimizeCache::stats(); 
    $cacheSize=round($statArr[1]/1024);
    
    if ($cacheSize>$myMaxSize){
       autoptimizeCache::clearall();
        
	// Clear all W3 Total Cache
	if( class_exists('W3_Plugin_TotalCacheAdmin') )
	{
	    $plugin_totalcacheadmin = & w3_instance('W3_Plugin_TotalCacheAdmin');
	    $plugin_totalcacheadmin->flush_all();
	   # echo __('<div class="updated"><p>All <strong>W3 Total Cache</strong> caches successfully emptied.</p></div>');
	}
       header("Refresh:0"); # Refresh the page so that autoptimize can create new cache files and it does break the page after clearall.    
    }
}

//поддержка webp
function webp_upload_mimes( $existing_mimes ) {
    // add webp to the list of mime types
    $existing_mimes['webp'] = 'image/webp';

    // return the array back to the function with our added mime type
    return $existing_mimes;
}
add_filter( 'mime_types', 'webp_upload_mimes' );


//канонический url
/*add_filter('get_canonical_url', 'wpd_set_canonical', 9, 2);
function set_canonical($canonical_url, $post){
    global $wp_query;

    if(is_user_logged_in()){
        print_r('canonical_url');
        
    }
    if($wp_query->is_paged){
        if(is_user_logged_in()){
            $canonical_url = get_permalink( $post );
            print_r($canonical_url);
            if ( $post->ID === get_queried_object_id() ) {
                $page = get_query_var( 'page', 0 );
                if ( $page >= 2 ) {
                    if ( '' == get_option( 'permalink_structure' ) ) {
                            $canonical_url = add_query_arg( 'page', $page, $canonical_url );
                    } else {
                            $canonical_url = trailingslashit( $canonical_url ) . user_trailingslashit( 'page/' . $page, 'single_paged' );
                    }
                }
            }
        }
    }
    return $canonical_url;		
}*/

/*add_filter( 'get_canonical_url', 'remove_comment_page_canonical_url', 10, 2 );
function remove_comment_page_canonical_url( $canonical_url, $post ){
    // for comment page of current post only
    if ( get_query_var( 'page', 0 ) && $post->ID === get_queried_object_id() ) {
            $canonical_url = get_permalink( $post );
    }
    return $canonical_url;
}*/

/*** Функция вывода rel="canonical" ***/ 
remove_action('wp_head', 'rel_canonical', 99999999999999);
/*function mayak_wp_canonical(){
if ( !is_singular() )
		return;
	global $wp_the_query;
	if ( !$id = $wp_the_query->get_queried_object_id() )
		return;
	$link = get_permalink( $id );
	if ( $page = get_query_var('cpage') )
		$link = get_comments_pagenum_link( $page );
	echo "<link rel='canonical' href='$link' />\n";
}
add_action('wp_head', 'mayak_wp_canonical',3);
function mayak_canonical(){
		if (is_home() ) {
			$mayak_chief_link = get_option('home');
			$mayak_home_link = mayak_link_paged($mayak_chief_link);
			{
		echo "".'<link rel="canonical" href="'.$mayak_home_link.'" />'."\n"; 
	}
} else if (is_category()) {
			$mayak_cat_link = get_category_link(get_query_var('cat'));
			$mayak_category_link = mayak_link_paged($mayak_cat_link);
			{
		echo "".'<link rel="canonical" href="'.$mayak_category_link.'" />'."\n"; 
	}
} else if (function_exists('is_tag') && is_tag()){
			$tag = get_term_by('slug',get_query_var('tag'),'post_tag');
		if (!empty($tag->term_id)) {
	        $tag_link = get_tag_link($tag->term_id);
	        } 
			$mayak_tag_link = mayak_link_paged($tag_link);
			$mayak_tag_link = trailingslashit($mayak_tag_link);
		   {
		echo "".'<link rel="canonical" href="'.$mayak_tag_link.'" />'."\n"; 
	}
} else if (is_author()){
			global $cache_userdata;
	        $userid = get_query_var('author');
	        $mayak_auth_link = get_author_posts_url ( 'ID' );
		$mayak_author_link = mayak_link_paged($mayak_auth_link);
        {
		echo "".'<link rel="canonical" href="'.$mayak_author_link.'" />'."\n"; 
	}
} 
else if (is_date()){
if (get_query_var('m')) {
		        $m = preg_replace('/[^0-9]/', '', get_query_var('m'));
		        switch (strlen($m)) {
		            case 0: 
		                $mayak_date_link = get_year_link($m);
						$mayak_date_link = mayak_link_paged( $mayak_date_link );
		                break;
		            case 1: 
		                $mayak_date_link = get_month_link(substr($m, 0, 4), substr($m, 4, 2));
						$mayak_date_link = mayak_link_paged( $mayak_date_link );
		                break;
		            case 2: 
		                $mayak_date_link = get_day_link( substr($m, 0, 4), substr($m, 4, 2), substr($m, 6, 2));
						$mayak_date_link = mayak_link_paged( $mayak_date_link );					 
		                break;
		            default:
		                $mayak_date_link = '';
		        }
				}
				if (is_day()) {
		        $mayak_date_link = get_day_link(get_query_var('year'),	get_query_var('monthnum'), get_query_var('day'));
				$mayak_date_link = mayak_link_paged($mayak_date_link);					 
		    } else if (is_month()) {
		        $mayak_date_link = get_month_link(get_query_var('year'), get_query_var('monthnum'));
				$mayak_date_link = mayak_link_paged($mayak_date_link);					   
		    } else if (is_year()) {
		        $mayak_date_link = get_year_link(get_query_var('year'));
				$mayak_date_link = mayak_link_paged($mayak_date_link);
		    }
		{
		echo "".'<link rel="canonical" href="'.$mayak_date_link.'" />'."\n"; 
		}
	}
}
function mayak_link_paged($link) {
			$mayak_page = get_query_var('paged');
			$mayak_check = function_exists('user_trailingslashit');
	    if ($mayak_page && $mayak_page > 1) {
	        $link = trailingslashit($link) ."page/". "$mayak_page";
	        if ($mayak_check) {
	            $link = user_trailingslashit($link, 'paged');
	        } else {
	            $link .= '/';
	        }
		}
			return $link;
	}
add_action('wp_head', 'mayak_canonical');*/

/*** Конец функции вывода rel="canonical" ***/

// Каноническая ссылка для страницы каталога
/*function yoast_seo_canonical_change_woocom_shop( $canonical ) {
	if ( !is_shop() ) {
		return $canonical;
	}
    return get_permalink( wc_get_page_id( 'terms' ) );
}
add_filter( 'wpseo_canonical', 'yoast_seo_canonical_change_woocom_shop', 10, 1 );*/

// canonical для пагинации
/*function return_canon () {
$canon_page = get_pagenum_link(0);
return $canon_page;
}

function canon_paged() {
if (is_paged()) {
add_filter( 'wpseo_canonical', 'return_canon' );
}
} 
add_filter('wpseo_head','canon_paged');*/

add_filter( 'wpseo_canonical', '__return_false' );

/*add_filter('wpseo_canonical', 'filter_wpseo_canonical', 20);
function filter_wpseo_canonical($canonical){
    //if(is_user_logged_in()){
    print_r('filter_wpseo_canonical');
        print_r($canonical);
    //}
    return $canonical;
}*/

add_action( 'wp_head', 'custom_rel_canonical' );
function custom_rel_canonical(){
    if(is_tax()){      
        global $wp_query;
        $cat = $wp_query->get_queried_object();
        $current_url = get_category_link( $cat->term_id ); 
        $last_char = substr($current_url, -1);
        if($last_char != '/'){
            $current_url = $current_url.'/';
        }
        
        
        if(is_tax('product_cat')){
            if($wp_query->max_num_pages > 1){
                $pageNum = (get_query_var('paged')) ? get_query_var('paged') : 1; // получаем номер текущей страницы и присваиваем значение переменной
                $customizer_repeater_category_title_description_list = get_theme_mod('customizer_repeater_category_title_description_list', json_encode( array() ) );
                $count = 1;
                $customizer_repeater_category_title_description_list_decoded = json_decode($customizer_repeater_category_title_description_list);
                foreach($customizer_repeater_category_title_description_list_decoded as $key=>$repeater_item){
                    if($pageNum == $count){
                        if($repeater_item->text != '' && $repeater_item->text != 'undefined'){
                            $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                            $url = explode('?', $url);
                            $current_url = $url[0];
                            break;
                        }
                    }
                    $count++;
                }
            } 
        }
        ?>
        <link rel="canonical" href="<?=$current_url?>">
        <?php 
    }  
    else if(is_category()){
        global $wp_query;
        $cat = $wp_query->get_queried_object();
        $current_url = get_category_link( $cat->term_id ); 
        $last_char = substr($current_url, -1);
        if($last_char != '/'){
            $current_url = $current_url.'/';
        }
        ?>
        <link rel="canonical" href="<?=$current_url?>">
        <?php 
    }
    else if(is_tag()){
        global $wp_query;
        $cat = $wp_query->get_queried_object();
        $current_url = get_category_link( $cat->term_id ); 
        $last_char = substr($current_url, -1);
        if($last_char != '/'){
            $current_url = $current_url.'/';
        }
        ?>
        <link rel="canonical" href="<?=$current_url?>">
        <?php 
    }
    else if(is_singular()){
        global $wp;
        $current_url = home_url( $wp->request ); 
        $last_char = substr($current_url, -1);
        if($last_char != '/'){
            $current_url = $current_url.'/';
        }
        ?>
        <link rel="canonical" href="<?=$current_url?>">
    <?php }
}


//плагин ajax фильтр отключаем каноникал
add_filter('berocket_wp_head_canonical', 'filter_berocket_wp_head_canonical', 10, 3);
function filter_berocket_wp_head_canonical($show_canonical, $nice_urls, $canonicalization){
    return null;
}

//shemaorg menu
function nav_menu_schema($content) {
    $pattern = "<a";
    $replacement = '<a itemprop="url"';
    $content = str_replace($pattern, $replacement, $content);
    return $content;
}
add_filter('wp_nav_menu', 'nav_menu_schema');


 /** Определение IP-адреса
  ========================================================================== */
function add_ipadress () {
    echo '<script>var yaParams = {ip_adress: "'. $_SERVER['REMOTE_ADDR'] .'" };</script>';
}
add_action( 'wp_head', 'add_ipadress' );


/**
 * Added preload for styles
 */
/*function add_rel_preload($html, $handle, $href, $media) {
	if (is_admin())
            return $html;

	$html = <<<EOT
		<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" id="$handle" href="$href" media="all">
	EOT;
	return $html;
}
add_filter( 'style_loader_tag', 'add_rel_preload', 10, 4 );*/

/**
 * Adding critical CSS
 */
/*function critical_css() {
    ?>
    <style>
       
    </style>
    <?php
}
add_action('wp_head', 'critical_css');*/

function wpplus_remove_jquery_migrate( $scripts ) { 
    if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) { 
        $script = $scripts->registered['jquery']; 
        if ( $script->deps ) { 
            $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) ); 
        } 
    } 
} 
add_action( 'wp_default_scripts', 'wpplus_remove_jquery_migrate' );

/**
 * Генерирует webp копии изображений сразу после загрузки изображения в медиабиблиотеку
 * 
 * - новые файлы сохраняет с именем name.ext.webp, например, thumb.jpg.webp
 */
function gt_webp_generation($metadata) {
    $uploads = wp_upload_dir(); // получает папку для загрузки медиафайлов

    $file = $uploads['basedir'] . '/' . $metadata['file']; // получает исходный файл
    $ext = wp_check_filetype($file); // получает расширение файла
    
    if ( $ext['type'] == 'image/jpeg' ) { // в зависимости от расширения обрабатаывает файлы разными функциями
        $image = imagecreatefromjpeg($file); // создает изображение из jpg
        
    } elseif ( $ext['type'] == 'image/png' ){
        $image = imagecreatefrompng($file); // создает изображение из png
        imagepalettetotruecolor($image); // восстанавливает цвета
        imagealphablending($image, false); // выключает режим сопряжения цветов
        imagesavealpha($image, true); // сохраняет прозрачность

    }
    imagewebp($image, $uploads['basedir'] . '/' . $metadata['file'] . '.webp', 85); // сохраняет файл в webp

    foreach ($metadata['sizes'] as $size) { // перебирает все размеры файла и также сохраняет в webp
        $file = $uploads['url'] . '/' . $size['file'];
        $ext = $size['mime-type'];

        if ( $ext == 'image/jpeg' ) {
            $image = imagecreatefromjpeg($file); 
            
        } elseif ( $ext == 'image/png' ){
            $image = imagecreatefrompng($file);
            imagepalettetotruecolor($image);
            imagealphablending($image, false);
            imagesavealpha($image, true);
        }
        
        imagewebp($image, $uploads['basedir'] . $uploads['subdir'] . '/' . $size['file'] . '.webp', 85);

    }

    return $metadata;
}
add_filter('wp_generate_attachment_metadata', 'gt_webp_generation');

//обновление/добавление полей таксономии Размеры
function update_fields_tax(){
    $tax = 'pa_razmer';
    $arr_terms_all = get_terms( array(
        'taxonomy' => $tax,
        'hide_empty' => 0,        
    ) );
    if( $arr_terms_all && !is_wp_error($arr_terms_all) ){                                      
        foreach( $arr_terms_all as $term ){           
            $term = get_term_by('id', $term->term_id, $tax);    
             
            $term_name = $term->name;
            error_log(print_r($term_name, true));
            $ar_size = explode("*", $term_name);
            if(is_array($ar_size)){
                $count = count($ar_size);
                if(isset($ar_size[0]) && !empty($ar_size[0]) && $count == 3){
                    update_term_meta( $term->term_id, 'length_size', $ar_size[0] );
                }
                if(isset($ar_size[1]) && !empty($ar_size[1]) && $count == 3){
                    update_term_meta( $term->term_id, 'width_size', $ar_size[1] );
                }
                if(isset($ar_size[2]) && !empty($ar_size[2]) && $count == 3){
                    update_term_meta( $term->term_id, 'height_size', $ar_size[2] );
                }
            }
            sleep(0.5);
        }                                        
    }
}

function custom_paginate_links() {
    global $wp_query, $wp_rewrite;
    
    if ( function_exists('wc_get_loop_prop') && ( ! wc_get_loop_prop( 'is_paginated' ) && !is_search() || ! woocommerce_products_will_display() && !is_search() ) ) {
        return;
    }
    
    /*$BeRocket_Pagination = BeRocket_Pagination::getInstance();
    $options_global = $BeRocket_Pagination->get_option();
    $options = $options_global['general_settings'];*/
    $options = array();
    $options["first_page"] = "«Первая";
    $options["last_page"] = "Последняя»";
    $options["prev_text"] = "«Предыдущая";
    $options["next_text"] = "Следующая»";
    $options['pos_next_prev'] = "around_pagination";

    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $url_parts    = explode( '?', $pagenum_link );

    if( function_exists('wc_get_loop_prop') && !is_search() ) {
        $total   = wc_get_loop_prop( 'total_pages' );
        $current = wc_get_loop_prop( 'current_page' );
    } else {
        $total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
        $current = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
    }
    
    ?>
    <?php
    if( $total > 1 ) {

    $pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';

    $format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
    $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

    $args = apply_filters( 'woocommerce_pagination_args', array(
        'base'                  => $pagenum_link, // http://example.com/all_posts.php%_% : %_% is replaced by format (below)
        'format'                => $format, // ?page=%#% : %#% is replaced by the page number
        'total'                 => $total,
        'current'               => $current,
        'show_all'              => false,
        'prev_next'             => true,
        'prev_text'             => '«',
        'next_text'             => '»',
        'dots_prev_text'        => '…',
        'dots_next_text'        => '…',
        'first_page'            => '1',
        'last_page'             => '%LAST%',
        'current_page'          => '%PAGE%',
        'page'                  => '%PAGE%',
        'end_size'              => 5,
        'mid_size'              => 1,
        'type'                  => 'numbers',
        'add_args'              => array(), // array of query args to add
        'add_fragment'          => '',
        'before_page_number'    => '',
        'after_page_number'     => ''
    ) );
    
    $args["first_page"] = "«Первая";
    $args["last_page"] = "Последняя»";
    $args["prev_text"] = "«Предыдущая";
    $args["next_text"] = "Следующая»";

    if( function_exists('wc_get_loop_prop') ) {
        if ( wc_get_loop_prop( 'is_shortcode' ) ) {
            $args['base']   = esc_url_raw( add_query_arg( 'product-page', '%#%', false ) );
            $args['format'] = '?product-page = %#%';
        } else {
            $args['base']   = esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
            $args['format'] = '';
        }
    }

    if ( ! is_array( $args['add_args'] ) ) {
        $args['add_args'] = array();
    }

    if ( isset( $url_parts[1] ) ) {
        $format = explode( '?', str_replace( '%_%', $args['format'], $args['base'] ) );
        $format_query = isset( $format[1] ) ? $format[1] : '';
        wp_parse_str( $format_query, $format_args );

        wp_parse_str( $url_parts[1], $url_query_args );

        foreach ( $format_args as $format_arg => $format_arg_value ) {
            unset( $url_query_args[ $format_arg ] );
        }

        $args['add_args'] = array_merge( $args['add_args'], urlencode_deep( $url_query_args ) );
    }

    $total = (int) $args['total'];
    if ( $total < 2 ) {
        return;
    }
    $current  = (int) $args['current'];
    $end_size = (int) $args['end_size']; // Out of bounds?  Make it the default.
    if ( $end_size < 0 ) {
        $end_size = 0;
    }
    $mid_size = (int) $args['mid_size'];
    if ( $mid_size < 0 ) {
        $mid_size = 0;
    }
    $add_args = $args['add_args'];
    $r = '';
    $page_links = array();
    $dots = false;
    $next_dots = false;

    $link = str_replace( '%_%', 2 == $current ? '' : $args['format'], $args['base'] );
    $link = str_replace( '%#%', $current - 1, $link );
    if ( $add_args )
        $link = add_query_arg( $add_args, $link );
    $link .= $args['add_fragment'];
    $page_before = '<li class="prev"><a class="prev page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['prev_text'] . '</a></li>';
    $page_before = apply_filters( 'custom_pagination_previous', $page_before );

    $link = str_replace( '%_%', $args['format'], $args['base'] );
    $link = str_replace( '%#%', $current + 1, $link );
    if ( $add_args )
        $link = add_query_arg( $add_args, $link );
    $link .= $args['add_fragment'];

    $page_after = '<li class="next"><a class="next page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['next_text'] . '</a></li>';
    $page_after = apply_filters( 'custom_pagination_next', $page_after );

    $dots_prev_text = '<li class="dots"><span class="page-numbers dots">'.$args['dots_prev_text'].'</span></li>';
    $dots_prev_text = apply_filters( 'custom_pagination_dots_previous', $dots_prev_text );
    $dots_next_text = '<li class="dots"><span class="page-numbers dots">'.$args['dots_next_text'].'</span></li>';
    $dots_next_text = apply_filters( 'custom_pagination_dots_next', $dots_next_text );

    if ( $args['prev_next'] && $current && 1 < $current && $options['pos_next_prev'] == 'around_pagination' ) :
        $page_links[] = $page_before;
    endif;
    $start = true;
    $total_n = number_format_i18n( $total );
    for ( $n = 1; $n <= $total; $n++ ) :
        $current_n = number_format_i18n( $n );
        if ( $n == $current ) :
            $current_n = custom_replace_data_pagination ( $args['current_page'], $current_n, $total_n );
            if ( $args['prev_next'] && $current && 1 < $current && $options['pos_next_prev'] == 'around_current' ) :
                $page_links[] = $page_before;
            endif;
            $page_links[] = "<li class='current'><span class='page-numbers current'>" . $args['before_page_number'] . $current_n . $args['after_page_number'] . "</span></li>";
            $dots = true;
            $next_dots = true;
            if ( $args['prev_next'] && $current && ( $current < $total || -1 == $total ) && $options['pos_next_prev'] == 'around_current' ) :
                $page_links[] = $page_after;
            endif;
        else :
            if ( $args['show_all'] || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
                if ( $n == $total ) {
                    $current_n = custom_replace_data_pagination ( $args['last_page'], $current_n, $total_n );
                } else if ( $n == 1 ) {
                    $current_n = custom_replace_data_pagination ( $args['first_page'], $current_n, $total_n );
                } else {
                    $current_n = custom_replace_data_pagination ( $args['page'], $current_n, $total_n );
                }
                $link = str_replace( '%_%', 1 == $n ? '' : $args['format'], $args['base'] );
                $link = str_replace( '%#%', $n, $link );
                if ( $add_args )
                    $link = add_query_arg( $add_args, $link );
                    $link .= $args['add_fragment'];

                    $page_links[] = "<li class='other'><a class='page-numbers' href='" . esc_url( apply_filters( 'paginate_links', $link ) ) . "'>" . $args['before_page_number'] . $current_n . $args['after_page_number'] . "</a></li>";
                    $dots = true;
                elseif ( $dots && ! $args['show_all'] ) :
                if ( ! $start && $args['prev_next'] && $current && ( $current < $total || -1 == $total ) && $options['pos_next_prev'] == 'around_central' ) :
                    $page_links[] = $page_after;
                endif;
                if ( isset($options['use_dots']) ) {
                    if ( $next_dots ) {
                        $page_links[] = $dots_next_text;
                    } else {
                        $page_links[] = $dots_prev_text;
                    }
                }
                if ( $start && $args['prev_next'] && $current && 1 < $current && $options['pos_next_prev'] == 'around_central' ) :
                    $page_links[] = $page_before;
                endif;
                $dots = false;
                $start = false;
            endif;
        endif;
    endfor;
    if ( $args['prev_next'] && $current && ( $current < $total || -1 == $total ) && $options['pos_next_prev'] == 'around_pagination' ) :
        $page_links[] = $page_after;
    endif;
    
    /*list($page_links[0], $page_links[1]) = array($page_links[1], $page_links[0]);
    $last = count($page_links)-1;
    $prev_last = count($page_links)-2;
    list($page_links[$prev_last], $page_links[$last]) = array($page_links[$last], $page_links[$prev_last]);*/
    
    $r .= "<ul class='page-numbers'>\n\t";
    $r .= join("\n\t", $page_links);
    $r .= "\n</ul>\n";

    do_action( 'custom_ps_before_pagination' );
    echo $r;
    do_action( 'custom_ps_after_pagination' );
    }
    ?>
    <?php
}
function custom_replace_data_pagination ( $text, $page, $lastpage ) {
    $text = str_replace( '%PAGE%', $page, $text );
    $text = str_replace( '%LAST%', $lastpage, $text );
    return $text;
}

// ajax поиск по сайту
add_action('wp_ajax_nopriv_ajax_search', 'ajax_search');
add_action('wp_ajax_ajax_search', 'ajax_search');
function ajax_search()
{  
    global $wpdb;
    $tax_cat = "product_cat";
   
    /*
    $args_terms = array( 
        's' => $_POST['term'],
        'taxonomy' => array( $tax_cat ),
    );
    $term_query = new WP_Term_Query( $args_terms );
    error_log(print_r("term_query", true));
    error_log(print_r($term_query, true));
    if($term_query){
        foreach( $term_query->terms as $term ){ 
            $cat = get_term_by('id', $term->term_id, $tax_cat);
            $term_link = get_term_link($term->term_id, $tax_cat);
            ?>        
            <li class="ajax-search__item">
                <a href="<?=$term_link?>" class="ajax-search__link"><?=$cat->name ?></a>
            </li>
        <?php   
        }
    }*/
    
    $term_query = $wpdb->get_results( "SELECT * FROM wp_terms WHERE name LIKE '%".$_POST['term']."%'" ); 
   
    if($term_query){
        foreach ( $term_query as $term ) { 
            $term_obj = get_term_by('id', $term->term_id, $tax_cat);
            if(is_object($term_obj)){
                $cat_link = get_category_link( $term->term_id );

                //error_log(print_r("term_link", true));
                //error_log(print_r($term_obj, true));
                //$term_link = get_term_link($term->term_id, $tax_cat);           
                ?>
                <li class="ajax-search__item">
                    <a href="<?=$cat_link?>" class="ajax-search__link"><?=$term->name ?> / <span><?=$term_obj->count?></span></a>
                </li>
        <?php }
        }
    }
    

    $sku_query = $wpdb->get_results( "SELECT post_id FROM wp_postmeta WHERE meta_value LIKE '%".$_POST['term']."%'" ); 

    if($sku_query){ 

    foreach ( $sku_query as $post_obj ) { 
            if(get_post_status( $post_obj->post_id ) == 'publish' and get_post_type( $post_obj->post_id ) == 'product'){ ?>
                <li class="ajax-search__item">
                    <a href="<?=get_the_permalink($post_obj->post_id)?>" class="ajax-search__link"><?=get_the_title($post_obj->post_id)?></a>
                </li>
                <?php 
            }
        }
    }
    
    
    $args = array(
        'post_type'      => 'product', // Тип записи: post, page, кастомный тип записи
        'post_status'    => 'publish',
        'order'          => 'DESC',
        'orderby'        => 'date',
        's'              => $_POST['term'],
        'posts_per_page' => -1,
        
    );
    //error_log(print_r("term_link", true));
    //error_log(print_r($args, true));
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post(); 
            wc_get_template_part( 'template-parts/search/content', 'ajax-search' );
        } 
    } 
    
    if(!$query->have_posts() and !$sku_query and !$term_query) { ?>
        <li class="ajax-search__item ajax-search__item-nothing">
            <div class="ajax-search__not-found">Ничего не найдено</div>
        </li>
<?php }


    exit;
}


//поиск только по заголовкам постов
/*function __search_by_title_only( $search, &$wp_query )
{
    
    global $wpdb;
    if ( empty( $search ) )
        return $search; // skip processing - no search term in query
    $q = $wp_query->query_vars;
    $n = ! empty( $q['exact'] ) ? '' : '%';
    $search = '';
    $searchand = '';
    foreach ( (array) $q['search_terms'] as $term ) {
        $term = esc_sql( like_escape( $term ) );
        $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
        $searchand = ' AND ';
    }
    if ( ! empty( $search ) ) {
        $search = " AND ({$search}) ";
        if ( ! is_user_logged_in() )
            $search .= " AND ($wpdb->posts.post_password = '') ";
    }
    error_log(print_r("term_query", true));
    error_log(print_r($search, true));
    return $search;
}
add_filter( 'posts_search', '__search_by_title_only', 500, 2 );*/

/*
function searchfilter($query) {
    if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('trip'));
        $query->set(category__in, array(1,84));
    }
    return $query;
}
add_filter('pre_get_posts','searchfilter');*/

/*** убираем урл в форме комментирования ***/
add_filter('comment_form_default_fields', 'wpcourses_unset_url_field');
function wpcourses_unset_url_field ( $fields ) {
    /*if(is_user_logged_in()){
        print_r($fields);
    }*/
    if ( isset($fields['url'] ))
        unset ( $fields['url'] );
    
    if ( isset($fields['cookies'] ))
        unset ( $fields['cookies'] );
    return $fields;
}

/*** убираем h3 в форме комментирования ***/
function my_comment_form_before() {
    ob_start();
}
add_action( 'comment_form_before', 'my_comment_form_before' );

function my_comment_form_after() {
    $html = ob_get_clean();
    $html = preg_replace(
        '/<h3 id="reply-title"(.*)>(.*)<\/h3>/',
        //'<p id="reply-title"\1>\2</p>',
        '',
        $html
    );
    echo $html;
}
add_action( 'comment_form_after', 'my_comment_form_after' );
/*** убираем h3 в форме комментирования ***/

/*** убираем notes в форме комментирования ***/
add_filter('comment_form_defaults', 'filter_comment_form_defaults');
function filter_comment_form_defaults($defaults) {
    $defaults['comment_notes_before'] = '';
    $defaults['label_submit'] = 'Оставить отзыв';
    return $defaults;
}

add_filter('comment_reply_link', 'filter_comment_reply_link', 10, 4);
function filter_comment_reply_link($link, $args, $comment, $post) {
    return null;
}

/*Изменить порядок вывода полей комментирования*/
/*add_filter('comment_form_fields', 'filter_reorder_comment_fields' );
function filter_reorder_comment_fields( $fields ){
    //if(is_user_logged_in()){
    //    print_r( $fields );
    //}
    // die(print_r( $fields )); // посмотрим какие поля есть

    $new_fields = array(); // сюда соберем поля в новом порядке

    $myorder = array('author','email','url','comment'); // нужный порядок

    foreach( $myorder as $key ){
        $new_fields[ $key ] = $fields[ $key ];
        unset( $fields[ $key ] );
    }

    // если остались еще какие-то поля добавим их в конец
    if( $fields )
        foreach( $fields as $key => $val )
            $new_fields[ $key ] = $val;

    return $new_fields;
}*/


//массовое изменение цен при сохранении категории в кастомайзере
add_action('customize_save_after', 'change_price_on_factories', 100);
function change_price_on_factories( $wp_customize ) {
    
    $factorie_id = get_theme_mod('select_pa_proizvoditeli');//id Фабрики (массовая смена цен товаров выбранной фабрики - customizer)
    $term = get_term($factorie_id, 'pa_proizvoditeli');
    $coefficient_proizvoditeli = get_field('coefficient_proizvoditeli', $term); //Коэффициент фабрики для расчета цен товаров
    $percent_proizvoditeli = get_field('percent_proizvoditeli', $term); //Процент фабрики для расчета цен товаров
    
    if(($factorie_id && $coefficient_proizvoditeli) or ($factorie_id && $percent_proizvoditeli)){
        error_log(print_r($factorie_id, true));
        $args = array(
            'post_type' => 'product',
            'tax_query' => array(
                'relation' => 'OR',
                array(
                    'taxonomy' => 'pa_proizvoditeli', 
                    'field' => 'id',            
                    'terms' => $factorie_id,
                    'operator' => 'IN',
                )
            )
        );

        $query_products = new WP_Query($args);
        if ($query_products->have_posts()) {
            while ($query_products->have_posts()) {
                $query_products->the_post(); 
                $product_id = get_the_ID();
                $product_fixed_price_processing = get_field('product_fixed_price_processing', $product_id);
                if($product_fixed_price_processing != 1){
                    $product = wc_get_product($product_id);

                    //if($product_id == 1862){
                        if ($product->get_type() <> 'variable') {
                            $dollar_rate = intval(get_theme_mod('dollar_rate'));
                            $euro_rate = intval(get_theme_mod('euro_rate'));
                            $zloty_rate = intval(get_theme_mod('zloty_rate'));

                            //$RUB = get_post_meta( $product->id, '_rub_price', true );
                            $USD = get_post_meta($product->id, '_usd_price', true);
                            $EUR = get_post_meta($product->id, '_euro_price', true);
                            $PLN = get_post_meta($product->id, '_pln_price', true);

                            $USD_DISCONT = get_post_meta($product->id, '_usd_price_discount', true);
                            $EUR_DISCONT = get_post_meta($product->id, '_euro_price_discount', true);
                            $PLN_DISCONT = get_post_meta($product->id, '_pln_price_discount', true);

                            $percentage_discount = "";

                            $dollar = "";
                            $euro = "";
                            $zloty = "";
                            $custom_price = "";
                            $custom_price_sale = "";                   

                            //получаем поле базовой цены
                            $regular_price = get_post_meta($product->id, '_regular_price', true);
                            //error_log(print_r($regular_price, true));
                            //получаем поле цены со скидкой
                            $sale_price = get_post_meta($product->id, '_sale_price', true);
                            //error_log(print_r($sale_price, true));

                            if (($regular_price != "") && ($regular_price != 0)) {
                                $custom_price = $regular_price;
                            }
                            if (($USD != "") && ($USD != 0)) {
                                //$custom_price = $USD * $dollar;
                                $custom_price = $USD * $dollar_rate;
                            }
                            if (($EUR != "") && ($EUR != 0)) {
                                //$custom_price = $EUR * $euro;
                                $custom_price = $EUR * $euro_rate;
                            }
                            if (($PLN != "") && ($PLN != 0)) {
                                //$custom_price = $PLN * $zloty;
                                $custom_price = $PLN * $zloty_rate;
                            }
                            //round($custom_price, 2); // округляем до сотых, чтобы в regular_price не записывались огромные дроби
                            /*error_log(print_r('custom_price', 1));
                            error_log(print_r($regular_price, 1));
                            error_log(print_r($USD, 1));
                            error_log(print_r($dollar_rate, 1));
                            error_log(print_r($EUR, 1));
                            error_log(print_r($euro_rate, 1));
                            error_log(print_r($PLN, 1));
                            error_log(print_r($zloty_rate, 1));
                            error_log(print_r($custom_price, 1));*/
                            if($coefficient_proizvoditeli){
                                $custom_price = ceil($custom_price*$coefficient_proizvoditeli/100) * 100;
                            } else if($percent_proizvoditeli) {
                                $number_percent = $custom_price / 100 * $percent_proizvoditeli;
                                $custom_price = ceil(($custom_price+$number_percent)/100) * 100;
                            }

                            if (($sale_price != "") && ($sale_price != 0)) {
                                $custom_price_sale = $sale_price;
                            }
                            if (($USD_DISCONT != "") && ($USD_DISCONT != 0)) {
                                //$custom_price = $USD * $dollar;
                                $custom_price_sale = $USD_DISCONT * $dollar_rate;
                            }
                            if (($EUR_DISCONT != "") && ($EUR_DISCONT != 0)) {
                                //$custom_price = $EUR * $euro;
                                $custom_price_sale = $EUR_DISCONT * $euro_rate;
                            }
                            if (($PLN_DISCONT != "") && ($PLN_DISCONT != 0)) {
                                //$custom_price = $PLN * $zloty;
                                $custom_price_sale = $PLN_DISCONT * $zloty_rate;
                            }
                            //round($custom_price_sale, 2); // округляем до сотых, чтобы в regular_price не записывались огромные дроби

                            if($custom_price_sale != "" && $custom_price_sale != 0){
                                if($coefficient_proizvoditeli){
                                    $custom_price_sale = ceil($custom_price_sale*$coefficient_proizvoditeli/100) * 100;
                                } else if($percent_proizvoditeli) {
                                    $number_percent = $custom_price / 100 * $percent_proizvoditeli;
                                    $custom_price = ceil(($custom_price+$number_percent)/100) * 100;
                                }
                            }
                            //error_log(print_r($custom_price, true));
                            //$regular_price = get_post_meta($post_id, '_price', true); //получаем текущую цену товара

                            //error_log(print_r($custom_price, true));
                           //error_log(print_r($custom_price_sale, true));
                            //error_log(print_r(get_post_meta($post_id, '_sale_price', true), true));

                            //if ($regular_price != $custom_price) { // проверяем совпадает ли текущая цена с нашей новой, если нет, то перезаписываем её
                            error_log(print_r('select_pa_proizvoditeli', true));
                            error_log(print_r($custom_price, true));
                            if ($custom_price == 0) {
                                update_post_meta($product->id, '_regular_price', '');
                                update_post_meta($product->id, '_price', '');
                            } else {
                                update_post_meta($product->id, '_regular_price', $custom_price);
                                update_post_meta($product->id, '_price', $custom_price);
                            }
                            //}

                            //if ($sale_price != $custom_price_sale) { // проверяем совпадает ли текущая цена с нашей новой, если нет, то перезаписываем её

                            // }

                            error_log(print_r('select_pa_proizvoditeli', true));
                            error_log(print_r($custom_price, true));

                            if (($custom_price_sale != "") && ($custom_price_sale != 0)) {
                                if (intval($custom_price_sale) > intval($custom_price)) {
                                    update_post_meta($product->id, '_sale_price', '');
                                } else {
                                    $custom_price_sale = ceil($custom_price_sale /100) * 100;
                                    //error_log(print_r('custom_price_sale', true));
                                    //error_log(print_r($custom_price_sale, true));
                                    if ($custom_price_sale == 0) {
                                        update_post_meta($product->id, '_sale_price', '');
                                        update_post_meta($product->id, '_price', '');
                                    } else {
                                        update_post_meta($product->id, '_sale_price', $custom_price_sale);
                                        update_post_meta($product->id, '_price', $custom_price_sale);
                                    }
                                    $percentage_discount = ceil(((floatval($custom_price) - floatval($custom_price_sale))/floatval($custom_price))*100);//скидка
                                    update_post_meta($product->id, '_hidden_field_discont', $percentage_discount);
                                    //error_log(print_r(get_post_meta($post_id, '_hidden_field_discont', true), true));
                                }
                            }
                        }
                    //}
                }
            } 
        }    
        wp_reset_postdata();
    }
}

function calc_percent($price, $percent){
    return $price * ($percent / 100); 
}


//add_filter( 'wpseo_json_ld_output', 'change_wpseo_json_ld_output', 10, 1 );
/**
 * Replaces hostname in all images with the CDN one.  
 *
 * @param array             $data    Schema.org graph.
 * @param Meta_Tags_Context $context Context object.
 *
 * @return array The altered Schema.org graph.
 */
function change_wpseo_json_ld_output( $deprecated_data ) {
    if(is_user_logged_in()){
        //foreach ( $data as $key => $value ) {
            /*if ( $value['@type'] === 'ImageObject' ) {
                $data[$key]['contentUrl'] = str_replace( 'http://basic.wordpress.test/', 'https://cdn.domain.tld/', $value['contentUrl'] );
            }*/
            print_r($deprecated_data);
        //}
    }
    return $deprecated_data;
}

//if(is_user_logged_in()){
    //add_action( 'wpseo_json_ld', 'hook_wpseo_json_ld', 10, 1 );
    //function hook_wpseo_json_ld( $data ){

       // var_dump( $data );
    //}
//}

add_filter('wpseo_metadesc', 'change_wpseo_metadesc', 20);
add_filter('wpseo_opengraph_desc', 'change_wpseo_metadesc', 20);
function change_wpseo_metadesc($meta_description) {
    //if(is_user_logged_in()){
        if(is_tax('product_cat')){
            global $wp_query; 
            $str_replace = "Калининграде";
            /*$queried_object = get_queried_object();
            $queried_object_id = get_query_var( 'cat' );
            $wpseo_taxonomy_meta = get_option('wpseo_taxonomy_meta');
            $meta_desc = '';
            
            if ( $wpseo_taxonomy_meta && !empty($wpseo_taxonomy_meta)  ) {
                $meta_desc = $wpseo_taxonomy_meta['category'][$queried_object->term_id]['wpseo_desc'];
            } */

            //if($meta_desc != ''){
                if($wp_query->max_num_pages > 1){
                    $pageNum = (get_query_var('paged')) ? get_query_var('paged') : 1; // получаем номер текущей страницы и присваиваем значение переменной
                    $customizer_repeater_category_title_description_list = get_theme_mod('customizer_repeater_category_title_description_list', json_encode( array(
                        /*The content from your default parameter or delete this argument if you don't want a default*/
                        //TODO номер страницы
                    )) );
                    /*This returns a json so we have to decode it*/
                    $count = 1;
                    $customizer_repeater_category_title_description_list_decoded = json_decode($customizer_repeater_category_title_description_list);
                    //print_r($customizer_repeater_category_title_description_list_decoded);
                    foreach($customizer_repeater_category_title_description_list_decoded as $key=>$repeater_item){
                        if($pageNum == $count){
                            if($repeater_item->text != '' && $repeater_item->text != 'undefined'){
                                //$meta_description = $meta_description ." ".$repeater_item->text;
                                $meta_description = str_replace($str_replace, $repeater_item->text, $meta_description);
                                //set_query_var( 'replace_city', '1' );
                                break;
                            }
                            
                        }
                        $count++;
                    }
                } 
            //}
        }
    //}
    return $meta_description;
}

add_filter( 'wpseo_title', 'filter_wpseo_title', 10, 2 );
function filter_wpseo_title( $title, $presentation ){
    //if(is_user_logged_in()){
        if(is_tax('product_cat')){
            global $wp_query; 
            $str_replace = "Калининграде";
            //$queried_object = get_queried_object();
           //$queried_object_id = get_query_var( 'cat' );
            //$meta = get_option( 'wpseo_taxonomy_meta' );

            //$product_cat_title  = $meta['product_cat'][$queried_object_id]['wpseo_title'];
            //echo apply_filters( 'the_title', $product_cat_title );
            if($wp_query->max_num_pages > 1){
                $pageNum = (get_query_var('paged')) ? get_query_var('paged') : 1; // получаем номер текущей страницы и присваиваем значение переменной
                $customizer_repeater_category_title_description_list = get_theme_mod('customizer_repeater_category_title_description_list', json_encode( array(
                    /*The content from your default parameter or delete this argument if you don't want a default*/
                    //TODO номер страницы
                )) );
                /*This returns a json so we have to decode it*/
                $count = 1;
                $customizer_repeater_category_title_description_list_decoded = json_decode($customizer_repeater_category_title_description_list);
                //print_r($customizer_repeater_category_title_description_list_decoded);
                foreach($customizer_repeater_category_title_description_list_decoded as $key=>$repeater_item){
                    if($pageNum == $count){
                        if($repeater_item->text != '' && $repeater_item->text != 'undefined'){
                            //$title = $title ." ".$repeater_item->text;
                            $title = str_replace($str_replace, $repeater_item->text, $title);
                            //set_query_var( 'replace_city', '1' );
                            break;
                        }
                    }
                    $count++;
                }
            } 
        }
   // }
    return $title;
}

//add_filter('wpseo_breadcrumb_links', 'entex_add_crumb_schema', 11, 1);
function entex_add_crumb_schema($crumbs) {
    if(is_user_logged_in()){
        if(is_product_category()){
            $queried_object = get_queried_object();
            $toponym = '';
            
            global $wp_query;
            if($wp_query->max_num_pages > 1){
                $pageNum = (get_query_var('paged')) ? get_query_var('paged') : 1; // получаем номер текущей страницы и присваиваем значение переменной
                $customizer_repeater_category_title_description_list = get_theme_mod('customizer_repeater_category_title_description_list', json_encode( array(
                    /*The content from your default parameter or delete this argument if you don't want a default*/
                    //TODO номер страницы
                )) );
                /*This returns a json so we have to decode it*/
                $count = 1;
                $customizer_repeater_category_title_description_list_decoded = json_decode($customizer_repeater_category_title_description_list);
                //print_r($customizer_repeater_category_title_description_list_decoded);
                foreach($customizer_repeater_category_title_description_list_decoded as $key=>$repeater_item){
                    if($pageNum == $count){
                        if($repeater_item->text != '' && $repeater_item->text != 'undefined'){
                            $toponym = $repeater_item->text;
                            break;
                        }
                    }
                    $count++;
                }
            } 
            
            if($toponym != ''){
                foreach ($crumbs as $crumb){
                    if($crumb['term_id'] === $queried_object->term_id){
                        print_r($crumb['text'].' в '.$toponym);
                        unset($crumb['text']);
                        //$crumb['text'] = $crumb['text'].' в '.$toponym;
                    }
                }
            }
           
                
            echo '<pre>';
            print_r($crumbs); 
            echo '</pre>';
        }
    }
    return $crumbs;
}

function doublee_filter_yoast_breadcrumb_items( $link_output, $link ) {
    if(is_user_logged_in()){
        if(is_product_category()){
            $queried_object = get_queried_object();
            $toponym = '';
            
            global $wp_query;
            if($wp_query->max_num_pages > 1){
                $pageNum = (get_query_var('paged')) ? get_query_var('paged') : 1; // получаем номер текущей страницы и присваиваем значение переменной
                $customizer_repeater_category_title_description_list = get_theme_mod('customizer_repeater_category_title_description_list', json_encode( array(
                    /*The content from your default parameter or delete this argument if you don't want a default*/
                    //TODO номер страницы
                )) );
                /*This returns a json so we have to decode it*/
                $count = 1;
                $customizer_repeater_category_title_description_list_decoded = json_decode($customizer_repeater_category_title_description_list);
                //print_r($customizer_repeater_category_title_description_list_decoded);
                foreach($customizer_repeater_category_title_description_list_decoded as $key=>$repeater_item){
                    if($pageNum == $count){
                        if($repeater_item->text != '' && $repeater_item->text != 'undefined'){
                            $toponym = $repeater_item->text;
                            break;
                        }
                    }
                    $count++;
                }
            } 
            
            if($toponym != ''){
                if($link['term_id'] === $queried_object->term_id){
                    $link['text'] = $link['text'].' в '.$toponym;
                }
            }
        }
    }

    return $link_output;
}
//add_filter( 'wpseo_breadcrumb_single_link', 'doublee_filter_yoast_breadcrumb_items', 10, 2 );


//add_filter( 'woocommerce_catalog_orderby', 'truemisha_add_sort_options' );
 
//function truemisha_add_sort_options( $options ){
 //	$options[ 'discount_amount' ] = 'Скидке';
//	return $options;
//}


add_filter( 'woocommerce_get_catalog_ordering_args', 'truemisha_custom_product_sorting' );
 
function truemisha_custom_product_sorting( $args ) {
 
	// Сортируем по проценту скидки – от высокого к низкому
	if( isset( $_GET[ 'orderby' ] ) && 'discount_amount' === $_GET['orderby'] ) {
		$args[ 'meta_key' ] = 'discount_amount';
		$args[ 'order' ] = 'DESC'; // от высокого к низкому
	}
	return $args;
 
}


add_action( 'woocommerce_product_quick_edit_save', 'truemisha_meta_discount' );
add_action( 'woocommerce_process_product_meta', 'truemisha_meta_discount');
 
function truemisha_meta_discount( $product ) {
 
	$product = wc_get_product( $product );
 
	// если товар не на распродаже, то удаляем мета поле и больше ничего не делаем
	if( ! $product->is_on_sale() ) {
		delete_post_meta( $product->get_id(), 'discount_amount' );
		return;
	}
 
	$regular = $product->get_regular_price();
	$sale = $product->get_sale_price();
	$discount = round( 100 - ( $sale / $regular * 100), 2 );
 
	// сохраняем процент скидки в мета-поле
	update_post_meta( $product->get_id(), 'discount_amount', $discount );
 
}