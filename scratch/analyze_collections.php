<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Collection;
use App\Models\CollectionCategory;
use Illuminate\Contracts\Console\Kernel;

echo "=== COLLECTION CATEGORIES & COUNTS ===\n";
foreach (CollectionCategory::all() as $cat) {
    $count = Collection::where('collection_category_id', $cat->id)->count();
    echo "ID: {$cat->id} | Name: {$cat->name} | Slug: {$cat->slug} | Count: {$count}\n";
}

$nullCount = Collection::whereNull('collection_category_id')->count();
echo "Collections with NULL category: {$nullCount}\n";

echo "\n=== SEARCH COLLECTIONS FOR 'RADIO' ===\n";
$radios = Collection::where('title', 'like', '%radio%')
    ->orWhere('description', 'like', '%radio%')
    ->get(['id', 'title', 'slug', 'collection_category_id', 'file']);
echo 'Found '.$radios->count()." radio items:\n";
foreach ($radios as $r) {
    echo "ID: {$r->id} | Cat: {$r->collection_category_id} | Title: {$r->title}\n";
}

echo "\n=== SEARCH COLLECTIONS FOR 'TELEVISI' / 'TV' / 'TVRI' ===\n";
$tvs = Collection::where('title', 'like', '%televisi%')
    ->orWhere('title', 'like', '%tvri%')
    ->orWhere('title', 'like', '%tv%')
    ->get(['id', 'title', 'slug', 'collection_category_id', 'file']);
echo 'Found '.$tvs->count()." TV items:\n";
foreach ($tvs->take(10) as $t) {
    echo "ID: {$t->id} | Cat: {$t->collection_category_id} | Title: {$t->title}\n";
}

echo "\n=== SEARCH COLLECTIONS FOR 'FILM' / 'PERFILMAN' ===\n";
$films = Collection::where('title', 'like', '%film%')->get(['id', 'title', 'slug', 'collection_category_id']);
echo 'Found '.$films->count()." film items:\n";
foreach ($films->take(10) as $f) {
    echo "ID: {$f->id} | Cat: {$f->collection_category_id} | Title: {$f->title}\n";
}

echo "\n=== SEARCH COLLECTIONS FOR 'CETAK' / 'PERCETAKAN' ===\n";
$cetaks = Collection::where('title', 'like', '%cetak%')->get(['id', 'title', 'slug', 'collection_category_id']);
echo 'Found '.$cetaks->count()." percetakan items:\n";
foreach ($cetaks->take(10) as $c) {
    echo "ID: {$c->id} | Cat: {$c->collection_category_id} | Title: {$c->title}\n";
}
