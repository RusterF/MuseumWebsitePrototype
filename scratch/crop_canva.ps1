Add-Type -AssemblyName System.Drawing

$img = [System.Drawing.Image]::FromFile('C:\Users\LENOVO\Projects\muspenweb\canva_all_pages\page_0004_large.png')
Write-Host "Page 4 Size: $($img.Width)x$($img.Height)"

$bmp1 = New-Object System.Drawing.Bitmap(1200, 600)
$g1 = [System.Drawing.Graphics]::FromImage($bmp1)
$g1.DrawImage($img, [System.Drawing.Rectangle]::new(0, 0, 1200, 600), [System.Drawing.Rectangle]::new(50, 400, 1200, 600), [System.Drawing.GraphicsUnit]::Pixel)
$bmp1.Save('C:\Users\LENOVO\Projects\muspen-canva\scratch\canva_crops\p4_grid_cards_zoom.png')
$bmp1.Dispose()
$g1.Dispose()
$img.Dispose()
Write-Host "Done"

