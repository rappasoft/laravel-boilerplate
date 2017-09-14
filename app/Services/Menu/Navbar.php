<?php

namespace App\Services\Menu;

use Spatie\Menu\Laravel\Link;
use Illuminate\Support\Facades\App;
use Spatie\Menu\Laravel\Menu as LaravelMenu;
use App\Repositories\Backend\Access\User\UserRepository;

/**
 * Class Navbar.
 */
class Navbar
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * Menu constructor.
     *
     * @param $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getMacros()
    {
        return LaravelMenu::new()
            ->addClass('nav navbar-nav')

            //Macros
            ->add(Link::to(
                route('frontend.macros'),
                trans('navs.frontend.macros')
            ))
            ->setActive(url()->current());
    }

    public function getFrontend()
    {
        return LaravelMenu::new()
            ->addClass('nav navbar-nav navbar-right')

            //Language
            ->submenuIf(
                config('locale.status') && count(config('locale.languages')) > 1,
                Link::to(
                    '#',
                    trans('menus.language-picker.language') .
                    ' <span class="caret"></span>'
                )
                    ->setAttribute('data-toggle', 'dropdown')
                ,
                LaravelMenu::new()
                    ->addClass('dropdown-menu')
                    ->setAttribute('role', 'menu')
                    ->fill(array_keys(config('locale.languages')),function($menu, $item){
                        if ($item != App::getLocale()) {
                            $menu->link('lang/'.$item, trans('menus.language-picker.langs.'.$item));
                        }
                    })
            )
            //Dashboard
            ->addIf(
                access()->user(),
                Link::to(
                    route('frontend.user.dashboard'),
                    trans('navs.frontend.dashboard')
                ))
            //Login
            ->addIf(
                !access()->user(),
                Link::to(
                    route('frontend.auth.login'),
                    trans('navs.frontend.login')
                ))
            //Register
            ->addIf(
                (!access()->user() && config('access.users.registration')),
                Link::to(
                    route('frontend.auth.register'),
                    trans('navs.frontend.register')
                ))
            //User Menu
            ->submenuIf(
                !!(access()->user()),
                Link::to(
                    '#',
                    (access()->user()?access()->user()->name:'').
                    ' <span class="caret"></span>'
                )
                    ->setAttribute('data-toggle', 'dropdown')
                ,
                LaravelMenu::new()
                    ->addClass('dropdown-menu')
                    ->setAttribute('role', 'menu')
                    ->addIf(
                        access()->user()?access()->user()->allow('view-backend'):false,
                        Link::to(
                        route('admin.dashboard'),
                        trans('navs.frontend.user.administration')
                    ))
                    ->add(Link::to(
                        route('frontend.user.account'),
                        trans('navs.frontend.user.account')
                    ))
                    ->add(Link::to(
                        route('frontend.auth.logout'),
                        trans('navs.general.logout')
                    ))
            )
            //Contact
            ->add(
                Link::to(
                    route('frontend.contact'),
                    trans('navs.frontend.contact')
                ))
            ->setActive(url()->current());
    }

    /**
     * @return LaravelMenu $this
     */
    public function getBackend()
    {
        return LaravelMenu::new()
            ->addClass('nav navbar-nav')

            //Language
            ->submenuIf(
                config('locale.status') && count(config('locale.languages')) > 1,
                Link::to(
                    '#',
                    self::placeIcon('language',trans('menus.language-picker.language')) .
                    ' <span class="caret"></span>'
                )
                    ->setAttribute('data-toggle', 'dropdown')
                ,
                LaravelMenu::new()
                    ->addClass('dropdown-menu')
                    ->setAttribute('role', 'menu')
                    ->fill(array_keys(config('locale.languages')),function($menu, $item){
                        if ($item != App::getLocale()) {
                            $menu->link('lang/'.$item, trans('menus.language-picker.langs.'.$item));
                        }
                    })
            )
            //Messages
            ->submenu(
                Link::to(
                    '#',
                    self::placeIcon('envelope-o') .
                    ' <span class="label label-default">0</span>'
                )
                ->setAttribute('data-toggle', 'dropdown')
                ,
                LaravelMenu::new()
                    ->addClass('dropdown-menu')
                    ->addParentClass('dropdown messages-menu')
                    ->html(trans_choice('strings.backend.general.you_have.messages', 0, ['number' => 0]), ['class'=>'header'])
                    ->add(link::to(
                        '#',
                        trans('strings.backend.general.see_all.messages')
                    )->addParentClass('footer'))
            )
            //Notifications
            ->submenu(
                Link::to(
                    '#',
                    self::placeIcon('bell-o') .
                    ' <span class="label label-default">0</span>'
                )
                    ->setAttribute('data-toggle', 'dropdown')
                ,
                LaravelMenu::new()
                    ->addClass('dropdown-menu')
                    ->addParentClass('dropdown messages-menu')
                    ->html(trans_choice('strings.backend.general.you_have.notifications', 0, ['number' => 0]), ['class'=>'header'])
                    ->add(link::to(
                        '#',
                        trans('strings.backend.general.see_all.notifications')
                    )->addParentClass('footer'))
            )
            //Tasks
            ->submenu(
                Link::to(
                    '#',
                    self::placeIcon('flag-o') .
                    ' <span class="label label-default">0</span>'
                )
                    ->setAttribute('data-toggle', 'dropdown')
                ,
                LaravelMenu::new()
                    ->addClass('dropdown-menu')
                    ->addParentClass('dropdown messages-menu')
                    ->html(trans_choice('strings.backend.general.you_have.tasks', 0, ['number' => 0]), ['class'=>'header'])
                    ->add(link::to(
                        '#',
                        trans('strings.backend.general.see_all.tasks')
                    )->addParentClass('footer'))
            )
            //User
            ->submenu(
                Link::to(
                    '#',
                    '<img src="'.access()->user()->picture.'" class="user-image" alt="User Avatar"/>'.
                    '<span class="hidden-xs">'.access()->user()->full_name.'</span>'
                )
                    ->setAttribute('data-toggle', 'dropdown')
                ,
                LaravelMenu::new()
                    ->addClass('dropdown-menu')
                    ->setAttribute('role', 'menu')
                    ->addParentClass('dropdown user user-menu')
                    ->html(
                        '<img src="'.access()->user()->picture.'" class="img-circle" alt="User Avatar" />'.
                        '<p>'.
                            access()->user()->full_name.' - '.implode(", ", access()->user()->roles->pluck('name')->toArray()).
                            '<small>'.trans('strings.backend.general.member_since').' '.access()->user()->created_at->format("m/d/Y").'</small>'.
                        '</p>',
                        ['class'=>'user-header']
                    )
                    ->html(
                        '<div class="col-xs-4 text-center">'.
                            link_to('#', 'Link').
                        '</div>'.
                        '<div class="col-xs-4 text-center">'.
                            link_to('#', 'Link').
                        '</div>'.
                        '<div class="col-xs-4 text-center">'.
                            link_to('#', 'Link').
                        '</div>'
                        ,
                        ['class'=>'user-body']
                    )
                    ->html(
                        '<div class="pull-left">'.
                            '<a href="'.route('frontend.index').'" class="btn btn-default btn-flat">'.
                                '<i class="fa fa-home"></i>'.
                                trans('navs.general.home').
                            '</a>'.
                        '</div>'.
                        '<div class="pull-right">'.
                            '<a href="'.route('frontend.auth.logout').'" class="btn btn-danger btn-flat">'.
                                '<i class="fa fa-sign-out"></i>'.
                                trans('navs.general.logout').
                            '</a>'.
                        '</div>',
                        ['class'=>'user-footer']
                    )
            )
            ->setActive(url()->current());
    }

    /**
     * @param string $icon
     * @param string $text
     * @return string
     */
    private function placeIcon(string $icon, string $text = '')
    {
        return "<i class=\"fa fa-{$icon}\"></i><span>{$text}</span>";
    }
}
