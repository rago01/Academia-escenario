<?php
/**
 * Plugin Name: Aitasi Coming Soon
 * Plugin URI: http://shapedplugin.com/plugin/aitasi-coming-soon-pro
 * Description: Aitasi Coming Soon is a modern, beautiful, Responsive and Full width professional landing page that’ll help you create a stunning coming soon page or Maintenance Mode pages instantly without any coding or design skills. You can work on your site while visitors see a “Coming Soon” or “Maintenance Mode” page. It is very easy & quick to install in your WordPress installed website.
 * Author: ShapedPlugin
 * Author URI: http://shapedplugin.com
 * Version: 2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}  // if direct access

$aitasi_version = '2.0';

define( 'AITASI_PATH', plugin_dir_path( __FILE__ ) );
define( 'AITASI_URL', plugin_dir_url( __FILE__ ) );


add_action( 'plugins_loaded', 'aitasi_load_textdomain' );

/*--------------------------------------------------------------
##  Load Text Domain
--------------------------------------------------------------*/
function aitasi_load_textdomain() {
	load_plugin_textdomain( 'aitasi', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}


/*--------------------------------------------------------------
##  CodeStart Framework Inclusion
--------------------------------------------------------------*/

if ( file_exists( AITASI_PATH . 'admin/codestar-framework/cs-framework.php' ) ) {

	require_once( AITASI_PATH . 'admin/codestar-framework/cs-framework.php' );
}


if ( file_exists( AITASI_PATH . 'admin/inc/configstar.php' ) ) {
	require_once( AITASI_PATH . 'admin/inc/configstar.php' );
}

// active modules
defined( 'CS_ACTIVE_FRAMEWORK' )  or  define( 'CS_ACTIVE_FRAMEWORK',  true );
defined( 'CS_ACTIVE_METABOX'   )  or  define( 'CS_ACTIVE_METABOX',    false );
defined( 'CS_ACTIVE_SHORTCODE' )  or  define( 'CS_ACTIVE_SHORTCODE',  false );
defined( 'CS_ACTIVE_CUSTOMIZE' )  or  define( 'CS_ACTIVE_CUSTOMIZE',  false );


add_action( 'admin_enqueue_scripts', 'aitasi_script_load' );
if ( ! function_exists( 'aitasi_script_load' ) ) {
	function aitasi_script_load() {
		wp_enqueue_script( 'jquery-ui-datepicker', array( 'jquery' ) );
		wp_enqueue_script( 'admin-scripts', AITASI_URL . '/admin/inc/admin-scripts.js', array( 'jquery' ), null,
				true);

		wp_enqueue_style('jquery-style', AITASI_URL . '/admin/inc/jquery-ui.css');

	}
}

/**
 * Config
 */
if ( cs_get_option( 'aitasi_main_setting' ) == 'enabled' ) {
	if ( ! class_exists( 'AITASI_COMING_SOON' ) ) {
		class AITASI_COMING_SOON {
			function __construct() {
				$this->plugin_includes();
			}

			function plugin_includes() {
				add_action( 'template_redirect', array( &$this, 'aitasi_redirect_mm' ) );
			}

			function is_valid_page() {
				return in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) );
			}

			function aitasi_redirect_mm() {
				if ( is_user_logged_in() ) {
					//do not display maintenance page
				} else {
					if ( ! is_admin() && ! $this->is_valid_page() ) {  //show maintenance page
						$this->load_sm_page();
					}
				}
			}

			function load_sm_page() {
				header( 'HTTP/1.0 503 Service Unavailable' );
				include_once( "template/comingsoon.php" );
				exit();
			}


		}

		if ( isset( $_POST['aitasi_subscriber_list'] ) ) {
			update_option( 'aitasi_subscriber_list', $_POST['aitasi_subscriber_list'] );
			header( 'Location: ' . $_SERVER['REQUEST_URI'] );
		}

		$GLOBALS['aitasi_coming_soon'] = new AITASI_COMING_SOON();
	}

}




// Redirect after active
function shaped_plugin_aitasi_active_redirect( $plugin ) {
	if ( $plugin == plugin_basename( __FILE__ ) ) {
		exit( wp_redirect( admin_url( 'options-general.php' ) ) );
	}
}

add_action( 'activated_plugin', 'shaped_plugin_aitasi_active_redirect' );


// admin menu
function add_shaped_plugin_aitasi_options_framwrork() {
	add_options_page( 'Aitasi Coming Soon Help', '', 'manage_options', 'aitasi-settings', 'aitasi_options_framwrork' );
}

add_action( 'admin_menu', 'add_shaped_plugin_aitasi_options_framwrork' );


if ( is_admin() ) : // Load only if we are viewing an admin page

	function shaped_plugin_aitasi_register_settings() {
		// Register settings and call sanitation functions
		register_setting( 'aitasi_p_options', 'aitasi_options', 'aitasi_validate_options' );
	}

	add_action( 'admin_init', 'shaped_plugin_aitasi_register_settings' );


