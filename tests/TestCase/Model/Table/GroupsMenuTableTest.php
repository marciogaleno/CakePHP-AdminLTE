<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GroupsMenuTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GroupsMenuTable Test Case
 */
class GroupsMenuTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GroupsMenuTable
     */
    public $GroupsMenu;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.groups_menu',
        'app.areas',
        'app.profiles',
        'app.areas_profiles',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('GroupsMenu') ? [] : ['className' => 'App\Model\Table\GroupsMenuTable'];
        $this->GroupsMenu = TableRegistry::get('GroupsMenu', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GroupsMenu);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
