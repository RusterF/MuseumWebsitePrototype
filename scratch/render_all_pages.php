<?php

use App\Models\Collection;
use App\Models\CollectionCategory;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

file_put_contents(__DIR__.'/rendered_home.html', view('frontend.home')->render());
file_put_contents(__DIR__.'/rendered_about.html', view('frontend.about_us')->render());

// Page 3: Koleksi Categories (no filter)
$collections = Collection::with('category')->where('status', 'PUBLISH')->paginate(12);
$categories = CollectionCategory::withCount('collections')->get();
request()->merge([]);
file_put_contents(__DIR__.'/rendered_collections.html', view('frontend.collections.index', compact('collections', 'categories'))->render());

// Page 4: Category Fotojurnalisme dan Jurnalisme
request()->merge(['category' => 'sejarah-fotojurnalisme-dan-jurnalisme']);
$colQuery = Collection::with('category')->where('collection_category_id', 6)->paginate(12);
file_put_contents(__DIR__.'/rendered_category_fotojurnalisme.html', view('frontend.collections.index', [
    'collections' => $colQuery,
    'categories' => $categories,
])->render());

// Page 5: Detail Kamera Antara
$collection = Collection::with('category')->find(39);
$relatedCollections = collect([]);
file_put_contents(__DIR__.'/rendered_detail_kamera.html', view('frontend.collections.show', compact('collection', 'relatedCollections'))->render());

echo "All 5 views rendered to HTML successfully.\n";
