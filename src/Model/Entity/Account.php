<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Account Entity
 *
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $houseno
 * @property string $villagename
 * @property string $subdistrict
 * @property string $district
 * @property string $province
 * @property string $zipcode
 * @property string $salary
 * @property string $name
 * @property int $age
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 * @property int $status
 *
 * @property \App\Model\Entity\Activecode[] $activecodes
 */
class Account extends Entity
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
        '*' => true,
        'id' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
