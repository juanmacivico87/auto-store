<?php
namespace AutoStore\Modules\Taxonomies\Brand;

use AutoStore\Modules\PostTypes\Vehicle\VehiclePostType;
use AutoStore\Providers\WordPress\Resources\Taxonomy;
use AutoStore\Providers\WordPress\WpProvider;

/**
 * BrandTaxonomy
 *
 * @package	auto-store
 */
class BrandTaxonomy extends Taxonomy
{
    const TAXONOMY_NAME = 'brand';

    private WpProvider $provider;

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
        $this->singular = $this->provider->translate( 'Brand' );
        $this->plural = $this->provider->translate( 'Brands' );
        $this->post_types = [ VehiclePostType::POST_TYPE_NAME ];
        $this->hierarchical = false;

        $args = [ 'slug' => $this->provider->translate( 'brand' ) ];

        parent::__construct( $this->provider, $args );
    }
}
