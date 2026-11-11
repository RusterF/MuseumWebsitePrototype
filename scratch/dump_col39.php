<?php

use App\Models\Collection;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$col39 = Collection::find(39);
if ($col39) {
    echo "ID: {$col39->id}\n";
    echo "Title: {$col39->title}\n";
    echo "Attributes:\n";
    print_r($col39->toArray());
}
