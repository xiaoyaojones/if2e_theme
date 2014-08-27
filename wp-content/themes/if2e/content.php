        <section class="post-box" id="post-<?php the_ID(); ?>">
            <i class="post-box_line"></i>
            <div class="post-box_content">
                <?php //置顶start ?>
                <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
                    <div class="featured-post">
                        置顶
                    </div>
                <?php endif; ?>
                <?php //置顶end ?>

                <header class="post-box_header">
                    <?php if ( is_single() ) : ?>
                        <h1 class="post-box_title"><?php the_title(); ?></h1>
                    <?php else : ?>
                        <h1 class="post-box_title">
                            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h1>
                    <?php endif; // is_single() ?>
                    <div class="post-box_meta">
                        <span class="post-box_meta_item post-box_author">
                            <i class="ico ico-author"></i>
                            <?php the_author_posts_link(); ?>
                        </span>
                        <span class="post-box_meta_item">
                            <i class="ico ico-calendar"></i>
                            <?php the_time('M j,Y'); ?>
                        </span>
                        <span class="post-box_meta_item">
                            <i class="ico ico-cate"></i>
                            <?php the_category('/', 'parents' ); ?>
                        </span>
                        <?php if ( has_tag() ) : ?>
                        <span class="post-box_meta_item">
                            <i class="ico ico-tag"></i>
                            <?php the_tags('', ' , ' , ''); ?>
                        </span>
                        <?php endif; ?>
                        <?php if ( comments_open() ) : ?>
                        <span class="post-box_meta_item post-box_meta_reply"><i class="ico ico-reply"></i>
                            <?php comments_popup_link( '评论>>', '1 条评论>>', '% 条评论>>' ); ?>
                        </span>
                        <?php endif; // comments_open() ?>
                    </div>
                    <?php if ( ! post_password_required() && ! is_attachment() ) : ?>
                        <div class="post-box_thumb">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    <?php endif; ?>
                </header><!-- header.post-box_header -->
                <article class="post-box_article">
                    <?php if ( is_search() || is_home() ) : // Only display Excerpts for Search ?>
                        <?php the_excerpt(); ?>
                    </article>
                    <footer class="post-box_footer">
                        <a href="<?php echo get_permalink(); ?>" class="post-box_btn">
                            阅读全文
                            <i class="arrow-right-white"></i>
                        </a>
                    </footer><!-- footer.post-box_footer -->
                    <?php else : ?>
                        <?php the_content(); ?>
                        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
                    </article>
                    <?php endif; ?>
            </div>

        </section>