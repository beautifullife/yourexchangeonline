<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImageUserTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImageUserTable Test Case
 */
class ImageUserTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.image_user',
        'app.images',
        'app.image_post',
        'app.posts',
        'app.users',
        'app.cities',
        'app.regions',
        'app.comment_like',
        'app.comments',
        'app.likes',
        'app.rating_post',
        'app.view_post'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ImageUser') ? [] : ['className' => 'App\Model\Table\ImageUserTable'];
        $this->ImageUser = TableRegistry::get('ImageUser', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ImageUser);

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
