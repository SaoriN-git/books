<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('本の名前');
            $table->tinyInteger('status')->comment('本のステータス(1:読書中、2:未読、3:読破、4:読みたい)'); //tinyIntは1～255
            $table->string('author')->nullable()->comment('著者');
            $table->string('publication')->nullable()->comment('出版');
            $table->date('read_at')->nullable()->comment('読み終わった日');
            $table->text('note')->nullable()->comment('メモ(備考)');
            $table->timestamps(); // updated_at, created_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
