<?php

use Lenastrip\CommentWalker;

$count = get_comments_number();
?>
<div class="container my-5">
    <?php if ($count > 0) : ?>
        <h3>Commentaire<?= $count > 1 ? 's' : '' ?></h3>
    <?php else: ?>
        <h3>Laisser un commentaire</h3>
    <?php endif; ?>
    <div class="my-5">
        <?php wp_list_comments(['style' => 'div', 'walker' => new CommentWalker()]) ?>

        <?php paginate_comments_links() ?>
    </div>
    

    <?php if (comments_open()): ?>
    <?php comment_form(['title_reply' => '']) ?>
    <?php endif; ?>
</div>

