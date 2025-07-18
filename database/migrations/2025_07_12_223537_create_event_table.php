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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('price_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index()->constrained()->onDelete('cascade');
            $table->string('event_title');
            $table->text('description');
            $table->date('start_event_date')->index();
            $table->date('end_event_date')->index();
            $table->time('start_time');
            $table->time('end_time');
            $table->string('img');
            $table->integer('price')->nullable()->index();
            $table->foreignId('price_type_id')->constrained('price_types')->onDelete('cascade');
            $table->string('place')->index();
            $table->foreignId('area_id')->nullable()->index()->constrained()->onDelete('cascade');
            $table->dateTime('post_date')->index();
            $table->timestamps();
        });

        // いいね中間テーブル
        Schema::create('event_likes', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->primary(['user_id', 'event_id']);
        });

        // タグ中間テーブル
        Schema::create('event_tag', function (Blueprint $table) {
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->foreignId('tag_id')->constrained()->onDelete('cascade');
            $table->primary(['event_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('price_types');
        Schema::dropIfExists('areas');
        Schema::dropIfExists('event_likes');
        Schema::dropIfExists('event_tag');
    }
};
