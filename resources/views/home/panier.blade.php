<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Casa Mia Restaurant Sénégalais</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- CSS Personnalisé -->
        <!-- Icon Image -->
    <link rel="shortcut icon" href="{{asset('assets/image/logo.jpeg')}}"/>
    <style>
        /* ===== VARIABLES JAUNE ===== */
        :root {
            --primary-color: #FFC107;
            --primary-dark: #FFA000;
            --primary-light: #FFD54F;
            --secondary-color: #333333;
            --light-color: #FFFDE7;
            --text-color: #333;
            --text-light: #666;
            --border-radius: 8px;
            --box-shadow: 0 5px 15px rgba(255, 193, 7, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            line-height: 1.6;
            background-color: white;
            overflow-x: hidden;
            width: 100%;
            max-width: 100vw;
            padding-top: 70px; /* IMPORTANT: padding pour la navbar fixe */
        }

        /* IMPORTANT: Correction pour le body avec navbar fixe */
        html {
            scroll-padding-top: 70px; /* Pour les ancres avec navbar fixe */
        }

        /* ===== NAVBAR CORRIGÉE POUR ÊTRE FIXE ===== */
       /* ===== NAVBAR CORRIGÉE POUR ÊTRE FIXE ===== */
        .navbar {
            background-color: white !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 0.5rem 0;
            transition: var(--transition);
            height: 70px;
            position: fixed !important; /* FIXE */
            top: 0 !important; /* Positionné en haut */
            left: 0 !important;
            right: 0 !important;
            z-index: 1030 !important;
            width: 100% !important;
        }

        .navbar .container {
            padding-left: 15px;
            padding-right: 15px;
        }

        .navbar-brand img {
            transition: var(--transition);
            height: 40px;
            width: auto;
        }

        .navbar-brand:hover img {
            transform: scale(1.05);
        }

        .brand-name {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--secondary-color);
        }

        .brand-first {
            color: var(--primary-color);
        }

        .nav-link {
            font-weight: 500;
            color: var(--secondary-color) !important;
            margin: 0 0.3rem;
            padding: 0.4rem 0.8rem !important;
            transition: var(--transition);
            border-radius: var(--border-radius);
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary-dark) !important;
            background-color: rgba(255, 193, 7, 0.1);
        }

        .btn-admin {
            background-color: var(--primary-color);
            color: var(--secondary-color) !important;
            border-radius: var(--border-radius);
            padding: 0.4rem 1rem !important;
            font-weight: 600;
            border: none;
        }

        .btn-admin:hover {
            background-color: var(--primary-dark);
            color: white !important;
        }

        /* IMPORTANT: Correction pour le main */
        main {
            padding-top: 0; /* Supprimé car body a déjà le padding */
        }

        /* ===== HERO SECTION ===== */
        .menu-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                        url('https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=1480&q=80');
            background-size: cover;
            background-position: center;
            min-height: 250px;
            margin: 0;
            display: flex;
            align-items: center;
            padding: 2rem 0;
        }

        .hero-content {
            text-align: center;
            color: white;
            padding: 1rem;
            width: 100%;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .hero-title .highlight {
            color: var(--primary-color);
        }

        .hero-subtitle {
            font-size: 1rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        /* ===== SECTION TITRE ===== */
        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
            color: var(--secondary-color);
            text-align: center;
            position: relative;
            padding-bottom: 10px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--primary-color);
            border-radius: 2px;
        }

        .highlight {
            color: var(--primary-color);
        }

        .section-subtitle {
            color: var(--text-light);
            margin-bottom: 1.5rem;
            font-size: 1rem;
            text-align: center;
        }

        /* ===== MENU CONTENT ===== */
        .menu-container {
            padding: 2rem 0;
            background: white;
            min-height: calc(100vh - 70px - 250px);
            width: 100%;
            overflow: hidden;
        }

        /* Section Menu Complet */
        .menu-section {
            background-color: white;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            margin: 1rem auto;
            box-shadow: var(--box-shadow);
            border: 1px solid rgba(255, 193, 7, 0.1);
        }

        .cart-wrapper {
            background-color: #f8f9fa;
            min-height: 100vh;
            padding: 40px 0;
        }

        .product-card {
            background: white;
            border-radius: 12px;
            transition: transform 0.2s;
        }

        .product-card:hover {
            transform: translateY(-2px);
        }

        .quantity-input {
            width: 60px;
            text-align: center;
            border: 1px solid #dee2e6;
            border-radius: 6px;
        }

        .product-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }

        .summary-card {
            background: white;
            border-radius: 12px;
            position: sticky;
            top: 20px;
        }

        .checkout-btn {
            background: linear-gradient(135deg, #FFC107, #FFA000);
            border: none;
            transition: transform 0.2s;
        }

        .checkout-btn:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #FFC107, #FFA000);
        }

        .remove-btn {
            color: #dc2626;
            cursor: pointer;
            transition: all 0.2s;
        }

        .remove-btn:hover {
            color: #991b1b;
        }

        .quantity-btn {
            width: 28px;
            height: 28px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            background: #f3f4f6;
            border: none;
            transition: all 0.2s;
        }

        .quantity-btn:hover {
            background: #e5e7eb;
        }

        .discount-badge {
            background: #dcfce7;
            color: #166534;
            font-size: 0.875rem;
            padding: 4px 8px;
            border-radius: 6px;
        }

        /* ===== FOOTER RÉDUIT ===== */
        .footer {
            background-color: var(--secondary-color);
            color: white;
            padding: 2rem 0 1rem;
            margin-top: 1.5rem;
            font-size: 0.9rem;
            width: 100%;
        }

        .footer-brand {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .footer-brand img {
            width: 40px;
            height: 40px;
        }

        .footer-brand h3 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: white;
            font-size: 1.2rem;
            margin: 0;
        }

        .footer-description {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 1rem;
            font-size: 0.85rem;
            line-height: 1.4;
        }

        .social-links {
            display: flex;
            gap: 0.8rem;
            margin-top: 0.5rem;
        }

        .social-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 50%;
            text-decoration: none;
            transition: var(--transition);
            font-size: 0.9rem;
        }

        .social-link:hover {
            background: var(--primary-color);
            color: var(--secondary-color);
        }

        .footer-title {
            color: white;
            font-size: 1rem;
            margin-bottom: 0.8rem;
            font-weight: 600;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 0.5rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: var(--transition);
            font-size: 0.85rem;
        }

        .footer-links a:hover {
            color: var(--primary-color);
            padding-left: 3px;
        }

        .footer-contact {
            list-style: none;
            padding: 0;
            margin: 0 0 1rem 0;
        }

        .footer-contact li {
            margin-bottom: 0.5rem;
            display: flex;
            align-items: flex-start;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.85rem;
            line-height: 1.3;
        }

        .footer-contact i {
            margin-right: 8px;
            color: var(--primary-color);
            margin-top: 2px;
            font-size: 0.9rem;
        }

        .newsletter {
            margin-top: 1rem;
        }

        .newsletter h5 {
            color: white;
            font-size: 0.9rem;
            margin-bottom: 0.3rem;
        }

        .newsletter p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.8rem;
            margin-bottom: 0.8rem;
        }

        .newsletter-form {
            display: flex;
            gap: 0.5rem;
        }

        .newsletter-form input {
            flex: 1;
            padding: 0.5rem 0.8rem;
            border: none;
            border-radius: var(--border-radius);
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 0.85rem;
        }

        .newsletter-form input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .newsletter-form button {
            background: var(--primary-color);
            color: var(--secondary-color);
            border: none;
            width: 40px;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
            font-weight: bold;
        }

        .newsletter-form button:hover {
            background: var(--primary-dark);
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 1.5rem;
            padding-top: 1rem;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.8rem;
        }

        .heart-icon {
            color: var(--primary-color);
        }

        /* ===== CORRECTION DU CONTENEUR ===== */
        .container {
            padding-left: 15px;
            padding-right: 15px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* ===== AMÉLIORATIONS RESPONSIVE MOBILE ===== */
        @media (max-width: 992px) {
            .dishes-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.2rem;
            }
            
            .cart-sidebar {
                width: 350px;
            }
        }

        @media (max-width: 768px) {
            /* IMPORTANT: Correction pour le body avec navbar fixe sur mobile */
            body {
                padding-top: 60px !important; /* Hauteur de la navbar mobile */
            }
            
            html {
                scroll-padding-top: 60px; /* Ajusté pour mobile */
            }
            
            /* Correction du conteneur Bootstrap pour mobile */
            .container {
                max-width: 100% !important;
                padding-left: 15px !important;
                padding-right: 15px !important;
                overflow-x: hidden !important;
            }
            
            .row {
                margin-left: 0 !important;
                margin-right: 0 !important;
            }
            
            /* Correction pour éviter le débordement horizontal */
            body {
                overflow-x: hidden !important;
                width: 100% !important;
                max-width: 100vw !important;
            }
            
            /* Navbar mobile FIXE */
            .navbar {
                height: 60px !important;
                padding: 0.3rem 0 !important;
                background: linear-gradient(to right, white, #FFFDE7) !important;
                border-bottom: 2px solid rgba(255, 193, 7, 0.2);
                box-shadow: 0 4px 12px rgba(255, 193, 7, 0.15);
                position: fixed !important; /* Reste fixe */
                top: 0 !important; /* Toujours en haut */
                left: 0 !important;
                right: 0 !important;
                z-index: 1030 !important;
                width: 100% !important;
            }
            
            .navbar-brand img {
                height: 35px;
            }
            
            .brand-name {
                font-size: 1.3rem;
            }
            
            /* Menu mobile corrigé */
            .navbar-collapse {
                background: linear-gradient(135deg, white 0%, #FFFDE7 100%);
                border-radius: 12px;
                margin-top: 10px;
                padding: 15px !important;
                border: 2px solid rgba(255, 193, 7, 0.15);
                box-shadow: 0 10px 30px rgba(255, 193, 7, 0.15);
                position: absolute !important;
                top: 60px !important; /* Sous la navbar fixe */
                left: 15px;
                right: 15px;
                z-index: 1000;
            }
            
            .navbar-nav .nav-link {
                background: rgba(255, 193, 7, 0.08);
                margin: 5px 0 !important;
                border-radius: 8px;
                padding: 12px 15px !important;
                text-align: center;
                display: block;
                width: 100%;
            }
            
            .navbar-nav .nav-link.active {
                background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
                color: var(--secondary-color) !important;
                font-weight: 600;
            }
            
            .btn-admin {
                background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
                margin-top: 10px !important;
                text-align: center;
                display: block;
                width: 100%;
                box-shadow: 0 4px 10px rgba(255, 193, 7, 0.3);
                padding: 12px 15px !important;
            }
            
            /* Hero section mobile */
            .menu-hero {
                min-height: 220px;
                background-attachment: scroll;
                margin: 0 10px;
                border-radius: 12px;
                overflow: hidden;
                border: 2px solid rgba(255, 193, 7, 0.2);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
                margin-top: 0 !important; /* Pas de marge car navbar fixe */
            }
            
            .hero-content {
                padding: 1.5rem;
            }
            
            .hero-title {
                font-size: 1.6rem;
                margin-bottom: 0.5rem;
                line-height: 1.3;
            }
            
            .hero-subtitle {
                font-size: 0.95rem;
                margin-bottom: 1rem;
                padding: 0 0.5rem;
            }
            
            /* Menu container mobile */
            .menu-container {
                padding: 1rem 0;
                background: white;
            }
            
            /* Section Menu mobile */
            .menu-section {
                padding: 1rem;
                margin: 0.5rem;
                border-radius: 12px;
                background-color: rgba(255, 255, 255, 0.92);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                border: 2px solid rgba(255, 193, 7, 0.2);
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            }
            
            .section-title {
                font-size: 1.4rem !important;
                text-align: center;
                display: block !important;
                margin-bottom: 1.2rem !important;
                background: linear-gradient(135deg, rgba(255, 193, 7, 0.1) 0%, transparent 100%);
                padding: 10px 20px !important;
                border-radius: 10px;
                border: 1px solid rgba(255, 193, 7, 0.15);
                width: fit-content;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            
            .section-subtitle {
                text-align: center;
                padding: 0 1rem 1.2rem !important;
                margin-bottom: 1rem !important;
                background: rgba(255, 253, 231, 0.6);
                padding: 12px !important;
                border-radius: 8px;
                border: 1px solid rgba(255, 193, 7, 0.1);
                margin-top: 0.5rem !important;
            }
            
            /* ===== MODIFICATION CRITIQUE : GRID 2 COLONNES SUR MOBILE ===== */
            .dishes-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 0.8rem;
                margin-top: 1rem;
            }
            
            .dish-card {
                margin-bottom: 0;
                border-radius: 10px;
                width: 100%;
                background: linear-gradient(135deg, white 0%, #FFFDE7 100%) !important;
                border: 2px solid rgba(255, 193, 7, 0.2) !important;
                box-shadow: 0 8px 25px rgba(255, 193, 7, 0.15) !important;
            }
            
            .dish-image {
                height: 140px;
            }
            
            .dish-content {
                padding: 0.8rem;
            }
            
            .dish-header {
                flex-direction: column;
                align-items: flex-start;
                margin-bottom: 0.6rem;
            }
            
            .dish-name {
                font-size: 0.95rem;
                margin-bottom: 0.3rem;
                line-height: 1.3;
            }
            
            .dish-price {
                font-size: 0.95rem;
                margin-left: 0;
                margin-top: 0.3rem;
            }
            
            .dish-description {
                font-size: 0.8rem;
                line-height: 1.4;
                margin-bottom: 0.8rem;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;
                height: 2.8em;
            }
            
            .dish-tags {
                display: flex;
                flex-wrap: wrap;
                gap: 0.3rem;
                margin-bottom: 0.8rem;
            }
            
            .dish-tag {
                font-size: 0.7rem;
                padding: 0.15rem 0.5rem;
            }
            
            .dish-actions {
                flex-direction: column;
                gap: 0.6rem;
            }
            
            .quantity-selector {
                width: 100%;
                justify-content: space-between;
                padding: 0.4rem 0.8rem;
            }
            
            .add-to-cart {
                width: 100%;
                justify-content: center;
                padding: 0.5rem 0.8rem;
                font-size: 0.85rem;
                background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%) !important;
            }
            
            /* Panier mobile */
            .cart-sidebar {
                width: 100%;
                max-width: 100%;
                border-radius: 0;
                background: linear-gradient(135deg, white 0%, #FFF8E1 100%) !important;
            }
            
            .cart-header {
                padding: 1rem;
                background: linear-gradient(135deg, var(--secondary-color) 0%, #222222 100%) !important;
            }
            
            .cart-content {
                padding: 0.8rem;
                background: linear-gradient(135deg, #FFFDE7 0%, #FFF9C4 100%) !important;
            }
            
            .cart-item {
                margin-bottom: 0.8rem;
                background: linear-gradient(135deg, white 0%, #FFFDE7 100%) !important;
                border: 2px solid rgba(255, 193, 7, 0.2) !important;
            }
            
            .cart-summary {
                padding: 1rem;
                margin-bottom: 1rem;
                background: linear-gradient(135deg, white 0%, #FFFDE7 100%) !important;
                border: 2px solid rgba(255, 193, 7, 0.2) !important;
            }
            
            .cart-footer {
                padding: 0.8rem;
                background: linear-gradient(135deg, white 0%, #FFFDE7 100%) !important;
            }
            
            .cart-btn {
                padding: 0.8rem;
                font-size: 0.9rem;
            }
            
            .checkout-btn {
                background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%) !important;
            }
            
            /* Bouton panier flottant */
            .cart-toggle {
                width: 55px;
                height: 55px;
                bottom: 15px;
                right: 15px;
                background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%) !important;
                box-shadow: 0 4px 12px rgba(255, 193, 7, 0.4);
            }
            
            .cart-count {
                width: 22px;
                height: 22px;
                font-size: 0.7rem;
            }
            
            /* Modal WhatsApp mobile */
            .whatsapp-modal {
                width: 100%;
                margin: 0.5rem;
                background: linear-gradient(135deg, white 0%, #FFFDE7 100%) !important;
            }
            
            .modal-header {
                padding: 1.2rem;
                background: linear-gradient(135deg, #25D366 0%, #128C7E 100%) !important;
            }
            
            .modal-body {
                padding: 1.2rem;
            }
            
            .modal-footer {
                padding: 1rem;
                gap: 0.5rem;
                background: linear-gradient(135deg, #FFFDE7 0%, #FFF9C4 100%) !important;
            }
            
            /* Footer mobile */
            .footer {
                background: linear-gradient(135deg, #333333 0%, #222222 100%) !important;
                padding: 1.5rem 0 1rem;
                margin-top: 1rem;
                border-top: 3px solid var(--primary-color);
                margin: 10px;
                border-radius: 12px;
            }
            
            .footer .col-lg-4, 
            .footer .col-lg-3, 
            .footer .col-lg-2, 
            .footer .col-md-6 {
                background: rgba(255, 255, 255, 0.05);
                border-radius: 10px;
                padding: 15px;
                margin-bottom: 15px;
                border: 1px solid rgba(255, 193, 7, 0.1);
            }
            
            .footer-brand {
                justify-content: center;
                text-align: center;
                flex-direction: column;
                margin-bottom: 1.5rem;
            }
            
            .footer-brand h3 {
                margin-top: 0.5rem;
            }
            
            .footer-description {
                text-align: center;
                margin-bottom: 1.5rem;
            }
            
            .social-links {
                justify-content: center;
                margin-bottom: 1.5rem;
            }
            
            .footer-title {
                text-align: center;
            }
            
            .footer-links {
                text-align: center;
            }
            
            .footer-contact {
                text-align: center;
            }
            
            .footer-contact li {
                justify-content: center;
            }
            
            .newsletter {
                text-align: center;
                max-width: 300px;
                margin: 0 auto;
            }
            
            .footer-bottom {
                text-align: center;
            }
            
            .footer-bottom .row {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            /* Correction des marges et paddings */
            .row {
                margin-left: -6px !important;
                margin-right: -6px !important;
            }
            
            .col-md-4, .col-lg-4, .col-lg-2, .col-lg-3, .col-md-6 {
                padding-left: 6px !important;
                padding-right: 6px !important;
            }
        }

        @media (max-width: 576px) {
            /* IMPORTANT: Ajustement pour très petits écrans */
            body {
                padding-top: 55px !important;
            }
            
            html {
                scroll-padding-top: 55px;
            }
            
            .navbar {
                height: 55px !important;
            }
            
            .navbar-brand img {
                height: 30px !important;
            }
            
            .brand-name {
                font-size: 1.1rem !important;
            }
            
            /* Hero section */
            .menu-hero {
                min-height: 200px;
                margin: 0 5px;
            }
            
            .hero-title {
                font-size: 1.4rem;
            }
            
            .hero-subtitle {
                font-size: 0.9rem;
                padding: 0 0.5rem;
            }
            
            /* Sections */
            .menu-container {
                padding: 0.5rem 0 !important;
            }
            
            .menu-section {
                padding: 0.8rem;
                margin: 5px;
            }
            
            .section-title {
                font-size: 1.3rem !important;
                padding: 8px 16px !important;
            }
            
            .section-subtitle {
                padding: 10px !important;
                font-size: 0.9rem !important;
            }
            
            /* ===== VERSION TRÈS PETITS ÉCRANS ===== */
            .dishes-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.6rem;
            }
            
            .dish-image {
                height: 120px;
            }
            
            .dish-content {
                padding: 0.6rem;
            }
            
            .dish-name {
                font-size: 0.9rem;
                line-height: 1.2;
            }
            
            .dish-price {
                font-size: 0.9rem;
            }
            
            .dish-description {
                font-size: 0.75rem;
                line-height: 1.3;
                height: 2.6em;
            }
            
            .dish-tag {
                font-size: 0.65rem;
                padding: 0.1rem 0.4rem;
            }
            
            .dish-actions {
                gap: 0.4rem;
            }
            
            .quantity-selector {
                padding: 0.3rem 0.6rem;
            }
            
            .qty-btn {
                width: 22px;
                height: 22px;
                font-size: 0.7rem;
            }
            
            .qty-value {
                font-size: 0.9rem;
            }
            
            .add-to-cart {
                padding: 0.4rem 0.6rem;
                font-size: 0.8rem;
            }
            
            .cart-toggle {
                width: 50px;
                height: 50px;
                bottom: 10px;
                right: 10px;
            }
            
            .cart-count {
                width: 20px;
                height: 20px;
                font-size: 0.65rem;
            }
            
            /* Footer */
            .footer {
                padding: 1.2rem 0 0.8rem !important;
                margin: 5px;
            }
            
            .footer .col-lg-4, 
            .footer .col-lg-3, 
            .footer .col-lg-2, 
            .footer .col-md-6 {
                padding: 12px;
            }
            
            .footer-brand h3 {
                font-size: 1rem;
            }
            
            .footer-description {
                font-size: 0.8rem;
            }
        }

        /* ===== VERSION EXTRA-PETITS ÉCRANS (moins de 400px) ===== */
        @media (max-width: 400px) {
            .hero-title {
                font-size: 1.2rem;
            }
            
            .section-title {
                font-size: 1.2rem !important;
            }
            
            .dishes-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.5rem;
            }
            
            .dish-image {
                height: 110px;
            }
            
            .dish-content {
                padding: 0.5rem;
            }
            
            .dish-name {
                font-size: 0.85rem;
            }
            
            .dish-price {
                font-size: 0.85rem;
            }
            
            .dish-description {
                font-size: 0.7rem;
                line-height: 1.2;
                height: 2.4em;
            }
            
            .dish-tags {
                gap: 0.2rem;
            }
            
            .dish-tag {
                font-size: 0.6rem;
                padding: 0.1rem 0.3rem;
            }
            
            .dish-actions {
                gap: 0.4rem;
            }
            
            .quantity-selector {
                padding: 0.25rem 0.5rem;
            }
            
            .qty-btn {
                width: 20px;
                height: 20px;
                font-size: 0.65rem;
            }
            
            .add-to-cart {
                padding: 0.35rem 0.5rem;
                font-size: 0.75rem;
            }
        }

        @media (min-width: 993px) {
            /* Pour les desktop */
            .dishes-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 1.5rem;
            }
        }

        /* Notification */
        .notification {
            position: fixed;
            top: 80px;
            right: 20px;
            background: white;
            color: var(--secondary-color);
            padding: 1rem 1.5rem;
            border-radius: var(--border-radius);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            z-index: 1060;
            border-left: 4px solid var(--primary-color);
            animation: slideIn 0.3s ease;
            max-width: 350px;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            .notification {
                top: 70px;
                right: 10px;
                left: 10px;
                max-width: calc(100% - 20px);
                padding: 0.8rem 1rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation FIXE -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('assets/image/logo.jpeg') }}" alt="Logo Casa Mia" width="40" height="40" class="d-inline-block align-top me-2">
                <span class="brand-name d-none d-md-inline"><span class="brand-first">Casa</span> Mia</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('apropos') }}">À Propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('menu') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        @auth
                            <a class="nav-link btn-admin" href="{{ route('dhome') }}">
                                <i class="fas fa-user-shield me-1"></i> Dashboard
                            </a>
                        @else
                        <a class="nav-link btn-admin" href="{{ route('login.index') }}">
                            <i class="fas fa-user-shield me-1"></i> Admin
                        </a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="menu-hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Votre <span class="highlight">Panier</span> Complet</h1>
                <p class="hero-subtitle">Découvrez toutes nos spécialités sénégalaises</p>
            </div>
        </div>
    </section>

    <!-- Cart Start-->
    <div class="cart-wrapper">
        <div class="container">
            <div class="row g-4">
                @if(Cart::count() > 0)
                    <!-- Cart Items Section -->
                    <div class="col-lg-8">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0">
                                Votre Panier
                                <a href="{{ route('menu') }}" class="btn btn-outline-primary">
                                    <i class="fa fa-arrow-left me-1"></i>
                                </a>
                            </h4>
                            <span class="text-muted">{{Cart::content()->count()}} article(s)</span>
                        </div>

                        @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @elseif(Session::has('danger'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('danger') }}
                            </div>
                        @endif
                        
                        <!-- Product Cards -->
                        <div class="d-flex flex-column gap-3">
                            <!-- Product 1 -->
                            @foreach(Cart::content() as $articles)
                                <div class="product-card p-2 shadow-sm">
                                    <div class="row align-items-center">
                                        <div class="col-3 col-md-2">
                                            <img src="{{asset('storage/'.$articles->model->image)}}" alt="Product" class="product-image">
                                        </div>
                                        <div class="col-4 col-md-4">
                                            <h6 class="mb-1">{{strtoupper($articles->name)}}</h6>
                                            <p class="text-muted mb-0">{{$articles->menu_id}}</p>
                                            <span class="discount-badge mt-2">{{ number_format($articles->price, 0, ',', ' ') }} FCFA</span>
                                        </div>
                                        <div class="col-5 col-md-3">
                                            <div class="d-flex align-items-center gap-2">
                                                <a href="{{ route('panier.moins', $articles->rowId) }}" class="quantity-btn" id="qty-{{$articles->rowId}}">-</a>
                                                <input type="number" class="quantity-input" value="{{$articles->qty}}" min="1">
                                                <a href="{{ route('panier.plus', $articles->rowId) }}" class="quantity-btn" id="qty-{{$articles->rowId}}">+</a>
                                            </div>
                                        </div>
                                        <div class="col-8 col-md-2">
                                            <span class="fw-bold">Total <br> {{ number_format($articles->price * $articles->qty) }} FCFA</span>
                                        </div>
                                        <div class="col-4 col-md-1">
                                            <form action="{{route('panier.destroy', $articles->rowId)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn" title="supprimer cette article">
                                                    <i class="fa fa-trash remove-btn"></i>
                                                </button>
                                            </form>
                                                
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                    </div>

                    <!-- Summary Section -->
                    <div class="col-lg-4">
                        <div class="summary-card p-4 shadow-sm">
                            <h5 class="mb-4">Récapitulatif de la commande</h5>
                            
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Sous total</span>
                                <span>{{ Cart::subtotal() }} FCFA</span>
                            </div>
                            <hr>
                            <!--<div class="d-flex justify-content-between mb-4">
                                <span class="fw-bold">Total</span>
                                <span class="fw-bold">$458.97</span>
                            </div>-->

                            <!-- Promo Code 
                            <div class="mb-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Promo code">
                                    <button class="btn btn-outline-secondary" type="button">Apply</button>
                                </div>
                            </div>-->

                            <a href="{{route('cart.whatsapp')}}" class="btn btn-primary checkout-btn w-100 mb-3">
                                Passer au commande
                            </a>
                            
                            <div class="d-flex justify-content-center gap-2">
                                <i class="fa fa-shield-check text-success"></i>
                                <small class="text-muted">Paiement sécurisé</small>
                            </div>
                        </div>
                    </div>
                @else
                    <h5 class="text-center">Votre panier est vide !</h5>
                @endif
            </div>
        </div>
    </div>   
    <!-- Cart End -->
        

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="footer-brand mb-2">
                        <img src="{{ asset('assets/image/logo.jpeg') }}" alt="Logo Casa Mia" class="me-2">
                        <h3><span class="brand-first">Casa</span> Mia</h3>
                    </div>
                    <p class="footer-description">Restaurant sénégalais authentique à Saint Louis.</p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="https://wa.me/221772068181" class="social-link"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-3">
                    <h4 class="footer-title">Menu</h4>
                    <ul class="footer-links">
                        <li><a href="/">Accueil</a></li>
                        <li><a href="{{ route('menu') }}">Plats</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-3">
                    <h4 class="footer-title">Contact</h4>
                    <ul class="footer-contact">
                        <li><i class="fas fa-map-marker-alt"></i> Saint Louis, Route de Khor</li>
                        <li><i class="fas fa-phone"></i> 77 206 81 81</li>
                        <li><i class="fas fa-envelope"></i> tafa.wade@gmail.com</li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="newsletter">
                        <h5>Newsletter</h5>
                        <p>Recevez nos offres</p>
                        <form class="newsletter-form">
                            <input type="email" placeholder="Email" required>
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; <?= now()->year ?> Casa Mia. Tous droits réservés.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p>Conçu avec <i class="fas fa-heart heart-icon"></i> par <a href="https://bcmgroupe.com" target="_blank">BCM Groupe</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  
     <script>
        
        // IMPORTANT: Correction du scroll avec navbar fixe
        function setupSmoothScroll() {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');
                    if (href === '#' || href.startsWith('#') && document.querySelector(href)) {
                        e.preventDefault();
                        const target = document.querySelector(href);
                        if (target) {
                            const navbarHeight = document.querySelector('.navbar').offsetHeight;
                            const targetPosition = target.getBoundingClientRect().top + window.pageYOffset;
                            const offsetPosition = targetPosition - navbarHeight;
                            
                            window.scrollTo({
                                top: offsetPosition,
                                behavior: 'smooth'
                            });
                        }
                    }
                });
            });
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            displayAllDishes();
            updateCartUI();
            setupSmoothScroll();
            
            // Set active nav link
            const currentPage = window.location.pathname.split('/').pop() || 'index.html';
            document.querySelectorAll('.nav-link').forEach(link => {
                if (link.getAttribute('href') === currentPage) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });

            // Cart toggle
            document.getElementById('cartToggle').addEventListener('click', function() {
                document.querySelector('.cart-sidebar').classList.add('open');
            });
            
            document.querySelector('.close-cart').addEventListener('click', function() {
                document.querySelector('.cart-sidebar').classList.remove('open');
            });
            
            document.getElementById('closeEmptyCart').addEventListener('click', function() {
                document.querySelector('.cart-sidebar').classList.remove('open');
            });
            
            // WhatsApp modal
            document.getElementById('checkoutBtn').addEventListener('click', function() {
                if (cart.length === 0) {
                    showNotification('Votre panier est vide', 'info');
                    return;
                }
                document.getElementById('whatsappModal').classList.add('active');
            });
            
            document.querySelector('.close-modal').addEventListener('click', function() {
                document.getElementById('whatsappModal').classList.remove('active');
            });
            
            document.getElementById('cancelOrderBtn').addEventListener('click', function() {
                document.getElementById('whatsappModal').classList.remove('active');
            });
            
            document.getElementById('clearCartBtn').addEventListener('click', clearCart);
            
            document.getElementById('sendWhatsAppBtn').addEventListener('click', function() {
                const clientName = document.getElementById('clientName').value.trim();
                const clientPhone = document.getElementById('clientPhone').value.trim();
                const clientAddress = document.getElementById('clientAddress').value.trim();
                const clientNotes = document.getElementById('clientNotes').value.trim();
                const acceptTerms = document.getElementById('acceptTerms').checked;
                
                if (!clientName || !clientPhone) {
                    showNotification('Veuillez remplir les champs obligatoires', 'info');
                    return;
                }
                
                if (!acceptTerms) {
                    showNotification('Veuillez accepter les conditions', 'info');
                    return;
                }
                
                const clientInfo = {
                    name: clientName,
                    phone: clientPhone,
                    address: clientAddress,
                    notes: clientNotes
                };
                
                // Format the phone number for WhatsApp
                const formattedPhone = clientPhone.replace(/\s/g, '');
                
                const message = generateWhatsAppMessage(clientInfo);
                const whatsappURL = `https://wa.me/221772068181?text=${message}`;
                
                // Open WhatsApp in a new tab
                window.open(whatsappURL, '_blank');
                
                // Close modal
                document.getElementById('whatsappModal').classList.remove('active');
                
                // Clear form
                document.getElementById('clientName').value = '';
                document.getElementById('clientPhone').value = '';
                document.getElementById('clientAddress').value = '';
                document.getElementById('clientNotes').value = '';
                document.getElementById('acceptTerms').checked = false;
                
                // Optionally clear cart after order
                if (confirm('Commande envoyée! Voulez-vous vider le panier?')) {
                    clearCart();
                }
            });
            
            // Fix pour le menu mobile
            const navbarToggler = document.querySelector('.navbar-toggler');
            const navbarCollapse = document.querySelector('.navbar-collapse');
            
            if (navbarToggler && navbarCollapse) {
                navbarToggler.addEventListener('click', function() {
                    navbarCollapse.classList.toggle('show');
                });
                
                // Fermer le menu quand on clique en dehors
                document.addEventListener('click', function(e) {
                    if (!navbarToggler.contains(e.target) && !navbarCollapse.contains(e.target)) {
                        navbarCollapse.classList.remove('show');
                    }
                });
            }

            // Optimisation mobile
            if (window.innerWidth <= 768) {
                // Désactiver certaines animations sur mobile
                document.querySelectorAll('.dish-card').forEach(el => {
                    el.style.transitionDuration = '0.3s';
                });
            }

            // Correction spécifique pour le rendu mobile
            function fixMobileLayout() {
                // Vérifier si on est sur mobile
                const isMobile = window.innerWidth <= 768;
                
                if (isMobile) {
                    // Correction pour le conteneur
                    const container = document.querySelector('.container');
                    if (container) {
                        container.style.maxWidth = '100%';
                        container.style.overflowX = 'hidden';
                    }
                }
            }

            // Exécuter au chargement et au redimensionnement
            window.addEventListener('load', fixMobileLayout);
            window.addEventListener('resize', fixMobileLayout);
            
            // Exécuter la correction au chargement
            fixMobileLayout();
        });
        
        // Initialiser le panier au chargement de la page
        window.addEventListener('load', function() {
            updateCartUI();
        });
    </script>
</body>
</html>