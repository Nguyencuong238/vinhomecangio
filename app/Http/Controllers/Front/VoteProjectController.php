<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class VoteProjectController extends Controller
{
    public function __invoke(Project $project, Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => ['required', 'captcha'],
        ]);
        

        $project->votes()->create([
            'ip' => $request->ip(),
        ]);

        $project->increment('votes');

        $project->increment('votes_today');


        return redirect()->back();
    }
}
