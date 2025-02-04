<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['decimal'])) {
        $decimal = intval($_POST['decimal']);
        $binary = decbin($decimal);
        $octal = decoct($decimal);
        $hexadecimal = strtoupper(dechex($decimal));
    }
    
    if (!empty($_POST['binary'])) {
        $decimalFromBinary = bindec($_POST['binary']);
    }
    
    if (!empty($_POST['octal'])) {
        $decimalFromOctal = octdec($_POST['octal']);
    }
    
    if (!empty($_POST['hexadecimal'])) {
        $decimalFromHexadecimal = hexdec($_POST['hexadecimal']);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Bilangan</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('Gambar/BG.png') no-repeat center center fixed;
            -webkit-background-size: cover;
            font-family: 'Roboto', sans-serif;
            color: #ecf0f1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .converter-container {
            background: rgba(44, 62, 80, 0.85);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
            max-width: 450px;
            width: 100%;
            text-align: center;
        }
        h2 {
            font-weight: 500;
            margin-bottom: 20px;
        }
        .form-control {
            background-color: #34495e;
            color: #ecf0f1;
            border: 1px solid #2c3e50;
        }
        .form-control:focus {
            background-color: #2c3e50;
            border-color: #2980b9;
            box-shadow: 0 0 5px rgba(41, 128, 185, 0.7);
        }
        .btn-primary {
            background-color: #2980b9;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #3498db;
        }
        .alert {
            background-color: #34495e;
            border-color: #2980b9;
        }
        .list-group-item {
            background-color: transparent;
            border: none;
        }
    </style>
</head>
<body>
    <div class="converter-container">
        <h2>Konversi Bilangan</h2>
        <form method="post">
            <div class="mb-3">
                <label for="decimal" class="form-label">Masukkan Bilangan Desimal:</label>
                <input type="number" class="form-control" id="decimal" name="decimal">
            </div>
            <div class="mb-3">
                <label for="binary" class="form-label">Masukkan Bilangan Biner:</label>
                <input type="text" class="form-control" id="binary" name="binary">
            </div>
            <div class="mb-3">
                <label for="octal" class="form-label">Masukkan Bilangan Oktal:</label>
                <input type="text" class="form-control" id="octal" name="octal">
            </div>
            <div class="mb-3">
                <label for="hexadecimal" class="form-label">Masukkan Bilangan Heksadesimal:</label>
                <input type="text" class="form-control" id="hexadecimal" name="hexadecimal">
            </div>
            <button type="submit" class="btn btn-primary">Konversi</button>
        </form>
        
        <?php if (isset($binary)) : ?>
            <div class="mt-4 alert alert-success">
                <strong>Hasil Konversi:</strong>
                <ul class="list-group text-dark">
                    <li class="list-group-item">Desimal: <strong><?= htmlspecialchars($decimal) ?></strong></li>
                    <li class="list-group-item">Biner: <strong><?= htmlspecialchars($binary) ?></strong></li>
                    <li class="list-group-item">Oktal: <strong><?= htmlspecialchars($octal) ?></strong></li>
                    <li class="list-group-item">Heksadesimal: <strong><?= htmlspecialchars($hexadecimal) ?></strong></li>
                </ul>
            </div>
        <?php endif; ?>
        
        <?php if (isset($decimalFromBinary) || isset($decimalFromOctal) || isset($decimalFromHexadecimal)) : ?>
            <div class="mt-4 alert alert-info">
                <strong>Konversi ke Desimal:</strong>
                <ul class="list-group text-dark">
                    <?php if (isset($decimalFromBinary)) : ?>
                        <li class="list-group-item">Dari Biner: <strong><?= htmlspecialchars($decimalFromBinary) ?></strong></li>
                    <?php endif; ?>
                    <?php if (isset($decimalFromOctal)) : ?>
                        <li class="list-group-item">Dari Oktal: <strong><?= htmlspecialchars($decimalFromOctal) ?></strong></li>
                    <?php endif; ?>
                    <?php if (isset($decimalFromHexadecimal)) : ?>
                        <li class="list-group-item">Dari Heksadesimal: <strong><?= htmlspecialchars($decimalFromHexadecimal) ?></strong></li>
                    <?php endif; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
