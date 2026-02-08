<?php

get_header();
?>

    <main>
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="container">
                        <h2><?php the_title(); ?></h2>
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <div class="container">
                <p><?php esc_html_e( 'No content found.', 'positivus' ); ?></p>
            </div>
        <?php endif; ?>
    </main>

<?php
get_footer();
