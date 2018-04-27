<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Gamestwo Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Games
 *
 * @method \App\Model\Entity\Gamestwo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Gamestwo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Gamestwo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Gamestwo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gamestwo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Gamestwo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Gamestwo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GamestwoTable extends Table
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

        $this->setTable('gamestwo');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Games', [
            'foreignKey' => 'game_id',
            'joinType' => 'INNER'
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
            ->integer('game2_number')
            ->requirePresence('game2_number', 'create')
            ->notEmpty('game2_number');

        $validator
            ->allowEmpty('game2_nameTH');

        $validator
            ->allowEmpty('game2_nameEN');

        $validator
            ->allowEmpty('game2_voiceTH_name');

        $validator
            ->allowEmpty('game2_voiceEN_name');

        $validator
            ->allowEmpty('game2_image_name');

        $validator
            ->allowEmpty('game2_size');

        $validator
            ->allowEmpty('game2_voiceTH_path');

        $validator
            ->allowEmpty('game2_voiceEN_path');

        $validator
            ->allowEmpty('game2_image_path');

        $validator
            ->integer('game2_complete_status')
            ->requirePresence('game2_complete_status', 'create')
            ->notEmpty('game2_complete_status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['game_id'], 'Games'));

        return $rules;
    }
}
