<!-- resources/views/questions/ap/form.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">応用情報年度別データ</h1>
    <form method="post" action="{{ route('questions.ap.start') }}">
        @csrf <!-- CSRFトークンの生成 -->
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">年度</th>
                    <th class="border border-gray-300 px-4 py-2">春</th>
                    <th class="border border-gray-300 px-4 py-2">秋</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($yearlyData as $item)
                    <tr class="border border-gray-300">
                        <td class="border border-gray-300 px-4 py-2">{{ $item['year'] }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            @if (isset($item['spring']))
                                <input type="radio" name="selection" value="{{ $item['year_numeric'] }}_{{ $item['spring']['exam'] }}" id="spring-{{ $item['year_numeric'] }}" class="mr-2">
                                <label for="spring-{{ $item['year_numeric'] }}">春</label>
                            @else
                                -
                            @endif
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            @if (isset($item['fall']))
                                <input type="radio" name="selection" value="{{ $item['year_numeric'] }}_{{ $item['fall']['exam'] }}" id="fall-{{ $item['year_numeric'] }}" class="mr-2">
                                <label for="fall-{{ $item['year_numeric'] }}">秋</label>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary mt-4 px-4 py-2">選択した年度の問題を表示</button>
    </form>
</div>
@endsection
