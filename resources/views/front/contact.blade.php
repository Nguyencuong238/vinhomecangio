@extends('layouts.front')

@section('meta')
    <title>Liên Hệ Tư Vấn Vinhomes Green Paradise | Hotline: {{ settings('phone') }}</title>
    <meta name="description"
        content="Liên hệ tư vấn dự án Vinhomes Green Paradise Cần Giờ. Hotline 24/7: {{ settings('phone') }}. Nhận bảng giá, ưu đãi chiết khấu 18%, hỗ trợ vay 0% lãi suất">


    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Liên Hệ Tư Vấn Vinhomes Green Paradise | Hotline: {{ settings('phone') }}">
    <meta property="og:description"
        content="Liên hệ tư vấn dự án Vinhomes Green Paradise Cần Giờ. Hotline 24/7: {{ settings('phone') }}. Nhận bảng giá, ưu đãi chiết khấu 18%, hỗ trợ vay 0% lãi suất">
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
    <meta property="og:locale" content="vi_VN">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="Liên Hệ Tư Vấn Vinhomes Green Paradise | Hotline: {{ settings('phone') }}">
    <meta name="twitter:description"
        content="Liên hệ tư vấn dự án Vinhomes Green Paradise Cần Giờ. Hotline 24/7: {{ settings('phone') }}. Nhận bảng giá, ưu đãi chiết khấu 18%, hỗ trợ vay 0% lãi suất">
    <meta name="twitter:image" content="{{ asset('assets/images/logo.png') }}">
@endsection

