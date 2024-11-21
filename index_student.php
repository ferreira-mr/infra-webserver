<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subdiretórios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="text-center mb-4">Subdiretórios do Usuário</h1>
        <div class="card shadow-sm">
            <div class="card-body">
                <ul class="list-group">
                    <?php
                    $baseDir = __DIR__;
                    $entries = array_filter(scandir($baseDir), function($entry) use ($baseDir) {
                        return is_dir("$baseDir/$entry") && !in_array($entry, ['.', '..']);
                    });

                    if (empty($entries)) {
                        echo "<li class='list-group-item text-muted'>Nenhum subdiretório encontrado.</li>";
                    } else {
                        foreach ($entries as $entry) {
                            echo "<li class='list-group-item'>$entry</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
