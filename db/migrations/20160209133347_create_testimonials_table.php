<?php

use Phinx\Migration\AbstractMigration;

class CreateTestimonialsTable extends AbstractMigration
{
    // ForeignKey tai bus user_id sioje lenteleje ir is kokios lenteles users, tada eina users lenteleje i ka ziurime, tai i ID. Kas bus kai delete padarysime? bus cascade ir update
    public function up()
    {
        $users = $this->table('testimonials');
        $users->addColumn('title', 'string')
            ->addColumn('testimonial', 'text')
            ->addColumn('user_id', 'integer')
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'cascade', 'update' => 'cascade'])
            ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->save();
    }
    
    public function down()
    {
        $this->dropTable('testimonials');
    }
}
