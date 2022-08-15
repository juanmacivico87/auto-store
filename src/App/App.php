<?php
namespace AutoStore\App;

use AutoStore\Modules\PostTypes\Vehicle\VehiclePostType;
use AutoStore\Modules\Taxonomies\Brand\BodyworkTaxonomy;
use AutoStore\Modules\Taxonomies\Brand\BrandTaxonomy;
use AutoStore\Providers\WordPress\WpActions;
use AutoStore\Providers\WordPress\WpDependencies;
use AutoStore\Providers\WordPress\WpProvider;

/**
 * App
 *
 * @package	auto-store
 */
class App
{
    private WpProvider $provider;
    private WpDependencies $wp_dependencies;

    /**
     * __construct()
     *
     * @return 	void
     * @access 	public
     * @package	auto-store
     */
    public function __construct()
    {
        $this->load_dependencies();

        if ( false === $this->wp_dependencies->check_dependencies() ) {
            $this->provider->add_action( WpActions::ADMIN_NOTICES, [ $this, 'render_dependencies_not_found_notice' ] );
            return;
        }
        
        $this->init();
    }

    /**
     * init()
     *
     * @return 	void
     * @access 	public
     * @package	auto-store
     */
    public function init(): void
    {
        $this->provider->add_action( WpActions::PLUGINS_LOADED, [ $this, 'load_classes' ] );
        $this->provider->add_action( WpActions::PLUGINS_LOADED, [ $this, 'load_textdomain' ] );
    }

    /**
     * load_dependencies()
     *
     * @return 	void
     * @access 	public
     * @package	auto-store
     */
    public function load_dependencies(): void
    {
        $this->provider = new WpProvider();
        $this->wp_dependencies = new WpDependencies( $this->provider );
    }

    /**
     * load_classes()
     *
     * @return 	void
     * @access 	public
     * @package	auto-store
     */
    public function load_classes(): void
    {
        $brand = new BrandTaxonomy( $this->provider );
        $bodywork = new BodyworkTaxonomy( $this->provider );
        $vehicle = new VehiclePostType( $this->provider );
    }

    /**
     * load_textdomain()
     *
     * @return 	void
     * @access 	public
     * @package	auto-store
     */
    public function load_textdomain(): void
    {
        $this->provider->load_plugin_textdomain();
    }

    /**
     * render_dependencies_not_found_notice()
     *
     * @return 	void
     * @access 	public
     * @package	auto-store
     */
    public function render_dependencies_not_found_notice(): void
    {
        $dependencies = WpDependencies::DEPENDENCIES;

        ?><div class="notice notice-error is-dismissible">
            <p><?php echo $this->provider->translate( 'In order to activate the <b>' . AUTO_STORE_NAME . '</b> plugin, you have to meet the next requirements:' ); ?></p>
            <ul>
                <li><?php echo sprintf( $this->provider->translate( 'PHP version: %s' ), WpDependencies::MIN_PHP_VERSION ) ?></li>
                <li><?php echo sprintf( $this->provider->translate( 'WordPress version: %s' ), WpDependencies::MIN_WP_VERSION ) ?></li>
                <?php foreach( $dependencies as $name => $plugin ) : ?>
                    <li><?php echo sprintf( $this->provider->translate( 'Activate plugin: %s' ), $name ) ?></li>
                <?php endforeach ?>
            </ul>
        </div><?php
    }
}
