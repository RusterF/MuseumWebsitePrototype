$edge = "C:\Program Files (x86)\Microsoft\Edge\Application\msedge.exe"
if (!(Test-Path $edge)) {
    $edge = "C:\Program Files\Microsoft\Edge\Application\msedge.exe"
}
$outDir = "C:\Users\LENOVO\Projects\muspen-canva\scratch\live_screenshots"

function Capture-Url($url, $pngName, $w, $h) {
    $outFile = Join-Path $outDir $pngName
    $args = @(
        "--headless",
        "--disable-gpu",
        "--hide-scrollbars",
        "--window-size=$w,$h",
        "--screenshot=$outFile",
        $url
    )
    Start-Process -FilePath $edge -ArgumentList $args -Wait
    Write-Host "Captured $pngName from $url"
}

Capture-Url "http://127.0.0.1:8000/tentang-kami" "justified_about.png" 1200 1500
Capture-Url "http://127.0.0.1:8000/collections?category=sejarah-radio" "justified_radio_desc.png" 1200 1350
Capture-Url "http://127.0.0.1:8000/publikasi/dari-ruang-pamer-ke-layar-ponsel-begini-cara-museum-bercerita-di-era-digital" "justified_article.png" 1200 1500
Capture-Url "http://127.0.0.1:8000/layanan/peminjaman" "justified_peminjaman.png" 1200 1200
Capture-Url "http://127.0.0.1:8000/layanan/pengaduan/span-lapor" "justified_span_lapor.png" 1200 1100

Write-Host "All justified verification captures done."
