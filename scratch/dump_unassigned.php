<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Collection;
use Illuminate\Contracts\Console\Kernel;

$nullCols = Collection::whereNull('collection_category_id')->get(['id', 'title']);
echo 'Found '.$nullCols->count()." unassigned collections:\n";
foreach ($nullCols as $c) {
    echo "ID: {$c->id} | {$c->title}\n";
}
