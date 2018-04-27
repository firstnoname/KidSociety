<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Gamesfour Entity
 *
 * @property string $id
 * @property int $game4_number
 * @property string $game4_nameTH
 * @property string $game4_nameEN
 * @property string $game4_voiceTH_name
 * @property string $game4_voiceEN_name
 * @property string $game4_image_name
 * @property string $game4_color
 * @property string $game_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 * @property string $game4_voiceTH_path
 * @property string $game4_voiceEN_path
 * @property string $game4_image_path
 * @property int $game4_complete_status
 *
 * @property \App\Model\Entity\Game $game
 */
class Gamesfour extends Entity
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
