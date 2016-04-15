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

    public static function isAdmin($profile_id) 
    {

        return $profile_id == Configure::read('AdminProfileId');
    }

    public function getAreas($profile_id) 
    {
        
        $profile = $this->find()
                ->select('id')
                ->where(['id' =>  $profile_id])
                ->contain([
                    'Areas' => function ($query){
                        return $query->select(['Areas.name_group_menu', 'Areas.controller', 'Areas.controller_label', 'Areas.action','Areas.action_label', 'Areas.id', 'Areas.parent_id', 'Areas.icon_group_menu', 'Areas.appear'])
                                     ->contain([
                                        'ChildAreas' => function ($q) {
                                            return $q->select(['ChildAreas.controller', 'ChildAreas.controller_label', 'ChildAreas.action','ChildAreas.parent_id', 'ChildAreas.appear'])
                                                     ->order(['controller_label' => 'ASC']);
                                                     
                                     }]);
                    }
                ])
                ->toArray();

        $areas = array();

        foreach ($profile[0]->areas as $parent_area) {
            
            $name_group_menu = $parent_area->name_group_menu;
            $menu_parent = $parent_area->controller;          

            $areas[$parent_area->controller]['controller_label'] = $parent_area->controller_label;
            $areas[$parent_area->controller]['action'][$parent_area->action] = $parent_area->appear;
            $areas[$parent_area->controller]['actions_labels'][$parent_area->action] = $parent_area->action_label;
            $areas[$parent_area->controller]['name_group_menu'] = $name_group_menu;
            $areas[$parent_area->controller]['parent_menu'] = $menu_parent;


            // / dump($parent_area);
            // foreach ($parent_area->child_areas as $area) {

            //     if (!isset($areas[$area->controller]))
            //         $areas[$area->controller] = array('controller_label' => $area->controller_label, 'action' => array(), 'actions_labels' => array());

            //     $areas[$area->controller]['action'][$area->action] = $area->appear;
            //     $areas[$area->controller]['actions_labels'][$area->action] = $area->action_label;
            //     $areas[$area->controller]['controller'] = $area->controller;
            //     $areas[$area->controller]['name_group_menu'] = $name_group_menu;
            //     $areas[$area->controller]['parent_menu'] = $menu_parent;
            //     $areas[$parent_area->controller]['icon_group_menu'] = $icon_group_menu;

            // }

        } 
        //dump($areas);
        return $areas;
    }
}
