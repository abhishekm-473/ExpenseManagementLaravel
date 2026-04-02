@include('partials.header')
<head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <style>
        :root {
            --primary-purple: #6a1b9a;
            --light-background: #f3e5f5;
        }
        
        body {
            background-color: var(--light-background);
            margin: 0;
            min-height: 100vh;
        }
        .vh-100-adjusted {
            min-height: calc(100vh - 56px);
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .login-card {
            max-width: 400px;
            width: 90%;
            padding: 2.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            border-radius: 1rem;
        }
        
        .btn-purple {
            background-color: var(--primary-purple);
            border-color: var(--primary-purple);
            color: white;
            transition: background-color 0.2s ease;
        }
        
        .btn-purple:hover {
            background-color: #501375;
            border-color: #501375;
            color: white;
        }

        .text-purple {
            color: var(--primary-purple) !important;
        }


        .input-group #togglePassword {
            background-color: transparent;
            border-left: none; 
            border-color: #ced4da;
            color: #6c757d;
            padding-left: 0.75rem;
            padding-right: 0.75rem;
        }

        .input-group #togglePassword:hover {
            background-color: #e9ecef; 
            color: #495057; 
        }


        .input-group #password {
            border-right: none;
        }

        .input-group:not(.has-validation) > .form-control:not(:last-child) {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .input-group:not(.has-validation) > #togglePassword:last-child {
            border-top-right-radius: 0.375rem;
            border-bottom-right-radius: 0.375rem;
        }

    </style>
</head>

<body>
    @include('partials.MasterNav')

    <div class="d-flex justify-content-center align-items-center vh-100-adjusted">
        <div class="card login-card">
            <div class="card-body">
                <h2 class="card-title text-center mb-4 text-purple">OPEN Tracker Login</h2>
                
                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="userId" class="form-label">User ID (or Email)</label>
                        <input type="email" class="form-control" id="userId" name="email" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input 
                                type="password" 
                                class="form-control" 
                                id="password" 
                                name="password" 
                                required
                                autocomplete="current-password"
                            >
                            <button 
                                class="btn btn-outline-secondary" 
                                type="button" 
                                id="togglePassword" 
                                title="Show/Hide Password"
                            >
                                <i class="fa-solid fa-eye-slash" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3 text-end">
                        <a href="/forgot-password" class="text-decoration-none text-purple">Forgot Password?</a>
                    </div>
                    
                    <div class="d-grid gap-2 mb-4">
                        <button type="submit" class="btn btn-purple btn-lg">Log In</button>
                    </div>
                    
                    <hr>

                    <p class="text-center text-muted mb-3">Don't have an account?</p>
                    <div class="d-grid">
                        <a href="{{ route('register') }}" class="btn btn-outline-secondary">
                            Sign Up Now
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div> 
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon'); 

            togglePassword.addEventListener('click', function () {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                
                if (type === 'text') {
                    toggleIcon.classList.remove('fa-eye-slash');
                    toggleIcon.classList.add('fa-eye'); 
                } else {
                    toggleIcon.classList.remove('fa-eye');
                    toggleIcon.classList.add('fa-eye-slash');
                }
            });
        });

        let timeout;

        function resetTimer(){
            clearTimeout(timeout);
            timeout = setTimeout(()=>{
                location.reload();
            },60000);
        }

        window.onload = resetTimer;
        document.onmousemove = resetTimer;
        document.onclick = resetTimer;
        document.onscroll = resetTimer;

    </script>

</body>
</html>