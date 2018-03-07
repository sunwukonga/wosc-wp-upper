<?php if(has_post_thumbnail()) { ?>
    <img src="<?php echo esc_url($split_image) ?>" alt="<?php echo esc_html__( 'Testimonial Featured Image', 'eltdf-core' ); ?>">
<?php } ?>