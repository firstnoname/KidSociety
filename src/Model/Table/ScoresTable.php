<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Scores Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Games
 *
 * @method \App\Model\Entity\Score get($primaryKey, $options = [])
 * @method \App\Model\Entity\Score newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Score[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Score|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Score patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Score[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Score findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ScoresTable extends Table
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

        $this->setTable('scores');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Games', [
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
            ->allowEmpty('username');

        $validator
            ->allowEmpty('name');

        $validator
            ->allowEmpty('game_name');

        $validator
            ->integer('score_g1')
            ->allowEmpty('score_g1');

        $validator
            ->integer('score_g2')
            ->allowEmpty('score_g2');

        $validator
            ->integer('score_g3')
            ->allowEmpty('score_g3');

        $validator
            ->integer('score_g4')
            ->allowEmpty('score_g4');

        $validator
            ->integer('total_score')
            ->allowEmpty('total_score');

        $validator
            ->numeric('time_g1')
            ->requirePresence('time_g1', 'create')
            ->notEmpty('time_g1');

        $validator
            ->numeric('time_g2')
            ->requirePresence('time_g2', 'create')
            ->notEmpty('time_g2');

        $validator
            ->numeric('time_g3')
            ->requirePresence('time_g3', 'create')
            ->notEmpty('time_g3');

        $validator
            ->numeric('time_g4')
            ->requirePresence('time_g4', 'create')
            ->notEmpty('time_g4');

        $validator
            ->numeric('time_total')
            ->requirePresence('time_total', 'create')
            ->notEmpty('time_total');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['game_id'], 'Games'));

        return $rules;
    }
}
