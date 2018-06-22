<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Billing Entity
 *
 * @property int $id
 * @property string $billrate
 * @property string $payrate
 * @property int $billid
 * @property int $task_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Billing $billing
 */
class Building extends Entity
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
        'billrate' => true,
        'payrate' => true,
        'billid' => true,
        'task_id' => true,
        'created' => true,
        'modified' => true
    ];
}
