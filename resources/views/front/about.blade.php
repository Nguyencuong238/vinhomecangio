@extends('layouts.front')

@section('meta')
    <title>Giới Thiệu Dự Án Vinhomes Green Paradise - Đô Thị ESG Đầu Tiên Việt Nam</title>
    <meta name="description"
        content="Tìm hiểu về Vinhomes Green Paradise - Siêu đô thị ESG đầu tiên tại Việt Nam với quy mô 2.870ha, 100% năng lượng tái tạo, thiết kế bởi Foster + Partners">
    <meta name="keywords"
        content="giới thiệu vinhomes green paradise, đô thị ESG, foster partners, boston consulting group, vinhomes cần giờ">


    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Giới Thiệu Dự Án Vinhomes Green Paradise - Đô Thị ESG Đầu Tiên Việt Nam">
    <meta property="og:description"
        content="Tìm hiểu về Vinhomes Green Paradise - Siêu đô thị ESG đầu tiên tại Việt Nam với quy mô 2.870ha, 100% năng lượng tái tạo, thiết kế bởi Foster + Partners">
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
    <meta property="og:locale" content="vi_VN">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="Giới Thiệu Dự Án Vinhomes Green Paradise - Đô Thị ESG Đầu Tiên Việt Nam">
    <meta name="twitter:description" content="Siêu đô thị 2.870ha với 13km bờ biển, vốn đầu tư 10 tỷ USD">
    <meta name="twitter:image" content="{{ asset('assets/images/logo.png') }}">
@endsection

@section('css')
    <style>
        .breadcrumb-section {
            background: linear-gradient(135deg, #05668d 0%, #00a896 100%);
            padding: 120px 0 60px;
            margin-top: 0;
        }

        ol.breadcrumb {
            background: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 10px;
            color: #fff;
            list-style: none;

        }
    </style>
    <!-- Schema for About Page -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "AboutPage",
            "mainEntity": {
                "@type": "Place",
                "name": "Vinhomes Green Paradise",
                "description": "Siêu đô thị ESG đầu tiên Việt Nam",
                "hasMap": "https://goo.gl/maps/...",
                "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "4.8",
                "reviewCount": "1234"
                }
            }
        }
    </script>
@endsection

