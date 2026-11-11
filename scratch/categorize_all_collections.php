<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\Collection;
use App\Models\CollectionCategory;
use Illuminate\Contracts\Console\Kernel;

// Cat 1: Sejarah Perfilman
$filmIds = [
    28, 33, 35, 36, 37, 38, 59, 68, 92, 98, 114, 118, 122, 136, 140,
    144, 156, 157, 158, 159, 160, 161, 163, 179, 180, 188,
];

// Cat 2: Sejarah Departemen Penerangan dan Komunikasi Tradisional
$deppenIds = [
    13, 15, 26, 27, 31, 40, 42, 43, 46, 47, 49, 51, 52, 53, 54, 61, 62, 63, 64, 65,
    78, 79, 80, 82, 83, 84, 103, 104, 105, 106, 107, 108, 109, 113, 119, 120, 121,
    124, 125, 126, 127, 128, 129, 130, 131, 132, 133, 134, 135, 137, 142, 143, 145,
    148, 149, 150, 151, 154, 175, 176, 177, 178, 182, 184, 189, 192,
];

// Cat 3: Sejarah Percetakan
$cetakIds = [
    60, 69, 70, 72, 73, 74, 75, 76, 77, 85, 86, 87, 88, 89, 90, 91,
    93, 94, 95, 96, 97, 155,
];

// Cat 4: Sejarah Radio
$radioIds = [
    12, 16, 23, 29, 32, 66, 71, 100, 101, 102, 111, 164, 165, 166, 167,
    168, 169, 170, 171, 172, 173, 181, 183, 185, 186, 190, 191,
];

// Cat 5: Sejarah Televisi
$tvIds = [
    14, 19, 20, 30, 34, 41, 45, 48, 50, 58, 99, 110, 112, 115, 116,
    117, 139, 141, 152, 153, 162, 174, 187,
];

$cats = [
    1 => $filmIds,
    2 => $deppenIds,
    3 => $cetakIds,
    4 => $radioIds,
    5 => $tvIds,
];

foreach ($cats as $catId => $ids) {
    $affected = Collection::whereIn('id', $ids)
        ->where('id', '!=', 39) // protect category 6 items
        ->where('id', '!=', 44)
        ->where('id', '!=', 55)
        ->where('id', '!=', 81)
        ->where('id', '!=', 138)
        ->where('id', '!=', 56)
        ->where('id', '!=', 67)
        ->where('id', '!=', 123)
        ->where('id', '!=', 18)
        ->where('id', '!=', 147)
        ->where('id', '!=', 146)
        ->where('id', '!=', 57)
        ->update([
            'collection_category_id' => $catId,
            'status' => 'PUBLISH',
        ]);
    echo "Category $catId updated $affected collections.\n";
}

echo "\nSummary of categories:\n";
foreach (CollectionCategory::all() as $cat) {
    $count = Collection::where('collection_category_id', $cat->id)->count();
    echo "ID: {$cat->id} | {$cat->name} | Count: {$count}\n";
}
