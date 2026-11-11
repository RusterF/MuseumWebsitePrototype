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
    Write-Host "Captured $pngName"
}

Capture-Url "http://127.0.0.1:8000/publikasi/dari-ruang-pamer-ke-layar-ponsel-begini-cara-museum-bercerita-di-era-digital" "shot_detail_full.png" 1200 2500

