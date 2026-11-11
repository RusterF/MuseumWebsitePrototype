Add-Type -AssemblyName System.Drawing

# Let's inspect Page 6 card sizes in canva:
$p6 = [System.Drawing.Image]::FromFile('C:\Users\LENOVO\Projects\muspenweb\canva_all_pages\page_0006_large.png')
Write-Host "Page 6 Size: $($p6.Width) x $($p6.Height)"

# Let's inspect Page 4 card sizes in canva:
$p4 = [System.Drawing.Image]::FromFile('C:\Users\LENOVO\Projects\muspenweb\canva_all_pages\page_0004_large.png')
Write-Host "Page 4 Size: $($p4.Width) x $($p4.Height)"

$p3 = [System.Drawing.Image]::FromFile('C:\Users\LENOVO\Projects\muspenweb\canva_all_pages\page_0003_large.png')
Write-Host "Page 3 Size: $($p3.Width) x $($p3.Height)"

