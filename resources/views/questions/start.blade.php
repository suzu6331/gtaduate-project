@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="card max-w-md w-full">
        <!-- <img src="{{ asset('images/quiz.png') }}" alt="Quiz Image" class="mx-auto mb-6 w-24 h-24"> -->
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-4">クイズを開始しますか？</h1>
        <p class="text-center text-gray-600 mb-6">準備ができたら「開始」ボタンをクリックしてください。</p>
        <form method="POST" action="{{ route('questions.initialize') }}">
            @csrf
            <input type="hidden" name="year" value="{{ $year }}">
            <input type="hidden" name="exam" value="{{ $exam }}">
            <button type="submit" class="btn-primary w-full">
                <span class="text-lg font-semibold">開始</span>
            </button>
        </form>
    </div>
</div>
@endsection