@section('page')
    <!-- Breadcrumb -->
    <section class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/" style="color: #fff; text-decoration: none;">
                            Trang Chủ
                        </a>
                    </li>
                    >
                    <li class="breadcrumb-item active" aria-current="page" style="color: #f0f3bd;">Giới Thiệu</li>
                </ol>
            </nav>
            <h1 class="page-title" style="color: #fff; font-size: 3rem; margin-top: 20px;">Giới Thiệu Dự Án</h1>
        </div>
    </section>

    <!-- Main Content -->
    <main>
        <!-- Overview Section -->
        <section class="about-overview" style="padding: 80px 0;">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">TỔNG QUAN GREEN PARADISE</h2>
                    <p class="section-subtitle">Kiến Tạo Chuẩn Sống Mới Cho Tương Lai</p>
                </div>
                <div class="overview-content"
                    style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;">
                    <div class="overview-text">
                        <h3 style="color: var(--primary-color); margin-bottom: 20px;">Siêu Đô Thị ESG Đầu Tiên Việt Nam</h3>
                        <p style="line-height: 1.8; color: var(--text-light); margin-bottom: 20px;">
                            Green Paradise Cần Giờ là dự án siêu đô thị lấn biển đầu tiên tại Việt Nam, được phát triển bởi
                            Vinhomes với tổng vốn đầu tư lên tới 10 tỷ USD trên diện tích 2.870 hecta.
                        </p>
                        <p style="line-height: 1.8; color: var(--text-light); margin-bottom: 20px;">
                            Dự án được quy hoạch theo tiêu chuẩn ESG (Environmental - Social - Governance) với ba trụ cột
                            chính: Xanh - Thông minh - Sinh thái, hứa hẹn trở thành biểu tượng mới của TP.HCM và điểm đến du
                            lịch hàng đầu Đông Nam Á.
                        </p>
                        <div class="key-numbers"
                            style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-top: 30px;">
                            <div class="number-item"
                                style="padding: 20px; background: linear-gradient(135deg, rgba(0,168,150,0.1) 0%, rgba(2,195,154,0.1) 100%); border-radius: 10px;">
                                <h4 style="color: var(--primary-color); font-size: 2rem; margin-bottom: 5px;">2.870 ha</h4>
                                <p style="color: var(--text-light); font-size: 14px; margin: 0;">Tổng diện tích</p>
                            </div>
                            <div class="number-item"
                                style="padding: 20px; background: linear-gradient(135deg, rgba(0,168,150,0.1) 0%, rgba(2,195,154,0.1) 100%); border-radius: 10px;">
                                <h4 style="color: var(--primary-color); font-size: 2rem; margin-bottom: 5px;">10 tỷ USD</h4>
                                <p style="color: var(--text-light); font-size: 14px; margin: 0;">Vốn đầu tư</p>
                            </div>
                            <div class="number-item"
                                style="padding: 20px; background: linear-gradient(135deg, rgba(0,168,150,0.1) 0%, rgba(2,195,154,0.1) 100%); border-radius: 10px;">
                                <h4 style="color: var(--primary-color); font-size: 2rem; margin-bottom: 5px;">230.000</h4>
                                <p style="color: var(--text-light); font-size: 14px; margin: 0;">Cư dân</p>
                            </div>
                            <div class="number-item"
                                style="padding: 20px; background: linear-gradient(135deg, rgba(0,168,150,0.1) 0%, rgba(2,195,154,0.1) 100%); border-radius: 10px;">
                                <h4 style="color: var(--primary-color); font-size: 2rem; margin-bottom: 5px;">13 km</h4>
                                <p style="color: var(--text-light); font-size: 14px; margin: 0;">Bờ biển</p>
                            </div>
                        </div>
                    </div>
                    <div class="overview-image">
                        <img src="{{ asset('assets/images/photo-1613490493576-7fde63acd811.jpeg') }}"
                            alt="Green Paradise Overview"
                            style="width: 100%; border-radius: 20px; box-shadow: var(--shadow-lg);">
                    </div>
                </div>
            </div>
        </section>

        <!-- Vision & Mission -->
        <section class="vision-mission"
            style="padding: 80px 0; background: linear-gradient(180deg, #f8f9fa 0%, #fff 100%);">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">TẦM NHÌN & SỨ MỆNH</h2>
                    <p class="section-subtitle">Định Hướng Phát Triển Bền Vững</p>
                </div>
                <div class="vm-grid"
                    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 40px;">
                    <div class="vm-card"
                        style="background: #fff; padding: 40px; border-radius: 20px; box-shadow: var(--shadow-sm); border-left: 4px solid var(--primary-color);">
                        <i class="fas fa-eye"
                            style="font-size: 48px; color: var(--primary-color); margin-bottom: 20px;"></i>
                        <h3 style="margin-bottom: 15px;">Tầm Nhìn 2030</h3>
                        <p style="color: var(--text-light); line-height: 1.8;">
                            Trở thành siêu đô thị biển hàng đầu Đông Nam Á, biểu tượng cho sự phát triển bền vững và thông
                            minh, điểm đến du lịch - nghỉ dưỡng - giải trí đẳng cấp quốc tế.
                        </p>
                    </div>
                    <div class="vm-card"
                        style="background: #fff; padding: 40px; border-radius: 20px; box-shadow: var(--shadow-sm); border-left: 4px solid var(--secondary-color);">
                        <i class="fas fa-bullseye"
                            style="font-size: 48px; color: var(--secondary-color); margin-bottom: 20px;"></i>
                        <h3 style="margin-bottom: 15px;">Sứ Mệnh</h3>
                        <p style="color: var(--text-light); line-height: 1.8;">
                            Kiến tạo không gian sống đẳng cấp, hài hòa với thiên nhiên, ứng dụng công nghệ tiên tiến nhất,
                            mang lại cuộc sống thịnh vượng và bền vững cho cộng đồng.
                        </p>
                    </div>
                    <div class="vm-card"
                        style="background: #fff; padding: 40px; border-radius: 20px; box-shadow: var(--shadow-sm); border-left: 4px solid var(--dark-color);">
                        <i class="fas fa-star" style="font-size: 48px; color: var(--dark-color); margin-bottom: 20px;"></i>
                        <h3 style="margin-bottom: 15px;">Giá Trị Cốt Lõi</h3>
                        <p style="color: var(--text-light); line-height: 1.8;">
                            Bền vững - Sáng tạo - Cộng đồng - Chất lượng. Cam kết phát triển dựa trên nguyên tắc ESG, tạo
                            giá trị lâu dài cho khách hàng và xã hội.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Development Phases -->
        <section class="development-phases" style="padding: 80px 0;">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">GIAI ĐOẠN PHÁT TRIỂN</h2>
                    <p class="section-subtitle">Lộ Trình Xây Dựng Siêu Đô Thị</p>
                </div>
                <div class="timeline" style="position: relative; padding: 40px 0;">
                    <div class="timeline-line"
                        style="position: absolute; left: 50%; transform: translateX(-50%); width: 2px; height: 100%; background: var(--gradient-primary);">
                    </div>

                    <div class="timeline-item" style="display: flex; margin-bottom: 60px; align-items: center;">
                        <div class="timeline-content" style="flex: 1; padding-right: 40px; text-align: right;">
                            <h3 style="color: var(--primary-color); margin-bottom: 10px;">Giai Đoạn 1: 2025-2027</h3>
                            <h4 style="margin-bottom: 10px;">Khởi Động & Hạ Tầng</h4>
                            <p style="color: var(--text-light);">Xây dựng hạ tầng cơ bản, cầu Cần Giờ, metro tốc độ cao. Ra
                                mắt phân khu đầu tiên 200ha với biệt thự biển và shophouse.</p>
                        </div>
                        <div class="timeline-dot"
                            style="width: 20px; height: 20px; background: var(--primary-color); border: 4px solid #fff; border-radius: 50%; position: relative; z-index: 1; box-shadow: var(--shadow-md);">
                        </div>
                        <div class="timeline-date" style="flex: 1; padding-left: 40px;">
                            <span
                                style="background: var(--gradient-primary); color: #fff; padding: 8px 20px; border-radius: 20px; font-weight: 600;">2025-2027</span>
                        </div>
                    </div>

                    <div class="timeline-item" style="display: flex; margin-bottom: 60px; align-items: center;">
                        <div class="timeline-date" style="flex: 1; padding-right: 40px; text-align: right;">
                            <span
                                style="background: var(--gradient-primary); color: #fff; padding: 8px 20px; border-radius: 20px; font-weight: 600;">2027-2030</span>
                        </div>
                        <div class="timeline-dot"
                            style="width: 20px; height: 20px; background: var(--secondary-color); border: 4px solid #fff; border-radius: 50%; position: relative; z-index: 1; box-shadow: var(--shadow-md);">
                        </div>
                        <div class="timeline-content" style="flex: 1; padding-left: 40px;">
                            <h3 style="color: var(--secondary-color); margin-bottom: 10px;">Giai Đoạn 2: 2027-2030</h3>
                            <h4 style="margin-bottom: 10px;">Phát Triển Toàn Diện</h4>
                            <p style="color: var(--text-light);">Hoàn thiện Paradise Lagoon, tòa tháp 108 tầng, sân golf 36
                                lỗ. Khai trương Cleveland Clinic và Marina quốc tế.</p>
                        </div>
                    </div>

                    <div class="timeline-item" style="display: flex; align-items: center;">
                        <div class="timeline-content" style="flex: 1; padding-right: 40px; text-align: right;">
                            <h3 style="color: var(--dark-color); margin-bottom: 10px;">Giai Đoạn 3: 2030-2035</h3>
                            <h4 style="margin-bottom: 10px;">Hoàn Thiện & Vận Hành</h4>
                            <p style="color: var(--text-light);">Hoàn thành toàn bộ dự án, đưa vào vận hành các tiện ích
                                cao cấp. Green Paradise trở thành điểm đến du lịch hàng đầu châu Á.</p>
                        </div>
                        <div class="timeline-dot"
                            style="width: 20px; height: 20px; background: var(--dark-color); border: 4px solid #fff; border-radius: 50%; position: relative; z-index: 1; box-shadow: var(--shadow-md);">
                        </div>
                        <div class="timeline-date" style="flex: 1; padding-left: 40px;">
                            <span
                                style="background: linear-gradient(135deg, #05668d 0%, #028090 100%); color: #fff; padding: 8px 20px; border-radius: 20px; font-weight: 600;">2030-2035</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ESG Standards -->
        <section class="esg-standards"
            style="padding: 80px 0; background: linear-gradient(135deg, #05668d 0%, #00a896 100%); color: #fff;">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title" style="color: #fff;">TIÊU CHUẨN ESG</h2>
                    <p class="section-subtitle" style="color: rgba(255,255,255,0.9);">Cam Kết Phát Triển Bền Vững</p>
                </div>
                <div class="esg-grid"
                    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
                    <div class="esg-card"
                        style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 40px; border-radius: 20px; text-align: center; border: 1px solid rgba(255,255,255,0.2);">
                        <i class="fas fa-leaf" style="font-size: 48px; color: #90EE90; margin-bottom: 20px;"></i>
                        <h3 style="color: #fff; margin-bottom: 15px;">Environmental</h3>
                        <ul style="list-style: none; padding: 0; text-align: left;">
                            <li style="margin-bottom: 10px; color: rgba(255,255,255,0.9);">✓ 70% diện tích cây xanh & mặt
                                nước</li>
                            <li style="margin-bottom: 10px; color: rgba(255,255,255,0.9);">✓ 100% năng lượng tái tạo</li>
                            <li style="margin-bottom: 10px; color: rgba(255,255,255,0.9);">✓ Zero Carbon Emissions 2035
                            </li>
                            <li style="color: rgba(255,255,255,0.9);">✓ Bảo tồn đa dạng sinh học</li>
                        </ul>
                    </div>
                    <div class="esg-card"
                        style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 40px; border-radius: 20px; text-align: center; border: 1px solid rgba(255,255,255,0.2);">
                        <i class="fas fa-users" style="font-size: 48px; color: #87CEEB; margin-bottom: 20px;"></i>
                        <h3 style="color: #fff; margin-bottom: 15px;">Social</h3>
                        <ul style="list-style: none; padding: 0; text-align: left;">
                            <li style="margin-bottom: 10px; color: rgba(255,255,255,0.9);">✓ 230.000 việc làm trực tiếp
                            </li>
                            <li style="margin-bottom: 10px; color: rgba(255,255,255,0.9);">✓ Nhà ở xã hội 20%</li>
                            <li style="margin-bottom: 10px; color: rgba(255,255,255,0.9);">✓ Giáo dục & Y tế đẳng cấp</li>
                            <li style="color: rgba(255,255,255,0.9);">✓ Cộng đồng văn hóa đa dạng</li>
                        </ul>
                    </div>
                    <div class="esg-card"
                        style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 40px; border-radius: 20px; text-align: center; border: 1px solid rgba(255,255,255,0.2);">
                        <i class="fas fa-chart-line" style="font-size: 48px; color: #FFD700; margin-bottom: 20px;"></i>
                        <h3 style="color: #fff; margin-bottom: 15px;">Governance</h3>
                        <ul style="list-style: none; padding: 0; text-align: left;">
                            <li style="margin-bottom: 10px; color: rgba(255,255,255,0.9);">✓ Quản trị minh bạch</li>
                            <li style="margin-bottom: 10px; color: rgba(255,255,255,0.9);">✓ Báo cáo ESG hàng năm</li>
                            <li style="margin-bottom: 10px; color: rgba(255,255,255,0.9);">✓ Tuân thủ chuẩn quốc tế</li>
                            <li style="color: rgba(255,255,255,0.9);">✓ Kiểm toán độc lập</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Partners -->
        <section class="partners" style="padding: 80px 0;">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">ĐỐI TÁC CHIẾN LƯỢC</h2>
                    <p class="section-subtitle">Hợp Tác Với Các Thương Hiệu Hàng Đầu Thế Giới</p>
                </div>
                <div class="partners-grid"
                    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 40px; align-items: center;">
                    <div class="partner-item" style="text-align: center; padding: 20px;">
                        <div
                            style="height: 80px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                            <i class="fas fa-building" style="font-size: 48px; color: var(--primary-color);"></i>
                        </div>
                        <h4 style="font-size: 16px; margin-bottom: 5px;">Foster + Partners</h4>
                        <p style="color: var(--text-light); font-size: 14px; margin: 0;">Kiến trúc tổng thể</p>
                    </div>
                    <div class="partner-item" style="text-align: center; padding: 20px;">
                        <div
                            style="height: 80px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                            <i class="fas fa-golf-ball" style="font-size: 48px; color: var(--primary-color);"></i>
                        </div>
                        <h4 style="font-size: 16px; margin-bottom: 5px;">Tiger Woods Design</h4>
                        <p style="color: var(--text-light); font-size: 14px; margin: 0;">Sân golf 36 lỗ</p>
                    </div>
                    <div class="partner-item" style="text-align: center; padding: 20px;">
                        <div
                            style="height: 80px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                            <i class="fas fa-hospital" style="font-size: 48px; color: var(--primary-color);"></i>
                        </div>
                        <h4 style="font-size: 16px; margin-bottom: 5px;">Cleveland Clinic</h4>
                        <p style="color: var(--text-light); font-size: 14px; margin: 0;">Y tế quốc tế</p>
                    </div>
                    <div class="partner-item" style="text-align: center; padding: 20px;">
                        <div
                            style="height: 80px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                            <i class="fas fa-ship" style="font-size: 48px; color: var(--primary-color);"></i>
                        </div>
                        <h4 style="font-size: 16px; margin-bottom: 5px;">Marina Bay</h4>
                        <p style="color: var(--text-light); font-size: 14px; margin: 0;">Cảng du thuyền</p>
                    </div>
                    <div class="partner-item" style="text-align: center; padding: 20px;">
                        <div
                            style="height: 80px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                            <i class="fas fa-graduation-cap" style="font-size: 48px; color: var(--primary-color);"></i>
                        </div>
                        <h4 style="font-size: 16px; margin-bottom: 5px;">Stanford University</h4>
                        <p style="color: var(--text-light); font-size: 14px; margin: 0;">Giáo dục đại học</p>
                    </div>
                    <div class="partner-item" style="text-align: center; padding: 20px;">
                        <div
                            style="height: 80px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                            <i class="fas fa-hotel" style="font-size: 48px; color: var(--primary-color);"></i>
                        </div>
                        <h4 style="font-size: 16px; margin-bottom: 5px;">Four Seasons</h4>
                        <p style="color: var(--text-light); font-size: 14px; margin: 0;">Resort & khách sạn</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section" style="padding: 80px 0; background: linear-gradient(180deg, #f8f9fa 0%, #fff 100%);">
            <div class="container" style="text-align: center;">
                <h2 style="font-size: 2.5rem; margin-bottom: 20px;">Khám Phá Green Paradise Ngay Hôm Nay</h2>
                <p
                    style="font-size: 1.2rem; color: var(--text-light); margin-bottom: 40px; max-width: 600px; margin-left: auto; margin-right: auto;">
                    Đăng ký nhận thông tin mới nhất về dự án và cơ hội sở hữu bất động sản đẳng cấp
                </p>
                <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                    <a href="{{route('contact')}}" class="btn btn-primary">Đăng Ký Tư Vấn</a>
                    <a href="{{route('gallery')}}" class="btn btn-outline">Xem Thư Viện Ảnh</a>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('js')
    <script></script>
@endsection
