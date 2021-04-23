<section class="vb" id="two">
    <h2 class="section-head"><span>Zaplanuj wizytę</span></h2>

    <?php
        $visits = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'zaplanuj-wizyte',
            'order' => 'ASC',
            ));
            while($visits->have_posts()){
                  $visits->the_post(); 
                  
            $file = get_field("yellow-picture");
            $url= $file["url"];
            $altYellow = $file["alt"];

            $thumbnail_id = get_post_thumbnail_id( $post->ID );
            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
            $postID = get_the_ID() == 46;
    ?>

    <div class="vb__item">
        <a href="<?php echo get_post_type_archive_link('zaplanuj-wizyte'); ?>">
            <div class="vb__image">
                <figure>
                    <img class="vb__image--one" src="<?php echo get_the_post_thumbnail_url(); ?>"
                        alt="<?php echo esc_attr($alt); ?>">
                </figure>
                <?php if($file):?>

                <?php if($postID){'';} else{?>
                <figure>
                    <img class="vb__image--two" src="<?php echo esc_attr($url); ?>"
                        alt="<?php echo esc_attr($altYellow); ?>">
                </figure>
                <?php }?>

                <?php endif; ?>
            </div>
        </a>
        <p class="vb__paragraph"><?php the_title(); ?></p>
        <p class="vb__paragraph"><?php if(has_excerpt()){ echo get_the_excerpt();} else{ echo '';}?></p>
    </div>

    <?php  } wp_reset_postdata(); ?>

</section>