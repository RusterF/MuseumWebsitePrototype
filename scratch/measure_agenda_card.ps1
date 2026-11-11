Add-Type -AssemblyName System.Drawing
$img = [System.Drawing.Image]::FromFile('scratch\live_screenshots\canva_agenda_crop.png')
Write-Host "Canvas size: $($img.Width) x $($img.Height)"

# In Canva page 1 (width 717):
# Where are the agenda cards located horizontally?
# Let's inspect pixel brightness across a horizontal line in the middle of card 1
# Card 1 is top-left
# Let's find the left edge, middle edge (image/white boundary), and right edge of card 1
$bmp = New-Object System.Drawing.Bitmap($img)
# Sample y = 200 (inside top row of cards)
for ($x = 0; $x -lt $bmp.Width; $x += 10) {
    $c = $bmp.GetPixel($x, 200)
    # Write-Host "$x: R=$($c.R), G=$($c.G), B=$($c.B)"
}

# Card 1 bounding box:
# Let's find the white background of the right half
$whitePixels = @()
for ($y = 100; $y -lt 300; $y += 5) {
    for ($x = 0; $x -lt $bmp.Width; $x += 5) {
        $c = $bmp.GetPixel($x, $y)
        if ($c.R -gt 240 -and $c.G -gt 240 -and $c.B -gt 240) {
            $whitePixels += [PSCustomObject]@{ X = $x; Y = $y }
        }
    }
}

$minX = ($whitePixels | Measure-Object -Property X -Minimum).Minimum
$maxX = ($whitePixels | Measure-Object -Property X -Maximum).Maximum
$minY = ($whitePixels | Measure-Object -Property Y -Minimum).Minimum
$maxY = ($whitePixels | Measure-Object -Property Y -Maximum).Maximum
Write-Host "White box range: X = $minX .. $maxX, Y = $minY .. $maxY"

$bmp.Dispose()
$img.Dispose()
