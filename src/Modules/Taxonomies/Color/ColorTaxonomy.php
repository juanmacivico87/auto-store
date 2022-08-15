<?php
namespace AutoStore\Modules\Taxonomies\Color;

use AutoStore\Modules\PostTypes\Vehicle\VehiclePostType;
use AutoStore\Providers\WordPress\Resources\Taxonomy;
use AutoStore\Providers\WordPress\WpProvider;

/**
 * ColorTaxonomy
 *
 * @package	auto-store
 */
class ColorTaxonomy extends Taxonomy
{
    const TAXONOMY_NAME = 'color';

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
        $this->singular = $this->provider->translate( 'Color' );
        $this->plural = $this->provider->translate( 'Colors' );
        $this->post_types = [ VehiclePostType::POST_TYPE_NAME ];
        $this->hierarchical = false;

        $args = [ 'slug' => $this->provider->translate( 'color' ) ];

        parent::__construct( $this->provider, $args );
    }
}
