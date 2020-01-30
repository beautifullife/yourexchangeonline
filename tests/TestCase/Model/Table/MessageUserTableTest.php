<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MessageUserTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MessageUserTable Test Case
 */
class MessageUserTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.message_user',
        'app.messages',
        'app.users',
        'app.cities',
        'app.regions',
        'app.comment_like',
        'app.comments',
        'app.posts',
        'app.image_post',
        'app.images',
        'app.likes',
        'app.rating_post',
        'app.view_post',
        'app.to_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MessageUser') ? [] : ['className' => 'App\Model\Table\MessageUserTable'];
        $this->MessageUser = TableRegistry::get('MessageUser', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MessageUser);

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
