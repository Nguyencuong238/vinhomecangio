@extends('layouts.front')

@section('meta')
    <title>Tiện Ích Vinhomes Green Paradise - Paradise Lagoon, Golf, Marina | All-in-One</title>
    <meta name="description"
        content="Khám phá hệ sinh thái tiện ích all-in-one: Paradise Lagoon 443ha Guinness, 2 sân golf 36 lỗ Tiger Woods, Marina 5 sao, Cleveland Clinic">


    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Tiện Ích Vinhomes Green Paradise - Paradise Lagoon, Golf, Marina | All-in-One°">
    <meta property="og:description"
        content="Khám phá hệ sinh thái tiện ích all-in-one: Paradise Lagoon 443ha Guinness, 2 sân golf 36 lỗ Tiger Woods, Marina 5 sao, Cleveland Clinic">
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
    <meta property="og:locale" content="vi_VN">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="Tiện Ích Vinhomes Green Paradise - Paradise Lagoon, Golf, Marina | All-in-One°">
    <meta name="twitter:description"
        content="Khám phá hệ sinh thái tiện ích all-in-one: Paradise Lagoon 443ha Guinness, 2 sân golf 36 lỗ Tiger Woods, Marina 5 sao, Cleveland Clinic">
    <meta name="twitter:image" content="{{ asset('assets/images/logo.png') }}">
@endsection

@section('css')
    <!-- Custom CSS for Utilities Page -->
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

    <!-- Schema for Amenities -->
    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "ItemList",
        "name": "Tiện ích Vinhomes Green Paradise",
        "itemListElement": [
                {
                "@type": "ListItem",
                "position": 1,
                "name": "Paradise Lagoon 443ha",
                "description": "Biển hồ nhân tạo lớn nhất thế giới"
                },
                {
                "@type": "ListItem",
                "position": 2,
                "name": "Sân Golf Championship 36 lỗ",
                "description": "Thiết kế bởi Tiger Woods"
                }
            ]
        }
    </script>
@endsection

