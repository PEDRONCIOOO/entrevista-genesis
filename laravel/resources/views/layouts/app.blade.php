<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD CONTROL TRIP</title>
    <style>
      
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        
        body {
            background: #111111; 
            color: #fff;      
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }

        
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center; 
            align-items: center;
            text-align: center;      
            flex: 1;                
            max-width: 900px;
            margin: 0 auto;
            padding: 2rem;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        p {
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        .nav-links {
            list-style: none;
            margin-top: 1.5rem;
            display: flex;
            gap: 1.5rem; /* espaço entre itens */
            flex-wrap: wrap; /* para quebrar linha caso a tela fique pequena */
            justify-content: center;
        }

        .nav-links a {
            text-decoration: none;
            color: #fff; /* links brancos */
            background: #444; 
            padding: 0.75rem 1.25rem;
            border-radius: 0.5rem;
            transition: background 0.3s ease;
        }

        .nav-links a:hover {
            background: #666; 
        }

        /* Responsividade simples */
        @media (max-width: 600px) {
            h1 {
                font-size: 2rem;
            }
            .nav-links {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
