Add-Type -AssemblyName System.Drawing

$img = [System.Drawing.Image]::FromFile('C:\Users\LENOVO\Projects\muspenweb\canva_all_pages\page_0006_large.png')
# Let's inspect column 1 image coordinates
# We can find the border of the card
Write-Host "Width: $($img.Width), Height: $($img.Height)"
$img.Dispose()

