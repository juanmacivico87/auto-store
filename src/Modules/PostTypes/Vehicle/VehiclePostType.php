<?php
namespace AutoStore\Modules\PostTypes\Vehicle;

use AutoStore\Modules\Taxonomies\Brand\BodyworkTaxonomy;
use AutoStore\Modules\Taxonomies\Brand\BrandTaxonomy;
use AutoStore\Providers\WordPress\Resources\PostType;
use AutoStore\Providers\WordPress\WpProvider;

/**
 * VehiclePostType
 *
 * @package	auto-store
 */
class VehiclePostType extends PostType
{
    const POST_TYPE_NAME = 'vehicle';

    private WpProvider $provider;

    protected string $menu_icon = 'dashicons-car';
    protected array $support = [ 'title', 'thumbnail', 'excerpt', 'page-attributes' ];

    /**
     * __construct()
     *
     * @param   WpProvider  $provider
     * @param   array       $args
     * @return 	void
     * @access 	public
     * @package	auto-store
     */
    public function __construct( WpProvider $provider )
    {
        $this->provider = $provider;
        $this->singular = $this->provider->translate( 'Vehicle' );
        $this->plural = $this->provider->translate( 'Vehicles' );
        $this->taxonomies = [
            BrandTaxonomy::TAXONOMY_NAME,
            BodyworkTaxonomy::TAXONOMY_NAME,
        ];

        $args = [ 'slug' => $this->provider->translate( 'vehicle' ) ];

        parent::__construct( $this->provider, $args );
    }
}
