<?php
    /*
        Template Name: Blog: Centered
    */
?>
<?php
$eltdf_blog_type = 'centered';
mrseo_elated_include_blog_helper_functions('lists', $eltdf_blog_type);
$eltdf_holder_params = mrseo_elated_get_holder_params_blog();
?>
<?php get_header(); ?>
<?php mrseo_elated_get_title(); ?>
<?php get_template_part('slider'); ?>
    <div class="<?php echo esc_attr($eltdf_holder_params['holder']); ?>">
        <?php do_action('mrseo_elated_after_container_open'); ?>
        <div class="<?php echo esc_attr($eltdf_holder_params['inner']); ?>">
            <?php mrseo_elated_get_blog($eltdf_blog_type); ?>
        </div>
        <?php do_action('mrseo_elated_before_container_close'); ?>
    </div>
<?php do_action('mrseo_elated_blog_list_additional_tags'); ?>
<?php get_footer(); ?>