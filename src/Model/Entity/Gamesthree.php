<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Gamesthree Entity
 *
 * @property string $id
 * @property int $game3_number
 * @property string $game3_nameTH
 * @property string $game3_nameEN
 * @property string $game3_voiceTH_name
 * @property string $game3_voiceEN_name
 * @property string $game3_image_name
 * @property string $game3_duration
 * @property string $game_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 * @property string $game3_voiceTH_path
 * @property string $game3_voiceEN_path
 * @property string $game3_image_path
 * @property int $game3_complete_status
 *
 * @property \App\Model\Entity\Game $game
 */
class Gamesthree extends Entity
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
