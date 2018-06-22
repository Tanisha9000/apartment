<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;

/**
 * Stages Model
 *
 * @method \App\Model\Entity\Staticpages get($primaryKey, $options = [])
 * @method \App\Model\Entity\Staticpages newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Staticpages[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Staticpages|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Staticpages patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Staticpages[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Staticpages findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StaticpagesTable extends Table
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

        $this->setTable('staticpages');
        $this->setDisplayField('description');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

}
