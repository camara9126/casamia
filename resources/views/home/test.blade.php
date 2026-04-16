<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Traitour - Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f9f5f0;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

         Header */
        header {
            text-align: center;
            padding: 30px 0;
            background-color: #8b0000;
            color: white;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .restaurant-name {
            font-size: 3.2rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .tagline {
            font-size: 1.3rem;
            font-weight: 300;
            font-style: italic;
            opacity: 0.9;
        }

        /* Menu Header */
        .menu-header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 2px dashed #8b0000;
        }

        .menu-title {
            font-size: 2.8rem;
            color: #8b0000;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .menu-subtitle {
            font-size: 1.2rem;
            color: #666;
            font-style: italic;
        }

        /* Menu Grid - Version Desktop */
        .menu-categories {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-bottom: 50px;
        }

        .category-card {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            height: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
        }

        .category-image {
            height: 250px;
            width: 100%;
            background-size: cover;
            background-position: center;
            position: relative;
            flex-shrink: 0;
        }

        .category-name {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: #ff9d1b;
            color: white;
            padding: 20px;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
            font-weight: 50;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 30px 0;
            margin-top: 40px;
            border-radius: 20px 20px 0 0;
        }

        .footer-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .contact-info {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin-bottom: 20px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.1rem;
        }

        .contact-item i {
            color: #8b0000;
            font-size: 1.3rem;
        }

        .copyright {
            font-size: 0.9rem;
            opacity: 0.8;
            margin-top: 10px;
        }

        /* Responsive Design - Version Mobile */
        @media (max-width: 768px) {
            .restaurant-name {
                font-size: 2.5rem;
            }

            .menu-title {
                font-size: 2.2rem;
            }

            /* Menu en 3 colonnes pour mobile */
            .menu-categories {
                grid-template-columns: repeat(3, 1fr);
                gap: 15px;
            }

            .category-card {
                height: auto;
                min-height: 150px;
            }

            .category-image {
                height: 150px;
            }

            .category-name {
                font-size: 1.3rem;
                padding: 12px;
            }

            .contact-info {
                flex-direction: column;
                gap: 15px;
            }
        }

        /* Pour les très petits écrans mobiles */
        @media (max-width: 480px) {
            .restaurant-name {
                font-size: 2rem;
            }

            .menu-title {
                font-size: 1.8rem;
            }

            .menu-categories {
                grid-template-columns: repeat(3, 1fr);
                gap: 10px;
            }

            .category-card {
                min-height: 120px;
            }

            .category-image {
                height: 120px;
            }

            .category-name {
                font-size: 1rem;
                padding: 10px;
            }
        }

        /* Pour les écrans horizontaux mobiles (paysage) */
        @media (max-width: 768px) and (orientation: landscape) {
            .menu-categories {
                grid-template-columns: repeat(3, 1fr);
                gap: 15px;
            }

            .category-card {
                min-height: 180px;
            }

            .category-image {
                height: 180px;
            }
        }

        /* Version Desktop - 2 colonnes pour tablettes */
        @media (min-width: 769px) and (max-width: 1024px) {
            .menu-categories {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1 class="restaurant-name">Restaurant Traitour</h1>
            <p class="tagline">Découvrez les saveurs authentiques depuis 1995</p>
        </div>
    </header>

    <main class="container">
        <div class="menu-header">
            <h2 class="menu-title">Food Menu</h2>
            <p class="menu-subtitle">Nos articles</p>
        </div>

        <div class="menu-categories">
            <!-- Burger -->
             @foreach($menus as $menu)
            <div class="category-card">
                <div class="category-image" style="background-image: url('{{asset('storage/'.$menu->image)}}');">
                    <div class="category-name">{{$menu->nom}}</div>
                </div>
            </div>
            @endforeach

            <!-- Crêpe -->
            <div class="category-card">
                <div class="category-image" style="background-image: url('https://images.unsplash.com/photo-1568625365131-079e026a927d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80');">
                    <div class="category-name">Crêpe</div>
                </div>
            </div>

            <!-- Fataya -->
            <div class="category-card">
                <div class="category-image" style="background-image: url('https://images.unsplash.com/photo-1607532941433-304659e8198a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80');">
                    <div class="category-name">Fataya</div>
                </div>
            </div>

            <!-- Jus -->
            <div class="category-card">
                <div class="category-image" style="background-image: url('https://images.unsplash.com/photo-1621506289937-a8e4df240d0b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80');">
                    <div class="category-name">Jus</div>
                </div>
            </div>

            <!-- Pizza -->
            <div class="category-card">
                <div class="category-image" style="background-image: url('https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80');">
                    <div class="category-name">Pizza</div>
                </div>
            </div>

            <!-- Poutine -->
            <div class="category-card">
                <div class="category-image" style="background-image: url('https://images.unsplash.com/photo-1572802419224-296b0aeee0d9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80');">
                    <div class="category-name">Poutine</div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <h3>Restaurant Traitour</h3>
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>123 Rue de la Gastronomie, Paris</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span>01 23 45 67 89</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>contact@traitour-restaurant.fr</span>
                    </div>
                </div>
                <div class="opening-hours">
                    <p><strong>Horaires d'ouverture:</strong> Lundi à Dimanche, 11h00 - 23h00</p>
                </div>
                <p class="copyright">© 2023 Restaurant Traitour. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

  
</body>
</html>

