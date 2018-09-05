<?php

function mbt_register_menus() {
	// this function registers menus
	register_nav_menus([
		'primary_menu' => 'Huvudmeny',
	]);
}
add_action('init', 'mbt_register_menus');
function mbt_styles() {
	wp_enqueue_style('bootstrap4-styles', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
	wp_enqueue_style('mbt-styles', get_stylesheet_directory_uri() . '/style.css');
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', [], '3.2.1', true);
	wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', ['jquery'], '1.12.9', true);
	wp_enqueue_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', ['jquery', 'popper'], '4.0.0', true);
	wp_enqueue_script('mbt-script', get_stylesheet_directory_uri() . '/scripts/script.js', ['jquery', 'bootstrap'], false, true);
}
add_action('wp_enqueue_scripts', 'mbt_styles');

//add featured image in post
add_theme_support('post-thumbnails', array(
'post',
'page',
'custom-post-type-name',
));

//add menu in appearance 

function pietergoosen_theme_setup() {
    register_nav_menus( array( 
      'header' => 'Header menu', 
      'footer' => 'Footer menu' 
    ) );
   }
  
  add_action( 'after_setup_theme', 'pietergoosen_theme_setup' );

  function mbt_setup() {
    // add support for featured images
    add_theme_support('post-thumbnails');

    // add some image sizes specific to our theme
    add_image_size('post-featured-image', 2560, 500, true);

    // add support for custom logo
    $options = [
      'height' => 80,
      'width' => 160,
      'flex-width' => true,
      'flex-height' => false,
    ];
    add_theme_support('custom-logo', $options);
  }
  add_action('after_setup_theme', 'mbt_setup');

  function mbt_widgets() {
    // register blog sidebar
    register_sidebar([
      'name'			=> "Sidofält för bloggen",
      'id'			=> 'sidebar_blog',
      'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
      'after_widget'	=> '</div>',
    ]);
    // register footer sidebar

    register_sidebar([
      'name'			=> "Sidfots-widgetar",
      'id'			=> 'sidebar_footer',
      'before_widget'	=> '<div id="%1$s" class="widget col %2$s">',
      'after_widget'	=> '</div>',
    ]);
  }
  add_action('widgets_init', 'mbt_widgets');

  /* change excerpt length to 20 words */
  function mbt_excerpt_length($length) {
    return 20;
  }
  add_filter('excerpt_length', 'mbt_excerpt_length', 20);

  /* change excerpt length to 80 words */
  function modify_read_more_link() {
    return '<br/><a class="more-link btn btn-outline-light" href="' . get_permalink() . '">Read More</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

  // Replaces the excerpt "Read More" text by a link
  function new_excerpt_more($more) {
  global $post;
return '<br/><a class="moretag btn btn-outline-light" href="'. get_permalink($post->ID) . '"> Read More</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

  /* add bg-dark to body classes if logged in */
  function mbt_body_class($classes) {
    if (is_user_logged_in()) {
      $classes[] = 'bg-dark';
      $classes[] = 'text-white';
    }
    return $classes;
  }

  //add_filter('body_class', 'mbt_body_class');
  /* filter content */
  function mbt_content($content) {
    $words = ["Lorem", "ipsum", "dolor", "sit", "amet"];
    $replace = [];
    foreach ($words as $word) {
      $wordlength = strlen($word); // calculate length of word
      $replaceword = str_repeat("*", $wordlength); // repeat * for length of word
      $replace[$word] = $replaceword;
    }

    /*
    // shorter version on one line, a.k.a. one-liner
    foreach ($words as $word) {
      $replace[$word] = str_repeat("*", strlen($word)); // repeat * for length of word;
    }
    */
    // above will generate the following array
    // $replace = [
    // 	'Lorem' => '*****',
    // 	'ipsum' => '*****',
    // 	'dolor' => '*****',
    // 	'sit' => '***',
    // 	'amet' => '****',
    // ];
    
    return str_replace(array_keys($replace), array_values($replace), $content);
  }
  // add_filter('the_content', 'mbt_content');
  function mbt_site_logo() {
    // get logo media id
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    // get URL to logo
    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    // do we have a custom logo?
    if (has_custom_logo()) {
      // if so, echo image-tag to logo
      echo '<img src="'. esc_url($logo[0]) .'">';
    } else {
      // if not, echo site name in text
      echo get_bloginfo('name');
    }
  }
  /** exclude posts in category FAQ (6) from main page */
  function exclude_category($query) {
    if ($query->is_home() && $query->is_main_query()) {
      $query->set('cat', '-6');
    }
  }
  add_action('pre_get_posts', 'exclude_category');
  
/**sidebar-left */
  function my_custom_sidebar() {
    register_sidebar(
        array (
            'name' => __( 'Custom', 'your-theme-domain' ),
            'id' => 'custom-side-bar',
            'description' => __( 'Custom Sidebar', 'your-theme-domain' ),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'my_custom_sidebar' );

/** comment form */
function remove_comment_fields($fields) {
  unset($fields['url']);
  return $fields;
}
add_filter('comment_form_default_fields','remove_comment_fields');

/** Search function */
function add_last_nav_item($items, $args) {
  if ($args->menu == 'header_menu') {
        $homelink = get_search_form();
        $items = $items;
        $items .= '<li>'.$homelink.'</li>';
        return $items;
  }
  return $items;
}
add_filter( 'wp_nav_menu_items', 'add_last_nav_item', 10, 2 );


