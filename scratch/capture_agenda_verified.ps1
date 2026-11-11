$edge = "C:\Program Files (x86)\Microsoft\Edge\Application\msedge.exe"
if (!(Test-Path $edge)) {
    $edge = "C:\Program Files\Microsoft\Edge\Application\msedge.exe"
}
$outDir = "C:\Users\LENOVO\Projects\muspen-canva\scratch\live_screenshots"
$outFile = Join-Path $outDir "agenda_acara_verified.png"

$args = @(
    "--headless",
    "--disable-gpu",
    "--hide-scrollbars",
    "--window-size=1200,2600",
    "--screenshot=$outFile",
    "http://127.0.0.1:8000/"
)
Start-Process -FilePath $edge -ArgumentList $args -Wait
Write-Host "Captured full home for agenda verification."

# Crop the Agenda Acara section from Y = 950 to 1700
Add-Type -AssemblyName System.Drawing
$img = [System.Drawing.Image]::FromFile($outFile)
$cropBmp = New-Object System.Drawing.Bitmap($img.Width, 680)
$g = [System.Drawing.Graphics]::FromImage($cropBmp)
$srcRect = New-Object System.Drawing.Rectangle(0, 950, $img.Width, 680)
$destRect = New-Object System.Drawing.Rectangle(0, 0, $img.Width, 680)
$g.DrawImage($img, $destRect, $srcRect, [System.Drawing.GraphicsUnit]::Pixel)
$cropOut = Join-Path $outDir "agenda_section_cropped.png"
$cropBmp.Save($cropOut, [System.Drawing.Imaging.ImageFormat]::Png)
$g.Dispose()
$cropBmp.Dispose()
$img.Dispose()
Write-Host "Cropped agenda section successfully."

