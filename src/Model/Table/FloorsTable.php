<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Floors Model
 *
 * @property \App\Model\Table\BuildingsTable|\Cake\ORM\Association\BelongsTo $Buildings
 *
 * @method \App\Model\Entity\Floor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Floor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Floor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Floor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Floor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Floor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Floor findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FloorsTable extends Table
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

        $this->setTable('floors');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Buildings', [
            'foreignKey' => 'buildings_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Apartments', [
             'className' => 'Apartments',
             'foreignKey' => 'floors_id',
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
        $rules->add($rules->existsIn(['buildings_id'], 'Buildings'));

        return $rules;
    }
}
