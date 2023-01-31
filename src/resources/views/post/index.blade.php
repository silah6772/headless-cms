<?php
use Illuminate\Support\Facades\File;
function getBladeFiles() {
    $directory = resource_path('views/sharacms/post/');
    $files = File::allFiles($directory);
    $bladeFiles = array_filter($files, function ($file) {
        return strpos($file->getFilename(), '.blade.php') !== false && $file->getFilename() !== 'index.blade.php';
    });
    return array_map(function ($file) {
        return str_replace('.blade','', pathinfo($file->getFilename(), PATHINFO_FILENAME));
    }, $bladeFiles);
}
$file_names = getBladeFiles();
$body = htmlspecialchars_decode($post->body);
$body = preg_replace_callback("/\[(.*?)\]/s", function($matches) {
    $content = $matches[1];
    if (preg_match("/^<.+>$/", $content)) {
        return $content;
    } else {
        return view("sharacms.post.$content")->render();
    }
}, $body);
$body = preg_replace_callback("/(\[.*?\])/", function($matches) {
    return htmlspecialchars_decode($matches[1]);
}, $body);

?>
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/responsive-style.css">
    <title>Home-2</title>
</head>
<body>
<section class="nav-sec nav-sec-2">
    <nav class="navbar navbar-expand-md bottom-nav">
        <div class="container site-logo">
            <a class="nav-logo" aria-label="" href="#">
                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 364.6 112.96"><defs><style>.cls-1{fill:#fff;}</style></defs><path class="cls-1" d="M0,36.78C15.81,24.51,31.54,12.15,47.42,0,53,4.44,58.69,8.75,64.34,13.1,69.93,8.73,75.54,4.41,81.1,0c16,12.22,32,24.6,47.92,36.92v60H111.84c0,5.35,0,10.71,0,16.06h-95c-.13-5.35,0-10.71-.06-16.07-5.58,0-11.16.06-16.74,0C.06,76.82,0,56.8,0,36.78Zm7.11,3.77c.08,16.3-.08,32.59.08,48.88,3.17,0,6.34-.11,9.51-.09q0-19.75,0-39.51c2.32-1.71,4.69-3.34,7.13-4.84q0,22.17,0,44.35c3.31,0,6.63,0,9.94,0,0-17.69-.1-35.37,0-53Q46,27,58.17,17.75C54.53,15,51,11.93,47.25,9.44,33.85,19.77,20.55,30.23,7.14,40.55ZM41,40.77c.2,16.19,0,32.38,0,48.57,15.61,0,31.21,0,46.82.06.2-16.2,0-32.41.06-48.61C81.6,36,75.35,31,68.93,26.26c1.94-1.74,3.94-3.41,6-5,12.35,9.48,24.52,19.19,36.9,28.63V89.34h9.7q0-24.52,0-49.06C107.9,30.19,94.67,19.58,81.14,9.35,67.8,19.87,54.21,30.08,41,40.77Zm54.07,5.59V96.88H55.48c-10.54,0-21.08-.09-31.61.24,0,2.88,0,5.76,0,8.64q40.47-.27,80.94,0,0-25.82,0-51.63C101.73,51.35,98.43,48.82,95.07,46.36Z"/><path class="cls-1" d="M141.84,44.37c1.94,0,3.89,0,5.83,0,.08,5.26,0,10.53,0,15.8h19.09V44.37h5.8V80.69h-5.8V65.61H147.7c0,5,0,10,0,15.09h-5.86Z"/><path class="cls-1" d="M270.19,44.75c1.95-1.29,5.17,0,5.21,2.45a3.35,3.35,0,0,1-4.49,3.59C268.31,50.11,267.9,46,270.19,44.75Z"/><path class="cls-1" d="M307.79,80.7V44.37h5.4c0,4.78,0,9.57,0,14.36,3.89-5.57,13.81-5.48,17.13.62A15.29,15.29,0,0,1,332,66.69c0,4.66,0,9.32,0,14-1.8.06-3.61,0-5.41,0,0-4.66,0-9.32,0-14,0-2.07-.58-4.32-2.27-5.65a6.91,6.91,0,0,0-9.08.79,7.64,7.64,0,0,0-2.05,5.27c0,4.52,0,9,0,13.56Z"/><path class="cls-1" d="M53.23,50H63.57c0,3.29,0,6.57,0,9.86H53.24C53.23,56.58,53.24,53.29,53.23,50Z"/><path class="cls-1" d="M65.42,50H75.81c0,3.29,0,6.58,0,9.87H65.42C65.41,56.58,65.43,53.29,65.42,50Z"/><path class="cls-1" d="M186.3,55.49c4.79-1.94,11.31-1.2,14.22,3.52,0-1.31.06-2.61.12-3.91h5.26V80.69h-5.15c-.1-1.35-.19-2.71-.24-4-1.82,3.32-5.82,4.85-9.46,4.69a12.41,12.41,0,0,1-10.28-5.27c-2.27-3.41-2.59-7.8-1.87-11.75A12,12,0,0,1,186.3,55.49Zm4,4.13a7.89,7.89,0,0,0-6.08,5.72A9.22,9.22,0,0,0,186,73.63a8.63,8.63,0,0,0,12,.52,9.27,9.27,0,0,0,.83-11.54C197,59.9,193.4,59,190.34,59.62Z"/><path class="cls-1" d="M283.89,56.43a15.42,15.42,0,0,1,17.46,1.4c-1,1.2-2,2.39-3.06,3.58A10.79,10.79,0,0,0,289,59.25c-1.37.28-2.94,1.23-2.88,2.8,0,1.37,1.27,2.26,2.45,2.63,3.7,1,7.84.63,11.19,2.82,2.64,1.74,3.28,5.42,2.33,8.27s-4,4.79-7,5.36c-5.36,1-11.52-.15-15.23-4.4.95-1.28,1.88-2.56,2.83-3.83a12.22,12.22,0,0,0,11,3.59c1.63-.31,3.53-1.34,3.46-3.25,0-2.23-2.58-2.83-4.34-3.13-3.39-.43-7.12-.69-9.85-3C279.69,64.4,280.16,58.51,283.89,56.43Z"/><path class="cls-1" d="M344.48,55.71c4.87-2.21,11.72-1.58,14.73,3.31,0-1.31.07-2.62.12-3.92h5.27V80.69h-5.15c-.1-1.36-.2-2.71-.25-4.07a9.47,9.47,0,0,1-6.62,4.51,13.28,13.28,0,0,1-12.07-3.74c-3.17-3.43-3.72-8.5-2.94-12.93A12,12,0,0,1,344.48,55.71Zm4.63,3.89a7.88,7.88,0,0,0-6.17,5.82,9.2,9.2,0,0,0,1.56,8c3,3.79,9.51,3.94,12.65.24A9.29,9.29,0,0,0,357,61.92,8.52,8.52,0,0,0,349.11,59.6Z"/><path class="cls-1" d="M212.62,55.13c1.8-.05,3.6,0,5.4,0q0,6.51,0,13a9.12,9.12,0,0,0,1.24,5.19c2.23,3.52,7.94,3.79,10.66.72a7.8,7.8,0,0,0,2.1-5.47q0-6.72,0-13.44h5.4q0,12.84,0,25.65h-4.84c-.12-1.24-.22-2.49-.29-3.73A11.71,11.71,0,0,1,225,81a10.51,10.51,0,0,1-9.79-3.66,13.5,13.5,0,0,1-2.57-8.49C212.6,64.28,212.66,59.71,212.62,55.13Z"/><path class="cls-1" d="M243.44,55.1h20.19c-.11,1,.33,2.17-.35,3q-6.22,8.66-12.46,17.29h12.93c0,1.76,0,3.52,0,5.29H242.57V78.42q6.57-9.23,13.17-18.44h-12.3Z"/><path class="cls-1" d="M269.32,55q2.7,0,5.4,0v25.7h-5.4Z"/><path class="cls-1" d="M53.24,61.66H63.57q0,4.94,0,9.86H53.24Q53.22,66.6,53.24,61.66Z"/><path class="cls-1" d="M65.42,61.66H75.81c0,3.29,0,6.58,0,9.87q-5.17,0-10.38,0C65.41,68.24,65.42,65,65.42,61.66Z"/>
                </svg>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px">
                    <path
                        d="M 0 7.5 L 0 12.5 L 50 12.5 L 50 7.5 Z M 0 22.5 L 0 27.5 L 50 27.5 L 50 22.5 Z M 0 37.5 L 0 42.5 L 50 42.5 L 50 37.5 Z" />
                </svg>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @foreach($main_menus as $menu_item)
                        @if(!$menu_item['parent_id'])
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ $menu_item['url'] }}">{{ $menu_item['label'] }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <ul class="navbar-nav navbar-nav1 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-btn2" href="{{ $workspace['action_url'] }}">
                            <button class="s-btn" type="button">{{ $workspace['action_label'] }}</button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>
