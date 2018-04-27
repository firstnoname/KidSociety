<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Score Entity
 *
 * @property string $id
 * @property string $username
 * @property string $name
 * @property string $game_id
 * @property string $game_name
 * @property string $score_g1
 * @property string $score_g2
 * @property string $score_g3
 * @property string $score_g4
 * @property string $total_score
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 */
class Score extends Entity
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
