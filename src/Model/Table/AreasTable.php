<?php
namespace App\Model\Table;

use App\Model\Entity\Area;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Areas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentAreas
 * @property \Cake\ORM\Association\HasMany $ChildAreas
 * @property \Cake\ORM\Association\BelongsToMany $Profiles
 */
class AreasTable extends Table
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

        $this->table('areas');
        $this->displayField('id');
        $this->primaryKey('id');


        $this->hasMany('ChildAreas', [
            'className' => 'Areas',
            'foreignKey' => 'parent_id'
        ]);

        $this->belongsToMany('Profiles', [
            'foreignKey' => 'area_id',
            'targetForeignKey' => 'profile_id',
            'joinTable' => 'areas_profiles'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->boolean('appear')
            ->requirePresence('appear', 'create')
            ->notEmpty('appear');

        $validator
            ->requirePresence('controller', 'create')
            ->notEmpty('controller');

        $validator
            ->allowEmpty('controller_label');

        $validator
            ->requirePresence('action', 'create')
            ->notEmpty('action');

        $validator
            ->requirePresence('action_label', 'create')
            ->notEmpty('action_label');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentAreas'));
        return $rules;
    }

    public function lists() {

        $areas = $this->find()
            ->select('id', 'controller_label', 'action_label');

        $areasLista = array();

        foreach ($areas as $area) {

            $index = $area->controller_label;
            $areasLista[$index][$area->id] = $area->action_label;
        }

        return $areasLista;
    }
}
