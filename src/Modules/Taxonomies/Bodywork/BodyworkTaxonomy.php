<?php
namespace AutoStore\Modules\Taxonomies\Bodywork;

use AutoStore\Modules\PostTypes\Vehicle\VehiclePostType;
use AutoStore\Providers\WordPress\Resources\Taxonomy;
use AutoStore\Providers\WordPress\WpProvider;

/**
 * BodyworkTaxonomy
 *
 * @package	auto-store
 */
class BodyworkTaxonomy extends Taxonomy
{
    const TAXONOMY_NAME = 'bodywork';

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
        $this->singular = $this->provider->translate( 'Bodywork' );
        $this->plural = $this->provider->translate( 'Bodyworks' );
        $this->post_types = [ VehiclePostType::POST_TYPE_NAME ];
        $this->hierarchical = false;

        $args = [ 'slug' => $this->provider->translate( 'bodywork' ) ];

        parent::__construct( $this->provider, $args );
    }
}
