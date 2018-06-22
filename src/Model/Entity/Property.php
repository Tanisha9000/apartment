<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Property Entity
 *
 * @property int $id
 * @property string $jobsitename
 * @property string $jobsiteaddress
 * @property string $billingname
 * @property string $billingaddress
 * @property int $created
 * @property int $modified
 */
class Property extends Entity
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
        'jobsitename' => true,
        'jobsiteaddress' => true,
        'billingname' => true,
        'billingaddress' => true,
        'genmanagerid' => true,
        'apartmanagerid' => true,
        'created' => true,
        'modified' => true
    ];
}
