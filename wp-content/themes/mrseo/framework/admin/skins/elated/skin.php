<?php

//if accessed directly exit
if(!defined('ABSPATH')) exit;

class ElatedSkin extends MrSeoElatedSkinAbstract {
    /**
     * Skin constructor. Hooks to mrseo_elated_admin_scripts_init and mrseo_elated_enqueue_admin_styles
     */
    public function __construct() {
        $this->skinName = 'elated';

        //hook to
        add_action('mrseo_elated_admin_scripts_init', array($this, 'registerStyles'));
        add_action('mrseo_elated_admin_scripts_init', array($this, 'registerScripts'));

        add_action('mrseo_elated_enqueue_admin_styles', array($this, 'enqueueStyles'));
        add_action('mrseo_elated_enqueue_admin_scripts', array($this, 'enqueueScripts'));

        add_action('mrseo_elated_enqueue_meta_box_styles', array($this, 'enqueueStyles'));
        add_action('mrseo_elated_enqueue_meta_box_scripts', array($this, 'enqueueScripts'));

		add_action('before_wp_tiny_mce', array($this, 'setShortcodeJSParams'));

		$this->setIcons();
		$this->setMenuItemPosition();
    }

    /**
     * Method that registers skin scripts
     */
    public function registerScripts() {
        $this->scripts['bootstrap.min'] = 'assets/js/bootstrap.min.js';
        $this->scripts['jquery.nouislider.min'] = 'assets/js/eltdf-ui/jquery.nouislider.min.js';
        $this->scripts['eltdf-ui-admin'] = 'assets/js/eltdf-ui/eltdf-ui.js';
        $this->scripts['eltdf-bootstrap-select'] = 'assets/js/eltdf-ui/eltdf-bootstrap-select.min.js';
        $this->scripts['select2'] = 'assets/js/eltdf-ui/select2.min.js';

        foreach ($this->scripts as $scriptHandle => $scriptPath) {
	        mrseo_elated_register_skin_script($scriptHandle, $scriptPath);
        }
    }

    /**
     * Method that registers skin styles
     */
    public function registerStyles() {
        $this->styles['eltdf-bootstrap'] = 'assets/css/eltdf-bootstrap.css';
        $this->styles['eltdf-page-admin'] = 'assets/css/eltdf-page.css';
        $this->styles['eltdf-options-admin'] = 'assets/css/eltdf-options.css';
        $this->styles['eltdf-meta-boxes-admin'] = 'assets/css/eltdf-meta-boxes.css';
        $this->styles['eltdf-ui-admin'] = 'assets/css/eltdf-ui/eltdf-ui.css';
        $this->styles['eltdf-forms-admin'] = 'assets/css/eltdf-forms.css';
        $this->styles['eltdf-import'] = 'assets/css/eltdf-import.css';
        $this->styles['font-awesome-admin'] = 'assets/css/font-awesome/css/font-awesome.min.css';
        $this->styles['select2'] = 'assets/css/select2.min.css';

        foreach ($this->styles as $styleHandle => $stylePath) {
	        mrseo_elated_register_skin_style($styleHandle, $stylePath);
        }

    }

	/**
	 * Method that set menu icons
	 */
	public function setIcons() {
		$this->icons = array(
            'portfolio' => 'dashicons-screenoptions',
            'testimonial' => 'dashicons-format-quote',
            'masonry-gallery' => 'dashicons-schedule',
            'proofing-gallery' => 'dashicons-admin-post',
            'team' => 'dashicons-admin-users',
            'course' => 'dashicons-book',
            'lesson' => 'dashicons-welcome-write-blog',
            'quiz' => 'dashicons-layout',
            'question' => 'dashicons-lightbulb',
			'options' => $this->getSkinURI().'/assets/img/admin-logo-icon.png'
		);
	}

	/**
	 * Method that set menu item position
	 */

	public function setMenuItemPosition() {
		$this->itemPosition = array(
            'portfolio' => 5,
            'masonry-gallery' => 16,
            'proofing-gallery' => 17,
            'testimonial' => 18,
            'team' => 19,
            'course' => 20,
            'lesson' => 21,
            'question' => 22,
            'quiz' => 23,
			'options' => 25
		);
	}

