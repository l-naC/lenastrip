<?php 
if (is_category('Albums') || is_tax('continents_albums')) {
    $taxonomy_name = 'continents_albums';
    $nav_link_taxonomy= 'nav-link-taxonomy-albums';
    $continents = get_terms(['taxonomy' => $taxonomy_name]); 
}else{
    $taxonomy_name = 'continents';
    $nav_link_taxonomy= 'nav-link-taxonomy';
    $continents = get_terms(['taxonomy' => $taxonomy_name]); 
}
?>
<ul class="nav nav-pills my-4 justify-content-center">
    <?php foreach ($continents as $continent) : 
        if (!is_tax($taxonomy_name, $continent->term_id)) :
        ?>
        <li class="nav-items nav-items-taxonomy m-2">
            <a href="<?= get_term_link($continent) ?>" class="nav-link <?=  $nav_link_taxonomy ?> text-center <?= (is_tax($taxonomy_name, $continent->term_id)) ? 'active' : '' ?>"><?= $continent->name ?></a>
        </li>
    <?php endif; endforeach ?>
</ul>