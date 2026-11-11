Add-Type -AssemblyName System.Drawing

$img = New-Object System.Drawing.Bitmap('C:\Users\LENOVO\Projects\muspen-canva\scratch\canva_crops\p6_measure_row1.png')
Write-Host "Crop size: $($img.Width) x $($img.Height)"
for ($y = 0; $y -lt $img.Height; $y += 10) {
    for ($x = 0; $x -lt $img.Width; $x += 50) {
        $c = $img.GetPixel($x, $y)
        if ($c.R -lt 240) {
            # found non-white
            Write-Host "Non-white at x=$x, y=$y (R=$($c.R), G=$($c.G), B=$($c.B))"
            break
        }
    }
}
$img.Dispose()

