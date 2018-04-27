<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Game Entity
 *
 * @property string $id
 * @property string $game_nameTH
 * @property string $game_nameEN
 * @property string $game_image_name
 * @property string $game_voice_name
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 * @property string $game_image_path
 * @property string $game_voice_path
 * @property string $game_path
 * @property int $game_complete_status
 *
 * @property \App\Model\Entity\Activecode[] $activecodes
 * @property \App\Model\Entity\Gamesfour[] $gamesfour
 * @property \App\Model\Entity\Gamesone[] $gamesone
 * @property \App\Model\Entity\Gamesthree[] $gamesthree
 * @property \App\Model\Entity\Gamestwo[] $gamestwo
 */
class Game extends Entity
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
