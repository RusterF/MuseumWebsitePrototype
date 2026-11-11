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

Crop-Box 'C:\Users\LENOVO\Projects\muspen-canva\public\WebMuspenBaruImages\KoleksiBannerUnyil.png' 'C:\Users\LENOVO\Projects\muspen-canva\scratch\canva_crops\unyil_full_view.png' 0 0 1123 843

Write-Host "Saved unyil full view"

