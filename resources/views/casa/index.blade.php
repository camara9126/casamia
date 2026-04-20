<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <title>Dashboard Admin - Casa Mia Restaurant</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <!-- html2canvas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
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
            background-color: #f8f9fa;
        }

        
        .input-with-icon {
            position: relative;
        }

        .input-with-icon i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-color);
            font-size: 1.1rem;
            z-index: 2;
        }

        .input-with-icon input {
            width: 100%;
            padding: 15px 20px 15px 50px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
            color: var(--text-color);
        }

        .input-with-icon input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(255, 193, 7, 0.2);
        }

        .password-toggle {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #999;
            cursor: pointer;
            padding: 5px;
        }

        .login-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: var(--secondary-color);
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 193, 7, 0.3);
        }

        .login-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .login-btn .spinner-border {
            width: 20px;
            height: 20px;
            border-width: 2px;
        }

        .login-footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid rgba(0, 0, 0, 0.08);
        }

        .demo-credentials {
            background: rgba(255, 193, 7, 0.08);
            padding: 15px;
            border-radius: 12px;
            margin-top: 20px;
            border-left: 4px solid var(--primary-color);
            text-align: left;
        }

        .demo-credentials p {
            margin: 0;
            font-size: 0.85rem;
            line-height: 1.5;
            color: var(--text-light);
        }

        .demo-credentials strong {
            color: var(--secondary-color);
            font-weight: 600;
        }

        /* Alert Messages */
        .alert {
            border: none;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border-left: 4px solid #dc3545;
        }

        .alert-danger i {
            color: #dc3545;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background: var(--secondary-color);
            color: white;
            padding: 1.5rem 0;
            z-index: 1000;
            overflow-y: auto;
            display: block;
        }

        .sidebar-brand {
            padding: 0 1.5rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .sidebar-brand h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            margin: 0;
        }

        .brand-first {
            color: var(--primary-color);
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
        }

        .sidebar-menu li {
            margin-bottom: 0.5rem;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.8rem 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: var(--transition);
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: rgba(255, 193, 7, 0.1);
            color: white;
            border-left: 3px solid var(--primary-color);
        }

        .sidebar-menu i {
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 1.5rem;
            min-height: 100vh;
            display: block;
        }

        /* Dashboard Header */
        .dashboard-header {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: var(--box-shadow);
            border: 1px solid rgba(255, 193, 7, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .dashboard-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            margin: 0;
            color: var(--secondary-color);
        }

        .highlight {
            color: var(--primary-color);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            background: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary-color);
            font-weight: 600;
        }

        /* Statistics Cards */
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .stat-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--box-shadow);
            border: 1px solid rgba(255, 193, 7, 0.1);
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(255, 193, 7, 0.15);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            background: var(--primary-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            color: var(--primary-dark);
            font-size: 1.2rem;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 0.3rem;
        }

        .stat-label {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Orders Section */
        .orders-section {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--box-shadow);
            border: 1px solid rgba(255, 193, 7, 0.1);
            margin-bottom: 1.5rem;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255, 193, 7, 0.1);
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin: 0;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .orders-table {
            width: 100%;
            border-collapse: collapse;
        }

        .orders-table th {
            background-color: var(--light-color);
            color: var(--secondary-color);
            font-weight: 600;
            text-align: left;
            padding: 1rem;
            border-bottom: 2px solid var(--primary-color);
        }

        .orders-table td {
            padding: 1rem;
            border-bottom: 1px solid rgba(255, 193, 7, 0.1);
            vertical-align: middle;
        }

        .orders-table tbody tr:hover {
            background-color: rgba(255, 193, 7, 0.05);
        }

        .order-id {
            font-weight: 600;
            color: var(--secondary-color);
        }

        .customer-info {
            display: flex;
            flex-direction: column;
            gap: 0.2rem;
        }

        .customer-name {
            font-weight: 600;
            color: var(--secondary-color);
        }

        .customer-phone {
            color: var(--text-light);
            font-size: 0.85rem;
        }

        .items-list {
            list-style: none;
            padding: 0;
            margin: 0;
            font-size: 0.85rem;
        }

        .items-list li {
            margin-bottom: 0.3rem;
            display: flex;
            justify-content: space-between;
        }

        .order-total {
            font-weight: 700;
            color: var(--primary-dark);
        }

        .order-date {
            color: var(--text-light);
            font-size: 0.85rem;
        }

        /* Status Badges */
        .status-badge {
            display: inline-block;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-pending {
            background-color: rgba(255, 193, 7, 0.2);
            color: #856404;
        }

        .status-preparing {
            background-color: rgba(0, 123, 255, 0.2);
            color: #004085;
        }

        .status-ready {
            background-color: rgba(40, 167, 69, 0.2);
            color: #155724;
        }

        .status-delivered {
            background-color: rgba(108, 117, 125, 0.2);
            color: #383d41;
        }

        .status-cancelled {
            background-color: rgba(220, 53, 69, 0.2);
            color: #721c24;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn-action {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            font-size: 0.95rem;
        }

        .btn-view {
            background-color: rgba(0, 123, 255, 0.1);
            color: #007bff;
        }

        .btn-view:hover {
            background-color: #007bff;
            color: white;
        }

        .btn-edit {
            background-color: rgba(255, 193, 7, 0.1);
            color: var(--primary-color);
        }

        .btn-edit:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-delete {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }

        .btn-delete:hover {
            background-color: #dc3545;
            color: white;
        }

        .btn-invoice {
            background-color: rgba(40, 167, 69, 0.1);
            color: #28a745;
        }

        .btn-invoice:hover {
            background-color: #28a745;
            color: white;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: var(--text-light);
        }

        .empty-state i {
            font-size: 3rem;
            color: rgba(255, 193, 7, 0.3);
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }

        /* Loading Overlay */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.95);
            z-index: 9998;
            display: none;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .loading-overlay.active {
            display: flex;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Tabs */
        .tabs-navigation {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .tab-btn {
            padding: 0.8rem 1.5rem;
            background: white;
            border: 1px solid rgba(255, 193, 7, 0.2);
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
            color: var(--text-color);
        }

        .tab-btn:hover {
            background: rgba(255, 193, 7, 0.1);
            border-color: var(--primary-color);
        }

        .tab-btn.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Styles pour le modal de gestion des produits */
        #productModal .modal-dialog {
            max-width: 500px;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e0e0e0;
            border-radius: var(--border-radius);
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(255, 193, 7, 0.2);
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .form-check-input {
            width: 20px;
            height: 20px;
            accent-color: var(--primary-color);
        }

        /* FACTURE PDF OPTIMISÉE POUR MOBILE */
        .invoice-pdf-mobile {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: white;
            font-family: Arial, sans-serif;
            color: #000;
            font-size: 12px;
            line-height: 1.4;
        }

        .invoice-header-mobile {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--primary-color);
        }

        .company-info-mobile {
            width: 100%;
        }

        .company-logo-mobile {
            font-size: 18px;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .company-contact-mobile {
            font-size: 10px;
            color: #666;
            line-height: 1.3;
        }

        .invoice-title-mobile {
            width: 100%;
        }

        .invoice-title-mobile h1 {
            font-size: 22px;
            font-weight: bold;
            color: var(--primary-dark);
            margin: 0 0 10px 0;
        }

        .invoice-number-mobile {
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .invoice-details-mobile {
            margin: 15px 0;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .client-info-mobile, .order-info-mobile {
            width: 100%;
        }

        .section-title-mobile {
            font-size: 13px;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 8px;
            padding-bottom: 4px;
            border-bottom: 1px solid #eee;
        }

        .invoice-table-mobile {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            font-size: 10px;
        }

        .invoice-table-mobile thead {
            background: var(--primary-color);
        }

        .invoice-table-mobile th {
            padding: 8px 6px;
            text-align: left;
            color: white;
            font-weight: bold;
            border: none;
            font-size: 10px;
        }

        .invoice-table-mobile td {
            padding: 6px;
            border-bottom: 1px solid #ddd;
            font-size: 10px;
        }

        .invoice-table-mobile .text-right {
            text-align: right;
        }

        .invoice-table-mobile .text-center {
            text-align: center;
        }

        .totals-section-mobile {
            margin-top: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 5px;
            border: 1px solid var(--primary-light);
        }

        .total-row-mobile {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
            padding: 4px 0;
            font-size: 11px;
        }

        .grand-total-mobile {
            font-size: 14px;
            font-weight: bold;
            color: var(--primary-dark);
            border-top: 2px solid var(--primary-color);
            border-bottom: none;
            padding-top: 8px;
            margin-top: 8px;
        }

        .footer-mobile {
            margin-top: 25px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
            text-align: center;
            font-size: 9px;
            color: #666;
            line-height: 1.3;
        }

        .stamp-mobile {
            text-align: center;
            margin: 20px auto;
            padding: 15px 25px;
            border: 2px solid var(--primary-color);
            border-radius: 3px;
            display: inline-block;
            transform: rotate(-5deg);
            background: rgba(255, 193, 7, 0.05);
            font-size: 10px;
        }

        .conditions-mobile {
            margin-top: 15px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 3px;
            font-size: 9px;
            line-height: 1.3;
        }

        /* Responsive pour mobile */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                margin-bottom: 1rem;
            }

            .main-content {
                margin-left: 0;
                padding: 1rem;
            }

            .sidebar-menu {
                display: flex;
                overflow-x: auto;
            }

            .sidebar-menu li {
                margin-bottom: 0;
            }

            .sidebar-menu a {
                padding: 0.8rem 1rem;
                white-space: nowrap;
            }

            .dashboard-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .stats-cards {
                grid-template-columns: 1fr;
            }

            .tabs-navigation {
                overflow-x: auto;
                flex-wrap: nowrap;
            }
            
            .invoice-pdf-mobile {
                padding: 15px;
                font-size: 11px;
            }
            
            .invoice-table-mobile {
                font-size: 9px;
            }
            
            .invoice-table-mobile th,
            .invoice-table-mobile td {
                padding: 5px 4px;
                font-size: 9px;
            }
            
            .invoice-title-mobile h1 {
                font-size: 20px;
            }
        }

        @media (max-width: 576px) {
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .action-buttons {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .login-card {
                padding: 25px 20px;
            }
            
            .invoice-pdf-mobile {
                padding: 10px;
                font-size: 10px;
            }
            
            .invoice-table-mobile {
                font-size: 8px;
            }
            
            .invoice-title-mobile h1 {
                font-size: 18px;
            }
        }

        /* Styles spécifiques pour l'impression */
        @media print {
            .invoice-pdf-mobile {
                padding: 10mm !important;
                margin: 0 !important;
                max-width: 100% !important;
                font-size: 10px !important;
            }
            
            .invoice-table-mobile {
                font-size: 9px !important;
            }
            
            .invoice-table-mobile th,
            .invoice-table-mobile td {
                padding: 4px 3px !important;
                font-size: 9px !important;
            }
            
            .sidebar, .page-header, .modal-footer {
                display: none !important;
            }
            
            .modal-body {
                padding: 0 !important;
            }
        }
    </style>
</head>
<body>

    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="spinner"></div>
        <p class="mt-3">Chargement en cours...</p>
    </div>

    <!-- Sidebar (CACHÉE initialement) -->
    @include('partials.sidebar')


    <!-- Main Content (CACHÉ initialement) -->
    <div class="main-content" id="mainContent">

        <!-- Dashboard Tab -->
        <div id="dashboardTab" class="tab-content active">
            <!-- Header -->
            <div class="dashboard-header">
                <h1>Tableau de bord <span class="highlight">Admin</span></h1>
                <div class="user-info">
                    <div class="user-avatar">A</div>
                    <div>
                        <div style="font-weight: 600;" id="userName">Administrateur</div>
                        <div style="font-size: 0.85rem; color: var(--text-light);" id="currentDate">Chargement...</div>
                    </div>
                </div>
            </div>

            <!-- Statistics -->
           @include('partials.stats')

            <!-- Recent Orders -->
            <div class="orders-section">
                <div class="section-header">
                    <h2 class="section-title">Commandes récentes</h2>
                    <div class="btn-group">
                        <button class="btn btn-sm btn-outline-primary" id="refreshOrders">
                            <i class="fas fa-sync-alt me-1"></i> Actualiser
                        </button>
                        <button class="btn btn-sm btn-outline-warning ms-2" id="createTestOrder">
                            <i class="fas fa-plus me-1"></i> Créer commande test
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="orders-table" id="ordersTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Client</th>
                                <th>Articles</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="ordersTableBody">
                            <!-- Les commandes seront chargées ici -->
                        </tbody>
                    </table>
                </div>

                <!-- Empty State -->
                <div class="empty-state" id="emptyState" style="display: none;">
                    <i class="fas fa-shopping-cart"></i>
                    <h3>Aucune commande</h3>
                    <p>Les commandes passées par les clients apparaîtront ici</p>
                </div>
            </div>
        </div>

        <!-- Orders Tab -->
        <div id="ordersTab" class="tab-content">
            <div class="dashboard-header">
                <h1>Gestion des <span class="highlight">Commandes</span></h1>
                <div class="btn-group">
                    <button class="btn btn-primary" onclick="exportOrders()">
                        <i class="fas fa-download me-1"></i> Exporter
                    </button>
                </div>
            </div>

            <div class="orders-section">
                <div class="section-header">
                    <h2 class="section-title">Toutes les commandes</h2>
                    <div class="btn-group">
                        <select class="form-select" id="filterStatus">
                            <option value="all">Tous les statuts</option>
                            <option value="en attente">En attente</option>
                            <option value="en préparation">En préparation</option>
                            <option value="prête">Prête</option>
                            <option value="livrée">Livrée</option>
                            <option value="annulée">Annulée</option>
                        </select>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="orders-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Client</th>
                                <th>Articles</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="allOrdersTable">
                            <!-- All orders will be loaded here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Menu Tab -->
        <div id="menuTab" class="tab-content">
            <div class="dashboard-header">
                <h1>Gestion du <span class="highlight">Menu</span></h1>
                <div class="btn-group">
                    <button class="btn btn-primary" onclick="openProductModal()">
                        <i class="fas fa-plus me-1"></i> Ajouter un produit
                    </button>
                </div>
            </div>

            <div class="orders-section">
                <div class="table-responsive">
                    <table class="orders-table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Catégorie</th>
                                <th>Description</th>
                                <th>Prix</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="menuTableBody">
                            <!-- Menu items will be loaded here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Customers Tab -->
        <div id="customersTab" class="tab-content">
            <div class="dashboard-header">
                <h1>Gestion des <span class="highlight">Clients</span></h1>
                <div class="btn-group">
                    <button class="btn btn-primary" onclick="exportCustomers()">
                        <i class="fas fa-download me-1"></i> Exporter
                    </button>
                </div>
            </div>

            <div class="orders-section">
                <div class="table-responsive">
                    <table class="orders-table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Téléphone</th>
                                <th>Email</th>
                                <th>Commandes</th>
                                <th>Total dépensé</th>
                                <th>Dernière commande</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="customersTableBody">
                            <!-- Customers will be loaded here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Inventory Tab -->
        <div id="inventoryTab" class="tab-content">
            <div class="dashboard-header">
                <h1>Gestion de l'<span class="highlight">Inventaire</span></h1>
                <div class="btn-group">
                    <button class="btn btn-primary" onclick="addInventoryItem()">
                        <i class="fas fa-plus me-1"></i> Ajouter un article
                    </button>
                </div>
            </div>

            <div class="orders-section">
                <div class="table-responsive">
                    <table class="orders-table">
                        <thead>
                            <tr>
                                <th>Article</th>
                                <th>Catégorie</th>
                                <th>Stock actuel</th>
                                <th>Stock minimum</th>
                                <th>Unité</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="inventoryTableBody">
                            <!-- Inventory items will be loaded here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Order Details Modal -->
        <div class="modal fade" id="orderDetailsModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Détails de la commande <span id="modalOrderId"></span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Informations client</h6>
                                <div class="mb-3">
                                    <strong>Nom:</strong> <span id="modalClientName"></span>
                                </div>
                                <div class="mb-3">
                                    <strong>Téléphone:</strong> <span id="modalClientPhone"></span>
                                </div>
                                <div class="mb-3">
                                    <strong>Adresse:</strong> <span id="modalClientAddress"></span>
                                </div>
                                <div class="mb-3">
                                    <strong>Notes:</strong> <span id="modalClientNotes"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6>Détails de la commande</h6>
                                <div class="mb-3">
                                    <strong>Date:</strong> <span id="modalOrderDate"></span>
                                </div>
                                <div class="mb-3">
                                    <strong>Statut:</strong> <span id="modalOrderStatus"></span>
                                </div>
                                <div class="mb-3">
                                    <strong>Total:</strong> <span id="modalOrderTotal"></span>
                                </div>
                            </div>
                        </div>
                        
                        <h6 class="mt-4">Articles commandés</h6>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Article</th>
                                        <th>Prix unitaire</th>
                                        <th>Quantité</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="modalOrderItems">
                                    <!-- Les articles seront ajoutés ici -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" id="btnChangeStatus">
                                <i class="fas fa-edit me-1"></i> Changer statut
                            </button>
                            <button type="button" class="btn btn-success" id="btnGenerateInvoice" onclick="generateInvoiceForOrder(selectedOrderId)">
                                <i class="fas fa-file-pdf me-1"></i> Facture PDF
                            </button>
                            <button type="button" class="btn btn-danger" id="btnCancelOrder">
                                <i class="fas fa-times me-1"></i> Annuler
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Invoice Modal -->
        <div class="modal fade" id="invoiceModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-warning text-dark">
                        <h5 class="modal-title">
                            <i class="fas fa-file-invoice me-2"></i>Facture <span id="invoiceModalNumber"></span>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="invoiceContent" style="background: white; max-width: 800px; margin: 0 auto;">
                            <!-- Le contenu de la facture sera injecté ici -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i> Fermer
                        </button>
                        <button type="button" class="btn btn-primary" onclick="downloadInvoicePDF()">
                            <i class="fas fa-download me-1"></i> Télécharger PDF
                        </button>
                        <button type="button" class="btn btn-success" onclick="printInvoice()">
                            <i class="fas fa-print me-1"></i> Imprimer
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productModalTitle">Ajouter un produit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="productForm">
                            <input type="hidden" id="productId">
                            <div class="form-group">
                                <label class="form-label" for="productName">Nom du produit *</label>
                                <input type="text" class="form-control" id="productName" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="productCategory">Catégorie *</label>
                                <select class="form-control" id="productCategory" required>
                                    <option value="">Sélectionner une catégorie</option>
                                    <option value="Plats principaux">Plats principaux</option>
                                    <option value="Entrées">Entrées</option>
                                    <option value="Desserts">Desserts</option>
                                    <option value="Boissons">Boissons</option>
                                    <option value="Apéritifs">Apéritifs</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="productDescription">Description</label>
                                <textarea class="form-control" id="productDescription" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="productPrice">Prix (FCFA) *</label>
                                <input type="number" class="form-control" id="productPrice" min="0" step="100" required>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="productAvailable" checked>
                                <label class="form-check-label" for="productAvailable">
                                    Disponible à la vente
                                </label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-primary" onclick="saveProduct()">Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>