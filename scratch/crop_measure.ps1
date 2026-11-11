Add-Type -AssemblyName System.Drawing

function Crop-Box($src, $dst, $x, $y, $w, $h) {
    $img = [System.Drawing.Image]::FromFile($src)
    $bmp = New-Object System.Drawing.Bitmap($w, $h)
    $g = [System.Drawing.Graphics]::FromImage($bmp)
    $g.DrawImage($img, [System.Drawing.Rectangle]::new(0, 0, $w, $h), [System.Drawing.Rectangle]::new($x, $y, $w, $h), [System.Drawing.GraphicsUnit]::Pixel)
    $bmp.Save($dst)
    $bmp.Dispose()
    $g.Dispose()
    $img.Dispose()
}

# In Page 6 (width 717, height 930)
# Let's crop from y=120 to y=420 (Row 1)
Crop-Box 'C:\Users\LENOVO\Projects\muspenweb\canva_all_pages\page_0006_large.png' 'C:\Users\LENOVO\Projects\muspen-canva\scratch\canva_crops\p6_measure_row1.png' 50 110 617 240

# In Page 4 (width 717, height 762)
# Let's crop from y=180 to y=520 (Rows 1 & 2)
Crop-Box 'C:\Users\LENOVO\Projects\muspenweb\canva_all_pages\page_0004_large.png' 'C:\Users\LENOVO\Projects\muspen-canva\scratch\canva_crops\p4_measure_grid.png' 50 170 617 380

# In Page 3 (width 717, height 816) - Unyil banner
Crop-Box 'C:\Users\LENOVO\Projects\muspenweb\canva_all_pages\page_0003_large.png' 'C:\Users\LENOVO\Projects\muspen-canva\scratch\canva_crops\p3_unyil_banner.png' 50 100 617 300

Write-Host "Measured crops saved"

