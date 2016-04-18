<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AssetType Entity.
 *
 * @property int $id
 * @property int $parent_id
 * @property \App\Model\Entity\AssetType $parent_asset_type
 * @property string $title_bn
 * @property string $title_en
 * @property int $status
 * @property int $create_time
 * @property int $update_time
 * @property int $create_by
 * @property int $update_by
 * @property \App\Model\Entity\AssetType[] $child_asset_types
 * @property \App\Model\Entity\Item[] $items
 */
class AssetType extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
