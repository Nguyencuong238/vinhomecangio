@extends('layouts.front')

@section('meta')
    <title>Thư Viện Hình Ảnh & Video Vinhomes Green Paradise | Tour 360°</title>
    <meta name="description"
        content="Xem hình ảnh thực tế, video flycam, tour 360° dự án Vinhomes Green Paradise. Paradise Lagoon 443ha, sân golf Tiger Woods, Marina 5 sao">


    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Thư Viện Hình Ảnh & Video Vinhomes Green Paradise | Tour 360°">
    <meta property="og:description"
        content="Xem hình ảnh thực tế, video flycam, tour 360° dự án Vinhomes Green Paradise. Paradise Lagoon 443ha, sân golf Tiger Woods, Marina 5 sao">
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
    <meta property="og:locale" content="vi_VN">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="Thư Viện Hình Ảnh & Video Vinhomes Green Paradise | Tour 360°">
    <meta name="twitter:description"
        content="Xem hình ảnh thực tế, video flycam, tour 360° dự án Vinhomes Green Paradise. Paradise Lagoon 443ha, sân golf Tiger Woods, Marina 5 sao">
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

        /* Gallery specific styles */
        .filter-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 40px;
        }
        
        .filter-btn {
            padding: 10px 25px;
            background: #f8f9fa;
            color: var(--text-dark);
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
        }
        
        .filter-btn.active {
            background: var(--gradient-primary);
            color: #fff;
        }
        
        .gallery-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        
        .gallery-item {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            cursor: pointer;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            aspect-ratio: 16/9;
        }
        
        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }
        
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .gallery-item:hover img {
            transform: scale(1.1);
        }
        
        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.7) 100%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 20px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }
        
        .video-item {
            position: relative;
        }
        
        .video-item::after {
            content: '\f04b';
            font-family: 'Font Awesome 5 Free';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 48px;
            color: #fff;
            background: rgba(0,0,0,0.5);
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: none;
        }
        
        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.95);
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }
        
        .lightbox.active {
            display: flex;
        }
        
        .lightbox-content {
            max-width: 90%;
            max-height: 90%;
        }
        
        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 40px;
            font-size: 40px;
            color: #fff;
            cursor: pointer;
        }
    </style>

    <!-- Schema for Gallery -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "ImageGallery",
            "name": "Thư viện hình ảnh Vinhomes Green Paradise",
            "description": "Bộ sưu tập hình ảnh và video dự án",
            "numberOfItems": 48
        }
    </script>
@endsection

