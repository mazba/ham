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
class UserAcademicTrainingsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('user_academic_trainings');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator->add('id', 'valid', ['rule' => 'numeric'])->allowEmpty('id', 'create');

        $validator->requirePresence('type', true)->notEmpty('type', 'Please fill this field');
        $validator->requirePresence('title_bn', true)->notEmpty('title_bn', 'Please fill this field');
        $validator->requirePresence('title_en', true)->notEmpty('title_en', 'Please fill this field');
        $validator->requirePresence('institute_name', true)->notEmpty('institute_name', 'Please fill this field');

        return $validator;
    }
}
