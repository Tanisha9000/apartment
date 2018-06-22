<?php
namespace App\Model\Table;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\TaxesTable|\Cake\ORM\Association\BelongsTo $Taxes
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Properties', [
            'foreignKey' => 'user_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id');

        $validator
            ->scalar('name')
            ->maxLength('name', 300)
            ->allowEmpty('name');

        $validator
            ->email('email');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 15)
            ->allowEmpty('phone');

        $validator
            ->scalar('address')
            ->maxLength('address', 300)
            ->allowEmpty('address');

        $validator
            ->scalar('ssnumber')
            ->maxLength('ssnumber', 300)
            ->allowEmpty('ssnumber');

        $validator
            ->scalar('role')
            ->maxLength('role', 300);
        
        $validator
                ->maxLength('password',255);
     return $validator
         ->notEmpty('email', 'email/username is required')
            ->notEmpty('password', 'A password is required')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin','apartmentmanager','subcontractor']],
                'message' => 'Please enter a valid role'
            ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
}
