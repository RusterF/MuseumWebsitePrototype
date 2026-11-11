<?php

use App\Models\Collection;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$cols = Collection::whereNotNull('description')->get();
$fragmentedCount = 0;
foreach ($cols as $c) {
    if (preg_match_all('/<\/p>\s*<p>/i', $c->description) > 3) {
        $fragmentedCount++;
    }
}
echo 'Total collections with descriptions: '.$cols->count()."\n";
echo 'Fragmented count: '.$fragmentedCount."\n";
