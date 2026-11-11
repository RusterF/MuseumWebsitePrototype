Add-Type -AssemblyName System.Drawing

$img = [System.Drawing.Image]::FromFile('C:\Users\LENOVO\Projects\muspen-canva\public\WebMuspenBaruImages\KoleksiBannerUnyil.png')
Write-Host "KoleksiBannerUnyil size: $($img.Width) x $($img.Height)"
$img.Dispose()

