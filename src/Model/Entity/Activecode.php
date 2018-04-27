<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Activecode Entity
 *
 * @property string $id
 * @property string $ac_code
 * @property string $game_id
 * @property string $account_id
 * @property int $code_status
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 *
 * @property \App\Model\Entity\Game $game
 * @property \App\Model\Entity\Account $account
 */
class Activecode extends Entity
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
}
