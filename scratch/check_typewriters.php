<?php

use App\Models\Collection;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$typewriters = Collection::whereIn('id', [79, 80, 81, 82, 83, 84])->get();
foreach ($typewriters as $t) {
    echo "ID: {$t->id} | Title: {$t->title} | File: {$t->file} | Desc: ".substr(strip_tags($t->description), 0, 80)."\n";
}
