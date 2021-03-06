<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Images Model
 *
 * @property \App\Model\Table\PropertiesTable|\Cake\ORM\Association\BelongsTo $Properties
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Propertiesimage get($primaryKey, $options = [])
 * @method \App\Model\Entity\Propertiesimage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Propertiesimage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Propertiesimage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Propertiesimage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Propertiesimage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Propertiesimage findOrCreate($search, callable $callback = null, $options = [])
 */
class ImagesTable extends Table
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

        $this->setTable('images');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Properties', [
            'foreignKey' => 'properties_id',
            'dependent' => true,
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'dependent' => true,
        ]);
        $this->belongsTo('Addtasks', [
            'foreignKey' => 'addtask_id',
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
            ->scalar('image')
            ->maxLength('image', 256)
            ->allowEmpty('image');

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
        $rules->add($rules->existsIn(['properties_id'], 'Properties'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['addtask_id'], 'Addtasks'));

        return $rules;
    }
}
