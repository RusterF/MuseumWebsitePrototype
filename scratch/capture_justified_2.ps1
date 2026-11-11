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

Capture-Url "http://127.0.0.1:8000/tentang" "justified_tentang.png" 1200 1600
Capture-Url "http://127.0.0.1:8000/saran-aduan/span-lapor" "justified_span_lapor_exact.png" 1200 1100
Capture-Url "http://127.0.0.1:8000/collections/kamera-foto-dan-flash-kamera-jurnalis-antara" "justified_kamera_detail.png" 1200 1200

Write-Host "Done."

