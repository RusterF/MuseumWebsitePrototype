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
        // 1. Settings
        if (! Schema::hasTable('settings')) {
            Schema::create('settings', function (Blueprint $table) {
                $table->increments('id');
                $table->string('key')->unique();
                $table->string('name')->nullable();
                $table->string('description')->nullable();
                $table->text('value')->nullable();
                $table->text('field')->nullable();
                $table->tinyInteger('active')->default(1);
                $table->timestamps();
            });
        }

        // 2. Categories & CMS Categories
        if (! Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('parent_id')->default(0)->nullable();
                $table->integer('lft')->unsigned()->nullable();
                $table->integer('rgt')->unsigned()->nullable();
                $table->integer('depth')->unsigned()->nullable();
                $table->string('name');
                $table->string('slug');
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('cms_categories')) {
            Schema::create('cms_categories', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug');
                $table->timestamps();
            });
        }

        // 3. Tags & CMS Tags
        if (! Schema::hasTable('tags')) {
            Schema::create('tags', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug');
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('cms_tags')) {
            Schema::create('cms_tags', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug');
                $table->timestamps();
            });
        }

        // 4. Collection Categories
        if (! Schema::hasTable('collection_categories')) {
            Schema::create('collection_categories', function (Blueprint $table) {
                $table->id();
                $table->integer('parent_id')->default(0)->nullable();
                $table->integer('lft')->unsigned()->nullable();
                $table->integer('rgt')->unsigned()->nullable();
                $table->integer('depth')->unsigned()->nullable();
                $table->string('name');
                $table->string('slug');
                $table->timestamps();
                $table->softDeletes();
            });
        }

        // 5. Collections
        if (! Schema::hasTable('collections')) {
            Schema::create('collections', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('description')->nullable();
                $table->string('file')->nullable();
                $table->string('status')->default('PUBLISH');
                $table->unsignedBigInteger('category_id')->nullable();
                $table->unsignedBigInteger('collection_category_id')->nullable();
                $table->unsignedBigInteger('user_id')->nullable();
                $table->string('registration_number')->nullable();
                $table->string('registration_year')->nullable();
                $table->string('inventory_number')->nullable();
                $table->string('contributor')->nullable();
                $table->string('bahan')->nullable();
                $table->string('ukuran')->nullable();
                $table->string('available')->nullable();
                $table->string('available_note')->nullable();
                $table->string('slug')->nullable();
                $table->text('photos')->nullable();
                $table->timestamps();
            });
        }

        // 6. Articles
        if (! Schema::hasTable('articles')) {
            Schema::create('articles', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('category_id')->nullable();
                $table->string('title');
                $table->string('slug');
                $table->text('content')->nullable();
                $table->string('image')->nullable();
                $table->string('image2')->nullable();
                $table->string('image3')->nullable();
                $table->string('image4')->nullable();
                $table->string('image5')->nullable();
                $table->integer('status')->default(1);
                $table->date('date')->nullable();
                $table->boolean('featured')->default(false);
                $table->char('approval_status', 1)->default('Y')->nullable();
                $table->string('approval_reject_reason')->nullable();
                $table->unsignedBigInteger('user_id')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }

        // 7. Events
        if (! Schema::hasTable('events')) {
            Schema::create('events', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->text('description')->nullable();
                $table->dateTime('date')->nullable();
                $table->dateTime('end_date')->nullable();
                $table->string('file')->nullable();
                $table->string('type')->default('EXHIBITION');
                $table->string('status')->default('PUBLISH');
                $table->integer('max_visitor')->default(100);
                $table->string('slug');
                $table->timestamps();
            });
        }

        // 8. Partners
        if (! Schema::hasTable('partners')) {
            Schema::create('partners', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('file')->nullable();
                $table->string('category')->nullable();
                $table->boolean('is_featured')->default(true);
                $table->timestamps();
            });
        }

        // 9. Teams
        if (! Schema::hasTable('teams')) {
            Schema::create('teams', function (Blueprint $table) {
                $table->id();
                $table->string('photo')->nullable();
                $table->string('name');
                $table->string('title')->nullable();
                $table->string('category')->nullable();
                $table->timestamps();
            });
        }

        // 10. Galleries
        if (! Schema::hasTable('galleries')) {
            Schema::create('galleries', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('description')->nullable();
                $table->string('file')->nullable();
                $table->string('embed_link')->nullable();
                $table->unsignedBigInteger('user_id')->nullable();
                $table->unsignedBigInteger('category_id')->nullable();
                $table->timestamps();
            });
        }

        // 11. TV Links
        if (! Schema::hasTable('tv_links')) {
            Schema::create('tv_links', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->text('description')->nullable();
                $table->string('embed_link')->nullable();
                $table->boolean('is_featured')->default(true);
                $table->timestamps();
            });
        }

        // 12. Bookings
        if (! Schema::hasTable('bookings')) {
            Schema::create('bookings', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->nullable();
                $table->string('phone')->nullable();
                $table->string('place')->nullable();
                $table->string('event_id')->nullable();
                $table->integer('visitor')->default(1);
                $table->string('type')->default('ONSITE');
                $table->dateTime('date')->nullable();
                $table->string('category')->nullable();
                $table->string('session_type')->nullable();
                $table->string('approval_status')->default('PENDING');
                $table->timestamps();
            });
        }

        // 13. Guest Books
        if (! Schema::hasTable('guest_books')) {
            Schema::create('guest_books', function (Blueprint $table) {
                $table->id();
                $table->string('visitor_type')->default('ONSITE');
                $table->string('age')->nullable();
                $table->string('tourist')->nullable();
                $table->string('name');
                $table->string('sex')->nullable();
                $table->string('no_whatsapp')->nullable();
                $table->string('email')->nullable();
                $table->string('group_name')->nullable();
                $table->string('group_member_total')->default('1');
                $table->string('category')->nullable();
                $table->string('school')->nullable();
                $table->string('origin')->nullable();
                $table->string('subs')->nullable();
                $table->string('image_url')->nullable();
                $table->timestamps();
            });
        }

        // 14. Complaints
        if (! Schema::hasTable('complaints')) {
            Schema::create('complaints', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('email')->nullable();
                $table->string('phone')->nullable();
                $table->text('body')->nullable();
                $table->dateTime('date')->nullable();
                $table->string('location')->nullable();
                $table->string('instansion')->nullable();
                $table->string('category')->nullable();
                $table->string('file')->nullable();
                $table->string('type')->default('PROSES');
                $table->timestamps();
            });
        }

        // 15. Comments
        if (! Schema::hasTable('comments')) {
            Schema::create('comments', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->nullable();
                $table->text('body')->nullable();
                $table->string('status')->default('PENDING');
                $table->unsignedBigInteger('article_id')->nullable();
                $table->timestamps();
            });
        }

        // 16. Reports
        if (! Schema::hasTable('reports')) {
            Schema::create('reports', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('article_id')->nullable();
                $table->unsignedBigInteger('user_id')->nullable();
                $table->string('reason')->nullable();
                $table->string('status')->default('PENDING');
                $table->timestamps();
            });
        }

        // 17. Visitors
        if (! Schema::hasTable('visitors')) {
            Schema::create('visitors', function (Blueprint $table) {
                $table->id();
                $table->date('date')->nullable();
                $table->string('amount')->default('0');
                $table->string('type')->default('ONLINE');
                $table->timestamps();
            });
        }

        // 18. Offline Visitors
        if (! Schema::hasTable('offline_visitors')) {
            Schema::create('offline_visitors', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('sex')->nullable();
                $table->string('email')->nullable();
                $table->string('phone')->nullable();
                $table->string('subscribe')->nullable();
                $table->string('age')->nullable();
                $table->string('wisatawan')->nullable();
                $table->string('instansi')->nullable();
                $table->string('jumlah')->nullable();
                $table->string('photo')->nullable();
                $table->timestamps();
            });
        }

        // 19. Surveys
        if (! Schema::hasTable('surveys')) {
            Schema::create('surveys', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('guest_book_id')->nullable();
                $table->string('name')->nullable();
                $table->string('phone')->nullable();
                $table->integer('pameran')->default(5);
                $table->integer('pemandu')->default(5);
                $table->integer('museum')->default(5);
                $table->text('saran')->nullable();
                $table->timestamps();
            });
        }

        // 20. Offline Surveys
        if (! Schema::hasTable('offline_surveys')) {
            Schema::create('offline_surveys', function (Blueprint $table) {
                $table->unsignedBigInteger('guest_id')->primary();
                $table->string('pameran')->nullable();
                $table->string('pemandu')->nullable();
                $table->string('museum')->nullable();
                $table->string('saran')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offline_surveys');
        Schema::dropIfExists('surveys');
        Schema::dropIfExists('offline_visitors');
        Schema::dropIfExists('visitors');
        Schema::dropIfExists('reports');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('complaints');
        Schema::dropIfExists('guest_books');
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('tv_links');
        Schema::dropIfExists('galleries');
        Schema::dropIfExists('teams');
        Schema::dropIfExists('partners');
        Schema::dropIfExists('events');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('collections');
        Schema::dropIfExists('collection_categories');
        Schema::dropIfExists('cms_tags');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('cms_categories');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('settings');
    }
};
