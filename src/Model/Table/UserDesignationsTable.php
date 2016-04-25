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
class UserDesignationsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('user_designations');
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

        $validator->requirePresence('office_id', true)->notEmpty('office_id', 'Please fill this field');
        $validator->requirePresence('office_unit_id', true)->notEmpty('office_unit_id', 'Please fill this field');
        $validator->requirePresence('designation_id', true)->notEmpty('designation_id', 'Please fill this field');

        return $validator;
    }
}
