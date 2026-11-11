Add-Type -AssemblyName System.Drawing
$img = [System.Drawing.Image]::FromFile('scratch\live_screenshots\canva_agenda_crop.png')
$bmp = New-Object System.Drawing.Bitmap($img)

# Let's find the left edge of Card 1 at Y = 200:
# The background is dark navy (R ~ 10, G ~ 28, B ~ 53)
# Card 1 starts when color changes from navy to image
for ($x = 0; $x -lt 250; $x++) {
    $c = $bmp.GetPixel($x, 200)
    if ($c.R -gt 35 -or $c.G -gt 50 -or $c.B -gt 80) {
        Write-Host "Card 1 left edge at X = $x"
        break
    }
}

# Card 1 image ends and white box starts:
for ($x = 150; $x -lt 300; $x++) {
    $c = $bmp.GetPixel($x, 200)
    if ($c.R -gt 245 -and $c.G -gt 245 -and $c.B -gt 245) {
        Write-Host "Card 1 white box starts at X = $x"
        break
    }
}

# Card 1 white box ends:
for ($x = 250; $x -lt 400; $x++) {
    $c = $bmp.GetPixel($x, 200)
    if ($c.R -lt 100 -and $c.G -lt 100) {
        Write-Host "Card 1 white box ends at X = $($x - 1)"
        break
    }
}

# Card 1 top and bottom edge:
for ($y = 50; $y -lt 200; $y++) {
    $c = $bmp.GetPixel(300, $y)
    if ($c.R -gt 245 -and $c.G -gt 245 -and $c.B -gt 245) {
        Write-Host "Card 1 top edge at Y = $y"
        break
    }
}

for ($y = 200; $y -lt 350; $y++) {
    $c = $bmp.GetPixel(300, $y)
    if ($c.R -lt 100 -and $c.G -lt 100) {
        Write-Host "Card 1 bottom edge at Y = $($y - 1)"
        break
    }
}

$bmp.Dispose()
$img.Dispose()

