<?php
namespace BZ_RBA;

define('BZRBA_BASE_DIR', 	dirname(__FILE__) . '/');
define('BZRBA_PRODUCT_ID',   'RBAI');
define('BZRBA_VERSION',   	'1.0');
define('BZRBA_DIR_PATH', plugin_dir_path( __DIR__ ));
define('BZ_RBA_NS','BZ_RBA');
define('BZRBA_PLUGIN_FILE', 'rebrand-bertha-lite/rebrand-bertha-lite.php');   //Main base file

class BZRebrandBerthaAISettings  {
	
		public $pageslug 	   = 'wpbertha-rebrand';
	
		static public $rebranding = array();
		static public $redefaultData = array();
	
		public function init() { 
		
			$blog_id = get_current_blog_id();
			
			self::$redefaultData = array(
				'plugin_name'       	=> '',
				'plugin_desc'       	=> '',
				'plugin_author'     	=> '',
				'plugin_uri'        	=> '', 
			);
        
	 if ( is_plugin_active( 'rebrand-bertha-pro/rebrand-bertha-pro.php' ) ) {
			
			deactivate_plugins( plugin_basename(__FILE__) );
			$error_message = '<p style="font-family:-apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,Oxygen-Sans,Ubuntu,Cantarell,\'Helvetica Neue\',sans-serif;font-size: 13px;line-height: 1.5;color:#444;">' . esc_html__( 'Plugin could not be activated, either deactivate the Lite version or Pro version', 'simplewlv' ). '</p>';
			die($error_message); 
		 
			return;
		}
			$this->bzrba_activation_hooks();
		}
		
	
		
		/**
		 * Init Hooks
		*/
		public function bzrba_activation_hooks() {
			
			global $blog_id;
			
			$rebranding = $this->bzrba_get_rebranding();
			
			$bzrba_new_text = $translated_text;
			$bzrba_name = isset( $rebranding['plugin_name'] ) && ! empty( $rebranding['plugin_name'] ) ? $rebranding['plugin_name'] : '';
			
			if ( $bzrba_name != '' ) {
				add_filter( 'gettext', 			array($this, 'bzrba_update_label'), 20, 3 );
			}
			
			
			add_filter( 'all_plugins', 		array($this, 'bzrba_plugin_branding'), 10, 1 );

			add_action( 'admin_menu',		array($this, 'bzrba_menu'), 100 );
			add_action( 'admin_enqueue_scripts',				  array($this, 'bzrba_adminloadStyles'));
			add_action( 'admin_init',		array($this, 'bzrba_save_settings'));			
	        add_action( 'admin_head', 		array($this, 'bzrba_branding_styles') );
	        add_action( 'admin_head', 		array($this, 'bzrba_branding_scripts') );
	        add_action( 'elementor/editor/after_enqueue_styles', 		array($this, 'bzrba_branding_styles') );
	        add_action( 'elementor/editor/after_enqueue_styles', 		array($this, 'bzrba_branding_scripts') );
	        add_action( 'elementor/editor/after_enqueue_styles', 			array($this, 'bzrba_branding_front_scripts') );
	        if(is_multisite()){
				if( $blog_id == 1 ) {
					switch_to_blog($blog_id);
						add_filter('screen_settings',			array($this, 'bzrba_hide_rebrand_from_menu'), 20, 2);	
					restore_current_blog();
				}
			} else {
				add_filter('screen_settings',			array($this, 'bzrba_hide_rebrand_from_menu'), 20, 2);
			}
		}
		
	

	

