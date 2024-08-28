<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('cancan', function ($expression) {
            // Mengurai ekspresi menjadi permission dan guards
            [$permission, $guards] = array_map('trim', explode(',', $expression));
            $guards = explode('|', trim($guards, "'\" ")); // Membersihkan karakter kutipan dan memisahkan guards

            // Membuat kondisi untuk setiap guard
            $conditions = collect($guards)->map(function ($guard) use ($permission) {
                return "Auth::guard('$guard')->check() && Auth::guard('$guard')->user()->can($permission)";
            })->join(' || ');

            // Mengembalikan PHP code untuk evaluasi kondisi
            return "<?php if ($conditions): ?>";
        });

        Blade::directive('endcancan', function () {
            return '<?php endif; ?>';
        });


    }
}
