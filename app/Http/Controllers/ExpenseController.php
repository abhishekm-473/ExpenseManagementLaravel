<?php

namespace App\Http\Controllers;

use App\Models\Expense;
// use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class ExpenseController extends Controller
{
    public function expenseIndex(Request $request){
        $expenses = Expense::where('user_id', Auth::id())
                    ->orderBy('created_at','asc')
                    ->get();
        return view('expense', compact('expenses'));
    }

    public function expenseTrackingIndexPost(Request $request){
        Log::info('reached the controller');
        $validate = $request->validate([
            'expense_date' => 'required',
            'amount' => 'required',
            'category' => 'required',
            'account' => 'required',
            'note' => 'nullable'
        ]);

       Auth::user()->expense()->create($validate);

        return redirect()->route('expense');
   
    }

    public function expenseDestroy($id){
        $expense = Expense::find($id);
        $expense->delete();
        return redirect()->route('expense');
    }
    
}
