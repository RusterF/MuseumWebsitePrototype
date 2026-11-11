Add-Type -AssemblyName System.Drawing

$img = New-Object System.Drawing.Bitmap('C:\Users\LENOVO\Projects\muspenweb\canva_all_pages\page_0006_large.png')

# Search around x=100 from y=80 to y=300 for non-white pixels
for ($y = 80; $y -le 350; $y += 5) {
    $c = $img.GetPixel(100, $y)
    if ($c.R -lt 240 -or $c.G -lt 240 -or $c.B -lt 240) {
        Write-Host "Pixel at y=$y is not white: R=$($c.R), G=$($c.G), B=$($c.B)"
    }
}
$img.Dispose()

