<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Illuminate\Support\ServiceProvider;

/**
 * Class BladeServiceProvider.
 */
class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     */
    public function boot()
    {
        $this->registerCaptcha();
    }

    /**
     * Register the locale blade extensions.
     * See: App\Rules\Captcha for implementation
     * See LoginController/RegisterController for usage.
     */
    protected function registerCaptcha(): void
    {
        /*
         * The block of code inside this directive prints the required elements for google recaptcha
         * courtesy of albertcht/invisible-recaptcha
         */
        Blade::directive('captcha', function ($lang) {
            $html = new HtmlString('<script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>');
            $html .= new HtmlString('<div id="_g-recaptcha"></div>');

            if (config('boilerplate.access.captcha.configs.options.hidden')) {
                $html .= new HtmlString('<style>.grecaptcha-badge{display:none;!important}</style>');
            }

            $html .= new HtmlString('
                <div class="g-recaptcha"
                    data-sitekey="'.config('boilerplate.access.captcha.configs.site_key').'"
                    data-size="invisible"
                    data-callback="_submitForm"
                    data-badge="'.config('boilerplate.access.captcha.configs.options.location').'">
                </div>');

            $html .= new HtmlString('<script src="'.($lang ? 'https://www.google.com/recaptcha/api.js'.'?hl='.$lang : 'https://www.google.com/recaptcha/api.js').'" async defer></script>');
            $html .= new HtmlString('<script>var _submitForm,_captchaForm,_captchaSubmit,_execute=true;</script>');
            $html .= new HtmlString("<script>window.addEventListener('load', _loadCaptcha);");
            $html .= new HtmlString('function _loadCaptcha(){');

            if (config('boilerplate.access.captcha.configs.options.hidden')) {
                $html .= new HtmlString("document.querySelector('.grecaptcha-badge').style = 'display:none;!important';");
            }

            $html .= new HtmlString('
                _captchaForm=document.querySelector("#_g-recaptcha").closest("form");
                _captchaSubmit=_captchaForm.querySelector(\'[type=submit]\');
                _submitForm=function(){if(typeof _submitEvent==="function"){_submitEvent();grecaptcha.reset();}else{_captchaForm.submit();}};
                _captchaForm.addEventListener(\'submit\',function(e){e.preventDefault();
                if(typeof _beforeSubmit===\'function\'){_execute=_beforeSubmit(e);}
                if(_execute){grecaptcha.execute();}});}</script>
            ');

            return $html;
        });
    }
}
