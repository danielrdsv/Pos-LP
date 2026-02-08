<?php
get_header();
?>
</header>

<main>
    <?php get_template_part('template-parts/section', 'services'); ?>

    <?php get_template_part('template-parts/section', 'cta'); ?>

    <?php get_template_part('template-parts/section', 'cases'); ?>

    <?php get_template_part('template-parts/section', 'process'); ?>

    <?php get_template_part('template-parts/section', 'team'); ?>

    <?php get_template_part('template-parts/section', 'testimonials'); ?>

    <?php get_template_part('template-parts/section', 'contact'); ?>
</main>

<?php
get_footer();
