<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Collection;
use Illuminate\Contracts\Console\Kernel;

$radios = Collection::where('collection_category_id', 4)->get();
echo 'Total radio collections: '.$radios->count()."\n";
foreach ($radios->take(10) as $r) {
    $exists = ! empty($r->file) && (file_exists(public_path($r->file)) || file_exists(public_path('storage/'.$r->file)));
    echo "ID: {$r->id} | Title: {$r->title} | File: {$r->file} | Exists: ".($exists ? 'YES' : 'NO')." | URL: {$r->image_url}\n";
}
