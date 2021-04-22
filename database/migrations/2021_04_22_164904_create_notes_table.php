<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('title');
            $table->string('slug');
            $table->boolean('public')->nullable()->default(false);
            $table->longText('simple_note');
            $table->string('simple_pass');
            $table->boolean('encrypted')->nullable()->default(false);
            $table->longText('encrypted_note');
            $table->string('encrypt_pass')->nullable();
            $table->json('tags')->nullable();
            $table->bigInteger('user_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');//cascade|set null
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
