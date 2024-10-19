<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reservaciones Activas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            position: relative;
        }
        .date {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 12px;
            color: #555;
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 40px auto 10px;
        }
        .header img {
            height: 100px; /* Aumentar el tamaño del logo */
            display: block;
            margin: 0 auto;
        }
        .info {
            margin-top: 5px;
        }
        .info p {
            margin: 2px 0;
        }
        .title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            background-color: white;
            color: black;
        }
        th {
            background-color: #e0f7fa;
            color: #00796b;
            font-size: 14px;
        }
        td {
            font-size: 12px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="date">
        Generado el: {{ date('d/m/Y H:i:s') }}
    </div>
    <div class="header">
        <img src="{{ $logoBase64 }}" alt="Logo GuayNow">
        <div class="info">
            <p class="agency-name">Agencia GüayNow</p>
            <p>Dirección de la Agencia: Avenida Tecnológico 1 A.P. 10 y 128, Villa de Álvarez, 28976 Cdad. de Villa de Álvarez, Col.</p>
            <p>Teléfono: +52 123 456 7890</p>
            <p>Email: paco_0201@hotmail.com</p>
        </div>
    </div>
    <h1 class="title">Reservaciones Activas</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>CLIENTE</th>
                <th>SUCURSAL</th>
                <th>FECHA</th>
                <th>ESTADO</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservaciones as $reservacion)
                <tr>
                    <td>{{ $reservacion->IDReservacion }}</td>
                    <td>{{ optional($reservacion->cliente)->nombre }}</td>
                    <td>{{ $reservacion->sucursal->nombreSucursal }}</td>
                    <td>{{ $reservacion->fechaReservacion }}</td>
                    <td>{{ $reservacion->estado == 1 ? 'ACTIVO' : 'INACTIVO' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">
        Derechos Reservados &copy; {{ date('Y') }} Agencia GüayNow
    </div>
</body>
</html>
