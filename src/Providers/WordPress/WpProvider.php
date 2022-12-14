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
     * add_meta_box()
     *
     * @param   array   $args
     * @return 	void
     * @access 	public
     * @package	auto-store
     */
    public function add_meta_box( array $args ): void
    {
        add_meta_box( $args['id'], $args['title'], $args['callback'], $args['screen'], $args['context'], $args['priority'], null );
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
     * get_post_meta()
     *
     * @param   int     $id
     * @param   string  $meta_key
     * @return 	string|null
     * @access 	public
     * @package	auto-store
     */
    public function get_post_meta( int $post_id, string $meta_key = '' ): ?string
    {
        $post_meta = get_post_meta( $post_id, $meta_key, true );

        if ( false === $post_meta ) {
            return null;
        }

        return $post_meta;
    }

    /**
     * update_post_meta()
     *
     * @param   int     $post_id
     * @param   string  $meta_key
     * @param   string  $meta_value
     * @return 	void
     * @access 	public
     * @package	auto-store
     */
    public function update_post_meta( int $post_id, string $meta_key, string $meta_value ): void
    {
        update_post_meta( $post_id, $meta_key, $meta_value );
    }

    /**
     * delete_post_meta()
     *
     * @param   int     $post_id
     * @param   string  $meta_key
     * @return 	bool
     * @access 	public
     * @package	auto-store
     */
    public function delete_post_meta( int $post_id, string $meta_key ): bool
    {
        return delete_post_meta( $post_id, $meta_key );
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
     * register_taxonomy()
     *
     * @param   string  $taxonomy
     * @param   array   $object_type
     * @param   array   $args
     * @return 	void
     * @access 	public
     * @package	auto-store
     */
    public function register_taxonomy( string $taxonomy, array $object_type, array $args ): void
    {
        register_taxonomy( $taxonomy, $object_type, $args );
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

    /**
     * esc_attr()
     *
     * @param   string  $text
     * @return 	string
     * @access 	public
     * @package	auto-store
     */
    public function esc_attr( string $text ): string
    {
        return esc_attr( $text );
    }

    /**
     * sanitize_meta()
     *
     * @param   string  $meta_key
     * @param   string  $meta_value
     * @param   string  $object_type
     * @param   string  $object_subtype
     * @return 	mixed
     * @access 	public
     * @package	auto-store
     */
    public function sanitize_meta( string $meta_key, string $meta_value, string $object_type, string $object_subtype = '' )
    {
        return sanitize_meta( $meta_key, $meta_value, $object_type, $object_subtype );
    }
}
