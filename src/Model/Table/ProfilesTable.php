<?php
namespace App\Model\Table;

use App\Model\Entity\Profile;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Profiles Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Areas
 */
class ProfilesTable extends Table
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

        $this->table('profiles');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Areas', [
            'foreignKey' => 'profile_id',
            'targetForeignKey' => 'area_id',
            'joinTable' => 'areas_profiles'
        ]);

        $this->hasMany('Users', [
            'className' => 'Users',
            'foreignKey' => 'profile_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }

    public static function isAdmin($profile_id) {

        return $profile_id == Configure::read('AdminProfileId');
    }

    public function getAreas($profile_id) {
        
        $profile = $this->find()
            ->select(['id'])
            ->where(['id' => $profile_id])
            ->contain(['Areas' => function ($q) {
                return $q->order(['controller_label' => 'ASC']);
            }])
            ->toArray();

        $group_menu = $this->find()
                ->select(['id'])
                ->where(['id' => $profile_id])
                ->contain(['Areas' => function ($q) {
                    return $q->order(['controller_label' => 'ASC'])
                             ->select(['id', 'name_group_menu'])
                             ->where(['is_group_menu' => '1']);
                }])
                ->toArray();

        dump($profile);
        dump($group_menu[0]->areas);
        $teste = $group_menu[0]->areas;

        $areas = array();

        foreach ($profile[0]->areas as $area) {
            if (!isset($areas[$area->controller]))
                $areas[$area->controller] = array('controller_label' => $area->controller_label, 'action' => array(), 'actions_labels' => array());

            $areas[$area->controller]['action'][$area->action] = $area->appear;
            $areas[$area->controller]['actions_labels'][$area->action] = $area->action_label;

            //Colocando informaçõa de que grupo de menu é essa área
            foreach ($teste as $key => $value) {
                dump($value);
            }
          

        }
        
        return $areas;
    }
}
