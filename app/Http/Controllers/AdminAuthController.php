<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\SurveyRecord;
use App\Models\Alumni;
use App\Models\Career; 
use App\Models\CadanganKerjaya;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AdminAuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['login_error' => 'Invalid credentials!']);
    }

    // Show dashboard
    public function dashboard()
    {
        $totalAlumni = \App\Models\Alumni::count();
        $answeredAlumni = SurveyRecord::distinct('alumni_id')->count('alumni_id'); 
        $unansweredAlumni = $totalAlumni - $answeredAlumni;

        return view('admin.dashboard', compact('totalAlumni', 'answeredAlumni', 'unansweredAlumni'));
    }

    public function getQuestionStatistics()
    {
        $statistics = SurveyRecord::select('question_id')
            ->selectRaw('SUM(answer = "yes") as yes_count, SUM(answer = "no") as no_count')
            ->groupBy('question_id')
            ->get();
    
        return response()->json($statistics);
    }
    
    

    // public function getStatistics()
    // {
    //     return response()->json([
    //         'solvedCount' => SurveyRecord::where('status', 'solved')->count(),
    //         'unsolvedCount' => SurveyRecord::where('status', 'unsolved')->count(),
    //         'inProgressCount' => SurveyRecord::where('status', 'in-progress')->count(),
    //     ]);
    // }

    // ✅ Senarai Semua Alumni
    public function indexUser() {
        $alumnis = \App\Models\Alumni::all();
        return view('admin.user', compact('alumnis'));
    }
    

    // ✅ Paparkan Borang Tambah Alumni
    public function createUser()
    {
        return view('admin.user'); // Gunakan user.blade.php
    }

    // ✅ Simpan Alumni ke dalam Database
    public function storeUser(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'kos' => 'required|string',
            'username' => 'required|string|unique:alumnis,username',
            'password' => 'required|string|min:6',
        ]);
    
        Alumni::create([
            'name' => $request->name,
            'kos' => $request->kos,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
    
        return redirect()->route('admin.user')->with('success', 'Alumni berjaya ditambah.');
    }

    public function listUser()
    {
        $alumnis = Alumni::all(); // Ambil semua data alumni dari database
        return view('admin.list-user', compact('alumnis')); // Hantar data ke view
    } 

    public function editUser($id) {
        $user = Alumni::findOrFail($id); // Mencari pengguna berdasarkan ID
        return view('admin.edit-user', compact('user')); // Menghantar data pengguna ke halaman edit_user
    }

    
    // ✅ Kemaskini Maklumat Alumni
    public function updateUser(Request $request, $id)
    {
        $alumni = Alumni::findOrFail($id);

    // Semak jika username sudah wujud tetapi bukan milik ID semasa
    $existingUser = Alumni::where('username', $request->username)
                          ->where('id', '!=', $id)
                          ->first();

    if ($existingUser) {
        return redirect()->back()->withErrors(['username' => 'Username telah digunakan oleh pengguna lain.']);
    }

    // Jika tiada username bertindih, teruskan update
    $alumni->name = $request->input('name');
    $alumni->kos = $request->input('kos');
    $alumni->username = $request->input('username');

    if ($request->filled('password')) {
        $alumni->password = bcrypt($request->input('password'));
    }

    $alumni->save();

    return redirect()->route('admin.user')->with('success', 'Pengguna berjaya dikemaskini!');
}
    
    public function destroyUser($id) {
        Alumni::findOrFail($id)->delete();
        return redirect()->route('admin.user')->with('success', 'Alumni berjaya dipadam.');
    }

    // Career index page
    public function careerIndex()
    {
        $careers = CadanganKerjaya::all();
        return view('admin.career', compact('careers'));
    }    

    public function showCareer()
    {
        $courses = Course::all();
        $careers = CadanganKerjaya::all(); // Ambil semua cadangan kerjaya juga
        return view('admin.career', compact('courses', 'careers'));
    }
    

    public function storeCareer(Request $request)
    {
        // Validasi input
        $request->validate([
            'course_id' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Buat rekod baharu dalam CadanganKerjaya
        $career = new CadanganKerjaya();
        $career->course_id = $request->course_id;
        $career->job = $request->job;
        $career->phone = $request->phone;
        $career->address = $request->address;

        // Jika ada gambar, simpan
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('career_images', 'public');
            $career->image = $imagePath;
        }

        // Simpan ke dalam database
        $career->save();

        return redirect()->route('admin.career')->with('success', 'Cadangan kerjaya berjaya ditambah!');
    }


    public function editCareer($id)
    {
        $career = CadanganKerjaya::findOrFail($id);
        $courses = Course::all(); // Ambil semua kursus dari database
        return view('admin.edit-career', compact('career', 'courses'));
    }

    public function updateCareer(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $career = CadanganKerjaya::findOrFail($id);
    
        if ($request->hasFile('image')) {
            // Padam gambar lama jika ada
            if ($career->image) {
                Storage::delete('public/' . $career->image);
            }
            $imagePath = $request->file('image')->store('career_images', 'public');
            $career->image = $imagePath;
        }
    
        $career->update([
            'course_id' => $request->course_id,
            'job' => $request->job,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
    
        return redirect()->route('admin.career')->with('success', 'Maklumat kerjaya berjaya dikemaskini.');
    }

    public function destroyCareer($id)
    {
        $career = CadanganKerjaya::findOrFail($id);
        $career->delete();
    
        return redirect()->route('admin.career')->with('success', 'Cadangan kerjaya berjaya dipadam.');
    }    

    // Show questions page
    public function indexQuestions()
    {
    // Ambil semua soalan
    $questions = Question::orderBy('year', 'desc')->get();

    // Ambil senarai tahun unik daripada soalan
    $years = Question::select('year')->distinct()->orderBy('year', 'desc')->pluck('year');

    return view('admin.questions', compact('questions', 'years'));
    }

    public function editQuestion($id)
    {
        $question = Question::findOrFail($id);
        return view('admin.edit-questions', compact('question'));
    }

    public function updateQuestion(Request $request, $id)
    {
        $request->validate([
            'question_text' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:' . date('Y'),
        ]);
    
        $question = Question::findOrFail($id);
        $question->update([
            'question_text' => $request->question_text,
            'year' => $request->year,
        ]);
    
        return redirect()->route('admin.questions')->with('success', 'Soalan berjaya dikemas kini!');
    }

    // Store new question
    public function storeQuestion(Request $request)
    {
        // Validasi input
        $request->validate([
            'question_text' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:' . date('Y'),
        ]);

        // Simpan ke dalam database
        Question::create([
            'question_text' => $request->question_text,
            'year' => $request->year,
        ]);

        return redirect()->route('admin.questions')->with('success', 'Soalan berjaya ditambah!');
    }

    // Delete a question
    public function deleteQuestion($id)
    {
        // Cari soalan dan padam
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('admin.questions')->with('success', 'Soalan berjaya dipadam!');
    }

    public function surveyRecords(Request $request)
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

        return view('admin.records', compact('records', 'years', 'selectedYear'));
    }


    // public function createSurveyRecord()
    // {
    //     $alumni = Alumni::all();
    //     return view('admin.records-create', compact('alumni'));
    // }

    // public function storeSurveyRecord(Request $request)
    // {
    //     $request->validate([
    //         'alumni_id' => 'required|exists:alumni,id',
    //         'answers' => 'required|string',
    //     ]);

    //     SurveyRecord::create([
    //         'alumni_id' => $request->alumni_id,
    //         'answers' => $request->answers,
    //     ]);

    //     return redirect()->route('admin.records')->with('success', 'Survey record added successfully!');
    // }

    // public function deleteSurveyRecord($id)
    // {
    //     $surveyRecord = SurveyRecord::findOrFail($id);
    //     $surveyRecord->delete();

    //     return redirect()->route('admin.records')->with('success', 'Survey record deleted successfully!');
    // }

    
    // Handle logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}

