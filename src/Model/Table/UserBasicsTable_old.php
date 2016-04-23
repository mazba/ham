<?php
namespace App\Model\Table;

use App\Model\Entity\UserType;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class UserBasicsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('user_basics');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator->add('id', 'valid', ['rule' => 'numeric'])->allowEmpty('id', 'create');

        $validator->notEmpty('father_name_bn', 'Please fill this field');
        $validator->requirePresence('father_name_en', true)->notEmpty('father_name_en', 'Please fill this field');
        $validator->requirePresence('mother_name_bn', true)->notEmpty('mother_name_bn', 'Please fill this field');
        $validator->requirePresence('mother_name_en', true)->notEmpty('mother_name_en', 'Please fill this field');
        $validator->requirePresence('nid', true)->notEmpty('nid', 'Please fill this field');
        $validator->requirePresence('date_of_birth', true)->notEmpty('date_of_birth', 'Please fill this field');
        $validator->requirePresence('place_of_birth', true)->notEmpty('place_of_birth', 'Please fill this field');
        $validator->requirePresence('nationality', true)->notEmpty('nationality', 'Please fill this field');
        $validator->requirePresence('gender', true)->notEmpty('gender', 'Please fill this field');
        $validator->requirePresence('religion', true)->notEmpty('religion', 'Please fill this field');
        $validator->requirePresence('cell_phone', true)->notEmpty('cell_phone', 'Please fill this field');
        $validator->requirePresence('email', true)->notEmpty('email', 'Please fill this field');
        $validator->requirePresence('present_address', true)->notEmpty('present_address', 'Please fill this field');
        $validator->requirePresence('permanent_address', true)->notEmpty('permanent_address', 'Please fill this field');

        return $validator;
    }
}
