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
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- CSS Personnalisé -->
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

        /* Grid des plats */
        .dishes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        /* Carte de plat */
        .dish-card {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            height: 100%;
            border: 1px solid rgba(255, 193, 7, 0.1);
        }

        .dish-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(255, 193, 7, 0.15);
            border-color: var(--primary-color);
        }

        .dish-image {
            position: relative;
            height: 180px;
            overflow: hidden;
        }

        .dish-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .dish-card:hover .dish-image img {
            transform: scale(1.05);
        }

        .dish-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: var(--primary-color);
            color: var(--secondary-color);
            padding: 0.2rem 0.6rem;
            border-radius: 15px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .dish-content {
            padding: 1.2rem;
        }

        .dish-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 0.8rem;
        }

        .dish-name {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
            flex: 1;
        }

        .dish-price {
            color: var(--primary-dark);
            font-weight: 700;
            font-size: 1.2rem;
            white-space: nowrap;
            margin-left: 1rem;
        }

        .dish-description {
            color: var(--text-light);
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 1rem;
        }

        .dish-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .dish-tag {
            background-color: rgba(255, 193, 7, 0.1);
            color: var(--text-light);
            padding: 0.2rem 0.6rem;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 500;
            border: 1px solid rgba(255, 193, 7, 0.2);
        }

        .dish-tag.recommande {
            background-color: rgba(255, 193, 7, 0.2);
            color: #856404;
            border-color: rgba(255, 193, 7, 0.3);
        }

        .dish-tag.epice {
            background-color: rgba(255, 87, 34, 0.1);
            color: #721C24;
            border-color: rgba(255, 87, 34, 0.2);
        }

        .dish-tag.poisson {
            background-color: rgba(33, 150, 243, 0.1);
            color: #0C5460;
            border-color: rgba(33, 150, 243, 0.2);
        }

        .dish-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background-color: var(--light-color);
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            border: 1px solid rgba(255, 193, 7, 0.2);
        }

        .qty-btn {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background-color: white;
            border: 1px solid var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            color: var(--primary-color);
            font-size: 0.8rem;
        }

        .qty-btn:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .qty-value {
            font-weight: 700;
            min-width: 20px;
            text-align: center;
            font-size: 1rem;
            color: var(--secondary-color);
        }

        .add-to-cart {
            background: var(--primary-color);
            color: var(--secondary-color);
            border: none;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .add-to-cart:hover {
            background: var(--primary-dark);
            color: white;
        }

        /* Panier flottant */
        .cart-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: var(--primary-color);
            color: var(--secondary-color);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(255, 193, 7, 0.3);
            cursor: pointer;
            z-index: 1000;
            transition: var(--transition);
            border: 2px solid white;
        }

        .cart-toggle:hover {
            transform: scale(1.1);
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #FF5722;
            color: white;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: 700;
            border: 2px solid white;
        }

        /* Panier sidebar amélioré */
        .cart-sidebar {
            position: fixed;
            right: -100%;
            top: 0;
            width: 100%;
            height: 100vh;
            background-color: white;
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
            transition: right 0.4s ease;
            z-index: 1050;
            display: flex;
            flex-direction: column;
        }

        .cart-sidebar.open {
            right: 0;
        }

        .cart-header {
            padding: 1.5rem;
            background: var(--secondary-color);
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid var(--primary-color);
        }

        .cart-header h4 {
            margin: 0;
            font-size: 1.2rem;
        }

        .close-cart {
            background: none;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            color: white;
        }

        .cart-content {
            flex: 1;
            overflow-y: auto;
            background-color: var(--light-color);
            padding: 1rem;
        }

        /* État vide du panier */
        .cart-empty {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            padding: 2rem;
            text-align: center;
            color: var(--text-light);
        }

        .cart-empty i {
            font-size: 3.5rem;
            color: rgba(255, 193, 7, 0.3);
            margin-bottom: 1rem;
        }

        .cart-empty h5 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }

        .cart-empty p {
            font-size: 0.9rem;
            max-width: 250px;
        }

        /* État avec articles */
        .cart-has-items {
            display: none;
            flex-direction: column;
            height: 100%;
        }

        .cart-items {
            flex: 1;
            overflow-y: auto;
            margin-bottom: 1rem;
        }

        .cart-item {
            background: white;
            border-radius: var(--border-radius);
            margin-bottom: 0.8rem;
            border: 1px solid rgba(255, 193, 7, 0.1);
            box-shadow: var(--box-shadow);
            overflow: hidden;
        }

        .cart-item-header {
            padding: 1rem;
            background-color: rgba(255, 193, 7, 0.05);
            border-bottom: 1px solid rgba(255, 193, 7, 0.1);
        }

        .cart-item-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin: 0 0 0.3rem 0;
        }

        .cart-item-body {
            padding: 1rem;
        }

        .price-details {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .price-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
        }

        .price-label {
            color: var(--text-light);
        }

        .price-value {
            font-weight: 500;
            color: var(--secondary-color);
        }

        .price-unit {
            color: var(--primary-dark);
            font-weight: 600;
        }

        .price-total {
            color: var(--primary-dark);
            font-weight: 700;
            font-size: 1rem;
        }

        .cart-item-quantity {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(255, 193, 7, 0.1);
        }

        .quantity-control {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background-color: var(--light-color);
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            border: 1px solid rgba(255, 193, 7, 0.2);
        }

        .quantity-control .qty-btn {
            width: 28px;
            height: 28px;
            font-size: 0.9rem;
        }

        .quantity-control .qty-value {
            min-width: 25px;
            font-size: 1rem;
        }

        .cart-item-actions {
            display: flex;
            gap: 0.5rem;
        }

        /* Résumé total amélioré */
        .cart-summary {
            background: white;
            padding: 1.5rem;
            border-radius: var(--border-radius);
            margin-bottom: 1.5rem;
            border: 1px solid rgba(255, 193, 7, 0.1);
            box-shadow: var(--box-shadow);
        }

        .summary-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid rgba(255, 193, 7, 0.2);
        }

        .summary-details {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.3rem 0;
            font-size: 0.95rem;
        }

        .summary-label {
            color: var(--text-light);
        }

        .summary-value {
            font-weight: 500;
            color: var(--secondary-color);
        }

        .summary-total {
            border-top: 2px solid rgba(255, 193, 7, 0.2);
            padding-top: 0.8rem;
            margin-top: 0.8rem;
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--secondary-color);
        }

        .summary-total-amount {
            color: var(--primary-dark);
            font-size: 1.3rem;
        }

        /* Actions du panier */
        .cart-actions {
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }

        .cart-btn {
            padding: 1rem;
            border: none;
            border-radius: var(--border-radius);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .checkout-btn {
            background: var(--primary-color);
            color: var(--secondary-color);
        }

        .checkout-btn:hover {
            background: var(--primary-dark);
            color: white;
        }

        .clear-cart-btn {
            background: transparent;
            color: var(--text-light);
            border: 1px solid var(--text-light);
        }

        .clear-cart-btn:hover {
            background: var(--text-light);
            color: white;
        }

        /* Footer du panier */
        .cart-footer {
            padding: 1rem;
            background: white;
            border-top: 1px solid rgba(255, 193, 7, 0.2);
        }

        /* Modal de confirmation WhatsApp */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1100;
            padding: 1rem;
        }

        .modal-overlay.active {
            display: flex;
        }

        .whatsapp-modal {
            background: white;
            border-radius: var(--border-radius);
            width: 100%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            animation: modalSlideIn 0.3s ease;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-header {
            padding: 1.5rem;
            background: linear-gradient(135deg, #25D366, #128C7E);
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h4 {
            margin: 0;
            font-size: 1.3rem;
        }

        .close-modal {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: white;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .whatsapp-icon {
            font-size: 3rem;
            color: #25D366;
            text-align: center;
            margin-bottom: 1rem;
        }

        .order-confirmation {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .order-confirmation h5 {
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }

        .order-confirmation p {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .client-info-form {
            margin-top: 1.5rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 0.3rem;
            display: block;
            color: var(--secondary-color);
        }

        .form-control {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid rgba(255, 193, 7, 0.2);
            border-radius: var(--border-radius);
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.1);
            outline: none;
        }

        .form-control::placeholder {
            color: rgba(0, 0, 0, 0.5);
        }

        .modal-footer {
            padding: 1rem 1.5rem;
            background: var(--light-color);
            display: flex;
            gap: 1rem;
            flex-direction: column;
        }

        .modal-btn {
            padding: 0.8rem;
            border: none;
            border-radius: var(--border-radius);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            font-size: 1rem;
            width: 100%;
        }

        .cancel-btn {
            background: transparent;
            color: var(--text-light);
            border: 1px solid var(--text-light);
        }

        .cancel-btn:hover {
            background: var(--text-light);
            color: white;
        }

        .send-btn {
            background: #25D366;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .send-btn:hover {
            background: #128C7E;
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
                <img src="{{ asset('assets/image/logo.jpeg') }}" alt="Logo Casa Mia" class="d-inline-block align-top me-2">
                <span class="brand-name d-none d-md-inline"><span class="brand-first">Casa</span> Mia</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('accueil') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('apropos') }}">À Propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-admin" href="{{ route('login.index') }}">
                            <i class="fas fa-user-shield me-1"></i> Admin
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="menu-hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Notre <span class="highlight">Menu</span> Complet</h1>
                <p class="hero-subtitle">Découvrez toutes nos spécialités sénégalaises</p>
            </div>
        </div>
    </section>

    <!-- All Dishes Section -->
    <div class="container menu-container">
        <div class="menu-section">
            <div class="text-center mb-4">
                <h2 class="section-title">Tous nos <span class="highlight">Plats</span></h2>
                <p class="section-subtitle">Découvrez nos 15 spécialités sénégalaises préparées avec des ingrédients frais</p>
            </div>
            
            <div class="dishes-grid">
                <!-- All dishes will be loaded here -->
                @foreach($plats as $art)
                    <div class="dish-card">
                        <!--<div class="dish-badge">★</div>-->
                        <div class="dish-image">
                            <img src="{{ asset('storage/'.$art->image) }}">
                        </div>
                        <div class="dish-content">
                            <div class="dish-header">
                                <h3 class="dish-name">{{ $art->nom}}</h3>
                                <div class="dish-price">{{ $art->prix}} FCFA</div>
                            </div>
                            <p class="dish-description">{{ $art->description}}</p>
                            <div class="dish-tags">
                                <span class="dish-tag recommande">recommandé</span>
                                <!--<span class="dish-tag epice">épicé</span>-->
                                <button class="add-to-cart ms-auto" data-bs-toggle="modal" data-bs-target="#productModal" data-id="{{ $art->id }}" data-image="{{ asset('storage/'.$art->image) }}" data-name="{{ $art->nom }}" data-description="{{ $art->description }}" data-price="{{ $art->prix }}">
                                    <i class="fas fa-eye"></i> Voir
                                </button>
                            </div>
                            <div class="dish-actions">
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {{$plats->links()}}
            </div>
        </div>
    </div>
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>

                <div class="modal-body">

                    <!-- Image du produit -->
                        <div class="d-flex justify-content-center">
                            <img id="image" src="image" class="image" style="align-items: center;" width="300" alt="Image produit">
                        </div>
                        <div class="text-center">
                            <span class="badge bg-success">Disponible</span>
                        </div>
                        <div class="text-center">
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star-half text-warning"></i>
                            <small class="text-muted">(4.5)</small>
                        </div>
                    <h5 class=""><i class="fa fa-card-text"></i>Description</h5>
                    <p class="description"></p>

                    <form action="{{route('panier.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="article_id">
                            
                        <h4 class="price fw-bold text-warning"></h4>

                    <div class="d-grid gap-2 d-md-flex">
                        <button class="btn btn-warning flex-fill">
                            <i class="fa fa-cart-plus"></i> Ajouter
                        </button>
                        <a type="button" href="tel:+221771234567" target="_blank" class="btn btn-info border" title="Appeler-Nous">
                            <i class="fa fa-phone"> Contacter-Nous</i>
                        </a>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Cart Toggle Button -->
    <div class="cart-toggle" id="cartToggle">
        <i class="fas fa-shopping-cart fa-lg"></i>
        <div class="cart-count" id="cartCount">0</div>
    </div>

    <!-- WhatsApp Confirmation Modal -->
    <div class="modal-overlay" id="whatsappModal">
        <div class="whatsapp-modal">
            <div class="modal-header">
                <h4><i class="fab fa-whatsapp me-2"></i> Commander via WhatsApp</h4>
                <button class="close-modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div class="whatsapp-icon">
                    <i class="fab fa-whatsapp"></i>
                </div>
                
                <div class="order-confirmation">
                    <h5>Confirmation de commande</h5>
                    <p>Remplissez vos informations pour finaliser votre commande via WhatsApp</p>
                </div>
                
                <div class="client-info-form">
                    <div class="form-group">
                        <label class="form-label" for="clientName">Nom complet *</label>
                        <input type="text" class="form-control" id="clientName" placeholder="Votre nom" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="clientPhone">Numéro WhatsApp *</label>
                        <input type="tel" class="form-control" id="clientPhone" placeholder="77 123 45 67" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="clientAddress">Adresse de livraison</label>
                        <input type="text" class="form-control" id="clientAddress" placeholder="Votre adresse pour la livraison">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="clientNotes">Notes supplémentaires</label>
                        <textarea class="form-control" id="clientNotes" rows="2" placeholder="Instructions spéciales, allergies, etc."></textarea>
                    </div>
                    
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="acceptTerms" required>
                            <label class="form-check-label" for="acceptTerms">
                                J'accepte les conditions de commande et de livraison
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="modal-btn cancel-btn" id="cancelOrderBtn">
                    Annuler
                </button>
                <button class="modal-btn send-btn" id="sendWhatsAppBtn">
                    <i class="fab fa-whatsapp me-2"></i> Envoyer sur WhatsApp
                </button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="footer-brand mb-2">
                        <img src="images/logoo.png" alt="Logo Casa Mia" class="me-2">
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
                        <p>&copy; 2023 Casa Mia. Tous droits réservés.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p>Conçu avec <i class="fas fa-heart heart-icon"></i></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const modal = document.getElementById('productModal');

            modal.addEventListener('show.bs.modal', function (event) {

                const button = event.relatedTarget;

                const id = button.getAttribute('data-id');
                const name = button.getAttribute('data-name');
                const image = button.getAttribute('data-image');
                const description = button.getAttribute('data-description');
                const price = button.getAttribute('data-price');
            
                modal.querySelector('#article_id').value = id;
                modal.querySelector('.modal-title').textContent = name;
                modal.querySelector('.modal-body .image').src = image;
                modal.querySelector('.modal-body .title').textContent = name;
                modal.querySelector('.modal-body .description').textContent = description;
                modal.querySelector('.modal-body .price').textContent = price + ' FCFA';
            
            });

        });
    </script>
    <script>
            
            // Update cart UI
            updateCartUI();
        
      
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
        
            // Close modals when clicking outside
            document.getElementById('whatsappModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    this.classList.remove('active');
                }
            });
            
            // Fermer le panier en cliquant en dehors sur mobile
            document.querySelector('.cart-sidebar').addEventListener('click', function(e) {
                if (window.innerWidth <= 768 && e.target === this) {
                    this.classList.remove('open');
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

        
        // Initialiser le panier au chargement de la page
        window.addEventListener('load', function() {
            updateCartUI();
        });
    </script>
</body>
</html>