$edge = "C:\Program Files (x86)\Microsoft\Edge\Application\msedge.exe"
if (!(Test-Path $edge)) {
    $edge = "C:\Program Files\Microsoft\Edge\Application\msedge.exe"
}
$outDir = "C:\Users\LENOVO\Projects\muspen-canva\scratch\live_screenshots"

$outFile = Join-Path $outDir "shot_detail_3400.png"
$args = @(
    "--headless",
    "--disable-gpu",
    "--hide-scrollbars",
    "--window-size=1200,3400",
    "--screenshot=$outFile",
    "http://127.0.0.1:8000/publikasi/dari-ruang-pamer-ke-layar-ponsel-begini-cara-museum-bercerita-di-era-digital"
)
Start-Process -FilePath $edge -ArgumentList $args -Wait

Add-Type -AssemblyName System.Drawing
$img = [System.Drawing.Image]::FromFile($outFile)
$bmp = New-Object System.Drawing.Bitmap(1200, 1000)
$g = [System.Drawing.Graphics]::FromImage($bmp)
$g.DrawImage($img, [System.Drawing.Rectangle]::new(0, 0, 1200, 1000), [System.Drawing.Rectangle]::new(0, 2200, 1200, 1000), [System.Drawing.GraphicsUnit]::Pixel)
$bmp.Save((Join-Path $outDir "shot_detail_related_cards.png"))
$bmp.Dispose()
$g.Dispose()
$img.Dispose()
Write-Host "Done"

