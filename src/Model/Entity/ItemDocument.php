<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ItemDocument Entity.
 *
 * @property int $id
 * @property int $parent_id
 * @property \App\Model\Entity\ItemDocument $parent_item_document
 * @property int $office_id
 * @property \App\Model\Entity\Office $office
 * @property int $item_id
 * @property \App\Model\Entity\Item $item
 * @property int $document_type
 * @property string $responsible_name
 * @property string $responsible_email
 * @property int $valid_number_or_duration
 * @property bool $is_reassignable
 * @property bool $is_auto_renewal
 * @property int $effective_date
 * @property int $expire_date
 * @property string $remarks
 * @property string $attach_file
 * @property int $status
 * @property int $create_time
 * @property int $update_time
 * @property int $create_by
 * @property int $update_by
 * @property \App\Model\Entity\ItemDocument[] $child_item_documents
 */
class ItemDocument extends Entity
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
