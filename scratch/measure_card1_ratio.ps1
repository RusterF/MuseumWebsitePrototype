Add-Type -AssemblyName System.Drawing
$img = [System.Drawing.Image]::FromFile('scratch\live_screenshots\canva_card1_crop.png')
$bmp = New-Object System.Drawing.Bitmap($img)

# Find exact boundaries of the card in canva_card1_crop.png
# Background outside is navy (R < 30, B > 40)
# Card has image on left and white on right
$whitePixels = @()
for ($y = 0; $y -lt $bmp.Height; $y++) {
    for ($x = 0; $x -lt $bmp.Width; $x++) {
        $c = $bmp.GetPixel($x, $y)
        if ($c.R -gt 240 -and $c.G -gt 240 -and $c.B -gt 240) {
            $whitePixels += [PSCustomObject]@{ X = $x; Y = $y }
        }
    }
}

$whiteLeft = ($whitePixels | Measure-Object -Property X -Minimum).Minimum
$whiteRight = ($whitePixels | Measure-Object -Property X -Maximum).Maximum
$whiteTop = ($whitePixels | Measure-Object -Property Y -Minimum).Minimum
$whiteBottom = ($whitePixels | Measure-Object -Property Y -Maximum).Maximum
$whiteW = $whiteRight - $whiteLeft + 1
$whiteH = $whiteBottom - $whiteTop + 1

Write-Host "White box: Left=$whiteLeft, Right=$whiteRight, Top=$whiteTop, Bottom=$whiteBottom"
Write-Host "White box dimensions: Width=$whiteW, Height=$whiteH (Ratio W/H = $($whiteW / $whiteH))"

# The image is immediately to the left of the white box:
# So image right = whiteLeft - 1
# Let's find image left by looking for non-navy pixels on the same horizontal band
$imageLeft = 0
for ($x = 0; $x -lt $whiteLeft; $x++) {
    $c = $bmp.GetPixel($x, [int]($whiteTop + $whiteH / 2))
    # Navy background has R < 35, G < 50
    if ($c.R -gt 35 -or $c.G -gt 50 -or $c.B -gt 70) {
        $imageLeft = $x
        break
    }
}

$imageW = $whiteLeft - $imageLeft
Write-Host "Image dimensions: Left=$imageLeft, Width=$imageW, Height=$whiteH (Ratio W/H = $($imageW / $whiteH))"
Write-Host "Ratio Image Width to White Box Width: $($imageW) to $($whiteW) = $([math]::Round($imageW / $whiteW, 2))"

$bmp.Dispose()
$img.Dispose()

