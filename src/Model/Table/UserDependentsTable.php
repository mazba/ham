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
class UserDependentsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('user_dependents');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);

        $this->addBehavior('Xety/Cake3Upload.Upload', [
                'fields' => [
                    'image_name' => [
                        'path' => 'u_load/user_dependents/:md5'
                    ]
                ]
            ]
        );
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator->requirePresence('full_name_bn', true)->notEmpty('full_name_bn', 'Please fill this field');
        $validator->requirePresence('full_name_en', true)->notEmpty('full_name_en', 'Please fill this field');
        $validator->requirePresence('relation', true)->notEmpty('relation', 'Please fill this field');
        $validator->requirePresence('gender', true)->notEmpty('gender', 'Please fill this field');
        $validator->requirePresence('date_of_birth', true)->notEmpty('date_of_birth', 'Please fill this field');

        return $validator;
    }
}
