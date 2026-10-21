<?php

use App\Models\Post;
use App\Models\Tag;
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
            $table->string('name')->unique();
            $table->timestamps();
        });
        // pivot-table or intermediate table, (vahe tabel)
        Schema::create('post_tag', function (Blueprint $table) {
           $table->foreignIdFor(Post::class)->constrained()->cascadeOnDelete();
           $table->foreignIdFor(Tag::class)->constrained()->cascadeOnDelete();
           $table->unique(['post_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
