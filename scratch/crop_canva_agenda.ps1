Add-Type -AssemblyName System.Drawing
$img = [System.Drawing.Image]::FromFile('c:\Users\LENOVO\Projects\muspenweb\canva_all_pages\page_0001_large.png')
Write-Host "Image size: $($img.Width) x $($img.Height)"
# Page 1 height is around 4000+ px. Let's find agenda.
# Let's crop from y = 1400 to 2200
$bmp = New-Object System.Drawing.Bitmap($img.Width, 600)
$g = [System.Drawing.Graphics]::FromImage($bmp)
$srcRect = New-Object System.Drawing.Rectangle(0, 950, $img.Width, 550)
$destRect = New-Object System.Drawing.Rectangle(0, 0, $img.Width, 550)
$g.DrawImage($img, $destRect, $srcRect, [System.Drawing.GraphicsUnit]::Pixel)
$bmp.Save('scratch\live_screenshots\canva_agenda_crop.png', [System.Drawing.Imaging.ImageFormat]::Png)
$g.Dispose()
$bmp.Dispose()
$img.Dispose()
Write-Host 'Cropped Canva agenda successfully'
