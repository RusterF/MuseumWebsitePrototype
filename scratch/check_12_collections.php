<?php

use App\Models\Collection;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$ids = [39, 44, 55, 81, 138, 56, 67, 123, 18, 147, 146, 57];
$items = Collection::whereIn('id', $ids)->get()->keyBy('id');

$order = [1 => 39, 2 => 44, 3 => 55, 4 => 81, 5 => 138, 6 => 56, 7 => 67, 8 => 123, 9 => 18, 10 => 147, 11 => 146, 12 => 57];

foreach ($order as $index => $id) {
    if (isset($items[$id])) {
        $c = $items[$id];
        echo "[$index] ID: {$c->id} | CatID: {$c->collection_category_id} | Slug: {$c->slug}\n    Title: {$c->title}\n    File: {$c->file}\n";
    } else {
        echo "[$index] ID: $id NOT FOUND\n";
    }
}
