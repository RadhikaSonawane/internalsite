<div class="row">
     <?php 
     $content = get_field('content');
     $text = get_field('text');
     $image = get_field('image');
     $relevant_gallerys = get_field('relevant_gallery');

     if( $relevant_gallerys ): ?>
     <div class="gallery">
     <?php foreach( $relevant_gallerys as $relevant_gallery): ?>
     <?php $src = $relevant_gallery['url']; ?>
     <img src="<?php echo $src; ?>" alt="">
    
     <?php endforeach; ?>
     </div>
     <?php endif; ?>

     <p><?php echo get_field('text')?></p><br/>
     <p><?php echo get_field('caption')?></p><br/>
     <p><?php echo get_field('quote')?></p><br/>
     <h3><?php echo get_field('name')?></h3><br/>
     <img src="<?php echo get_field('image')?>"><br/>
    <p><?php echo get_field('description')?></p><br/>
    <p><?php echo get_field('add_content_block')?></p><br/>



</div><br/>