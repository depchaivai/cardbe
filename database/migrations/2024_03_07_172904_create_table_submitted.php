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
        Schema::create('submitted', function (Blueprint $table) {
            $table->id();
            $table->string('gname');
            $table->string('gsubmit');
            $table->string('gmessage');
            $table->string('goriginname');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submitted');
    }
};
