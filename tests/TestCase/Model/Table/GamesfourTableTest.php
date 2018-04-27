<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GamesfourTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GamesfourTable Test Case
 */
class GamesfourTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GamesfourTable
     */
    public $Gamesfour;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.gamesfour',
        'app.games',
        'app.activecodes',
        'app.accounts',
        'app.gamesone',
        'app.gamesthree',
        'app.gamestwo'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Gamesfour') ? [] : ['className' => 'App\Model\Table\GamesfourTable'];
        $this->Gamesfour = TableRegistry::get('Gamesfour', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Gamesfour);

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
