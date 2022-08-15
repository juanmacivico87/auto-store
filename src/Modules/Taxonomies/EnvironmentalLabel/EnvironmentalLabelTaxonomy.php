<?php
namespace AutoStore\Modules\Taxonomies\EnvironmentalLabel;

use AutoStore\Modules\PostTypes\Vehicle\VehiclePostType;
use AutoStore\Providers\WordPress\Resources\Taxonomy;
use AutoStore\Providers\WordPress\WpProvider;

/**
 * EnvironmentalLabelTaxonomy
 *
 * @package	auto-store
 */
class EnvironmentalLabelTaxonomy extends Taxonomy
{
    const TAXONOMY_NAME = 'environmental-label';

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
        $this->singular = $this->provider->translate( 'Environmental Label' );
        $this->plural = $this->provider->translate( 'Environmental Labels' );
        $this->post_types = [ VehiclePostType::POST_TYPE_NAME ];
        $this->hierarchical = false;

        $args = [ 'slug' => $this->provider->translate( 'environmental-label' ) ];

        parent::__construct( $this->provider, $args );
    }
}
