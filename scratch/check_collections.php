<?php

use App\Models\Collection;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$keywords = ['kamera', 'foto', 'jurnalis', 'pers', 'koran', 'mesin tik', 'retnodhoemilah', 'antara', 'adinegoro'];
$cols = Collection::where(function ($q) use ($keywords) {
    foreach ($keywords as $kw) {
        $q->orWhere('title', 'like', "%{$kw}%");
    }
})->get(['id', 'title', 'slug', 'collection_category_id', 'file']);

foreach ($cols as $c) {
    echo "ID: {$c->id} | CatID: {$c->collection_category_id} | Slug: {$c->slug} | Title: {$c->title}\n";
}
