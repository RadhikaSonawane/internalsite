<aside>

<?php
    $recent_posts = wp_get_recent_posts(array('post_type'=>'resellers'));
    foreach( $recent_posts as $recent ){
		echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
	
    }
?>

<?php
    $recent_posts = wp_get_recent_posts(array('post_type'=>'blog'));
    foreach( $recent_posts as $recent ){
        echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
    }
?>

</aside>