// Function to generate options page
	function aitasi_options_framwrork() {

		if ( ! isset( $_REQUEST['updated'] ) ) {
			$_REQUEST['updated'] = false;
		} // This checks whether the form has just been submitted. ?>


		<div class="wrap about-wrap">
			<style scoped type="text/css">
				.aitasi-badge {
					position: absolute;
					top: 0;
					right: 0;
					background: url(<?php echo AITASI_URL ?>template/images/icon.png) no-repeat #3b3b3b;
					-webkit-background-size: 120px 120px;
					background-size: 120px 120px;
					color: #fff;
					font-size: 14px;
					text-indent: -99999px;
					text-align: center;
					font-weight: 600;
					padding-top: 120px;
					height: 0;
					display: inline-block;
					width: 120px;
					text-rendering: optimizeLegibility;
					-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, .2);
					box-shadow: 0 1px 3px rgba(0, 0, 0, .2);
				}
			</style>
			<h1>Welcome to Aitasi Coming Soon 2.0</h1>

			<div class="about-text">Thank you for using our Aitasi Coming Soon free plugin.</div>
			<div class="aitasi-badge">Version 2.0</div>

			<hr>

			<h3>Want some cool features of this plugin?</h3>

			<p>We've added many extra features in our <a href="http://shapedplugin.com/plugin/aitasi-coming-soon-pro">premium version</a> of this
				plugin. Let see some amazing features. <a href="http://shapedplugin.com/plugin/aitasi-coming-soon-pro">Buy Premium Version Now.</a></p>

			<div class="feature-section two-col">
				<div class="col">
					<img src="<?php echo AITASI_URL ?>template/images/01.png" alt="">

					<h3>Section Sorter and Deactivation Option</h3>

					<p>With the section sorter you can move all the sections up and down by dragging or you can
						deactivate any section by dragging it to inactive area.</p>
				</div>
				<div class="col">
					<img src="<?php echo AITASI_URL ?>template/images/02.png" alt="">

					<h3>Multiple background option and Google font integrated</h3>

					<p>With Background option you can set image, slider, youtube, vimeo or self hosted video as a
						background of the coming soon landing page home section. Google font is integrated, you can
						set any font family and font variant of google font.</p>
				</div>
			</div>

			<hr>

			<div class="feature-section two-col">
				<h2>Pro Version Advanced Features & Benefits</h2>
				<div class="col">
					<ul>
						<li><span class="dashicons dashicons-yes"></span> Easy Section Sorting to move up and down</li>
						<li><span class="dashicons dashicons-yes"></span> Google Fonts integrated</li>
						<li><span class="dashicons dashicons-yes"></span> Easy Section Activation-Deactivation option to show and hide</li>
						<li><span class="dashicons dashicons-yes"></span> Subscribe feature / Easily collect visitor emails</li>
						<li><span class="dashicons dashicons-yes"></span> Easy icon changing with FontAwesome</li>
						<li><span class="dashicons dashicons-yes"></span> Color changing option for each section</li>
						<li><span class="dashicons dashicons-yes"></span> Service Section with Service Title and
							Unlimited Service items</li>
						<li><span class="dashicons dashicons-yes"></span> About Us Section with Title and
							Unlimited team members</li>
						<li><span class="dashicons dashicons-yes"></span> Contact Form is available to contact with admin instantly</li>
						<li><span class="dashicons dashicons-yes"></span> Slider Background supported.</li>
						<li><span class="dashicons dashicons-yes"></span> Enable or Disable many elements </li>
					</ul>
				</div>
				<div class="col">
					<ul>
						<li><span class="dashicons dashicons-yes"></span> Add your custom Youtube / Vimeo / Self Hosted Video Background</li>
						<li><span class="dashicons dashicons-yes"></span> Distinct color changing option for each
							section</li>
						<li><span class="dashicons dashicons-yes"></span> MailChimp is integrated for email list Management</li>
						<li><span class="dashicons dashicons-yes"></span> You can customize the text even more</li>
						<li><span class="dashicons dashicons-yes"></span> Custom footer copyright text and branding</li>
						<li><span class="dashicons dashicons-yes"></span> All the text changeable</li>
						<li><span class="dashicons dashicons-yes"></span> Custom CSS option</li>
						<li><span class="dashicons dashicons-yes"></span> Google analytics integration</li>
						<li><span class="dashicons dashicons-yes"></span> Premium Priority support (24/7)</li>
						<li><span class="dashicons dashicons-yes"></span> Extensive Documentation</li>
						<li><span class="dashicons dashicons-yes"></span> Video Documentation</li>
					</ul>
				</div>
			</div>

			<h2><a href="http://shapedplugin.com/plugin/aitasi-coming-soon-pro" class="button button-primary button-hero">Buy Premium Version Now.</a>
			</h2>
			<br>
			<br>
			<br>
			<br>

		</div>

		<?php
	}


endif;  // EndIf is_admin()


register_activation_hook( __FILE__, 'shaped_plugin_aitasi_activate' );
add_action( 'admin_init', 'shaped_plugin_aitasi_redirect' );

function shaped_plugin_aitasi_activate() {
	add_option( 'shaped_plugin_aitasi_activation_redirect', true );
}

function shaped_plugin_aitasi_redirect() {
	if ( get_option( 'shaped_plugin_aitasi_activation_redirect', false ) ) {
		delete_option( 'shaped_plugin_aitasi_activation_redirect' );
		if ( ! isset( $_GET['activate-multi'] ) ) {
			wp_redirect( "options-general.php?page=aitasi-settings" );
		}
	}
}