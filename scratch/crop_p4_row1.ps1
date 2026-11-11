Add-Type -AssemblyName System.Drawing

$img = [System.Drawing.Image]::FromFile('C:\Users\LENOVO\Projects\muspenweb\canva_all_pages\page_0004_large.png')
# Crop row 1 of Page 4
$bmp = New-Object System.Drawing.Bitmap(717, 180)
$g = [System.Drawing.Graphics]::FromImage($bmp)
$g.DrawImage($img, [System.Drawing.Rectangle]::new(0, 0, 717, 180), [System.Drawing.Rectangle]::new(0, 220, 717, 180), [System.Drawing.GraphicsUnit]::Pixel)
$bmp.Save('C:\Users\LENOVO\Projects\muspen-canva\scratch\canva_crops\p4_row1.png')
$bmp.Dispose()
$g.Dispose()
$img.Dispose()
Write-Host "Row 1 saved"

