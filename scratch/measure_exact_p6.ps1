Add-Type -AssemblyName System.Drawing

$img = New-Object System.Drawing.Bitmap('C:\Users\LENOVO\Projects\muspen-canva\scratch\canva_crops\p6_measure_row1.png')

$minX = 9999
$maxX = 0
for ($x = 0; $x -lt 300; $x++) {
    $c = $img.GetPixel($x, 50)
    if ($c.R -lt 240) {
        if ($x -lt $minX) { $minX = $x }
        if ($x -gt $maxX) { $maxX = $x }
    }
}
Write-Host "Card 1 Image X: from $minX to $maxX (Width: $($maxX - $minX))"

# Check Y:
$minY = 9999
$maxY = 0
for ($y = 0; $y -lt $img.Height; $y++) {
    $c = $img.GetPixel(100, $y)
    # The image has rich colors, below the image is white background (R>245, G>245, B>245) or text
    if ($y -lt 120 -and ($c.R -lt 240 -or $c.G -lt 240)) {
        if ($y -lt $minY) { $minY = $y }
        if ($y -gt $maxY) { $maxY = $y }
    }
}
Write-Host "Card 1 Image Y: from $minY to $maxY (Height: $($maxY - $minY))"
$img.Dispose()

