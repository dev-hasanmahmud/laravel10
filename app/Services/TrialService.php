<?php

namespace App\Services;

class TrialService {
    public function viewTrialDaysLeft() {
        $daysLeft = 15;
        return view('partials.trial', compact('daysLeft'))->render();
    }
}
