<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use App\Models\Budget;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
     class BudgetsCategoriesController extends Controller{
        public function budgetsCategoriesIndex(Request $request){
            return view('budgetsCategories');
        }

        public function budgetsCategoriesIndexPost(Request $request){
            $validated= $request->validate([
                'monthly_food_budget' => 'required',
                'monthly_transport_budget' => 'required',
                'monthly_entertainment_budget' =>'required',
                'monthly_bills_budget' => 'required',
                'daily_food_budget' => 'required',
                'daily_transport_budget' => 'required',
                'daily_entertainment_budget' => 'required',
                'daily_bills_budget' => 'required'
            ]);

            Auth::user()->budgets()->create($validated);

            return redirect()->route('budgetsCategories');


        }

        
     }

    
     