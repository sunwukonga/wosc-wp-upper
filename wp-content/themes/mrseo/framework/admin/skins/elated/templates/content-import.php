<div class="eltdf-tabs-content">
	<div class="tab-content">
		<div class="tab-pane fade in active" id="import">
			<div class="eltdf-tab-content">
				<h2 class="eltdf-page-title"><?php esc_html_e('Import', 'mrseo'); ?></h2>
				<form method="post" class="eltdf_ajax_form eltdf-import-page-holder" data-confirm-message="<?php esc_html_e('Are you sure, you want to import Demo Data now?', 'mrseo'); ?>">
					<div class="eltdf-page-form">
						<div class="eltdf-page-form-section-holder">
							<h3 class="eltdf-page-section-title"><?php esc_html_e('Import Demo Content', 'mrseo'); ?></h3>
							<div class="eltdf-page-form-section">
								<div class="eltdf-field-desc">
									<h4><?php esc_html_e('Import', 'mrseo'); ?></h4>
									<p><?php esc_html_e('Choose demo content you want to import', 'mrseo'); ?></p>
								</div>
								<div class="eltdf-section-content">
									<div class="container-fluid">
										<div class="row">
											<div class="col-lg-3">
												<select name="import_example" id="import_example" class="form-control eltdf-form-element dependence">
													<option value="mrseo"><?php esc_html_e('Mr. SEO', 'mrseo'); ?></option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="eltdf-page-form-section">
								<div class="eltdf-field-desc">
									<h4><?php esc_html_e('Import Type', 'mrseo'); ?></h4>
									<p><?php esc_html_e('Import Type', 'mrseo'); ?></p>
								</div>
								<div class="eltdf-section-content">
									<div class="container-fluid">
										<div class="row">
											<div class="col-lg-3">
												<select name="import_option" id="import_option" class="form-control eltdf-form-element">
													<option value=""><?php esc_html_e('Please Select', 'mrseo'); ?></option>
													<option value="complete_content"><?php esc_html_e('All', 'mrseo'); ?></option>
													<option value="content"><?php esc_html_e('Content', 'mrseo'); ?></option>
													<option value="widgets"><?php esc_html_e('Widgets', 'mrseo'); ?></option>
													<option value="options"><?php esc_html_e('Options', 'mrseo'); ?></option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="eltdf-page-form-section">
								<div class="eltdf-field-desc">
									<h4><?php esc_html_e('Import attachments', 'mrseo'); ?></h4>
									<p><?php esc_html_e('Do you want to import media files?', 'mrseo'); ?></p>
								</div>
								<div class="eltdf-section-content">
									<div class="container-fluid">
										<div class="row">
											<div class="col-lg-12">
												<p class="field switch">
													<label class="cb-enable dependence"><span><?php esc_html_e('Yes', 'mrseo'); ?></span></label>
													<label class="cb-disable selected dependence"><span><?php esc_html_e('No', 'mrseo'); ?></span></label>
													<input type="checkbox" id="import_attachments" class="checkbox" name="import_attachments" value="1">
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="eltdf-page-form-section">
								<div class="eltdf-field-desc">
									<input type="submit" class="btn btn-primary btn-sm " value="<?php esc_html_e('Import', 'mrseo'); ?>" name="import" id="eltdf-import-demo-data" data-importing-value="<?php esc_html_e('Importing...', 'mrseo'); ?>"/>
								</div>
								<div class="eltdf-section-content">
									<div class="container-fluid">
										<div class="row">
											<div class="col-lg-12">
												<div class="eltdf-import-load"><span><?php esc_html_e('The import process may take some time. Please be patient.', 'mrseo') ?> </span><br />
													<div class="eltdf-progress-bar-wrapper html5-progress-bar">
														<div class="progress-bar-wrapper">
															<progress id="progressbar" value="0" max="100"></progress>
														</div>
														<div class="progress-value">0%</div>
														<div class="progress-bar-message">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="eltdf-page-form-section eltdf-import-button-wrapper">
								<div class="alert alert-warning">
									<strong><?php esc_html_e('Important notes:', 'mrseo') ?></strong>
									<ul>
										<li><?php esc_html_e('Please note that import process will take time needed to download all attachments from demo web site.', 'mrseo'); ?></li>
										<li> <?php esc_html_e('If you plan to use shop, please install WooCommerce before you run import.', 'mrseo')?></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>