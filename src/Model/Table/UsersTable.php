<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $UserGroups
 */
class UsersTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('full_name_bn');
        $this->primaryKey('id');

        $this->belongsTo('UserGroups', [
            'foreignKey' => 'user_group_id',
            'joinType' => 'INNER'
        ]);
        $this->hasOne('UserBasic', [
            'foreignKey' => 'user_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasMany('UserAcademicTrainings', [
            'foreignKey' => 'user_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasMany('UserDependents', [
            'foreignKey' => 'user_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasMany('UserDesignations', [
            'foreignKey' => 'user_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasOne('UserEmergencyContacts', [
            'foreignKey' => 'user_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasMany('UserEmploymentHistories', [
            'foreignKey' => 'user_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasMany('UserLanguageDetails', [
            'foreignKey' => 'user_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasOne('UserMedicals', [
            'foreignKey' => 'user_id',
            'joinType' => 'LEFT'
        ]);

        $this->addBehavior('Xety/Cake3Upload.Upload', [
                'fields' => [
                    'picture_name' => [
                        'path' => 'u_load/users/:md5'
                    ]
                ]
            ]
        );
    }

    public function validationDefault(Validator $validator)
    {
        $validator->add('id', 'valid', ['rule' => 'numeric'])->allowEmpty('id', 'create');

        $validator->requirePresence('username', 'create')->notEmpty('username', 'Please fill this field')->add('username', [
            'length' => [
                'rule' => ['minLength', 6],
                'message' => 'Username need to be at least 6 characters long',
            ]
        ]);
        $validator->requirePresence('password', true)->notEmpty('password', 'Please fill this field');
        $validator->requirePresence('full_name_bn', true)->notEmpty('full_name_bn', 'Please fill this field');
        $validator->requirePresence('full_name_en', true)->notEmpty('full_name_en', 'Please fill this field');

        //$validator->allowEmpty('photo','update')->add('photo', 'file', ['rule' => ['extension',array('jpeg','jpg','png','gif')],'message' => 'File type is Not valid!']);

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['user_group_id'], 'UserGroups'));
        return $rules;
    }
}
