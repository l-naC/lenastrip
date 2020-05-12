<?php get_header() ?>
    <div class="container-img" style="background-image: url(<?= get_template_directory_uri() . '/assets/img/intro.jpg' ?>);"></div>
    <div class="container">
        <h1 class="mt-5 mb-3">À la une</h1>
        <?php if (have_posts()) : ?>
            <div class="row">
                <?php while (have_posts()) : the_post(); ?>
                    <?php 
                    foreach (get_the_category() as $category) :
                        if ( $category->name === 'Voyages' ) :
                    ?>
                    
                    <?php get_template_part('template_part/card', 'post') ?>
                    
                    <?php endif; endforeach; ?>
                <?php endwhile ?>
            </div>
        <?php else : ?>
            <h3>Pas d'articles</h3>
        <?php endif; ?>
    </div>
<?php get_footer() ?>