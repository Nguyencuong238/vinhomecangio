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
                "telephone": "{{settings('phone')}}",
                "contactType": "Sales",
                "availableLanguage": ["Vietnamese", "English"],
                "areaServed": "VN",
                "contactOption": "TollFree"
            }
        }
    </script>
    <style>
        /* Contact specific styles */
        .contact-hero {
            background: linear-gradient(135deg, #05668d 0%, #00a896 100%);
            padding: 150px 0 80px;
            text-align: center;
            color: #fff;
        }
        
        .contact-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }
        
        .contact-card {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: var(--shadow-sm);
            text-align: center;
            transition: var(--transition);
        }
        
        .contact-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }
        
        .contact-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            background: var(--gradient-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .contact-form-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: start;
        }
        
        .form-container {
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text-dark);
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: inherit;
            font-size: 14px;
            transition: var(--transition);
            color: var(--text-dark);
        }
        
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(0,168,150,0.1);
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .office-info {
            background: linear-gradient(135deg, #f8f9fa 0%, #fff 100%);
            padding: 40px;
            border-radius: 20px;
        }
        .form-group select option {
            background: #fff;
        }
        @media (max-width: 768px) {
            .contact-form-section {
                grid-template-columns: 1fr;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection

@section('page')
    <!-- Contact Hero -->
    <section class="contact-hero">
        <div class="container">
            <h1 style="font-size: 3rem; margin-bottom: 15px;">Liên Hệ Với Chúng Tôi</h1>
            <p style="font-size: 1.2rem; color: rgba(255,255,255,0.9);">Sẵn sàng tư vấn và hỗ trợ bạn 24/7</p>
        </div>
    </section>

    <!-- Main Content -->
    <main style="padding: 80px 0; background: #f8f9fa;">
        <div class="container">
            <!-- Contact Info Cards -->
            <div class="contact-info-grid">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-phone" style="color: #fff; font-size: 28px;"></i>
                    </div>
                    <h3 style="margin-bottom: 15px;">Hotline 24/7</h3>
                    <p style="font-size: 24px; color: var(--primary-color); font-weight: 700; margin-bottom: 10px;">{{settings('phone')}}</p>
                    <p style="color: var(--text-light); font-size: 14px;">Tư vấn miễn phí</p>
                </div>
                
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-envelope" style="color: #fff; font-size: 28px;"></i>
                    </div>
                    <h3 style="margin-bottom: 15px;">Email</h3>
                    <p style="font-size: 18px; color: var(--text-dark); margin-bottom: 10px;">{{settings('contact_email')}}</p>
                    <p style="color: var(--text-light); font-size: 14px;">Phản hồi trong 24h</p>
                </div>
                
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt" style="color: #fff; font-size: 28px;"></i>
                    </div>
                    <h3 style="margin-bottom: 15px;">Văn Phòng</h3>
                    <p style="font-size: 16px; color: var(--text-dark); margin-bottom: 10px;">Xã Long Hòa, Cần Giờ</p>
                    <p style="color: var(--text-light); font-size: 14px;">8:00 - 20:00 hàng ngày</p>
                </div>
                
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-clock" style="color: #fff; font-size: 28px;"></i>
                    </div>
                    <h3 style="margin-bottom: 15px;">Giờ Làm Việc</h3>
                    <p style="font-size: 16px; color: var(--text-dark); margin-bottom: 10px;">Thứ 2 - CN</p>
                    <p style="color: var(--text-light); font-size: 14px;">8:00 AM - 8:00 PM</p>
                </div>
            </div>

            <!-- Contact Form & Office Info -->
            <div class="contact-form-section">
                <!-- Form -->
                <div class="form-container">
                    <h2 style="margin-bottom: 10px;">Đăng Ký Nhận Tư Vấn</h2>
                    <p style="color: var(--text-light); margin-bottom: 30px;">Vui lòng điền thông tin, chúng tôi sẽ liên hệ trong 15 phút</p>
                    
                    <form id="contactForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="fullname">Họ và tên <span style="color: red;">*</span></label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại <span style="color: red;">*</span></label>
                                <input type="tel" id="phone" name="phone" required pattern="[0-9]{10}">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email">
                        </div>
                        
                        <div class="form-group">
                            <label for="product">Sản phẩm quan tâm <span style="color: red;">*</span></label>
                            <select id="product" name="product" required>
                                <option value="">-- Chọn sản phẩm --</option>
                                <option>Biệt thự biển</option>
                                <option>Căn hộ cao cấp</option>
                                <option>Shophouse</option>
                                <option>Condotel</option>
                                <option>Đất nền</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="budget">Ngân sách dự kiến</label>
                            <select id="budget" name="budget">
                                <option value="">-- Chọn ngân sách --</option>
                                <option value="under-5">Dưới 5 tỷ</option>
                                <option value="5-10">5 - 10 tỷ</option>
                                <option value="10-20">10 - 20 tỷ</option>
                                <option value="20-50">20 - 50 tỷ</option>
                                <option value="over-50">Trên 50 tỷ</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="schedule">Thời gian muốn tham quan</label>
                            <input type="datetime-local" id="schedule" name="schedule">
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Lời nhắn</label>
                            <textarea id="message" name="message" rows="4" placeholder="Vui lòng cho chúng tôi biết yêu cầu của bạn..."></textarea>
                        </div>
                        
                        <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
                            <input type="checkbox" id="agree" name="agree" required style="width: auto;">
                            <label for="agree" style="margin: 0; font-weight: normal;">
                                Tôi đồng ý nhận thông tin từ Green Paradise
                            </label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 15px; font-size: 16px;">
                            <i class="fas fa-paper-plane" style="margin-right: 10px;"></i>
                            Gửi Đăng Ký
                        </button>
                    </form>
                </div>

                <!-- Office Info -->
                <div class="office-info">
                    <h2 style="margin-bottom: 30px;">Văn Phòng Bán Hàng</h2>
                    
                    <div style="margin-bottom: 30px;">
                        <h4 style="color: var(--primary-color); margin-bottom: 15px;">
                            <i class="fas fa-building" style="margin-right: 10px;"></i>
                            Địa chỉ 1
                        </h4>
                        <p style="line-height: 1.8; color: var(--text-light);">
                            Địa chỉ: Tòa nhà T4-51, PhốManhattan, Khu đô thị Vinhomes Grand Park, TP. Thủ Đức , HCM
                        </p>
                    </div>
                    
                    <div style="margin-bottom: 30px;">
                        <h4 style="color: var(--primary-color); margin-bottom: 15px;">
                            <i class="fas fa-city" style="margin-right: 10px;"></i>
                            Địa chỉ 2
                        </h4>
                        <p style="line-height: 1.8; color: var(--text-light);">
                            Địa chỉ: L10-06 , Lầu 10 , Vincom Center, 72 Lê Thánh Tôn, P. bến Nghé, Quận 1, TP.HCM
                        </p>
                    </div>
                    
                    {{-- <div style="margin-bottom: 30px;">
                        <h4 style="color: var(--primary-color); margin-bottom: 15px;">
                            <i class="fas fa-bus" style="margin-right: 10px;"></i>
                            Xe Đưa Đón Miễn Phí
                        </h4>
                        <p style="line-height: 1.8; color: var(--text-light);">
                            Chúng tôi cung cấp dịch vụ đưa đón miễn phí từ TP.HCM đến dự án cho khách hàng đã đặt lịch tham quan.
                        </p>
                        <button class="btn btn-outline" style="margin-top: 15px;">
                            <i class="fas fa-calendar-check"></i>
                            Đặt Xe Tham Quan
                        </button>
                    </div> --}}
                    
                    <div>
                        {{-- <h4 style="color: var(--primary-color); margin-bottom: 15px;">
                            <i class="fas fa-share-alt" style="margin-right: 10px;"></i>
                            Kết Nối Với Chúng Tôi
                        </h4> --}}
                        <div style="display: flex; gap: 15px;">
                            <a href="{{settings('facebook')}}" style="width: 45px; height: 45px; background: var(--gradient-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; text-decoration: none;">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="{{settings('youtube')}}" style="width: 45px; height: 45px; background: var(--gradient-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; text-decoration: none;">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a href="{{settings('tiktok')}}" style="width: 45px; height: 45px; background: var(--gradient-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; text-decoration: none;">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
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
            $('#contactForm').on('submit', function(e) {
                e.preventDefault();

                $(this).find('button').prop('disabled', true);
                
                var data = {
                        name: $('#name').val(),
                        phone: $('#phone').val(),
                        email: $('#email').val(),
                        product: $('#product').val(),
                        schedule: $('#schedule').val(),
                        message: $('#message').val()
                    };
                    
                $.ajax({
                    type: 'post',
                    url: "{{ route('newsletters') }}",
                    data: data,
                }).then(function(res) {
                    
                    if (res.success) {
                        toastr.success('Cảm ơn bạn đã đăng ký! Chúng tôi sẽ liên hệ với bạn sớm nhất.');
                        $('#contactForm')[0].reset();
                    } else {
                        toastr.error(res.msg);
                    }
                    

                });
                $(this).find('button').prop('disabled', false);
            });
        });
    </script>
@endsection
