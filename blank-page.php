<?php
/**
 * Template Name: Blank no container
 */

get_header('blank');
?>
    <section id="primary" class="content-area">
        <div id="main" class="site-main" role="main">
            <?php
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/content', 'notitle' );
                endwhile; // End of the loop.
            ?>
        </div><!-- #main -->
    </section><!-- #primary -->

<?php
get_footer('blank');
