Add-Type -AssemblyName System.Drawing

$outputDir = "c:\Users\LENOVO\Projects\muspen-canva\public\images\canva"
if (!(Test-Path $outputDir)) { New-Item -ItemType Directory -Path $outputDir -Force }

function Crop-Box($pageNum, $destName, $x, $y, $w, $h) {
    $num = "{0:D4}" -f $pageNum
    $srcPath = "c:\Users\LENOVO\Projects\muspenweb\canva_all_pages\page_${num}_large.png"
    if (!(Test-Path $srcPath)) {
        Write-Warning "Source not found: $srcPath"
        return
    }
    $src = [System.Drawing.Bitmap]::FromFile($srcPath)
    
    # Boundary clamps
    if ($x + $w -gt $src.Width) { $w = $src.Width - $x }
    if ($y + $h -gt $src.Height) { $h = $src.Height - $y }
    
    $rect = New-Object System.Drawing.Rectangle($x, $y, $w, $h)
    $dest = New-Object System.Drawing.Bitmap($w, $h)
    $g = [System.Drawing.Graphics]::FromImage($dest)
    $g.InterpolationMode = [System.Drawing.Drawing2D.InterpolationMode]::HighQualityBicubic
    $g.SmoothingMode = [System.Drawing.Drawing2D.SmoothingMode]::HighQuality
    $g.PixelOffsetMode = [System.Drawing.Drawing2D.PixelOffsetMode]::HighQuality
    $g.DrawImage($src, 0, 0, $rect, [System.Drawing.GraphicsUnit]::Pixel)
    $g.Dispose()
    $src.Dispose()
    
    $outPath = Join-Path $outputDir $destName
    $dest.Save($outPath, [System.Drawing.Imaging.ImageFormat]::Png)
    $dest.Dispose()
    Write-Host "Extracted $destName ($w x $h)"
}

Write-Host "=== EXTRACTING CANVA ASSETS ==="

# --- PAGE 2: TENTANG ---
# Sejarah Ikada & Deppen Truck
Crop-Box 2 "sejarah_ikada.png" 40 795 305 155
Crop-Box 2 "sejarah_truk_deppen.png" 380 970 300 175
# Team Leadership (Rizki, Yuliah, Yuri, Vetri)
Crop-Box 2 "team_rizki_andono.png" 290 1260 140 170
Crop-Box 2 "team_yuliah.png" 70 1480 135 165
Crop-Box 2 "team_yuri_arief.png" 290 1480 140 165
Crop-Box 2 "team_vetri_ridha.png" 505 1480 140 165
# Muspen Logo in Visi Misi
Crop-Box 2 "visi_misi_muspen_logo.png" 40 1820 220 90
# Blue Folder in Maklumat Pelayanan
Crop-Box 2 "maklumat_folder_icon.png" 490 1970 180 135
# Komdigi Logo in Induk Asosiasi
Crop-Box 2 "induk_komdigi_logo.png" 40 2190 220 120

# --- PAGE 3: KOLEKSI CATEGORIES ---
Crop-Box 3 "koleksi_cat_deppen.png" 38 335 208 140
Crop-Box 3 "koleksi_cat_radio.png" 254 335 208 140
Crop-Box 3 "koleksi_cat_televisi.png" 470 335 208 140
Crop-Box 3 "koleksi_cat_fotojurnalisme.png" 38 485 208 140
Crop-Box 3 "koleksi_cat_perfilman.png" 254 485 208 140
Crop-Box 3 "koleksi_cat_percetakan.png" 470 485 208 140

# --- PAGE 5: DETAIL KOLEKSI (KAMERA ANTARA) ---
Crop-Box 5 "koleksi_kamera_antara_detail.png" 60 140 330 250

# --- PAGE 7: PUBLIKASI DETAIL ---
Crop-Box 7 "artikel_talkshow_digital.png" 50 160 617 280

# --- PAGE 8: LAYANAN KUNJUNGAN MUSEUM ---
Crop-Box 8 "layanan_kunjungan_hero.png" 40 68 637 258

# --- PAGE 9: LAYANAN VIRTUAL EXPERIENCE ---
Crop-Box 9 "layanan_virtual_hero.png" 40 68 637 258

# --- PAGE 10: LAYANAN PEMINJAMAN ---
# 5 Rooms
Crop-Box 10 "gedung_amphiteater.png" 40 130 195 110
Crop-Box 10 "gedung_plaza.png" 260 130 195 110
Crop-Box 10 "gedung_mini_theater.png" 480 130 195 110
Crop-Box 10 "gedung_ruang_serbaguna.png" 40 315 195 110
Crop-Box 10 "gedung_ruang_rapat.png" 260 315 195 110
# Conservators examining collection
Crop-Box 10 "peminjaman_koleksi_lab.png" 40 515 390 220

# --- PAGE 11: LAYANAN PENELITIAN ILMIAH ---
Crop-Box 11 "layanan_penelitian_hero.png" 40 100 390 220

# --- PAGE 12: LAYANAN PERPUSTAKAAN ---
Crop-Box 12 "perpustakaan_utama.png" 40 105 295 185
Crop-Box 12 "perpustakaan_mini.png" 380 105 295 185

# --- PAGE 13: SURVEI KEPUASAN ---
Crop-Box 13 "survei_kepuasan_hero.png" 40 68 637 258

# --- PAGE 14: RESERVASI (MAP) ---
Crop-Box 14 "reservasi_map_tmii.png" 40 95 637 220

# --- PAGE 15: PENGADUAN ---
Crop-Box 15 "pengaduan_batik_hero.png" 380 105 300 240

# --- PAGE 16: SPAN LAPOR ---
Crop-Box 16 "lapor_logo_resmi.png" 265 145 185 55
Crop-Box 16 "lapor_laptop_mockup.png" 40 270 340 235

Write-Host "=== EXTRACTION FINISHED ==="

