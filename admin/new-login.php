<?php
session_start();
include('includes/config.php');

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $stmt = $mysqli->prepare("SELECT username, email, password, id FROM admin WHERE (userName=? OR email=?) AND password=?");
    $stmt->bind_param('sss', $username, $username, $password);
    $stmt->execute();
    $stmt->bind_result($username, $email, $password, $id);
    $rs = $stmt->fetch();
    $_SESSION['id'] = $id;
    $uip = $_SERVER['REMOTE_ADDR'];
    $ldate = date('d/m/Y h:i:s', time());
    
    if($rs) {
        // Log successful login
        $insert = "INSERT INTO adminlog(adminId, ip, loginTime) VALUES(?, ?, ?)";
        $stmtins = $mysqli->prepare($insert);
        $stmtins->bind_param('iss', $id, $uip, $ldate);
        $stmtins->execute();
        
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid Username/Email or password";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hostel Management System</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background:
                linear-gradient(rgba(13,27,42,.6), rgba(13,27,42,.6)),
                url('img/admin-login-bg.jpg') center/cover no-repeat fixed;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 400px;
            width: 90%;
            margin: 0 auto;
            animation: fadeIn 0.5s ease-out;
        }
        
        .login-card-header {
            background: #4e73df;
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        
        .login-card-header h2 {
            margin: 0;
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        .login-card-body {
            padding: 2rem;
        }
        
        .form-control {
            border-radius: 0.35rem;
            padding: 0.75rem 1rem;
            border: 1px solid #d1d3e2;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: #bac8f3;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        
        .form-floating > label {
            padding: 1rem 1rem;
        }
        
        .btn-login {
            background: #4e73df;
            border: none;
            border-radius: 0.35rem;
            padding: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s;
        }
        
        .btn-login:hover {
            background: #2e59d9;
            transform: translateY(-2px);
        }
        
        .form-text a {
            color: #4e73df;
            text-decoration: none;
        }
        
        .form-text a:hover {
            text-decoration: underline;
        }
        
        .error-message {
            color: #e74a3b;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .input-group-text {
            background-color: #f8f9fc;
            border: 1px solid #d1d3e2;
            border-right: none;
        }
        
        .input-group .form-control {
            border-left: none;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-card-header">
            <h2><i class="fas fa-hotel me-2"></i> Hostel MS</h2>
            <p class="mb-0">Welcome back! Please login to your account.</p>
        </div>
        <div class="login-card-body">
            <?php if(isset($error)): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i> <?php echo $error; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            
            <form method="post" action="">
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username or Email" required>
                    </div>
                </div>
                
                <div class="mb-4">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                
                <div class="d-grid mb-3">
                    <button type="submit" name="login" class="btn btn-primary btn-login">
                        <i class="fas fa-sign-in-alt me-2"></i> Login
                    </button>
                </div>
                
                <div class="text-center">
                    <a href="forgot-password.php" class="text-decoration-none">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Add animation to form elements
        document.addEventListener('DOMContentLoaded', function() {
            const formElements = document.querySelectorAll('.form-control');
            formElements.forEach((element, index) => {
                element.style.animation = `fadeIn 0.5s ease-out ${index * 0.1}s forwards`;
                element.style.opacity = '0';
            });
            
            // Add focus effects
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.boxShadow = '0 0 0 0.25rem rgba(78, 115, 223, 0.1)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.boxShadow = 'none';
                });
            });
        });
    </script>
</body>
</html>