@section('page')
    <!-- Breadcrumb -->
    <section class="breadcrumb-section"
        style="background: linear-gradient(135deg, #05668d 0%, #00a896 100%); padding: 120px 0 60px; margin-top: 0;">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb"
                    style="background: none; padding: 0; margin: 0; display: flex; gap: 10px; color: #fff;">
                    <li class="breadcrumb-item">
                        <a href="/" style="color: #fff; text-decoration: none;">Trang Chủ</a>
                    </li>
                    >
                    <li class="breadcrumb-item active" aria-current="page" style="color: #f0f3bd;">Tiện Ích</li>
                </ol>
            </nav>
            <h1 class="page-title" style="color: #fff; font-size: 3rem; margin-top: 20px;">Tiện Ích Đẳng Cấp</h1>
        </div>
    </section>

    <!-- Main Content -->
    <main>
        <!-- Utilities Overview -->
        <section class="utilities-overview" style="padding: 80px 0;">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">HỆ SINH THÁI ALL-IN-ONE</h2>
                    <p class="section-subtitle">Trải Nghiệm Cuộc Sống Resort Mỗi Ngày</p>
                </div>

                <!-- Statistics -->
                <div class="stats-row"
                    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 30px; margin-bottom: 60px;">
                    <div class="stat-box"
                        style="text-align: center; padding: 30px; background: linear-gradient(135deg, rgba(0,168,150,0.1) 0%, rgba(2,195,154,0.1) 100%); border-radius: 15px;">
                        <h3 style="font-size: 3rem; color: var(--primary-color); margin-bottom: 10px;">100+</h3>
                        <p style="color: var(--text-light); margin: 0;">Tiện ích cao cấp</p>
                    </div>
                    <div class="stat-box"
                        style="text-align: center; padding: 30px; background: linear-gradient(135deg, rgba(0,168,150,0.1) 0%, rgba(2,195,154,0.1) 100%); border-radius: 15px;">
                        <h3 style="font-size: 3rem; color: var(--primary-color); margin-bottom: 10px;">443ha</h3>
                        <p style="color: var(--text-light); margin: 0;">Paradise Lagoon</p>
                    </div>
                    <div class="stat-box"
                        style="text-align: center; padding: 30px; background: linear-gradient(135deg, rgba(0,168,150,0.1) 0%, rgba(2,195,154,0.1) 100%); border-radius: 15px;">
                        <h3 style="font-size: 3rem; color: var(--primary-color); margin-bottom: 10px;">36</h3>
                        <p style="color: var(--text-light); margin: 0;">Lỗ golf championship</p>
                    </div>
                    <div class="stat-box"
                        style="text-align: center; padding: 30px; background: linear-gradient(135deg, rgba(0,168,150,0.1) 0%, rgba(2,195,154,0.1) 100%); border-radius: 15px;">
                        <h3 style="font-size: 3rem; color: var(--primary-color); margin-bottom: 10px;">108</h3>
                        <p style="color: var(--text-light); margin: 0;">Tầng tòa tháp biểu tượng</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Utilities -->
        <section class="featured-utilities"
            style="padding: 80px 0; background: linear-gradient(180deg, #f8f9fa 0%, #fff 100%);">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">TIỆN ÍCH NỔI BẬT</h2>
                    <p class="section-subtitle">Những Công Trình Biểu Tượng Của Green Paradise</p>
                </div>

                <!-- Paradise Lagoon -->
                <div class="feature-showcase"
                    style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; margin-bottom: 80px;">
                    <div class="feature-image">
                        <img src="{{ asset('assets/images/paradise-lagoon-bien-ho-nhan-tao.jpg') }}" alt="Paradise Lagoon"
                            style="width: 100%; border-radius: 20px; box-shadow: var(--shadow-xl);">
                    </div>
                    <div class="feature-content">
                        <span
                            style="color: var(--primary-color); font-weight: 600; text-transform: uppercase; letter-spacing: 2px;">Kỳ
                            Quan Nhân Tạo</span>
                        <h3 style="font-size: 2rem; margin: 15px 0;">Paradise Lagoon 443ha</h3>
                        <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 25px;">
                            Biển hồ nhân tạo lớn nhất thế giới với diện tích 443 hecta, được ghi nhận kỷ lục Guinness.
                            Paradise Lagoon là trái tim xanh của Green Paradise với hệ thống đảo nhân tạo, bãi biển cát
                            trắng và các hoạt động thể thao nước đẳng cấp.
                        </p>
                        <ul style="list-style: none; padding: 0;">
                            <li style="margin-bottom: 10px;"><i class="fas fa-check"
                                    style="color: var(--primary-color); margin-right: 10px;"></i> Nước biển lọc công nghệ
                                cao</li>
                            <li style="margin-bottom: 10px;"><i class="fas fa-check"
                                    style="color: var(--primary-color); margin-right: 10px;"></i> 12 đảo nhân tạo chủ đề
                            </li>
                            <li style="margin-bottom: 10px;"><i class="fas fa-check"
                                    style="color: var(--primary-color); margin-right: 10px;"></i> Marina & Yacht Club</li>
                            <li><i class="fas fa-check" style="color: var(--primary-color); margin-right: 10px;"></i> Thể
                                thao nước Olympic</li>
                        </ul>
                    </div>
                </div>

                <!-- Golf Course -->
                <div class="feature-showcase"
                    style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; margin-bottom: 80px;">
                    <div class="feature-content">
                        <span
                            style="color: var(--primary-color); font-weight: 600; text-transform: uppercase; letter-spacing: 2px;">Championship
                            Course</span>
                        <h3 style="font-size: 2rem; margin: 15px 0;">Sân Golf 36 Lỗ Tiger Woods Design</h3>
                        <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 25px;">
                            Được thiết kế bởi huyền thoại Tiger Woods và Robert Trent Jones II, sân golf championship 36 lỗ
                            tại Green Paradise hứa hẹn mang đến trải nghiệm golf đẳng cấp PGA Tour với cảnh quan biển tuyệt
                            đẹp.
                        </p>
                        <ul style="list-style: none; padding: 0;">
                            <li style="margin-bottom: 10px;"><i class="fas fa-check"
                                    style="color: var(--primary-color); margin-right: 10px;"></i> 2 sân 18 lỗ championship
                            </li>
                            <li style="margin-bottom: 10px;"><i class="fas fa-check"
                                    style="color: var(--primary-color); margin-right: 10px;"></i> Golf Academy quốc tế</li>
                            <li style="margin-bottom: 10px;"><i class="fas fa-check"
                                    style="color: var(--primary-color); margin-right: 10px;"></i> Pro Shop & Clubhouse 5
                                sao</li>
                            <li><i class="fas fa-check" style="color: var(--primary-color); margin-right: 10px;"></i>
                                Driving range 300 yards</li>
                        </ul>
                    </div>
                    <div class="feature-image">
                        <img src="{{ asset('assets/images/sieu-do-thi-esg-vinhomes-green-paradise.jpg') }}" alt="Golf Course"
                            style="width: 100%; border-radius: 20px; box-shadow: var(--shadow-xl);">
                    </div>
                </div>

                <!-- 108 Tower -->
                <div class="feature-showcase"
                    style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;">
                    <div class="feature-image">
                        <img src="{{ asset('assets/images/thap-108-tang-vinhomes-can-gio.webp') }}" alt="108 Tower"
                            style="width: 100%; border-radius: 20px; box-shadow: var(--shadow-xl);">
                    </div>
                    <div class="feature-content">
                        <span
                            style="color: var(--primary-color); font-weight: 600; text-transform: uppercase; letter-spacing: 2px;">Biểu
                            Tượng Kiến Trúc</span>
                        <h3 style="font-size: 2rem; margin: 15px 0;">Tòa Tháp 108 Tầng</h3>
                        <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 25px;">
                            Tòa tháp biểu tượng cao 540m với 108 tầng, nằm trong top 10 tòa nhà cao nhất thế giới. Kết hợp
                            khách sạn 7 sao, văn phòng hạng A, trung tâm thương mại và đài quan sát trên không.
                        </p>
                        <ul style="list-style: none; padding: 0;">
                            <li style="margin-bottom: 10px;"><i class="fas fa-check"
                                    style="color: var(--primary-color); margin-right: 10px;"></i> Khách sạn Aman 7 sao</li>
                            <li style="margin-bottom: 10px;"><i class="fas fa-check"
                                    style="color: var(--primary-color); margin-right: 10px;"></i> Sky Bar & Restaurant tầng
                                108</li>
                            <li style="margin-bottom: 10px;"><i class="fas fa-check"
                                    style="color: var(--primary-color); margin-right: 10px;"></i> Đài quan sát 360°</li>
                            <li><i class="fas fa-check" style="color: var(--primary-color); margin-right: 10px;"></i>
                                Helipad trên nóc</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Utilities Categories -->
        <section class="utilities-categories" style="padding: 80px 0;">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">DANH MỤC TIỆN ÍCH</h2>
                    <p class="section-subtitle">Hệ Sinh Thái Đa Dạng Phục Vụ Mọi Nhu Cầu</p>
                </div>

                <!-- Category Tabs -->
                <div class="category-tabs"
                    style="display: flex; justify-content: center; gap: 10px; flex-wrap: wrap; margin-bottom: 40px;">
                    <button class="cat-btn active" onclick="showCategory('sports')"
                        style="padding: 12px 25px; background: var(--gradient-primary); color: #fff; border: none; border-radius: 25px; cursor: pointer; font-weight: 600;">
                        <i class="fas fa-running"></i> Thể Thao
                    </button>
                    <button class="cat-btn" onclick="showCategory('health')"
                        style="padding: 12px 25px; background: #f8f9fa; color: var(--text-dark); border: none; border-radius: 25px; cursor: pointer; font-weight: 600;">
                        <i class="fas fa-heartbeat"></i> Y Tế & Sức Khỏe
                    </button>
                    <button class="cat-btn" onclick="showCategory('education')"
                        style="padding: 12px 25px; background: #f8f9fa; color: var(--text-dark); border: none; border-radius: 25px; cursor: pointer; font-weight: 600;">
                        <i class="fas fa-graduation-cap"></i> Giáo Dục
                    </button>
                    <button class="cat-btn" onclick="showCategory('shopping')"
                        style="padding: 12px 25px; background: #f8f9fa; color: var(--text-dark); border: none; border-radius: 25px; cursor: pointer; font-weight: 600;">
                        <i class="fas fa-shopping-bag"></i> Mua Sắm
                    </button>
                    <button class="cat-btn" onclick="showCategory('entertainment')"
                        style="padding: 12px 25px; background: #f8f9fa; color: var(--text-dark); border: none; border-radius: 25px; cursor: pointer; font-weight: 600;">
                        <i class="fas fa-film"></i> Giải Trí
                    </button>
                </div>

                <!-- Category Content -->
                <div class="category-content">
                    <!-- Sports -->
                    <div id="sports" class="cat-content" style="display: block;">
                        <div
                            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px;">
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-golf-ball"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Golf 36 Lỗ</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Tiger Woods Design</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-tennis-ball"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Tennis Academy</h4>
                                <p style="color: var(--text-light); font-size: 14px;">12 sân tennis cao cấp</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-swimmer"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Bể Bơi Olympic</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Tiêu chuẩn FINA</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-basketball-ball"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Sports Complex</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Đa dạng môn thể thao</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-anchor"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Yacht Club</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Marina 1000 bến</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-horse"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Cưỡi Ngựa</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Trường đua ngựa quốc tế</p>
                            </div>
                        </div>
                    </div>

                    <!-- Health -->
                    <div id="health" class="cat-content" style="display: none;">
                        <div
                            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px;">
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-hospital"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Cleveland Clinic</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Bệnh viện số 1 Mỹ</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-spa"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Wellness Center</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Spa & chăm sóc sức khỏe</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-dumbbell"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Fitness Center</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Phòng gym 5 sao</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-user-md"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Medical Center</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Phòng khám đa khoa</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-tooth"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Dental Clinic</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Nha khoa quốc tế</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-pills"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Pharmacy 24/7</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Nhà thuốc quốc tế</p>
                            </div>
                        </div>
                    </div>

                    <!-- Education -->
                    <div id="education" class="cat-content" style="display: none;">
                        <div
                            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px;">
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-university"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Stanford Campus</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Đại học hàng đầu</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-school"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">British School</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Giáo dục quốc tế</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-child"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Montessori</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Mầm non quốc tế</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-book"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Library</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Thư viện hiện đại</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-flask"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Science Center</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Trung tâm khoa học</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-paint-brush"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Art School</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Trường nghệ thuật</p>
                            </div>
                        </div>
                    </div>

                    <!-- Shopping -->
                    <div id="shopping" class="cat-content" style="display: none;">
                        <div
                            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px;">
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-shopping-cart"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Luxury Mall</h4>
                                <p style="color: var(--text-light); font-size: 14px;">TTTM cao cấp</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-store"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Boutique Street</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Phố mua sắm</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-gem"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Luxury Brands</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Thương hiệu xa xỉ</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-market"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Fresh Market</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Chợ thực phẩm sạch</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-utensils"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Food Court</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Ẩm thực đa dạng</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-gift"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Souvenir Shop</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Cửa hàng lưu niệm</p>
                            </div>
                        </div>
                    </div>

                    <!-- Entertainment -->
                    <div id="entertainment" class="cat-content" style="display: none;">
                        <div
                            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px;">
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-theater-masks"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Blue Wave Theatre</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Nhà hát 5000 ghế</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-film"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Cinema Complex</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Rạp phim IMAX</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-dice"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Casino</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Sòng bạc quốc tế</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-gamepad"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Game Center</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Khu vui chơi hiện đại</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-music"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Concert Hall</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Nhà hát nhạc giao hưởng</p>
                            </div>
                            <div class="util-item"
                                style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: var(--shadow-sm); text-align: center;">
                                <i class="fas fa-cocktail"
                                    style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                                <h4 style="margin-bottom: 10px;">Beach Club</h4>
                                <p style="color: var(--text-light); font-size: 14px;">Bar & Club bãi biển</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Smart City Features -->
        <section class="smart-city"
            style="padding: 80px 0; background: linear-gradient(135deg, #05668d 0%, #00a896 100%); color: #fff;">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title" style="color: #fff;">THÀNH PHỐ THÔNG MINH</h2>
                    <p class="section-subtitle" style="color: rgba(255,255,255,0.9);">Công Nghệ AI-IoT Trong Từng Tiện Ích
                    </p>
                </div>
                <div class="smart-grid"
                    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
                    <div class="smart-item"
                        style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 30px; border-radius: 15px; text-align: center; border: 1px solid rgba(255,255,255,0.2);">
                        <i class="fas fa-brain" style="font-size: 48px; margin-bottom: 15px;"></i>
                        <h4 style="margin-bottom: 10px;">AI Control Center</h4>
                        <p style="color: rgba(255,255,255,0.9); font-size: 14px;">Trung tâm điều khiển AI quản lý toàn bộ
                            đô thị</p>
                    </div>
                    <div class="smart-item"
                        style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 30px; border-radius: 15px; text-align: center; border: 1px solid rgba(255,255,255,0.2);">
                        <i class="fas fa-car" style="font-size: 48px; margin-bottom: 15px;"></i>
                        <h4 style="margin-bottom: 10px;">Autonomous Vehicles</h4>
                        <p style="color: rgba(255,255,255,0.9); font-size: 14px;">Xe tự hành phục vụ di chuyển nội khu</p>
                    </div>
                    <div class="smart-item"
                        style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 30px; border-radius: 15px; text-align: center; border: 1px solid rgba(255,255,255,0.2);">
                        <i class="fas fa-home" style="font-size: 48px; margin-bottom: 15px;"></i>
                        <h4 style="margin-bottom: 10px;">Smart Home</h4>
                        <p style="color: rgba(255,255,255,0.9); font-size: 14px;">Nhà thông minh điều khiển bằng giọng nói
                        </p>
                    </div>
                    <div class="smart-item"
                        style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 30px; border-radius: 15px; text-align: center; border: 1px solid rgba(255,255,255,0.2);">
                        <i class="fas fa-solar-panel" style="font-size: 48px; margin-bottom: 15px;"></i>
                        <h4 style="margin-bottom: 10px;">Green Energy</h4>
                        <p style="color: rgba(255,255,255,0.9); font-size: 14px;">100% năng lượng tái tạo từ solar & wind
                        </p>
                    </div>
                    <div class="smart-item"
                        style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 30px; border-radius: 15px; text-align: center; border: 1px solid rgba(255,255,255,0.2);">
                        <i class="fas fa-wifi" style="font-size: 48px; margin-bottom: 15px;"></i>
                        <h4 style="margin-bottom: 10px;">5G Network</h4>
                        <p style="color: rgba(255,255,255,0.9); font-size: 14px;">Mạng 5G phủ sóng toàn khu</p>
                    </div>
                    <div class="smart-item"
                        style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 30px; border-radius: 15px; text-align: center; border: 1px solid rgba(255,255,255,0.2);">
                        <i class="fas fa-shield-alt" style="font-size: 48px; margin-bottom: 15px;"></i>
                        <h4 style="margin-bottom: 10px;">AI Security</h4>
                        <p style="color: rgba(255,255,255,0.9); font-size: 14px;">An ninh AI nhận diện khuôn mặt</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section" style="padding: 80px 0;">
            <div class="container" style="text-align: center;">
                <h2 style="font-size: 2.5rem; margin-bottom: 20px;">Trải Nghiệm Tiện Ích Đẳng Cấp</h2>
                <p
                    style="font-size: 1.2rem; color: var(--text-light); margin-bottom: 40px; max-width: 600px; margin-left: auto; margin-right: auto;">
                    Đăng ký tham quan để khám phá hệ thống tiện ích all-in-one của Green Paradise
                </p>
                <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                    <a href="{{ route('contact') }}" class="btn btn-primary">Đặt Lịch Tham Quan</a>
                    <a href="{{ route('gallery') }}" class="btn btn-outline">Xem Video Tiện Ích</a>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('js')
    <script>
        //Category functionality
        function showCategory(category) {
            const contents = document.querySelectorAll('.cat-content');
            const buttons = document.querySelectorAll('.cat-btn');

            contents.forEach(content => {
                content.style.display = 'none';
            });

            buttons.forEach(btn => {
                btn.style.background = '#f8f9fa';
                btn.style.color = 'var(--text-dark)';
            });

            document.getElementById(category).style.display = 'block';
            event.target.closest('.cat-btn').style.background = 'var(--gradient-primary)';
            event.target.closest('.cat-btn').style.color = '#fff';
        }

        $(function() {

        });
    </script>
@endsection
