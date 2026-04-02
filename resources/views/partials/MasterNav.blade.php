<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6a1b9a;">
      <div class="container-fluid">
        <a class="navbar-brand" href="">OPEN Tracker</a> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        @auth
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link {{ Route::is('userWelcome') ? 'active' : '' }}" aria-current="page" href="{{ route('userWelcome') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Route::is('budgetsCategories') ? 'active' :'' }} " href="{{ route('budgetsCategories') }}" >
                Budgets Categories
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Route::is('incomeTracking') ? 'active' : '' }}" href="{{ route('incomeTracking') }}">Income Tracking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Route::is('expense') ? 'active' : '' }}" href="{{ route('expense') }}">Expense</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Route::is('reportsAndAnalytics') ? 'active' : '' }}" href="{{ route('reportsAndAnalytics') }}">Reports and Analytics</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ route::is('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
            </li>
          </ul>
          <form class="d-flex ms-auto w-50" role="search" style="max-width: 400px;">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
            <button class="btn btn-outline-light me-4" type="submit">Search</button>
          </form>
          <a class="btn btn-outline-light" type="submit" href="{{ route('logout') }}">Logout</a>
          @endauth

          @guest
            <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6a1b9a; width: 100%;">
                <div class="container-fluid">

                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link {{ Route::is('welcome') ? 'active' :'' }}" aria-current="page" href="{{ route('welcome') }}">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ Route::is('about') ? 'active' :'' }}" href="{{ route('about') }}">About</a>
                      </li>
                    </ul>

                    <div class="d-flex ms-auto align-items-center">
                      <form class="d-flex me-3" role="search" style="max-width: 700px;">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-outline-light" type="submit">Search</button>
                      </form>
                      <a class="btn btn-outline-light" href="{{ route('login') }}">LOGIN</a>
                    </div>

                  </div>
                </div>
            </nav>

            </nav>
          @endguest

        </div>
      </div>
    </nav>



     
