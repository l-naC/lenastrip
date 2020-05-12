<?php get_header() ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php if(!is_page('map')) : ?>
        <h1 class="text-center my-2"><?php the_title() ?></h1>
        <?php if (has_post_thumbnail()): ?>
        <div class="container-img" style="background-image: url(<?= the_post_thumbnail_url() ?>);"></div>
        <?php endif; ?>
        <div class="container container-single">
            <?php the_content() ?>
        </div>
    <?php else : ?>
        <?php the_content() ?>
    <?php endif; ?>
<?php endwhile; endif; ?>
<?php get_footer() ?>