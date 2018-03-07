<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <?php

        //Get blog single type and load proper helper
        $eltdf_blog_single_type = mrseo_elated_get_blog_single_layout();
        mrseo_elated_include_blog_helper_functions('singles', $eltdf_blog_single_type);

        //Action added for applying module specific filters that couldn't be applied on init
        do_action('mrseo_elated_blog_single_loaded');

        //Get classes for holder and holder inner
        $eltdf_holder_params = mrseo_elated_get_holder_params_blog();

        ?>

        <?php mrseo_elated_get_title(); ?>
        <?php get_template_part('slider'); ?>
        <div class="<?php echo esc_attr($eltdf_holder_params['holder']); ?>">
            <?php do_action('mrseo_elated_after_container_open'); ?>
            <div class="<?php echo esc_attr($eltdf_holder_params['inner']); ?>">
                <?php mrseo_elated_get_blog_single($eltdf_blog_single_type); ?>
            </div>
            <?php do_action('mrseo_elated_before_container_close'); ?>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>