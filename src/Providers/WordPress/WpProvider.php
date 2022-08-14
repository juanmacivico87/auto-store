<?php
namespace AutoStore\Providers\WordPress;

if ( false === defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * WpProvider
 *
 * @package	auto-store
 */
class WpProvider
{
    public string $wp_version;

    /**
     * __construct()
     *
     * @return 	void
     * @access 	public
     * @package	auto-store
     */
    public function __construct()
    {
        global $wp_version;

        $this->wp_version = $wp_version;
    }

    /**
     * add_action()
     *
     * @param   string  $hook
     * @param   array   $callback
     * @param   int     $priority
     * @param   int     $accepted_args
     * @return 	void
     * @access 	public
     * @package	auto-store
     */
    public function add_action( string $hook, array $callback, int $priority = 10, int $accepted_args = 1 ): void
    {
        add_action( $hook, $callback, $priority, $accepted_args );
    }

    /**
     * load_plugin_textdomain()
     *
     * @return 	bool
     * @access 	public
     * @package	auto-store
     */
    public function load_plugin_textdomain(): bool
    {
        return load_plugin_textdomain( AUTO_STORE_TEXTDOMAIN, false, AUTO_STORE_LANG_DIR );
    }

    /**
     * translate()
     *
     * @param   string  $text
     * @return 	bool
     * @access 	public
     * @package	auto-store
     */
    public function translate( string $text ): string
    {
        return __( $text, AUTO_STORE_TEXTDOMAIN );
    }

    /**
     * get_option()
     *
     * @param   string  $option
     * @return 	mixed
     * @access 	public
     * @package	auto-store
     */
    public function get_option( string $option )
    {
        return get_option( $option, null );
    }

    /**
     * get_site_option()
     *
     * @param   string  $option
     * @return 	mixed
     * @access 	public
     * @package	auto-store
     */
    public function get_site_option( string $option )
    {
        return get_site_option( $option, null );
    }

    /**
     * is_multisite()
     *
     * @return 	bool
     * @access 	public
     * @package	auto-store
     */
    public function is_multisite(): bool
    {
        return is_multisite();
    }

    /**
     * register_post_type()
     *
     * @param   string  $post_type
     * @param   array   $args
     * @return 	void
     * @access 	public
     * @package	auto-store
     */
    public function register_post_type( string $post_type, array $args ): void
    {
        register_post_type( $post_type, $args );
    }

    /**
     * flush_rewrite_rules()
     *
     * @param   bool    $hard
     * @return 	void
     * @access 	public
     * @package	auto-store
     */
    public function flush_rewrite_rules( bool $hard = true ): void
    {
        flush_rewrite_rules( $hard );
    }
}
