<?php
if (!class_exists('StickyLinks')) {
	class StickyLinks {
			
		var $linkImage = array();
		var $linkText = array();
		var $linkAnchor = array();
	
		function __construct() {
			add_action( 'wp_enqueue_scripts', array($this, 'StickyLinks_scripts') );
			add_action( 'wp_enqueue_scripts', array($this, 'StickyLinks_styles') );
			add_action( 'init', array($this, 'StickyLinks_postType') );
			add_action('wp_footer', array($this, 'StickyLinks_latent'));
			add_action('wp_footer', array($this, 'StickyLinks_action'));
			
			/*$this->linkImages[] = plugin_dir_url( __FILE__ ) . '/includes/images/icona-demo.png';
			$this->linkImages[] = plugin_dir_url( __FILE__ ) . '/includes/images/icona-chat.png';
			$this->linkImages[] = plugin_dir_url( __FILE__ ) . '/includes/images/icona-FB.png';
			
			$this->linkText[] = '';
			$this->linkText[] = '';
			$this->linkText[] = '';
			
			$this->linkAnchor[] = '?page_id=191';
			$this->linkAnchor[] = 'http://messenger.providesupport.com/messenger/livetelematic.html';
			$this->linkAnchor[] = '';*/
			
			
			
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
			$this->populateLinks();
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
			      	'editor',
			      	'thumbnail'
				  )
			    )
			);
            if (!current_theme_supports('post-thumbnails')) {
                add_theme_support( 'post-thumbnails', array( 'sticky_links' ) );  
            }
			
		}
		
		private function populateLinks() {
			$args = array(
				'post_type' => 'sticky_links'
			);
			$loop = new WP_Query($args);
			if ($loop->have_posts()) {
				while ($loop->have_posts()) {
					$loop->the_post();
					$this->linkText[] = get_the_title();
					$this->linkAnchor[] = get_the_content();
					$this->linkImage[] = get_the_post_thumbnail( get_the_ID(), array(39,39));
				}
				wp_reset_postdata();
			}
			
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
						<a href="<?php echo $this->linkAnchor[$i] ?>" target="_blank">
							<?php
								if (!empty($this->linkImage[$i])) {
							?>
									<?php echo $this->linkImage[$i] ?>
							<?php
								}
							?>
							<?php echo " ".$this->linkText[$i]; ?>
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