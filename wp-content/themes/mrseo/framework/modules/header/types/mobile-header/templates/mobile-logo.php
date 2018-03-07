<?php
	$attachment_meta = mrseo_elated_get_attachment_meta_from_url($logo_image);
	$hwstring = !empty($attachment_meta) ? image_hwstring( $attachment_meta['width'], $attachment_meta['height'] ) : '';
?>

<?php do_action('mrseo_elated_before_mobile_logo'); ?>

<div class="eltdf-mobile-logo-wrapper">
    <a itemprop="url" href="<?php echo esc_url(home_url('/')); ?>" <?php mrseo_elated_inline_style($logo_styles); ?>>
        <img itemprop="image" src="<?php echo esc_url($logo_image); ?>" <?php print $hwstring; ?> alt="<?php esc_html_e('Mobile Logo','mrseo'); ?>"/>
    </a>
</div>

<?php do_action('mrseo_elated_after_mobile_logo'); ?>