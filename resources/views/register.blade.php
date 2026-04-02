@include ('partials.header')
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

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-purple {
            background-color: #8a2be2; 
            border-color: #8a2be2;
            color: white;
        }
        .btn-purple:hover {
            background-color: #9932cc;
            border-color: #9932cc;
        }

        .container.my-5 {
            padding-top: 50px; 
        }
    </style>
</head>
<body>
    
    @include('partials/MasterNav')
    
    <div class="container my-5">
        <div class="card p-4 mx-auto" style="max-width: 600px;">
            <div class="card-header bg-white border-0 text-center">
                <h2 class="text-purple" style="color: #6a0dad;">Create an Account</h2>
                <p class="text-muted">Join us today!</p>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register.post') }}">
                     @csrf
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="first_name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="last_name" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone_number" placeholder="12345-67890" name="phone_number" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" id="state" name="state" required>
                        </div>
                        <div class="col-md-6">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control" id="country" name="country" required>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-purple btn-lg">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>