<?php

namespace Database;

use Illuminate\Database\Capsule\Manager as Capsule;
use Phinx\Migration\AbstractMigration;

class Migration extends AbstractMigration {
    /** @var \Illuminate\Database\Capsule\Manager $capsule */
    public $capsule;
    /** @var \Illuminate\Database\Schema\Builder $capsule */
    public $schema;

    public function init()  {
        $this->capsule = new Capsule;
        $this->capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => atm('DB_HOST'),
            'port'      => atm('DB_PORT'),
            'database'  => atm('DB_NAME'),
            'username'  => atm('DB_USER'),
            'password'  => atm('DB_PASS'),
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
        ]);

        $this->capsule->bootEloquent();
        $this->capsule->setAsGlobal();
        $this->schema = $this->capsule->schema();
    }
}