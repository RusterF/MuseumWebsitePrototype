Add-Type -AssemblyName System.Drawing

$img = [System.Drawing.Image]::FromFile('C:\Users\LENOVO\Projects\muspen-canva\public\WebMuspenBaruImages\SPANLapor.png')
Write-Host "SPANLapor size: $($img.Width) x $($img.Height)"
$img.Dispose()

