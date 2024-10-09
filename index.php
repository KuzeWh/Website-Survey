<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Dampak Teknologi terhadap Lingkungan dan Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #222831;
            color: #EEEEEE;
            font-family: 'Arial', sans-serif;
        }
        .hero {
            background-image: url('https://img.freepik.com/free-vector/gradient-technology-futuristic-background_23-2149122420.jpg?t=st=1728437493~exp=1728441093~hmac=057a0dd5704d3c2ca25bf46b5de379213755feb5ba39a2c9b57d2b596266d069&w=900'); /* Ganti dengan URL gambar hero Anda */
            background-size: cover;
            background-position: center;
            height: 300px;
            margin-bottom: 30px;
            color: #EEEEEE;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .hero h1 {
            background-color: rgba(34, 40, 49, 0.8);
            padding: 20px;
            border-radius: 10px;
        }
        .container {
            max-width: 600px;
            background-color: #393E46;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .btn-primary {
            background-color: #00ADB5;
            border: none;
        }
        .btn-primary:hover {
            background-color: #008D92;
        }
        .form-label {
            color: #EEEEEE;
        }
        .form-control, .form-select {
            background-color: #222831;
            color: #EEEEEE;
            border: 1px solid #00ADB5;
        }
        .form-control:focus, .form-select:focus {
            border-color: #00ADB5;
            box-shadow: none;
        }
    </style>
</head>
<body>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Survey Dampak Teknologi terhadap Lingkungan dan Masyarakat</h1>
    </div>
    
    <br>

    <div class="container">
        <form id="surveyForm" action="submit.php" method="POST">
            
            <!-- Nama -->
            <div class="mb-3">
                <label for="name" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama Anda" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda" required>
            </div>

            <!-- Pertanyaan 1 -->
            <div class="mb-3">
                <label for="q1" class="form-label">1. Apakah menurut Anda perkembangan teknologi berdampak positif atau negatif terhadap lingkungan?</label>
                <select class="form-select" id="q1" name="q1" required>
                    <option value="">Pilih jawaban...</option>
                    <option value="Positif">Positif</option>
                    <option value="Negatif">Negatif</option>
                    <option value="Netral">Netral</option>
                </select>
            </div>

            <!-- Pertanyaan 2 -->
            <div class="mb-3">
                <label for="q2" class="form-label">2. Seberapa besar teknologi memengaruhi gaya hidup Anda sehari-hari?</label>
                <select class="form-select" id="q2" name="q2" required>
                    <option value="">Pilih jawaban...</option>
                    <option value="Sangat Besar">Sangat Besar</option>
                    <option value="Besar">Besar</option>
                    <option value="Kecil">Kecil</option>
                    <option value="Tidak Terlalu Mempengaruhi">Tidak Terlalu Mempengaruhi</option>
                </select>
            </div>

            <!-- Pertanyaan 3 -->
            <div class="mb-3">
                <label for="q3" class="form-label">3. Apakah Anda merasa teknologi berperan dalam masalah lingkungan seperti polusi atau pemanasan global?</label>
                <select class="form-select" id="q3" name="q3" required>
                    <option value="">Pilih jawaban...</option>
                    <option value="Ya, berperan">Ya, berperan</option>
                    <option value="Tidak, tidak berperan">Tidak, tidak berperan</option>
                    <option value="Sebagian berperan">Sebagian berperan</option>
                </select>
            </div>

            <!-- Pertanyaan 4 -->
            <div class="mb-3">
                <label for="q4" class="form-label">4. Menurut Anda, teknologi apa yang paling berpengaruh terhadap lingkungan?</label>
                <input type="text" class="form-control" id="q4" name="q4" placeholder="Misal: Energi Terbarukan, Kendaraan Listrik, dll." required>
            </div>

            <!-- Pertanyaan 5 -->
            <div class="mb-3">
                <label for="q5" class="form-label">5. Apakah menurut Anda teknologi bisa membantu mengatasi masalah lingkungan?</label>
                <select class="form-select" id="q5" name="q5" required>
                    <option value="">Pilih jawaban...</option>
                    <option value="Ya, sangat membantu">Ya, sangat membantu</option>
                    <option value="Ya, tapi terbatas">Ya, tapi terbatas</option>
                    <option value="Tidak, tidak membantu">Tidak, tidak membantu</option>
                </select>
            </div>

            <!-- Pertanyaan 6 -->
            <div class="mb-3">
                <label for="q6" class="form-label">6. Apa dampak teknologi yang Anda rasakan terhadap interaksi sosial di masyarakat?</label>
                <input type="text" class="form-control" id="q6" name="q6" placeholder="Misal: Kurangnya interaksi fisik, Komunikasi lebih mudah, dll." required>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary w-100">Kirim Jawaban</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('surveyForm').addEventListener('submit', function(event) {
            if (!this.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            this.classList.add('was-validated');
        });
    </script>
</body>
</html>
