<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pasal;
use Illuminate\Support\Facades\Auth;

class StudentAuthController extends Controller
{
    public function dashboard()
    {
        // Correct variable naming
        $student = Auth::guard('student')->user();

        // Check if the student is authenticated
        if (!$student) {
            return redirect()->route('student_login')->with('error', 'Please log in.');
        }

        // Fetch points related to the student
        $poins = $student->poins()->orderBy('tanggal', 'desc')->get();

        // Pass the correct variable to the view
        return view('student.dashboard', compact('student', 'poins'));
    }

    public function about()
    {
        return view('student.about');
    }

    //  untuk siswa bisa melihat pasal yang ada
    public function pasal()
    {
        $pasals = Pasal::all();
        return view('student.pasal.index', compact('pasals'));
    }

    public function login()
    {
        return view('auth.student');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'nis' => 'required|numeric',
            'password' => 'required',
        ]);

        if (Auth::guard('student')->attempt($request->only('nis', 'password'))) {
            $student = Auth::guard('student')->user();

            // Detect IP address
            $ip = $request->ip();

            // Get current time in Asia/Jakarta timezone
            $loginTime = now()->setTimezone('Asia/Jakarta')->format('d M Y, H:i:s');

            // Detect user agent information
            $userAgent = $_SERVER['HTTP_USER_AGENT'];
            $device = $this->getDeviceType($userAgent);
            $browser = $this->getBrowserType($userAgent);

            // Store last login information in session
            session([
                'last_login_ip' => $ip,
                'last_login_at' => $loginTime,
                'last_device' => $device,
                'last_browser' => $browser,
            ]);

            if (empty($student->email)) {
                return redirect()->route('students.complete.profile')->with('info', 'Please complete your profile.');
            }

            return redirect()->route('student.dashboard')->with('success', 'Login Successfully.');
        } else {
            return redirect()->route('student_login')->with('error', 'Invalid Credentials.');
        }
    }

    /**
     * Get the device type from the user agent.
     *
     * @param string $userAgent
     * @return string
     */
    private function getDeviceType($userAgent)
    {
        if (preg_match('/mobile/i', $userAgent)) {
            return 'Mobile';
        } elseif (preg_match('/tablet/i', $userAgent)) {
            return 'Tablet';
        } else {
            return 'Desktop';
        }
    }

    /**
     * Get the browser type from the user agent.
     *
     * @param string $userAgent
     * @return string
     */
    private function getBrowserType($userAgent)
    {
        if (strpos($userAgent, 'Firefox') !== false) {
            return 'Firefox';
        } elseif (strpos($userAgent, 'Chrome') !== false) {
            return 'Chrome';
        } elseif (strpos($userAgent, 'Safari') !== false) {
            return 'Safari';
        } elseif (strpos($userAgent, 'MSIE') !== false || strpos($userAgent, 'Trident/7') !== false) {
            return 'Internet Explorer';
        } elseif (strpos($userAgent, 'Opera') !== false) {
            return 'Opera';
        } elseif (strpos($userAgent, 'Opera GX') !== false) {
            return 'Opera GX';
        } else {
            return 'Other';
        }
    }

    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect()->route('student_login')->with('success', 'Logout Successfully.');
    }
}
