<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GamestwoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GamestwoTable Test Case
 */
class GamestwoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GamestwoTable
     */
    public $Gamestwo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.gamestwo',
        'app.games',
        'app.activecodes',
        'app.accounts',
        'app.gamesfour',
        'app.gamesone',
        'app.gamesthree'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Gamestwo') ? [] : ['className' => 'App\Model\Table\GamestwoTable'];
        $this->Gamestwo = TableRegistry::get('Gamestwo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Gamestwo);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
