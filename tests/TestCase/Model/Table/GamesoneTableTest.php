<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GamesoneTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GamesoneTable Test Case
 */
class GamesoneTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GamesoneTable
     */
    public $Gamesone;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.gamesone',
        'app.games',
        'app.activecodes',
        'app.accounts',
        'app.gamesfour',
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
        $config = TableRegistry::exists('Gamesone') ? [] : ['className' => 'App\Model\Table\GamesoneTable'];
        $this->Gamesone = TableRegistry::get('Gamesone', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Gamesone);

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
