<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BudgetsCategoriesController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeTrackingController;
use App\Http\Controllers\ReportsAndAnalyticsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserWelcomeController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class,'welcomeIndex'])->name('welcome');

Route::middleware('guest')->group(function(){

    Route::get('/login',[UserController::class,'loginIndex'])->name('login');
    Route::post('/login',[UserController::class,'loginIndexPost'])->name('login.post');
    Route::get('/register',[UserController::class,'registerIndex'])->name('register');
    Route::post('/register','App\Http\Controllers\UserController@registerIndexPost')->name('register.post');
});

Route::middleware('auth')->group(function(){

   
    //BudgetsCategories
    Route::get('/budgetsCategories',[BudgetsCategoriesController::class,'budgetsCategoriesIndex'])->name('budgetsCategories');
    Route::post('/budgetsCategories',[BudgetsCategoriesController::class,'budgetsCategoriesIndexPost'])->name('budgetsCategoriesIndexPost');

    //IncomeTracking
    Route::get('/incomeTracking', [IncomeTrackingController::class,'incomeTrackingIndex'])->name('incomeTracking');
    Route::post('/incomeTracking', [IncomeTrackingController::class, 'incomeTrackingIndexPost'])->name('incomeTrackingPost');
    Route::delete('/incomes/{id}', [IncomeTrackingController::class, 'destroy'])->name('income.destroy');

     //expense
    Route::get('/expense',  [ExpenseController::class,'expenseIndex'])->name('expense');
    Route::post('/expense', [ExpenseController::class, 'expenseTrackingIndexPost'])->name('expenseTrackingPost');
    Route::delete('/expense/{id}', [ExpenseController::class,'expenseDestroy'])->name('expenseDestroy');
    

    //ReportsAndAnalytics
    Route::get('/report-analytics',[ReportsAndAnalyticsController::class,'reportsIndex'])->name('reportsAndAnalytics');
    Route::get('/reports/category-data', [ReportsAndAnalyticsController::class, 'categoryData'])->name('reports.categoryData');
    Route::get('/reports/export-csv', [ReportsAndAnalyticsController::class, 'exportCSV'])->name('reports.exportCSV');
    
    //userwelcome
    Route::get('/userWelcome',[UserWelcomeController::class,'userWelcomeIndex'])->name('userWelcome');

    //logoutindex
    Route::get('/logout',[UserController::class,'logoutIndex'])->name('logout');
});

Route::get('query', function(){return view('query');});



Route::get('/about',  [AboutController::class,'aboutIndex'])->name('about');







