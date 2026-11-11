Add-Type -AssemblyName System.Drawing
$img = [System.Drawing.Image]::FromFile('scratch\live_screenshots\agenda_acara_verified.png')
Write-Host "Height: $($img.Height)"

# Let's crop from Y = 1350 to 2150
$cropBmp = New-Object System.Drawing.Bitmap($img.Width, 650)
$g = [System.Drawing.Graphics]::FromImage($cropBmp)
$srcRect = New-Object System.Drawing.Rectangle(0, 1600, $img.Width, 650)
$destRect = New-Object System.Drawing.Rectangle(0, 0, $img.Width, 650)
$g.DrawImage($img, $destRect, $srcRect, [System.Drawing.GraphicsUnit]::Pixel)
$cropBmp.Save('scratch\live_screenshots\agenda_real_cropped.png', [System.Drawing.Imaging.ImageFormat]::Png)
$g.Dispose()
$cropBmp.Dispose()
$img.Dispose()
Write-Host "Cropped agenda real successfully."
