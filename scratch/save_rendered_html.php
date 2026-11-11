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

$collections = Collection::with('category')->where('status', 'PUBLISH')->paginate(12);
$categories = CollectionCategory::withCount('collections')->get();
file_put_contents(__DIR__.'/rendered_collections.html', view('frontend.collections.index', compact('collections', 'categories'))->render());

echo "Saved rendered HTML files.\n";
