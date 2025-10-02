<!DOCTYPE html>
<html lang="vi">

<head>
    <!-- Thẻ meta cơ bản -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SEO Meta Tags -->
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="language" content="Vietnamese">
    <meta name="revisit-after" content="1 days">
    <meta name="author" content="Vinhomes Green Paradise">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/logo.png') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url('') }}">

    @hasSection('meta')
        @yield('meta')
    @else
        <title>Vinhomes Green Paradise Cần Giờ - Siêu Đô Thị ESG 2.870ha | Chính Thức 2025</title>
        <meta name="description"
            content="Vinhomes Green Paradise Cần Giờ - Siêu đô thị lấn biển 2.870ha, vốn đầu tư 10 tỷ USD. Paradise Lagoon 443ha, sân golf Tiger Woods, Marina 5 sao. Hotline: {{ settings('phone') }}">
        <meta name="keywords"
            content="vinhomes green paradise, vinhomes cần giờ, green paradise cần giờ, siêu đô thị cần giờ, paradise lagoon, biệt thự biển cần giờ, the haven bay">


        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url('') }}">
        <meta property="og:title" content="Vinhomes Green Paradise Cần Giờ - Siêu Đô Thị ESG 2.870ha">
        <meta property="og:description"
            content="Siêu đô thị lấn biển đầu tiên Việt Nam với Paradise Lagoon 443ha lớn nhất thế giới. Chiết khấu 18%, hỗ trợ vay 0% lãi suất.">
        <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
        <meta property="og:locale" content="vi_VN">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:url" content="{{ url('') }}">
        <meta name="twitter:title" content="Vinhomes Green Paradise Cần Giờ - Siêu Đô Thị ESG">
        <meta name="twitter:description" content="Siêu đô thị 2.870ha với 13km bờ biển, vốn đầu tư 10 tỷ USD">
        <meta name="twitter:image" content="{{ asset('assets/images/logo.png') }}">
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('assets/styles.css') . '?v=' . config('app.asset_version') }}">
    <link rel="stylesheet" href="{{ asset('assets/utilities.css') . '?v=' . env('app.asset_version') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@700;800;900&display=swap"
        rel="stylesheet">
    @yield('css')

    <style>
        .nav-logo {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    {{-- <div id="preloader">
        <div class="loader-container">
            <div class="loader"></div>
            <p>Loading Green Paradise...</p>
        </div>
    </div> --}}

    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <h2>GREEN PARADISE</h2>
                <span>Siêu Đô Thị ESG</span>
            </div>
            <ul class="nav-menu">
                <li><a href="/" class="nav-link @if(request()->routeIs('home')) menu-active @endif">Trang Chủ</a></li>
                <li><a href="{{route('about')}}" class="nav-link @if(request()->routeIs('about')) menu-active @endif">Giới Thiệu</a></li>
                <li><a href="{{route('location')}}" class="nav-link @if(request()->routeIs('location')) menu-active @endif">Vị Trí</a></li>
                <li><a href="{{route('utility')}}" class="nav-link @if(request()->routeIs('utility')) menu-active @endif">Tiện Ích</a></li>
                <li><a href="{{route('gallery')}}" class="nav-link @if(request()->routeIs('gallery')) menu-active @endif">Hình Ảnh</a></li>
                <li><a href="{{route('news')}}" class="nav-link @if(request()->routeIs('news')) menu-active @endif">Tin Tức</a></li>
                <li><a href="{{route('contact')}}" class="nav-link @if(request()->routeIs('contact')) menu-active @endif">Liên Hệ</a></li>
            </ul>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    @yield('page')

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>GREEN PARADISE</h3>
                    <p>Siêu đô thị ESG đầu tiên tại Việt Nam, kiến tạo chuẩn mực sống mới cho tương lai.</p>
                    <div class="footer-logo">
                        <img src="{{asset('assets/images/logo-2.png')}}" alt="Vinhomes">
                    </div>
                </div>
                <div class="footer-column">
                    <h4>Khám Phá</h4>
                    <ul>
                        <li><a href="{{route('about')}}">Tổng quan dự án</a></li>
                        <li><a href="{{route('utility')}}">Vị trí & Tiện ích</a></li>
                        <li><a href="#">Mặt bằng & Thiết kế</a></li>
                        <li><a href="#">Chính sách bán hàng</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Hỗ Trợ</h4>
                    <ul>
                        <li><a href="#">Hướng dẫn mua nhà</a></li>
                        <li><a href="#">Hỗ trợ vay vốn</a></li>
                        <li><a href="#">Câu hỏi thường gặp</a></li>
                        <li><a href="{{route('about')}}">Liên hệ tư vấn</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Kết Nối</h4>
                    <p>Đăng ký nhận tin để cập nhật thông tin mới nhất</p>
                    <form class="newsletter-form" onsubmit="registerNewsletter(this, event);">
                        <input type="email" name="email" placeholder="Email của bạn">
                        <button type="submit">Đăng Ký</button>
                    </form>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Green Paradise. All rights reserved.</p>
                <div class="footer-links">
                    <a href="#">Điều khoản</a>
                    <a href="#">Chính sách</a>
                    <a href="#">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top -->
    <button id="backToTop" class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Scripts -->
    <script>
        // Preloader
        // window.addEventListener('load', () => {
        //     setTimeout(() => {
        //         document.getElementById('preloader').classList.add('hidden');
        //     }, 500);
        // });

        // Navbar Scroll Effect
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }

            // Back to top button
            const backToTop = document.getElementById('backToTop');
            if (window.scrollY > 500) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });

        // Mobile Menu Toggle
        document.querySelector('.hamburger').addEventListener('click', function() {
            this.classList.toggle('active');
            document.querySelector('.nav-menu').classList.toggle('active');
        });

        // Smooth Scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    // Close mobile menu
                    document.querySelector('.nav-menu').classList.remove('active');
                    document.querySelector('.hamburger').classList.remove('active');
                }
            });
        });

        // Back to Top
        document.getElementById('backToTop').addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Number Counter Animation
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px'
        };

        const animateNumbers = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.stat-number');
                    counters.forEach(counter => {
                        const target = parseInt(counter.getAttribute('data-count'));
                        const duration = 2000;
                        const step = target / (duration / 16);
                        let current = 0;

                        const updateCounter = () => {
                            current += step;
                            if (current < target) {
                                counter.textContent = Math.floor(current);
                                requestAnimationFrame(updateCounter);
                            } else {
                                counter.textContent = target;
                            }
                        };
                        updateCounter();
                    });
                    observer.unobserve(entry.target);
                }
            });
        };

        const numberObserver = new IntersectionObserver(animateNumbers, observerOptions);
        const statsSection = document.querySelector('.hero-stats');
        if (statsSection) {
            numberObserver.observe(statsSection);
        }

        // Scroll Animations
        const scrollElements = document.querySelectorAll('.about-grid, .location-content, .utilities-grid, .news-grid');
        const elementInView = (el, dividend = 1) => {
            const elementTop = el.getBoundingClientRect().top;
            return (
                elementTop <= (window.innerHeight || document.documentElement.clientHeight) / dividend
            );
        };

        const displayScrollElement = (element) => {
            element.classList.add('in-view');
        };

        const handleScrollAnimation = () => {
            scrollElements.forEach((el) => {
                if (elementInView(el, 1.25)) {
                    displayScrollElement(el);
                }
            });
        };

        window.addEventListener('scroll', handleScrollAnimation);
        handleScrollAnimation(); // Run on load

    </script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif

        @if (session('warning'))
            toastr.warning("{{ session('warning') }}");
        @endif

        @if (session('info'))
            toastr.info("{{ session('info') }}");
        @endif
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function registerNewsletter(form, e) {
            e.preventDefault();

            $(form).find('button').prop('disabled', true);

            var data = {
                email: $(form).find('input[name="email"]').val()
            };

            $.ajax({
                type: 'post',
                url: '{{ route('newsletters') }}',
                data: data,
            }).then(function(res) {
                if (res.success) {
                    toastr.success(
                        'Cảm ơn bạn đã đăng ký! Chúng tôi sẽ liên hệ với bạn sớm nhất.');
                    $(form)[0].reset();
                } else {
                    toastr.error(res.msg);
                }


            });
            $(form).find('button').prop('disabled', false);
        }

        $('.nav-logo').on('click', function() {
            window.location.href = '/';
        });  
    </script>
    @yield('js')
</body>

</html>
