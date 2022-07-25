<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Main Elementor RSM Class
 *
 * @since 1.4.0
 */
class Elementor_Integration_RSM
{
    /**
     * Minimum Elementor Version
     *
     * @since 1.4.0
     *
     * @var string Minimum Elementor version required to run the plugin.
     */
    const MINIMUM_ELEMENTOR_VERSION = '3.3.1';

    /**
     * Minimum PHP Version
     *
     * @since 1.4.0
     *
     * @var string Minimum PHP version required to run the plugin.
     */
    const MINIMUM_PHP_VERSION = '7.3';

    /**
     * Instance
     *
     * @since 1.4.0
     *
     * @access private
     * @static
     *
     * @var Elementor_Test_Extension The single instance of the class.
     */
    private static $_instance = null;

    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @since 1.4.0
     *
     * @access public
     * @static
     *
     * @return Elementor_Test_Extension An instance of the class.
     */
    public static function instance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Constructor
     *
     * @since 1.4.0
     *
     * @access public
     */
    public function __construct()
    {
        add_action('plugins_loaded', [$this, 'on_plugins_loaded']);
    }

    /**
     * Load Textdomain
     *
     * Load plugin localization files.
     *
     * Fired by `init` action hook.
     *
     * @since 1.4.0
     *
     * @access public
     */
    public function i18n()
    {
        load_plugin_textdomain('elementor-test-extension');
    }

    /**
     * On Plugins Loaded
     *
     * Checks if Elementor has loaded, and performs some compatibility checks.
     * If All checks pass, inits the plugin.
     *
     * Fired by `plugins_loaded` action hook.
     *
     * @since 1.4.0
     *
     * @access public
     */
    public function on_plugins_loaded()
    {
        if ($this->is_compatible()) {
            add_action('elementor/init', [$this, 'init']);
        }
    }

    /**
     * Compatibility Checks
     *
     * Checks if the installed version of Elementor meets the plugin's minimum requirement.
     * Checks if the installed PHP version meets the plugin's minimum requirement.
     *
     * @since 1.4.0
     *
     * @access public
     */
    public function is_compatible()
    {
        // Check if Elementor installed and activated
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
            return false;
        }

        // Check for required Elementor version
        if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
            return false;
        }

        // Check for required PHP version
        if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
            return false;
        }

        return true;
    }

    /**
     * Initialize the plugin
     *
     * Load the plugin only after Elementor (and other plugins) are loaded.
     * Load the files required to run the plugin.
     *
     * Fired by `plugins_loaded` action hook.
     *
     * @since 1.4.0
     *
     * @access public
     */
    public function init()
    {
        $this->i18n();

        // Add Plugin actions
        add_action('elementor/widgets/widgets_registered', [$this, 'init_widgets']);
    }

    /**
     * Init Widgets
     *
     * Include widgets files and register them
     *
     * @since 1.4.0
     *
     * @access public
     */
    public function init_widgets()
    {
        // Include Widget files
        require_once(__DIR__ . '/partials/elementor/class-elementor-widgets-integration.php');

        // Register widget
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor_Widgets_Integration());
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have Elementor installed or activated.
     *
     * @since 1.4.0
     *
     * @access public
     */
    public function admin_notice_missing_main_plugin()
    {
        if (isset($_GET['activate'])) unset($_GET['activate']);

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'responsive-sliding-menu'),
            '<strong>' . esc_html__('Responsive Sliding Menu', 'responsive-sliding-menu') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'responsive-sliding-menu') . '</strong>'
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required Elementor version.
     *
     * @since 1.4.0
     *
     * @access public
     */
    public function admin_notice_minimum_elementor_version()
    {
        if (isset($_GET['activate'])) unset($_GET['activate']);

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'responsive-sliding-menu'),
            '<strong>' . esc_html__('Responsive Sliding Menu', 'responsive-sliding-menu') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'responsive-sliding-menu') . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required PHP version.
     *
     * @since 1.4.0
     *
     * @access public
     */
    public function admin_notice_minimum_php_version()
    {
        if (isset($_GET['activate'])) unset($_GET['activate']);

        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'responsive-sliding-menu'),
            '<strong>' . esc_html__('Elementor Test Extension', 'responsive-sliding-menu') . '</strong>',
            '<strong>' . esc_html__('PHP', 'responsive-sliding-menu') . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }
}
