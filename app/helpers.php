<?php

function settings($key = null, $default = null)
{
    if ($key === null) {
        return app(App\Settings::class);
    }

    return app(App\Settings::class)->get($key, $default);
}

function formatDate($date) {
    return $date->setTimezone('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
}

if (! function_exists('asset_v')) {
    function asset_v($url)
    {
        if (config('app.env') === 'local') {
            $version = uniqid();
        } else {
            $version = config('app.asset_version', 1);
        }
        $version = uniqid();

        return asset($url).'?v='.$version;
    }
}

if (! function_exists('getListFeature')) {
    function getListFeature($feature = null)
    {
        $features = [
            1 => 'Free WiFi',
            2 => 'Free Parking',
            3 => 'Pet Friendly',
            4 => 'Online Ordering',
            5 => 'Group Visits',
            6 => 'Air Conditioned'
        ];

        if ($feature) {
            return $features[$feature];
        }

        return $features;
    }
}

if (! function_exists('human_time')) {
    function human_time($datetime) {
        $time = \Carbon\Carbon::parse($datetime);
        $diffInSeconds = $time->diffInSeconds();

        if ($diffInSeconds < 60) return 'Vừa xong';
        if ($time->diffInMinutes() < 60) return $time->diffInMinutes() . ' phút trước';
        if ($time->diffInHours() < 24) return $time->diffInHours() . ' giờ trước';
        return $time->diffInDays() . ' ngày trước';
    }
}

if (!function_exists('generate_toc')) {
    function generate_toc($content)
    {
        $dom = new DOMDocument();
        libxml_use_internal_errors(true); // tránh warning HTML
        $dom->loadHTML('<?xml encoding="utf-8" ?>' . $content);

        $xpath = new DOMXPath($dom);
        $headings = $xpath->query('//h2 | //h3 | //h4');

        $toc = '<ul class="toc-list">';
        $i = 1;

        foreach ($headings as $heading) {
            // Tạo id duy nhất từ số thứ tự + slug từ text
            $slug = \Illuminate\Support\Str::slug($heading->nodeValue);
            $id = 'heading-' . $i++ . '-' . $slug;

            // Thêm id vào heading
            $heading->setAttribute('id', $id);

            // Thêm item vào TOC
            $toc .= '<li class="toc-item toc-' . strtolower($heading->nodeName) . '">';
            $toc .= '<a href="#' . $id . '">' . $heading->nodeValue . '</a>';
            $toc .= '</li>';
        }

        $toc .= '</ul>';

        // Xuất lại content (có id trong heading)
        $body = $dom->getElementsByTagName('body')->item(0);
        $newContent = '';
        foreach ($body->childNodes as $child) {
            $newContent .= $dom->saveHTML($child);
        }

        return [
            'toc' => $toc,
            'content' => $newContent
        ];
    }
}