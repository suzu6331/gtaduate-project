<!-- resources/views/questions/result.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6">結果</h1>
    
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md mb-6">
        <p class="text-xl mb-4">全{{ $totalQuestions }}問中、<span class="font-semibold">{{ $correctAnswers }}</span>問正解しました。</p>
        <p class="text-xl mb-4">所要時間: <span class="font-semibold">{{ gmdate('H:i:s', $timeTaken) }}</span></p>
        <p class="text-xl mb-4">スコア: <span class="font-semibold">{{ number_format($score) }}</span></p>
        
        <!-- スコアの進捗バー -->
        <div class="mb-4">
            <strong class="text-gray-700 dark:text-gray-300">スコアバー:</strong>
            <div class="w-full bg-gray-200 rounded-full h-4 mt-2">
                @php
                    // スコアの最大値を設定（基本情報と応用情報で異なる場合）
                    if (isset($perQuestionScore)) {
                        $maxCorrect = $totalQuestions;
                        $maxScore = $maxCorrect * $perQuestionScore; // 基本情報
                    } else {
                        $maxCorrect = $totalQuestions;
                        $maxScore = $maxCorrect * 100; // 応用情報
                    }

                    // スコアの割合を計算
                    $scorePercentage = ($score / $maxScore) * 100;
                    $scorePercentage = $scorePercentage > 100 ? 100 : $scorePercentage;
                @endphp
                <div class="bg-blue-500 h-4 rounded-full" style="width: {{ $scorePercentage }}%"></div>
            </div>
            <p class="mt-2">{{ number_format($score) }} / {{ number_format($maxScore) }}</p>
        </div>
    </div>

    <a href="{{ Session::has('questions_ap') ? route('questions.ap.form') : route('questions.form') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded transition-colors duration-300">
        もう一度挑戦する
    </a>
</div>
@endsection
