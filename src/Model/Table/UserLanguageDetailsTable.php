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
class UserLanguageDetailsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('user_language_details');
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

        $validator->requirePresence('name_en', true)->notEmpty('name_en', 'Please fill this field');
        $validator->requirePresence('read_level', true)->notEmpty('read_level', 'Please fill this field');
        $validator->requirePresence('write_level', true)->notEmpty('write_level', 'Please fill this field');
        $validator->requirePresence('listen_level', true)->notEmpty('listen_level', 'Please fill this field');
        $validator->requirePresence('speaking_level', true)->notEmpty('speaking_level', 'Please fill this field');

        return $validator;
    }
}
