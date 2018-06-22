<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Addtask Entity
 *
 * @property int $id
 * @property int $property_id
 * @property int $task_id
 * @property int $created
 * @property int $modified
 */
class Addtaskinfo extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'addtasks_id' => true,
      
        'created' => true,
        'modified' => true
    ];
}
