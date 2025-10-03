@extends('layouts.front')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.core.min.css">

    <style>
        .overview-item.utilities-image {
            padding: 0;
        }

        .overview-item.utilities-image img {
            height: 330px;
        }

        .utility-card img {
            height: 330px;
            width: 100%;
            object-fit: cover;
        }

        .utilities-grid.mt-30 .utility-card img {
            height: 250px;
        }

        .glide__arrows {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
            pointer-events: none;
            /* để tránh block hover slide */
        }

        .glide__arrow {
            pointer-events: all;
            /* bật lại sự kiện cho nút */
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            font-size: 20px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .glide__arrow:hover {
            background: rgba(0, 0, 0, 0.8);
        }

        .glide__bullets {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 8px;
        }

        .glide__bullet {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #ccc;
            border: none;
            cursor: pointer;
            transition: background 0.3s;
        }

        .glide__bullet:focus {
            outline: none;
        }

        .glide__bullet:hover {
            background: #666;
        }

        .glide__bullet.glide__bullet--active {
            background: #000;
        }
        .contact-card h4 {
            white-space: nowrap;
        }
        .gallery-item img {
            max-height: 520px;
        }
        h1.hero-title .text-gradient {
            background: linear-gradient(135deg, #48fbd5 0%, #02e7b6 100%);
            background-clip: text;
            -webkit-background-clip: text;
        }
        #subdivisions {
            background: linear-gradient(180deg, #f8f9fa 0%, #fff 100%);
            padding: 100px 0;
        }
        .subdivisions-grid {
    display: grid;
    grid-template-columns: repeat(2,1fr);
    gap: 30px
}

.subdivision-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(0,0,0,0.12);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    opacity: 0;
    transform: translateY(20px);
}

.subdivision-card.animate {
    opacity: 1;
    transform: translateY(0);
    animation: fadeInUp 0.6s ease forwards
}

.subdivision-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px rgba(0,0,0,0.2);
}

.subdivision-image {
    position: relative;
    overflow: hidden
}

.subdivision-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.subdivision-card:hover .subdivision-image img {
    transform: scale(1.1)
}

.subdivision-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top,rgb(0 0 0 / .8) 0%,transparent 100%);
    padding: 30px 20px 20px
}

.subdivision-overlay h3 {
    color: #fff;
    font-size: 24px
}

.subdivision-info {
    padding: 30px
}

.subdivision-info h4 {
    color: var(--primary);
    margin-bottom: 15px
}

.subdivision-info p {
    color: var(--gray-600);
    margin-bottom: 20px;
    line-height: 1.7
}

.subdivision-info ul {
    list-style: none
}

.subdivision-info li {
    color: var(--gray-700);
    padding: 8px 0;
    border-bottom: 1px solid var(--gray-200)
}

.subdivision-info li:last-child {
    border: none
}

.subdivision-info li:before {
    content: "→";
    color: var(--primary);
    margin-right: 10px
}
    </style>
    <!-- Schema.org Structured Data -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "RealEstateAgent",
            "name": "Vinhomes Green Paradise Cần Giờ",
            "image": "{{asset('assets/images/logo.png')}}",
            "url": "{{url('')}}",
            "telephone": "{{settings('phone')}}",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Xã Long Hòa, Thị trấn Cần Thạnh",
                "addressLocality": "Cần Giờ",
                "addressRegion": "TP.HCM",
                "postalCode": "700000",
                "addressCountry": "VN"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": 10.5833,
                "longitude": 106.719
            },
            "openingHoursSpecification": {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"],
                "opens": "08:00",
                "closes": "19:00"
            },
            "priceRange": "5 tỷ - 100 tỷ VNĐ"
        }
    </script>
@endsection

