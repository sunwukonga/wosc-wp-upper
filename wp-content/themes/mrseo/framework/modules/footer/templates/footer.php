<?php mrseo_elated_get_content_bottom_area(); ?>
</div> <!-- close div.content_inner -->
	</div>  <!-- close div.content -->
		<?php if($display_footer) { ?>
			<footer class="eltdf-page-footer">
				<?php
					if($display_footer_top) {
						mrseo_elated_get_footer_top();
					}
					if($display_footer_bottom) {
						mrseo_elated_get_footer_bottom();
					}
				?>
			</footer>
		<?php }  ?>
	</div> <!-- close div.eltdf-wrapper-inner  -->
</div> <!-- close div.eltdf-wrapper -->
<?php wp_footer(); ?>
</body>
</html>