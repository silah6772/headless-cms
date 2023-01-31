@extends('sharaCms.layout.default')
@section('content')
<section class="hero-sec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Free resources, articles, guides, and templates to help you grow your traffic and revenue.</h1>
            </div>
        </div>
        {{-- <div class="row bald">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-center">
                    <div class="bald-img">
                        <img src="./assets/images/pro1.png" alt="">
                    </div>
                    <div class="bald-content">
                        <p>Do you want me to do your marketing for you?</p>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="#">
                                <h6>Yes, I want Neil to do my marketing</h6>
                            </a>
                            <a href="#">
                                <h6>No thanks, I’d rather do it myself</h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</section>

<section class="hero-sec2">
    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-12 col-md-4">
                <a href="{{ $post['slug'] }}">
                    <div class="web-content">
                        @if ($post['post_image'])
                            <img src={{$post['post_image']}} alt="...">
                        @else
                            <img src={{asset("default-post-image")}} alt="...">
                        @endif
                        <h6>
                            {{ Illuminate\Support\Str::limit(strip_tags($post['title']), 50, $end='.....') }}
                        </h6>
                        <p>Published {{ date('Y-m-d h:i', strtotime($post['created_at'])) }}</p>
                    </div>
                </a>
            </div>
            @endforeach

            {{-- <div class="col-12 col-md-4">
                <a href="#">
                    <div class="web-content">
                        <img src="./assets/images/web-1.png" alt="">
                        <h6>
                            Let Me Help You Get More Google Traffic
                        </h6>
                    </div>
                </a>
            </div> --}}
            {{-- <div class="col-12 col-md-4">
                <a href="#">
                    <div class="web-content">
                        <img src="./assets/images/web-2.png" alt="">
                        <h6>
                            Save Time with Ubersuggest’s AI Writing Tool
                        </h6>
                        <p>56 comments</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="#">
                    <div class="web-content">
                        <img src="./assets/images/web-3.png" alt="">
                        <h6>
                            Examples of E-commerce SEO Done Right (and Mistakes To Avoid)
                        </h6>
                        <p>2 comments</p>
                    </div>
                </a>
            </div> --}}
        </div>
        <br><br>
        {{ $posts->links() }}

        {{-- <div class="row">
            <div class="col-12 col-md-4">
                <a href="#">
                    <div class="web-content">
                        <img src="./assets/images/web-3.png" alt="">
                        <h6>
                            The Dirty Little Secret About Social Media Marketing
                        </h6>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="#">
                    <div class="web-content">
                        <img src="./assets/images/web-1.png" alt="">
                        <h6>
                            What the New Google Search Essentials Tells Us About SEO
                        </h6>
                        <p>27 comments</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="#">
                    <div class="web-content">
                        <img src="./assets/images/web-2.png" alt="">
                        <h6>
                            The Biggest Social Media Opportunity That You Aren’t Leveraging
                        </h6>
                    </div>
                </a>
            </div>
        </div> --}}
    </div>
</section>

<section class="need-sec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Need guidance growing your website and traffic?</h1>
                <p>NP Digital will give you a customized growth plan for FREE</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="need-content">
                    <img src="./assets/images/need-1.png" alt="">
                    <h5>Site Audit</h5>
                    <p>We analyze your site, your industry, and your competitors to show you the opportunities.</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="need-content">
                    <img src="./assets/images/need-2.png" alt="">
                    <h5>Action Plan</h5>
                    <p>You get a detailed action plan for how we can help you achieve your traffic and conversion goals.
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="need-content">
                    <img src="./assets/images/need-3.png" alt="">
                    <h5>Quote</h5>
                    <p>We’ll give you a detailed pricing estimate with timelines. No obligation and no pressure.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="book-btn">
                <a href="#">
                    <button class="d-btn b-btn">
                        Book free consultation
                        <svg width="7" height="11" viewBox="0 0 7 11" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.5 9.14941L5.5 5.14941L1.5 1.14941" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="hero-sec2 mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <a href="#">
                    <div class="web-content">
                        <img src="./assets/images/web-1.png" alt="">
                        <h6>
                            A Better Way to Advertise on YouTube
                        </h6>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="#">
                    <div class="web-content">
                        <img src="./assets/images/web-2.png" alt="">
                        <h6>
                            Free Resources to Learn Instagram Marketing
                        </h6>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="#">
                    <div class="web-content">
                        <img src="./assets/images/web-3.png" alt="">
                        <h6>
                            How Can You Increase Your Domain Authority and How Long Does It Take?
                        </h6>
                        <p>6 comments</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4">
                <a href="#">
                    <div class="web-content">
                        <img src="./assets/images/web-3.png" alt="">
                        <h6>
                            The Easiest Way to Get Clients For Your Ad Agency
                        </h6>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="#">
                    <div class="web-content">
                        <img src="./assets/images/web-1.png" alt="">
                        <h6>
                            How to Create, Optimize, and Test Meta Ads (Formerly Facebook Ads)
                        </h6>
                        <p>60 comments</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="#">
                    <div class="web-content">
                        <img src="./assets/images/web-2.png" alt="">
                        <h6>
                            SEO Is Never Truly Done, Here are 7 Reasons Why
                        </h6>
                        <p>0 comments</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="accel-sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-5">
                <div class="d-flex justify-content-center smile-left">
                    <img src="./assets/images/smile-girl.png" alt="">
                </div>
            </div>
            <div class="col-12 col-md-7">
                <div class="accel-content">
                    <div class="d-flex align-items-center coma-content">
                        <img src="./assets/images/comas.png" alt="">
                        <h2>NP Accel created and implemented a great strategy.</h2>
                    </div>
                    <p>My business is 100% digital and in only 3 months they have completely changed my entire approach to writing content and the strategy behind it. I am now much more intentional and strategic which will only continue to support my
                        traffic and revenue.
                    </p>
                    <div class="d-flex align-items-center">
                        <div class="key-content">
                            <h5>Stephanie Kay</h5>
                            <h6>Owner of Stephanie Kay Nutrition</h6>
                        </div>
                        <div class="skimg">
                            <img src="./assets/images/sk.png" alt="">
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="#">
                            <button class="d-btn b-btn">
                                Get Similar Results
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="hero-sec2 mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <a href="#">
                    <div class="web-content">
                        <img src="./assets/images/web-1.png" alt="">
                        <h6>
                            7 Ways For Your Co-Workers to Help You With Marketing
                        </h6>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="#">
                    <div class="web-content">
                        <img src="./assets/images/web-2.png" alt="">
                        <h6>
                            What Is Find Places Through Reviews?
                        </h6>
                        <p>0 comments</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="#">
                    <div class="web-content">
                        <img src="./assets/images/web-3.png" alt="">
                        <h6>
                            TikTok Shopping: What You Need To Know
                        </h6>
                        <p>0 comments</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4">
                <a href="#">
                    <div class="web-content">
                        <img src="./assets/images/web-3.png" alt="">
                        <h6>
                            SEO vs PPC: Pros, Cons, & Everything In Between
                        </h6>
                        <p>8 comments</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="#">
                    <div class="web-content">
                        <img src="./assets/images/web-1.png" alt="">
                        <h6>
                            Rethink Your Marketing With This Unorthodox Concept
                        </h6>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="#">
                    <div class="web-content">
                        <img src="./assets/images/web-2.png" alt="">
                        <h6>
                            How To Use Twitter Campaign Planner
                        </h6>
                        <p>0 comments</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mt-4">
                    <a href="#">
                        <button class="d-btn b-btn l-btn">
                            LOAD MORE
                            <svg width="7" height="11" viewBox="0 0 7 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.5 9.14941L5.5 5.14941L1.5 1.14941" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="traffic-sec">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-9">
                <div class="foot-content">
                    <img src="./assets/images/pro2.png" alt="">
                    <div class="simple">
                        <h2>Do you want me and my team to help you with to grow your website traffic? <b>Simply
                                get in touch to get a FREE strategy call.</b> </h2>
                        <svg width="15" height="31" viewBox="0 0 15 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 15.1494L15 0.149414L15 30.1494L0 15.1494Z" fill="white"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="d-flex justify-content-end">
                    <div class="mt-2">
                        <a href="#">
                            <button class="d-btn b-btn c-btn">
                                BOOK A CALL
                                <svg width="7" height="11" viewBox="0 0 7 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.5 9.14941L5.5 5.14941L1.5 1.14941" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </a>
                        <div class="review d-flex align-items-center">
                            <img src="./assets/images/stars-review.png" alt="">
                            <div class="text">
                                <p>4.6/5<span>(292 Reviews)</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
