<?php
$excerpt_length = isset($params['excerpt_length']) ? $params['excerpt_length'] : '';
$excerpt = mrseo_elated_excerpt($excerpt_length);
?>
<?php if($excerpt !== '') { ?>
    <div class="eltdf-post-excerpt-holder">
        <p itemprop="description" class="eltdf-post-excerpt">
            <?php print $excerpt; ?>
        </p>
    </div>
<?php } ?>
