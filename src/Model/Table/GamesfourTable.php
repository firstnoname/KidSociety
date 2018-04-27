<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Gamesfour Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Games
 *
 * @method \App\Model\Entity\Gamesfour get($primaryKey, $options = [])
 * @method \App\Model\Entity\Gamesfour newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Gamesfour[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Gamesfour|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gamesfour patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Gamesfour[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Gamesfour findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GamesfourTable extends Table
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

        $this->setTable('gamesfour');
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
            ->integer('game4_number')
            ->requirePresence('game4_number', 'create')
            ->notEmpty('game4_number');

        $validator
            ->allowEmpty('game4_nameTH');

        $validator
            ->allowEmpty('game4_nameEN');

        $validator
            ->allowEmpty('game4_voiceTH_name');

        $validator
            ->allowEmpty('game4_voiceEN_name');

        $validator
            ->allowEmpty('game4_image_name');

        $validator
            ->allowEmpty('game4_color');

        $validator
            ->allowEmpty('game4_voiceTH_path');

        $validator
            ->allowEmpty('game4_voiceEN_path');

        $validator
            ->allowEmpty('game4_image_path');

        $validator
            ->integer('game4_complete_status')
            ->requirePresence('game4_complete_status', 'create')
            ->notEmpty('game4_complete_status');

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