@section('page')
    
    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-video">
            <div class="hero-overlay"></div>
            <img src="{{asset('assets/images/vinhomes-green-paradise-tam-co-quoc-te.jpg')}}" alt="Green Paradise">
        </div>
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">
                    <span class="text-gradient text-transform-uppercase">Vinhomes Green Paradise</span>
                </h1>
                <h2 class="hero-subtitle text-transform-uppercase">Thiên Đường Xanh Bên Biển</h2>
                <p class="hero-description">
                    Siêu đô thị ESG đầu tiên Việt Nam • 2.870 hecta • Vốn đầu tư 10 tỷ USD<br>
                    Kiến tạo chuẩn sống mới cho 230.000 cư dân
                </p>
                <div class="hero-buttons">
                    <button class="btn btn-primary" onclick="window.location.href='{{route('contact')}}'">Khám Phá Ngay</button>
                    <button class="btn btn-secondary" onclick="window.location.href='{{route('contact')}}'">Tải Brochure</button>
                </div>
            </div>
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number" data-count="2870">0</div>
                    <div class="stat-label">Hecta</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="13">0</div>
                    <div class="stat-label">Km Bờ Biển</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="108">0</div>
                    <div class="stat-label">Tầng Tháp</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="10">0</div>
                    <div class="stat-label">Tỷ USD</div>
                </div>
            </div>
        </div>
        <div class="scroll-indicator">
            <i class="fas fa-chevron-down"></i>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">TỔNG QUAN DỰ ÁN</h2>
                <p class="section-subtitle">Siêu Đô Thị ESG Hàng Đầu Thế Giới</p>
            </div>
            <div class="about-grid">
                <div class="about-content">
                    <h3>Thiên Đường Nghỉ Dưỡng Đẳng Cấp Thế Giới</h3>
                    <p>Green Paradise Cần Giờ là siêu đô thị lấn biển đầu tiên tại Việt Nam, được phát triển dựa trên ba trụ cột: <strong>Xanh – Thông minh – Sinh thái</strong>. Với tổng vốn đầu tư lên tới 10 tỷ USD, dự án hứa hẹn trở thành "Thành phố" Du lịch – Giải trí – Dịch vụ – Nghỉ dưỡng & Trung tâm kinh tế – tài chính ven biển TP.HCM.</p>
                    <div class="about-features">
                        <div class="feature-item">
                            <i class="fas fa-leaf"></i>
                            <span>Đô Thị Xanh ESG</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-brain"></i>
                            <span>Công Nghệ AI-IoT</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-globe"></i>
                            <span>Tiêu Chuẩn Quốc Tế</span>
                        </div>
                    </div>
                    <button class="btn btn-outline">Tìm Hiểu Thêm</button>
                </div>
                <div class="about-image">
                    <img src="{{asset('assets/images/tien-ich-vinhomes-green-paradise-11.jpg')}}" alt="Green Paradise Overview">
                    {{-- <div class="image-overlay">
                        <i class="fas fa-play-circle"></i>
                        <span>Xem Video Giới Thiệu</span>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>

    <!-- Location Section -->
    <section id="location" class="location">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">VỊ TRÍ VÀNG</h2>
                <p class="section-subtitle">Cửa Ngõ Biển Duy Nhất Của TP.HCM</p>
            </div>
            <div class="location-content">
                <div class="location-map">
                    <img src="{{asset('assets/images/vi-tri-vinhomes-green-paradise.jpg')}}" alt="Vị trí vàng Vinhomes Green Paradise">
                    <div class="location-markers">
                        <div class="marker" style="top: 49%; left: 72%;">
                            <div class="marker-dot"></div>
                            <div class="marker-label">Green Paradise</div>
                        </div>
                        {{-- <div class="marker" style="top: 60%; left: 30%;">
                            <div class="marker-dot"></div>
                            <div class="marker-label">TP.HCM - 50km</div>
                        </div>
                        <div class="marker" style="top: 45%; left: 70%;">
                            <div class="marker-dot"></div>
                            <div class="marker-label">Sân Bay Long Thành</div>
                        </div> --}}
                    </div>
                </div>
                <div class="location-info">
                    <div class="info-card">
                        <i class="fas fa-subway"></i>
                        <h4>Metro Tốc Độ Cao</h4>
                        <p>12 phút đến Quận 7 với vận tốc 350km/h</p>
                    </div>
                    <div class="info-card">
                        <i class="fas fa-bridge"></i>
                        <h4>Cầu Cần Giờ 7.3km</h4>
                        <p>25 phút về trung tâm TP.HCM</p>
                    </div>
                    <div class="info-card">
                        <i class="fas fa-plane"></i>
                        <h4>Sân Bay Long Thành</h4>
                        <p>45km - 25 phút qua cao tốc</p>
                    </div>
                    <div class="info-card">
                        <i class="fas fa-ship"></i>
                        <h4>Cảng Quốc Tế Cần Giờ</h4>
                        <p>100 triệu tấn hàng/năm</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Utilities Section -->
    <section id="utilities" class="utilities">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">TIỆN ÍCH ĐẲNG CẤP</h2>
                <p class="section-subtitle">Hệ Sinh Thái All-in-One Độc Nhất Việt Nam</p>
            </div>
            <div class="utilities-grid">
                <div class="utility-card">
                    <div class="utility-icon">
                        <i class="fas fa-golf-ball"></i>
                    </div>
                    <h3>Sân Golf 36 Lỗ</h3>
                    <p>Thiết kế bởi Tiger Woods & Robert Trent Jones II</p>
                    <span class="utility-tag">Đẳng Cấp Thế Giới</span>
                </div>
                <div class="utility-card featured">
                    <div class="utility-icon">
                        <i class="fas fa-water"></i>
                    </div>
                    <h3>Paradise Lagoon 443ha</h3>
                    <p>Biển hồ nhân tạo lớn nhất thế giới</p>
                    <span class="utility-tag">Kỷ Lục Guinness</span>
                </div>
                <div class="utility-card">
                    <div class="utility-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h3>Tòa Tháp 108 Tầng</h3>
                    <p>Top 10 tòa nhà cao nhất thế giới</p>
                    <span class="utility-tag">Biểu Tượng Mới</span>
                </div>
                <div class="utility-card">
                    <div class="utility-icon">
                        <i class="fas fa-ship"></i>
                    </div>
                    <h3>Marina 5 Sao</h3>
                    <p>Cảng du thuyền quốc tế cao cấp</p>
                    <span class="utility-tag">Ultra Luxury</span>
                </div>
                <div class="utility-card">
                    <div class="utility-icon">
                        <i class="fas fa-hospital"></i>
                    </div>
                    <h3>Cleveland Clinic</h3>
                    <p>Bệnh viện số 1 nước Mỹ</p>
                    <span class="utility-tag">Y Tế Quốc Tế</span>
                </div>
                <div class="utility-card">
                    <div class="utility-icon">
                        <i class="fas fa-theater-masks"></i>
                    </div>
                    <h3>Blue Wave Theatre</h3>
                    <p>Nhà hát 5.000 chỗ ngồi</p>
                    <span class="utility-tag">Nghệ Thuật</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Subdivisions Section -->
    <section id="subdivisions" class="subdivisions">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">PHÂN KHU DỰ ÁN</h2>
                <p class="section-subtitle">4 Phân Khu Đặc Sắc Độc Đáo</p>
            </div>

            <div class="subdivisions-grid">
                <div class="subdivision-card animate">
                    <div class="subdivision-image">
                        <img src="https://vinhomesgreenparadise.net/assets/images/the-haven-bay-vinh-tien.jpg" alt="The Haven Bay">
                        <div class="subdivision-overlay">
                            <h3>Phân khu A</h3>
                        </div>
                    </div>
                    <div class="subdivision-info">
                        <h4>The Haven Bay - Vịnh Tiên</h4>
                        <p>Điểm khởi đầu của hành trình sống xanh, nơi nghỉ dưỡng và giải trí giao hòa cùng thiên nhiên.</p>
                        <ul>
                            <li><strong>Quy mô:</strong> 953 ha</li>
                            <li><strong>Chức năng:</strong> Cửa ngõ của đại đô thị, khu ở <strong>sinh thái &amp; du
                                    lịch</strong>.</li>
                            <li><strong>Tiện ích nổi bật:</strong> Hội nghị, sân golf, biệt thự nghỉ dưỡng, khách sạn mini.
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="subdivision-card animate">
                    <div class="subdivision-image">
                        <img src="https://vinhomesgreenparadise.net/assets/images/the-greean-bay-vinh-ngoc.jpg" alt="The Green Bay">
                        <div class="subdivision-overlay">
                            <h3>Phân khu B</h3>
                        </div>
                    </div>
                    <div class="subdivision-info">
                        <h4>The Green Bay - Vịnh Ngọc</h4>
                        <p><strong>Trái tim sôi động của đại đô thị</strong>, nơi hội tụ thương mại, y tế, thể thao và nghỉ
                            dưỡng cao cấp.</p>
                        <ul>
                            <li><strong>Quy mô:</strong> 660 ha</li>
                            <li><strong>Chức năng:</strong> Trung tâm thương mại – văn hóa – giải trí – y tế quốc tế.</li>
                            <li><strong>Tiện ích nổi bật:</strong> Sân vận động hiện đại, trung tâm thương mại, bệnh viện
                                quốc tế, khu du lịch &amp; nghỉ dưỡng.</li>
                        </ul>
                    </div>
                </div>

                <div class="subdivision-card animate">
                    <div class="subdivision-image">
                        <img src="https://vinhomesgreenparadise.net/assets/images/the-paradise-mui-danh-vong.jpg" alt="The Paradise">
                        <div class="subdivision-overlay">
                            <h3>Phân khu C</h3>
                        </div>
                    </div>
                    <div class="subdivision-info">
                        <h4>The Paradise - Mũi Danh Vọng</h4>
                        <div><strong>Biểu tượng phồn vinh của đại đô thị</strong>, nơi định hình đường chân trời mới với những
                            công trình mang tầm vóc toàn cầu.</div>
                        <ul>
                            <li><strong>Quy mô:</strong> 318 ha</li>
                            <li><strong>Chức năng:</strong> Trung tâm tài chính – thương mại – dịch vụ &amp; bến cảng.</li>
                            <li><strong>Tiện ích nổi bật:</strong> Tòa tháp 108 tầng, bến tàu quốc tế, cao ốc văn phòng,
                                trung tâm thương mại biểu tượng.</li>
                        </ul>
                    </div>
                </div>

                <div class="subdivision-card animate">
                    <div class="subdivision-image">
                        <img src="https://vinhomesgreenparadise.net/assets/images/the-grand-island-dao-mat-troi.jpg" alt="The Grand Island">
                        <div class="subdivision-overlay">
                            <h3>Phân khu D</h3>
                        </div>
                    </div>
                    <div class="subdivision-info">
                        <h4>The Grand Island - Đảo Mặt Trời</h4>
                        <p><strong>Thiên đường nghỉ dưỡng quy mô lớn</strong>, nơi hội tụ quảng trường biển và không gian
                            sinh thái độc bản giữa lòng đô thị biển.</p>
                        <ul>
                            <li><strong>Quy mô:</strong> 480 ha</li>
                            <li><strong>Chức năng:</strong> Du lịch – nghỉ dưỡng đẳng cấp quốc tế.</li>
                            <li><strong>Tiện ích nổi bật:</strong> Quảng trường biển, khu thấp tầng sinh thái, tổ hợp nghỉ
                                dưỡng &amp; giải trí đa trải nghiệm.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="gallery">
        <div class="container-fluid">
            <div class="section-header">
                <h2 class="section-title">HÌNH ẢNH THỰC TẾ</h2>
                <p class="section-subtitle">Khám Phá Vẻ Đẹp Green Paradise</p>
            </div>
            <div class="glide gallerycontainer">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        @for ($i = 1; $i <= 5; $i++)
                        <li class="glide__slide gallery-item">
                            <img src="assets/images/tien-ich-toan-cau-vinhomes-green-paradise-{{ $i }}.jpg" alt="tien-ich-toan-cau-vinhomes-green-paradise-{{ $i }}">
                            {{-- <div class="gallery-info">
                                <h4>Toàn Cảnh Dự Án</h4>
                            </div> --}}
                        </li>
                        @endfor

                        @for ($i = 1; $i <= 8; $i++)
                            <li class="glide__slide gallery-item">
                                <img src="assets/images/tien-ich-vinhomes-green-paradise-{{ $i }}.jpg"
                                    alt="tien-ich-vinhomes-green-paradise-{{ $i }}">
                                {{-- <div class="gallery-info">
                                    <h4>Phân Khu A - Vịnh Tiên</h4>
                                </div> --}}
                            </li>
                            
                        @endfor
                        
                    </ul>
                </div>

                <!-- Nút điều khiển -->
                <div class="glide__arrows" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<">‹</button>
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">">›</button>
                </div>
                <!-- Dấu chấm (bullets) -->
                <div class="glide__bullets" data-glide-el="controls[nav]">

                    @for ($i = 0; $i < 13; $i++)
                    <button class="glide__bullet" data-glide-dir="={{$i}}"></button>
                    
                    @endfor
                </div>
            </div>
            {{-- <div class="gallery-grid glide">
                <div class="gallery-item large">
                    <img src="{{asset('assets/images/photo-1570168007204-dfb528c6958f.jpeg')}}" alt="Paradise View">
                    <div class="gallery-overlay">
                        <h4>Toàn Cảnh Dự Án</h4>
                        <p>View từ trên cao</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{asset('assets/images/photo-1580587771525-78b9dba3b914.jpeg')}}" alt="Villa">
                    <div class="gallery-overlay">
                        <h4>Biệt Thự Biển</h4>
                        <p>Kiến trúc sang trọng</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{asset('assets/images/photo-1506929562872-bb421503ef21.jpeg')}}" alt="Beach">
                    <div class="gallery-overlay">
                        <h4>Bãi Biển Riêng</h4>
                        <p>13km bờ biển</p>
                    </div>
                </div>
                <div class="gallery-item tall">
                    <img src="{{asset('assets/images/photo-1545324418-cc1a3fa10c00.jpeg')}}" alt="Tower">
                    <div class="gallery-overlay">
                        <h4>Tháp 108 Tầng</h4>
                        <p>Biểu tượng mới</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{asset('assets/images/photo-1587381420270-3e1a5b9e6904.jpeg')}}" alt="Golf">
                    <div class="gallery-overlay">
                        <h4>Sân Golf</h4>
                        <p>Đẳng cấp quốc tế</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{asset('assets/images/photo-1571896349842-33c89424de2d.jpeg')}}" alt="Resort">
                    <div class="gallery-overlay">
                        <h4>Resort 5 Sao</h4>
                        <p>Nghỉ dưỡng cao cấp</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>

    <!-- News Section -->
    <section id="news" class="news">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">TIN TỨC & SỰ KIỆN</h2>
                <p class="section-subtitle">Cập Nhật Mới Nhất Về Dự Án</p>
            </div>
            <div class="news-grid">
                @foreach($posts as $post)
                @break($loop->index >= 3)
                <article class="news-card">
                    <div class="news-image">
                        <img src="{{$post->getFirstMediaUrl('media')}}" alt="{{$post->title}}">
                        <span class="news-date">{{$post->created_at->format('d/m/Y')}}</span>
                    </div>
                    <div class="news-content">
                        <h3>{{$post->title}}</h3>
                        <p>{{Str::words($post->excerpt, 25)}}</p>
                        <a href="{{$post->showUrl()}}" class="read-more">Xem thêm →</a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">ĐĂNG KÝ TƯ VẤN</h2>
                <p class="section-subtitle">Nhận Thông Tin Ưu Đãi & Bảng Giá Mới Nhất</p>
            </div>
            <div class="contact-content">
                <div class="contact-info">
                    <h3>Thông Tin Liên Hệ</h3>
                    <div class="info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>Địa chỉ 1</h4>
                            <p>Tòa nhà T4-51, PhốManhattan, Khu đô thị Vinhomes Grand Park, TP. Thủ Đức , HCM</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>Địa chỉ 2</h4>
                            <p>L10-06 , Lầu 10 , Vincom Center, 72 Lê Thánh Tôn, P. bến Nghé, Quận 1, TP.HCM</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h4>Hotline 24/7</h4>
                            <p>{{settings('phone')}}</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>Email</h4>
                            <p>{{settings('contact_email')}}</p>
                        </div>
                    </div>
                    <div class="social-links">
                        <a href="{{settings('facebook')}}"><i class="fab fa-facebook"></i></a>
                        <a href="{{settings('youtube')}}"><i class="fab fa-youtube"></i></a>
                        <a href="{{settings('tiktok')}}"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
                <form class="contact-form">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Họ và tên *" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" placeholder="Số điện thoại *" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <select name="product">
                            <option>Chọn sản phẩm quan tâm</option>
                            <option>Biệt thự biển</option>
                            <option>Căn hộ cao cấp</option>
                            <option>Shophouse</option>
                            <option>Condotel</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea placeholder="Lời nhắn" rows="4" name="message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-full">
                        Gửi Thông Tin
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new Glide('.glide', {
                type: 'carousel',
                perView: 2, // số item hiển thị
                gap: 20, // khoảng cách giữa các item
                autoplay: 3000, // tự động chạy (ms), bỏ nếu không muốn
                hoverpause: true,
                focusAt: 'center',
                //  peek: { before: 300, after: 300 },
                breakpoints: {
                    1024: {
                        perView: 2
                    },
                    768: {
                        perView: 1
                    }
                }
            }).mount();
        });
    </script>
    <script>
        $(function() {

            $('.contact-form').on('submit', function(e) {
                e.preventDefault();

                $(this).find('button').prop('disabled', true);

                var data = {
                    name: $(this).find('input[name="name"]').val(),
                    phone: $(this).find('input[name="phone"]').val(),
                    email: $(this).find('input[name="email"]').val(),
                    product: $(this).find('select[name="product"]').val(),
                    message: $(this).find('textarea[name="message"]').val()
                };

                $.ajax({
                    type: 'post',
                    url: '{{ route('newsletters') }}',
                    data: data,
                }).then(function(res) {
                    if (res.success) {
                        toastr.success(
                            'Cảm ơn bạn đã đăng ký! Chúng tôi sẽ liên hệ với bạn sớm nhất.');
                        $('.contact-form')[0].reset();
                    } else {
                        toastr.error(res.msg);
                    }
                });
                $(this).find('button').prop('disabled', false);
            });
        });
        
    </script>
@endsection
