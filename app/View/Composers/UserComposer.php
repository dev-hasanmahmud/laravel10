<?php
 
namespace App\View\Composers;
use App\Models\User;
use Illuminate\View\View;
 
class UserComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with('users', User::all());
    }
}