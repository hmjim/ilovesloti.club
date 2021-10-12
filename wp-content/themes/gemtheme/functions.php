<?php
/* Автогенератор метатегов Description и KeyWords */

class Nav_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = '';

		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names . '>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

		if ( 'top' == $args->theme_location ) {
			$submenus    = 0 == $depth || 1 == $depth ? get_posts( array(
				'post_type'   => 'nav_menu_item',
				'numberposts' => 1,
				'meta_query'  => array(
					array(
						'key'    => '_menu_item_menu_item_parent',
						'value'  => $item->ID,
						'fields' => 'ids'
					)
				)
			) ) : false;
			$item_output .= ! empty( $submenus ) ? ( 0 == $depth ? ' <i class="fa fa-angle-down" aria-hidden="true"></i>' : ' ' ) : '';
		}
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

add_theme_support( 'post-thumbnails' ); // включаем поддержку миниатюр

register_sidebar( array( // регистрируем левую колонку, этот кусок можно повторять для добавления новых областей для виджитов
	'name'          => 'Колонка слева', // Название в админке
	'id'            => "left-sidebar", // идентификатор для вызова в шаблонах
	'description'   => 'Обычная колонка в сайдбаре', // Описалово в админке
	'before_widget' => '<div id="%1$s" class="widget %2$s">', // разметка до вывода каждого виджета
	'after_widget'  => "</div>\n", // разметка после вывода каждого виджета
	'before_title'  => '<span class="widgettitle">', //  разметка до вывода заголовка виджета
	'after_title'   => "</span>\n", //  разметка после вывода заголовка виджета
) );

function pagination() { // функция вывода пагинации
	global $wp_query; // текущая выборка должна быть глобальной
	$big = 999999999; // число для замены
	echo paginate_links( array( // вывод пагинации с опциями ниже
		'base'               => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		// что заменяем в формате ниже
		'format'             => '?paged=%#%',
		// формат, %#% будет заменено
		'current'            => max( 1, get_query_var( 'paged' ) ),
		// текущая страница, 1, если $_GET['page'] не определено
		'type'               => 'list',
		// ссылки в ul
		'prev_text'          => '<i class="fa fa-angle-left" aria-hidden="true"></i> <span>Предыдущая</span>',
		// текст назад
		'next_text'          => '<span>Следующая</span> <i class="fa fa-angle-right" aria-hidden="true"></i>',
		// текст вперед
		'total'              => $wp_query->max_num_pages,
		// общие кол-во страниц в пагинации
		'show_all'           => false,
		// не показывать ссылки на все страницы, иначе end_size и mid_size будут проигнорированны
		'end_size'           => 15,
		//  сколько страниц показать в начале и конце списка (12 ... 4 ... 89)
		'mid_size'           => 15,
		// сколько страниц показать вокруг текущей страницы (... 123 5 678 ...).
		'add_args'           => false,
		// массив GET параметров для добавления в ссылку страницы
		'add_fragment'       => '',
		// строка для добавления в конец ссылки на страницу
		'before_page_number' => '',
		// строка перед цифрой
		'after_page_number'  => ''
		// строка после цифры
	) );
}

function change_post_menu_label() {
	global $menu, $submenu;
	$menu[5][0]                 = 'Игры';
	$submenu['edit.php'][5][0]  = 'Игры';
	$submenu['edit.php'][10][0] = 'Добавить игру';
	echo '';
}

add_action( 'admin_menu', 'change_post_menu_label' );
function change_post_object_label() {
	global $wp_post_types;
	$labels                     = &$wp_post_types['post']->labels;
	$labels->name               = 'Игры';
	$labels->singular_name      = 'Игры';
	$labels->add_new            = 'Добавить игру';
	$labels->add_new_item       = 'Добавить игру';
	$labels->edit_item          = 'Редактировать игру';
	$labels->new_item           = 'Добавить игру';
	$labels->view_item          = 'Посмотреть игру';
	$labels->search_items       = 'Найти игру';
	$labels->not_found          = 'Не найдено';
	$labels->not_found_in_trash = 'Корзина пуста';
}

add_action( 'init', 'change_post_object_label' );


add_action( 'wp_enqueue_scripts', 'scf_theme_scripts' );

