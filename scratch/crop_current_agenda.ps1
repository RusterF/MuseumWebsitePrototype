Add-Type -AssemblyName System.Drawing
$img = [System.Drawing.Image]::FromFile('scratch\live_screenshots\current_home_full.png')
# Find where agenda acara starts in height
$bmp = New-Object System.Drawing.Bitmap(1200, 700)
$g = [System.Drawing.Graphics]::FromImage($bmp)
# Let's crop from y = 1000
$srcRect = New-Object System.Drawing.Rectangle(0, 1000, 1200, 700)
$destRect = New-Object System.Drawing.Rectangle(0, 0, 1200, 700)
$g.DrawImage($img, $destRect, $srcRect, [System.Drawing.GraphicsUnit]::Pixel)
$bmp.Save('scratch\live_screenshots\current_agenda_cropped.png', [System.Drawing.Imaging.ImageFormat]::Png)
$g.Dispose()
$bmp.Dispose()
$img.Dispose()
Write-Host "Cropped current agenda"

