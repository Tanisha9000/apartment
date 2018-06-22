<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Properties Model
 *
 * @method \App\Model\Entity\Property get($primaryKey, $options = [])
 * @method \App\Model\Entity\Property newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Property[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Property|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Property patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Property[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Property findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PropertiesTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('properties');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        
        $this->belongsTo('apartmanagerid_user', [  
            'className' => 'Users',
            'foreignKey' => 'apartmanagerid'
        ]);
        $this->belongsTo('genmanagerid_user', [  
            'className' => 'Users',
            'foreignKey' => 'genmanagerid'
        ]);
         $this->hasMany('Buildings', [
             'className' => 'Buildings',
             'foreignKey' => 'properties_id',
             'dependent' => true,
         ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->integer('id');

        $validator
                ->scalar('jobsitename')
                ->maxLength('jobsitename', 300);

        $validator
                ->scalar('jobsiteaddress')
                ->maxLength('jobsiteaddress', 300);

        $validator
                ->scalar('billingname')
                ->maxLength('billingname', 300);

        $validator
                ->scalar('billingaddress')
                ->maxLength('billingaddress', 300);

        return $validator
        ->notEmpty('jobsitename', 'Job site name is required')
        ->notEmpty('jobsiteaddress', 'Job site address is required')
        ->notEmpty('billingname', 'Billing name is required')
        ->notEmpty('billingaddress', 'Billing address is required');
    }

}
