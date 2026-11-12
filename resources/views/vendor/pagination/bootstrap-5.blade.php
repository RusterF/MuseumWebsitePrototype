@if ($paginator->hasPages())
    <nav class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 w-100 py-3 my-4 border-top border-bottom" style="border-color: #E2E8F0 !important;" role="navigation" aria-label="Navigasi Halaman">
        {{-- Results Counter (Clean Indonesian format) --}}
        <div class="text-secondary small text-center text-md-start">
            @if ($paginator->total() > 0)
                Menampilkan <span class="fw-bold text-dark">{{ $paginator->firstItem() }}</span> &ndash; <span class="fw-bold text-dark">{{ $paginator->lastItem() }}</span> dari total <span class="fw-bold text-dark">{{ $paginator->total() }}</span> hasil
            @else
                Menampilkan <span class="fw-bold text-dark">0</span> hasil
            @endif
        </div>

        {{-- Pagination Buttons --}}
        <div>
            <ul class="pagination pagination-canva mb-0 gap-1 flex-wrap justify-content-center">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="Sebelumnya">
                        <span class="page-link" aria-hidden="true"><i class="fa-solid fa-chevron-left small"></i></span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Sebelumnya">
                            <i class="fa-solid fa-chevron-left small"></i>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">&hellip;</span>
                        </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link">{{ $page }}</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Berikutnya">
                            <i class="fa-solid fa-chevron-right small"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="Berikutnya">
                        <span class="page-link" aria-hidden="true"><i class="fa-solid fa-chevron-right small"></i></span>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
@endif

