<?php if(mrseo_elated_options()->getOptionValue('portfolio_single_hide_pagination') !== 'yes') : ?>
    <?php
    $back_to_link = get_post_meta(get_the_ID(), 'portfolio_single_back_to_link', true);
    $nav_same_category = mrseo_elated_options()->getOptionValue('portfolio_single_nav_same_category') == 'yes';
    ?>
    <div class="eltdf-ps-navigation">
        <?php if(get_previous_post() !== '') : ?>
            <div class="eltdf-ps-prev">
                <?php $title = get_previous_post()->post_title; ?>
                <?php if($nav_same_category) {
                previous_post_link('%link', '<div class="eltdf-portfolio-prev"><i class="eltdf-ps-nav-mark fa fa-long-arrow-left" aria-hidden="true"></i><span class = "eltdf-portfolio-navigation-info">'.$title.'</span></div>', TRUE , '' , 'portfolio-category');
                } else {
                previous_post_link('%link', '<div class="eltdf-portfolio-prev"><i class="eltdf-ps-nav-mark fa fa-long-arrow-left" aria-hidden="true"></i><span class = "eltdf-portfolio-navigation-info">'.$title.'</span></div>');
                }?>
                <p><?php esc_html_e('Previous post','eltdf-core') ?></p>
            </div>
        <?php endif; ?>

        <?php if($back_to_link !== '') : ?>
            <div class="eltdf-ps-back-btn">
                <a itemprop="url" href="<?php echo esc_url(get_permalink($back_to_link)); ?>">
                    <span class="icon_grid-2x2" aria-hidden="true"></span>
                </a>
            </div>
        <?php endif; ?>

        <?php if(get_next_post() !== '') : ?>
            <div class="eltdf-ps-next">
                <?php $title = get_next_post()->post_title; ?>
                <?php if($nav_same_category) {
                    next_post_link('%link', '<div class="eltdf-portfolio-next"><i class="eltdf-ps-nav-mark fa fa-long-arrow-right" aria-hidden="true"></i><span class = "eltdf-portfolio-navigation-info">'.$title.'</span></div>', TRUE , '' , 'portfolio-category');
                } else {
                    next_post_link('%link', '<div class="eltdf-portfolio-next"><i class="eltdf-ps-nav-mark fa fa-long-arrow-right" aria-hidden="true"></i><span class = "eltdf-portfolio-navigation-info">'.$title.'</span></div>');
                }?>
                <p><?php esc_html_e('Next post','eltdf-core') ?></p>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>