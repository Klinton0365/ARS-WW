@extends('layouts.master')

@section('content')
    <!-- Storytelling Scroll Hero Start -->
    <style>
        /* ========== STORYTELLING SCROLL HERO ========== */
        .story-hero {
            position: relative;
            background: #1E1E1E;
        }

        /* Sticky viewport container */
        .story-hero__sticky {
            position: sticky;
            top: 0;
            height: 100vh;
            overflow: hidden;
        }

        /* Scroll spacer - 4 scenes x 100vh each */
        .story-hero__spacer {
            height: 400vh;
            position: relative;
        }

        /* --- Scene panels --- */
        .story-scene {
            position: absolute;
            inset: 0;
            transition: opacity 0.1s linear;
            will-change: opacity;
        }

        .story-scene__bg {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            transform: scale(1.1);
            will-change: transform;
        }

        .story-scene--1 .story-scene__bg {
            background-image: url('https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=1920&q=80&auto=format');
            filter: brightness(0.35) saturate(0.9) contrast(1.05);
        }

        .story-scene--2 .story-scene__bg {
            background-image: url('https://images.unsplash.com/photo-1622021142947-da7dedc7c39a?w=1920&q=80&auto=format');
            filter: brightness(0.38) saturate(0.95) contrast(1.05);
        }

        .story-scene--3 .story-scene__bg {
            background-image: url('https://images.unsplash.com/photo-1558618666-fcd25c85f82e?w=1920&q=80&auto=format');
            filter: brightness(0.38) saturate(0.9) contrast(1.05);
        }

        .story-scene--4 .story-scene__bg {
            background-image: url('https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?w=1920&q=80&auto=format');
            filter: brightness(0.45) saturate(1.2) contrast(1.05);
        }

        .story-scene__overlay {
            position: absolute;
            inset: 0;
        }

        .story-scene--1 .story-scene__overlay {
            background: linear-gradient(135deg, rgba(30, 30, 30, 0.6) 0%, rgba(60, 40, 20, 0.4) 100%);
        }

        .story-scene--2 .story-scene__overlay {
            background: linear-gradient(180deg, rgba(30, 30, 30, 0.5) 0%, rgba(80, 50, 20, 0.35) 100%);
        }

        .story-scene--3 .story-scene__overlay {
            background: linear-gradient(225deg, rgba(30, 30, 30, 0.5) 0%, rgba(50, 35, 15, 0.4) 100%);
        }

        .story-scene--4 .story-scene__overlay {
            background: linear-gradient(180deg, rgba(20, 15, 10, 0.3) 0%, rgba(30, 30, 30, 0.5) 100%);
        }

        /* --- Cinematic vignette --- */
        .story-hero__vignette {
            position: absolute;
            inset: 0;
            z-index: 3;
            pointer-events: none;
            box-shadow: inset 0 0 180px rgba(0, 0, 0, 0.45);
        }

        /* --- Light rays through windows --- */
        .story-hero__rays {
            position: absolute;
            inset: 0;
            z-index: 2;
            pointer-events: none;
            overflow: hidden;
        }

        .story-ray {
            position: absolute;
            top: -20%;
            width: 120px;
            height: 140%;
            background: linear-gradient(180deg, rgba(200, 155, 109, 0.08) 0%, transparent 80%);
            transform-origin: top center;
            opacity: 0;
            animation: rayPulse 10s ease-in-out infinite;
        }

        .story-ray--1 {
            left: 15%;
            transform: rotate(15deg);
            animation-delay: 0s;
            width: 100px;
        }

        .story-ray--2 {
            left: 30%;
            transform: rotate(8deg);
            animation-delay: 3s;
            width: 80px;
        }

        .story-ray--3 {
            right: 20%;
            transform: rotate(-12deg);
            animation-delay: 6s;
            width: 110px;
        }

        .story-ray--4 {
            right: 5%;
            transform: rotate(-20deg);
            animation-delay: 1.5s;
            width: 70px;
        }

        @keyframes rayPulse {

            0%,
            100% {
                opacity: 0;
            }

            30% {
                opacity: 0.6;
            }

            70% {
                opacity: 0.4;
            }
        }

        /* --- Dust particles --- */
        .story-hero__dust {
            position: absolute;
            inset: 0;
            z-index: 4;
            pointer-events: none;
        }

        .story-dust {
            position: absolute;
            background: #C89B6D;
            border-radius: 50%;
            opacity: 0;
            animation: storyDustFloat linear infinite;
        }

        .story-dust:nth-child(1) {
            width: 3px;
            height: 3px;
            left: 8%;
            top: 85%;
            animation-duration: 14s;
            animation-delay: 0s;
        }

        .story-dust:nth-child(2) {
            width: 4px;
            height: 4px;
            left: 22%;
            top: 92%;
            animation-duration: 11s;
            animation-delay: 2s;
        }

        .story-dust:nth-child(3) {
            width: 2px;
            height: 2px;
            left: 38%;
            top: 80%;
            animation-duration: 16s;
            animation-delay: 4s;
        }

        .story-dust:nth-child(4) {
            width: 5px;
            height: 5px;
            left: 55%;
            top: 95%;
            animation-duration: 10s;
            animation-delay: 1s;
        }

        .story-dust:nth-child(5) {
            width: 3px;
            height: 3px;
            left: 70%;
            top: 88%;
            animation-duration: 13s;
            animation-delay: 3s;
        }

        .story-dust:nth-child(6) {
            width: 2px;
            height: 2px;
            left: 85%;
            top: 90%;
            animation-duration: 15s;
            animation-delay: 5s;
        }

        .story-dust:nth-child(7) {
            width: 4px;
            height: 4px;
            left: 45%;
            top: 78%;
            animation-duration: 12s;
            animation-delay: 7s;
        }

        .story-dust:nth-child(8) {
            width: 3px;
            height: 3px;
            left: 92%;
            top: 96%;
            animation-duration: 9s;
            animation-delay: 0.5s;
        }

        .story-dust:nth-child(9) {
            width: 2px;
            height: 2px;
            left: 15%;
            top: 75%;
            animation-duration: 17s;
            animation-delay: 6s;
        }

        .story-dust:nth-child(10) {
            width: 3px;
            height: 3px;
            left: 62%;
            top: 82%;
            animation-duration: 11s;
            animation-delay: 8s;
        }

        @keyframes storyDustFloat {
            0% {
                transform: translateY(0) translateX(0) rotate(0deg);
                opacity: 0;
            }

            8% {
                opacity: 0.5;
            }

            50% {
                opacity: 0.25;
            }

            100% {
                transform: translateY(-110vh) translateX(25px) rotate(540deg);
                opacity: 0;
            }
        }

        /* --- Wood grain overlay --- */
        .story-hero__grain {
            position: absolute;
            inset: 0;
            z-index: 5;
            pointer-events: none;
            opacity: 0.04;
            background: repeating-linear-gradient(87deg,
                    transparent, transparent 3px,
                    rgba(200, 155, 109, 0.2) 3px,
                    rgba(200, 155, 109, 0.2) 5px);
            animation: storyGrain 14s linear infinite;
        }

        @keyframes storyGrain {
            0% {
                background-position: 0 0;
            }

            100% {
                background-position: 350px 180px;
            }
        }

        /* --- Progress bar (horizontal, top) --- */
        .story-hero__progress {
            position: absolute;
            top: 0;
            left: 0;
            height: 3px;
            background: linear-gradient(90deg, #C89B6D, #E8C9A0);
            z-index: 20;
            width: 0%;
            transition: width 0.1s linear;
        }

        /* --- Scene step indicators (right side) --- */
        .story-hero__steps {
            position: absolute;
            right: 30px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 15;
            display: flex;
            flex-direction: column;
            gap: 20px;
            align-items: center;
        }

        .story-step {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 2px solid rgba(200, 155, 109, 0.3);
            background: transparent;
            transition: all 0.5s ease;
            position: relative;
            cursor: default;
        }

        .story-step.active {
            border-color: #C89B6D;
            background: #C89B6D;
            box-shadow: 0 0 15px rgba(200, 155, 109, 0.4);
        }

        .story-step__label {
            position: absolute;
            right: 24px;
            top: 50%;
            transform: translateY(-50%);
            white-space: nowrap;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.65rem;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: rgba(200, 155, 109, 0);
            transition: color 0.4s ease;
        }

        .story-step.active .story-step__label {
            color: rgba(200, 155, 109, 0.7);
        }

        .story-steps__line {
            width: 1px;
            height: 16px;
            background: rgba(200, 155, 109, 0.15);
        }

        /* --- Scene text content --- */
        .story-scene__content {
            position: absolute;
            inset: 0;
            z-index: 10;
            display: flex;
            align-items: center;
            pointer-events: none;
        }

        .story-scene__text {
            padding: 0 60px;
            max-width: 600px;
            pointer-events: auto;
        }

        .story-scene__step-label {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: #C89B6D;
            margin-bottom: 20px;
        }

        .story-scene__step-num {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: 2px solid rgba(200, 155, 109, 0.4);
            font-size: 0.7rem;
            color: #C89B6D;
        }

        .story-scene__heading {
            font-family: 'Montserrat', sans-serif;
            font-size: clamp(2rem, 4vw, 3.2rem);
            font-weight: 800;
            color: #F5F5F5;
            line-height: 1.15;
            margin-bottom: 20px;
            text-shadow: 0 4px 40px rgba(0, 0, 0, 0.6);
            letter-spacing: -0.5px;
        }

        .story-scene__desc {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.05rem;
            font-weight: 300;
            color: rgba(245, 245, 245, 0.7);
            line-height: 1.8;
            max-width: 480px;
            letter-spacing: 0.2px;
        }

        /* --- Center content (headline + CTA on scene 4) --- */
        .story-scene--4 .story-scene__content {
            justify-content: center;
        }

        .story-scene--4 .story-scene__text {
            text-align: center;
            max-width: 740px;
        }

        .story-hero__title {
            font-family: 'Montserrat', sans-serif;
            font-size: clamp(2.8rem, 6vw, 5.5rem);
            font-weight: 900;
            color: #F5F5F5;
            line-height: 1.05;
            margin-bottom: 24px;
            text-shadow: 0 6px 50px rgba(0, 0, 0, 0.6);
            letter-spacing: -1px;
        }

        .story-hero__title em {
            font-style: normal;
            background: linear-gradient(135deg, #C89B6D, #E8C9A0, #C89B6D);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: storyGradient 6s ease-in-out infinite;
        }

        @keyframes storyGradient {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        .story-hero__subtitle {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.2rem;
            font-weight: 300;
            color: rgba(245, 245, 245, 0.7);
            line-height: 1.8;
            margin-bottom: 40px;
            letter-spacing: 0.3px;
        }

        .story-hero__actions {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 50px;
        }

        .story-btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 38px;
            background: linear-gradient(135deg, #C89B6D, #A07B50);
            color: #fff;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
            border: none;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            box-shadow: 0 4px 25px rgba(200, 155, 109, 0.35);
        }

        .story-btn-primary:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 12px 40px rgba(200, 155, 109, 0.55);
            color: #fff;
            background: linear-gradient(135deg, #D4A87A, #B08B5E);
        }

        .story-btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 38px;
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            color: #F5F5F5;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
            border: 2px solid rgba(245, 245, 245, 0.2);
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .story-btn-secondary:hover {
            border-color: #C89B6D;
            color: #C89B6D;
            transform: translateY(-3px);
            background: rgba(200, 155, 109, 0.1);
        }

        /* Trust bar */
        .story-hero__trust {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 36px;
        }

        .story-trust__item {
            text-align: center;
        }

        .story-trust__value {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.8rem;
            font-weight: 800;
            color: #C89B6D;
            line-height: 1;
        }

        .story-trust__label {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.7rem;
            font-weight: 400;
            color: rgba(245, 245, 245, 0.5);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 6px;
        }

        .story-trust__divider {
            width: 1px;
            height: 36px;
            background: rgba(245, 245, 245, 0.12);
        }

        /* --- Scroll prompt (scene 1 only) --- */
        .story-hero__scroll-hint {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 15;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            transition: opacity 0.4s ease;
        }

        .story-scroll__mouse {
            width: 22px;
            height: 34px;
            border: 2px solid rgba(200, 155, 109, 0.35);
            border-radius: 12px;
            position: relative;
        }

        .story-scroll__wheel {
            width: 3px;
            height: 6px;
            background: #C89B6D;
            border-radius: 2px;
            position: absolute;
            top: 6px;
            left: 50%;
            transform: translateX(-50%);
            animation: storyScrollWheel 2s ease-in-out infinite;
        }

        @keyframes storyScrollWheel {

            0%,
            100% {
                top: 6px;
                opacity: 1;
            }

            50% {
                top: 18px;
                opacity: 0.3;
            }
        }

        .story-scroll__label {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.6rem;
            color: rgba(200, 155, 109, 0.4);
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        /* --- Responsive --- */
        @media (max-width: 991px) {
            .story-hero__steps {
                display: none;
            }

            .story-scene__text {
                padding: 0 30px;
            }

            .story-hero__scroll-hint {
                display: none;
            }
        }

        @media (max-width: 575px) {
            .story-scene__text {
                padding: 0 20px;
            }

            .story-hero__actions {
                flex-direction: column;
            }

            .story-btn-primary,
            .story-btn-secondary {
                width: 100%;
                justify-content: center;
            }

            .story-hero__trust {
                gap: 18px;
                flex-wrap: wrap;
            }

            .story-scene__heading {
                font-size: clamp(1.5rem, 6vw, 2rem);
            }
        }
    </style>

    <section class="story-hero" id="storyHero">
        <div class="story-hero__spacer">
            <div class="story-hero__sticky">
                <!-- Progress bar -->
                <div class="story-hero__progress" id="storyProgress"></div>

                <!-- Scene 1: Design / Sketching -->
                <div class="story-scene story-scene--1" id="storyScene1" style="opacity:1;">
                    <div class="story-scene__bg" id="storyBg1"></div>
                    <div class="story-scene__overlay"></div>
                    <div class="story-scene__content">
                        <div class="story-scene__text">
                            <div class="story-scene__step-label">
                                <span class="story-scene__step-num">1</span>
                                Design
                            </div>
                            <h2 class="story-scene__heading">Every Masterpiece<br>Begins With a Vision</h2>
                            <p class="story-scene__desc">We start by understanding your space, your style, and your story.
                                Our designers sketch every detail before a single plank is touched.</p>
                        </div>
                    </div>
                </div>

                <!-- Scene 2: Cutting & Shaping -->
                <div class="story-scene story-scene--2" id="storyScene2" style="opacity:0;">
                    <div class="story-scene__bg" id="storyBg2"></div>
                    <div class="story-scene__overlay"></div>
                    <div class="story-scene__content">
                        <div class="story-scene__text">
                            <div class="story-scene__step-label">
                                <span class="story-scene__step-num">2</span>
                                Craft
                            </div>
                            <h2 class="story-scene__heading">Precision Cuts,<br>Perfect Shapes</h2>
                            <p class="story-scene__desc">Raw timber meets master craftsmanship. Every cut is measured twice,
                                every joint hand-fitted for strength and beauty.</p>
                        </div>
                    </div>
                </div>

                <!-- Scene 3: Assembly -->
                <div class="story-scene story-scene--3" id="storyScene3" style="opacity:0;">
                    <div class="story-scene__bg" id="storyBg3"></div>
                    <div class="story-scene__overlay"></div>
                    <div class="story-scene__content">
                        <div class="story-scene__text">
                            <div class="story-scene__step-label">
                                <span class="story-scene__step-num">3</span>
                                Assemble
                            </div>
                            <h2 class="story-scene__heading">Pieces Come Together<br>With Purpose</h2>
                            <p class="story-scene__desc">Components are assembled on-site with care. Furniture, cabinetry,
                                and interiors take shape as your vision becomes reality.</p>
                        </div>
                    </div>
                </div>

                <!-- Scene 4: Final Reveal + CTA -->
                <div class="story-scene story-scene--4" id="storyScene4" style="opacity:0;">
                    <div class="story-scene__bg" id="storyBg4"></div>
                    <div class="story-scene__overlay"></div>
                    <div class="story-scene__content">
                        <div class="story-scene__text">
                            <div class="story-scene__step-label" style="justify-content:center;">
                                <span class="story-scene__step-num">4</span>
                                Transform
                            </div>
                            <h1 class="story-hero__title">
                                <em>Design.</em> <em>Craft.</em> <em>Transform.</em>
                            </h1>
                            <p class="story-hero__subtitle">Where craftsmanship meets modern interior design. Your dream
                                space, delivered with precision and passion.</p>
                            <div class="story-hero__actions">
                                <a href="{{ route('contact') }}" class="story-btn-primary">
                                    Start Your Project
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg>
                                </a>
                                <a href="{{ route('projects') }}" class="story-btn-secondary">
                                    View Projects
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                        </rect>
                                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                        <polyline points="21 15 16 10 5 21"></polyline>
                                    </svg>
                                </a>
                            </div>
                            <div class="story-hero__trust">
                                <div class="story-trust__item">
                                    <div class="story-trust__value">15+</div>
                                    <div class="story-trust__label">Years Experience</div>
                                </div>
                                <div class="story-trust__divider"></div>
                                <div class="story-trust__item">
                                    <div class="story-trust__value">500+</div>
                                    <div class="story-trust__label">Projects Done</div>
                                </div>
                                <div class="story-trust__divider"></div>
                                <div class="story-trust__item">
                                    <div class="story-trust__value">100%</div>
                                    <div class="story-trust__label">Client Satisfaction</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Light rays -->
                <div class="story-hero__rays">
                    <div class="story-ray story-ray--1"></div>
                    <div class="story-ray story-ray--2"></div>
                    <div class="story-ray story-ray--3"></div>
                    <div class="story-ray story-ray--4"></div>
                </div>

                <!-- Dust particles -->
                <div class="story-hero__dust">
                    <div class="story-dust"></div>
                    <div class="story-dust"></div>
                    <div class="story-dust"></div>
                    <div class="story-dust"></div>
                    <div class="story-dust"></div>
                    <div class="story-dust"></div>
                    <div class="story-dust"></div>
                    <div class="story-dust"></div>
                    <div class="story-dust"></div>
                    <div class="story-dust"></div>
                </div>

                <!-- Wood grain overlay -->
                <div class="story-hero__grain"></div>

                <!-- Vignette -->
                <div class="story-hero__vignette"></div>

                <!-- Step indicators -->
                <div class="story-hero__steps" id="storySteps">
                    <div class="story-step active" data-step="1">
                        <span class="story-step__label">Design</span>
                    </div>
                    <div class="story-steps__line"></div>
                    <div class="story-step" data-step="2">
                        <span class="story-step__label">Craft</span>
                    </div>
                    <div class="story-steps__line"></div>
                    <div class="story-step" data-step="3">
                        <span class="story-step__label">Assemble</span>
                    </div>
                    <div class="story-steps__line"></div>
                    <div class="story-step" data-step="4">
                        <span class="story-step__label">Transform</span>
                    </div>
                </div>

                <!-- Scroll hint -->
                <div class="story-hero__scroll-hint" id="storyScrollHint">
                    <div class="story-scroll__mouse">
                        <div class="story-scroll__wheel"></div>
                    </div>
                    <span class="story-scroll__label">Scroll to explore</span>
                </div>
            </div>
        </div>
    </section>
    <!-- Storytelling Scroll Hero End -->

    <!-- Feature Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center justify-content-center bg-light"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-user-check fa-2x text-primary"></i>
                        </div>
                        <h1 class="display-1 text-light mb-0">01</h1>
                    </div>
                    <h5>Expert Craftsmen</h5>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center justify-content-center bg-light"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-check fa-2x text-primary"></i>
                        </div>
                        <h1 class="display-1 text-light mb-0">02</h1>
                    </div>
                    <h5>Premium Quality</h5>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center justify-content-center bg-light"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-drafting-compass fa-2x text-primary"></i>
                        </div>
                        <h1 class="display-1 text-light mb-0">03</h1>
                    </div>
                    <h5>Free Consultation</h5>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center justify-content-center bg-light"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-headphones fa-2x text-primary"></i>
                        </div>
                        <h1 class="display-1 text-light mb-0">04</h1>
                    </div>
                    <h5>Dedicated Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature Start -->



    <!-- About Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container about px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100"
                            src="https://images.unsplash.com/photo-1565793298595-6a879b1d9492?w=800&q=80&auto=format"
                            style="object-fit: cover;" alt="Master carpenter at work">
                    </div>
                </div>
                <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4">About ARS Wood Works</h1>
                        </div>
                        <p class="mb-4 pb-2">ARS Wood Works delivers modular and custom wood solutions, complete interior
                            execution, decorative carving, and heavy-duty carpentry for commercial and industrial
                            environments. Our workflow covers consultation, design, fabrication, finishing, quality review,
                            and handover.</p>
                        <div class="row g-4 mb-4 pb-2">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white"
                                        style="width: 60px; height: 60px;">
                                        <i class="fa fa-users fa-2x text-primary"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h2 class="text-primary mb-1" data-toggle="counter-up">500</h2>
                                        <p class="fw-medium mb-0">Happy Clients</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white"
                                        style="width: 60px; height: 60px;">
                                        <i class="fa fa-check fa-2x text-primary"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h2 class="text-primary mb-1" data-toggle="counter-up">750</h2>
                                        <p class="fw-medium mb-0">Projects Done</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('about') }}" class="btn btn-primary py-3 px-5">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Our Services</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid"
                                src="https://images.unsplash.com/photo-1504148455328-c376907d081c?w=600&q=80&auto=format"
                                alt="General Carpentry">
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3">General Carpentry</h4>
                            <p>Professional execution with premium materials, quality-controlled processes, and reliable
                                timelines.</p>
                            <a class="fw-medium" href="{{ route('services') }}">Read More<i
                                    class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid"
                                src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=600&q=80&auto=format"
                                alt="Furniture Manufacturing">
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3">Furniture Manufacturing</h4>
                            <p>Professional execution with premium materials, quality-controlled processes, and reliable
                                timelines.</p>
                            <a class="fw-medium" href="{{ route('services') }}">Read More<i
                                    class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid"
                                src="https://images.unsplash.com/photo-1581783898377-1c85bf937427?w=600&q=80&auto=format"
                                alt="Furniture Remodeling">
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3">Furniture Remodeling</h4>
                            <p>Professional execution with premium materials, quality-controlled processes, and reliable
                                timelines.</p>
                            <a class="fw-medium" href="{{ route('services') }}">Read More<i
                                    class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid"
                                src="https://images.unsplash.com/photo-1615529182904-14819c35db37?w=600&q=80&auto=format"
                                alt="Wooden Floor">
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3">Wooden Floor</h4>
                            <p>Professional execution with premium materials, quality-controlled processes, and reliable
                                timelines.</p>
                            <a class="fw-medium" href="{{ route('services') }}">Read More<i
                                    class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid"
                                src="https://images.unsplash.com/photo-1538688525198-9b88f6f53126?w=600&q=80&auto=format"
                                alt="Wooden Furniture">
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3">Wooden Furniture</h4>
                            <p>Professional execution with premium materials, quality-controlled processes, and reliable
                                timelines.</p>
                            <a class="fw-medium" href="{{ route('services') }}">Read More<i
                                    class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid"
                                src="https://images.unsplash.com/photo-1600585152220-90363fe7e115?w=600&q=80&auto=format"
                                alt="Custom Work">
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3">Custom Work</h4>
                            <p>Professional execution with premium materials, quality-controlled processes, and reliable
                                timelines.</p>
                            <a class="fw-medium" href="{{ route('services') }}">Read More<i
                                    class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Work Process Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-3">How We Work</h1>
                <p class="text-muted mb-5 mx-auto" style="max-width: 600px;">From the first conversation to the final
                    handover, every step is managed with precision and craftsmanship.</p>
            </div>
            <div class="work-process-timeline">
                <div class="process-line"></div>
                <div class="row g-0">
                    <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="process-step" data-step="1">
                            <div class="process-icon">
                                <div class="process-icon-inner">
                                    <i class="fa fa-comments fa-2x"></i>
                                </div>
                                <svg class="process-ring" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="46" />
                                </svg>
                            </div>
                            <h6 class="mt-3 mb-1">Consultation</h6>
                            <small class="text-muted">Understand your vision</small>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="process-step" data-step="2">
                            <div class="process-icon">
                                <div class="process-icon-inner">
                                    <i class="fa fa-drafting-compass fa-2x"></i>
                                </div>
                                <svg class="process-ring" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="46" />
                                </svg>
                            </div>
                            <h6 class="mt-3 mb-1">Design</h6>
                            <small class="text-muted">Blueprint & planning</small>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="process-step" data-step="3">
                            <div class="process-icon">
                                <div class="process-icon-inner">
                                    <i class="fa fa-hammer fa-2x"></i>
                                </div>
                                <svg class="process-ring" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="46" />
                                </svg>
                            </div>
                            <h6 class="mt-3 mb-1">Fabrication</h6>
                            <small class="text-muted">Precision woodwork</small>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="process-step" data-step="4">
                            <div class="process-icon">
                                <div class="process-icon-inner">
                                    <i class="fa fa-tools fa-2x"></i>
                                </div>
                                <svg class="process-ring" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="46" />
                                </svg>
                            </div>
                            <h6 class="mt-3 mb-1">Installation</h6>
                            <small class="text-muted">On-site assembly</small>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="process-step" data-step="5">
                            <div class="process-icon">
                                <div class="process-icon-inner">
                                    <i class="fa fa-search fa-2x"></i>
                                </div>
                                <svg class="process-ring" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="46" />
                                </svg>
                            </div>
                            <h6 class="mt-3 mb-1">Quality Check</h6>
                            <small class="text-muted">Inspect & refine</small>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="process-step" data-step="6">
                            <div class="process-icon">
                                <div class="process-icon-inner">
                                    <i class="fa fa-handshake fa-2x"></i>
                                </div>
                                <svg class="process-ring" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="46" />
                                </svg>
                            </div>
                            <h6 class="mt-3 mb-1">Handover</h6>
                            <small class="text-muted">Delivered with care</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Work Process End -->


    <!-- Before & After Start -->
    <div class="container-fluid bg-light overflow-hidden py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-3">Transformation</h1>
                <p class="text-muted mb-5 mx-auto" style="max-width: 600px;">See the difference our craftsmanship makes.
                    Drag the slider to reveal the before and after.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="ba-wrapper" id="baSlider">
                        <div class="ba-image ba-before">
                            <img src="https://images.unsplash.com/photo-1502005229762-cf1b2da7c5d6?w=1200&q=80&auto=format"
                                alt="Before carpentry and interior work">
                            <span class="ba-label ba-label-before">BEFORE</span>
                        </div>
                        <div class="ba-image ba-after">
                            <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?w=1200&q=80&auto=format"
                                alt="After carpentry and interior work">
                            <span class="ba-label ba-label-after">AFTER</span>
                        </div>
                        <div class="ba-handle" id="baHandle">
                            <div class="ba-handle-line"></div>
                            <div class="ba-handle-circle">
                                <i class="fa fa-arrows-alt-h"></i>
                            </div>
                            <div class="ba-handle-line"></div>
                        </div>
                    </div>
                    <div class="row mt-4 g-3">
                        <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="ba-stat-card text-center p-3">
                                <i class="fa fa-home fa-2x text-primary mb-2"></i>
                                <h5 class="mb-1">Complete Renovation</h5>
                                <small class="text-muted">Interior + Furniture</small>
                            </div>
                        </div>
                        <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="ba-stat-card text-center p-3">
                                <i class="fa fa-calendar-check fa-2x text-primary mb-2"></i>
                                <h5 class="mb-1">45 Days</h5>
                                <small class="text-muted">Project Duration</small>
                            </div>
                        </div>
                        <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="ba-stat-card text-center p-3">
                                <i class="fa fa-star fa-2x text-primary mb-2"></i>
                                <h5 class="mb-1">100% Satisfied</h5>
                                <small class="text-muted">Client Approved</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Before & After End -->


    <!-- Room Designer Start -->
    <div class="container-xxl py-5" id="roomDesignerSection">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-3">Design Your Dream Room</h1>
                <p class="text-muted mb-5 mx-auto" style="max-width: 600px;">Experience our craftsmanship in 3D. Customize
                    walls, floors, and furniture to visualize your perfect space.</p>
            </div>
            <div class="room-designer-wrap wow fadeInUp" data-wow-delay="0.2s">
                <div class="rd-canvas-container" id="rdCanvas"></div>
                <div class="rd-panel">

                    <div class="rd-group">
                        <label class="rd-label">Wall Color</label>
                        <input type="color" id="rdWallColor" value="#f0e8dc" class="rd-color-picker"
                            onchange="rdSetWallColor(this.value)">
                    </div>

                    <div class="rd-group">
                        <label class="rd-label">Floor Material</label>
                        <div class="rd-btn-row">
                            <button class="rd-floor-btn active" data-floor="wood" onclick="rdSetFloor('wood')">
                                <span class="rd-swatch" style="background:#b08050"></span> Wood
                            </button>
                            <button class="rd-floor-btn" data-floor="marble" onclick="rdSetFloor('marble')">
                                <span class="rd-swatch" style="background:#e8e0d8"></span> Marble
                            </button>
                            <button class="rd-floor-btn" data-floor="tiles" onclick="rdSetFloor('tiles')">
                                <span class="rd-swatch" style="background:#d0c8c0"></span> Tiles
                            </button>
                        </div>
                    </div>

                    <div class="rd-group">
                        <label class="rd-label">Wood Finish</label>
                        <div class="rd-btn-row">
                            <button class="rd-wood-btn active" data-wood="oak" onclick="rdSetWoodFinish('oak')">
                                <span class="rd-swatch" style="background:#c4a76c"></span> Oak
                            </button>
                            <button class="rd-wood-btn" data-wood="teak" onclick="rdSetWoodFinish('teak')">
                                <span class="rd-swatch" style="background:#9a6b3a"></span> Teak
                            </button>
                            <button class="rd-wood-btn" data-wood="walnut" onclick="rdSetWoodFinish('walnut')">
                                <span class="rd-swatch" style="background:#4a2c17"></span> Walnut
                            </button>
                        </div>
                    </div>

                    <div class="rd-group">
                        <label class="rd-label">Add Furniture</label>
                        <div class="rd-furniture-grid">
                            <button onclick="rdAddFurniture('sofa')" title="Add Sofa">
                                <i class="fa fa-couch"></i><span>Sofa</span>
                            </button>
                            <button onclick="rdAddFurniture('table')" title="Add Table">
                                <i class="fa fa-border-all"></i><span>Table</span>
                            </button>
                            <button onclick="rdAddFurniture('chair')" title="Add Chair">
                                <i class="fa fa-chair"></i><span>Chair</span>
                            </button>
                            <button onclick="rdAddFurniture('cabinet')" title="Add Cabinet">
                                <i class="fa fa-th-large"></i><span>Cabinet</span>
                            </button>
                        </div>
                    </div>

                    <div class="rd-group">
                        <label class="rd-label">Selected</label>
                        <div class="rd-selected-row">
                            <span id="rdSelectedInfo">None</span>
                            <button id="rdRotateBtn" class="rd-icon-btn" style="display:none"
                                onclick="rdRotateSelected()" title="Rotate 45°">
                                <i class="fa fa-redo-alt"></i>
                            </button>
                            <button id="rdDeleteBtn" class="rd-icon-btn rd-danger" style="display:none"
                                onclick="rdDeleteSelected()" title="Remove">
                                <i class="fa fa-trash-alt"></i>
                            </button>
                        </div>
                        <div id="rdFurnitureList"></div>
                    </div>

                    <div class="rd-group">
                        <label class="rd-label">Lighting</label>
                        <div class="rd-lighting-row">
                            <button id="rdLightBtn" class="rd-toggle-btn active" onclick="rdToggleLights()">
                                <i class="fa fa-lightbulb"></i> Lights
                            </button>
                            <button id="rdDayBtn" class="rd-toggle-btn active" onclick="rdSetDayMode(true)">
                                <i class="fa fa-sun"></i>
                            </button>
                            <button id="rdNightBtn" class="rd-toggle-btn" onclick="rdSetDayMode(false)">
                                <i class="fa fa-moon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="rd-hint">
                        <small><i class="fa fa-mouse-pointer"></i> Drag to orbit &bull; Scroll to zoom &bull; Click
                            furniture to select &bull; Drag to move</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Room Designer End -->


    <!-- Feature Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container feature px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 feature-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 ps-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4">Why Choose ARS</h1>
                        </div>
                        <p class="mb-4 pb-2">We combine decades of carpentry expertise with modern project management to
                            deliver precision results. From residential interiors to industrial-scale fit-outs, our team
                            ensures quality at every stage.</p>
                        <div class="row g-4">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white"
                                        style="width: 60px; height: 60px;">
                                        <i class="fa fa-check fa-2x text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="mb-2">Quality</p>
                                        <h5 class="mb-0">Services</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white"
                                        style="width: 60px; height: 60px;">
                                        <i class="fa fa-user-check fa-2x text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="mb-2">Creative</p>
                                        <h5 class="mb-0">Designers</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white"
                                        style="width: 60px; height: 60px;">
                                        <i class="fa fa-drafting-compass fa-2x text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="mb-2">Free</p>
                                        <h5 class="mb-0">Consultation</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white"
                                        style="width: 60px; height: 60px;">
                                        <i class="fa fa-headphones fa-2x text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="mb-2">Customer</p>
                                        <h5 class="mb-0">Support</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100"
                            src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=800&q=80&auto=format"
                            style="object-fit: cover;" alt="Premium interior craftsmanship">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Projects Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Our Projects</h1>
            </div>
            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline mb-5" id="portfolio-flters">
                        <li class="mx-2 active" data-filter="*">All</li>
                        <li class="mx-2" data-filter=".first">General Carpentry</li>
                        <li class="mx-2" data-filter=".second">Custom Carpentry</li>
                    </ul>
                </div>
            </div>
            <style>
                .portfolio-box-spacing {
                    /* margin: 170px 0; */
                    /* margin-bottom: 50px; */
                }
            </style>
            <div class="row g-4 portfolio-container">
                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp portfolio-box-spacing"
                    data-wow-delay="0.1s">
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100"
                                src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&q=80&auto=format"
                                alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1"
                                    href="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&q=80&auto=format"
                                    data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href=""><i
                                        class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2">General Carpentry</p>
                            <h5 class="lh-base mb-0">Wooden Furniture Manufacturing And Remodeling</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp portfolio-box-spacing"
                    data-wow-delay="0.3s">
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100"
                                src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?w=800&q=80&auto=format"
                                alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1"
                                    href="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?w=800&q=80&auto=format"
                                    data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href=""><i
                                        class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2">Custom Carpentry</p>
                            <h5 class="lh-base mb-0">Wooden Furniture Manufacturing And Remodeling</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp portfolio-box-spacing"
                    data-wow-delay="0.5s">
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100"
                                src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=800&q=80&auto=format"
                                alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1"
                                    href="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=800&q=80&auto=format"
                                    data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href=""><i
                                        class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2">General Carpentry</p>
                            <h5 class="lh-base mb-0">Wooden Furniture Manufacturing And Remodeling</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp portfolio-box-spacing"
                    data-wow-delay="0.1s">
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100"
                                src="https://images.unsplash.com/photo-1600121848594-d8644e57abab?w=800&q=80&auto=format"
                                alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1"
                                    href="https://images.unsplash.com/photo-1600121848594-d8644e57abab?w=800&q=80&auto=format"
                                    data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href=""><i
                                        class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2">Custom Carpentry</p>
                            <h5 class="lh-base mb-0">Wooden Furniture Manufacturing And Remodeling</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp portfolio-box-spacing"
                    data-wow-delay="0.3s">
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100"
                                src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=800&q=80&auto=format"
                                alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1"
                                    href="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=800&q=80&auto=format"
                                    data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href=""><i
                                        class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2">General Carpentry</p>
                            <h5 class="lh-base mb-0">Wooden Furniture Manufacturing And Remodeling</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp portfolio-box-spacing"
                    data-wow-delay="0.5s">
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100"
                                src="https://images.unsplash.com/photo-1600607687644-aac4c3eac7f4?w=800&q=80&auto=format"
                                alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1"
                                    href="https://images.unsplash.com/photo-1600607687644-aac4c3eac7f4?w=800&q=80&auto=format"
                                    data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href=""><i
                                        class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2">Custom Carpentry</p>
                            <h5 class="lh-base mb-0">Wooden Furniture Manufacturing And Remodeling</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Projects End -->


    <!-- Quote Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container quote px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100"
                            src="https://images.unsplash.com/photo-1600573472592-401b489a3cdc?w=800&q=80&auto=format"
                            style="object-fit: cover;" alt="Get a free quote">
                    </div>
                </div>
                <div class="col-lg-6 quote-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4">Free Quote</h1>
                        </div>
                        <p class="mb-4 pb-2">ARS Wood Works combines decades of carpentry expertise with modern project
                            management to deliver precision results. Get a free consultation and quote for your next
                            project.</p>
                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" placeholder="Your Name"
                                        style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control border-0" placeholder="Your Email"
                                        style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" placeholder="Your Mobile"
                                        style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select border-0" style="height: 55px;">
                                        <option selected>Select A Service</option>
                                        <option value="1">Service 1</option>
                                        <option value="2">Service 2</option>
                                        <option value="3">Service 3</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control border-0" placeholder="Special Note"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Team Members</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid"
                                src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400&q=80&auto=format"
                                alt="Team Member">
                            <div class="team-social">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <h5 class="mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&q=80&auto=format"
                                alt="Team Member">
                            <div class="team-social">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <h5 class="mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid"
                                src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&q=80&auto=format"
                                alt="Team Member">
                            <div class="team-social">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <h5 class="mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid"
                                src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400&q=80&auto=format"
                                alt="Team Member">
                            <div class="team-social">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <h5 class="mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Testimonial</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light p-2 mx-auto mb-3 rounded-circle"
                        src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=200&q=80&auto=format"
                        style="width: 90px; height: 90px; object-fit: cover;">
                    <div class="testimonial-text text-center p-4">
                        <p>ARS Wood Works transformed our office space with exceptional attention to detail. Their team
                            managed the entire project professionally, from custom furniture to complete interior fit-out.
                            Highly recommended for quality craftsmanship.</p>
                        <h5 class="mb-1">Client Name</h5>
                        <span class="fst-italic">Profession</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light p-2 mx-auto mb-3 rounded-circle"
                        src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=200&q=80&auto=format"
                        style="width: 90px; height: 90px; object-fit: cover;">
                    <div class="testimonial-text text-center p-4">
                        <p>ARS Wood Works transformed our office space with exceptional attention to detail. Their team
                            managed the entire project professionally, from custom furniture to complete interior fit-out.
                            Highly recommended for quality craftsmanship.</p>
                        <h5 class="mb-1">Client Name</h5>
                        <span class="fst-italic">Profession</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light p-2 mx-auto mb-3 rounded-circle"
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=200&q=80&auto=format"
                        style="width: 90px; height: 90px; object-fit: cover;">
                    <div class="testimonial-text text-center p-4">
                        <p>ARS Wood Works transformed our office space with exceptional attention to detail. Their team
                            managed the entire project professionally, from custom furniture to complete interior fit-out.
                            Highly recommended for quality craftsmanship.</p>
                        <h5 class="mb-1">Client Name</h5>
                        <span class="fst-italic">Profession</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection

@push('scripts')
    <script>
        (function() {
            /* ===== Story Hero Scroll Controller ===== */
            var hero = document.getElementById('storyHero');
            if (hero) {
                var spacer = hero.querySelector('.story-hero__spacer');
                var scenes = [
                    document.getElementById('storyScene1'),
                    document.getElementById('storyScene2'),
                    document.getElementById('storyScene3'),
                    document.getElementById('storyScene4')
                ];
                var bgs = [
                    document.getElementById('storyBg1'),
                    document.getElementById('storyBg2'),
                    document.getElementById('storyBg3'),
                    document.getElementById('storyBg4')
                ];
                var progressBar = document.getElementById('storyProgress');
                var stepsContainer = document.getElementById('storySteps');
                var steps = stepsContainer ? stepsContainer.querySelectorAll('.story-step') : [];
                var scrollHint = document.getElementById('storyScrollHint');
                var hintHidden = false;
                var headerRevealed = false;
                var siteHeader = document.getElementById('siteHeader');
                var ticking = false;

                function updateHero() {
                    var heroRect = spacer.getBoundingClientRect();
                    var spacerHeight = spacer.offsetHeight - window.innerHeight;
                    var scrolled = -heroRect.top;
                    var progress = Math.max(0, Math.min(1, scrolled / spacerHeight));

                    // Update progress bar
                    if (progressBar) {
                        progressBar.style.width = (progress * 100) + '%';
                    }

                    // Reveal header after hero scroll completes (~95%)
                    if (siteHeader) {
                        if (!headerRevealed && progress >= 0.92) {
                            siteHeader.classList.add('header-revealed');
                            headerRevealed = true;
                        } else if (headerRevealed && progress < 0.85) {
                            siteHeader.classList.remove('header-revealed');
                            headerRevealed = false;
                        }
                    }

                    // Hide scroll hint after 5% scroll
                    if (!hintHidden && progress > 0.05 && scrollHint) {
                        scrollHint.style.opacity = '0';
                        hintHidden = true;
                    } else if (hintHidden && progress <= 0.02 && scrollHint) {
                        scrollHint.style.opacity = '1';
                        hintHidden = false;
                    }

                    // Scene transitions (4 scenes across 0-1 range)
                    var sceneCount = 4;
                    var sceneProgress = progress * sceneCount;
                    var activeScene = Math.min(Math.floor(sceneProgress), sceneCount - 1);

                    for (var i = 0; i < sceneCount; i++) {
                        if (!scenes[i]) continue;

                        var sceneLocal = sceneProgress - i;

                        if (i === activeScene) {
                            // Active scene: fade in
                            var fadeIn = i === 0 ? 1 : Math.min(1, sceneLocal * 4);
                            scenes[i].style.opacity = fadeIn;
                            scenes[i].style.zIndex = 2;
                        } else if (i === activeScene - 1) {
                            // Previous scene: still visible behind, fading out
                            var fadeOut = Math.max(0, 1 - (sceneLocal) * 2);
                            scenes[i].style.opacity = fadeOut;
                            scenes[i].style.zIndex = 1;
                        } else {
                            scenes[i].style.opacity = 0;
                            scenes[i].style.zIndex = 0;
                        }

                        // Parallax on backgrounds
                        if (bgs[i]) {
                            var parallaxOffset = (sceneProgress - i) * -30;
                            bgs[i].style.transform = 'scale(1.15) translateY(' + parallaxOffset + 'px)';
                        }
                    }

                    // Update step indicators
                    for (var j = 0; j < steps.length; j++) {
                        if (j <= activeScene) {
                            steps[j].classList.add('active');
                        } else {
                            steps[j].classList.remove('active');
                        }
                    }

                    ticking = false;
                }

                function onScroll() {
                    if (!ticking) {
                        ticking = true;
                        requestAnimationFrame(updateHero);
                    }
                }

                window.addEventListener('scroll', onScroll, {
                    passive: true
                });
                // Initial call
                updateHero();
            }
        })();
    </script>
@endpush

@push('scripts')
    <script>
        (function() {
            /* ===== Before / After Slider ===== */
            var wrapper = document.getElementById('baSlider');
            var handle = document.getElementById('baHandle');
            if (wrapper && handle) {
                var beforeImg = wrapper.querySelector('.ba-before');

                function setPosition(x) {
                    var rect = wrapper.getBoundingClientRect();
                    var pct = Math.max(0, Math.min(1, (x - rect.left) / rect.width));
                    beforeImg.style.clipPath = 'inset(0 ' + ((1 - pct) * 100) + '% 0 0)';
                    handle.style.left = (pct * 100) + '%';
                }

                // Desktop: auto-follow cursor on hover (no click needed)
                wrapper.addEventListener('mousemove', function(e) {
                    setPosition(e.clientX);
                });

                wrapper.addEventListener('mouseenter', function() {
                    wrapper.classList.add('active');
                });

                wrapper.addEventListener('mouseleave', function() {
                    wrapper.classList.remove('active');
                });

                // Mobile: touch drag support
                wrapper.addEventListener('touchstart', function(e) {
                    wrapper.classList.add('active');
                    setPosition(e.touches[0].clientX);
                }, {
                    passive: true
                });

                wrapper.addEventListener('touchmove', function(e) {
                    setPosition(e.touches[0].clientX);
                }, {
                    passive: true
                });

                wrapper.addEventListener('touchend', function() {
                    wrapper.classList.remove('active');
                });
            }

            /* ===== Work Process Timeline animation ===== */
            var timeline = document.querySelector('.work-process-timeline');
            if (timeline) {
                var observer = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            timeline.classList.add('animated');
                            observer.unobserve(timeline);
                        }
                    });
                }, {
                    threshold: 0.25
                });
                observer.observe(timeline);
            }
        })();
    </script>
@endpush

@push('scripts')
    <script type="importmap">
{
    "imports": {
        "three": "https://cdn.jsdelivr.net/npm/three@0.162.0/build/three.module.js",
        "three/addons/": "https://cdn.jsdelivr.net/npm/three@0.162.0/examples/jsm/"
    }
}
</script>
    <script type="module">
        const rdContainer = document.getElementById('rdCanvas');
        if (rdContainer) {
            const obs = new IntersectionObserver(async (entries) => {
                if (entries[0].isIntersecting) {
                    obs.disconnect();
                    const {
                        initRoomDesigner
                    } = await import('{{ asset('assets/js/room-designer.js') }}');
                    initRoomDesigner(rdContainer);
                }
            }, {
                threshold: 0.1
            });
            obs.observe(rdContainer);
        }
    </script>
@endpush