		/**
		 * Add screen option to hide/show rebrand options
		*/
		public function bzrba_hide_rebrand_from_menu($rapcurrent, $screen) {

			$rebranding = $this->bzrba_get_rebranding();

			$rapcurrent .= '<fieldset class="admin_ui_menu"> <legend> Rebrand - '.$rebranding['plugin_name'].' </legend><p><a href="https://rebrandpress.com/pricing" target="_blank">Get Pro</a> to use this feature.</p>';
			
			$amUrl = $_SERVER['REQUEST_URI'];
			

			if($this->bzrba_getOption( 'rebrand_bertha_screen_option','' )){
				
				$bertha_screen_option = $this->bzrba_getOption( 'rebrand_bertha_screen_option',''); 
				
				if($bertha_screen_option=='show'){
					//$current .='It is showing now. ';
					$rapcurrent .= __('Hide the "','bzrba').$rebranding['plugin_name'].__(' - Rebrand" menu item?','bzrba') .$hide;
					$rapcurrent .= '<style>#adminmenu .toplevel_page_bertha-ai-setting a[href="admin.php?page=wpbertha-rebrand"]{display:block;}</style>';
				} else {
					//$current .='It is disabling now. ';
					$rapcurrent .= __('Show the "','bzrba').$rebranding['plugin_name'].__(' - Rebrand" menu item?','bzrba') .$show;
					$rapcurrent .= '<style>#adminmenu .toplevel_page_bertha-ai-setting a[href="admin.php?page=wpbertha-rebrand"]{display:none;}</style>';
				}		
				
			} else {
					//$current .='It is showing now. ';
					$rapcurrent .= __('Hide the "','bzrba').$rebranding['plugin_name'].__(' - Rebrand" menu item?','bzrba') .$hide;
					$rapcurrent .= '<style>#adminmenu .toplevel_page_bertha-ai-setting a[href="admin.php?page=wpbertha-rebrand"]{display:block;}</style>';
			}	

			$rapcurrent .=' <br/><br/> </fieldset>' ;
			
			return $rapcurrent;
		}
		
		  
		
			
		/**
		* Loads admin styles & scripts
		*/
		public function bzrba_adminloadStyles(){
			
			if(isset($_REQUEST['page'])){
				
				if($_REQUEST['page'] == $this->pageslug){
					
					wp_enqueue_media();
					
					wp_register_style( 'bzrba_css', plugins_url('assets/css/bzrba-main.css', __FILE__) );
					wp_enqueue_style( 'bzrba_css' );
					
					wp_register_script( 'bzrba_js', plugins_url('assets/js/bzrba-main-settings.js', __FILE__ ), '', '', true );
					wp_enqueue_script( 'bzrba_js' );
					
				}
			}
		}	
		
		
		
		
	   public function bzrba_get_rebranding() {
			
			if ( ! is_array( self::$rebranding ) || empty( self::$rebranding ) ) {
				if(is_multisite()){
					switch_to_blog(1);
						self::$rebranding = get_option( 'bertha_rebrand');
					restore_current_blog();
				} else {
					self::$rebranding = get_option( 'bertha_rebrand');	
				}
			}

			return self::$rebranding;
		}
		
		
		
	    /**
		 * Render branding fields.
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function bzrba_render_fields() {
		
			if(is_multisite()){
				switch_to_blog(1);
					$branding = get_option( 'bertha_rebrand');
				restore_current_blog();
			} else {
				$branding = get_option( 'bertha_rebrand');	
			}	
			include BZRBA_BASE_DIR . 'admin/bzrba-settings-rebranding.php';
		}
		
		
		
	
		/**
		 * Admin Menu
		*/   
		public function bzrba_menu() {
			
			global $menu, $blog_id;
			global $submenu;	
			
		    $admin_label = __('Rebrand', 'bzrba');
			$rebranding = $this->bzrba_get_rebranding();
			
			if ( current_user_can( 'manage_options' ) ) {    

				$parent_slug = 'bertha-ai-setting';
				$page_title  = __( 'Rebrand', 'bzrba' );
				$menu_title  = __( 'Rebrand', 'bzrba' );
				$capability  = 'manage_options';
				$menu_slug   = $this->pageslug;
				$callback    = array($this, 'bzrba_render');

				if( is_multisite() ) {
					if( $blog_id == 1 ) { 
						$hook = add_submenu_page(
							$parent_slug,
							$page_title,
							$menu_title,
							$capability,
							$menu_slug,
							$callback
						);
					}
				} else {
						$hook = add_submenu_page(
							$parent_slug,
							$page_title,
							$menu_title,
							$capability,
							$menu_slug,
							$callback
						);					
				}
			}	
			//~ echo '<pre/>';
			//~ print_r($menu);
			
			foreach($menu as $custommenusK => $custommenusv ) {
				if( $custommenusK == '59.2202' ) {
					$menu[$custommenusK][0] = $rebranding['plugin_name']; //change menu Label
							
				}
			}
			
			return $menu;
		}
		
		
		
		
		public function bzrba_render() {
			
			$this->bzrba_render_fields();
		}
		
	
	
	
	
		public function bzrba_save_settings() {
			
			if ( ! isset( $_POST['bai_wl_nonce'] ) || ! wp_verify_nonce( $_POST['bai_wl_nonce'], 'bai_wl_nonce' ) ) {
				return;
			}

			if ( ! isset( $_POST['submit'] ) ) {
				return;
			}

			$this->bzrba_update_branding();
		}
		
		
	
		public function bzrba_branding_styles() {
			
			global $wpdb;
			
			if ( ! is_user_logged_in() ) {
				return;
			}
			$rebranding = $this->bzrba_get_rebranding();
			echo '<style id="bai-wl-admin-style">';
			include BZRBA_BASE_DIR . 'admin/bzrba-style.css.php';
			echo '</style>';
		}	
	
	
			
