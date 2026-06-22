@extends('layouts.app')

@section('title', 'Axvero — Careers')

@push('styles')
<style>
    .careers-hero {
        position: relative;
        padding: 100px 0;
        background: linear-gradient(135deg, #1a1a2e 0%, #4B097A 50%, #6A0DAD 100%);
        color: #fff;
        overflow: hidden;
        text-align: center;
    }
    .careers-hero-pattern {
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
    .careers-hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        letter-spacing: -1.5px;
        margin-bottom: 20px;
    }
    .careers-hero-desc {
        font-size: 1.15rem;
        max-width: 700px;
        margin: 0 auto;
        opacity: 0.9;
        font-weight: 300;
    }
    .perk-card {
        padding: 30px;
        border-radius: var(--radius-lg);
        background: var(--clr-white);
        border: 1px solid var(--clr-border);
        transition: var(--transition);
        height: 100%;
        text-align: center;
    }
    .perk-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
        border-color: var(--clr-primary-light);
    }
    .perk-icon-box {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: rgba(106, 13, 173, 0.08);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px auto;
        color: var(--clr-primary);
        font-size: 1.6rem;
        transition: var(--transition-fast);
    }
    .perk-card:hover .perk-icon-box {
        background: var(--clr-primary);
        color: #fff;
        transform: scale(1.1);
    }
    .careers-filter-row {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 40px;
    }
    .career-filter-pill {
        border: 1.5px solid var(--clr-border);
        background: var(--clr-white);
        padding: 10px 24px;
        font-size: 0.88rem;
        font-weight: 600;
        border-radius: var(--radius-pill);
        cursor: pointer;
        transition: var(--transition-fast);
        color: var(--clr-text-light);
    }
    .career-filter-pill:hover,
    .career-filter-pill.active {
        border-color: var(--clr-primary);
        background: rgba(106, 13, 173, 0.04);
        color: var(--clr-primary);
    }
    .job-card {
        background: var(--clr-white);
        border: 1px solid var(--clr-border);
        border-radius: var(--radius-md);
        padding: 30px;
        margin-bottom: 20px;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
    }
    .job-card:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
        border-color: var(--clr-primary-light);
    }
    .job-meta-badges {
        display: flex;
        gap: 8px;
        margin-top: 10px;
    }
    .job-badge {
        font-size: 0.75rem;
        font-weight: 600;
        padding: 4px 12px;
        border-radius: 4px;
    }
    .badge-type {
        background: rgba(106, 13, 173, 0.08);
        color: var(--clr-primary);
    }
    .badge-loc {
        background: #e2e8f0;
        color: var(--clr-text-light);
    }
    .btn-apply-now {
        background: var(--clr-primary);
        color: #fff;
        border: none;
        padding: 12px 24px;
        border-radius: var(--radius-pill);
        font-weight: 600;
        font-size: 0.9rem;
        transition: var(--transition-fast);
    }
    .btn-apply-now:hover {
        background: var(--clr-primary-dark);
        color: #fff;
        transform: scale(1.03);
    }

    .careers-modal-header {
        background: var(--clr-primary);
        color: #fff;
        border-bottom: none;
        padding: 24px 30px;
    }
    .careers-modal-title {
        font-weight: 700;
    }
    .careers-modal-close {
        color: #fff;
        font-size: 1.25rem;
        background: transparent;
        border: none;
        opacity: 0.8;
        transition: var(--transition-fast);
    }
    .careers-modal-close:hover {
        opacity: 1;
    }
    .careers-modal-body {
        padding: 30px;
    }
    .form-control-custom {
        border: 1.5px solid var(--clr-border);
        border-radius: var(--radius-sm);
        padding: 12px 18px;
        font-size: 0.95rem;
        transition: var(--transition-fast);
    }
    .form-control-custom:focus {
        border-color: var(--clr-primary-light);
        box-shadow: 0 4px 12px rgba(106, 13, 173, 0.06);
    }

    .careers-toast-container {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 1080;
    }
    .careers-toast {
        background: #fff;
        border-left: 4px solid var(--clr-success);
        box-shadow: var(--shadow-lg);
        border-radius: var(--radius-sm);
        padding: 16px 24px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 0.95rem;
        animation: toastSlideIn 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        max-width: 400px;
    }
    @keyframes toastSlideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 767.98px) {
        .careers-hero-title {
            font-size: 2.5rem;
        }
        .job-card {
            flex-direction: column;
            align-items: flex-start;
        }
        .btn-apply-now {
            width: 100%;
            text-align: center;
        }
    }
</style>
@endpush

@section('content')
<div class="category-breadcrumb py-3 bg-light border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0" style="font-family: var(--ff-primary); font-size: 0.9rem;">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-muted">Home</a></li>
                <li class="breadcrumb-item active text-purple fw-semibold" aria-current="page">Careers</li>
            </ol>
        </nav>
    </div>
</div>

