<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission as SpatiePermission;
use App\Models\Permission;
use View;
use Auth;
use Modules\CMS\Models\Menu;
use Modules\CMS\Models\WebSetting;

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
        // Bind custom Permission model
        $this->app->bind(SpatiePermission::class, Permission::class);

        // Share menu items with all views
        View::composer('*', function ($view) {
            // Backend user-specific menu
            if (Auth::check()) {
                $menu = Auth::user()->menu;
                $view->with('user_menu', $menu);
            }

            // Static menus for frontend
            $menus = [
                'primary_menu'   => 'primary-menu',
                'footer_menu_1'  => 'footer-menu-1',
                'footer_menu_2'  => 'footer-menu-2',
            ];

            foreach ($menus as $viewVar => $slug) {
                $menu = Menu::where('slug', $slug)
                    ->with(['items' => function ($q) {
                        $q->whereNull('parent_id')
                          ->orderBy('order')
                          ->with(['children' => function ($q) {
                              $q->orderBy('order');
                          }]);
                    }])
                    ->first();

                $view->with($viewVar, $menu);
            }

            // ✅ Load all settings into $web_settings array
            $settings = WebSetting::all();
            $locale = app()->getLocale();

            $web_settings = [];

            foreach ($settings as $setting) {
                if (in_array('value', $setting->getTranslatableAttributes())) {
                    $web_settings[$setting->key] = $setting->getTranslation('value', $locale);
                } else {
                    $web_settings[$setting->key] = $setting->value;
                }

                // Attach media URLs if present
                if ($setting->hasMedia('header_logo')) {
                    $web_settings['header_logo_url'] = $setting->getFirstMediaUrl('header_logo');
                }

                if ($setting->hasMedia('footer_logo')) {
                    $web_settings['footer_logo_url'] = $setting->getFirstMediaUrl('footer_logo');
                }
            }

            // Share with all views
            $view->with('web_settings', $web_settings);
        });
    }
}
