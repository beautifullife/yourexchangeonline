<?php
use Phinx\Migration\AbstractMigration;

class RemovePostIdFromImages extends AbstractMigration
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
        $table = $this->table('images');
        $table->removeColumn('post_id');
        $table->update();
    }
}
