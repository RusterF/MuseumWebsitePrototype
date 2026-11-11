$edgePath = "C:\Program Files (x86)\Microsoft\Edge\Application\msedge.exe"
if (!(Test-Path $edgePath)) {
    $edgePath = "C:\Program Files\Microsoft\Edge\Application\msedge.exe"
}

$urls = @{
    "live_publikasi_index.png" = "http://127.0.0.1:8000/publikasi";
    "live_publikasi_detail.png" = "http://127.0.0.1:8000/publikasi/dari-ruang-pamer-ke-layar-ponsel-begini-cara-museum-bercerita-di-era-digital";
    "live_koleksi_category.png" = "http://127.0.0.1:8000/collections?category=sejarah-fotojurnalisme-dan-jurnalisme";
    "live_koleksi_detail.png" = "http://127.0.0.1:8000/collections/kamera-foto-dan-flash-kamera-jurnalis-antara";
}

foreach ($name in $urls.Keys) {
    $url = $urls[$name]
    $outPath = "C:\Users\LENOVO\Projects\muspen-canva\scratch\live_screenshots\$name"
    Write-Host "Capturing $url to $name..."
    & $edgePath --headless --disable-gpu --window-size=1280,1400 --screenshot="$outPath" "$url"
}

Write-Host "All screenshots captured."

