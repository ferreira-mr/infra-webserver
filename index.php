<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diretórios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Efeito de hover no card */
        .card:hover {
            background-color: #1a73e8; /* Cor azul escuro no hover */
            transform: scale(1.05); /* Leve aumento do tamanho no hover */
            transition: transform 0.2s ease, background-color 0.2s ease;
        }
    </style>
</head>
<body class="bg-dark text-light">
    <div class="container my-5">
        <h1 class="text-center mb-4">Diretórios</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
                $directory = '/var/www/html';
                $files = scandir($directory);

                foreach ($files as $file) {
                    if ($file !== '.' && $file !== '..' && is_dir($directory . '/' . $file)) {
                        echo "
                        <div class='col'>
                            <div class='card h-100 bg-secondary text-white'>
                                <div class='card-body text-center'>
                                    <h5 class='card-title'>
                                        <a href='/$file/' class='text-white text-decoration-none'>$file</a>
                                    </h5>
                                </div>
                            </div>
                        </div>";
                    }
                }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
