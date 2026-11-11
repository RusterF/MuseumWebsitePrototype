<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\CollectionCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index(Request $request): View
    {
        $categories = CollectionCategory::withCount('collections')->get();

        $query = Collection::with('category')->where('status', 'PUBLISH');

        $currentCategory = null;
        if ($request->filled('category')) {
            $categorySlug = $request->input('category');
            $currentCategory = CollectionCategory::where('slug', $categorySlug)->first();
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });

            if ($categorySlug === 'sejarah-fotojurnalisme-dan-jurnalisme') {
                $orderedIds = [39, 44, 55, 81, 138, 56, 67, 123, 18, 147, 146, 57];
                $query->orderByRaw('FIELD(id, '.implode(',', $orderedIds).')');
            }
        }

        if ($request->filled('search')) {
            $keyword = trim($request->input('search'));
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                    ->orWhere('description', 'like', "%{$keyword}%")
                    ->orWhere('registration_number', 'like', "%{$keyword}%")
                    ->orWhere('bahan', 'like', "%{$keyword}%");
            });
        }

        $collections = $query->paginate(12)->withQueryString();

        return view('frontend.collections.index', compact('collections', 'categories', 'currentCategory'));
    }

    public function show(string $slug): View
    {
        $collection = Collection::with('category')
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedCollections = Collection::with('category')
            ->where('collection_category_id', $collection->collection_category_id)
            ->where('id', '!=', $collection->id)
            ->where('status', 'PUBLISH')
            ->limit(4)
            ->get();

        return view('frontend.collections.show', compact('collection', 'relatedCollections'));
    }

    /**
     * Koleksi Perpustakaan / SLiMS Embed (Canva Page 5 & Google Doc #2.2)
     */
    public function library(): View
    {
        return view('frontend.collections.library');
    }
}
