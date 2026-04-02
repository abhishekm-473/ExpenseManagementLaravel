 @include('partials.header')
 @include('partials.MasterNav') 
<body>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>

        :root {
            --primary-purple: #6a1b9a; 
            --secondary-purple: #e8d9f5; 
            --accent-indigo: #4B0082; 
            --light-background: #fdfdfd; 
        }


        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.7;
            background-color: var(--secondary-purple); 
        }
        .blog-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 40px;
            background-color: var(--light-background);
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15); 
        }
        
        
        h1, h2, h3 {
            color: var(--primary-purple);
            font-weight: 700;
        }
        h1 {
            border-bottom: 4px solid var(--primary-purple); 
            padding-bottom: 15px;
            margin-bottom: 30px;
            text-align: center;
            letter-spacing: 0.5px;
        }
        .lead {
            font-size: 1.35rem;
            color: #4b5563;
        }

        
        .feature-list {
            list-style-type: none;
            padding-left: 0;
        }
        .feature-list li {
            margin-bottom: 15px;
            padding: 10px 15px;
            background-color: #f3e5f5; 
            border-left: 5px solid var(--accent-indigo);
            border-radius: 4px;
        }
        .feature-icon {
            color: var(--accent-indigo);
            margin-right: 10px;
            font-size: 1.1em;
        }
        
        
        .btn-indigo {
            background-color: var(--accent-indigo); 
            border-color: var(--accent-indigo);
            color: #ffffff;
            font-weight: bold;
            padding: 12px 30px;
            box-shadow: 0 4px 10px rgba(75, 0, 130, 0.4);
            transition: all 0.3s ease;
        }
        .btn-indigo:hover {
            background-color: #5d00a8; 
            border-color: #5d00a8;
            color: #ffffff;
            transform: translateY(-2px); /
            box-shadow: 0 6px 15px rgba(75, 0, 130, 0.6);
        }

       
        .cta-section {
            background-color: var(--primary-purple); 
            background: linear-gradient(135deg, #7b1fa2, #4a148c); /* Gradient background */
            padding: 40px;
            border-radius: 12px;
            text-align: center;
            margin-top: 50px;
            color: #ffffff;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        .cta-section h2 {
            color: #fff;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="blog-container">
        
        <header>
            <h1 class="display-5">💰 Track Every Rupee: Welcome to OPEN Tracker!</h1>
            <p class="lead text-center">Tired of wondering where your hard-earned money disappears every month? You're not alone. That's why we built **OPEN Tracker**—a powerful and intuitive platform designed to give you complete visibility and control over your finances.</p>
            <hr>
        </header>

        <section>
            <h2 class="mt-5 mb-4 text-center">🎯 What OPEN Tracker Will Do for You</h2>
            <p class="text-center text-muted">Our goal is simple: to transform confusing financial data into clear, actionable information.</p>

            <h3 class="mt-5"><i class="feature-icon fas fa-file-invoice-dollar"></i> 1. Simple, Comprehensive Expense Logging</h3>
            <p>Forget messy spreadsheets and lost receipts. OPEN Tracker lets you log every transaction quickly and easily:</p>
            <ul class="feature-list">
                <li><i class="feature-icon fas fa-mobile-alt"></i> <strong>Quick Entry:</strong> Log expenses on the go via our mobile-optimized interface.</li>
                <li><i class="feature-icon fas fa-tag"></i> <strong>Detailed Categories:</strong> Clearly see what you're spending money on, across categories like **Food**, **Transport**, **Entertainment**, and **Bills**.</li>
                <li><i class="feature-icon fas fa-route"></i> <strong>Route-Based Tracking:</strong> Track costs related to daily commutes, fuel, or ride-shares, making it easy to calculate true travel costs.</li>
            </ul>

            <h3 class="mt-5"><i class="feature-icon fas fa-chart-pie"></i> 2. Intelligent Budget Management</h3>
            <p>Budgets shouldn't feel restrictive; they should be guides. Setting and sticking to your budget is easier than ever with OPEN Tracker.</p>
            <ul class="feature-list">
                <li><i class="feature-icon fas fa-piggy-bank"></i> <strong>Category Budgets:</strong> Set specific spending limits for each category. </li>
                <li><i class="feature-icon fas fa-bell"></i> <strong>Real-Time Alerts:</strong> Get instant notifications when you are approaching or exceed a budget limit.</li>
                <li><i class="feature-icon fas fa-layer-group"></i> <strong>Budget Dropdown Menus:</strong> Jump directly to specific budget reports instantly via our organized navigation.</li>
            </ul>

            <h3 class="mt-5"><i class="feature-icon fas fa-chart-bar"></i> 3. Powerful Reports and Analytics</h3>
            <p>The real value of tracking comes from the insights you gain. OPEN Tracker gives you the clarity you need to change your habits.</p>
            <ul class="feature-list">
                <li><i class="feature-icon fas fa-eye"></i> <strong>Visual Reports:</strong> View stunning graphs and charts that show your spending trends over time.</li>
                <li><i class="feature-icon fas fa-arrows-alt-h"></i> <strong>Comparative Analytics:</strong> Compare current performance against previous months or your set budget.</li>
                <li><i class="feature-icon fas fa-hand-holding-usd"></i> <strong>Net Flow Summary:</strong> Quickly visualize your total income versus total expenses to understand your true financial status.</li>
            </ul>

            <h3 class="mt-5"><i class="feature-icon fas fa-lock"></i> 4. Seamless User Experience</h3>
            <p>We believe financial tracking should be a smooth, enjoyable part of your routine.</p>
            <ul class="feature-list">
                <li><i class="feature-icon fas fa-route"></i> <strong>Intuitive Navigation:</strong> Our clean interface ensures you spend less time navigating and more time saving.</li>
                <li><i class="feature-icon fas fa-shield-alt"></i> <strong>Always Secure:</strong> We prioritize the security of your financial data with robust encryption and privacy measures.</li>
            </ul>
        </section>
         @guest
        <div class="cta-section">
            <h2 class="mb-4">🚀 Ready to Find the "Open" Space in Your Budget?</h2>
            <p class="lead mb-4" style="color:#f3e5f5;">Stop guessing and start knowing. OPEN Tracker is here to simplify your money life, highlight the areas where you can save, and put you firmly in the driver's seat of your financial future.</p>
            <a href="{{ route('register') }}" class="btn btn-indigo btn-lg shadow-sm">
                <i class="fas fa-arrow-alt-circle-right"></i> Sign Up for OPEN Tracker Today!
            </a>
        </div>
        @endguest
        
        
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</body>
</html>