<section class="careers-hero">
    <div class="careers-hero-pattern"></div>
    <div class="container position-relative">
        <h1 class="careers-hero-title">Shape the Future of Retail</h1>
        <p class="careers-hero-desc">We are always searching for developers, artists, operational managers, and thinkers who challenge patterns. Come design the retail revolution.</p>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center max-width-600 mx-auto mb-5">
            <span class="text-purple fw-bold uppercase letter-spacing-1 mb-2 d-inline-block">THE WORKPLACE</span>
            <h2 class="h1 fw-bold" style="color: var(--clr-dark);">Perks & Benefits</h2>
            <p class="text-muted">We provide an ecosystem where you can grow, learn, rest, and create outstanding work.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="perk-card">
                    <div class="perk-icon-box"><i class="bi bi-briefcase"></i></div>
                    <h3 class="h5 fw-bold mb-2">Hybrid Freedom</h3>
                    <p class="text-muted small mb-0">Flexible hybrid working structures setup to balance deep focus from home and collaboration at key flagships.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="perk-card">
                    <div class="perk-icon-box"><i class="bi bi-heart-pulse"></i></div>
                    <h3 class="h5 fw-bold mb-2">Wellness & Health</h3>
                    <p class="text-muted small mb-0">Comprehensive health insurance coverage along with active monthly mental and physical wellness allowances.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="perk-card">
                    <div class="perk-icon-box"><i class="bi bi-book"></i></div>
                    <h3 class="h5 fw-bold mb-2">Learning Budgets</h3>
                    <p class="text-muted small mb-0">Generous annual stipends set aside for digital courses, masterclasses, and international fashion summits.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="perk-card">
                    <div class="perk-icon-box"><i class="bi bi-percent"></i></div>
                    <h3 class="h5 fw-bold mb-2">Product Discount</h3>
                    <p class="text-muted small mb-0">An exclusive, generous 40% discount on all active designer streetwear and homeware collections.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light border-top border-bottom">
    <div class="container py-4">
        <div class="text-center max-width-600 mx-auto mb-5">
            <span class="text-purple fw-bold uppercase letter-spacing-1 mb-2 d-inline-block">OPEN ROLES</span>
            <h2 class="h1 fw-bold" style="color: var(--clr-dark);">Explore Openings</h2>
            <p class="text-muted">Find your matching space and join our creative ecosystem.</p>
        </div>

        <div class="careers-filter-row">
            <button class="career-filter-pill active" data-filter="All" onclick="filterJobs('All', this)">All Careers</button>
            <button class="career-filter-pill" data-filter="Tech" onclick="filterJobs('Tech', this)">Technology</button>
            <button class="career-filter-pill" data-filter="Design" onclick="filterJobs('Design', this)">Creative & Design</button>
            <button class="career-filter-pill" data-filter="Operations" onclick="filterJobs('Operations', this)">Operations</button>
            <button class="career-filter-pill" data-filter="Customer Success" onclick="filterJobs('Customer Success', this)">Customer Success</button>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="job-card" data-category="Tech">
                    <div>
                        <h3 class="h5 fw-bold mb-1">Senior Frontend Engineer (React / PHP)</h3>
                        <p class="text-muted mb-0 small">Craft premium ecommerce checkouts and high-performance catalog filters.</p>
                        <div class="job-meta-badges">
                            <span class="job-badge badge-type">Full-time</span>
                            <span class="job-badge badge-loc">Bengaluru HQs</span>
                        </div>
                    </div>
                    <button class="btn-apply-now" onclick="openApplyModal('Senior Frontend Engineer (React / PHP)')">Apply Now</button>
                </div>

                <div class="job-card" data-category="Design">
                    <div>
                        <h3 class="h5 fw-bold mb-1">Lead Knitwear Designer</h3>
                        <p class="text-muted mb-0 small">Lead selection of organic fibers and sketch our luxury winter layers capsule.</p>
                        <div class="job-meta-badges">
                            <span class="job-badge badge-type">Full-time</span>
                            <span class="job-badge badge-loc">Mumbai Studio</span>
                        </div>
                    </div>
                    <button class="btn-apply-now" onclick="openApplyModal('Lead Knitwear Designer')">Apply Now</button>
                </div>

                <div class="job-card" data-category="Operations">
                    <div>
                        <h3 class="h5 fw-bold mb-1">Logistics & Supply Chain Manager</h3>
                        <p class="text-muted mb-0 small">Oversee carbon-neutral warehouse supply routes and express dispatch.</p>
                        <div class="job-meta-badges">
                            <span class="job-badge badge-type">Full-time</span>
                            <span class="job-badge badge-loc">Bengaluru Hub</span>
                        </div>
                    </div>
                    <button class="btn-apply-now" onclick="openApplyModal('Logistics & Supply Chain Manager')">Apply Now</button>
                </div>

                <div class="job-card" data-category="Customer Success">
                    <div>
                        <h3 class="h5 fw-bold mb-1">Customer Experience Lead</h3>
                        <p class="text-muted mb-0 small">Ensure high levels of service and direct custom sizing advice globally.</p>
                        <div class="job-meta-badges">
                            <span class="job-badge badge-type">Full-time</span>
                            <span class="job-badge badge-loc">Remote (India)</span>
                        </div>
                    </div>
                    <button class="btn-apply-now" onclick="openApplyModal('Customer Experience Lead')">Apply Now</button>
                </div>

                <div class="job-card" data-category="Design">
                    <div>
                        <h3 class="h5 fw-bold mb-1">Junior UI/UX Designer</h3>
                        <p class="text-muted mb-0 small">Assist in creating digital assets, layout wires, and email campaigns.</p>
                        <div class="job-meta-badges">
                            <span class="job-badge badge-type">Internship</span>
                            <span class="job-badge badge-loc">Bengaluru HQs</span>
                        </div>
                    </div>
                    <button class="btn-apply-now" onclick="openApplyModal('Junior UI/UX Designer')">Apply Now</button>
                </div>

                <div id="noJobsState" class="text-center py-5" style="display: none;">
                    <i class="bi bi-briefcase-slash text-muted" style="font-size: 3rem;"></i>
                    <h4 class="mt-3 fw-bold text-dark">No roles open in this department</h4>
                    <p class="text-muted small">Try selecting another category or check back in later!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 overflow-hidden" style="border-radius: var(--radius-lg);">
            <div class="modal-header careers-modal-header">
                <h5 class="modal-title careers-modal-title" id="applyModalLabel">Submit Application</h5>
                <button type="button" class="careers-modal-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <div class="modal-body careers-modal-body">
                <form id="applyForm" onsubmit="handleApplySubmit(event)">
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-muted" style="font-size: 0.85rem;">Applying For</label>
                        <input type="text" id="targetRoleInput" class="form-control form-control-custom bg-light fw-bold" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="applicantName" class="form-label fw-semibold text-muted" style="font-size: 0.85rem;">Full Name *</label>
                        <input type="text" id="applicantName" class="form-control form-control-custom" placeholder="e.g. Navneet Kumar" required>
                    </div>
                    <div class="mb-3">
                        <label for="applicantEmail" class="form-label fw-semibold text-muted" style="font-size: 0.85rem;">Email Address *</label>
                        <input type="email" id="applicantEmail" class="form-control form-control-custom" placeholder="name@domain.com" required>
                    </div>
                    <div class="mb-4">
                        <label for="applicantCover" class="form-label fw-semibold text-muted" style="font-size: 0.85rem;">Tell us about yourself (Optional)</label>
                        <textarea id="applicantCover" class="form-control form-control-custom" rows="4" placeholder="Briefly describe your passion for retail and style..."></textarea>
                    </div>
                    <button type="submit" id="applySubmitBtn" class="btn btn-purple-custom w-100 py-3 fw-bold" style="background: var(--clr-primary); color:#fff; border:none; border-radius: var(--radius-sm); transition: var(--transition-fast);">
                        Submit Application
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="careers-toast-container" id="careersToastContainer"></div>
@endsection

