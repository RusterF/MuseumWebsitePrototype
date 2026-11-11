<?php

use App\Models\Article;
use App\Models\Collection;
use App\Models\CollectionCategory;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

echo "=== ARTICLES ===\n";
$articles = Article::all();
foreach ($articles as $a) {
    echo "ID: {$a->id} | Title: {$a->title} | Slug: {$a->slug} | Category: {$a->category} | Status: {$a->status}\n";
}

echo "\n=== ARTICLE ATTRIBUTES ===\n";
if ($articles->first()) {
    echo json_encode(array_keys($articles->first()->getAttributes()))."\n";
}

echo "\n=== COLLECTIONS (first 10) ===\n";
$collections = Collection::limit(10)->get();
foreach ($collections as $c) {
    echo "ID: {$c->id} | Title: {$c->title} | Slug: {$c->slug} | CategoryID: {$c->collection_category_id}\n";
}

echo "\n=== COLLECTION CATEGORIES ===\n";
$cats = CollectionCategory::all();
foreach ($cats as $cat) {
    echo "ID: {$cat->id} | Name: {$cat->name} | Slug: {$cat->slug}\n";
}
