<?php

use Phinx\Migration\AbstractMigration;

class SeedUsersTable extends AbstractMigration
{
    public function up()
    {
        $password_hash = password_hash('verysecrect', PASSWORD_DEFAULT);
        
        $this->execute("
            insert into users (first_name, last_name, email, password) values ('Mantas', 'Grauzinis', 'me@hsdgh.lt', '$password_hash')
        ");
    }
    
    public function down()
    {
        
    }
}
