# WP-Baca-Juga
Menampilkan rekomendasi "Baca Juga" setiap 2 paragraf dengan font mengikuti tema.


Silahkan Sesuaikan Sendiri CSS 

// HTML dengan CSS minimal agar mengikuti style tema
            $insert_html = '
            <div class="baca-juga-wrapper" style="margin: 10px 0; padding: 5px 10px; border-left: 4px solid #d32f2f; background: rgba(0,0,0,0.03); clear: both;">
                <div style="color: #d32f2f; opacity: 0.8;">
                    Baca Juga:
                </div>
                <a href="' . $link . '" style="text-decoration: none; color: inherit; display: block; line-height: 1.4;">
                    ' . $title . '
                </a>
            </div>';

tested on Wordpress Versi 6.9.4
