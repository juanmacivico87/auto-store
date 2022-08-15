<?php
namespace AutoStore\Modules\Taxonomies\Gearbox;

use AutoStore\Modules\PostTypes\Vehicle\VehiclePostType;
use AutoStore\Providers\WordPress\Resources\Taxonomy;
use AutoStore\Providers\WordPress\WpProvider;

/**
 * GearboxTaxonomy
 *
 * @package	auto-store
 */
class GearboxTaxonomy extends Taxonomy
{
    const TAXONOMY_NAME = 'gearbox';

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
        $this->singular = $this->provider->translate( 'Gearbox' );
        $this->plural = $this->provider->translate( 'Gearboxes' );
        $this->post_types = [ VehiclePostType::POST_TYPE_NAME ];
        $this->hierarchical = false;

        $args = [ 'slug' => $this->provider->translate( 'gearbox' ) ];

        parent::__construct( $this->provider, $args );
    }
}
