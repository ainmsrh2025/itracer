<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Question;
use App\Models\SurveyRecord;
use App\Models\Alumni;
use App\Models\Career; 
use App\Models\CadanganKerjaya;
use App\Models\Course;
use App\Models\User;
use App\Models\Lecturer; // Betulkan nama model

class PensyarahAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.pensyarah-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'kos' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('pensyarah')->attempt(['kos' => $request->kos, 'password' => $request->password])) {
            return redirect()->route('pensyarah.dashboard');
        }

        return back()->withErrors(['kos' => 'Maklumat tidak sah'])->withInput();
    }

    public function logout()
    {
        Auth::guard('pensyarah')->logout();
        return redirect()->route('pensyarah.login');
    }

    public function dashboard()
    {
        $totalAlumni = Alumni::count();
        $answeredAlumni = SurveyRecord::distinct('alumni_id')->count('alumni_id'); 
        $unansweredAlumni = $totalAlumni - $answeredAlumni; // Kira yang belum menjawab

        return view('pensyarah.dashboard', compact('totalAlumni', 'answeredAlumni', 'unansweredAlumni'));

    }

    // Survey Records Section
    public function index(Request $request)
    {
        $selectedYear = $request->input('year'); // Ambil tahun dari URL
    
        $query = SurveyRecord::select(
            'id', // Tambahkan id di sini
            'question_id',
            DB::raw('COUNT(CASE WHEN answer = "yes" THEN 1 END) as ya_count'),
            DB::raw('COUNT(CASE WHEN answer = "no" THEN 1 END) as tidak_count')
        )
        ->groupBy('id', 'question_id') // Pastikan id dimasukkan dalam groupBy
        ->with('question'); // Ambil soalan berkaitan
    
        // Tapis ikut tahun dari column 'year', bukan 'created_at'
        if (!empty($selectedYear)) {
            $query->where('year', $selectedYear);
        }
    
        $records = $query->get();
    
        // Senarai tahun dari 2016 - 2020
        $years = collect(range(2016, 2020));
    
        return view('pensyarah.records', compact('records', 'years', 'selectedYear'));
    }    

}
