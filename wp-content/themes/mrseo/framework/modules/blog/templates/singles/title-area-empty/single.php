<?php

mrseo_elated_get_single_post_format_html($blog_single_type);

mrseo_elated_get_module_template_part('templates/parts/single/single-navigation', 'blog');

mrseo_elated_get_module_template_part('templates/parts/single/author-info', 'blog');

mrseo_elated_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

mrseo_elated_get_module_template_part('templates/parts/single/comments', 'blog');