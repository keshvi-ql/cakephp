<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BlogPostsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BlogPostsTable Test Case
 */
class BlogPostsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BlogPostsTable
     */
    protected $BlogPosts;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.BlogPosts',
        'app.MetaFields',
        'app.Categories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('BlogPosts') ? [] : ['className' => BlogPostsTable::class];
        $this->BlogPosts = $this->getTableLocator()->get('BlogPosts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->BlogPosts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BlogPostsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
