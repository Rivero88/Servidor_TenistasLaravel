<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación de tenistas, torneos y titulos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 500px;
            margin: 0;
        }
        h1 {
            margin-bottom: 30px;
        }
        .container {
            display: flex;
            gap: 20px; /* Espacio entre tarjetas */
        }
        .card {
            width: 200px; /* Ancho tarjeta */
            height: 150px; /* Altura tarjeta */
            display: flex;
            flex-direction: column; /* Las card salen en columnas */
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 10px; /* Padding interno */
        }

        .tenistas {
            background-color:rgb(105, 163, 107);
        }
        .torneos {
            background-color:rgb(104, 160, 206);
        }
        .titulos {
            background-color:rgb(224, 170, 88);
        }
        .superficies {
            background-color:rgb(228, 117, 109);
        }

        .button {
            padding: 5px 10px; /* Ajuste en el padding del botón */
            background-color: white;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
            margin-top: 10px; /* Espacio entre texto y botón */
        }
        .button:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h1>Aplicación de tenistas, torneos y títulos</h1>
    <div class="container">
        <div class="card tenistas">
            <h2>Tenistas</h2>
            <p>Administra los tenistas.</p>
            <a href="{{ route('components.index_Tenistas') }}" class="button">Listado de tenistas</a>
        </div>
        <div class="card torneos">
            <h2>Torneos</h2>
            <p>Administra los torneos.</p>
            <a href="{{ route('components.index_Torneos') }}" class="button">Listado de torneos</a>
        </div>
        <div class="card titulos">
            <h2>Títulos</h2>
            <p>Administra los titulos.</p>
            <a href="{{ route('components.index_Titulos') }}" class="button">Listado de títulos</a>
        </div>
        <div class="card superficies">
            <h2>Superficies</h2>
            <p>Administra las superficies.</p>
            <a href="{{ route('components.index_Superficies') }}" class="button">Listado de superficies</a>
        </div>
    </div>
</body>
</html>
