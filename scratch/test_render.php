<?php

use App\Models\Collection;
use App\Models\CollectionCategory;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

try {
    echo 'Rendering home: '.strlen(view('frontend.home')->render())." bytes\n";
    echo 'Rendering about: '.strlen(view('frontend.about_us')->render())." bytes\n";
    $collections = Collection::with('category')->where('status', 'PUBLISH')->paginate(12);
    $categories = CollectionCategory::withCount('collections')->get();
    echo 'Rendering collections: '.strlen(view('frontend.collections.index', compact('collections', 'categories'))->render())." bytes\n";
    echo "ALL VIEWS RENDERED SUCCESSFULLY!\n";
} catch (Throwable $e) {
    echo 'ERROR: '.$e->getMessage()."\n".$e->getTraceAsString();
}
