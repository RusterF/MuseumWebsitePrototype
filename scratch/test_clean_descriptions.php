<?php

use App\Models\Collection;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$cols = Collection::whereNotNull('description')->take(5)->get();
foreach ($cols as $c) {
    echo "=== {$c->title} ===\n";
    $cleaned = preg_replace('/(?<![\.\?!:])<\/p>\s*<p>/i', ' ', $c->description);
    echo strip_tags($cleaned)."\n\n";
}
