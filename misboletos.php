<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Boletos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php
    include('fragmentos.php');
    echo $navbar;
    ?>
    <main>
        <div class="dashboard-container">
            <?php
            include('fragmentos.php');
            echo $sidebar;
            ?>
            <div class="container mt-4">
                <h1 class="text-center">Ejemplo de Boletos Adquiridos</h1>
                <p class="text-center text-muted">
                    Estos boletos son un ejemplo y no representan datos reales.
                </p>
                <div class="row">
                    <?php
                    // Simulación de boletos adquiridos (ejemplo estático)
                    $boletos = [
                        [
                            'codigo_boleto' => 'BOL123456',
                            'nombre_tour' => 'Tour a la Selva',
                            'fecha_tour' => '2023-12-15',
                            'fecha_adquirido' => '2023-11-20 14:30'
                        ],
                        [
                            'codigo_boleto' => 'BOL789012',
                            'nombre_tour' => 'Aventura en el Río',
                            'fecha_tour' => '2024-01-10',
                            'fecha_adquirido' => '2023-11-25 10:45'
                        ],
                        [
                            'codigo_boleto' => 'BOL345678',
                            'nombre_tour' => 'Excursión Montañosa',
                            'fecha_tour' => '2024-02-05',
                            'fecha_adquirido' => '2023-11-30 16:00'
                        ]
                    ];

                    if (!empty($boletos)):
                        foreach ($boletos as $boleto): ?>
                            <div class="col-md-4">
                                <div class="card mb-3 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">Tour: <?php echo $boleto['nombre_tour']; ?></h5>
                                        <p class="card-text"><strong>Código de Boleto:</strong> <?php echo $boleto['codigo_boleto']; ?></p>
                                        <p class="card-text"><strong>Fecha del Tour:</strong> <?php echo date("d-m-Y", strtotime($boleto['fecha_tour'])); ?></p>
                                        <p class="card-text"><strong>Adquirido:</strong> <?php echo date("d-m-Y H:i", strtotime($boleto['fecha_adquirido'])); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;
                    else: ?>
                        <div class="alert alert-info" role="alert">
                            No tienes boletos adquiridos todavía. ¡Explora nuestros tours y adquiere el tuyo!
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
    <?php 
    include("fragmentos.php");
    echo $footer;
    ?>
</body>
</html>