<section class="hope-sec">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-7">
                @include('sharacms.post.banner_get_support')
                <hr class="hr1">
                <div class="use">
                    <h1>{{ $post->title }}</h1>
                    <p><a href="#">Blog</a> / {{ $post->title }}</p>
                </div>
                <div class="mb-4">
                    <img src={{$post->post_image}} >
                </div>
                <div class="para-content">
                    @foreach ($widgets as $key=> $widget)
                        @if($key =='top')
                            @foreach($widget as $widget)
                                @if($widget->widget_type =='custom')
                                    @include("sharacms.post.".$widget->title)
                                @else
                                    <div class="traffic  {{ $widget->css_class }}">
                                        <div class="more">

                                            <hr class="hr1 hr2">
                                            <p>{!!  strip_tags($widget->title) !!}</p>
                                            <span>
                                                    {!!  $widget->body !!}
                                                </span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    {!! $body !!}
                    @foreach ($widgets as $key=> $widget)
                        @if($key =='bottom')
                            @foreach($widget as $widget)
                                @if($widget->widget_type =='custom')
                                    @include("sharacms.post.".$widget->title)
                                @else
                                    <div class="traffic  {{ $widget->css_class }}">
                                        <div class="more">

                                            <hr class="hr1 hr2">
                                            <p>{!!  strip_tags($widget->title) !!}</p>
                                            <span>
                                                    {!!  $widget->body !!}
                                                </span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>
                <hr class="mt-5">
                @include('sharacms.post.share-social')
            </div>
            <div class="col-12 col-md-5 hidden-xs">
                @foreach ($widgets as $key=> $widget)
                    @if($key =='left')
                        @foreach($widget as $widget)
                            @if($widget->widget_type =='custom')
                                @include("sharacms.post.".$widget->title)
                            @else
                                <div class="traffic  {{ $widget->css_class }}">
                                    <div class="more">

                                        <hr class="hr1 hr2">
                                        <p>{!!  strip_tags($widget->title) !!}</p>
                                        <span>
                                                    {!!  $widget->body !!}
                                                </span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