    /**
     * Method that renders options page
     *
     * @see ElatedSkin::getHeader()
     * @see ElatedSkin::getPageNav()
     * @see ElatedSkin::getPageContent()
     */
    public function renderOptions() {
        global $mrseo_elated_Framework;
        $tab    = mrseo_elated_get_admin_tab();
        $active_page = $mrseo_elated_Framework->eltdfOptions->getAdminPageFromSlug($tab);
        if ($active_page == null) return;
        ?>
        <div class="eltdf-options-page eltdf-page">
            <?php $this->getHeader($active_page); ?>
            <div class="eltdf-page-content-wrapper">
                <div class="eltdf-page-content">
                    <div class="eltdf-page-navigation eltdf-tabs-wrapper vertical left clearfix">
                        <?php $this->getPageNav($tab); ?>
                        <?php $this->getPageContent($active_page); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }

    /**
     * Method that renders header of options page.
     * @param bool $show_save_btn whether to show save button. Should be hidden on import page
     *
     * @see ElatedSkinAbstract::loadTemplatePart()
     */
    public function getHeader($activePage = '', $show_save_btn = true) {
        $this->loadTemplatePart('header', array('active_page' => $activePage, 'show_save_btn' => $show_save_btn));
    }

    /**
     * Method that loads page navigation
     * @param string $tab current tab
     * @param bool $is_import_page if is import page highlighted that tab
     *
     * @see ElatedSkinAbstract::loadTemplatePart()
     */
    public function getPageNav($tab, $is_import_page = false, $is_backup_options_page = false) {
        $this->loadTemplatePart('navigation', array(
            'tab' => $tab,
            'is_import_page' => $is_import_page,
			'is_backup_options_page' => $is_backup_options_page
        ));
    }
	
	/**
	 * Method that loads current page content
	 *
	 * @param MrSeoElatedAdminPage $page current page to load
	 * @see ElatedSkinAbstract::loadTemplatePart()
	 */
    public function getPageContent($page) {
        $this->loadTemplatePart('content', array('page' => $page));
    }

    /**
     * Method that loads content for import page
     */
    public function getImportContent() {
        $this->loadTemplatePart('content-import');
    }
	
	/**
	 * Method that loads content for backup page
	 */
	public function getBackupOptionsContent() {
		$this->loadTemplatePart('backup-options');
	}

    /**
     * Method that loads anchors and save button template part
     *
     * @param MrSeoElatedAdminPage $page current page to load
     * @see ElatedSkinAbstract::loadTemplatePart()
     */
    public function getAnchors($page) {
        $this->loadTemplatePart('anchors', array('page' => $page));
    }

    /**
     * Method that renders import page
     *
     *  @see ElatedSkin::getHeader()
     *  @see ElatedSkin::getPageNav()
     *  @see ElatedSkin::getImportContent()
     */
    public function renderImport() { ?>
        <div class="eltdf-options-page eltdf-page">
            <?php $this->getHeader('', false); ?>
            <div class="eltdf-page-content-wrapper">
                <div class="eltdf-page-content">
                    <div class="eltdf-page-navigation eltdf-tabs-wrapper vertical left clearfix">
                        <?php $this->getPageNav('tabimport', true); ?>
                        <?php $this->getImportContent(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }

	/**
	 * Method that renders backup options page
	 *
	 * @see SelectSkin::getHeader()
	 * * @see SelectSkin::getPageNav()
	 * * @see SelectSkin::getImportContent()
	 */
	public function renderBackupOptions() { ?>
		<div class="eltdf-options-page eltdf-page">
			<?php $this->getHeader('',false); ?>
			<div class="eltdf-page-content-wrapper">
				<div class="eltdf-page-content">
					<div class="eltdf-page-navigation eltdf-tabs-wrapper vertical left clearfix">
						<?php $this->getPageNav('backup_options', false, true); ?>
						<?php $this->getBackupOptionsContent(); ?>
					</div>
				</div>
			</div>
		</div>
	<?php }
}
?>