		public function bzrba_branding_scripts() {
			
			if ( ! is_user_logged_in() ) {
				return;
			}
			$rebranding = $this->bzrba_get_rebranding();
			
			//~ echo '<pre/>';
			//~ print_r($rebranding);
			
			echo '<script id="bai-wl-admin-script">';
			include BZRBA_BASE_DIR . 'admin/bzrba-script.js.php';
			echo '</script>';
		}	
		
	
	
			
		public function bzrba_branding_front_scripts() {
			
			echo '<style type="text/css">
					#elementor-panel-category-bertha-elementor .elementor-panel-category-items .elementor-element-wrapper .icon i.bertha-logo:before, #elementor-panel-elements-wrapper #elementor-panel-elements .elementor-element-wrapper .elementor-element .icon i.bertha-logo:before, #elementor-panel-page-editor .elementor-control .elementor-control-content .bertha-elementor-content:before {
						background-image: none;
						content: "\f145";
						background-repeat: no-repeat;
						background-size: unset;
						font-style: normal;
						background-position: unset;
					}
					#elementor-panel-category-bertha-elementor .elementor-panel-category-items .elementor-element-wrapper .icon i.bertha-logo, #elementor-panel-elements-wrapper #elementor-panel-elements .elementor-element-wrapper .elementor-element .icon i.bertha-logo, #elementor-panel-page-editor .elementor-control .elementor-control-content .bertha-elementor-content {
						background: none;
						font-family: dashicons;
					}
			';
		    echo '</style>';
		}
		


	    public function bzrba_update_branding() {
			
			if ( ! isset($_POST['bai_wl_nonce']) ) {
				return;
			}

			$data = array(
					'plugin_name'       => isset( $_POST['bai_wl_plugin_name'] ) ? sanitize_text_field( $_POST['bai_wl_plugin_name'] ) : '',
				
				'plugin_desc'       => isset( $_POST['bai_wl_plugin_desc'] ) ? sanitize_text_field( $_POST['bai_wl_plugin_desc'] ) : '',
				
				'plugin_author'     => isset( $_POST['bai_wl_plugin_author'] ) ? sanitize_text_field( $_POST['bai_wl_plugin_author'] ) : '',
				
				'plugin_uri'        => isset( $_POST['bai_wl_plugin_uri'] ) ? sanitize_text_field( $_POST['bai_wl_plugin_uri'] ) : '',
			);

			update_option( 'bertha_rebrand', $data );
			
		}
    
    
     
    
        public function bzrba_plugin_branding( $all_plugins ) {
			
			
			if (  ! isset( $all_plugins['bertha-ai-free/bertha-ai.php'] ) ) {
				return $all_plugins;
			}

			$rebranding = $this->bzrba_get_rebranding();
			
			$all_plugins['bertha-ai-free/bertha-ai.php']['Name']           = ! empty( $rebranding['plugin_name'] )     ? $rebranding['plugin_name']      : $all_plugins['bertha-ai-free/bertha-ai.php']['Name'];
			
			$all_plugins['bertha-ai-free/bertha-ai.php']['PluginURI']      = ! empty( $rebranding['plugin_uri'] )      ? $rebranding['plugin_uri']       : $all_plugins['bertha-ai-free/bertha-ai.php']['PluginURI'];
			
			$all_plugins['bertha-ai-free/bertha-ai.php']['Description']    = ! empty( $rebranding['plugin_desc'] )     ? $rebranding['plugin_desc']      : $all_plugins['bertha-ai-free/bertha-ai.php']['Description'];
			
			$all_plugins['bertha-ai-free/bertha-ai.php']['Author']         = ! empty( $rebranding['plugin_author'] )   ? $rebranding['plugin_author']    : $all_plugins['bertha-ai-free/bertha-ai.php']['Author'];
			
			$all_plugins['bertha-ai-free/bertha-ai.php']['AuthorURI']      = ! empty( $rebranding['plugin_uri'] )      ? $rebranding['plugin_uri']       : $all_plugins['bertha-ai-free/bertha-ai.php']['AuthorURI'];
			
			$all_plugins['bertha-ai-free/bertha-ai.php']['Title']          = ! empty( $rebranding['plugin_name'] )     ? $rebranding['plugin_name']      : $all_plugins['bertha-ai-free/bertha-ai.php']['Title'];
			
			$all_plugins['bertha-ai-free/bertha-ai.php']['AuthorName']     = ! empty( $rebranding['plugin_author'] )   ? $rebranding['plugin_author']    : $all_plugins['bertha-ai-free/bertha-ai.php']['AuthorName'];
			
			
			
			return $all_plugins;
			
		}
	
    	
	
		public function bzrba_update_label( $translated_text, $untranslated_text, $domain ) {
			
			$rebranding = $this->bzrba_get_rebranding();
			
			$bzrba_new_text = $translated_text;
			$bzrba_name = isset( $rebranding['plugin_name'] ) && ! empty( $rebranding['plugin_name'] ) ? $rebranding['plugin_name'] : '';
			
			
			if ( $bzrba_name != '' ) {
				$bzrba_new_text = str_replace( 'BerthaAI', $bzrba_name, $bzrba_new_text );
			}
			
			return $bzrba_new_text;
		}
	
	
		
		
		   
		/**
		 * update options
		*/
		public function bzrba_updateOption($key,$value) {
			if(is_multisite()){
				return  update_site_option($key,$value);
			}else{
				return update_option($key,$value);
			}
		}
		
		

		   
		/**
		 * get options
		*/	
		public function bzrba_getOption($key,$default=False) {
			if(is_multisite()){
				switch_to_blog(1);
				$value = get_site_option($key,$default);
				restore_current_blog();
			}else{
				$value = get_option($key,$default);
			}
			return $value;
		}
		
		
		public function get_icon() {
			return 'eicon-favorite';
		}

	


		
	
} //end Class