@push('scripts')
<script>
    let activeCategory = 'All';
    let applicationModal;

    document.addEventListener("DOMContentLoaded", () => {
        applicationModal = new bootstrap.Modal(document.getElementById('applyModal'), {});
    });

    function filterJobs(category, buttonElement) {
        activeCategory = category;

        document.querySelectorAll(".career-filter-pill").forEach(pill => pill.classList.remove("active"));
        buttonElement.classList.add("active");

        const jobCards = document.querySelectorAll(".job-card");
        const emptyState = document.getElementById("noJobsState");
        let visibleCount = 0;

        jobCards.forEach(card => {
            const cat = card.getAttribute("data-category");
            if (activeCategory === 'All' || cat === activeCategory) {
                card.style.display = "flex";
                visibleCount++;
            } else {
                card.style.display = "none";
            }
        });

        if (visibleCount === 0) {
            emptyState.style.display = "block";
        } else {
            emptyState.style.display = "none";
        }
    }

    function openApplyModal(roleName) {
        document.getElementById("targetRoleInput").value = roleName;
        document.getElementById("applyForm").reset();
        applicationModal.show();
    }

    function handleApplySubmit(e) {
        e.preventDefault();

        const submitBtn = document.getElementById("applySubmitBtn");
        const applicantName = document.getElementById("applicantName").value;
        const roleApplied = document.getElementById("targetRoleInput").value;

        submitBtn.disabled = true;
        submitBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Sending Application...`;

        setTimeout(() => {
            applicationModal.hide();

            submitBtn.disabled = false;
            submitBtn.innerHTML = `Submit Application`;

            showSuccessToast(`🎉 Success! Application submitted for <strong>${roleApplied}</strong>. Thank you, ${applicantName}!`);
        }, 1500);
    }

    function showSuccessToast(message) {
        const container = document.getElementById("careersToastContainer");
        const toast = document.createElement("div");
        toast.className = "careers-toast";
        toast.innerHTML = `
            <i class="bi bi-check-circle-fill text-success" style="font-size: 1.4rem;"></i>
            <div>${message}</div>
        `;
        container.appendChild(toast);

        setTimeout(() => {
            toast.style.animation = "toastSlideIn 0.3s reverse forwards";
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 4000);
    }
</script>
@endpush
