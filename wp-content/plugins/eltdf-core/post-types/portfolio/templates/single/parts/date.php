<?php if(mrseo_elated_options()->getOptionValue('portfolio_single_hide_date') === 'yes') : ?>
    <div class="eltdf-ps-info-item eltdf-ps-date">
        <h5 class="eltdf-ps-info-title"><?php esc_html_e('Date:', 'eltdf-core'); ?></h5>
        <p itemprop="dateCreated" class="eltdf-ps-info-date eltdf-ps-info-content entry-date updated"><?php the_time(get_option('date_format')); ?></p>
        <meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(mrseo_elated_get_page_id()); ?>"/>
    </div>
<?php endif; ?>