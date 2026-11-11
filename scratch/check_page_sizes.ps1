Add-Type -AssemblyName System.Drawing

for ($i = 1; $i -le 16; $i++) {
    $num = $i.ToString("0000")
    $file = "C:\Users\LENOVO\Projects\muspenweb\canva_all_pages\page_$num" + "_large.png"
    if (Test-Path $file) {
        $img = [System.Drawing.Image]::FromFile($file)
        Write-Host "Page $($i): $($img.Width) x $($img.Height)"
        $img.Dispose()
    }
}
