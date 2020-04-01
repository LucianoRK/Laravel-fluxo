@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-xl-9 col-lg-8">
        <div class="card card-tabs">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <span class="align-middle">INFORMAÇÕES DO CLIENTE - [ NOME ]</span>
                    </div>
                </div>
            </div>
            <div class="card-header p-0 no-border">
                <ul class="nav nav-tabs primary-tabs p-l-30 m-0">
                    <li class="nav-item" role="presentation"><a href="#profile-about" class="nav-link active show" data-toggle="tab" aria-expanded="true">Cliente</a></li>
                    <li class="nav-item" role="presentation"><a href="#profile-photos" class="nav-link" data-toggle="tab" aria-expanded="true">Dependente(s)</a></li>
                    <li class="nav-item" role="presentation"><a href="#profile-contacts" class="nav-link" data-toggle="tab" aria-expanded="true">Tratamento(s)</a></li>
                    <li class="nav-item" role="presentation"><a href="#profile-contacts" class="nav-link" data-toggle="tab" aria-expanded="true">Financeiro</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fadeIn active show" id="profile-about">
                        <div class="profile-wrapper p-t-20">
                            <h5 class="card-title">Summary</h5>
                            <p>Albert Einstein was a German-born theoretical physicist who developed the theory of relativity, one of the two pillars of modern physics (alongside QuantumPro mechanics).His work is also known for its influence on the philosophy of science.
                                He is best known by the general public for his mass–energy equivalence formula E = mc2 (which has been dubbed "the world's most famous equation"). He received the 1921 Nobel Prize in Physics "for his services to theoretical physics, and especially
                                for his discovery of the law of the photoelectric effect", a pivotal step in the evolution of QuantumPro theory.</p>
                                <p>
                                    Near the beginning of his career, Einstein thought that Newtonian mechanics was no longer enough to reconcile the laws of classical mechanics with the laws of the electromagnetic field. This led him to develop his special theory of relativity during his
                                    time at the Swiss Patent Office in Bern (1902–1909), Switzerland. However, he realized that the principle of relativity could also be extended to gravitational fields and—with his subsequent theory of gravitation in 1916—he published a paper
                                    on general relativity. He continued to deal with problems of statistical mechanics and QuantumPro theory, which led to his explanations of particle theory and the motion of molecules. He also investigated the thermal properties of light which
                                    laid the foundation of the photon theory of light. In 1917, he applied the general theory of relativity to model the large-scale structure of the universe.
                                </p>
                            </div>
                            <div class="profile-wrapper">
                                <h5 class="card-title">Basic Info</h5>
                                <ul class="list-reset p-t-10">
                                    <li class="p-b-10"><span class="w-150 d-inline-block">Born</span><span>14 March 1879</span></li>
                                    <li class="p-b-10"><span class="w-150 d-inline-block">Residence</span><span>Germany</span></li>
                                    <li class="p-b-10"><span class="w-150 d-inline-block">Education</span><span>University of Zurich (Ph.D., 1905)</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fadeIn" id="profile-photos">
                            <div class="card-columns">
                                <div class="card">
                                    <img class="card-img" src="../assets/img/demos/alex-block-340243-unsplash.jpg" alt="Card image">
                                </div>
                                <div class="card">
                                    <img class="card-img" src="../assets/img/demos/roman-mager-59976-unsplash.jpg" alt="Card image">
                                </div>
                                <div class="card">
                                    <img class="card-img" src="../assets/img/demos/sam-mouat-420782-unsplash.jpg" alt="Card image">
                                </div>
                                <div class="card">
                                    <img class="card-img" src="../assets/img/demos/daniel-alvarez-sanchez-diaz-474862-unsplash.jpg" alt="Card image">
                                </div>
                                <div class="card">
                                    <img class="card-img" src="../assets/img/demos/bundo-kim-610360-unsplash.jpg" alt="Card image">
                                </div>
                                <div class="card">
                                    <img class="card-img" src="../assets/img/demos/galen-crout-175291-unsplash.jpg" alt="Card image">
                                </div>
                                <div class="card">
                                    <img class="card-img" src="../assets/img/demos/cliff-johnson-20686-unsplash.jpg" alt="Card image">
                                </div>
                                <div class="card">
                                    <img class="card-img" src="../assets/img/demos/bryan-goff-360297-unsplash.jpg" alt="Card image">200
                                </div>
                                <div class="card">
                                    <img class="card-img" src="../assets/img/demos/thomas-kelley-128626-unsplash.jpg" alt="Card image">
                                </div>
                                <div class="card">
                                    <img class="card-img" src="../assets/img/demos/fabrizio-verrecchia-180315-unsplash.jpg" alt="Card image">
                                </div>
                                <div class="card">
                                    <img class="card-img" src="../assets/img/demos/jonathan-francisca-606247-unsplash.jpg" alt="Card image">
                                </div>
                                <div class="card">
                                    <img class="card-img" src="../assets/img/demos/hal-gatewood-405338-unsplash.jpg" alt="Card image">
                                </div>
                                <div class="card">
                                    <img class="card-img" src="../assets/img/demos/joao-silas-74207-unsplash.jpg" alt="Card image">
                                </div>
                                <div class="card">
                                    <img class="card-img" src="../assets/img/demos/nasa-89125-unsplash.jpg" alt="Card image">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fadeIn contact-list" id="profile-contacts">
                            <div class="row">
                                <!-- .col -->
                                <div class="col-md-6 col-lg-4 col-xxl-3">
                                    <div class="card contact-item border shadow-on-hover">
                                        <div class="card-header border-none">
                                            <ul class="actions top-right">
                                                <li class="dropdown">
                                                    <a href="javascript:void(0)" class="btn btn-fab" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="icon dripicons-dots-3 rotate-90 font-size-24"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <div class="dropdown-header">
                                                            Manage Contact
                                                        </div>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-view-list"></i> View
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-pencil"></i> Edit
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-cloud-download"></i> Export
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-trash"></i> Remove
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <img src="../assets/img/avatars/01.jpg" alt="user" class="rounded-circle max-w-100 m-t-20">
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <h5 class="card-title">Vanessa	Norton	</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center p-0">
                                            <div class="row m-0">
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.mail.html" class="d-block p-20">
                                                            <i class="icon dripicons-mail"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.messages.html" class="d-block p-20">
                                                            <i class="icon dripicons-message"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="pages.profile.html" class="d-block p-20">
                                                            <i class="icon dripicons-user-id"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <!-- .col -->
                                <div class="col-md-6 col-lg-4 col-xxl-3">
                                    <div class="card contact-item border shadow-on-hover">
                                        <div class="card-header border-none">
                                            <ul class="actions top-right">
                                                <li class="dropdown">
                                                    <a href="javascript:void(0)" class="btn btn-fab" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="icon dripicons-dots-3 rotate-90 font-size-24"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <div class="dropdown-header">
                                                            Manage Contact
                                                        </div>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-view-list"></i> View
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-pencil"></i> Edit
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-cloud-download"></i> Export
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-trash"></i> Remove
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <img src="../assets/img/avatars/02.jpg" alt="user" class="rounded-circle max-w-100 m-t-20">
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <h5 class="card-title">Ramona Page</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center p-0">
                                            <div class="row m-0">
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.mail.html" class="d-block p-20">
                                                            <i class="icon dripicons-mail"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.messages.html" class="d-block p-20">
                                                            <i class="icon dripicons-message"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="pages.profile.html" class="d-block p-20">
                                                            <i class="icon dripicons-user-id"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <!-- .col -->
                                <div class="col-md-6 col-lg-4 col-xxl-3">
                                    <div class="card contact-item border shadow-on-hover">
                                        <div class="card-header border-none">
                                            <ul class="actions top-right">
                                                <li class="dropdown">
                                                    <a href="javascript:void(0)" class="btn btn-fab" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="icon dripicons-dots-3 rotate-90 font-size-24"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <div class="dropdown-header">
                                                            Manage Contact
                                                        </div>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-view-list"></i> View
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-pencil"></i> Edit
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-cloud-download"></i> Export
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-trash"></i> Remove
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <img src="../assets/img/avatars/03.jpg" alt="user" class="rounded-circle max-w-100 m-t-20">
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <h5 class="card-title">Jacob	Ross</h5>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center p-0">
                                            <div class="row m-0">
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.mail.html" class="d-block p-20">
                                                            <i class="icon dripicons-mail"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.messages.html" class="d-block p-20">
                                                            <i class="icon dripicons-message"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="pages.profile.html" class="d-block p-20">
                                                            <i class="icon dripicons-user-id"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <!-- .col -->
                                <div class="col-md-6 col-lg-4 col-xxl-3">
                                    <div class="card contact-item border shadow-on-hover">
                                        <div class="card-header border-none">
                                            <ul class="actions top-right">
                                                <li class="dropdown">
                                                    <a href="javascript:void(0)" class="btn btn-fab" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="icon dripicons-dots-3 rotate-90 font-size-24"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <div class="dropdown-header">
                                                            Manage Contact
                                                        </div>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-view-list"></i> View
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-pencil"></i> Edit
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-cloud-download"></i> Export
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-trash"></i> Remove
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <img src="../assets/img/avatars/9.jpg" alt="user" class="rounded-circle max-w-100 m-t-20">
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <h5 class="card-title">Rochelle Barton</h5>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center p-0">
                                            <div class="row m-0">
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.mail.html" class="d-block p-20">
                                                            <i class="icon dripicons-mail"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.messages.html" class="d-block p-20">
                                                            <i class="icon dripicons-message"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="pages.profile.html" class="d-block p-20">
                                                            <i class="icon dripicons-user-id"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <!-- .col -->
                                <div class="col-md-6 col-lg-4 col-xxl-3">
                                    <div class="card contact-item border shadow-on-hover">
                                        <div class="card-header border-none">
                                            <ul class="actions top-right">
                                                <li class="dropdown">
                                                    <a href="javascript:void(0)" class="btn btn-fab" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="icon dripicons-dots-3 rotate-90 font-size-24"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <div class="dropdown-header">
                                                            Manage Contact
                                                        </div>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-view-list"></i> View
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-pencil"></i> Edit
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-cloud-download"></i> Export
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-trash"></i> Remove
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <img src="../assets/img/avatars/05.jpg" alt="user" class="rounded-circle max-w-100 m-t-20">
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <h5 class="card-title">Sophia Robinson</h5>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center p-0">
                                            <div class="row m-0">
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.mail.html" class="d-block p-20">
                                                            <i class="icon dripicons-mail"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.messages.html" class="d-block p-20">
                                                            <i class="icon dripicons-message"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="pages.profile.html" class="d-block p-20">
                                                            <i class="icon dripicons-user-id"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <!-- .col -->
                                <div class="col-md-6 col-lg-4 col-xxl-3">
                                    <div class="card contact-item border shadow-on-hover">
                                        <div class="card-header border-none">
                                            <ul class="actions top-right">
                                                <li class="dropdown">
                                                    <a href="javascript:void(0)" class="btn btn-fab" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="icon dripicons-dots-3 rotate-90 font-size-24"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <div class="dropdown-header">
                                                            Manage Contact
                                                        </div>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-view-list"></i> View
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-pencil"></i> Edit
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-cloud-download"></i> Export
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-trash"></i> Remove
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <img src="../assets/img/avatars/06.jpg" alt="user" class="rounded-circle max-w-100 m-t-20">
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <h5 class="card-title">Claire Peters</h5>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center p-0">
                                            <div class="row m-0">
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.mail.html" class="d-block p-20">
                                                            <i class="icon dripicons-mail"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.messages.html" class="d-block p-20">
                                                            <i class="icon dripicons-message"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="pages.profile.html" class="d-block p-20">
                                                            <i class="icon dripicons-user-id"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <!-- .col -->
                                <div class="col-md-6 col-lg-4 col-xxl-3">
                                    <div class="card contact-item border shadow-on-hover">
                                        <div class="card-header border-none">
                                            <ul class="actions top-right">
                                                <li class="dropdown">
                                                    <a href="javascript:void(0)" class="btn btn-fab" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="icon dripicons-dots-3 rotate-90 font-size-24"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <div class="dropdown-header">
                                                            Manage Contact
                                                        </div>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-view-list"></i> View
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-pencil"></i> Edit
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-cloud-download"></i> Export
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-trash"></i> Remove
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <img src="../assets/img/avatars/07.jpg" alt="user" class="rounded-circle max-w-100 m-t-20">
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <h5 class="card-title">Noah Harper</h5>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center p-0">
                                            <div class="row m-0">
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.mail.html" class="d-block p-20">
                                                            <i class="icon dripicons-mail"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.messages.html" class="d-block p-20">
                                                            <i class="icon dripicons-message"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="pages.profile.html" class="d-block p-20">
                                                            <i class="icon dripicons-user-id"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <!-- .col -->
                                <div class="col-md-6 col-lg-4 col-xxl-3">
                                    <div class="card contact-item border shadow-on-hover">
                                        <div class="card-header border-none">
                                            <ul class="actions top-right">
                                                <li class="dropdown">
                                                    <a href="javascript:void(0)" class="btn btn-fab" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="icon dripicons-dots-3 rotate-90 font-size-24"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <div class="dropdown-header">
                                                            Manage Contact
                                                        </div>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-view-list"></i> View
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-pencil"></i> Edit
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-cloud-download"></i> Export
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-trash"></i> Remove
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <img src="../assets/img/avatars/08.jpg" alt="user" class="rounded-circle max-w-100 m-t-20">
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <h5 class="card-title">Colin Jones</h5>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center p-0">
                                            <div class="row m-0">
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.mail.html" class="d-block p-20">
                                                            <i class="icon dripicons-mail"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.messages.html" class="d-block p-20">
                                                            <i class="icon dripicons-message"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="pages.profile.html" class="d-block p-20">
                                                            <i class="icon dripicons-user-id"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <!-- .col -->
                                <div class="col-md-6 col-lg-4 col-xxl-3">
                                    <div class="card contact-item border shadow-on-hover">
                                        <div class="card-header border-none">
                                            <ul class="actions top-right">
                                                <li class="dropdown">
                                                    <a href="javascript:void(0)" class="btn btn-fab" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="icon dripicons-dots-3 rotate-90 font-size-24"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <div class="dropdown-header">
                                                            Manage Contact
                                                        </div>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-view-list"></i> View
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-pencil"></i> Edit
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-cloud-download"></i> Export
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-trash"></i> Remove
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <img src="../assets/img/avatars/2.jpg" alt="user" class="rounded-circle max-w-100 m-t-20">
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <h5 class="card-title">Wendy Abbott</h5>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center p-0">
                                            <div class="row m-0">
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.mail.html" class="d-block p-20">
                                                            <i class="icon dripicons-mail"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.messages.html" class="d-block p-20">
                                                            <i class="icon dripicons-message"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="pages.profile.html" class="d-block p-20">
                                                            <i class="icon dripicons-user-id"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <!-- .col -->
                                <div class="col-md-6 col-lg-4 col-xxl-3">
                                    <div class="card contact-item border shadow-on-hover">
                                        <div class="card-header border-none">
                                            <ul class="actions top-right">
                                                <li class="dropdown">
                                                    <a href="javascript:void(0)" class="btn btn-fab" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="icon dripicons-dots-3 rotate-90 font-size-24"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <div class="dropdown-header">
                                                            Manage Contact
                                                        </div>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-view-list"></i> View
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-pencil"></i> Edit
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-cloud-download"></i> Export
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-trash"></i> Remove
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <img src="../assets/img/avatars/10.jpg" alt="user" class="rounded-circle max-w-100 m-t-20">
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <h5 class="card-title">Cory Carter</h5>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center p-0">
                                            <div class="row m-0">
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.mail.html" class="d-block p-20">
                                                            <i class="icon dripicons-mail"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.messages.html" class="d-block p-20">
                                                            <i class="icon dripicons-message"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="pages.profile.html" class="d-block p-20">
                                                            <i class="icon dripicons-user-id"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <!-- .col -->
                                <div class="col-md-6 col-lg-4 col-xxl-3">
                                    <div class="card contact-item border shadow-on-hover">
                                        <div class="card-header border-none">
                                            <ul class="actions top-right">
                                                <li class="dropdown">
                                                    <a href="javascript:void(0)" class="btn btn-fab" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="icon dripicons-dots-3 rotate-90 font-size-24"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <div class="dropdown-header">
                                                            Manage Contact
                                                        </div>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-view-list"></i> View
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-pencil"></i> Edit
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-cloud-download"></i> Export
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-trash"></i> Remove
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <img src="../assets/img/avatars/11.jpg" alt="user" class="rounded-circle max-w-100 m-t-20">
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <h5 class="card-title">Ken Patrick</h5>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center p-0">
                                            <div class="row m-0">
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.mail.html" class="d-block p-20">
                                                            <i class="icon dripicons-mail"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.messages.html" class="d-block p-20">
                                                            <i class="icon dripicons-message"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="pages.profile.html" class="d-block p-20">
                                                            <i class="icon dripicons-user-id"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <!-- .col -->
                                <div class="col-md-6 col-lg-4 col-xxl-3">
                                    <div class="card contact-item border shadow-on-hover">
                                        <div class="card-header border-none">
                                            <ul class="actions top-right">
                                                <li class="dropdown">
                                                    <a href="javascript:void(0)" class="btn btn-fab" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="icon dripicons-dots-3 rotate-90 font-size-24"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <div class="dropdown-header">
                                                            Manage Contact
                                                        </div>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-view-list"></i> View
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-pencil"></i> Edit
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-cloud-download"></i> Export
                                                        </a>
                                                        <a href="javascript:void(0)" class="dropdown-item">
                                                            <i class="icon dripicons-trash"></i> Remove
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <img src="../assets/img/avatars/04.jpg" alt="user" class="rounded-circle max-w-100 m-t-20">
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <h5 class="card-title">Cindy Tate</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center p-0">
                                            <div class="row m-0">
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.mail.html" class="d-block p-20">
                                                            <i class="icon dripicons-mail"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="apps.messages.html" class="d-block p-20">
                                                            <i class="icon dripicons-message"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <div class="contact">
                                                        <a href="pages.profile.html" class="d-block p-20">
                                                            <i class="icon dripicons-user-id"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