function scf_theme_scripts() {
	// Подключаем стили
	wp_enqueue_style( 'wp-style', get_stylesheet_uri() );

	// Подключаем скрипты
	wp_enqueue_script( 'libs-scr', get_stylesheet_directory_uri() . '/js/libs.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'scripts-scr', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'jquery' ), '1.0.0' );
}


add_action( 'init', 'dev_taxonomy', 0 );

// функция, создающая 2 новые таксономии "genres" и "writers" для постов типа "book"
function dev_taxonomy() {
	// определяем заголовки для 'genre'
	$labels = array(
		'name'              => _x( 'Разработчики', 'taxonomy general name' ),
		'singular_name'     => _x( 'Разработчик', 'taxonomy singular name' ),
		'search_items'      => __( 'Поиск Разработчиков' ),
		'all_items'         => __( 'Все Разработчики' ),
		'parent_item'       => __( 'Parent Genre' ),
		'parent_item_colon' => __( 'Parent Genre:' ),
		'edit_item'         => __( 'Редактировать Разработчика' ),
		'update_item'       => __( 'Обновить Разработчика' ),
		'add_new_item'      => __( 'Добавить нового Разработчика' ),
		'new_item_name'     => __( 'Имя нового Разработчика' ),
		'menu_name'         => __( 'Разработчики' ),
	);

	// Добавляем древовидную таксономию 'genre' (как категории)
	register_taxonomy( 'developers', array( 'post' ), array(
		'hierarchical' => true,
		'labels'       => $labels,
		'show_ui'      => true,
		'query_var'    => true,
		'rewrite'      => array( 'slug' => 'developers' ),
	) );
}

add_action( 'init', 'register_post_types' );
function register_post_types() {
	register_post_type( 'game_news', array(
		'label'              => null,
		'labels'             => array(
			'name'               => 'Новости', // основное название для типа записи
			'singular_name'      => 'Новость', // название для одной записи этого типа
			'add_new'            => 'Добавить новость', // для добавления новой записи
			'add_new_item'       => 'Добавление новости', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование новости', // для редактирования типа записи
			'new_item'           => 'Новая новость', // текст новой записи
			'view_item'          => 'Смотреть новость', // для просмотра записи этого типа.
			'search_items'       => 'Найти новость', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Новости', // название меню
		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	) );
}


add_shortcode( 'screen', 'add_screens' );

function add_screens() {
	$html = '';
	if ( have_rows( 'screens' ) ):
		$html .= '<div class="bg-dark-purple block mb20">';
		$html .= '<div class="h4"><img src="' . get_stylesheet_directory_uri() . '/images/icon-screen.png">Скриншоты из игрового автомата</div>';
		$html .= '<div class="owl-carousel screen-carousel">';
		while ( have_rows( 'screens' ) ): the_row();
			$thumb     = get_post( get_sub_field( 'image' ) );
			$image_alt = get_post_meta( get_sub_field( 'image' ), '_wp_attachment_image_alt', true );
			$link      = get_sub_field( 'image' );
			$html      .= '<div class="screen-item">';
			$html      .= '<a href="' . wp_get_attachment_url( $link ) . '">';
			$html      .= '<img src="' . kama_thumb_src( "w=249 &h=162", $link ) . '" title="' . $thumb->post_title . '" alt="' . $image_alt . '"></a></div>';
		endwhile;
		$html .= '</div></div>';
	endif;
	print '<pre>';
	var_dump( $link );
	print '</pre>';

	return $html;
}

//начало вкладок прописка кнопок
function rndm_button() {
	if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
		add_filter( 'mce_external_plugins', 'rndm_plugin' );
		add_filter( 'mce_buttons_2', 'rndm_register_button' );
	}
}

add_action( 'init', 'rndm_button' );

function rndm_plugin( $plugin_array ) {
	$plugin_array['rndm'] = get_bloginfo( 'template_url' ) . '/js/newbuttons.js';

	return $plugin_array;
}

function rndm_register_button( $buttons ) {
	array_push( $buttons, "screen" );

	return $buttons;
}

remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'pre_link_description', 'wp_filter_kses' );
remove_filter( 'pre_link_notes', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );

