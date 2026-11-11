Add-Type -AssemblyName System.Drawing
$img = [System.Drawing.Image]::FromFile('scratch\live_screenshots\canva_agenda_crop.png')
$bmp = New-Object System.Drawing.Bitmap($img)

# Let's save a crop of Card 1 specifically:
$card1Bmp = New-Object System.Drawing.Bitmap(350, 250)
$g = [System.Drawing.Graphics]::FromImage($card1Bmp)
$srcRect = New-Object System.Drawing.Rectangle(35, 125, 330, 135)
$destRect = New-Object System.Drawing.Rectangle(0, 0, 330, 135)
$g.DrawImage($bmp, $destRect, $srcRect, [System.Drawing.GraphicsUnit]::Pixel)
$card1Bmp.Save('scratch\live_screenshots\canva_card1_crop.png', [System.Drawing.Imaging.ImageFormat]::Png)

$g.Dispose()
$card1Bmp.Dispose()
$bmp.Dispose()
$img.Dispose()
Write-Host "Cropped card 1"

