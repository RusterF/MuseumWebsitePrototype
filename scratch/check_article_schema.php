<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Category;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Schema;

echo "=== ARTICLES COLUMNS ===\n";
print_r(Schema::getColumnListing('articles'));

echo "=== CATEGORIES COLUMNS ===\n";
print_r(Schema::getColumnListing('categories'));

echo "=== EXISTING CATEGORIES ===\n";
foreach (Category::all() as $cat) {
    echo "ID: {$cat->id} | Name: {$cat->name} | Slug: {$cat->slug}\n";
}
