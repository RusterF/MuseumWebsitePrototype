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

Capture-Url "http://127.0.0.1:8000/collections" "shot_koleksi_index_unyil.png" 1200 1350
Capture-Url "http://127.0.0.1:8000/collections?category=sejarah-radio" "shot_koleksi_radio.png" 1200 1350
Capture-Url "http://127.0.0.1:8000/publikasi" "shot_publikasi_proportional.png" 1200 1450
Capture-Url "http://127.0.0.1:8000/layanan/kunjungan-museum" "shot_layanan_kunjungan_hd.png" 1200 1100
Capture-Url "http://127.0.0.1:8000/layanan/peminjaman" "shot_layanan_peminjaman_hd.png" 1200 1300

Write-Host "All verification pages captured successfully."

