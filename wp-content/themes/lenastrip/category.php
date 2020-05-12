<?php get_header() ?>
<?php 
if (is_category('Albums')) {
    $h1 = 'Admirer les plus belles photos de mes voyages';
    $title= 'Mes photos du monde';
}else{
    $h1 = 'Découvrez mes voyages à travers le monde';
    $title= 'Mes articles de voyage';
}
?>
    <div class="container-img" style="background-image: url(<?= get_template_directory_uri() . '/assets/img/intro.jpg' ?>);">
        <h1 class="text-center"><?= $h1 ?></h1>
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
            <h1>Pas d'articles</h1>
        <?php endif; ?>
    </div>
<?php get_footer() ?>