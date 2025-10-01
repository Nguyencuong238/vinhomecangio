@extends('layouts.front')

@section('meta')
    <title>Tiến Độ Xây Dựng Vinhomes Green Paradise 2025 | Cập Nhật Real-time</title>
    <meta name="description"
        content="Cập nhật tiến độ xây dựng Vinhomes Green Paradise thời gian thực. Hoàn thành 42%, dự kiến bàn giao The Haven Bay Q4/2027. Xem camera trực tiếp">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Tiến Độ Xây Dựng Vinhomes Green Paradise 2025 | Cập Nhật Real-time">
    <meta property="og:description"
        content="Cập nhật tiến độ xây dựng Vinhomes Green Paradise thời gian thực. Hoàn thành 42%, dự kiến bàn giao The Haven Bay Q4/2027. Xem camera trực tiếp">
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
    <meta property="og:locale" content="vi_VN">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="Tiến Độ Xây Dựng Vinhomes Green Paradise 2025 | Cập Nhật Real-time">
    <meta name="twitter:description"
        content="Cập nhật tiến độ xây dựng Vinhomes Green Paradise thời gian thực. Hoàn thành 42%, dự kiến bàn giao The Haven Bay Q4/2027. Xem camera trực tiếp">
    <meta name="twitter:image" content="{{ asset('assets/images/logo.png') }}">
@endsection

