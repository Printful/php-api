<?php


namespace Printful\Structures\Generator;


use Printful\Structures\BaseItem;

/**
 * Class represents a generated mockup for one or multiple product variants
 */
class MockupItem extends BaseItem
{
    /**
     * List of Printful product variant ids that this mockup can be used for
     * @var int[]
     */
    public $variantIds = [];

    /**
     * Generated placement. Placements are defined in:
     * @see \Printful\Structures\Placements
     * @var string
     */
    public $placement;

    /**
     * Temporary url where generated mockup resides
     * @var string
     */
    public $mockupUrl;

    /**
     * Optional list of extra mockups generated. Not all products have extra mockups though.
     * @var string[] List of URLs
     */
    public $extraMockups = [];

    /**
     * @param array $raw
     * @return self
     */
    public static function fromArray(array $raw)
    {
        $i = new self;

        $i->placement = $raw['placement'];
        $i->variantIds = $raw['variant_ids'];
        $i->mockupUrl = $raw['mockup_url'];

        if (!empty($raw['extra'])) {
            $i->extraMockups = $raw['extra'];
        }

        return $i;
    }
}