@section('page')
    <!-- Breadcrumb -->
    <section class="breadcrumb-section" style="background: linear-gradient(135deg, #05668d 0%, #00a896 100%); padding: 120px 0 60px; margin-top: 0;">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background: none; padding: 0; margin: 0; display: flex; gap: 10px; color: #fff;">
                    <li class="breadcrumb-item">
                        <a href="/" style="color: #fff; text-decoration: none;">Trang Chủ</a>
                    </li>
                    >
                    <li class="breadcrumb-item active" aria-current="page" style="color: #f0f3bd;">Thư Viện</li>
                </ol>
            </nav>
            <h1 class="page-title" style="color: #fff; font-size: 3rem; margin-top: 20px;">Thư Viện Hình Ảnh & Video</h1>
        </div>
    </section>

    <!-- Main Content -->
    <main>
        <!-- Virtual Tour Section -->
        <section class="virtual-tour" style="padding: 80px 0; background: linear-gradient(180deg, #f8f9fa 0%, #fff 100%);">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">TOUR THAM QUAN 360°</h2>
                    <p class="section-subtitle">Khám Phá Green Paradise Trong Không Gian 3D</p>
                </div>
                
                <div class="tour-wrapper" style="position: relative; border-radius: 20px; overflow: hidden; box-shadow: var(--shadow-xl); aspect-ratio: 16/9; background: #000;">
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen
                            style="width: 100%; height: 100%; position: absolute; top: 0; left: 0;">
                    </iframe>
                    <div style="position: absolute; bottom: 20px; left: 20px; background: rgba(0,0,0,0.7); color: #fff; padding: 15px 25px; border-radius: 10px;">
                        <i class="fas fa-vr-cardboard" style="margin-right: 10px;"></i>
                        Hỗ trợ xem VR 360°
                    </div>
                </div>
                
                <div style="display: flex; gap: 20px; justify-content: center; margin-top: 30px; flex-wrap: wrap;">
                    <button class="btn btn-primary">
                        <i class="fas fa-play"></i> Xem Tour Đầy Đủ
                    </button>
                    <button class="btn btn-outline">
                        <i class="fas fa-download"></i> Tải Brochure
                    </button>
                </div>
            </div>
        </section>

        <!-- Photo Gallery -->
        <section class="photo-gallery" style="padding: 80px 0;">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">HÌNH ẢNH DỰ ÁN</h2>
                    <p class="section-subtitle">Khám Phá Vẻ Đẹp Từng Góc Nhìn</p>
                </div>

                <!-- Filter Buttons -->
                <div class="filter-buttons">
                    <button class="filter-btn active" onclick="filterGallery('all')">Tất Cả</button>
                    <button class="filter-btn" onclick="filterGallery('overview')">Tổng Quan</button>
                    <button class="filter-btn" onclick="filterGallery('villa')">Biệt Thự</button>
                    <button class="filter-btn" onclick="filterGallery('apartment')">Căn Hộ</button>
                    <button class="filter-btn" onclick="filterGallery('utilities')">Tiện Ích</button>
                    <button class="filter-btn" onclick="filterGallery('landscape')">Cảnh Quan</button>
                </div>

                <!-- Gallery Grid -->
                <div class="gallery-container">
                    <div class="gallery-item" data-category="overview">
                        <img src="{{asset('assets/images/photo-1570168007204-dfb528c6958f.jpeg')}}" alt="Toàn cảnh dự án">
                        <div class="gallery-overlay">
                            <h4 style="color: #fff; margin-bottom: 5px;">Toàn Cảnh Green Paradise</h4>
                            <p style="color: rgba(255,255,255,0.9); font-size: 14px; margin: 0;">View từ trên cao</p>
                        </div>
                    </div>
                    
                    <div class="gallery-item" data-category="villa">
                        <img src="{{asset('assets/images/photo-1580587771525-78b9dba3b914.jpeg')}}" alt="Biệt thự biển">
                        <div class="gallery-overlay">
                            <h4 style="color: #fff; margin-bottom: 5px;">Biệt Thự Mặt Biển</h4>
                            <p style="color: rgba(255,255,255,0.9); font-size: 14px; margin: 0;">Kiến trúc hiện đại</p>
                        </div>
                    </div>
                    
                    <div class="gallery-item" data-category="apartment">
                        <img src="{{asset('assets/images/photo-1545324418-cc1a3fa10c00.jpeg')}}" alt="Căn hộ cao cấp">
                        <div class="gallery-overlay">
                            <h4 style="color: #fff; margin-bottom: 5px;">Căn Hộ Sky View</h4>
                            <p style="color: rgba(255,255,255,0.9); font-size: 14px; margin: 0;">Tòa tháp 108 tầng</p>
                        </div>
                    </div>
                    
                    <div class="gallery-item" data-category="utilities">
                        <img src="{{asset('assets/images/photo-1587381420270-3e1a5b9e6904.jpeg')}}" alt="Sân golf">
                        <div class="gallery-overlay">
                            <h4 style="color: #fff; margin-bottom: 5px;">Sân Golf Championship</h4>
                            <p style="color: rgba(255,255,255,0.9); font-size: 14px; margin: 0;">36 lỗ Tiger Woods Design</p>
                        </div>
                    </div>
                    
                    <div class="gallery-item" data-category="landscape">
                        <img src="{{asset('assets/images/photo-1506929562872-bb421503ef21.jpeg')}}" alt="Bãi biển">
                        <div class="gallery-overlay">
                            <h4 style="color: #fff; margin-bottom: 5px;">Bãi Biển Riêng</h4>
                            <p style="color: rgba(255,255,255,0.9); font-size: 14px; margin: 0;">13km bờ biển tuyệt đẹp</p>
                        </div>
                    </div>
                    
                    <div class="gallery-item" data-category="utilities">
                        <img src="{{asset('assets/images/photo-1559827260-dc66d52bef19.jpeg')}}" alt="Paradise Lagoon">
                        <div class="gallery-overlay">
                            <h4 style="color: #fff; margin-bottom: 5px;">Paradise Lagoon</h4>
                            <p style="color: rgba(255,255,255,0.9); font-size: 14px; margin: 0;">Biển hồ 443ha</p>
                        </div>
                    </div>
                    
                    <div class="gallery-item" data-category="villa">
                        <img src="{{asset('assets/images/photo-1613490493576-7fde63acd811.jpeg')}}" alt="Villa pool">
                        <div class="gallery-overlay">
                            <h4 style="color: #fff; margin-bottom: 5px;">Villa Pool</h4>
                            <p style="color: rgba(255,255,255,0.9); font-size: 14px; margin: 0;">Biệt thự có hồ bơi riêng</p>
                        </div>
                    </div>
                    
                    <div class="gallery-item" data-category="overview">
                        <img src="{{asset('assets/images/photo-1486406146926-c627a92ad1ab.jpeg')}}" alt="Skyline">
                        <div class="gallery-overlay">
                            <h4 style="color: #fff; margin-bottom: 5px;">Skyline Green Paradise</h4>
                            <p style="color: rgba(255,255,255,0.9); font-size: 14px; margin: 0;">View ban đêm</p>
                        </div>
                    </div>
                    
                    <div class="gallery-item" data-category="utilities">
                        <img src="{{asset('assets/images/photo-1540946485063-a40da27545f8.jpeg')}}" alt="Marina">
                        <div class="gallery-overlay">
                            <h4 style="color: #fff; margin-bottom: 5px;">Marina International</h4>
                            <p style="color: rgba(255,255,255,0.9); font-size: 14px; margin: 0;">Cảng du thuyền 5 sao</p>
                        </div>
                    </div>
                </div>
                
                <!-- Load More Button -->
                <div style="text-align: center; margin-top: 40px;">
                    <button class="btn btn-outline">
                        <i class="fas fa-plus"></i> Xem Thêm Hình Ảnh
                    </button>
                </div>
            </div>
        </section>

        <!-- Video Gallery -->
        <section class="video-gallery" style="padding: 80px 0; background: linear-gradient(180deg, #f8f9fa 0%, #fff 100%);">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">VIDEO DỰ ÁN</h2>
                    <p class="section-subtitle">Cảm Nhận Sống Động Qua Từng Thước Phim</p>
                </div>
                
                <div class="gallery-container">
                    <div class="gallery-item video-item">
                        <img src="{{asset('assets/images/photo-1570168007204-dfb528c6958f.jpeg')}}" alt="Video giới thiệu">
                        <div class="gallery-overlay">
                            <h4 style="color: #fff; margin-bottom: 5px;">Video Giới Thiệu Tổng Quan</h4>
                            <p style="color: rgba(255,255,255,0.9); font-size: 14px; margin: 0;">5:30</p>
                        </div>
                    </div>
                    
                    <div class="gallery-item video-item">
                        <img src="{{asset('assets/images/photo-1559827260-dc66d52bef19.jpeg')}}" alt="Paradise Lagoon">
                        <div class="gallery-overlay">
                            <h4 style="color: #fff; margin-bottom: 5px;">Paradise Lagoon Tour</h4>
                            <p style="color: rgba(255,255,255,0.9); font-size: 14px; margin: 0;">3:45</p>
                        </div>
                    </div>
                    
                    <div class="gallery-item video-item">
                        <img src="{{asset('assets/images/photo-1587381420270-3e1a5b9e6904.jpeg')}}" alt="Golf course">
                        <div class="gallery-overlay">
                            <h4 style="color: #fff; margin-bottom: 5px;">Sân Golf Tiger Woods Design</h4>
                            <p style="color: rgba(255,255,255,0.9); font-size: 14px; margin: 0;">4:20</p>
                        </div>
                    </div>
                    
                    <div class="gallery-item video-item">
                        <img src="{{asset('assets/images/photo-1545324418-cc1a3fa10c00.jpeg')}}" alt="Tòa tháp">
                        <div class="gallery-overlay">
                            <h4 style="color: #fff; margin-bottom: 5px;">Tòa Tháp 108 Tầng</h4>
                            <p style="color: rgba(255,255,255,0.9); font-size: 14px; margin: 0;">2:50</p>
                        </div>
                    </div>
                    
                    <div class="gallery-item video-item">
                        <img src="{{asset('assets/images/photo-1580587771525-78b9dba3b914.jpeg')}}" alt="Villa tour">
                        <div class="gallery-overlay">
                            <h4 style="color: #fff; margin-bottom: 5px;">Villa Tour 360°</h4>
                            <p style="color: rgba(255,255,255,0.9); font-size: 14px; margin: 0;">6:15</p>
                        </div>
                    </div>
                    
                    <div class="gallery-item video-item">
                        <img src="{{asset('assets/images/photo-1506929562872-bb421503ef21.jpeg')}}" alt="Beach life">
                        <div class="gallery-overlay">
                            <h4 style="color: #fff; margin-bottom: 5px;">Cuộc Sống Bên Biển</h4>
                            <p style="color: rgba(255,255,255,0.9); font-size: 14px; margin: 0;">3:30</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Design & Planning -->
        <section class="design-planning" style="padding: 80px 0;">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">THIẾT KẾ & QUY HOẠCH</h2>
                    <p class="section-subtitle">Bản Vẽ Chi Tiết & Mặt Bằng Dự Án</p>
                </div>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
                    <div style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: var(--shadow-sm);">
                        <img src="{{asset('assets/images/photo-1503387762-592deb58ef4e.jpeg')}}" alt="Master plan" style="width: 100%; height: 250px; object-fit: cover;">
                        <div style="padding: 25px;">
                            <h4 style="margin-bottom: 10px;">Master Plan Tổng Thể</h4>
                            <p style="color: var(--text-light); font-size: 14px; margin-bottom: 20px;">Quy hoạch tổng thể 2.870ha với các phân khu chức năng</p>
                            <button class="btn btn-outline" style="width: 100%;">
                                <i class="fas fa-download"></i> Tải Xuống
                            </button>
                        </div>
                    </div>
                    
                    <div style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: var(--shadow-sm);">
                        <img src="{{asset('assets/images/photo-1536895058696-a69b1c7ba34f.jpeg')}}" alt="Villa design" style="width: 100%; height: 250px; object-fit: cover;">
                        <div style="padding: 25px;">
                            <h4 style="margin-bottom: 10px;">Thiết Kế Biệt Thự</h4>
                            <p style="color: var(--text-light); font-size: 14px; margin-bottom: 20px;">Bản vẽ chi tiết các mẫu biệt thự từ 300-1000m²</p>
                            <button class="btn btn-outline" style="width: 100%;">
                                <i class="fas fa-download"></i> Tải Xuống
                            </button>
                        </div>
                    </div>
                    
                    <div style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: var(--shadow-sm);">
                        <img src="{{asset('assets/images/photo-1497366216548-37526070297c.jpeg')}}" alt="Apartment layout" style="width: 100%; height: 250px; object-fit: cover;">
                        <div style="padding: 25px;">
                            <h4 style="margin-bottom: 10px;">Layout Căn Hộ</h4>
                            <p style="color: var(--text-light); font-size: 14px; margin-bottom: 20px;">Mặt bằng căn hộ từ studio đến penthouse</p>
                            <button class="btn btn-outline" style="width: 100%;">
                                <i class="fas fa-download"></i> Tải Xuống
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Download Materials -->
        <section class="download-materials" style="padding: 80px 0; background: linear-gradient(135deg, #05668d 0%, #00a896 100%); color: #fff;">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title" style="color: #fff;">TÀI LIỆU DỰ ÁN</h2>
                    <p class="section-subtitle" style="color: rgba(255,255,255,0.9);">Tải Xuống Brochure & Bảng Giá Mới Nhất</p>
                </div>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; max-width: 800px; margin: 0 auto;">
                    <div style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 30px; border-radius: 15px; text-align: center; border: 1px solid rgba(255,255,255,0.2);">
                        <i class="fas fa-book" style="font-size: 48px; margin-bottom: 15px;"></i>
                        <h4 style="margin-bottom: 10px;">E-Brochure</h4>
                        <p style="font-size: 14px; margin-bottom: 20px; color: rgba(255,255,255,0.9);">Catalog dự án 52 trang</p>
                        <button class="btn btn-secondary">
                            <i class="fas fa-download"></i> Tải Xuống (15MB)
                        </button>
                    </div>
                    
                    <div style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 30px; border-radius: 15px; text-align: center; border: 1px solid rgba(255,255,255,0.2);">
                        <i class="fas fa-file-invoice-dollar" style="font-size: 48px; margin-bottom: 15px;"></i>
                        <h4 style="margin-bottom: 10px;">Bảng Giá</h4>
                        <p style="font-size: 14px; margin-bottom: 20px; color: rgba(255,255,255,0.9);">Cập nhật Q4/2025</p>
                        <button class="btn btn-secondary">
                            <i class="fas fa-download"></i> Tải Xuống (2MB)
                        </button>
                    </div>
                    
                    <div style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 30px; border-radius: 15px; text-align: center; border: 1px solid rgba(255,255,255,0.2);">
                        <i class="fas fa-handshake" style="font-size: 48px; margin-bottom: 15px;"></i>
                        <h4 style="margin-bottom: 10px;">Chính Sách</h4>
                        <p style="font-size: 14px; margin-bottom: 20px; color: rgba(255,255,255,0.9);">Chính sách bán hàng</p>
                        <button class="btn btn-secondary">
                            <i class="fas fa-download"></i> Tải Xuống (1MB)
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section" style="padding: 80px 0;">
            <div class="container" style="text-align: center;">
                <h2 style="font-size: 2.5rem; margin-bottom: 20px;">Sẵn Sàng Khám Phá Green Paradise?</h2>
                <p style="font-size: 1.2rem; color: var(--text-light); margin-bottom: 40px; max-width: 600px; margin-left: auto; margin-right: auto;">
                    Đặt lịch tham quan thực tế hoặc liên hệ ngay để nhận tư vấn chi tiết
                </p>
                <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                    <a href="{{route('contact')}}" class="btn btn-primary">Đặt Lịch Tham Quan</a>
                    <button class="btn btn-outline" onclick="window.print()">
                        <i class="fas fa-print"></i> In Tài Liệu
                    </button>
                </div>
            </div>
        </section>
    </main>

    <!-- Lightbox -->
    <div id="lightbox" class="lightbox">
        <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
        <img class="lightbox-content" id="lightbox-img">
    </div>
@endsection

@section('js')
    <script>
        // Filter Gallery
        function filterGallery(category) {
            const items = document.querySelectorAll('.gallery-item');
            const buttons = document.querySelectorAll('.filter-btn');
            
            buttons.forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
            
            items.forEach(item => {
                if (category === 'all' || item.dataset.category === category) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        // Lightbox
        document.querySelectorAll('.gallery-item:not(.video-item)').forEach(item => {
            item.addEventListener('click', function() {
                const img = this.querySelector('img');
                const lightbox = document.getElementById('lightbox');
                const lightboxImg = document.getElementById('lightbox-img');
                
                lightboxImg.src = img.src;
                lightbox.classList.add('active');
            });
        });

        function closeLightbox() {
            document.getElementById('lightbox').classList.remove('active');
        }


        $(function() {
            
        });
    </script>
@endsection