@section('css')
    <!-- Schema for Contact Page -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "ContactPage",
            "mainEntity": {
                "@type": "ContactPoint",
                "telephone": "+84-963-728-586",
                "contactType": "Sales",
                "availableLanguage": ["Vietnamese", "English"],
                "areaServed": "VN",
                "contactOption": "TollFree"
            }
        }
    </script>
    <!-- Custom CSS for Contact Page -->
    <style>
        .page-hero {
            padding: 120px 0 80px;
            position: relative;
            background-size: cover;
            background-position: center;
        }

        .page-hero-content {
            text-align: center;
            color: white;
        }

        .page-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            margin-bottom: 15px;
            color: white;
        }

        .page-subtitle {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .breadcrumb {
            display: flex;
            justify-content: center;
            gap: 15px;
            font-size: 14px;
        }

        .breadcrumb a {
            color: white;
            text-decoration: none;
        }

        .section-padding {
            padding: 80px 0;
        }

        .bg-gray {
            background-color: #f8f9fa;
        }

        /* Contact Info Cards */
        .contact-cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .contact-info-card {
            background: white;
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s;
        }

        .contact-info-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }

        .contact-info-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 25px;
            background: linear-gradient(135deg, #00a896 0%, #02c39a 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .contact-info-icon i {
            font-size: 36px;
            color: white;
        }

        .contact-info-card h3 {
            margin-bottom: 15px;
            color: #1a1a1a;
            font-size: 26px;
        }

        .contact-phone-large {
            font-size: 32px;
            font-weight: 700;
            color: #00a896;
            margin: 15px 0;
        }

        .link-direction,
        .link-call {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #00a896;
            font-weight: 600;
            margin-top: 15px;
            transition: gap 0.3s;
        }

        .link-direction:hover,
        .link-call:hover {
            gap: 12px;
        }

        /* Main Contact Form */
        .contact-form-container {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 60px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .form-left {
            background: white;
            padding: 50px;
            border-radius: 24px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1);
        }

        .form-left h2 {
            margin-bottom: 10px;
            color: #00a896;
            font-size: 42px;
        }

        .form-subtitle {
            color: #6c757d;
            margin-bottom: 40px;
            font-size: 16px;
        }

        .form-group {
            position: relative;
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #495057;
        }

        .required {
            color: #dc3545;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 15px 20px 15px 50px;
            border: 1px solid #ced4da;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s;
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #00a896;
            box-shadow: 0 0 0 3px rgba(0, 168, 150, 0.1);
        }

        .form-group i {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #adb5bd;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-checkbox {
            margin: 30px 0;
        }

        .form-checkbox input {
            margin-right: 10px;
        }

        .btn-submit-main {
            width: 100%;
            background: linear-gradient(135deg, #00a896 0%, #02c39a 100%);
            color: white;
            padding: 18px 30px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-submit-main:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(0, 168, 150, 0.3);
        }

        /* Form Right */
        .why-choose {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .why-choose h3 {
            color: #00a896;
            margin-bottom: 25px;
        }

        .benefits-list {
            list-style: none;
        }

        .benefits-list li {
            display: flex;
            align-items: start;
            gap: 12px;
            margin-bottom: 15px;
            color: #495057;
        }

        .benefits-list i {
            color: #28a745;
            margin-top: 3px;
        }

        .download-section {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .download-section h3 {
            color: #00a896;
            margin-bottom: 25px;
        }

        .download-buttons-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .download-btn {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 12px;
            transition: all 0.3s;
        }

        .download-btn:hover {
            background: linear-gradient(135deg, #00a896 0%, #02c39a 100%);
            color: white;
            transform: translateX(5px);
        }

        .download-btn i {
            font-size: 28px;
            color: #00a896;
        }

        .download-btn:hover i {
            color: white;
        }

        .download-btn strong {
            display: block;
            margin-bottom: 5px;
        }

        .download-btn span {
            font-size: 12px;
            opacity: 0.8;
        }

        .contact-person {
            background: linear-gradient(135deg, #00a896 0%, #05668d 100%);
            padding: 30px;
            border-radius: 20px;
            color: white;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .contact-person img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 3px solid white;
        }

        .contact-person h4 {
            color: white;
            margin-bottom: 5px;
        }

        .phone-direct {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: white;
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 16px;
            border-radius: 25px;
            margin-top: 10px;
            transition: all 0.3s;
        }

        .phone-direct:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Map Section */
        .map-section {
            position: relative;
            height: 500px;
            padding: 0;
        }

        .map-container {
            position: relative;
            height: 100%;
        }

        .map-overlay {
            position: absolute;
            bottom: 50px;
            left: 50px;
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
            max-width: 350px;
        }

        .map-info h3 {
            margin-bottom: 10px;
            color: #00a896;
        }

        /* FAQ Section */
        .faq-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .faq-item {
            background: white;
            margin-bottom: 20px;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .faq-question {
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            transition: background 0.3s;
        }

        .faq-question:hover {
            background: #f8f9fa;
        }

        .faq-question h4 {
            margin: 0;
            color: #1a1a1a;
        }

        .faq-question i {
            color: #00a896;
            transition: transform 0.3s;
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s;
        }

        .faq-item.active .faq-answer {
            max-height: 300px;
        }

        .faq-answer p {
            padding: 0 30px 25px;
            color: #6c757d;
            line-height: 1.8;
        }

        .position-relative {
            position: relative !important;
        }

        @media (max-width: 992px) {
            .contact-form-container {
                grid-template-columns: 1fr;
            }

            .map-overlay {
                position: static;
                max-width: 100%;
                margin: 20px;
            }
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }

            .form-left {
                padding: 30px;
            }

            .contact-cards-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection

@section('page')
    <!-- Page Hero -->
    <section class="page-hero"
        style="background: linear-gradient(135deg, rgba(5,102,141,0.9) 0%, rgba(0,168,150,0.8) 100%), url('{{asset('assets/images/lien-he-cover.jpeg')}}') center/cover;">
        <div class="container">
            <div class="page-hero-content">
                <h1 class="page-title">Liên Hệ Tư Vấn</h1>
                <p class="page-subtitle">Nhận Ưu Đãi Độc Quyền & Bảng Giá Mới Nhất</p>
                <div class="breadcrumb">
                    <a href="/">Trang Chủ</a>
                    <span>/</span>
                    <span>Liên Hệ</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="contact-info-section section-padding">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">THÔNG TIN LIÊN HỆ</span>
                <h2 class="section-title">Chúng Tôi Luôn<br><span>Sẵn Sàng Hỗ Trợ</span></h2>
            </div>

            <div class="contact-cards-grid">
                <div class="contact-info-card">
                    <div class="contact-info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>Văn Phòng Dự Án</h3>
                    <p>Xã Long Hòa, Thị trấn Cần Thạnh<br>Huyện Cần Giờ, TP. Hồ Chí Minh</p>
                    <a href="#" class="link-direction">Chỉ đường <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="contact-info-card">
                    <div class="contact-info-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h3>Showroom Trải Nghiệm</h3>
                    <p>Vinhomes Central Park<br>208 Nguyễn Hữu Cảnh, Bình Thạnh</p>
                    <a href="#" class="link-direction">Xem bản đồ <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="contact-info-card">
                    <div class="contact-info-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3>Hotline 24/7</h3>
                    <p class="contact-phone-large">{{ settings('phone') }}</p>
                    <p>Tư vấn miễn phí - Hỗ trợ tận tình</p>
                    <a href="tel:{{ str_replace(' ', '', settings('phone')) }}" class="link-call">Gọi ngay <i class="fas fa-phone"></i></a>
                </div>

                <div class="contact-info-card">
                    <div class="contact-info-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Giờ Làm Việc</h3>
                    <p><strong>Thứ 2 - Thứ 6:</strong> 8:00 - 19:00<br>
                        <strong>Thứ 7:</strong> 8:00 - 18:00<br>
                        <strong>Chủ nhật:</strong> 8:00 - 17:00
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Contact Form Section -->
    <section class="main-contact-form section-padding bg-gray">
        <div class="container">
            <div class="contact-form-container">
                <div class="form-left">
                    <h2>Đăng Ký Nhận Thông Tin</h2>
                    <p class="form-subtitle">Để lại thông tin để nhận tư vấn từ đội ngũ chuyên gia của chúng tôi</p>

                    <form class="contact-form-main">
                        <div class="form-group">
                            <label>Họ và tên <span class="required">*</span></label>
                            <div class="position-relative">
                                <input type="text" placeholder="Nhập họ tên của bạn" required name="name">
                                <i class="fas fa-user"></i>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Số điện thoại <span class="required">*</span></label>
                                <div class="position-relative">
                                    <input type="tel" placeholder="Số điện thoại" required name="phone">
                                    <i class="fas fa-phone"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <div class="position-relative">
                                    <input type="email" placeholder="Email của bạn" name="email">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Sản phẩm quan tâm</label>
                            <div class="position-relative">
                                <select name="product">
                                    <option>-- Chọn sản phẩm --</option>
                                    <option>Biệt thự biển The Haven Bay</option>
                                    <option>Townhouse The Green Bay</option>
                                    <option>Căn hộ cao cấp The Paradise</option>
                                    <option>Biệt thự đảo The Grand Island</option>
                                    <option>Shophouse thương mại</option>
                                </select>
                                <i class="fas fa-home"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Ngân sách dự kiến</label>
                            <div class="position-relative">
                                <select name="budget">
                                    <option>-- Chọn ngân sách --</option>
                                    <option>Dưới 5 tỷ</option>
                                    <option>5 - 10 tỷ</option>
                                    <option>10 - 20 tỷ</option>
                                    <option>20 - 50 tỷ</option>
                                    <option>Trên 50 tỷ</option>
                                </select>
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Lời nhắn</label>
                            <div class="position-relative">
                                <textarea rows="4" placeholder="Nội dung bạn muốn tư vấn..." name="message"></textarea>
                                <i class="fas fa-comment" style="top: 35px;"></i>
                            </div>
                        </div>

                        <div class="form-checkbox">
                            <input type="checkbox" id="agree">
                            <label for="agree">Tôi đồng ý nhận thông tin từ Vinhomes Green Paradise</label>
                        </div>

                        <button type="submit" class="btn btn-submit-main">
                            Gửi Yêu Cầu
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>

                <div class="form-right">
                    <div class="why-choose">
                        <h3>Vì Sao Chọn Green Paradise?</h3>
                        <ul class="benefits-list">
                            <li><i class="fas fa-check-circle"></i> Siêu đô thị ESG đầu tiên Việt Nam</li>
                            <li><i class="fas fa-check-circle"></i> Vị trí độc tôn - Cửa ngõ biển duy nhất TP.HCM</li>
                            <li><i class="fas fa-check-circle"></i> Quy mô 2,870 ha với 13km bờ biển</li>
                            <li><i class="fas fa-check-circle"></i> Vốn đầu tư 10 tỷ USD</li>
                            <li><i class="fas fa-check-circle"></i> Paradise Lagoon 443ha - Lớn nhất thế giới</li>
                            <li><i class="fas fa-check-circle"></i> Sân golf 36 lỗ thiết kế bởi Tiger Woods</li>
                            <li><i class="fas fa-check-circle"></i> Tiềm năng tăng giá 300-500%</li>
                        </ul>
                    </div>

                    <div class="download-section">
                        <h3>Tải Tài Liệu</h3>
                        <div class="download-buttons-group">
                            <a href="#" class="download-btn">
                                <i class="fas fa-file-pdf"></i>
                                <div>
                                    <strong>Brochure Dự Án</strong>
                                    <span>PDF - 25MB</span>
                                </div>
                            </a>
                            <a href="#" class="download-btn">
                                <i class="fas fa-file-excel"></i>
                                <div>
                                    <strong>Bảng Giá Chi Tiết</strong>
                                    <span>Excel - 2MB</span>
                                </div>
                            </a>
                            <a href="#" class="download-btn">
                                <i class="fas fa-file-alt"></i>
                                <div>
                                    <strong>Chính Sách Bán Hàng</strong>
                                    <span>PDF - 5MB</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="contact-person">
                        <img src="{{asset('assets/images/avatar.jpeg')}}"
                            alt="Sales Manager">
                        <div>
                            <h4>Mr. Nguyễn Văn A</h4>
                            <p>Giám đốc Kinh doanh</p>
                            <a href="tel:{{ str_replace(' ', '', settings('phone')) }}" class="phone-direct">
                                <i class="fas fa-phone"></i> {{ settings('phone') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125428.89045193438!2d106.71900895!3d10.5833335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752e6f8e6f0a8d%3A0x49e8f8a06c4a1f2!2sCan%20Gio%20District%2C%20Ho%20Chi%20Minh%20City%2C%20Vietnam!5e0!3m2!1sen!2s!4v1234567890"
                width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
            <div class="map-overlay">
                <div class="map-info">
                    <h3>Vinhomes Green Paradise</h3>
                    <p>Xã Long Hòa, Cần Giờ, TP.HCM</p>
                    <a href="#" class="btn btn-primary">Chỉ đường</a>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section section-padding">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">CÂU HỎI THƯỜNG GẶP</span>
                <h2 class="section-title">Giải Đáp<br><span>Thắc Mắc</span></h2>
            </div>

            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Vinhomes Green Paradise có quy mô bao nhiêu?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Dự án có tổng diện tích 2,870 hecta với 13km bờ biển, dự kiến đón 230,000 cư dân. Đây là siêu đô
                            thị lấn biển lớn nhất Việt Nam với tổng vốn đầu tư lên đến 10 tỷ USD.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Thời gian dự kiến hoàn thành dự án?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Dự án được triển khai theo 3 giai đoạn: Giai đoạn 1 (2025-2027), Giai đoạn 2 (2027-2030), và Giai
                            đoạn 3 (2030-2035). Phân khu đầu tiên The Haven Bay dự kiến bàn giao vào Q4/2027.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Chính sách thanh toán như thế nào?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Khách hàng chỉ cần thanh toán 30% giá trị căn hộ, 70% còn lại được hỗ trợ vay với lãi suất 0%
                            trong 24 tháng. Chiết khấu lên đến 18% cho khách hàng đặt cọc sớm.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Tiện ích nổi bật của dự án là gì?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Paradise Lagoon 443ha (lớn nhất thế giới), 2 sân golf 36 lỗ thiết kế bởi Tiger Woods, Marina 5
                            sao, tòa tháp 108 tầng, Cleveland Clinic, 7,000 phòng khách sạn cao cấp.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        // FAQ Toggle
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const faqItem = question.parentElement;
                const wasActive = faqItem.classList.contains('active');

                // Close all FAQ items
                document.querySelectorAll('.faq-item').forEach(item => {
                    item.classList.remove('active');
                });

                // Toggle current item
                if (!wasActive) {
                    faqItem.classList.add('active');
                }
            });
        });

        $(function() {
            $('.contact-form-main').on('submit', function(e) {
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
                    url: "{{ route('newsletters') }}",
                    data: data,
                }).then(function(res) {
                    
                    if (res.success) {
                        toastr.success('Cảm ơn bạn đã đăng ký! Chúng tôi sẽ liên hệ với bạn sớm nhất.');
                        $('.contact-form-main')[0].reset();
                    } else {
                        toastr.error(res.msg);
                    }
                    

                });
                $(this).find('button').prop('disabled', false);
            });
        });
    </script>
@endsection
