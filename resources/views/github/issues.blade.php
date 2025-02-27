@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Open GitHub Issues</h1>
    <ul>
        @forelse ($issues as $issue)
            <li>
                <strong>#{{ $issue['number'] }}</strong> - 
                {{ $issue['title'] }} (Created: {{ \Carbon\Carbon::parse($issue['created_at'])->diffForHumans() }})
            </li>
        @empty
            <p>No open issues assigned to you.</p>
        @endforelse
    </ul>
</div>
@endsection
