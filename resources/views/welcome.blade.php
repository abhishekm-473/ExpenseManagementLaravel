 @include('partials.header')
 @include('partials.MasterNav') 
    <style>
        :root {
            --secondary-purple: #e8d9f5; /* Provide a fallback or correct definition */
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.7;
            background-color: var(--secondary-purple); /* This will now work */
        }
    </style>
<body>
    <h1 style=" color: purple; padding-left: 460px;">Track Your Money Effortlessly</h1>
    
    <img src="https://supersourcing.com/case-studies/img/bannar/open.webp" alt="A description of the image" style="display: block; width: 50%; margin: 0 auto;">
    <div class="blog-container">
        
        <header class="text-center mb-5">
            <h1 class="display-5" style="color: #6a1b9a;">Our Story: Building OPEN Tracker 💜</h1>
            <p class="lead text-muted">A clear financial picture shouldn't be complicated. Here's why we built the tool you need.</p>
            <hr>
        </header>

        <section class="mb-5 p-4 rounded" style="background-color: #f3e5f5; border-left: 5px solid #4B0082;">
            <h2 style="color: #4B0082;"><i class="fas fa-lightbulb me-2"></i> Our Founding Philosophy</h2>
            
            <h3 class="mt-4" style="font-size: 1.25rem; font-weight: 600;">The Idea Behind OPEN Tracker:</h3>
            <p>We started OPEN Tracker because we were frustrated. We found existing money trackers to be overly complex, cluttered, and often judgmental. Our mission was simple: **to build the app we wished we had.** An app that makes financial clarity accessible, not intimidating. We believe everyone deserves to know where their money goes, **effortlessly.**</p>
            
            <h3 class="mt-4" style="font-size: 1.25rem; font-weight: 600;">Our Core Belief:</h3>
            <p>"Financial health should be transparent. That's why we created a tool that finds the **'open'** spaces in your finances—the room for growth, savings, and peace of mind. Our approach is built on **simplicity, precision, and trust.**"</p>
        </section>

        <section class="mb-5 p-4">
            <h2 style="color: #6a1b9a;"><i class="fas fa-users-cog me-2"></i> Focus on Team and Technology</h2>

            <div class="row mt-4">
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100 p-3">
                        <div class="card-body">
                            <h4 class="card-title text-center" style="color: #4B0082;"><i class="fas fa-desktop me-2"></i> Built by Users, For Users</h4>
                            <p class="card-text">OPEN Tracker is developed by a small team of financial analysts and software engineers who are also committed users of the app. Every feature, from lightning-fast expense logging to secure reports, is designed with **real-life money management needs** at its core.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100 p-3">
                        <div class="card-body">
                            <h4 class="card-title text-center" style="color: #4B0082;"><i class="fas fa-lock me-2"></i> Security & Reliability</h4>
                            <p class="card-text">Your financial data is sensitive, and we treat it that way. We use **bank-level encryption** and adhere to strict privacy policies. OPEN Tracker is a tool you can rely on, today and tomorrow, backed by a commitment to **constant improvement and data security.**</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="cta-section">
            <h2 class="mb-3" style="color: #535353ff;"><i class="fas fa-chart-line me-2"></i> Committed to Your Growth</h2>
            <p class="lead" style="color:#5c5b5bff;">We're not just providing a service; we're investing in your financial future. As OPEN Tracker grows, we will continue to roll out intelligent new features—like advanced savings goals and investment tracking—all while maintaining the core simplicity you love.</p>
            <p class="lead fw-bold" style="color: #5c5b5bff;">**Your journey to financial mastery is our focus.**</p>
        </section>

    </div> 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
</body>
</html>