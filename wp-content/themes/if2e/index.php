<?php get_header(); ?>
    <div class="fix-post-wrap">
        <div class="index post-wrap" id="POST">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content', get_post_format() ); ?>
            <?php endwhile; ?>

            <?php if2e_content_nav( 'nav-below' ); ?>

        </div><!-- div.index post-wrap -->
    </div><!-- div.fix-post-wrap -->

    <?php get_sidebar(); ?>
<?php get_footer(); ?>