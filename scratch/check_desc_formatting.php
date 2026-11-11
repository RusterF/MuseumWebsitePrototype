<?php

use App\Models\Collection;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$col = Collection::where('slug', 'kamera-foto-dan-flash-kamera-jurnalis-antara')->first();
$desc = $col->description;
echo "ORIGINAL:\n".$desc."\n\n";

// If someone pasted lines from a PDF or fixed-width text, each line became <p>...</p>
// Replace </p>\s*<p> with a space if it's not preceded by a period, question mark, or colon
$normalized = preg_replace('/(?<!\.)<\/p>\s*<p>/i', ' ', $desc);
// Or general continuous paragraphs
$unified = preg_replace('/<\/p>\s*<p>/i', ' ', $desc);
echo "UNIFIED:\n".$unified."\n";
