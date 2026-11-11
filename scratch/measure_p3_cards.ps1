Add-Type -AssemblyName System.Drawing

$img = New-Object System.Drawing.Bitmap('C:\Users\LENOVO\Projects\muspenweb\canva_all_pages\page_0003_large.png')

# The 6 category cards on Page 3
# Let's crop from y=350 to y=750
$bmp = New-Object System.Drawing.Bitmap(717, 400)
$g = [System.Drawing.Graphics]::FromImage($bmp)
$g.DrawImage($img, [System.Drawing.Rectangle]::new(0, 0, 717, 400), [System.Drawing.Rectangle]::new(0, 350, 717, 400), [System.Drawing.GraphicsUnit]::Pixel)
$bmp.Save('C:\Users\LENOVO\Projects\muspen-canva\scratch\canva_crops\p3_categories_measured.png')
$bmp.Dispose()
$g.Dispose()
$img.Dispose()
Write-Host "Page 3 categories crop saved"

