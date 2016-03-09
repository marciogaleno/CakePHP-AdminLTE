<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Profile Entity.
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Area[] $areas
 */
class Profile extends Entity
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
        'id' => false,
    ];

    public static function isAdmin($profile_id) {

        return $profile_id == Configure::read('AdminProfileId');
    }

    public function getAreas($profile_id) {
        
        $profile = $this->find('first', array(
            'conditions' => array('Profile.id' => $profile_id),
            'fields' => 'Profile.modified',
            'contain' => array(
                'Area' => array(
                    'order' => 'controller_label ASC'
                ))));

        $areas = array();

        foreach ($profile['Area'] as $area) {

            if (!isset($areas[$area['controller']]))
                $areas[$area['controller']] = array('controller_label' => $area['controller_label'], 'action' => array(), 'actions_labels' => array());

            $areas[$area['controller']]['action'][$area['action']] = $area['appear'];
            $areas[$area['controller']]['actions_labels'][$area['action']] = $area['action_label'];
        }

        return $areas;
    }

}
