<form role="search" method="get" class="searchform" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
    <label class="screen-reader-text"><?php esc_html_e('Search for:', 'mrseo'); ?></label>
    <div class="input-holder clearfix">
        <input type="search" class="search-field" placeholder="<?php esc_html_e('Search...', 'mrseo'); ?>" value="" name="s" title="<?php esc_html_e('Search for:', 'mrseo'); ?>"/>
        <button type="submit" id="searchsubmit"><span class="icon_search"></span></button>
    </div>
</form>