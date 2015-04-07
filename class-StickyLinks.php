<?php
if (!class_exists('StickyLinks')) {
	class StickyLinks {
			
		var $linkImages = array();
		var $linkText = array();
		var $linkAcnhor = array();
	
		function __construct() {
			add_action( 'wp_enqueue_scripts', array($this, 'StickyLinks_scripts') );
			add_action( 'wp_enqueue_scripts', array($this, 'StickyLinks_styles') );
			add_action( 'init', array($this, 'StickyLinks_postType') );
			add_action('wp_footer', array($this, 'StickyLinks_latent'));
			add_action('wp_footer', array($this, 'StickyLinks_action'));
			
			$this->linkImages[] = plugin_dir_url( __FILE__ ) . '/includes/images/icona-demo.png';
			$this->linkImages[] = plugin_dir_url( __FILE__ ) . '/includes/images/icona-chat.png';
			$this->linkImages[] = plugin_dir_url( __FILE__ ) . '/includes/images/icona-FB.png';
			
			$this->linkText[] = 'DEMO';
			$this->linkText[] = 'CHAT';
			$this->linkText[] = 'FB';
			
			$this->linkAnchor[] = '?page_id=191';
			$this->linkAnchor[] = 'http://messenger.providesupport.com/messenger/livetelematic.html';
			$this->linkAnchor[] = '';
			
		}
		
		function StickyLinks_scripts() {
			wp_register_script( 'sticky_links_js', plugin_dir_url( __FILE__ ) . '/includes/js/sticky-links.js', array('jquery'), false, false );
			wp_enqueue_script( 'sticky_links_js' );
		}
		
		function StickyLinks_styles() {
			wp_register_style( 'sticky_links_css',  plugin_dir_url( __FILE__ ) . '/includes/css/sticky-links.css' );
			wp_enqueue_style( 'sticky_links_css' );
		}
		
		function StickyLinks_action() {
			$content = $this->getStickyContainer();
			echo $content;
		}
		
		function StickyLinks_latent() {
			
		}
		
		function StickyLinks_postType() {
			register_post_type( 'sticky_links',
			    array(
			      'labels' => array(
			        'name' => __( 'Sticky Links' ),
			        'singular_name' => __( 'Link' )
			      ),
			      'public' => false,
			      'show_ui' => true,
			      'has_archive' => false,
			      'supports' =>array(
			      	'title',
			      	'thumbnail'
				  )
			    )
			  );
		}
		
		/*Internal functions*/
		private function getStickyContainer() {
			ob_start();
			?>
			<div class="sticky-container">
			<?php
			for ($i = 0; $i < 3; $i++) {
				?>
					<div class="sticky-link">
						<a href="">
							<?php
								if (!empty($this->linkImages[$i])) {
							?>
									<img class="sticky-img" src="<?php echo $this->linkImages[$i] ?>">
							<?php
								}
							?>
							<?php echo $this->linkText[$i]; ?>
						</a>
					</div>
				<?php
			}
			?>
			</div>
			<?php
			$result=ob_get_clean();
			return $result;
		}
	}
}