<?php

use models\Migration;

class ExampleMigration extends Migration
{
    public function up()
    {
        $this->schema->create('user', function(Illuminate\Database\Schema\Blueprint $table){
            // Auto-increment id
            $table->increments('id');
            $table->string('name');
            // Required for Eloquent's created_at and updated_at columns
            $table->timestamps();
        });
    }
    public function down()
    {
        $this->schema->drop('user');
    }
}
