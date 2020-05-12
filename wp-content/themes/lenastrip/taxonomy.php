<?php get_header() ?>
<?php 
if (is_tax('continents_albums')) {
    $h1 = 'De magnifique photos d\'';
    $title= 'Photos de mes voyages ';
}else{
    $h1 = 'Mes voyages en ';
    $title= 'Mes voyages ';
}
?>
    <div class="container-img" style="background-image: url(<?= get_template_directory_uri() . '/assets/img/intro.jpg' ?>);">
        <?php $term = get_queried_object();?>
        <h1 class="text-center"><?= $h1 ?><?= $term->name ?></h1>
    </div>
    <?php get_template_part('template_part/nav-taxonomy', 'post') ?>
    <div class="container">
        <h1 class="my-2"><?= $title ?></h1>
        <?php if (have_posts()) : ?>
            <div class="row">
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template_part/card', 'post') ?>
                <?php endwhile ?>
            </div>
        <?php else : ?>
            <h3>Pas d'articles</h3>
        <?php endif; ?>
<?php get_footer() ?>