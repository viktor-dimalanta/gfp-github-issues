<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GitHubIssuesController extends Controller
{
    public function index()
    {
        $githubToken = env('GITHUB_ACCESS_TOKEN');

        $response = Http::withHeaders([
            'Authorization' => 'token ' . $githubToken,
            'Accept' => 'application/vnd.github.v3+json',
        ])->get('https://api.github.com/issues', [
            'filter' => 'assigned',
            'state' => 'open',
        ]);

        if ($response->failed()) {
            return back()->withErrors(['error' => 'Unable to fetch issues from GitHub.']);
        }

        $issues = $response->json();

        return view('github.issues', compact('issues'));
    }
}
