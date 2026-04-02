<?php
    namespace App\Http\Controllers;

    use App\Models\Expense;
    use App\Models\Income;
    use DB;
    use Illuminate\Http\Request;


    class ReportsAndAnalyticsController extends Controller{
        public function reportsIndex(Request $request)
        {
            $userId = auth()->id();
            $month = $request->get('month',now()->month);
            $year = $request->get('year',now()->year);

            $monthlyTotalExpense = Expense::where('user_id',$userId)
                                ->whereYear('expense_date',$year)
                                ->whereMonth('expense_date',$month)
                                ->sum('amount');

            $monthlyTotalIncome = Income::where('user_id',$userId)
                                ->whereYear('income_date',$year)
                                ->whereMonth('income_date',$month)
                                ->sum('amount');

            $categoryBreakdown = Expense::where('user_id',$userId)
                                ->whereYear('expense_date',$year)
                                ->whereMonth('expense_date',$month)
                                ->select('category', DB::raw('SUM(amount) as Total'))
                                ->groupBy('category')
                                ->orderByDesc('Total')
                                ->get();
                            
            return view('reportsAndAnalytics',[
                'month' => $month,
                'year' => $year,
                'monthly_total_expense' => $monthlyTotalExpense,
                'monthly_total_income' => $monthlyTotalIncome,
                'category_breakdown' => $categoryBreakdown,
            ]);
        }

        public function categoryData(Request $request){
            $userId = auth()->id();

            $categoryBreakdown = Expense::where('user_id',$userId)
                                ->select('category',DB::raw('SUM(amount) as total'))
                                ->groupBy('category')
                                ->orderByDesc('total')
                                ->get();

        return response() ->json($categoryBreakdown);
        }

        public function exportCSV(Request $request){
            $userId = auth()->id();
        
            $year = $request->get('year', now()->year);
            $month = $request->get('month', now()->month);
        
            $expenses = Expense::where('user_id', $userId)
                ->orderBy('expense_date')
                ->cursor();
        
            $fileName = "expenses_{$month}_{$year}.csv";
        
            $headers = [
                'Content-Type' => 'text/csv; charset=UTF-8',
                'Content-Disposition' => "attachment; filename=\"{$fileName}\"",
                'Cache-Control' => 'no-store, no-cache',
                'Expires' => '0',
            ];
        
            $columns = ['date', 'amount', 'account', 'note'];
        
            $file = function () use ($expenses, $columns) {
                $handle = fopen('php://output', 'w');
            
                fwrite($handle, chr(0xEF) . chr(0xBB) . chr(0xBF));
            
                fputcsv($handle, $columns);
            
                foreach ($expenses as $e) {
                    $date = $e->expense_date instanceof \DateTime
                        ? $e->expense_date->format('Y-m-d')
                        : (string) $e->expense_date;
                
                    fputcsv($handle, [
                        $date,
                        $e->amount,
                        $e->account,
                        $e->note ?? ''
                    ]);
                }
            
                fclose($handle);
            };

            return response()->streamDownload($file, $fileName, $headers);
        }

    }