Add-Type -AssemblyName System.Drawing

$img = [System.Drawing.Image]::FromFile('C:\Users\LENOVO\Projects\muspen-canva\public\WebMuspenBaruImages\KoleksiBannerUnyil.png')
# Target aspect ratio: width 1123, height ~350 (ratio ~3.2:1)
$bmp = New-Object System.Drawing.Bitmap(1123, 350)
$g = [System.Drawing.Graphics]::FromImage($bmp)
$g.DrawImage($img, [System.Drawing.Rectangle]::new(0, 0, 1123, 350), [System.Drawing.Rectangle]::new(0, 260, 1123, 350), [System.Drawing.GraphicsUnit]::Pixel)
$bmp.Save('C:\Users\LENOVO\Projects\muspen-canva\public\WebMuspenBaruImages\KoleksiBannerUnyil_canva.png')
$bmp.Save('C:\Users\LENOVO\Projects\muspen-canva\public\images\WebMuspenBaruImages\KoleksiBannerUnyil_canva.png')
$bmp.Dispose()
$g.Dispose()
$img.Dispose()
Write-Host "Cropped Unyil banner saved"

