Add-Type -AssemblyName System.Drawing

$img = [System.Drawing.Image]::FromFile('C:\Users\LENOVO\Projects\muspen-canva\scratch\live_screenshots\shot_detail_full.png')
# Total height is 2400. Let's crop from 1200 to 2400.
$bmp = New-Object System.Drawing.Bitmap(1200, 1100)
$g = [System.Drawing.Graphics]::FromImage($bmp)
$g.DrawImage($img, [System.Drawing.Rectangle]::new(0, 0, 1200, 1100), [System.Drawing.Rectangle]::new(0, 1300, 1200, 1100), [System.Drawing.GraphicsUnit]::Pixel)
$bmp.Save('C:\Users\LENOVO\Projects\muspen-canva\scratch\live_screenshots\shot_detail_bottom.png')
$bmp.Dispose()
$g.Dispose()
$img.Dispose()
Write-Host "Bottom cropped"