@include('sharacms.post.speak-footer')

<footer class="footer-sec">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 popular-line">
                <h5>Popular Features</h5>
                <div class="d-flex align-items-start justify-content-between">
                    <div class="foot-ul-1">
                        <ul class="mt-3">
                            <li>
                                <a href="#">
                                    Free Meeting Scheduler App
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Social Media Tools
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Email Tracking Software
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Sales Email Automation
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Ads Software
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Email Marketing Software
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Lead Management Software
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Pipeline Management Tools
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Free Website Builder
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="foot-ul-1">
                        <ul class="mt-3">
                            <li>
                                <a href="#">
                                    Sales Email Templates
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Help Desk Software
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Free Online Form Builder
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Free Chatbot Builder
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Free Live Chat Software
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Marketing Analytics
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Free Landing Page Builder
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Free Web Hosting
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8 tool-line">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="foot-ul-1">
                        <h5>Free Tools</h5>
                        <ul class="mt-3">
                            <li>
                                <a href="#">
                                    Website Grader
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Make My Persona
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Email Signature Generator
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog Ideas Generator
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Invoice Template Generator
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Marketing Plan Generator
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Free Business Templates
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Industry Benchmark Data
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Software Comparisons Library
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Website Themes & Templates
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="foot-ul-1">
                        <h5>Company</h5>
                        <ul class="mt-3">
                            <li>
                                <a href="#">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Careers
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Management Team
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Board of Directors
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Investor Relations
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="foot-ul-1">
                        <h5>Customers</h5>
                        <ul class="mt-3">
                            <li>
                                <a href="#">
                                    Customer Support
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Join a Local User Group
                                </a>
                            </li>
                        </ul>
                        <h5 class="partner-1">Partners</h5>
                        <ul class="mt-3">
                            <li>
                                <a href="#">
                                    All Partner Programs
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Solutions Partner Program
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    App Partner Program
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    HubSpot for Startups
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Affiliate Program
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="socials-foot">
                    <a href="#">
                        <img src="./assets/images/fb.png" alt="">
                    </a>
                    <a href="#">
                        <img src="./assets/images/insta.png" alt="">
                    </a>
                    <a href="#">
                        <img src="./assets/images/youtube.png" alt="">
                    </a>
                    <a href="#">
                        <img src="./assets/images/tweet.png" alt="">
                    </a>
                    <a href="#">
                        <img src="./assets/images/linkdin.png" alt="">
                    </a>
                    <a href="#">
                        <img src="./assets/images/mmm.png" alt="">
                    </a>
                    <a href="#">
                        <img src="./assets/images/tiktok.png" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="foot-logo-end">
                    <img src="./assets/images/foot-logo.png" alt="">
                    <p>© 2022, by Neil Patel Digital, LLC</p>
                </div>
                <div class="last-ul-foot">
                    <ul>
                        <li class="last-foot-li">
                            <a href="#">
                                Legal Stuff
                            </a>
                        </li>
                        <li class="last-foot-li">
                            <a href="#">
                                Privacy Policy
                            </a>
                        </li>
                        <li class="last-foot-li">
                            <a href="#">
                                Security
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script>
    $(function(){
        var stickyHeaderTop = $('#stick-col').offset().top;
        var height = $('#stick-col').height() + 62;
        var stickyHeaderTop1 = $('.speak-footer').offset().top - height;
        var left1 = $('.traffic-2').offset().left;
        var width = $('.traffic-2').width() + 62;

        $(window).scroll(function(){
            if( $(window).scrollTop() > stickyHeaderTop && $(window).scrollTop() < stickyHeaderTop1 ) {
                $('#stick-col').css({position: 'fixed', left: left1, width: width}).addClass('stick');
            } else if($(window).scrollTop() < stickyHeaderTop || $(window).scrollTop() > stickyHeaderTop1) {
                $('#stick-col').css({position: 'static', left: 'initial', width: width}).removeClass('stick');
            }
        });
    });
</script>
</body>
</html>
