<?php
namespace App\Helpers;
use Illuminate\Support\Str;

class Helper
{
    // Constants
    const count_per_page    = 15;

    // Roles
    const INTEGRATOR = 'Integrator';
    const Admin      = 'Admin';
    const User       = 'User';
    				
    // Static functions
    public static function saveFile($image, $folder_name) {
        if(isset($image) && is_file($image)) {
            $imageName  = now()->format('Ymd-His-u-') . Str::random(3);
            $imageName  = $imageName .'.'. $image->getClientOriginalExtension();
            $destinationPath = public_path('images/'. $folder_name .'/');
            $image->move($destinationPath, $imageName);
            return $imageName;
        }

        return null;
    }

}