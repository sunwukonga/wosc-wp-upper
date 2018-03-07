<?php
$show_share = mrseo_elated_blog_single_show_share();
?>
<?php if($show_share) { ?>
    <div class="eltdf-blog-share">
        <?php echo mrseo_elated_get_social_share_html(); ?>
    </div>
<?php } ?>