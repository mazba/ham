<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
/**
 * User Entity.
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $name_bn
 * @property string $name_en
 * @property int $user_group_id
 * @property \App\Model\Entity\UserGroup $user_group
 * @property string $designation
 * @property string $gender
 * @property string $phone
 * @property string $office_phone
 * @property string $mobile
 * @property string $email
 * @property string $national_id_no
 * @property string $present_address
 * @property string $permanent_address
 * @property string $picture_alt
 * @property string $picture_name
 * @property int $notifiacation
 * @property int $created_by
 * @property int $dob
 * @property int $created_date
 * @property int $updated_by
 * @property int $updated_date
 * @property int $status
 */
class User extends Entity
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

    protected function _setPassword($password)
    {
        if (strlen($password) > 0)
        {
            return (new DefaultPasswordHasher)->hash($password);
        }

    }
    protected function _getDob($dob){
        return $dob ? date('d-m-Y',$dob) : '';
    }
    protected function _getCreatedTime($createdTime){
        return $createdTime ? date('d-m-Y',$createdTime) : '';
    }
    protected function _getUpdatedTime($time){
        return $time ? date('d-m-Y',$time) : '';
    }
}
