<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="profile"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Profile'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('assets') }}/img/bruce-mars.jpg" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                Richard Davis
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                CEO / Co-Founder
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;"
                                        role="tab" aria-selected="true">
                                        <i class="material-icons text-lg position-relative">home</i>
                                        <span class="ms-1">App</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;"
                                        role="tab" aria-selected="false">
                                        <i class="material-icons text-lg position-relative">email</i>
                                        <span class="ms-1">Messages</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;"
                                        role="tab" aria-selected="false">
                                        <i class="material-icons text-lg position-relative">settings</i>
                                        <span class="ms-1">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-12 col-xl-4">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <h6 class="mb-0">Platform Settings</h6>
                                </div>
                                <div class="card-body p-3">
                                    <h6 class="text-uppercase text-body text-xs font-weight-bolder">Account</h6>
                                    <ul class="list-group">
                                        <li class="list-group-item border-0 px-0">
                                            <div class="form-check form-switch ps-0">
                                                <input class="form-check-input ms-auto" type="checkbox"
                                                    id="flexSwitchCheckDefault" checked>
                                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                    for="flexSwitchCheckDefault">Email me when someone follows
                                                    me</label>
                                            </div>
                                        </li>
                                        <li class="list-group-item border-0 px-0">
                                            <div class="form-check form-switch ps-0">
                                                <input class="form-check-input ms-auto" type="checkbox"
                                                    id="flexSwitchCheckDefault1">
                                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                    for="flexSwitchCheckDefault1">Email me when someone answers on
                                                    my post</label>
                                            </div>
                                        </li>
                                        <li class="list-group-item border-0 px-0">
                                            <div class="form-check form-switch ps-0">
                                                <input class="form-check-input ms-auto" type="checkbox"
                                                    id="flexSwitchCheckDefault2" checked>
                                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                    for="flexSwitchCheckDefault2">Email me when someone mentions
                                                    me</label>
                                            </div>
                                        </li>
                                    </ul>
                                    <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4">Application
                                    </h6>
                                    <ul class="list-group">
                                        <li class="list-group-item border-0 px-0">
                                            <div class="form-check form-switch ps-0">
                                                <input class="form-check-input ms-auto" type="checkbox"
                                                    id="flexSwitchCheckDefault3">
                                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                    for="flexSwitchCheckDefault3">New launches and projects</label>
                                            </div>
                                        </li>
                                        <li class="list-group-item border-0 px-0">
                                            <div class="form-check form-switch ps-0">
                                                <input class="form-check-input ms-auto" type="checkbox"
                                                    id="flexSwitchCheckDefault4" checked>
                                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                    for="flexSwitchCheckDefault4">Monthly product updates</label>
                                            </div>
                                        </li>
                                        <li class="list-group-item border-0 px-0 pb-0">
                                            <div class="form-check form-switch ps-0">
                                                <input class="form-check-input ms-auto" type="checkbox"
                                                    id="flexSwitchCheckDefault5">
                                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                    for="flexSwitchCheckDefault5">Subscribe to newsletter</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <div class="row">
                                        <div class="col-md-8 d-flex align-items-center">
                                            <h6 class="mb-0">Profile Information</h6>
                                        </div>
                                        <div class="col-md-4 text-end">
                                            <a href="javascript:;">
                                                <i class="fas fa-user-edit text-secondary text-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Edit Profile"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <p class="text-sm">
                                        Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If
                                        two equally difficult paths, choose the one more painful in the short term
                                        (pain avoidance is creating an illusion of equality).
                                    </p>
                                    <hr class="horizontal gray-light my-4">
                                    <ul class="list-group">
                                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                                class="text-dark">Full Name:</strong> &nbsp; Alec M. Thompson</li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                class="text-dark">Mobile:</strong> &nbsp; (44) 123 1234 123</li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                class="text-dark">Email:</strong> &nbsp; alecthompson@mail.com</li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                class="text-dark">Location:</strong> &nbsp; USA</li>
                                        <li class="list-group-item border-0 ps-0 pb-0">
                                            <strong class="text-dark text-sm">Social:</strong> &nbsp;
                                            <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0"
                                                href="javascript:;">
                                                <i class="fab fa-facebook fa-lg"></i>
                                            </a>
                                            <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0"
                                                href="javascript:;">
                                                <i class="fab fa-twitter fa-lg"></i>
                                            </a>
                                            <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0"
                                                href="javascript:;">
                                                <i class="fab fa-instagram fa-lg"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <h6 class="mb-0">Conversations</h6>
                                </div>
                                <div class="card-body p-3">
                                    <ul class="list-group">
                                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                                            <div class="avatar me-3">
                                                <img src="{{ asset('assets') }}/img/kal-visuals-square.jpg" alt="kal"
                                                    class="border-radius-lg shadow">
                                            </div>
                                            <div class="d-flex align-items-start flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Sophie B.</h6>
                                                <p class="mb-0 text-xs">Hi! I need more information..</p>
                                            </div>
                                            <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                                href="javascript:;">Reply</a>
                                        </li>
                                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                            <div class="avatar me-3">
                                                <img src="{{ asset('assets') }}/img/marie.jpg" alt="kal"
                                                    class="border-radius-lg shadow">
                                            </div>
                                            <div class="d-flex align-items-start flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Anne Marie</h6>
                                                <p class="mb-0 text-xs">Awesome work, can you..</p>
                                            </div>
                                            <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                                href="javascript:;">Reply</a>
                                        </li>
                                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                            <div class="avatar me-3">
                                                <img src="{{ asset('assets') }}/img/ivana-square.jpg" alt="kal"
                                                    class="border-radius-lg shadow">
                                            </div>
                                            <div class="d-flex align-items-start flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Ivanna</h6>
                                                <p class="mb-0 text-xs">About files I can..</p>
                                            </div>
                                            <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                                href="javascript:;">Reply</a>
                                        </li>
                                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                            <div class="avatar me-3">
                                                <img src="{{ asset('assets') }}/img/team-4.jpg" alt="kal"
                                                    class="border-radius-lg shadow">
                                            </div>
                                            <div class="d-flex align-items-start flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Peterson</h6>
                                                <p class="mb-0 text-xs">Have a great afternoon..</p>
                                            </div>
                                            <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                                href="javascript:;">Reply</a>
                                        </li>
                                        <li class="list-group-item border-0 d-flex align-items-center px-0">
                                            <div class="avatar me-3">
                                                <img src="{{ asset('assets') }}/img/team-3.jpg" alt="kal"
                                                    class="border-radius-lg shadow">
                                            </div>
                                            <div class="d-flex align-items-start flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Nick Daniel</h6>
                                                <p class="mb-0 text-xs">Hi! I need more information..</p>
                                            </div>
                                            <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                                href="javascript:;">Reply</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="mb-5 ps-3">
                                <h6 class="mb-1">Projects</h6>
                                <p class="text-sm">Architects design houses</p>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                    <div class="card card-blog card-plain">
                                        <div class="card-header p-0 mt-n4 mx-3">
                                            <a class="d-block shadow-xl border-radius-xl">
                                                <img src="{{ asset('assets') }}/img/home-decor-1.jpg"
                                                    alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                            </a>
                                        </div>
                                        <div class="card-body p-3">
                                            <p class="mb-0 text-sm">Project #2</p>
                                            <a href="javascript:;">
                                                <h5>
                                                    Modern
                                                </h5>
                                            </a>
                                            <p class="mb-4 text-sm">
                                                As Uber works through a huge amount of internal management turmoil.
                                            </p>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <button type="button" class="btn btn-outline-primary btn-sm mb-0">View
                                                    Project</button>
                                                <div class="avatar-group mt-2">
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Elena Morison">
                                                        <img alt="Image placeholder"
                                                            src="{{ asset('assets') }}/img/team-1.jpg">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Ryan Milly">
                                                        <img alt="Image placeholder"
                                                            src="{{ asset('assets') }}/img/team-2.jpg">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Nick Daniel">
                                                        <img alt="Image placeholder"
                                                            src="{{ asset('assets') }}/img/team-3.jpg">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Peterson">
                                                        <img alt="Image placeholder"
                                                            src="{{ asset('assets') }}/img/team-4.jpg">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                    <div class="card card-blog card-plain">
                                        <div class="card-header p-0 mt-n4 mx-3">
                                            <a class="d-block shadow-xl border-radius-xl">
                                                <img src="{{ asset('assets') }}/img/home-decor-2.jpg"
                                                    alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                                            </a>
                                        </div>
                                        <div class="card-body p-3">
                                            <p class="mb-0 text-sm">Project #1</p>
                                            <a href="javascript:;">
                                                <h5>
                                                    Scandinavian
                                                </h5>
                                            </a>
                                            <p class="mb-4 text-sm">
                                                Music is something that every person has his or her own specific
                                                opinion about.
                                            </p>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <button type="button" class="btn btn-outline-primary btn-sm mb-0">View
                                                    Project</button>
                                                <div class="avatar-group mt-2">
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Nick Daniel">
                                                        <img alt="Image placeholder"
                                                            src="{{ asset('assets') }}/img/team-3.jpg">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Peterson">
                                                        <img alt="Image placeholder"
                                                            src="{{ asset('assets') }}/img/team-4.jpg">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Elena Morison">
                                                        <img alt="Image placeholder"
                                                            src="{{ asset('assets') }}/img/team-1.jpg">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Ryan Milly">
                                                        <img alt="Image placeholder"
                                                            src="{{ asset('assets') }}/img/team-2.jpg">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                    <div class="card card-blog card-plain">
                                        <div class="card-header p-0 mt-n4 mx-3">
                                            <a class="d-block shadow-xl border-radius-xl">
                                                <img src="{{ asset('assets') }}/img/home-decor-3.jpg"
                                                    alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                            </a>
                                        </div>
                                        <div class="card-body p-3">
                                            <p class="mb-0 text-sm">Project #3</p>
                                            <a href="javascript:;">
                                                <h5>
                                                    Minimalist
                                                </h5>
                                            </a>
                                            <p class="mb-4 text-sm">
                                                Different people have different taste, and various types of music.
                                            </p>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <button type="button" class="btn btn-outline-primary btn-sm mb-0">View
                                                    Project</button>
                                                <div class="avatar-group mt-2">
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Peterson">
                                                        <img alt="Image placeholder"
                                                            src="{{ asset('assets') }}/img/team-4.jpg">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Nick Daniel">
                                                        <img alt="Image placeholder"
                                                            src="{{ asset('assets') }}/img/team-3.jpg">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Ryan Milly">
                                                        <img alt="Image placeholder"
                                                            src="{{ asset('assets') }}/img/team-2.jpg">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Elena Morison">
                                                        <img alt="Image placeholder"
                                                            src="{{ asset('assets') }}/img/team-1.jpg">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                    <div class="card card-blog card-plain">
                                        <div class="card-header p-0 mt-n4 mx-3">
                                            <a class="d-block shadow-xl border-radius-xl">
                                                <img src="https://images.unsplash.com/photo-1606744824163-985d376605aa?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                                    alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                            </a>
                                        </div>
                                        <div class="card-body p-3">
                                            <p class="mb-0 text-sm">Project #4</p>
                                            <a href="javascript:;">
                                                <h5>
                                                    Gothic
                                                </h5>
                                            </a>
                                            <p class="mb-4 text-sm">
                                                Why would anyone pick blue over pink? Pink is obviously a better
                                                color.
                                            </p>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <button type="button" class="btn btn-outline-primary btn-sm mb-0">View
                                                    Project</button>
                                                <div class="avatar-group mt-2">
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Peterson">
                                                        <img alt="Image placeholder"
                                                            src="{{ asset('assets') }}/img/team-4.jpg">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Nick Daniel">
                                                        <img alt="Image placeholder"
                                                            src="{{ asset('assets') }}/img/team-3.jpg">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Ryan Milly">
                                                        <img alt="Image placeholder"
                                                            src="{{ asset('assets') }}/img/team-2.jpg">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Elena Morison">
                                                        <img alt="Image placeholder"
                                                            src="{{ asset('assets') }}/img/team-1.jpg">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
