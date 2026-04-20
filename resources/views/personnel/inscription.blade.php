<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Admin Casa Mia</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
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
            background: linear-gradient(135deg, var(--secondary-color) 0%, #000000 100%);
            color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: var(--border-radius);
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .brand-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .brand-logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: var(--secondary-color);
            box-shadow: 0 5px 15px rgba(255, 193, 7, 0.3);
        }

        .brand-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: white;
            margin-bottom: 5px;
        }

        .brand-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        .highlight {
            color: var(--primary-color);
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
            font-size: 0.95rem;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius);
            color: white;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(255, 193, 7, 0.2);
            background: rgba(255, 255, 255, 0.12);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .input-with-icon {
            position: relative;
        }

        .input-with-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.5);
            transition: var(--transition);
        }

        .input-with-icon input {
            padding-left: 45px;
        }

        .input-with-icon input:focus + i {
            color: var(--primary-color);
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: var(--transition);
        }

        .password-toggle:hover {
            color: var(--primary-color);
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            font-size: 0.9rem;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.8);
        }

        .remember-me input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: var(--primary-color);
        }

        .forgot-password {
            color: var(--primary-color);
            text-decoration: none;
            transition: var(--transition);
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .login-btn {
            width: 100%;
            padding: 14px;
            background: var(--primary-color);
            color: var(--secondary-color);
            border: none;
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .login-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(255, 193, 7, 0.3);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .login-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .alert {
            padding: 15px;
            border-radius: var(--border-radius);
            margin-bottom: 25px;
            display: none;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.2);
            border: 1px solid rgba(220, 53, 69, 0.3);
            color: #f8d7da;
        }

        .alert-success {
            background: rgba(40, 167, 69, 0.2);
            border: 1px solid rgba(40, 167, 69, 0.3);
            color: #d4edda;
        }

        .back-to-site {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .back-to-site a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .back-to-site a:hover {
            color: var(--primary-color);
        }

        .login-footer {
            text-align: center;
            margin-top: 30px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.85rem;
        }

        /* Responsive */
        @media (max-width: 576px) {
            .login-card {
                padding: 30px 20px;
            }
            
            .brand-title {
                font-size: 1.7rem;
            }
            
            .remember-forgot {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
        }

        /* Loading animation */
        .spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: var(--secondary-color);
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="brand-header">
                <div class="brand-logo">
                    <i class="fas fa-utensils"></i>
                </div>
                <h1 class="brand-title"><span class="highlight">Casa</span> Mia</h1>
                <p class="brand-subtitle">Administration du restaurant</p>
            </div>

            <div class="alert alert-danger" id="errorAlert">
                <i class="fas fa-exclamation-circle me-2"></i>
                <span id="errorMessage"></span>
            </div>

            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('personnel.store') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="username">
                        <i class="fas fa-user me-2"></i>Nom complet
                    </label>
                    <div class="input-with-icon">
                        <input type="text" name="name" class="form-control" placeholder="Entrez votre nom complet" autocomplete="nmae">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="username">
                        <i class="fas fa-user me-2"></i>Email
                    </label>
                    <div class="input-with-icon">
                        <input type="email" name="email" class="form-control" placeholder="Entrez votre email" autocomplete="email">
                        <i class="fas fa-user"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">
                        <i class="fas fa-lock me-2"></i>Mot de passe
                    </label>
                    <div class="input-with-icon">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Entrez votre mot passe" required autocomplete="current-password">
                        <i class="fas fa-lock"></i>
                        <button type="button" class="password-toggle" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password_confirmation"> Confirmer votre Mot de Passe</label>
                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirmez votre mot passe" required autocomplete="new-password">
                </div>

                <div class="remember-forgot">
                    
                    <a href="{{ route('login.index') }}" class="forgot-password" id="forgotPassword">
                        J'ai deja un compte ?
                    </a>
                </div>

                <button type="submit" class="login-btn" id="loginBtn">
                    <span id="btnText">Se connecter</span>
                    <div class="spinner" id="loginSpinner" style="display: none;"></div>
                </button>
            </form>

            <div class="back-to-site">
                <a href="index.html">
                    <i class="fas fa-arrow-left"></i>
                    Retour au site public
                </a>
            </div>
        </div>

        <div class="login-footer">
            <p>&copy; <?= now()->year ?> Casa Mia Restaurant. Tous droits réservés.</p>
        </div>
    </div>

    <script>


        // Basculer la visibilité du mot de passe
        function togglePasswordVisibility() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            const icon = togglePasswordBtn.querySelector('i');
            icon.className = type === 'password' ? 'fas fa-eye' : 'fas fa-eye-slash';
        }

        // Masquer l'erreur
        function hideError() {
            errorAlert.style.display = 'none';
        }
   

        // Ajouter l'animation de secousse
        const style = document.createElement('style');
        style.textContent = `
            .shake {
                animation: shake 0.5s ease-in-out;
            }
            
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
                20%, 40%, 60%, 80% { transform: translateX(5px); }
            }
        `;
        document.head.appendChild(style);

        // Événements
        document.addEventListener('DOMContentLoaded', function() {
            checkIfLoggedIn();
            restoreCredentials();
            
            // Focus sur le champ username si vide
            if (!usernameInput.value) {
                usernameInput.focus();
            }
        });

        togglePasswordBtn.addEventListener('click', togglePasswordVisibility);
        
        loginForm.addEventListener('submit', handleLogin);
        
        forgotPasswordLink.addEventListener('click', handleForgotPassword);
        
        // Masquer l'erreur quand l'utilisateur commence à taper
        usernameInput.addEventListener('input', hideError);
        passwordInput.addEventListener('input', hideError);
        
        // Entrer avec la touche Entrée
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                if (!loginBtn.disabled) {
                    loginForm.requestSubmit();
                }
            }
        });
    </script>
</body>
</html>