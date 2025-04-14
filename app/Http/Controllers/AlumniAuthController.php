<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Alumni;
use App\Models\Question;
use App\Models\CadanganKerjaya;
use App\Models\SurveyRecord;

class AlumniAuthController extends Controller
{
    // Display Alumni Login Form
    public function showLoginForm()
    {
        $careers = CadanganKerjaya::all(); // Pastikan model ini betul
        return view('auth.alumni-login', compact('careers'));
    }    

    // Process Alumni Login
    public function login(Request $request)
    {
        $request->validate([
            'kos' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);
    
        // Dapatkan maklumat alumni berdasarkan username
        $alumni = Alumni::where('username', $request->username)->first();
    
        if (!$alumni) {
            return back()->with('error', 'Username tidak wujud.');
        }
    
        // Semak kata laluan
        if (!password_verify($request->password, $alumni->password)) {
            return back()->with('error', 'Password salah.');
        }
    
        // Semak jika kos yang dipilih sama dengan kos dalam database
        if ($alumni->kos !== $request->kos) {
            return back()->with('error', 'Kos tidak sepadan dengan rekod anda.');
        }
    
        // Login berjaya, simpan sesi
        Auth::guard('alumni')->login($alumni);
    
        return redirect()->route('alumni.dashboard')->with('success', 'Login berjaya!');
    }

    // Display Alumni Dashboard
    public function dashboard()
    {
        $alumni = Auth::guard('alumni')->user(); // Get the logged-in alumni
        return view('alumni.dashboard', compact('alumni')); // Pass alumni data to the view
    }
    

    // Update Alumni Profile
    public function updateProfile(Request $request)
    {
        $alumni = Auth::guard('alumni')->user(); // Get the logged-in alumni
    
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'status' => 'required|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Handle the profile picture upload
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $alumni->profile_picture = $path;
        }
    
        // Update the alumni details
        $alumni->name = $validatedData['name'];
        $alumni->email = $validatedData['email'];
        $alumni->status = $validatedData['status'];
        $alumni->save(); // Save the updated data
    
        return redirect()->route('alumni.dashboard')->with('success', 'Profile updated successfully!');
    }
    

    // Display Alumni Survey Page
    public function surveyPage()
    {
        $alumniId = Auth::guard('alumni')->id();
        
        // Ambil maklumat alumni yang sedang login
        $alumni = Alumni::find($alumniId);
    
        // Ambil semua soalan dari database
        $questions = Question::all();
    
        // Ambil jawapan yang telah diberikan oleh alumni ini
        $surveyRecords = SurveyRecord::where('alumni_id', $alumniId)->get();
    
        return view('alumni.survey', compact('alumni', 'questions', 'surveyRecords'));
    }
    // Process Alumni Survey Submission
    public function submitSurvey(Request $request)
    {
        $request->validate([
            'year' => 'required',
            'answer' => 'required|array',
        ]);        

        $alumniId = Auth::guard('alumni')->id();

        foreach ($request->answer as $questionId => $answer) {
            // Periksa jika jawapan telah ada dalam database
            $existingRecord = SurveyRecord::where('alumni_id', $alumniId)
                                        ->where('question_id', $questionId)
                                        ->first();

            if ($existingRecord) {
                // Jika jawapan sudah ada, kemaskini (update)
                $existingRecord->update([
                    'answer' => $answer,
                ]);
            } else {
                // Jika belum ada, simpan jawapan baru
                SurveyRecord::create([
                    'alumni_id' => $alumniId,
                    'question_id' => $questionId,
                    'answer' => $answer,
                    'year'=>$request-> year,
                ]);
            }
        }

        return redirect()->route('alumni.survey')->with('success', 'Survey submitted successfully.');
    }

    

    // Process Alumni Logout
    public function logout()
    {
        Auth::guard('alumni')->logout();
        return redirect()->route('alumni.login');
    }


    public function filter(Request $request)
    {
        $year = $request->query('year'); // Ambil parameter tahun dari request

        // Ambil soalan berdasarkan tahun yang dipilih
        $questions = Question::where('year', $year)->get();

        return response()->json($questions);
    }

}
