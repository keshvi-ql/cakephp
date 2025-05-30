<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MetaFieldsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MetaFieldsTable Test Case
 */
class MetaFieldsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MetaFieldsTable
     */
    protected $MetaFields;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.MetaFields',
        'app.BlogPosts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MetaFields') ? [] : ['className' => MetaFieldsTable::class];
        $this->MetaFields = $this->getTableLocator()->get('MetaFields', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MetaFields);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MetaFieldsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MetaFieldsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
