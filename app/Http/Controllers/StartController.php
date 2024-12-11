<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->query('year');
        $exam = $request->query('exam');

        if (!$year || !$exam) {
            return "年と試験区分を指定してください。";
        }

        return view('start', compact('year', 'exam'));
    }

    public function startExam(Request $request)
    {
        $year = $request->input('year');
        $exam = $request->input('exam');

        session([
            'years' => explode(',', $year), // 複数年度の処理
            'siken' => $exam,
            'total_start_time' => time(),
            'curt_question' => 0,
            'correct_answers' => 0,
        ]);

        //ここから/////////////////////////////////////////////////
        return redirect(''); // ここを適切なURLに変更してください
    }
}
