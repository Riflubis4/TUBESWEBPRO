<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('CSS/help.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <img src="gambar-removebg-preview.png" alt="Tree" width="60" height="60">
            <a class="navbar-brand">SmartComp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                    <a class="nav-link" href="{{ url('/about') }}">About</a>
                    <a class="nav-link" href="#">Help</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Help Center Section -->
    <section class="content-wrap-help">
        <div class="help-header bg-emphasis text-black p-3">
            <h4 class="mx-20">Pusat Bantuan SmartComp</h4><br>
            <p>Selamat datang di Pusat Bantuan SmartComp! Di sini, kami siap membantu Anda untuk mendapatkan jawaban dan solusi atas pertanyaan atau kendala yang mungkin Anda alami saat menggunakan aplikasi SmartComp.</p>
            <p>SmartComp adalah aplikasi untuk membantu Anda mengakses berbagai layanan dan informasi terkait event, workshop, kompetisi, akademik, dan forum diskusi di dunia IT. Kami bertujuan untuk menyediakan platform yang nyaman dan mudah digunakan untuk meningkatkan pengalaman Anda dalam belajar dan berkolaborasi di dunia teknologi.</p>
        </div>
        <div class="input-group">
          <span class="input-group-text" id="search-icon">
              <i class="bi bi-search"></i>
          </span>
          <input class="form-control" type="search" placeholder="Ketuk untuk mencari" aria-label="Search">
      </div>
        <h6 class="mt-4">Topik populer</h6>
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                  Cara Reschedule Jadwal
                </button>
              </h2>
              <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse">
                <div class="accordion-body">
                  Ingin mengubah jadwal keikutsertaan Anda pada acara atau workshop di SmartComp? Kami memahami bahwa kadang-kadang rencana bisa berubah, dan itulah mengapa kami menyediakan opsi untuk mereschedule. Di topik ini, Anda akan menemukan panduan langkah demi langkah tentang cara memeriksa jadwal yang tersedia dan melakukan perubahan pada waktu yang paling sesuai untuk Anda. Anda juga akan mendapatkan informasi tentang ketentuan reschedule, termasuk apakah ada biaya tambahan yang perlu diperhatikan.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                  Cara Membatalkan dan Refund Pesanan
                </button>
              </h2>
              <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                <div class="accordion-body">
                  Jika Anda perlu membatalkan keikutsertaan pada suatu acara atau workshop, kami menyediakan opsi pembatalan beserta kebijakan pengembalian dana. Topik ini mencakup panduan tentang cara membatalkan pesanan dengan benar dan langkah-langkah untuk mengajukan refund. Anda juga akan mendapatkan informasi mengenai durasi proses pengembalian dana dan syarat-syarat yang perlu dipenuhi, seperti tenggat waktu pembatalan dan ketentuan pengembalian sesuai dengan jenis acara atau layanan yang telah dipesan.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                  Cara Koreksi Nama atau Peserta
                </button>
              </h2>
              <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                <div class="accordion-body">
                  Terkadang, kesalahan dalam penulisan nama bisa terjadi saat mendaftar untuk acara atau workshop. Jangan khawatir, di SmartComp kami menyediakan fitur koreksi nama agar Anda dapat memperbarui informasi dengan mudah. Panduan ini mencakup langkah-langkah untuk mengubah data nama dan informasi lainnya yang mungkin salah input. Anda akan diberi tahu juga tentang batas waktu koreksi data serta dokumen pendukung yang diperlukan untuk mempercepat proses verifikasi.
                </div>
              </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                    Cara Mengatur Notifikasi
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
                  <div class="accordion-body">
                    SmartComp memberikan notifikasi untuk mengingatkan Anda tentang acara yang akan datang, perubahan jadwal, atau informasi penting lainnya. Di panduan ini, Anda akan menemukan cara mengatur preferensi notifikasi sesuai kebutuhan Anda. Apakah Anda ingin menerima semua notifikasi, atau hanya yang berkaitan dengan event yang Anda ikuti? Panduan ini membantu Anda menyesuaikan notifikasi agar Anda tidak ketinggalan informasi penting tanpa merasa terganggu.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                    Panduan Penggunaan Forum Diskusi
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse">
                  <div class="accordion-body">
                    Forum Diskusi di SmartComp adalah tempat yang tepat untuk berbagi ide, bertanya, dan berdiskusi dengan anggota komunitas lainnya. Panduan ini akan membantu Anda memahami cara membuat topik baru, membalas diskusi, dan menggunakan fitur like atau upvote untuk mendukung komentar yang Anda anggap bermanfaat. Anda juga bisa belajar tentang etika penggunaan forum dan bagaimana menjaga komunikasi yang positif dengan sesama pengguna.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
                    Kebijakan Refund SmartComp
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse">
                  <div class="accordion-body">
                    Kebijakan refund kami dirancang untuk memberikan transparansi dan kepastian bagi pengguna. Di topik ini, Anda akan mendapatkan penjelasan lengkap mengenai prosedur pengembalian dana untuk berbagai layanan yang ditawarkan, jenis-jenis refund yang tersedia, dan estimasi waktu pencairan dana. Selain itu, kami menjelaskan juga metode pembayaran yang digunakan untuk refund, serta cara memantau status pengembalian dana Anda melalui aplikasi. Panduan ini memastikan Anda mendapatkan pemahaman penuh tentang hak dan kewajiban Anda terkait kebijakan refund.
                  </div>
                </div>
              </div>
          </div>
    </section>
    <div class="call-center">
      <p>Tidak menemukan jawaban Anda?</p>
      <a href="#">Hubungi Kami</a>
    </div>

    <!-- Footer -->
    <div class="footer">
        <footer> &copy; 2024 SmartComp. All rights reserved.</footer>
    </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>