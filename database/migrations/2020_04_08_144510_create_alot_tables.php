<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlotTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('alots.table_names');

        if (empty($tableNames)) {
            throw new \Exception('Error: config/alots.php not found and defaults could not be merged. Please publish the package configuration before proceeding.');
        }

        Schema::create($tableNames['messages'], function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mobile_number')->nullable();
            $table->string('message_id')->nullable();
            $table->string('message')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tableNames = config('alots.table_names');

        if (empty($tableNames)) {
            throw new \Exception('Error: config/alots.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
        }

        Schema::drop($tableNames['messages']);
    }
}