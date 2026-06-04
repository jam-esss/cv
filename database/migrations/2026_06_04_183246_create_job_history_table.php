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
        Schema::create('experience', function (Blueprint $table) {
            $table->id();

            $table->string('establishment')
                ->comment('Employer');

            $table->json('title')
                ->comment('Job Title');

            $table->string('location')
                ->nullable()
                ->comment('On-Site | Remote');

            $table->string('employment_type')
                ->nullable()
                ->comment('Full-Time | Part-Time');

            $table->date('start_date')
                ->comment('Start Date');

            $table->date('end_date')
                ->nullable()
                ->comment('Employment End Date | NULL if Current');

            $table->text('technologies_used')
                ->nullable()
                ->comment('Tools Used');

            $table->timestamp('created_at')
                ->useCurrent();

            $table->timestamp('updated_at')
                ->useCurrent()
                ->useCurrentOnUpdate();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experience');
    }
};
