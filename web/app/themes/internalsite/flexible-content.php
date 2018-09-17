<div class="container">
    <div class="row">
     <?php 
     $content = get_field('content');
     $text = get_field('text');
     $text2 = get_field('text_2');
     $image = get_field('image');
     $relevant_gallerys = get_field('relevant_gallery');
     $name = get_field('name');
     $description = get_field('description');?>

    
    <div class="col-12 img-fluid">
        <img src="<?php echo $image; ?>">
    </div>
    
    <div class="row">
        <div class="col-sm" >
                        <div class="repeater">
                        <?php

                        // check if the repeater field has rows of data
                        if( have_rows('relevant_gallery') ):

                            // loop through the rows of data
                            while ( have_rows('relevant_gallery') ) : the_row();
                            ?>

                            <!-- display a sub field value-->
                                <img src="<?php echo the_sub_field('photos'); ?>" alt="">
                            <?php 
                            endwhile;

                        else :

                            // no rows found

                        endif;

?>
</div>
        </div>  
    </div>
            
            <div class="col-6">
            <p><?php echo $text; ?></p><br/>
            </div>

            <div class="col-6">
            <p><?php echo $text2; ?></p><br/>
            </div>
            
            <div>
                <p><?php echo $description; ?></p><br/>
            </div>
        
  </div>
  </div>