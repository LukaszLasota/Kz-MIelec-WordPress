<?php get_header(); ?>

<main role="main">
    <section class="vb">
        <h2 class="section-head-one"><span>Zaplanuj wizytę</span></h2>

        <?php
      while(have_posts()){
        the_post(); 
        
        $file = get_field("yellow-picture");
        $url= $file["url"];
        $altYellow = $file["alt"];

        $thumbnail_id = get_post_thumbnail_id( $post->ID );
        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

        $content = apply_filters( 'the_content', get_the_content());
        
?>
        <div class="center">
            <div class="vb__item">
                <a href="<?php echo home_url( '/zaplanuj-wizyte' ); ?>">
                    <div class="vb__image">
                        <figure>
                            <img class="vb__image--one" src="<?php echo get_the_post_thumbnail_url(); ?>"
                                alt="<?php echo esc_attr($alt); ?>">
                        </figure>
                        <?php if($file):?>
                        <figure>
                            <img class="vb__image--two" src="<?php echo esc_attr($url); ?>"
                                alt="<?php echo esc_attr($altYellow); ?>">
                        </figure>
                        <?php endif; ?>
                    </div>
                </a>

            </div>
            <p class="vb__paragraph"><?php the_title(); ?></p>
            <p class="vb__paragraph"><?php if(has_excerpt()){ echo get_the_excerpt();} else{ echo '';}?></p>
            <div class="vb__paragraph--one"><?php echo $content; ?></div>
        </div>

        <div class="center">
            <div class="black-circle">
                <a href="#">
                    <figure><img srcset="<?php echo get_template_directory_uri(); ?>/img/strzalki/3.png" alt="">
                    </figure>
                </a>
            </div>
        </div>
        <?php } ?>
    </section>
</main>






<?php get_footer(); ?>