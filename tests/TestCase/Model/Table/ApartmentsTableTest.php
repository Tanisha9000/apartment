<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApartmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApartmentsTable Test Case
 */
class ApartmentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApartmentsTable
     */
    public $Apartments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.apartments',
        'app.floors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Apartments') ? [] : ['className' => ApartmentsTable::class];
        $this->Apartments = TableRegistry::get('Apartments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Apartments);

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
