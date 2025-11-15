<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$stmt=$mysqli->prepare("SELECT username,email,password,id FROM admin WHERE (userName=?|| email=?) and password=? ");
				$stmt->bind_param('sss',$username,$username,$password);
				$stmt->execute();
				$stmt -> bind_result($username,$username,$password,$id);
				$rs=$stmt->fetch();
				$_SESSION['id']=$id;
				$uip=$_SERVER['REMOTE_ADDR'];
				$ldate=date('d/m/Y h:i:s', time());
				if($rs)
				{
                //  $insert="INSERT into admin(adminid,ip)VALUES(?,?)";
   // $stmtins = $mysqli->prepare($insert);
   // $stmtins->bind_param('sH',$id,$uip);
    //$res=$stmtins->execute();
					header("location:dashboard.php");
				}

				else
				{
					echo "<script>alert('Invalid Username/Email or password');</script>";
				}
			}
				?>

<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="Admin login - Sharada Boys Hostel">
    <meta name="author" content="">

    <title>Admin Login | Sharada Boys Hostel</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom Modern CSS -->
    <link rel="stylesheet" href="css/modern-style.css">

    <style>
        body{
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(78,115,223,.95), rgba(28,200,138,.95)), url('img/login-bg.jpg') center/cover no-repeat fixed;
        }
        .auth-wrapper{ max-width: 980px; width: 100%; padding: 1rem; }
        .auth-card{
            background: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 1rem 2rem rgba(0,0,0,.15);
            overflow: hidden;
        }
        .auth-left{
            background: linear-gradient(135deg, #4e73df, #36b9cc);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 3rem 2rem;
        }
        .auth-left .title{ font-weight: 700; letter-spacing: .5px; }
        .auth-left .subtitle{ opacity: .9; }
        .auth-form{ padding: 2rem; }
        .form-control{ padding: .9rem 1rem; border-radius: .75rem; border: 1px solid #d1d3e2; }
        .form-control:focus{ border-color: #bac8f3; box-shadow: 0 0 0 .2rem rgba(78,115,223,.2); }
        .input-group-text{ background: #f8f9fc; border: 1px solid #d1d3e2; border-right: none; }
        .btn-login{ background: linear-gradient(135deg, #4e73df, #36b9cc); border: none; padding: .9rem; border-radius: .75rem; font-weight: 600; }
        .btn-login:hover{ filter: brightness(.95); transform: translateY(-1px); }
        .brand{ font-weight: 800; color: #224abe; }
        .helper-links a{ color: #4e73df; text-decoration: none; }
        .helper-links a:hover{ text-decoration: underline; }
        @media (max-width: 767.98px){ .auth-left{ display:none; } .auth-form{ padding: 1.5rem; } }
    </style>
</head>
<body>
    <div class="auth-wrapper">
        <div class="row g-0 auth-card">
            <div class="col-md-6 auth-left">
                <div>
                    <img src="img/logo.jpg" alt="Hostel Logo" class="mb-3" style="max-width:80px;border-radius:8px;">
                    <h2 class="title mb-2">Welcome to Sharda Boys Hostel</h2>
                    <p class="subtitle mb-3">Secure Admin Portal</p>
                    <p class="small" style="max-width: 460px; margin: 0 auto;">
                        Sharda Boys Hostel, located near AKS University, provides secure, affordable, and student-friendly
                        accommodation with modern facilities.
                    </p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="../index.php" class="btn btn-light btn-sm"><i class="fa-solid fa-house me-1"></i> Home</a>
                        <a href="#" class="btn btn-outline-light btn-sm"><i class="fa-solid fa-circle-info me-1"></i> About</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="auth-form">
                    <div class="text-center mb-3">
                        <img src="img/login-bg.jpg" alt="Hostel Room" style="max-width: 100%; border-radius: .75rem; box-shadow: 0 .5rem 1.25rem rgba(0,0,0,.12);">
                    </div>
                    <h3 class="brand mb-1">Admin Login</h3>
                    <p class="text-muted mb-4">Sign in to manage hostel operations</p>

                    <form action="" method="post">
                        <div class="mb-3">
                            <label class="form-label">Your Username or Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                <input type="text" placeholder="Username or Email" name="username" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <input type="password" placeholder="Password" name="password" class="form-control" required>
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <input type="submit" name="login" class="btn btn-primary btn-login" value="login">
                        </div>

                        <div class="d-flex justify-content-between mt-3 helper-links">
                            <a href="#">Forgot password?</a>
                            <a href="../index.php">Back to Home</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>