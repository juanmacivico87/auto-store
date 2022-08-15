<?php
namespace AutoStore\Modules\Taxonomies\Fuel;

use AutoStore\Modules\PostTypes\Vehicle\VehiclePostType;
use AutoStore\Providers\WordPress\Resources\Taxonomy;
use AutoStore\Providers\WordPress\WpProvider;

/**
 * FuelTaxonomy
 *
 * @package	auto-store
 */
class FuelTaxonomy extends Taxonomy
{
    const TAXONOMY_NAME = 'fuel';

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
        $this->singular = $this->provider->translate( 'Fuel' );
        $this->plural = $this->provider->translate( 'Fuels' );
        $this->post_types = [ VehiclePostType::POST_TYPE_NAME ];
        $this->hierarchical = false;

        $args = [ 'slug' => $this->provider->translate( 'fuel' ) ];

        parent::__construct( $this->provider, $args );
    }
}
