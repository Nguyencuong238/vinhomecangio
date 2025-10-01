@extends('layouts.front')

@section('meta')
    <title>Vị Trí Green Paradise Cần Giờ - Cửa Ngõ Biển TP.HCM | Kết Nối Hoàn Hảo</title>
    <meta name="description"
        content="Vị trí vàng Green Paradise Cần Giờ - 50km từ TP.HCM, 25 phút đến sân bay Long Thành, 3 mặt giáp biển với 13km bờ biển, kết nối metro tốc độ cao và cầu Cần Giờ.">


    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Vị Trí Green Paradise Cần Giờ - Cửa Ngõ Biển TP.HCM | Kết Nối Hoàn Hảo">
    <meta property="og:description"
        content="Vị trí vàng Green Paradise Cần Giờ - 50km từ TP.HCM, 25 phút đến sân bay Long Thành, 3 mặt giáp biển với 13km bờ biển, kết nối metro tốc độ cao và cầu Cần Giờ.">
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
    <meta property="og:locale" content="vi_VN">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="Vị Trí Green Paradise Cần Giờ - Cửa Ngõ Biển TP.HCM | Kết Nối Hoàn Hảo">
    <meta name="twitter:description"
        content="Vị trí vàng Green Paradise Cần Giờ - 50km từ TP.HCM, 25 phút đến sân bay Long Thành, 3 mặt giáp biển với 13km bờ biển, kết nối metro tốc độ cao và cầu Cần Giờ.">
    <meta name="twitter:image" content="{{ asset('assets/images/logo.png') }}">
@endsection

