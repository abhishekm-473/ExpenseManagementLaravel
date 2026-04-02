<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class IncomeTrackingController extends Controller
{
    public function incomeTrackingIndex(Request $request):View{
        $incomes = Income::where('user_id',Auth::id())
                            ->orderBy('income_date','asc')
                            ->get();
        return view('incomeTracking', compact('incomes'));
    }

    public function incomeTrackingIndexPost(Request $request){
        
        $validate = $request->validate([
            'income_date' => 'required',
            'amount' => 'required',
            'type' => 'required',
            'note' =>'nullable',
            'description' => 'nullable'
        ]);

        Auth::user()->income()->create($validate);
        
        return redirect()->route('incomeTracking');

    }

    public function destroy($id){
        $income = Income::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();
        $income->delete();
        return redirect()->route('incomeTracking');
    }

}
