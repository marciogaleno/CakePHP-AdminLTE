<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GroupMenusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GroupMenusTable Test Case
 */
class GroupMenusTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GroupMenusTable
     */
    public $GroupMenus;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.group_menus',
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
        $config = TableRegistry::exists('GroupMenus') ? [] : ['className' => 'App\Model\Table\GroupMenusTable'];
        $this->GroupMenus = TableRegistry::get('GroupMenus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GroupMenus);

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
