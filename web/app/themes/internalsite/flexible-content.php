
<?php    
$title             = get_field('title');
$content           = get_field('content');
$text              = get_field('text');
$text2             = get_field('text_2');
$image             = get_field('image');
$relevant_gallerys = get_field('relevant_gallery');
$description       = get_field('description')
?>

<div class="container">
    <h1 class="my-4 text-center text">
        <?php echo $title; ?>
    </h1>

    <div class="row">
        <div class="col-12 " >
            <img class="img-fluid" alt="Responsive image" src="<?php echo $image; ?>">
        </div>

        <div class="col-sm pics">
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
    
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <p>
                <?php echo $text; ?>
            </p>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6">
            <p>
                <?php echo $text2; ?>
            </p>
        </div>

        <div class="col-12">
            <p>
                <?php echo $description; ?>
            </p>
        </div>
    </div>

</div><!--end container-->