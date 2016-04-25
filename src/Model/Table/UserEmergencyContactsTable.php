<?php
namespace App\Model\Table;

use App\Model\Entity\UserType;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserTypes Model
 */
class UserEmergencyContactsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('user_emergency_contacts');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator->requirePresence('name_bn', true)->notEmpty('name_bn', 'Please fill this field');
        $validator->requirePresence('name_en', true)->notEmpty('name_en', 'Please fill this field');
        $validator->requirePresence('relation', true)->notEmpty('relation', 'Please fill this field');
        $validator->requirePresence('contact_number_cell', true)->notEmpty('contact_number_cell', 'Please fill this field');
        $validator->requirePresence('address', true)->notEmpty('address', 'Please fill this field');

        return $validator;
    }
}
