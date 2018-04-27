<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Gamesthree Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Games
 *
 * @method \App\Model\Entity\Gamesthree get($primaryKey, $options = [])
 * @method \App\Model\Entity\Gamesthree newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Gamesthree[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Gamesthree|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gamesthree patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Gamesthree[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Gamesthree findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GamesthreeTable extends Table
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

        $this->setTable('gamesthree');
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
            ->integer('game3_number')
            ->requirePresence('game3_number', 'create')
            ->notEmpty('game3_number');

        $validator
            ->allowEmpty('game3_nameTH');

        $validator
            ->allowEmpty('game3_nameEN');

        $validator
            ->allowEmpty('game3_voiceTH_name');

        $validator
            ->allowEmpty('game3_voiceEN_name');

        $validator
            ->allowEmpty('game3_image_name');

        $validator
            ->allowEmpty('game3_duration');

        $validator
            ->allowEmpty('game3_voiceTH_path');

        $validator
            ->allowEmpty('game3_voiceEN_path');

        $validator
            ->allowEmpty('game3_image_path');

        $validator
            ->integer('game3_complete_status')
            ->requirePresence('game3_complete_status', 'create')
            ->notEmpty('game3_complete_status');

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
