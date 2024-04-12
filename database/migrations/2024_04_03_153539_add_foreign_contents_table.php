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
        Schema::table('contents', function(Blueprint $table)
        {   $table->unsignedBigInteger('id_posts')->change();
            $table->foreign('id_posts')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contents', function (Blueprint $table) {
            // Loại bỏ khóa ngoại
            $table->dropForeign(['id_posts']);

            
        });
    }
};