@section('css')
    <!-- Custom CSS for Progress Page -->
    <style>
        /* Page Hero */
        .page-hero {
            padding: 120px 0 80px;
            position: relative;
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

        .breadcrumb {
            display: flex;
            justify-content: center;
            gap: 15px;
            font-size: 14px;
        }

        .breadcrumb a {
            color: white;
        }

        .section-padding {
            padding: 80px 0;
        }

        .bg-gray {
            background: #f8f9fa;
        }

        /* Overall Progress */
        .progress-overview {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 60px;
            align-items: center;
            margin: 50px 0;
        }

        .overall-stat {
            text-align: center;
        }

        .circular-progress {
            position: relative;
            width: 140px;
            height: 140px;
            margin: 0 auto 20px;
        }

        .circular-progress svg {
            position: relative;
            width: 140px;
            height: 140px;
            transform: rotate(-90deg);
        }

        .circular-progress svg circle {
            width: 140px;
            height: 140px;
            fill: none;
            stroke-width: 8;
            stroke: #e9ecef;
            stroke-dasharray: 377;
            stroke-dashoffset: 0;
        }

        .circular-progress svg circle.progress-circle {
            stroke: linear-gradient(135deg, #00a896 0%, #02c39a 100%);
            stroke: #00a896;
            stroke-dashoffset: calc(377 - (377 * 42) / 100);
            animation: progress 1s ease-out;
        }

        .percentage {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 32px;
            font-weight: 700;
            color: #00a896;
        }

        .progress-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .stat-item i {
            font-size: 28px;
            color: #00a896;
        }

        .stat-item strong {
            display: block;
            font-size: 20px;
            color: #333;
        }

        .stat-item span {
            color: #6c757d;
            font-size: 14px;
        }

        /* Category Progress */
        .category-progress {
            margin-top: 60px;
        }

        .progress-item {
            margin-bottom: 30px;
            padding: 25px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .progress-header h4 {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 18px;
        }

        .progress-header i {
            color: #00a896;
        }

        .progress-value {
            font-size: 24px;
            font-weight: 700;
            color: #00a896;
        }

        .progress-bar {
            height: 20px;
            background: #e9ecef;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 10px;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(135deg, #00a896 0%, #02c39a 100%);
            border-radius: 10px;
            transition: width 1s ease;
            animation: progressBar 1s ease;
        }

        .progress-desc {
            color: #6c757d;
            font-size: 14px;
        }

        /* Timeline */
        .timeline-wrapper {
            position: relative;
            max-width: 1000px;
            margin: 50px auto;
        }

        .timeline-line {
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #dee2e6;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 50px;
            display: flex;
            align-items: center;
        }

        .timeline-item:nth-child(even) {
            flex-direction: row-reverse;
        }

        .timeline-dot {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 20px;
            background: white;
            border: 4px solid #dee2e6;
            border-radius: 50%;
            z-index: 1;
        }

        .timeline-item.completed .timeline-dot {
            background: #28a745;
            border-color: #28a745;
        }

        .timeline-item.active .timeline-dot {
            background: #00a896;
            border-color: #00a896;
            animation: pulse 2s infinite;
        }

        .timeline-date {
            width: 48%;
            text-align: right;
            padding-right: 30px;
            font-weight: 700;
            color: #00a896;
        }

        .timeline-item:nth-child(even) .timeline-date {
            text-align: left;
            padding-left: 30px;
            padding-right: 0;
        }

        .timeline-content {
            width: 48%;
            padding: 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-left: 30px;
        }

        .timeline-item:nth-child(even) .timeline-content {
            margin-left: 0;
            margin-right: 30px;
        }

        .timeline-content h3 {
            margin-bottom: 10px;
            color: #333;
        }

        .timeline-content p {
            color: #6c757d;
            margin-bottom: 15px;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-badge.completed {
            background: #d4edda;
            color: #155724;
        }

        .status-badge.active {
            background: #00a896;
            color: white;
        }

        .status-badge.upcoming {
            background: #f8f9fa;
            color: #6c757d;
        }

        /* Subdivision Progress */
        .subdivision-tabs {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .sub-tab {
            padding: 12px 30px;
            background: white;
            border: 2px solid #dee2e6;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .sub-tab:hover {
            border-color: #00a896;
        }

        .sub-tab.active {
            background: linear-gradient(135deg, #00a896 0%, #02c39a 100%);
            color: white;
            border-color: transparent;
        }

        .sub-content {
            display: none;
        }

        .sub-content.active {
            display: block;
        }

        .sub-progress-header {
            display: grid;
            grid-template-columns: 200px 1fr auto;
            gap: 30px;
            align-items: center;
            padding: 30px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .sub-progress-header img {
            width: 100%;
            border-radius: 12px;
        }

        .sub-stats {
            display: flex;
            gap: 20px;
            margin-top: 15px;
        }

        .sub-stats span {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
            color: #6c757d;
        }

        .circle-progress-small {
            width: 100px;
            height: 100px;
            background: #f8f9fa;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .circle-progress-small span {
            font-size: 28px;
            font-weight: 700;
            color: #00a896;
        }

        .sub-progress-details {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 40px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .detail-item {
            padding: 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .detail-item h4 {
            margin-bottom: 10px;
            color: #333;
        }

        .mini-progress {
            height: 8px;
            background: #e9ecef;
            border-radius: 4px;
            margin: 10px 0;
        }

        .mini-fill {
            height: 100%;
            background: linear-gradient(135deg, #00a896 0%, #02c39a 100%);
            border-radius: 4px;
        }

        .progress-updates {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .progress-updates h4 {
            margin-bottom: 20px;
            color: #00a896;
        }

        .update-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .update-item {
            padding-bottom: 15px;
            border-bottom: 1px solid #e9ecef;
        }

        .update-item:last-child {
            border: none;
            padding-bottom: 0;
        }

        .update-date {
            display: inline-block;
            font-size: 12px;
            color: #6c757d;
            margin-bottom: 5px;
        }

        /* Infrastructure Progress */
        .infra-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .infra-card {
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .infra-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, rgba(0, 168, 150, 0.1) 0%, rgba(2, 195, 154, 0.1) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .infra-icon i {
            font-size: 32px;
            color: #00a896;
        }

        .infra-card h3 {
            margin-bottom: 20px;
            color: #333;
        }

        .progress-circle-wrapper {
            position: relative;
            width: 100px;
            height: 100px;
            margin: 0 auto 20px;
        }

        .progress-svg {
            width: 100px;
            height: 100px;
            transform: rotate(-90deg);
        }

        .progress-svg circle {
            fill: none;
            stroke-width: 6;
            stroke: #e9ecef;
            stroke-dasharray: 283;
        }

        .progress-svg circle.progress-stroke {
            stroke: #00a896;
        }

        .progress-circle-wrapper .percent {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            font-weight: 700;
            color: #00a896;
        }

        .infra-details {
            list-style: none;
            text-align: left;
            margin: 20px 0;
        }

        .infra-details li {
            padding: 8px 0;
            color: #6c757d;
            font-size: 14px;
        }

        .completion-date {
            background: #f8f9fa;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 13px;
            color: #00a896;
            font-weight: 600;
        }

        /* Live Updates */
        .updates-wrapper {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 40px;
            margin-bottom: 50px;
        }

        .live-feed {
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .feed-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: linear-gradient(135deg, #00a896 0%, #02c39a 100%);
            color: white;
        }

        .live-indicator {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 5px 15px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .pulse {
            display: inline-block;
            width: 8px;
            height: 8px;
            background: #fff;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.7);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(255, 255, 255, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0);
            }
        }

        .feed-list {
            padding: 20px;
            max-height: 400px;
            overflow-y: auto;
        }

        .feed-item {
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            margin-bottom: 15px;
            position: relative;
        }

        .feed-item.new::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: #00a896;
            border-radius: 4px 0 0 4px;
        }

        .feed-time {
            font-size: 12px;
            color: #6c757d;
        }

        .feed-badge {
            display: inline-block;
            padding: 3px 8px;
            background: #00a896;
            color: white;
            border-radius: 12px;
            font-size: 10px;
            font-weight: 600;
            margin: 8px 0;
        }

        .btn-load-updates {
            width: calc(100% - 40px);
            margin: 0 20px 20px;
            padding: 12px;
            background: #f8f9fa;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-load-updates:hover {
            background: #e9ecef;
        }

        /* Construction Gallery */
        .construction-gallery {
            background: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .construction-gallery h3 {
            margin-bottom: 20px;
            color: #333;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 20px;
        }

        .gallery-item {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
            opacity: 1;
        }

        .gallery-item img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-date {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 11px;
        }

        .btn-view-gallery {
            width: 100%;
            padding: 10px;
            background: linear-gradient(135deg, #00a896 0%, #02c39a 100%);
            color: white;
            border-radius: 8px;
            text-align: center;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s;
        }

        .btn-view-gallery:hover {
            transform: translateY(-2px);
        }

        /* Webcam Section */
        .webcam-section {
            margin-top: 50px;
        }

        .webcam-section h3 {
            margin-bottom: 30px;
            text-align: center;
            color: #333;
        }

        .webcam-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .webcam-feed {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .webcam-feed img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .webcam-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, transparent 100%);
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .cam-name {
            color: white;
            font-size: 12px;
            font-weight: 600;
        }

        .cam-time {
            color: #00ff00;
            font-size: 11px;
            font-weight: 600;
        }

        /* Progress Report */
        .report-box {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .report-content {
            display: flex;
            align-items: center;
            gap: 30px;
            flex: 1;
        }

        .report-content i {
            font-size: 48px;
            color: #dc3545;
        }

        .report-actions {
            display: flex;
            gap: 15px;
        }

        .btn-download,
        .btn-subscribe {
            padding: 15px 25px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-download {
            background: linear-gradient(135deg, #00a896 0%, #02c39a 100%);
            color: white;
        }

        .btn-subscribe {
            background: #eee;
            color: #333;
        }

        .btn-download:hover,
        .btn-subscribe:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        @media (max-width: 992px) {
            .progress-overview {
                grid-template-columns: 1fr;
            }

            .progress-stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .timeline-item {
                flex-direction: column !important;
            }

            .timeline-date,
            .timeline-content {
                width: 100%;
                text-align: center !important;
                padding: 20px !important;
                margin: 10px 0 !important;
            }

            .timeline-dot {
                position: relative;
                left: 0;
                transform: none;
                margin: 0 auto;
            }

            .timeline-line {
                display: none;
            }

            .infra-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .updates-wrapper {
                grid-template-columns: 1fr;
            }

            .webcam-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .report-box {
                flex-direction: column;
                text-align: center;
                gap: 30px;
            }
            .webcam-feed img {
                height: auto;
            }
        }

        @media (max-width: 768px) {
            .sub-progress-header {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .sub-progress-details {
                grid-template-columns: 1fr;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .infra-grid {
                grid-template-columns: 1fr;
            }

            .webcam-grid {
                grid-template-columns: 1fr;
            }

            @media (max-width: 480px) {
                .progress-stats {
                    grid-template-columns: 1fr;
                }

                .section-padding {
                    padding: 40px 0;
                }

                .report-actions {
                    width: 100%;
                    flex-wrap: wrap;
                }
                .btn-download, .btn-subscribe {
                    width: 100%;
                }
            }
        }
    </style>
    <!-- Schema for Progress -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "ConstructionProject",
            "name": "Vinhomes Green Paradise Construction",
            "description": "Tiến độ xây dựng siêu đô thị",
            "startDate": "2024-01-01",
            "expectedEndDate": "2035-12-31",
            "percentComplete": 42,
            "status": "On Schedule"
        }
</script>
@endsection

@section('page')
    <!-- Page Hero -->
    <section class="page-hero"
        style="background: linear-gradient(135deg, rgba(5,102,141,0.9) 0%, rgba(0,168,150,0.8) 100%), url('{{ asset('assets/images/photo-1541888946425-d81bb19240f5.jpeg') }}') center/cover;">
        <div class="container">
            <div class="page-hero-content">
                <h1 class="page-title">Tiến Độ Dự Án</h1>
                <p class="page-subtitle">Cập Nhật Xây Dựng Thời Gian Thực</p>
                <div class="breadcrumb">
                    <a href="/">Trang Chủ</a>
                    <span>/</span>
                    <span>Tiến Độ</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Overall Progress Section -->
    <section class="overall-progress section-padding">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">TỔNG QUAN TIẾN ĐỘ</span>
                <h2 class="section-title">Tiến Độ Tổng Thể<br><span>Dự Án Green Paradise</span></h2>
                <p class="section-desc">Cập nhật lần cuối: 25/09/2025 - 10:30 AM</p>
            </div>

            <div class="progress-overview">
                <div class="overall-stat">
                    <div class="circular-progress" data-percent="42">
                        <svg>
                            <circle cx="70" cy="70" r="60"></circle>
                            <circle cx="70" cy="70" r="60" class="progress-circle"></circle>
                        </svg>
                        <div class="percentage">
                            <span class="percent-number">42</span>%
                        </div>
                    </div>
                    <h3>Tiến Độ Toàn Dự Án</h3>
                    <p>Đúng kế hoạch</p>
                </div>

                <div class="progress-stats">
                    <div class="stat-item">
                        <i class="fas fa-calendar-check"></i>
                        <div>
                            <strong>Q4/2025</strong>
                            <span>Khởi công</span>
                        </div>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-hard-hat"></i>
                        <div>
                            <strong>1,245</strong>
                            <span>Công nhân</span>
                        </div>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-truck"></i>
                        <div>
                            <strong>156</strong>
                            <span>Thiết bị</span>
                        </div>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-home"></i>
                        <div>
                            <strong>Q4/2027</strong>
                            <span>Bàn giao</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Progress by Category -->
            <div class="category-progress">
                <div class="progress-item">
                    <div class="progress-header">
                        <h4><i class="fas fa-road"></i> Hạ Tầng Giao Thông</h4>
                        <span class="progress-value">68%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 68%"></div>
                    </div>
                    <p class="progress-desc">Hoàn thành 15/22km đường chính</p>
                </div>

                <div class="progress-item">
                    <div class="progress-header">
                        <h4><i class="fas fa-bolt"></i> Hệ Thống Điện & Nước</h4>
                        <span class="progress-value">55%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 55%"></div>
                    </div>
                    <p class="progress-desc">Lắp đặt trạm biến áp và đường ống chính</p>
                </div>

                <div class="progress-item">
                    <div class="progress-header">
                        <h4><i class="fas fa-water"></i> Paradise Lagoon</h4>
                        <span class="progress-value">35%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 35%"></div>
                    </div>
                    <p class="progress-desc">Đào hồ và xây dựng hệ thống lọc nước</p>
                </div>

                <div class="progress-item">
                    <div class="progress-header">
                        <h4><i class="fas fa-home"></i> Phân Khu The Haven Bay</h4>
                        <span class="progress-value">25%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 25%"></div>
                    </div>
                    <p class="progress-desc">Hoàn thành móng 125/500 căn</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="timeline-section section-padding bg-gray">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">LỊCH TRÌNH DỰ ÁN</span>
                <h2 class="section-title">Các Mốc<br><span>Quan Trọng</span></h2>
            </div>

            <div class="timeline-wrapper">
                <div class="timeline-line"></div>

                <div class="timeline-item completed">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">Q1/2024</div>
                    <div class="timeline-content">
                        <h3>Phê Duyệt Quy Hoạch</h3>
                        <p>Chính phủ phê duyệt quy hoạch 1/500 toàn dự án</p>
                        <span class="status-badge completed">Hoàn thành</span>
                    </div>
                </div>

                <div class="timeline-item completed">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">Q3/2024</div>
                    <div class="timeline-content">
                        <h3>Khởi Công Hạ Tầng</h3>
                        <p>Bắt đầu thi công hạ tầng giao thông và tiện ích</p>
                        <span class="status-badge completed">Hoàn thành</span>
                    </div>
                </div>

                <div class="timeline-item active">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">Q3/2025</div>
                    <div class="timeline-content">
                        <h3>Thi Công Paradise Lagoon</h3>
                        <p>Đào hồ và xây dựng hệ thống tuần hoàn nước biển</p>
                        <span class="status-badge active">Đang thực hiện</span>
                    </div>
                </div>

                <div class="timeline-item upcoming">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">Q4/2025</div>
                    <div class="timeline-content">
                        <h3>Khởi Công The Haven Bay</h3>
                        <p>Xây dựng 500 căn biệt thự biển phân khu đầu tiên</p>
                        <span class="status-badge upcoming">Sắp tới</span>
                    </div>
                </div>

                <div class="timeline-item upcoming">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">Q2/2026</div>
                    <div class="timeline-content">
                        <h3>Hoàn Thành Sân Golf</h3>
                        <p>Khai trương 2 sân golf 36 lỗ championship</p>
                        <span class="status-badge upcoming">Sắp tới</span>
                    </div>
                </div>

                <div class="timeline-item upcoming">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">Q4/2027</div>
                    <div class="timeline-content">
                        <h3>Bàn Giao Giai Đoạn 1</h3>
                        <p>Bàn giao The Haven Bay và tiện ích trung tâm</p>
                        <span class="status-badge upcoming">Sắp tới</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Subdivision Progress -->
    <section class="subdivision-progress section-padding">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">TIẾN ĐỘ PHÂN KHU</span>
                <h2 class="section-title">Chi Tiết<br><span>Từng Phân Khu</span></h2>
            </div>

            <div class="subdivision-tabs">
                <button class="sub-tab active" data-sub="haven">The Haven Bay</button>
                <button class="sub-tab" data-sub="green">The Green Bay</button>
                <button class="sub-tab" data-sub="paradise">The Paradise</button>
                <button class="sub-tab" data-sub="grand">The Grand Island</button>
            </div>

            <div class="subdivision-content">
                <!-- The Haven Bay -->
                <div class="sub-content active" id="haven">
                    <div class="sub-progress-header">
                        <img src="{{ asset('assets/images/photo-1512917774080-9991f1c4c750.jpeg') }}" alt="The Haven Bay">
                        <div class="sub-info">
                            <h3>The Haven Bay</h3>
                            <p>500 căn biệt thự biển cao cấp</p>
                            <div class="sub-stats">
                                <span><i class="fas fa-home"></i> 500 căn</span>
                                <span><i class="fas fa-ruler"></i> 300-500m²</span>
                                <span><i class="fas fa-calendar"></i> Bàn giao Q4/2027</span>
                            </div>
                        </div>
                        <div class="sub-overall">
                            <div class="circle-progress-small" data-percent="25">
                                <span>25%</span>
                            </div>
                        </div>
                    </div>

                    <div class="sub-progress-details">
                        <div class="detail-grid">
                            <div class="detail-item">
                                <h4>Pháp lý</h4>
                                <div class="mini-progress">
                                    <div class="mini-fill" style="width: 100%"></div>
                                </div>
                                <span>100% Hoàn thành</span>
                            </div>
                            <div class="detail-item">
                                <h4>San lấp</h4>
                                <div class="mini-progress">
                                    <div class="mini-fill" style="width: 85%"></div>
                                </div>
                                <span>85% Hoàn thành</span>
                            </div>
                            <div class="detail-item">
                                <h4>Móng</h4>
                                <div class="mini-progress">
                                    <div class="mini-fill" style="width: 25%"></div>
                                </div>
                                <span>125/500 căn</span>
                            </div>
                            <div class="detail-item">
                                <h4>Xây dựng</h4>
                                <div class="mini-progress">
                                    <div class="mini-fill" style="width: 5%"></div>
                                </div>
                                <span>Chuẩn bị khởi công</span>
                            </div>
                        </div>

                        <div class="progress-updates">
                            <h4>Cập nhật mới nhất</h4>
                            <div class="update-list">
                                <div class="update-item">
                                    <span class="update-date">24/09/2025</span>
                                    <p>Hoàn thành móng block A (25 căn)</p>
                                </div>
                                <div class="update-item">
                                    <span class="update-date">20/09/2025</span>
                                    <p>Lắp đặt hệ thống cấp thoát nước block B</p>
                                </div>
                                <div class="update-item">
                                    <span class="update-date">15/09/2025</span>
                                    <p>Khởi công đường nội khu 2.5km</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Other subdivisions (hidden by default) -->
                <div class="sub-content" id="green">
                    <div class="sub-progress-header">
                        <img src="{{ asset('assets/images/photo-1613490493576-7fde63acd811.jpeg') }}" alt="The Green Bay">
                        <div class="sub-info">
                            <h3>The Green Bay</h3>
                            <p>Townhouse và shophouse sinh thái</p>
                            <div class="sub-stats">
                                <span><i class="fas fa-home"></i> 1,200 căn</span>
                                <span><i class="fas fa-ruler"></i> 150-200m²</span>
                                <span><i class="fas fa-calendar"></i> Bàn giao Q2/2028</span>
                            </div>
                        </div>
                        <div class="sub-overall">
                            <div class="circle-progress-small" data-percent="15">
                                <span>15%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sub-content" id="paradise">
                    <div class="sub-progress-header">
                        <img src="{{ asset('assets/images/photo-1545324418-cc1a3fa10c00.jpeg') }}" alt="The Paradise">
                        <div class="sub-info">
                            <h3>The Paradise</h3>
                            <p>Căn hộ cao cấp và tòa tháp 108 tầng</p>
                            <div class="sub-stats">
                                <span><i class="fas fa-building"></i> 5,000 căn</span>
                                <span><i class="fas fa-ruler"></i> 45-150m²</span>
                                <span><i class="fas fa-calendar"></i> Bàn giao Q4/2029</span>
                            </div>
                        </div>
                        <div class="sub-overall">
                            <div class="circle-progress-small" data-percent="8">
                                <span>8%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sub-content" id="grand">
                    <div class="sub-progress-header">
                        <img src="{{ asset('assets/images/photo-1573052905904-34ad8c27f0cc.jpeg') }}"
                            alt="The Grand Island">
                        <div class="sub-info">
                            <h3>The Grand Island</h3>
                            <p>Biệt thự đảo VIP siêu sang</p>
                            <div class="sub-stats">
                                <span><i class="fas fa-crown"></i> 88 căn</span>
                                <span><i class="fas fa-ruler"></i> 1000m²+</span>
                                <span><i class="fas fa-calendar"></i> Bàn giao Q2/2030</span>
                            </div>
                        </div>
                        <div class="sub-overall">
                            <div class="circle-progress-small" data-percent="3">
                                <span>3%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Infrastructure Progress -->
    <section class="infrastructure-progress section-padding bg-gray">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">HẠ TẦNG & TIỆN ÍCH</span>
                <h2 class="section-title">Tiến Độ<br><span>Hạ Tầng Kỹ Thuật</span></h2>
            </div>

            <div class="infra-grid">
                <div class="infra-card">
                    <div class="infra-icon">
                        <i class="fas fa-bridge"></i>
                    </div>
                    <h3>Cầu Cần Giờ 7.3km</h3>
                    <div class="infra-progress">
                        <div class="progress-circle-wrapper">
                            <svg class="progress-svg">
                                <circle cx="50" cy="50" r="45"></circle>
                                <circle cx="50" cy="50" r="45" class="progress-stroke"
                                    style="stroke-dashoffset: calc(283 - (283 * 45) / 100)"></circle>
                            </svg>
                            <span class="percent">45%</span>
                        </div>
                    </div>
                    <ul class="infra-details">
                        <li>✓ Hoàn thành trụ cầu</li>
                        <li>⚡ Lắp dầm cầu (đang thực hiện)</li>
                        <li>○ Lắp mặt cầu</li>
                    </ul>
                    <p class="completion-date">Dự kiến hoàn thành: Q2/2027</p>
                </div>

                <div class="infra-card">
                    <div class="infra-icon">
                        <i class="fas fa-subway"></i>
                    </div>
                    <h3>Metro Tốc Độ Cao</h3>
                    <div class="infra-progress">
                        <div class="progress-circle-wrapper">
                            <svg class="progress-svg">
                                <circle cx="50" cy="50" r="45"></circle>
                                <circle cx="50" cy="50" r="45" class="progress-stroke"
                                    style="stroke-dashoffset: calc(283 - (283 * 30) / 100)"></circle>
                            </svg>
                            <span class="percent">30%</span>
                        </div>
                    </div>
                    <ul class="infra-details">
                        <li>✓ Thiết kế chi tiết</li>
                        <li>⚡ Giải phóng mặt bằng</li>
                        <li>○ Xây dựng nhà ga</li>
                    </ul>
                    <p class="completion-date">Dự kiến hoàn thành: Q4/2028</p>
                </div>

                <div class="infra-card">
                    <div class="infra-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3>Trạm Điện 500kV</h3>
                    <div class="infra-progress">
                        <div class="progress-circle-wrapper">
                            <svg class="progress-svg">
                                <circle cx="50" cy="50" r="45"></circle>
                                <circle cx="50" cy="50" r="45" class="progress-stroke"
                                    style="stroke-dashoffset: calc(283 - (283 * 60) / 100)"></circle>
                            </svg>
                            <span class="percent">60%</span>
                        </div>
                    </div>
                    <ul class="infra-details">
                        <li>✓ Xây dựng trạm biến áp</li>
                        <li>✓ Lắp đặt thiết bị</li>
                        <li>⚡ Kéo đường dây</li>
                    </ul>
                    <p class="completion-date">Dự kiến hoàn thành: Q1/2026</p>
                </div>

                <div class="infra-card">
                    <div class="infra-icon">
                        <i class="fas fa-tint"></i>
                    </div>
                    <h3>Nhà Máy Xử Lý Nước</h3>
                    <div class="infra-progress">
                        <div class="progress-circle-wrapper">
                            <svg class="progress-svg">
                                <circle cx="50" cy="50" r="45"></circle>
                                <circle cx="50" cy="50" r="45" class="progress-stroke"
                                    style="stroke-dashoffset: calc(283 - (283 * 70) / 100)"></circle>
                            </svg>
                            <span class="percent">70%</span>
                        </div>
                    </div>
                    <ul class="infra-details">
                        <li>✓ Hoàn thành xây dựng</li>
                        <li>✓ Lắp đặt hệ thống lọc</li>
                        <li>⚡ Test vận hành</li>
                    </ul>
                    <p class="completion-date">Dự kiến hoàn thành: Q4/2025</p>
                </div>

                <div class="infra-card">
                    <div class="infra-icon">
                        <i class="fas fa-solar-panel"></i>
                    </div>
                    <h3>Solar Farm 500MW</h3>
                    <div class="infra-progress">
                        <div class="progress-circle-wrapper">
                            <svg class="progress-svg">
                                <circle cx="50" cy="50" r="45"></circle>
                                <circle cx="50" cy="50" r="45" class="progress-stroke"
                                    style="stroke-dashoffset: calc(283 - (283 * 20) / 100)"></circle>
                            </svg>
                            <span class="percent">20%</span>
                        </div>
                    </div>
                    <ul class="infra-details">
                        <li>✓ Chuẩn bị mặt bằng</li>
                        <li>⚡ Lắp đặt tấm pin (Phase 1)</li>
                        <li>○ Kết nối lưới điện</li>
                    </ul>
                    <p class="completion-date">Dự kiến hoàn thành: Q3/2027</p>
                </div>

                <div class="infra-card">
                    <div class="infra-icon">
                        <i class="fas fa-wifi"></i>
                    </div>
                    <h3>Hệ Thống 5G</h3>
                    <div class="infra-progress">
                        <div class="progress-circle-wrapper">
                            <svg class="progress-svg">
                                <circle cx="50" cy="50" r="45"></circle>
                                <circle cx="50" cy="50" r="45" class="progress-stroke"
                                    style="stroke-dashoffset: calc(283 - (283 * 35) / 100)"></circle>
                            </svg>
                            <span class="percent">35%</span>
                        </div>
                    </div>
                    <ul class="infra-details">
                        <li>✓ Lắp đặt 50/150 trạm</li>
                        <li>⚡ Cáp quang backbone</li>
                        <li>○ Test coverage</li>
                    </ul>
                    <p class="completion-date">Dự kiến hoàn thành: Q2/2026</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Live Updates Section -->
    <section class="live-updates section-padding">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">REAL-TIME UPDATES</span>
                <h2 class="section-title">Cập Nhật<br><span>Trực Tiếp Từ Công Trường</span></h2>
            </div>

            <div class="updates-wrapper">
                <div class="live-feed">
                    <div class="feed-header">
                        <h3><i class="fas fa-rss"></i> Live Feed</h3>
                        <span class="live-indicator">
                            <span class="pulse"></span>
                            LIVE
                        </span>
                    </div>

                    <div class="feed-list">
                        <div class="feed-item new">
                            <span class="feed-time">10 phút trước</span>
                            <div class="feed-content">
                                <span class="feed-badge">HẠ TẦNG</span>
                                <p>Hoàn thành đổ bê tông đường chính khu A - đoạn 2.5km</p>
                            </div>
                        </div>

                        <div class="feed-item new">
                            <span class="feed-time">2 giờ trước</span>
                            <div class="feed-content">
                                <span class="feed-badge">THE HAVEN BAY</span>
                                <p>Bắt đầu thi công móng block C - 25 căn biệt thự</p>
                            </div>
                        </div>

                        <div class="feed-item">
                            <span class="feed-time">5 giờ trước</span>
                            <div class="feed-content">
                                <span class="feed-badge">PARADISE LAGOON</span>
                                <p>Lắp đặt hệ thống bơm tuần hoàn nước khu vực Tây</p>
                            </div>
                        </div>

                        <div class="feed-item">
                            <span class="feed-time">Hôm qua</span>
                            <div class="feed-content">
                                <span class="feed-badge">ĐIỆN NƯỚC</span>
                                <p>Test thành công trạm biến áp 110kV khu vực trung tâm</p>
                            </div>
                        </div>

                        <div class="feed-item">
                            <span class="feed-time">23/09/2025</span>
                            <div class="feed-content">
                                <span class="feed-badge">SÂN GOLF</span>
                                <p>Hoàn thành tạo hình 9 lỗ golf đầu tiên</p>
                            </div>
                        </div>
                    </div>

                    <button class="btn-load-updates">
                        <i class="fas fa-sync"></i> Tải thêm cập nhật
                    </button>
                </div>

                <div class="construction-gallery">
                    <h3><i class="fas fa-camera"></i> Hình Ảnh Mới Nhất</h3>
                    <div class="gallery-grid">
                        <div class="gallery-item">
                            <img src="{{ asset('assets/images/photo-1541888946425-d81bb19240f5.jpeg') }}"
                                alt="Construction">
                            <span class="gallery-date">Hôm nay</span>
                        </div>
                        <div class="gallery-item">
                            <img src="{{ asset('assets/images/photo-1504917595217-d4dc5ebe6122.jpeg') }}"
                                alt="Construction">
                            <span class="gallery-date">Hôm qua</span>
                        </div>
                        <div class="gallery-item">
                            <img src="{{ asset('assets/images/photo-1503387762-592deb58ef4e.jpeg') }}"
                                alt="Construction">
                            <span class="gallery-date">23/09</span>
                        </div>
                        <div class="gallery-item">
                            <img src="{{ asset('assets/images/photo-1517089596392-fb9a9033e05b.jpeg') }}"
                                alt="Construction">
                            <span class="gallery-date">22/09</span>
                        </div>
                    </div>
                    <a href="{{ route('gallery') }}" class="btn-view-gallery">
                        <i class="fas fa-images"></i> Xem thư viện ảnh
                    </a>
                </div>
            </div>

            <!-- Live Webcam -->
            <div class="webcam-section">
                <h3><i class="fas fa-video"></i> Camera Trực Tiếp Công Trường</h3>
                <div class="webcam-grid">
                    <div class="webcam-feed">
                        <img src="{{ asset('assets/images/photo-1541888946425-d81bb19240f5.jpeg') }}" alt="Webcam 1">
                        <div class="webcam-overlay">
                            <span class="cam-name">CAM 01 - Cổng chính</span>
                            <span class="cam-time">LIVE • 10:35 AM</span>
                        </div>
                    </div>
                    <div class="webcam-feed">
                        <img src="{{ asset('assets/images/photo-1504917595217-d4dc5ebe6122.jpeg') }}" alt="Webcam 2">
                        <div class="webcam-overlay">
                            <span class="cam-name">CAM 02 - Paradise Lagoon</span>
                            <span class="cam-time">LIVE • 10:35 AM</span>
                        </div>
                    </div>
                    <div class="webcam-feed">
                        <img src="{{ asset('assets/images/photo-1503387762-592deb58ef4e.jpeg') }}" alt="Webcam 3">
                        <div class="webcam-overlay">
                            <span class="cam-name">CAM 03 - The Haven Bay</span>
                            <span class="cam-time">LIVE • 10:35 AM</span>
                        </div>
                    </div>
                    <div class="webcam-feed">
                        <img src="{{ asset('assets/images/photo-1572981779307-38b8cabb2407.jpeg') }}" alt="Webcam 4">
                        <div class="webcam-overlay">
                            <span class="cam-name">CAM 04 - Sân Golf</span>
                            <span class="cam-time">LIVE • 10:35 AM</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Progress Report Download -->
    <section class="progress-report section-padding bg-gray">
        <div class="container">
            <div class="report-box">
                <div class="report-content">
                    <i class="fas fa-file-pdf"></i>
                    <div>
                        <h3>Báo Cáo Tiến Độ Chi Tiết</h3>
                        <p>Tải xuống báo cáo tiến độ tháng 09/2025 với đầy đủ hình ảnh và số liệu</p>
                    </div>
                </div>
                <div class="report-actions">
                    <button class="btn-download">
                        <i class="fas fa-download"></i>
                        <span>Tải Báo Cáo<br><small>PDF • 25MB</small></span>
                    </button>
                    <button class="btn-subscribe">
                        <i class="fas fa-envelope"></i>
                        <span>Đăng Ký Nhận<br><small>Báo cáo hàng tháng</small></span>
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        // Subdivision tabs
        const subTabs = document.querySelectorAll('.sub-tab');
        const subContents = document.querySelectorAll('.sub-content');

        subTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const target = this.getAttribute('data-sub');

                subTabs.forEach(t => t.classList.remove('active'));
                subContents.forEach(c => c.classList.remove('active'));

                this.classList.add('active');
                document.getElementById(target).classList.add('active');
            });
        });

        // Animate progress bars on scroll
        const progressBars = document.querySelectorAll('.progress-fill');
        const animateProgress = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const width = entry.target.style.width;
                    entry.target.style.width = '0';
                    setTimeout(() => {
                        entry.target.style.width = width;
                    }, 100);
                    observer.unobserve(entry.target);
                }
            });
        };

        const progressObserver = new IntersectionObserver(animateProgress, {
            threshold: 0.3
        });

        progressBars.forEach(bar => {
            progressObserver.observe(bar);
        });

        // Load more updates
        document.querySelector('.btn-load-updates').addEventListener('click', function() {
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Đang tải...';
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-check"></i> Đã tải hết';
                this.disabled = true;
            }, 1500);
        });


        $(function() {
            
        });
    </script>
@endsection