@section('css')
    <!-- Custom CSS for Contact Page -->
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

    <!-- Schema Markup for Local Business -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Place",
        "name": "Green Paradise Cần Giờ",
        "description": "Siêu đô thị biển ESG đầu tiên Việt Nam",
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": "10.4113",
            "longitude": "106.9583"
        },
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Xã Long Hòa",
            "addressLocality": "Huyện Cần Giờ",
            "addressRegion": "TP.HCM",
            "postalCode": "700000",
            "addressCountry": "VN"
        },
        "hasMap": "https://maps.google.com/?q=Green+Paradise+Can+Gio"
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
                    <li class="breadcrumb-item active" aria-current="page" style="color: #f0f3bd;">Vị Trí</li>
                </ol>
            </nav>
            <h1 class="page-title" style="color: #fff; font-size: 3rem; margin-top: 20px;">Vị Trí Chiến Lược</h1>
        </div>
    </section>

    <!-- Main Content -->
    <main>
        <!-- Location Overview -->
        <section class="location-overview" style="padding: 80px 0;">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">VỊ TRÍ VÀNG CỬA NGÕ BIỂN TP.HCM</h2>
                    <p class="section-subtitle">Điểm Giao Thoa Hoàn Hảo Giữa Thiên Nhiên & Đô Thị</p>
                </div>

                <!-- Interactive Map -->
                <div class="map-container"
                    style="position: relative; border-radius: 20px; overflow: hidden; box-shadow: var(--shadow-xl); margin-bottom: 60px;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125409.04145941849!2d106.85834962329098!3d10.411300699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310aa5e5e90e08e9%3A0xec81241fb1c5fb0!2sCan%20Gio%20District%2C%20Ho%20Chi%20Minh%20City!5e0!3m2!1sen!2s!4v1234567890"
                        width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    <div
                        style="position: absolute; top: 20px; left: 20px; background: rgba(255,255,255,0.95); padding: 20px; border-radius: 15px; box-shadow: var(--shadow-md); max-width: 300px;">
                        <h3 style="color: var(--primary-color); margin-bottom: 15px; font-size: 18px;">Green Paradise</h3>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="display: flex; align-items: center; margin-bottom: 10px;">
                                <i class="fas fa-map-marker-alt"
                                    style="color: var(--primary-color); margin-right: 10px;"></i>
                                <span style="font-size: 14px;">Xã Long Hòa, Cần Giờ</span>
                            </li>
                            <li style="display: flex; align-items: center; margin-bottom: 10px;">
                                <i class="fas fa-water" style="color: var(--primary-color); margin-right: 10px;"></i>
                                <span style="font-size: 14px;">3 mặt giáp biển</span>
                            </li>
                            <li style="display: flex; align-items: center;">
                                <i class="fas fa-ruler-horizontal"
                                    style="color: var(--primary-color); margin-right: 10px;"></i>
                                <span style="font-size: 14px;">13km bờ biển</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Key Distances -->
                <div class="distances-grid"
                    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; margin-bottom: 60px;">
                    <div class="distance-card"
                        style="background: linear-gradient(135deg, #f8f9fa 0%, #fff 100%); padding: 30px; border-radius: 15px; text-align: center; box-shadow: var(--shadow-sm); border-top: 4px solid var(--primary-color);">
                        <i class="fas fa-city"
                            style="font-size: 36px; color: var(--primary-color); margin-bottom: 15px;"></i>
                        <h4 style="margin-bottom: 10px;">Trung Tâm TP.HCM</h4>
                        <p style="font-size: 24px; color: var(--primary-color); font-weight: 700; margin: 0;">50 KM</p>
                        <p style="color: var(--text-light); font-size: 14px; margin-top: 5px;">40 phút lái xe</p>
                    </div>
                    <div class="distance-card"
                        style="background: linear-gradient(135deg, #f8f9fa 0%, #fff 100%); padding: 30px; border-radius: 15px; text-align: center; box-shadow: var(--shadow-sm); border-top: 4px solid var(--secondary-color);">
                        <i class="fas fa-plane"
                            style="font-size: 36px; color: var(--secondary-color); margin-bottom: 15px;"></i>
                        <h4 style="margin-bottom: 10px;">Sân Bay Long Thành</h4>
                        <p style="font-size: 24px; color: var(--secondary-color); font-weight: 700; margin: 0;">35 KM</p>
                        <p style="color: var(--text-light); font-size: 14px; margin-top: 5px;">25 phút lái xe</p>
                    </div>
                    <div class="distance-card"
                        style="background: linear-gradient(135deg, #f8f9fa 0%, #fff 100%); padding: 30px; border-radius: 15px; text-align: center; box-shadow: var(--shadow-sm); border-top: 4px solid var(--dark-color);">
                        <i class="fas fa-train" style="font-size: 36px; color: var(--dark-color); margin-bottom: 15px;"></i>
                        <h4 style="margin-bottom: 10px;">Metro Tốc Độ Cao</h4>
                        <p style="font-size: 24px; color: var(--dark-color); font-weight: 700; margin: 0;">15 PHÚT</p>
                        <p style="color: var(--text-light); font-size: 14px; margin-top: 5px;">350km/h đến TP.HCM</p>
                    </div>
                    <div class="distance-card"
                        style="background: linear-gradient(135deg, #f8f9fa 0%, #fff 100%); padding: 30px; border-radius: 15px; text-align: center; box-shadow: var(--shadow-sm); border-top: 4px solid var(--accent-color);">
                        <i class="fas fa-industry"
                            style="font-size: 36px; color: var(--accent-color); margin-bottom: 15px;"></i>
                        <h4 style="margin-bottom: 10px;">KCN Hiệp Phước</h4>
                        <p style="font-size: 24px; color: var(--accent-color); font-weight: 700; margin: 0;">20 KM</p>
                        <p style="color: var(--text-light); font-size: 14px; margin-top: 5px;">15 phút lái xe</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Strategic Advantages -->
        <section class="strategic-advantages"
            style="padding: 80px 0; background: linear-gradient(180deg, #f8f9fa 0%, #fff 100%);">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">LỢI THẾ CHIẾN LƯỢC</h2>
                    <p class="section-subtitle">Vị Trí Độc Tôn Không Thể Sao Chép</p>
                </div>
                <div class="advantages-grid"
                    style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;">
                    <div class="advantages-content">
                        <div class="advantage-item" style="display: flex; gap: 20px; margin-bottom: 30px;">
                            <div class="advantage-icon"
                                style="width: 60px; height: 60px; background: var(--gradient-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <i class="fas fa-water" style="color: #fff; font-size: 24px;"></i>
                            </div>
                            <div>
                                <h4 style="margin-bottom: 10px;">3 Mặt Giáp Biển Độc Nhất</h4>
                                <p style="color: var(--text-light); line-height: 1.6;">Sở hữu 13km bờ biển hoang sơ tuyệt
                                    đẹp, địa hình 3 mặt giáp biển độc nhất vô nhị tại Việt Nam, tạo nên không gian sống đẳng
                                    cấp resort.</p>
                            </div>
                        </div>
                        <div class="advantage-item" style="display: flex; gap: 20px; margin-bottom: 30px;">
                            <div class="advantage-icon"
                                style="width: 60px; height: 60px; background: var(--gradient-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <i class="fas fa-bridge" style="color: #fff; font-size: 24px;"></i>
                            </div>
                            <div>
                                <h4 style="margin-bottom: 10px;">Cầu Cần Giờ 7.3km</h4>
                                <p style="color: var(--text-light); line-height: 1.6;">Cây cầu biển dài nhất Việt Nam đang
                                    được xây dựng, kết nối trực tiếp với Nhà Bè, rút ngắn thời gian di chuyển về trung tâm
                                    chỉ còn 30 phút.</p>
                            </div>
                        </div>
                        <div class="advantage-item" style="display: flex; gap: 20px; margin-bottom: 30px;">
                            <div class="advantage-icon"
                                style="width: 60px; height: 60px; background: var(--gradient-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <i class="fas fa-subway" style="color: #fff; font-size: 24px;"></i>
                            </div>
                            <div>
                                <h4 style="margin-bottom: 10px;">Metro Siêu Tốc 350km/h</h4>
                                <p style="color: var(--text-light); line-height: 1.6;">Tuyến metro tốc độ cao đầu tiên tại
                                    Việt Nam, kết nối Green Paradise với trung tâm TP.HCM chỉ trong 15 phút.</p>
                            </div>
                        </div>
                        <div class="advantage-item" style="display: flex; gap: 20px;">
                            <div class="advantage-icon"
                                style="width: 60px; height: 60px; background: var(--gradient-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <i class="fas fa-tree" style="color: #fff; font-size: 24px;"></i>
                            </div>
                            <div>
                                <h4 style="margin-bottom: 10px;">Rừng UNESCO 75.000ha</h4>
                                <p style="color: var(--text-light); line-height: 1.6;">Liền kề khu dự trữ sinh quyển thế
                                    giới UNESCO, môi trường trong lành với hệ sinh thái rừng ngập mặn lớn nhất Việt Nam.</p>
                            </div>
                        </div>
                    </div>
                    <div class="advantages-image">
                        <img src="{{ asset('assets/images/photo-1590846406792-0adc7f938f1d.jpeg') }}"
                            alt="Strategic Location"
                            style="width: 100%; border-radius: 20px; box-shadow: var(--shadow-xl);">
                    </div>
                </div>
            </div>
        </section>

        <!-- Transportation Infrastructure -->
        <section class="transportation" style="padding: 80px 0;">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">HẠ TẦNG GIAO THÔNG</h2>
                    <p class="section-subtitle">Kết Nối Đa Phương Thức Hiện Đại</p>
                </div>

                <div class="transport-tabs" style="margin-bottom: 40px;">
                    <div class="tab-buttons"
                        style="display: flex; justify-content: center; gap: 10px; flex-wrap: wrap; margin-bottom: 40px;">
                        <button class="tab-btn active" onclick="showTransport('road')"
                            style="padding: 12px 30px; background: var(--gradient-primary); color: #fff; border: none; border-radius: 25px; cursor: pointer; font-weight: 600; transition: var(--transition);">
                            <i class="fas fa-road"></i> Đường Bộ
                        </button>
                        <button class="tab-btn" onclick="showTransport('metro')"
                            style="padding: 12px 30px; background: #f8f9fa; color: var(--text-dark); border: none; border-radius: 25px; cursor: pointer; font-weight: 600; transition: var(--transition);">
                            <i class="fas fa-train"></i> Metro
                        </button>
                        <button class="tab-btn" onclick="showTransport('water')"
                            style="padding: 12px 30px; background: #f8f9fa; color: var(--text-dark); border: none; border-radius: 25px; cursor: pointer; font-weight: 600; transition: var(--transition);">
                            <i class="fas fa-ship"></i> Đường Thủy
                        </button>
                        <button class="tab-btn" onclick="showTransport('air')"
                            style="padding: 12px 30px; background: #f8f9fa; color: var(--text-dark); border: none; border-radius: 25px; cursor: pointer; font-weight: 600; transition: var(--transition);">
                            <i class="fas fa-helicopter"></i> Đường Hàng Không
                        </button>
                    </div>

                    <div class="tab-content">
                        <div id="road" class="transport-content" style="display: block;">
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center;">
                                <img src="{{ asset('assets/images/photo-1515162816999-a0c47dc192f7.jpeg') }}"
                                    alt="Highway" style="width: 100%; border-radius: 15px;">
                                <div>
                                    <h3 style="color: var(--primary-color); margin-bottom: 20px;">Hệ Thống Đường Bộ Hiện
                                        Đại</h3>
                                    <ul style="list-style: none; padding: 0;">
                                        <li style="margin-bottom: 15px;"><i class="fas fa-check-circle"
                                                style="color: var(--primary-color); margin-right: 10px;"></i> Cầu Cần Giờ
                                            7.3km (khởi công 2025)</li>
                                        <li style="margin-bottom: 15px;"><i class="fas fa-check-circle"
                                                style="color: var(--primary-color); margin-right: 10px;"></i> Cao tốc Bến
                                            Lức - Long Thành</li>
                                        <li style="margin-bottom: 15px;"><i class="fas fa-check-circle"
                                                style="color: var(--primary-color); margin-right: 10px;"></i> Đại lộ ven
                                            biển 120m</li>
                                        <li style="margin-bottom: 15px;"><i class="fas fa-check-circle"
                                                style="color: var(--primary-color); margin-right: 10px;"></i> Đường Rừng
                                            Sác kết nối Long An</li>
                                        <li><i class="fas fa-check-circle"
                                                style="color: var(--primary-color); margin-right: 10px;"></i> Hệ thống
                                            đường nội khu rộng 20-60m</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div id="metro" class="transport-content" style="display: none;">
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center;">
                                <img src="{{ asset('assets/images/photo-1555149385-c50f336e28b0.jpeg') }}" alt="Metro"
                                    style="width: 100%; border-radius: 15px;">
                                <div>
                                    <h3 style="color: var(--primary-color); margin-bottom: 20px;">Metro Tốc Độ Cao</h3>
                                    <ul style="list-style: none; padding: 0;">
                                        <li style="margin-bottom: 15px;"><i class="fas fa-check-circle"
                                                style="color: var(--primary-color); margin-right: 10px;"></i> Vận tốc tối
                                            đa 350km/h</li>
                                        <li style="margin-bottom: 15px;"><i class="fas fa-check-circle"
                                                style="color: var(--primary-color); margin-right: 10px;"></i> 15 phút đến
                                            trung tâm TP.HCM</li>
                                        <li style="margin-bottom: 15px;"><i class="fas fa-check-circle"
                                                style="color: var(--primary-color); margin-right: 10px;"></i> 3 ga dừng
                                            trong dự án</li>
                                        <li style="margin-bottom: 15px;"><i class="fas fa-check-circle"
                                                style="color: var(--primary-color); margin-right: 10px;"></i> Công nghệ từ
                                            Nhật Bản</li>
                                        <li><i class="fas fa-check-circle"
                                                style="color: var(--primary-color); margin-right: 10px;"></i> Dự kiến vận
                                            hành 2028</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div id="water" class="transport-content" style="display: none;">
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center;">
                                <img src="{{ asset('assets/images/photo-1540946485063-a40da27545f8.jpeg') }}"
                                    alt="Marina" style="width: 100%; border-radius: 15px;">
                                <div>
                                    <h3 style="color: var(--primary-color); margin-bottom: 20px;">Giao Thông Đường Thủy
                                    </h3>
                                    <ul style="list-style: none; padding: 0;">
                                        <li style="margin-bottom: 15px;"><i class="fas fa-check-circle"
                                                style="color: var(--primary-color); margin-right: 10px;"></i> Marina quốc
                                            tế 1000 bến neo</li>
                                        <li style="margin-bottom: 15px;"><i class="fas fa-check-circle"
                                                style="color: var(--primary-color); margin-right: 10px;"></i> Phà cao tốc
                                            đến TP.HCM</li>
                                        <li style="margin-bottom: 15px;"><i class="fas fa-check-circle"
                                                style="color: var(--primary-color); margin-right: 10px;"></i> Du thuyền 5
                                            sao phục vụ cư dân</li>
                                        <li style="margin-bottom: 15px;"><i class="fas fa-check-circle"
                                                style="color: var(--primary-color); margin-right: 10px;"></i> Taxi nước nội
                                            khu</li>
                                        <li><i class="fas fa-check-circle"
                                                style="color: var(--primary-color); margin-right: 10px;"></i> Cảng du lịch
                                            quốc tế</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div id="air" class="transport-content" style="display: none;">
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center;">
                                <img src="{{ asset('assets/images/photo-1474302770737-173ee21bab63.jpeg') }}"
                                    alt="Heliport" style="width: 100%; border-radius: 15px;">
                                <div>
                                    <h3 style="color: var(--primary-color); margin-bottom: 20px;">Kết Nối Hàng Không</h3>
                                    <ul style="list-style: none; padding: 0;">
                                        <li style="margin-bottom: 15px;"><i class="fas fa-check-circle"
                                                style="color: var(--primary-color); margin-right: 10px;"></i> Sân bay trực
                                            thăng nội khu</li>
                                        <li style="margin-bottom: 15px;"><i class="fas fa-check-circle"
                                                style="color: var(--primary-color); margin-right: 10px;"></i> 25 phút đến
                                            sân bay Long Thành</li>
                                        <li style="margin-bottom: 15px;"><i class="fas fa-check-circle"
                                                style="color: var(--primary-color); margin-right: 10px;"></i> Dịch vụ
                                            helicopter charter</li>
                                        <li style="margin-bottom: 15px;"><i class="fas fa-check-circle"
                                                style="color: var(--primary-color); margin-right: 10px;"></i> Air taxi đến
                                            trung tâm TP.HCM</li>
                                        <li><i class="fas fa-check-circle"
                                                style="color: var(--primary-color); margin-right: 10px;"></i> Kết nối sân
                                            bay Tân Sơn Nhất</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Nearby Landmarks -->
        <section class="landmarks" style="padding: 80px 0; background: linear-gradient(180deg, #f8f9fa 0%, #fff 100%);">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">ĐIỂM ĐẾN LÂN CẬN</h2>
                    <p class="section-subtitle">Kết Nối Với Các Tiện Ích Xung Quanh</p>
                </div>
                <div class="landmarks-grid"
                    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
                    <div class="landmark-card"
                        style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: var(--shadow-sm); transition: var(--transition);">
                        <img src="{{ asset('assets/images/photo-1596394516093-501ba68a0ba6.jpeg') }}"
                            alt="Long Thanh Airport" style="width: 100%; height: 200px; object-fit: cover;">
                        <div style="padding: 25px;">
                            <h4 style="margin-bottom: 10px;">Sân Bay Quốc Tế Long Thành</h4>
                            <p style="color: var(--text-light); font-size: 14px; margin-bottom: 15px;">Sân bay quốc tế lớn
                                nhất Việt Nam với công suất 100 triệu khách/năm</p>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="color: var(--primary-color); font-weight: 600;">35 km</span>
                                <span style="color: var(--text-light); font-size: 14px;">25 phút</span>
                            </div>
                        </div>
                    </div>
                    <div class="landmark-card"
                        style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: var(--shadow-sm); transition: var(--transition);">
                        <img src="{{ asset('assets/images/photo-1449157291145-7efd050a4d0e.jpeg') }}" alt="Vung Tau"
                            style="width: 100%; height: 200px; object-fit: cover;">
                        <div style="padding: 25px;">
                            <h4 style="margin-bottom: 10px;">Thành Phố Vũng Tàu</h4>
                            <p style="color: var(--text-light); font-size: 14px; margin-bottom: 15px;">Thành phố biển du
                                lịch nổi tiếng với bãi biển đẹp và ẩm thực phong phú</p>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="color: var(--primary-color); font-weight: 600;">45 km</span>
                                <span style="color: var(--text-light); font-size: 14px;">40 phút</span>
                            </div>
                        </div>
                    </div>
                    <div class="landmark-card"
                        style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: var(--shadow-sm); transition: var(--transition);">
                        <img src="{{ asset('assets/images/photo-1509023464722-18d996393ca8.jpeg') }}" alt="District 1"
                            style="width: 100%; height: 200px; object-fit: cover;">
                        <div style="padding: 25px;">
                            <h4 style="margin-bottom: 10px;">Quận 1 - Trung Tâm TP.HCM</h4>
                            <p style="color: var(--text-light); font-size: 14px; margin-bottom: 15px;">Trung tâm kinh tế -
                                tài chính - văn hóa của thành phố</p>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="color: var(--primary-color); font-weight: 600;">50 km</span>
                                <span style="color: var(--text-light); font-size: 14px;">40 phút</span>
                            </div>
                        </div>
                    </div>
                    <div class="landmark-card"
                        style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: var(--shadow-sm); transition: var(--transition);">
                        <img src="{{ asset('assets/images/photo-1565967511849-76a60a516170.jpeg') }}" alt="UNESCO Forest"
                            style="width: 100%; height: 200px; object-fit: cover;">
                        <div style="padding: 25px;">
                            <h4 style="margin-bottom: 10px;">Rừng Ngập Mặn UNESCO</h4>
                            <p style="color: var(--text-light); font-size: 14px; margin-bottom: 15px;">Khu dự trữ sinh
                                quyển thế giới với 75.000ha rừng nguyên sinh</p>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="color: var(--primary-color); font-weight: 600;">0 km</span>
                                <span style="color: var(--text-light); font-size: 14px;">Liền kề</span>
                            </div>
                        </div>
                    </div>
                    <div class="landmark-card"
                        style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: var(--shadow-sm); transition: var(--transition);">
                        <img src="{{ asset('assets/images/photo-1582735689369-4fe89db7114c.jpeg') }}"
                            alt="Hiep Phuoc Port" style="width: 100%; height: 200px; object-fit: cover;">
                        <div style="padding: 25px;">
                            <h4 style="margin-bottom: 10px;">Cảng Hiệp Phước</h4>
                            <p style="color: var(--text-light); font-size: 14px; margin-bottom: 15px;">Cảng biển quốc tế
                                lớn nhất phía Nam</p>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="color: var(--primary-color); font-weight: 600;">20 km</span>
                                <span style="color: var(--text-light); font-size: 14px;">15 phút</span>
                            </div>
                        </div>
                    </div>
                    <div class="landmark-card"
                        style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: var(--shadow-sm); transition: var(--transition);">
                        <img src="{{ asset('assets/images/photo-1555992336-03a23c7b20ee.jpeg') }}" alt="District 7"
                            style="width: 100%; height: 200px; object-fit: cover;">
                        <div style="padding: 25px;">
                            <h4 style="margin-bottom: 10px;">Phú Mỹ Hưng - Quận 7</h4>
                            <p style="color: var(--text-light); font-size: 14px; margin-bottom: 15px;">Khu đô thị hiện đại
                                với nhiều tiện ích cao cấp</p>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="color: var(--primary-color); font-weight: 600;">35 km</span>
                                <span style="color: var(--text-light); font-size: 14px;">30 phút</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Location Benefits -->
        <section class="location-benefits"
            style="padding: 80px 0; background: linear-gradient(135deg, #05668d 0%, #00a896 100%); color: #fff;">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title" style="color: #fff;">GIÁ TRỊ VỊ TRÍ</h2>
                    <p class="section-subtitle" style="color: rgba(255,255,255,0.9);">Tại Sao Green Paradise Là Lựa Chọn
                        Hoàn Hảo</p>
                </div>
                <div class="benefits-grid"
                    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
                    <div class="benefit-item" style="text-align: center;">
                        <div
                            style="width: 80px; height: 80px; margin: 0 auto 20px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-chart-line" style="font-size: 36px;"></i>
                        </div>
                        <h3 style="margin-bottom: 15px;">Tiềm Năng Tăng Giá</h3>
                        <p style="color: rgba(255,255,255,0.9); line-height: 1.6;">Dự báo tăng giá 200-300% trong 5 năm tới
                            nhờ hạ tầng hoàn thiện</p>
                    </div>
                    <div class="benefit-item" style="text-align: center;">
                        <div
                            style="width: 80px; height: 80px; margin: 0 auto 20px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-shield-alt" style="font-size: 36px;"></i>
                        </div>
                        <h3 style="margin-bottom: 15px;">An Ninh Tuyệt Đối</h3>
                        <p style="color: rgba(255,255,255,0.9); line-height: 1.6;">Khu đô thị khép kín với hệ thống an ninh
                            5 lớp, camera AI 24/7</p>
                    </div>
                    <div class="benefit-item" style="text-align: center;">
                        <div
                            style="width: 80px; height: 80px; margin: 0 auto 20px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-wind" style="font-size: 36px;"></i>
                        </div>
                        <h3 style="margin-bottom: 15px;">Khí Hậu Trong Lành</h3>
                        <p style="color: rgba(255,255,255,0.9); line-height: 1.6;">Không khí trong lành nhất TP.HCM, nhiệt
                            độ mát mẻ quanh năm</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section" style="padding: 80px 0;">
            <div class="container" style="text-align: center;">
                <h2 style="font-size: 2.5rem; margin-bottom: 20px;">Khám Phá Vị Trí Thực Tế</h2>
                <p
                    style="font-size: 1.2rem; color: var(--text-light); margin-bottom: 40px; max-width: 600px; margin-left: auto; margin-right: auto;">
                    Đăng ký tham quan thực tế để cảm nhận vị trí đắc địa của Green Paradise
                </p>
                <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                    <a href="{{route('contact')}}" class="btn btn-primary">Đặt Lịch Tham Quan</a>
                    <a href="{{route('gallery')}}" class="btn btn-outline">Xem Video 360°</a>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('js')
    <script>
        // Tab functionality
        function showTransport(type) {
            const contents = document.querySelectorAll('.transport-content');
            const buttons = document.querySelectorAll('.tab-btn');

            contents.forEach(content => {
                content.style.display = 'none';
            });

            buttons.forEach(btn => {
                btn.style.background = '#f8f9fa';
                btn.style.color = 'var(--text-dark)';
            });

            document.getElementById(type).style.display = 'block';
            event.target.closest('.tab-btn').style.background = 'var(--gradient-primary)';
            event.target.closest('.tab-btn').style.color = '#fff';
        }
    </script>
@endsection
