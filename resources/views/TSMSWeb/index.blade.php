<html>
    <head>
        <meta charset="utf-8">
        <title>TSMS</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        @include('TSMSWeb.styles')
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="50">
        <header id="header">
            <div class="container-fluid">
        
                <div id="logo" class="pull-left">
                    <a href="#intro" class="scrollto"><img id="navLogo" src="/others/stisla_admin_v1.0.0/dist/img/tbPageLogoWhite.png" alt="" title="" /></a>
                </div>
        
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="nav-item menu-active"><a href="#intro">Home</a></li>
                        <li class="nav-item"><a href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a href="#about">About Us</a></li>
                        <li class="nav-item"><a href="#contact">Contact Us</a></li>
                        <li class="nav-item"><a href="/consignee/register"><strong>Register</strong></a></li>
                    </ul>
                </nav>
                <!-- #nav-menu-container -->
            </div>
        </header>
        <!-- #header -->
        <section id="intro">
            <div class="intro-container">
                <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">
        
                    <ol class="carousel-indicators"></ol>
        
                    <div class="carousel-inner" role="listbox">
        
                        <div class="carousel-item active">
                            <div class="carousel-background"><img src="/others/stisla_admin_v1.0.0/dist/img/landing/intro-carousel/1.jpg" alt=""></div>
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <h2>Tugboat Services Management System</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <a href="/consignee/login" class="btn-get-started scrollto">Log-in</a>
                                </div>
                            </div>
                        </div>
        
                        <div class="carousel-item">
                            <div class="carousel-background"><img src="/others/stisla_admin_v1.0.0/dist/img/landing/intro-carousel/2.jpg" alt=""></div>
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <h2>Tugboat Services Management System</h2>
                                    <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut.</p>
                                    <a href="/consignee/login" class="btn-get-started scrollto">Log-in</a>
                                </div>
                            </div>
                        </div>
        
                        <div class="carousel-item">
                            <div class="carousel-background"><img src="/others/stisla_admin_v1.0.0/dist/img/landing/intro-carousel/3.jpg" alt=""></div>
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <h2>Tugboat Services Management System</h2>
                                    <p>Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt omnis iste natus error sit voluptatem accusantium.</p>
                                    <a href="/consignee/login" class="btn-get-started scrollto">Log-in</a>
                                </div>
                            </div>
                        </div>
        
                        <div class="carousel-item">
                            <div class="carousel-background"><img src="/others/stisla_admin_v1.0.0/dist/img/landing/intro-carousel/4.jpg" alt=""></div>
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <h2>Tugboat Services Management System</h2>
                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum.</p>
                                    <a href="/consignee/login" class="btn-get-started scrollto">Log-in</a>
                                </div>
                            </div>
                        </div>
        
                        <div class="carousel-item">
                            <div class="carousel-background"><img src="/others/stisla_admin_v1.0.0/dist/img/landing/intro-carousel/5.jpg" alt=""></div>
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <h2>Tugboat Services Management System</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <a href="/consignee/login" class="btn-get-started scrollto">Log-in</a>
                                </div>
                            </div>
                        </div>
        
                    </div>
        
                    <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
        
                    <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </section>
        @include('TSMSWeb.portfolio')
        @include('TSMSWeb.about')
        @include('TSMSWeb.services')
        @include('TSMSWeb.team')
        @include('TSMSWeb.contact')
        @include('TSMSWeb.footer')
        @include('TSMSWeb.scripts')

    </body>
</html>