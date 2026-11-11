Add-Type -AssemblyName System.Drawing

function Crop-Image($srcPath, $dstPath, $x, $y, $w, $h) {
    $img = [System.Drawing.Image]::FromFile($srcPath)
    $bmp = New-Object System.Drawing.Bitmap($w, $h)
    $g = [System.Drawing.Graphics]::FromImage($bmp)
    $g.DrawImage($img, [System.Drawing.Rectangle]::new(0, 0, $w, $h), [System.Drawing.Rectangle]::new($x, $y, $w, $h), [System.Drawing.GraphicsUnit]::Pixel)
    $bmp.Save($dstPath)
    $bmp.Dispose()
    $g.Dispose()
    $img.Dispose()
}

# Crop Page 4 grid
Crop-Image 'C:\Users\LENOVO\Projects\muspenweb\canva_all_pages\page_0004_large.png' 'C:\Users\LENOVO\Projects\muspen-canva\scratch\canva_crops\p4_full_content.png' 0 90 717 480

# Crop Page 5 full
Crop-Image 'C:\Users\LENOVO\Projects\muspenweb\canva_all_pages\page_0005_large.png' 'C:\Users\LENOVO\Projects\muspen-canva\scratch\canva_crops\p5_full_content.png' 0 90 717 440

# Crop Page 6 full
Crop-Image 'C:\Users\LENOVO\Projects\muspenweb\canva_all_pages\page_0006_large.png' 'C:\Users\LENOVO\Projects\muspen-canva\scratch\canva_crops\p6_full_content.png' 0 90 717 700

# Crop Page 7 top and middle
Crop-Image 'C:\Users\LENOVO\Projects\muspenweb\canva_all_pages\page_0007_large.png' 'C:\Users\LENOVO\Projects\muspen-canva\scratch\canva_crops\p7_sec1.png' 0 90 717 600
Crop-Image 'C:\Users\LENOVO\Projects\muspenweb\canva_all_pages\page_0007_large.png' 'C:\Users\LENOVO\Projects\muspen-canva\scratch\canva_crops\p7_sec2.png' 0 690 717 600
Crop-Image 'C:\Users\LENOVO\Projects\muspenweb\canva_all_pages\page_0007_large.png' 'C:\Users\LENOVO\Projects\muspen-canva\scratch\canva_crops\p7_sec3.png' 0 1290 717 450

Write-Host "Crops saved successfully"

