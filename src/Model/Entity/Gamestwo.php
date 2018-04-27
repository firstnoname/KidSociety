<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Gamestwo Entity
 *
 * @property string $id
 * @property int $game2_number
 * @property string $game2_nameTH
 * @property string $game2_nameEN
 * @property string $game2_voiceTH_name
 * @property string $game2_voiceEN_name
 * @property string $game2_image_name
 * @property string $game2_size
 * @property string $game_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 * @property string $game2_voiceTH_path
 * @property string $game2_voiceEN_path
 * @property string $game2_image_path
 * @property int $game2_complete_status
 *
 * @property \App\Model\Entity\Game $game
 */
class Gamestwo extends Entity
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
