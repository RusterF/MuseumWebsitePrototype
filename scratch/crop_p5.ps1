Add-Type -AssemblyName System.Drawing

$img = [System.Drawing.Image]::FromFile('C:\Users\LENOVO\Projects\muspenweb\canva_all_pages\page_0005_large.png')
# Crop top breadcrumb and title
$bmp = New-Object System.Drawing.Bitmap(717, 450)
$g = [System.Drawing.Graphics]::FromImage($bmp)
$g.DrawImage($img, [System.Drawing.Rectangle]::new(0, 0, 717, 450), [System.Drawing.Rectangle]::new(0, 80, 717, 450), [System.Drawing.GraphicsUnit]::Pixel)
$bmp.Save('C:\Users\LENOVO\Projects\muspen-canva\scratch\canva_crops\p5_zoom.png')
$bmp.Dispose()
$g.Dispose()
$img.Dispose()
Write-Host "Page 5 cropped"

