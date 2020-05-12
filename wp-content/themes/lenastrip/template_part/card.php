<?php if (is_sticky(get_the_ID()) && !is_category('Voyages') && !is_tax('continents')) : ?>
    <div class="row col-md-12 my-3">
        <div class="col-md-6 text-center">
            <?php the_post_thumbnail('post-thumbnail', ['alt' => '', 'style' => 'width: 80%; height: auto;']) ?>
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center">
            <h2 class=""><?php the_title() ?></h2>
            <?php the_excerpt() ?>
        </div>
    </div>
<?php elseif (is_category('Albums') || is_tax('continents_albums')) : ?>
    <div class="col-sm-4 my-4">
        <div class="card">
            <a href="<?php the_permalink() ?>" class="card-link">
                <?= the_content() ?>
                <div class="card-body p-1">
                    <h2 class="card-title mt-2 mb-0"><?php the_title() ?></h2>
                </div>
            </a>
        </div>
    </div>
<?php else : ?>
    <div class="col-sm-4 my-4">
        <div class="card">
            <a href="<?php the_permalink() ?>" class="card-link">
                <?php the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top', 'alt' => '', 'style' => 'height: auto;']) ?>
                <div class="card-body p-1">
                    <h2 class="card-title mb-0"><?php the_title() ?></h2>
                    <?php the_excerpt() ?>
                </div>
            </a>
        </div>
    </div>
<?php endif; ?>