<?php
namespace AutoStore\Modules\PostTypes\Vehicle;

use AutoStore\Modules\Taxonomies\Bodywork\BodyworkTaxonomy;
use AutoStore\Modules\Taxonomies\Brand\BrandTaxonomy;
use AutoStore\Modules\Taxonomies\Color\ColorTaxonomy;
use AutoStore\Modules\Taxonomies\EnvironmentalLabel\EnvironmentalLabelTaxonomy;
use AutoStore\Modules\Taxonomies\Fuel\FuelTaxonomy;
use AutoStore\Modules\Taxonomies\Gearbox\GearboxTaxonomy;
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
    protected array $support = [ 'title', 'thumbnail', 'editor' ];

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
        $this->show_in_rest = false;
        $this->taxonomies = [
            BrandTaxonomy::TAXONOMY_NAME,
            BodyworkTaxonomy::TAXONOMY_NAME,
            FuelTaxonomy::TAXONOMY_NAME,
            ColorTaxonomy::TAXONOMY_NAME,
            GearboxTaxonomy::TAXONOMY_NAME,
            EnvironmentalLabelTaxonomy::TAXONOMY_NAME,
        ];

        $args = [ 'slug' => $this->provider->translate( 'vehicle' ) ];

        parent::__construct( $this->provider, $args );
    }
}