/* Страница настроек */
if ( function_exists( 'acf_add_options_page' ) ) {
	$option_page = acf_add_options_page( array(
		'page_title' => 'Настройки сайта',
		'menu_title' => 'Настройки сайта',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );
}


add_filter( 'wp_get_attachment_url', 'clrs_get_attachment_url', 10, 2 );

function clrs_get_attachment_url( $url, $post_id ) {

	return str_replace( 'https://iloveslotiz.ey.r.appspot.com', '//2ilovesloti.com', $url );
}


add_filter( 'the_content', 'change_image_url' );

function change_image_url( $content ) {
	return str_replace( 'https://iloveslotiz.ey.r.appspot.com/wp-content/uploads/', '//2ilovesloti.com/wp-content/uploads/', $content );
}


/**
 * ==============================================================================
 * Rewrite rule redirects
 * ==============================================================================
 */
function goto_handler() {

	switch ( $_SERVER['REQUEST_URI'] ) {

		case '/casinos/icash' :
			{
				$location = 'https://directplay4win.com/landingpages/vulkan24gift/index.php?refCode=wp_w3004p162_ilovesltmoney';
				break;
			}

		case '/casinos/azartplay' :
			{
				$location = 'https://a3art4play.com/?e33d1c451b6af50a6363e06900a4a4bd=';
				break;
			}

		case '/casinos/colambus' :
			{
				$location = 'https://mobywin7.com/?s=45&ref=wp_w3004p122_iloveslt&url&popupAnchor=popup-reg';
				break;
			}

		case '/casinos/admiral' :
			{
				$location = 'https://mobywin7.com/?s=45&ref=wp_w3004p122_iloveslt&url&popupAnchor=popup-reg';
				break;
			}

		case '/casinos/maxbet' :
			{
				$location = 'https://mobywin7.com/?s=3&ref=wp_w3004p3_iloveslt&url&popupAnchor=popup-reg';
				break;
			}

		case '/casinos/slotozal' :
			{
				$location = 'https://mobywin7.com/?s=8&ref=wp_w3004p8_iloveslt&url&popupAnchor=popup-reg';
				break;
			}

		case '/casinos/eldorado' :
			{
				$location = 'https://mobywin7.com/?s=52&ref=wp_w3004p163_iloveslt&url&popupAnchor=popup-reg';
				break;
			}

		case '/casinos/faraon' :
			{
				$location = 'https://mobywin7.com/?s=48&ref=wp_w3004p129_iloveslt&url&popupAnchor=popup-reg';
				break;
			}

		case '/casinos/vulkan' :
			{
				$location = 'https://mobywin7.com/?s=35&ref=wp_w3004p43_iloveslt&url&popupAnchor=popup-reg';
				break;
			}

		case '/casinos/vulkand' :
			{
				$location = 'https://mobywin7.com/?s=55&ref=wp_w3004p276_ilovetop&url&popupAnchor=popup-reg';
				break;
			}

		case '/casinos/vulkan24' :
			{
				$location = 'https://mobywin7.com/?s=53&ref=wp_w3004p162_iloveslt&url&popupAnchor=popup-reg';
				break;
			}

		case '/casinos/million' :
			{
				$location = 'https://trftocsn.com/9747/3?l=173&param1=ilovesloti';
				break;
			}

		case '/casinos/pobeda' :
			{
				$location = 'https://trftocsn.com/9747/4?l=4&param1=iloveslt';
				break;
			}

		case '/casinos/gms' :
			{
				$location = 'https://mobywin7.com/?s=39&ref=wp_w3004p46_ilove&url&popupAnchor=popup-reg';
				break;
			}

		case '/casinos/azino777' :
			{
				$location = 'https://winmaster777.com/l/5bf5949bc88d8d34d641fbeb';
				break;
			}

		case '/casinos/europa' :
			{
				$location = 'http://record.mik123.com/_ryXhFbLQsXKbhcnj9H86A2Nd7ZgqdRLk/1/';
				break;
			}

		case '/casinos/deluxe' :
			{
				$location = 'https://mobywin7.com/?s=55&ref=wp_w3004p169_iloveslt&url&popupAnchor=popup-reg';
				break;
			}

	}

	if ( $location != '' ) {
		header( 'Location: ' . $location );
		exit;
	}

}

add_action( 'init', 'goto_handler', 1 );