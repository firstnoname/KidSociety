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
 * @property int $score_g1
 * @property int $score_g2
 * @property int $score_g3
 * @property int $score_g4
 * @property int $total_score
 * @property float $time_g1
 * @property float $time_g2
 * @property float $time_g3
 * @property float $time_g4
 * @property float $time_total
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 *
 * @property \App\Model\Entity\Game $game
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
