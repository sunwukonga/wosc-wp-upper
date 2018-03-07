<?php
$tags = wp_get_post_terms(get_the_ID(), 'portfolio-tag');
$tag_names = array();

if(is_array($tags) && count($tags)) : ?>
    <div class="eltdf-ps-info-item eltdf-ps-tags">
        <h5 class="eltdf-ps-info-title"><?php esc_html_e('Tags:', 'eltdf-core'); ?></h5>
        <p class="eltdf-ps-info-content">
            <?php foreach($tags as $tag) { ?>
                <a itemprop="url" class="eltdf-ps-info-tag" href="<?php echo esc_url(get_term_link($tag->term_id)); ?>"><?php echo esc_html($tag->name); ?></a>
            <?php } ?>
        </p>
    </div>
<?php endif; ?>