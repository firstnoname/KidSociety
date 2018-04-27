<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Games Model
 *
 * @property \Cake\ORM\Association\HasMany $Activecodes
 * @property \Cake\ORM\Association\HasMany $Gamesfour
 * @property \Cake\ORM\Association\HasMany $Gamesone
 * @property \Cake\ORM\Association\HasMany $Gamesthree
 * @property \Cake\ORM\Association\HasMany $Gamestwo
 *
 * @method \App\Model\Entity\Game get($primaryKey, $options = [])
 * @method \App\Model\Entity\Game newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Game[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Game|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Game patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Game[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Game findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GamesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('games');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Activecodes', [
            'foreignKey' => 'game_id'
        ]);
        $this->hasMany('Gamesfour', [
            'foreignKey' => 'game_id'
        ]);
        $this->hasMany('Gamesone', [
            'foreignKey' => 'game_id'
        ]);
        $this->hasMany('Gamesthree', [
            'foreignKey' => 'game_id'
        ]);
        $this->hasMany('Gamestwo', [
            'foreignKey' => 'game_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('game_nameTH', 'create')
            ->notEmpty('game_nameTH');

        $validator
            ->requirePresence('game_nameEN', 'create')
            ->notEmpty('game_nameEN');

        $validator
            ->requirePresence('game_image_name', 'create')
            ->notEmpty('game_image_name');

        $validator
            ->requirePresence('game_voice_name', 'create')
            ->notEmpty('game_voice_name');

        $validator
            ->requirePresence('game_image_path', 'create')
            ->notEmpty('game_image_path');

        $validator
            ->requirePresence('game_voice_path', 'create')
            ->notEmpty('game_voice_path');

        $validator
            ->requirePresence('game_path', 'create')
            ->notEmpty('game_path');

        $validator
            ->integer('game_complete_status')
            ->requirePresence('game_complete_status', 'create')
            ->notEmpty('game_complete_status');

        return $validator;
    }
}
