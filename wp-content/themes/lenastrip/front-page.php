<?php get_header() ?>
<div class="container-img" style="background-image: url(<?= get_template_directory_uri() . '/assets/img/intro.jpg' ?>);">
    <h1 class="text-center"><?= the_title() ?></h1>
</div>

<div class="container my-4">
    <h2 class="mt-5 mb-3">À la une</h2>
    <?php
    $recentPosts = new WP_Query();
    $recentPosts->query('showposts=10');

    if (have_posts()) : ?>
        <div class="row">
        <?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
                <?php get_template_part('template_part/card', 'post') ?>
        <?php endwhile; ?>
        </div>

    <?php else : ?>
        <h1>Pas d'article</h1>
    <?php endif; ?>
</div>
<?php get_footer() ?>