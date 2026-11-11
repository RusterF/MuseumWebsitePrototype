<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Report;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request): View
    {
        $categories = Category::withCount('articles')->get();

        $query = Article::with('category')
            ->where(function ($q) {
                $q->where('approval_status', 'Y')->orWhereNull('approval_status');
            })
            ->where('slug', '!=', 'dari-ruang-pamer-ke-layar-ponsel-begini-cara-museum-bercerita-di-era-digital');

        if ($request->filled('category')) {
            $catSlug = $request->input('category');
            $query->whereHas('category', function ($q) use ($catSlug) {
                $q->where('slug', $catSlug);
            });
        }

        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $articles = $query->orderBy('date', 'desc')->paginate(8)->withQueryString();

        return view('frontend.articles.index', compact('articles', 'categories'));
    }

    public function show(string $slug): View
    {
        $article = Article::with(['category', 'approvedComments'])
            ->where('slug', $slug)
            ->firstOrFail();

        if ($slug === 'dari-ruang-pamer-ke-layar-ponsel-begini-cara-museum-bercerita-di-era-digital') {
            $relatedSlugs = [
                'ribuan-rakyat-memenuhi-lapangan-ikada-apa-yang-terjadi-pada-19-september-1945',
                'bukan-sekadar-kunjungan-ada-cerita-gunawan-pangur-di-baliknya',
                'museum-penerangan-dan-langkah-baru-untuk-tumbuh-bersama',
            ];
            $relatedArticles = Article::with('category')
                ->whereIn('slug', $relatedSlugs)
                ->get()
                ->sortBy(function ($item) use ($relatedSlugs) {
                    return array_search($item->slug, $relatedSlugs);
                })
                ->values();
        } else {
            $relatedArticles = Article::with('category')
                ->where('id', '!=', $article->id)
                ->where('slug', '!=', 'dari-ruang-pamer-ke-layar-ponsel-begini-cara-museum-bercerita-di-era-digital')
                ->orderBy('date', 'desc')
                ->limit(3)
                ->get();
        }

        return view('frontend.articles.show', compact('article', 'relatedArticles'));
    }

    public function storeComment(Request $request, string $slug): RedirectResponse
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'body' => 'required|string|min:4|max:1000',
            'captcha' => 'required|captcha',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'body.required' => 'Pesan komentar tidak boleh kosong.',
            'body.min' => 'Komentar minimal 4 karakter.',
            'captcha.required' => 'Kode keamanan Captcha wajib diisi.',
            'captcha.captcha' => 'Kode Captcha yang Anda masukkan salah. Silakan coba lagi.',
        ]);

        Comment::create([
            'article_id' => $article->id,
            'name' => strip_tags($request->input('name')),
            'email' => filter_var($request->input('email'), FILTER_SANITIZE_EMAIL),
            'body' => strip_tags($request->input('body')),
            'status' => 'PENDING',
        ]);

        return redirect()->route('forum.show', $slug)
            ->with('success', 'Terima kasih! Komentar Anda berhasil dikirim dan akan tampil setelah diverifikasi oleh moderator.');
    }

    public function storeReport(Request $request, int $id): RedirectResponse
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'reason' => 'required|string|min:5|max:255',
            'captcha' => 'required|captcha',
        ], [
            'reason.required' => 'Alasan pelaporan wajib diisi.',
            'captcha.required' => 'Kode Captcha wajib diisi.',
            'captcha.captcha' => 'Kode Captcha salah.',
        ]);

        Report::create([
            'article_id' => $article->id,
            'reason' => strip_tags($request->input('reason')),
            'status' => 'PENDING',
        ]);

        return redirect()->back()
            ->with('success', 'Laporan Anda telah diterima oleh tim pengawas Museum Penerangan. Terima kasih atas partisipasi Anda.');
    }
}
