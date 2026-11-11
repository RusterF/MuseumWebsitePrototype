Add-Type -AssemblyName System.Drawing

$img = New-Object System.Drawing.Bitmap('C:\Users\LENOVO\Projects\muspen-canva\scratch\canva_crops\p4_measure_grid.png')

# Find card 1 in Page 4
$minX = 9999
$maxX = 0
for ($x = 0; $x -lt 250; $x++) {
    $c = $img.GetPixel($x, 50)
    if ($c.R -lt 240) {
        if ($x -lt $minX) { $minX = $x }
        if ($x -gt $maxX) { $maxX = $x }
    }
}
Write-Host "Page 4 Card 1 X: from $minX to $maxX (Width: $($maxX - $minX))"

$minY = 9999
$maxY = 0
for ($y = 0; $y -lt 250; $y++) {
    $c = $img.GetPixel(100, $y)
    if ($c.R -lt 240) {
        if ($y -lt $minY) { $minY = $y }
        if ($y -gt $maxY) { $maxY = $y }
    }
}
Write-Host "Page 4 Card 1 Y: from $minY to $maxY (Height: $($maxY - $minY))"
$img.Dispose()

