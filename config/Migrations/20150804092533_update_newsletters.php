<?php
use Phinx\Migration\AbstractMigration;

class UpdateNewsletters extends AbstractMigration
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
        $table = $this->table('newsletters');
        
        $table->addColumn('name', 'string', [
            'null'      => false,
            'default'   => null,
            'limit'     => 100,
            'after'     => 'id', 
        ]);
        
        $table->addColumn('content', 'text', [
            'null'      => true,
            'default'   => null,
            'after'     => 'name', 
        ]);
        
        $table->addColumn('status', 'integer', [
            'null'      => false,
            'default'   => 1,
            'limit'     => 1,
            'after'     => 'content', 
        ]);
        
        $table->addIndex('name', 'NAME_INDEX');
        
        $table->update();
    }
}
