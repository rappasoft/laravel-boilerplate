<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use App\Services\Menu\Navbar;

/**
 * Class GlobalComposer.
 */
class GlobalComposer
{
    /**
     * @var \Spatie\Menu\Laravel\Menu
     */
    protected $macros;
    /**
     * @var \Spatie\Menu\Laravel\Menu
     */
    protected $frontend;
    /**
     * @var \Spatie\Menu\Laravel\Menu
     */
    protected $backend;

    /**
     * SidebarComposer constructor.
     *
     * @param Navbar           $navbar
     */
    public function __construct(Navbar $navbar)
    {
        $this->macros = $navbar->getMacros();
        $this->frontend = $navbar->getFrontend();
        $this->backend = $navbar->getBackend();
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view
            ->with('logged_in_user', access()->user())
            ->with('macros', $this->macros)
            ->with('frontend', $this->frontend)
            ->with('backend', $this->backend);
    }
}
