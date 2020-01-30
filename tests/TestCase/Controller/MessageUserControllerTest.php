<?php
namespace App\Test\TestCase\Controller;

use App\Controller\MessageUserController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\MessageUserController Test Case
 */
class MessageUserControllerTest extends IntegrationTestCase
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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
