<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GamesthreeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GamesthreeTable Test Case
 */
class GamesthreeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GamesthreeTable
     */
    public $Gamesthree;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.gamesthree',
        'app.games',
        'app.activecodes',
        'app.accounts',
        'app.gamesfour',
        'app.gamesone',
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
        $config = TableRegistry::exists('Gamesthree') ? [] : ['className' => 'App\Model\Table\GamesthreeTable'];
        $this->Gamesthree = TableRegistry::get('Gamesthree', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Gamesthree);

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
