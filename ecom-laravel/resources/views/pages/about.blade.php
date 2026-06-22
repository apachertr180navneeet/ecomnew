@extends('layouts.app')

@section('title', 'About Us')

@section('content')

<!-- ============================================
     BREADCRUMB
     ============================================ -->
<div class="category-breadcrumb py-3 bg-light border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0" style="font-family: var(--ff-primary); font-size: 0.9rem;">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-muted">Home</a></li>
                <li class="breadcrumb-item active text-purple fw-semibold" aria-current="page">About Us</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Custom Page Styling -->
<style>
    .about-hero {
        position: relative;
        padding: 100px 0;
        background: linear-gradient(135deg, #1a1a2e 0%, #4B097A 50%, #6A0DAD 100%);
        color: #fff;
        overflow: hidden;
        text-align: center;
    }
    .about-hero-pattern {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0.08;
        background-image: radial-gradient(circle at 2px 2px, #fff 1px, transparent 0);
        background-size: 24px 24px;
        pointer-events: none;
    }
    .about-hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        letter-spacing: -1.5px;
        margin-bottom: 20px;
    }
    .about-hero-desc {
        font-size: 1.15rem;
        max-width: 700px;
        margin: 0 auto;
        opacity: 0.9;
        font-weight: 300;
    }
    .story-img-wrapper {
        position: relative;
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-lg);
    }
    .story-img-wrapper img {
        width: 100%;
        height: 450px;
        object-fit: cover;
        transition: transform 0.8s ease;
    }
    .story-img-wrapper:hover img {
        transform: scale(1.05);
    }
    .about-stat-card {
        padding: 30px;
        border-radius: var(--radius-md);
        background: var(--clr-white);
        border: 1px solid var(--clr-border);
        text-align: center;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
    }
    .about-stat-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-hover);
        border-color: var(--clr-primary-light);
    }
    .about-stat-number {
        font-size: 3rem;
        font-weight: 800;
        color: var(--clr-primary);
        line-height: 1;
        margin-bottom: 8px;
    }
    .about-stat-label {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--clr-text-light);
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .value-card {
        padding: 40px 30px;
        border-radius: var(--radius-lg);
        background: var(--clr-white);
        border: 1px solid var(--clr-border);
        height: 100%;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
    }
    .value-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 0;
        background: var(--clr-primary);
        transition: var(--transition);
    }
    .value-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
        border-color: var(--clr-primary-light);
    }
    .value-card:hover::before {
        height: 100%;
    }
    .value-icon {
        font-size: 2.2rem;
        color: var(--clr-primary);
        margin-bottom: 20px;
        display: inline-block;
    }
    .timeline-wrapper {
        position: relative;
        max-width: 800px;
        margin: 0 auto;
        padding: 40px 0;
    }
    .timeline-wrapper::after {
        content: '';
        position: absolute;
        width: 3px;
        background-color: var(--clr-border);
        top: 0;
        bottom: 0;
        left: 50%;
        margin-left: -1.5px;
    }
    .timeline-container {
        padding: 10px 40px;
        position: relative;
        background-color: inherit;
        width: 50%;
    }
    .timeline-container::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        right: -10px;
        background-color: var(--clr-white);
        border: 4px solid var(--clr-primary);
        top: 15px;
        border-radius: 50%;
        z-index: 1;
        transition: var(--transition);
    }
    .timeline-left {
        left: 0;
    }
    .timeline-right {
        left: 50%;
    }
    .timeline-right::after {
        left: -10px;
    }
    .timeline-content {
        padding: 24px;
        background-color: var(--clr-white);
        position: relative;
        border-radius: var(--radius-md);
        border: 1px solid var(--clr-border);
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
    }
    .timeline-container:hover::after {
        background-color: var(--clr-primary-light);
        transform: scale(1.2);
    }
    .timeline-container:hover .timeline-content {
        box-shadow: var(--shadow-md);
        border-color: var(--clr-primary-light);
    }
    .timeline-year {
        font-weight: 800;
        color: var(--clr-primary);
        font-size: 1.25rem;
        margin-bottom: 5px;
    }
    .team-card {
        background: var(--clr-white);
        border-radius: var(--radius-lg);
        overflow: hidden;
        border: 1px solid var(--clr-border);
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
    }
    .team-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-hover);
        border-color: var(--clr-primary-light);
    }
    .team-img-wrapper {
        position: relative;
        overflow: hidden;
        height: 320px;
    }
    .team-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .team-card:hover .team-img-wrapper img {
        transform: scale(1.05);
    }
    .team-socials {
        position: absolute;
        bottom: -50px;
        left: 0;
        right: 0;
        background: rgba(106, 13, 173, 0.9);
        display: flex;
        justify-content: center;
        gap: 15px;
        padding: 12px 0;
        transition: bottom 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .team-card:hover .team-socials {
        bottom: 0;
    }
    .team-social-link {
        color: #fff;
        font-size: 1.2rem;
        transition: var(--transition-fast);
    }
    .team-social-link:hover {
        color: #fff;
        opacity: 0.8;
        transform: scale(1.1);
    }
    .team-body {
        padding: 24px;
        text-align: center;
    }
    .team-name {
        font-size: 1.15rem;
        font-weight: 700;
        margin-bottom: 4px;
    }
    .team-role {
        font-size: 0.85rem;
        color: var(--clr-primary-light);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    @media (max-width: 767.98px) {
        .about-hero-title {
            font-size: 2.5rem;
        }
        .timeline-wrapper::after {
            left: 31px;
        }
        .timeline-container {
            width: 100%;
            padding-left: 70px;
            padding-right: 25px;
        }
        .timeline-container::after {
            left: 21px;
        }
        .timeline-left, .timeline-right {
            left: 0;
        }
        .timeline-right::after {
            left: 21px;
        }
    }
</style>

<!-- ============================================
     HERO SECTION
     ============================================ -->
<section class="about-hero">
    <div class="about-hero-pattern"></div>
    <div class="container position-relative">
        <h1 class="about-hero-title">Elevating Everyday Style</h1>
        <p class="about-hero-desc">Discover the story behind Axvero, our commitment to exceptional design, sustainable operations, and how we are crafting the future of fashion.</p>
    </div>
</section>

<!-- ============================================
     OUR STORY
     ============================================ -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="story-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=800&h=1000&fit=crop&q=80" alt="Axvero design process">
                </div>
            </div>
            <div class="col-lg-6">
                <span class="text-purple fw-bold uppercase letter-spacing-1 mb-2 d-inline-block">THE JOURNEY</span>
                <h2 class="h1 fw-bold mb-4" style="color: var(--clr-dark);">Redefining Luxury & Streetwear</h2>
                <p class="text-muted mb-3">Axvero was born in 2022 out of a simple realization: high-end premium fashion shouldn't be inaccessible, and sustainable manufacturing shouldn't be an after-thought. We envisioned a brand that blends the rebellious energy of modern streetwear with the meticulous craft of heritage tailoring.</p>
                <p class="text-muted mb-4">Every piece we offer is a product of rigorous detailing, ethical raw material procurement, and a pursuit of longevity. We don't build fast fashion; we design staples that hold stories, season after season.</p>
                
                <!-- Quick Stats Grid -->
                <div class="row g-4 mt-2">
                    <div class="col-6 col-sm-3">
                        <div class="text-center text-sm-start">
                            <h3 class="fw-bold mb-0 text-purple" style="font-size: 2rem;">2022</h3>
                            <p class="small text-muted mb-0">Year Founded</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3">
                        <div class="text-center text-sm-start">
                            <h3 class="fw-bold mb-0 text-purple" style="font-size: 2rem;">100k+</h3>
                            <p class="small text-muted mb-0">Active Clients</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3">
                        <div class="text-center text-sm-start">
                            <h3 class="fw-bold mb-0 text-purple" style="font-size: 2rem;">15+</h3>
                            <p class="small text-muted mb-0">Flagship Stores</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3">
                        <div class="text-center text-sm-start">
                            <h3 class="fw-bold mb-0 text-purple" style="font-size: 2rem;">100%</h3>
                            <p class="small text-muted mb-0">Cruelty Free</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     OUR VALUES
     ============================================ -->
<section class="py-5 bg-light border-top border-bottom">
    <div class="container py-4">
        <div class="text-center max-width-600 mx-auto mb-5">
            <span class="text-purple fw-bold uppercase letter-spacing-1 mb-2 d-inline-block">WHAT DRIVES US</span>
            <h2 class="h1 fw-bold" style="color: var(--clr-dark);">Our Core Values</h2>
            <p class="text-muted">These pillars anchor every decision we make, from sourcing cotton to building digital shopping experiences.</p>
        </div>

        <div class="row g-4">
            <!-- Value 1 -->
            <div class="col-lg-3 col-md-6">
                <div class="value-card">
                    <div class="value-icon"><i class="bi bi-shield-check"></i></div>
                    <h3 class="h5 fw-bold mb-3">Impeccable Quality</h3>
                    <p class="text-muted mb-0">We work alongside premier artisans, selecting double-twist cotton yarns, premium grade leathers, and highly robust custom zippers.</p>
                </div>
            </div>
            <!-- Value 2 -->
            <div class="col-lg-3 col-md-6">
                <div class="value-card">
                    <div class="value-icon"><i class="bi bi-globe-americas"></i></div>
                    <h3 class="h5 fw-bold mb-3">Responsible Creation</h3>
                    <p class="text-muted mb-0">Minimizing environmental impact is non-negotiable. We rely on organic dyes, recycle water in factories, and plant trees on every checkout.</p>
                </div>
            </div>
            <!-- Value 3 -->
            <div class="col-lg-3 col-md-6">
                <div class="value-card">
                    <div class="value-icon"><i class="bi bi-cpu"></i></div>
                    <h3 class="h5 fw-bold mb-3">Digital Innovation</h3>
                    <p class="text-muted mb-0">From smooth mobile browsing systems to smart sizing solutions, we design tech to elevate custom shopping and eliminate guesswork.</p>
                </div>
            </div>
            <!-- Value 4 -->
            <div class="col-lg-3 col-md-6">
                <div class="value-card">
                    <div class="value-icon"><i class="bi bi-people"></i></div>
                    <h3 class="h5 fw-bold mb-3">Inclusivity & Union</h3>
                    <p class="text-muted mb-0">Fashion belongs to everyone. We celebrate unique voices in our workspace and design broad fits tailored to real human bodies.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     MILESTONES TIMELINE
     ============================================ -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center max-width-600 mx-auto mb-5">
            <span class="text-purple fw-bold uppercase letter-spacing-1 mb-2 d-inline-block">THE PROGRESSION</span>
            <h2 class="h1 fw-bold" style="color: var(--clr-dark);">How We Grew</h2>
            <p class="text-muted">A timeline of the critical moments that shaped our journey and brand identity.</p>
        </div>

        <div class="timeline-wrapper">
            <!-- Node 1 -->
            <div class="timeline-container timeline-left">
                <div class="timeline-content">
                    <div class="timeline-year">2022</div>
                    <h4 class="fw-bold mb-2">The Conception</h4>
                    <p class="text-muted mb-0">Launched with an initial capsule collection of 12 organic-cotton premium basics. Sold out in 14 days.</p>
                </div>
            </div>
            <!-- Node 2 -->
            <div class="timeline-container timeline-right">
                <div class="timeline-content">
                    <div class="timeline-year">2023</div>
                    <h4 class="fw-bold mb-2">Series Seed & Expansion</h4>
                    <p class="text-muted mb-0">Raised Seed round funding to expand categories into lifestyle, premium outerwear, and footwear.</p>
                </div>
            </div>
            <!-- Node 3 -->
            <div class="timeline-container timeline-left">
                <div class="timeline-content">
                    <div class="timeline-year">2024</div>
                    <h4 class="fw-bold mb-2">First Flagship Outlets</h4>
                    <p class="text-muted mb-0">Opened experiential omnichannel flagships in Bengaluru and Mumbai, blending tactile fitting rooms with instant digital checkout.</p>
                </div>
            </div>
            <!-- Node 4 -->
            <div class="timeline-container timeline-right">
                <div class="timeline-content">
                    <div class="timeline-year">2025</div>
                    <h4 class="fw-bold mb-2">100% Sustainability Milestone</h4>
                    <p class="text-muted mb-0">Transitioned 100% of cotton apparel production lines to GOTS-certified organic cotton, and offset carbon footprint across logistics.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     LEADERSHIP TEAM
     ============================================ -->
<section class="py-5 bg-light border-top">
    <div class="container py-4">
        <div class="text-center max-width-600 mx-auto mb-5">
            <span class="text-purple fw-bold uppercase letter-spacing-1 mb-2 d-inline-block">THE PEOPLE</span>
            <h2 class="h1 fw-bold" style="color: var(--clr-dark);">Meet the Leaders</h2>
            <p class="text-muted">A dedicated group of fashion disruptors, engineering innovators, and sustainability advocates.</p>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- Leader 1 -->
            <div class="col-lg-3 col-md-6 col-sm-10">
                <div class="team-card">
                    <div class="team-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=500&h=600&fit=crop&q=80" alt="Samantha Nair, CEO">
                        <div class="team-socials">
                            <a href="#" class="team-social-link" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="team-social-link" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                        </div>
                    </div>
                    <div class="team-body">
                        <h4 class="team-name">Samantha Nair</h4>
                        <p class="team-role">CEO & Co-Founder</p>
                    </div>
                </div>
            </div>
            <!-- Leader 2 -->
            <div class="col-lg-3 col-md-6 col-sm-10">
                <div class="team-card">
                    <div class="team-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=500&h=600&fit=crop&q=80" alt="Vikram Malhotra, Head of Design">
                        <div class="team-socials">
                            <a href="#" class="team-social-link" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="team-social-link" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                    <div class="team-body">
                        <h4 class="team-name">Vikram Malhotra</h4>
                        <p class="team-role">Creative Director</p>
                    </div>
                </div>
            </div>
            <!-- Leader 3 -->
            <div class="col-lg-3 col-md-6 col-sm-10">
                <div class="team-card">
                    <div class="team-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=500&h=600&fit=crop&q=80" alt="Elena Rostova, CTO">
                        <div class="team-socials">
                            <a href="#" class="team-social-link" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="team-social-link" aria-label="Github"><i class="bi bi-github"></i></a>
                        </div>
                    </div>
                    <div class="team-body">
                        <h4 class="team-name">Elena Rostova</h4>
                        <p class="team-role">Chief of Technology</p>
                    </div>
                </div>
            </div>
            <!-- Leader 4 -->
            <div class="col-lg-3 col-md-6 col-sm-10">
                <div class="team-card">
                    <div class="team-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1620122303020-43ec4b6cf7f8?w=500&h=600&fit=crop&q=80" alt="Arjun Mehta, Sustainability Director">
                        <div class="team-socials">
                            <a href="#" class="team-social-link" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="team-social-link" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                        </div>
                    </div>
                    <div class="team-body">
                        <h4 class="team-name">Arjun Mehta</h4>
                        <p class="team-role">Head of Sustainability</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
