Add-Type -AssemblyName System.Drawing

$img = [System.Drawing.Image]::FromFile('C:\Users\LENOVO\Projects\muspen-canva\scratch\live_screenshots\shot_detail_full.png')
$bmp = New-Object System.Drawing.Bitmap(1200, 600)
$g = [System.Drawing.Graphics]::FromImage($bmp)
$g.DrawImage($img, [System.Drawing.Rectangle]::new(0, 0, 1200, 600), [System.Drawing.Rectangle]::new(0, 1900, 1200, 600), [System.Drawing.GraphicsUnit]::Pixel)
$bmp.Save('C:\Users\LENOVO\Projects\muspen-canva\scratch\live_screenshots\shot_detail_footer.png')
$bmp.Dispose()
$g.Dispose()
$img.Dispose()
Write-Host "Footer cropped"

