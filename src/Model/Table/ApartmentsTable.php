<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Apartments Model
 *
 * @property \App\Model\Table\FloorsTable|\Cake\ORM\Association\BelongsTo $Floors
 *
 * @method \App\Model\Entity\Apartment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Apartment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Apartment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Apartment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Apartment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Apartment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Apartment findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ApartmentsTable extends Table
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

        $this->setTable('apartments');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Floors', [
            'foreignKey' => 'floors_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Rooms', [
             'className' => 'Rooms',
             'foreignKey' => 'apartments_id',
             'dependent' => true,
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 300)
            ->allowEmpty('name');

        return $validator;
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
        $rules->add($rules->existsIn(['floors_id'], 'Floors'));

        return $rules;
    }
}
