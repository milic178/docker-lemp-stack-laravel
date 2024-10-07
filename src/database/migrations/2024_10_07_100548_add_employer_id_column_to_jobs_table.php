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
        Schema::table('job_listings', function (Blueprint $table) {            // Add the employer_id column
            $table->unsignedBigInteger('employer_id');

            // Set up the foreign key constraint
            $table->foreign('employer_id')
                ->references('id')
                ->on('employers')
                ->onDelete('cascade');  // Optional: Handle cascading delete

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_listings', function (Blueprint $table) {
            // Drop the foreign key and column if rolling back
            $table->dropForeign(['employer_id']);
            $table->dropColumn('employer_id');
            //
        });
    }
};
