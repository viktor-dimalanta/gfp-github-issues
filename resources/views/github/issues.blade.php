@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Open GitHub Issues</h1>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Issue #</th>
                <th>Title</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($issues as $issue)
                <tr data-bs-toggle="modal" data-bs-target="#issueModal{{ $issue['number'] }}">
                    <td><strong>#{{ $issue['number'] }}</strong></td>
                    <td>{{ $issue['title'] }}</td>
                    <td>{{ \Carbon\Carbon::parse($issue['created_at'])->diffForHumans() }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No open issues assigned to you.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal Template -->
@foreach ($issues as $issue)
    <div class="modal fade" id="issueModal{{ $issue['number'] }}" tabindex="-1" aria-labelledby="issueModalLabel{{ $issue['number'] }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="issueModalLabel{{ $issue['number'] }}">Issue #{{ $issue['number'] }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Title:</strong> {{ $issue['title'] }}</p>
                    <p style="overflow: hidden;text-overflow: ellipsis;"><strong>Description:</strong> {{ $issue['body'] ?? 'No description available.' }}</p>
                    <p><strong>Created:</strong> {{ \Carbon\Carbon::parse($issue['created_at'])->toFormattedDateString() }}</p>
                    <p><strong>Updated:</strong> {{ \Carbon\Carbon::parse($issue['updated_at'])->toFormattedDateString() }}</p>
                    <p><strong>Status:</strong> {{ $issue['state'] }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ $issue['html_url'] }}" class="btn btn-primary" target="_blank">View on GitHub</a>
                </div>
            </div>
        </div>
    </div>
@endforeach


@endsection
