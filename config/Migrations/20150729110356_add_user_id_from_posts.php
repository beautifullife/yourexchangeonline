<?php
use Phinx\Migration\AbstractMigration;

class AddUserIdFromPosts extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('posts');
        
        $table->addColumn('user_id','integer',[
            'null' => false,
            'default' => null,
            'after' => 'id',
        ]);
        
        $table->update();
    }
}
