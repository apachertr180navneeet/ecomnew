@extends('layouts.app')

@section('title', 'My Account')

@section('content')
<!-- Account Dashboard Styles -->
<style>
    /* ========== BREADCRUMB ========== */
    .axv-breadcrumb {
        padding: 18px 0;
        background: #f9fafb;
        border-bottom: 1px solid var(--clr-border);
    }
    .axv-breadcrumb-list {
        display: flex;
        align-items: center;
        gap: 8px;
        list-style: none;
        margin: 0;
        padding: 0;
        font-size: 0.85rem;
    }
    .axv-breadcrumb-list li a {
        color: var(--clr-text-light);
        text-decoration: none;
        transition: color 0.2s;
    }
    .axv-breadcrumb-list li a:hover { color: var(--clr-primary); }
    .axv-breadcrumb-list li.active { color: var(--clr-text); font-weight: 600; }
    .axv-breadcrumb-list .bc-sep { color: #cbd5e1; font-size: 0.7rem; }

    /* ========== ACCOUNT PAGE ========== */
    .account-page-section {
        padding: 40px 0 80px;
        background: #f9fafb;
        min-height: 70vh;
    }
    .account-layout {
        display: grid;
        grid-template-columns: 280px 1fr;
        gap: 28px;
        align-items: start;
    }

    /* ========== SIDEBAR ========== */
    .account-sidebar {
        background: #fff;
        border-radius: var(--radius-md);
        border: 1px solid var(--clr-border);
        overflow: hidden;
        position: sticky;
        top: 100px;
    }
    .sidebar-user-header {
        padding: 24px 20px;
        background: linear-gradient(135deg, #6A0DAD 0%, #4B097A 100%);
        color: #fff;
        display: flex;
        align-items: center;
        gap: 14px;
    }
    .sidebar-avatar {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        background: rgba(255,255,255,0.2);
        backdrop-filter: blur(8px);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
        border: 2px solid rgba(255,255,255,0.3);
    }
    .sidebar-user-name {
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 2px;
    }
    .sidebar-user-email {
        font-size: 0.78rem;
        opacity: 0.8;
    }
    .sidebar-nav {
        list-style: none;
        padding: 10px 0;
        margin: 0;
    }
    .sidebar-nav li a {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 14px 22px;
        color: var(--clr-text);
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
        transition: all 0.2s;
        border-left: 3px solid transparent;
        cursor: pointer;
    }
    .sidebar-nav li a:hover {
        background: rgba(106, 13, 173, 0.04);
        color: var(--clr-primary);
    }
    .sidebar-nav li a.active {
        background: rgba(106, 13, 173, 0.06);
        color: var(--clr-primary);
        font-weight: 700;
        border-left-color: var(--clr-primary);
    }
    .sidebar-nav li a i {
        font-size: 1.15rem;
        width: 22px;
        text-align: center;
        color: var(--clr-text-light);
    }
    .sidebar-nav li a.active i,
    .sidebar-nav li a:hover i {
        color: var(--clr-primary);
    }
    .sidebar-nav .nav-divider {
        height: 1px;
        background: var(--clr-border);
        margin: 6px 20px;
    }
    .sidebar-nav li a.logout-link {
        color: #ef4444;
    }
    .sidebar-nav li a.logout-link i { color: #ef4444; }
    .sidebar-nav li a.logout-link:hover {
        background: #fef2f2;
    }

    /* ========== CONTENT AREA ========== */
    .account-content {
        min-height: 500px;
    }
    .account-panel {
        display: none;
        animation: panelFadeIn 0.35s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }
    .account-panel.active { display: block; }
    @keyframes panelFadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .panel-card {
        background: #fff;
        border-radius: var(--radius-md);
        border: 1px solid var(--clr-border);
        padding: 28px;
        margin-bottom: 20px;
    }
    .panel-title {
        font-size: 1.35rem;
        font-weight: 800;
        color: var(--clr-text);
        margin-bottom: 6px;
        letter-spacing: -0.3px;
    }
    .panel-subtitle {
        font-size: 0.88rem;
        color: var(--clr-text-light);
        margin-bottom: 28px;
    }

    /* ========== PROFILE SECTION ========== */
    .profile-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    .profile-field-group { margin-bottom: 0; }
    .profile-field-label {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        color: var(--clr-text-light);
        margin-bottom: 6px;
        display: block;
    }
    .profile-field-value {
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--clr-text);
        padding: 11px 16px;
        background: #f9fafb;
        border: 1.5px solid var(--clr-border);
        border-radius: var(--radius-sm);
        transition: all 0.2s;
    }
    .profile-field-value:focus {
        border-color: var(--clr-primary-light);
        background: #fff;
        outline: none;
        box-shadow: 0 4px 12px rgba(106, 13, 173, 0.05);
    }
    .profile-avatar-section {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 32px;
        padding-bottom: 24px;
        border-bottom: 1px solid var(--clr-border);
    }
    .profile-avatar-lg {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--clr-primary), var(--clr-primary-light));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: #fff;
        font-weight: 800;
        flex-shrink: 0;
    }
    .profile-avatar-info h3 {
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--clr-text);
        margin-bottom: 4px;
    }
    .profile-avatar-info p {
        font-size: 0.85rem;
        color: var(--clr-text-light);
        margin: 0;
    }
    .btn-save-profile {
        padding: 12px 32px;
        background: var(--clr-primary);
        color: #fff;
        border: none;
        border-radius: var(--radius-sm);
        font-weight: 700;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.25s;
        font-family: var(--ff-primary);
        margin-top: 24px;
    }
    .btn-save-profile:hover {
        background: var(--clr-primary-dark);
        transform: translateY(-1px);
    }

    /* ========== ORDERS SECTION ========== */
    .order-card {
        background: #fff;
        border-radius: var(--radius-md);
        border: 1px solid var(--clr-border);
        padding: 24px;
        margin-bottom: 16px;
        transition: all 0.25s;
    }
    .order-card:hover {
        box-shadow: var(--shadow-md);
        border-color: rgba(106, 13, 173, 0.12);
    }
    .order-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 18px;
        flex-wrap: wrap;
        gap: 10px;
    }
    .order-id-group .order-id {
        font-size: 0.92rem;
        font-weight: 700;
        color: var(--clr-text);
        margin-bottom: 3px;
    }
    .order-id-group .order-date {
        font-size: 0.78rem;
        color: var(--clr-text-light);
    }
    .order-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 14px;
        border-radius: var(--radius-pill);
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.3px;
    }
    .badge-delivered {
        background: #ecfdf5;
        color: #059669;
    }
    .badge-shipped {
        background: #eff6ff;
        color: #2563eb;
    }
    .badge-processing {
        background: #fef3c7;
        color: #d97706;
    }
    .badge-cancelled {
        background: #fef2f2;
        color: #dc2626;
    }
    .order-items-row {
        display: flex;
        gap: 14px;
        overflow-x: auto;
        padding-bottom: 14px;
        margin-bottom: 14px;
        border-bottom: 1px solid var(--clr-border);
    }
    .order-item-thumb {
        width: 64px;
        height: 76px;
        border-radius: 8px;
        overflow: hidden;
        flex-shrink: 0;
        background: var(--clr-gray);
    }
    .order-item-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .order-bottom-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }
    .order-total {
        font-size: 1.05rem;
        font-weight: 800;
        color: var(--clr-text);
    }
    .order-actions {
        display: flex;
        gap: 8px;
    }
    .btn-order-action {
        padding: 8px 18px;
        border-radius: var(--radius-sm);
        font-size: 0.82rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s;
        font-family: var(--ff-primary);
        border: 1.5px solid var(--clr-border);
        background: #fff;
        color: var(--clr-text);
    }
    .btn-order-action:hover {
        border-color: var(--clr-primary);
        color: var(--clr-primary);
    }
    .btn-order-action.primary {
        background: var(--clr-primary);
        color: #fff;
        border-color: var(--clr-primary);
    }
    .btn-order-action.primary:hover {
        background: var(--clr-primary-dark);
    }

    /* ========== ADDRESSES ========== */
    .address-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 16px;
    }
    .address-card {
        background: #fff;
        border: 1.5px solid var(--clr-border);
        border-radius: var(--radius-md);
        padding: 20px;
        position: relative;
        transition: all 0.25s;
    }
    .address-card:hover {
        box-shadow: var(--shadow-md);
    }
    .address-card.default {
        border-color: var(--clr-primary);
    }
    .address-default-badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 3px 10px;
        border-radius: var(--radius-pill);
        background: rgba(106, 13, 173, 0.08);
        color: var(--clr-primary);
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 10px;
    }
    .address-type {
        font-size: 0.88rem;
        font-weight: 700;
        color: var(--clr-text);
        margin-bottom: 4px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .address-name {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--clr-text);
        margin-bottom: 6px;
    }
    .address-text {
        font-size: 0.84rem;
        color: var(--clr-text-light);
        line-height: 1.6;
        margin-bottom: 10px;
    }
    .address-phone {
        font-size: 0.82rem;
        color: var(--clr-text-light);
        margin-bottom: 14px;
    }
    .address-actions {
        display: flex;
        gap: 8px;
    }
    .btn-address-action {
        padding: 6px 14px;
        border-radius: 6px;
        font-size: 0.78rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        font-family: var(--ff-primary);
        border: 1px solid var(--clr-border);
        background: #fff;
        color: var(--clr-text-light);
    }
    .btn-address-action:hover {
        border-color: var(--clr-primary);
        color: var(--clr-primary);
    }
    .btn-address-action.delete:hover {
        border-color: #ef4444;
        color: #ef4444;
        background: #fef2f2;
    }
    .add-address-card {
        border: 2px dashed var(--clr-border);
        border-radius: var(--radius-md);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        cursor: pointer;
        transition: all 0.25s;
        min-height: 200px;
    }
    .add-address-card:hover {
        border-color: var(--clr-primary);
        background: rgba(106, 13, 173, 0.02);
    }
    .add-address-card i {
        font-size: 2rem;
        color: var(--clr-primary);
        margin-bottom: 10px;
    }
    .add-address-card span {
        font-size: 0.88rem;
        font-weight: 600;
        color: var(--clr-text-light);
    }

    /* ========== WISHLIST ========== */
    .wishlist-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 16px;
    }
    .wishlist-card {
        background: #fff;
        border-radius: var(--radius-md);
        border: 1px solid var(--clr-border);
        overflow: hidden;
        transition: all 0.3s;
    }
    .wishlist-card:hover {
        box-shadow: var(--shadow-md);
        transform: translateY(-3px);
    }
    .wishlist-img {
        width: 100%;
        height: 220px;
        overflow: hidden;
        position: relative;
    }
    .wishlist-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s;
    }
    .wishlist-card:hover .wishlist-img img {
        transform: scale(1.06);
    }
    .wishlist-remove-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: #fff;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 0.8rem;
        color: #ef4444;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transition: all 0.2s;
    }
    .wishlist-remove-btn:hover {
        background: #fef2f2;
        transform: scale(1.1);
    }
    .wishlist-info {
        padding: 14px;
    }
    .wishlist-name {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--clr-text);
        margin-bottom: 4px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .wishlist-price {
        font-size: 0.95rem;
        font-weight: 800;
        color: var(--clr-primary);
        margin-bottom: 10px;
    }
    .wishlist-price .old-price {
        font-size: 0.82rem;
        color: #9ca3af;
        text-decoration: line-through;
        font-weight: 500;
        margin-left: 6px;
    }
    .btn-move-cart {
        width: 100%;
        padding: 9px;
        background: var(--clr-primary);
        color: #fff;
        border: none;
        border-radius: 6px;
        font-size: 0.82rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.25s;
        font-family: var(--ff-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }
    .btn-move-cart:hover {
        background: var(--clr-primary-dark);
    }

    /* ========== CHANGE PASSWORD ========== */
    .password-form { max-width: 480px; }
    .password-field-group { margin-bottom: 22px; }
    .password-field-label {
        font-size: 0.78rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        color: var(--clr-text-light);
        margin-bottom: 6px;
        display: block;
    }
    .password-input-wrapper {
        position: relative;
    }
    .password-input {
        width: 100%;
        padding: 12px 44px 12px 16px;
        border: 1.5px solid var(--clr-border);
        border-radius: var(--radius-sm);
        font-size: 0.95rem;
        outline: none;
        transition: all 0.2s;
        font-family: var(--ff-primary);
        background: #f9fafb;
    }
    .password-input:focus {
        border-color: var(--clr-primary-light);
        background: #fff;
        box-shadow: 0 4px 12px rgba(106, 13, 173, 0.05);
    }
    .password-toggle {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: var(--clr-text-light);
        cursor: pointer;
        font-size: 1.1rem;
        transition: color 0.2s;
    }
    .password-toggle:hover { color: var(--clr-primary); }
    .password-strength {
        margin-top: 8px;
        display: flex;
        gap: 4px;
    }
    .strength-bar {
        height: 4px;
        flex: 1;
        border-radius: 2px;
        background: var(--clr-border);
        transition: background 0.3s;
    }
    .strength-bar.active.weak { background: #ef4444; }
    .strength-bar.active.medium { background: #f59e0b; }
    .strength-bar.active.strong { background: #059669; }
    .strength-text {
        font-size: 0.75rem;
        margin-top: 4px;
        font-weight: 600;
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 991.98px) {
        .account-layout {
            grid-template-columns: 1fr;
        }
        .account-sidebar {
            position: static;
        }
        .sidebar-nav {
            display: flex;
            overflow-x: auto;
            padding: 10px 14px;
            gap: 4px;
        }
        .sidebar-nav li a {
            white-space: nowrap;
            padding: 10px 16px;
            border-radius: var(--radius-pill);
            border-left: none;
            font-size: 0.82rem;
        }
        .sidebar-nav li a.active {
            background: var(--clr-primary);
            color: #fff;
            border-left: none;
        }
        .sidebar-nav li a.active i { color: #fff; }
        .sidebar-nav .nav-divider { display: none; }
    }
    @media (max-width: 575.98px) {
        .account-page-section { padding: 20px 0 60px; }
        .profile-grid { grid-template-columns: 1fr; }
        .wishlist-grid { grid-template-columns: repeat(2, 1fr); }
        .address-grid { grid-template-columns: 1fr; }
        .order-actions { width: 100%; }
        .btn-order-action { flex: 1; text-align: center; }
    }
</style>

<!-- Breadcrumb -->
<nav class="axv-breadcrumb">
    <div class="container">
        <ul class="axv-breadcrumb-list">
            <li><a href="{{ url('/') }}"><i class="bi bi-house-door"></i> Home</a></li>
            <li class="bc-sep"><i class="bi bi-chevron-right"></i></li>
            <li class="active">My Account</li>
        </ul>
    </div>
</nav>

<!-- Account Dashboard -->
<section class="account-page-section">
    <div class="container">
        <div class="account-layout">
            <!-- SIDEBAR -->
            <aside class="account-sidebar">
                <div class="sidebar-user-header">
                    <div class="sidebar-avatar"><i class="bi bi-person-fill"></i></div>
                    <div>
                        <div class="sidebar-user-name">Navneet Kumar</div>
                        <div class="sidebar-user-email">navneet@axvero.com</div>
                    </div>
                </div>
                <ul class="sidebar-nav">
                    <li><a href="javascript:void(0)" class="active" data-panel="profile"><i class="bi bi-person"></i> My Profile</a></li>
                    <li><a href="javascript:void(0)" data-panel="orders"><i class="bi bi-box-seam"></i> My Orders</a></li>
                    <li><a href="javascript:void(0)" data-panel="addresses"><i class="bi bi-geo-alt"></i> Saved Addresses</a></li>
                    <li><a href="javascript:void(0)" data-panel="wishlist"><i class="bi bi-heart"></i> Wishlist</a></li>
                    <li><div class="nav-divider"></div></li>
                    <li><a href="javascript:void(0)" data-panel="password"><i class="bi bi-shield-lock"></i> Change Password</a></li>
                    <li><a href="{{ url('/login') }}" class="logout-link"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                </ul>
            </aside>

            <!-- CONTENT -->
            <div class="account-content">

                <!-- ===== PROFILE PANEL ===== -->
                <div class="account-panel active" id="panel-profile">
                    <div class="panel-card">
                        <h1 class="panel-title">My Profile</h1>
                        <p class="panel-subtitle">Manage your personal information and preferences</p>

                        <div class="profile-avatar-section">
                            <div class="profile-avatar-lg">NK</div>
                            <div class="profile-avatar-info">
                                <h3>Navneet Kumar</h3>
                                <p>Member since June 2026 · <span style="color:var(--clr-primary);font-weight:600;">Gold Member</span></p>
                            </div>
                        </div>

                        <form onsubmit="event.preventDefault(); if(typeof showToast==='function') showToast('Profile updated successfully!');">
                            <div class="profile-grid">
                                <div class="profile-field-group">
                                    <label class="profile-field-label">Full Name</label>
                                    <input type="text" class="profile-field-value" value="Navneet Kumar">
                                </div>
                                <div class="profile-field-group">
                                    <label class="profile-field-label">Email Address</label>
                                    <input type="email" class="profile-field-value" value="navneet@axvero.com">
                                </div>
                                <div class="profile-field-group">
                                    <label class="profile-field-label">Mobile Number</label>
                                    <input type="tel" class="profile-field-value" value="+91 99999 88888">
                                </div>
                                <div class="profile-field-group">
                                    <label class="profile-field-label">Date of Birth</label>
                                    <input type="date" class="profile-field-value" value="1998-06-15">
                                </div>
                                <div class="profile-field-group">
                                    <label class="profile-field-label">Gender</label>
                                    <select class="profile-field-value" style="cursor:pointer;">
                                        <option selected>Male</option>
                                        <option>Female</option>
                                        <option>Non-binary</option>
                                        <option>Prefer not to say</option>
                                    </select>
                                </div>
                                <div class="profile-field-group">
                                    <label class="profile-field-label">Location</label>
                                    <input type="text" class="profile-field-value" value="New Delhi, India">
                                </div>
                            </div>
                            <button type="submit" class="btn-save-profile"><i class="bi bi-check2 me-1"></i> Save Changes</button>
                        </form>
                    </div>
                </div>

                <!-- ===== ORDERS PANEL ===== -->
                <div class="account-panel" id="panel-orders">
                    <div class="panel-card" style="padding-bottom:12px;">
                        <h2 class="panel-title">My Orders</h2>
                        <p class="panel-subtitle">Track and manage your recent purchases</p>
                    </div>

                    <!-- Order 1 -->
                    <div class="order-card">
                        <div class="order-header">
                            <div class="order-id-group">
                                <div class="order-id">Order #AXV-2026-001847</div>
                                <div class="order-date">Placed on June 18, 2026 · 3 items</div>
                            </div>
                            <span class="order-status-badge badge-delivered"><i class="bi bi-check-circle-fill"></i> Delivered</span>
                        </div>
                        <div class="order-items-row">
                            <div class="order-item-thumb"><img src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=150&h=180&fit=crop&q=80" alt="Product"></div>
                            <div class="order-item-thumb"><img src="https://images.unsplash.com/photo-1549298916-b41d501d3772?w=150&h=180&fit=crop&q=80" alt="Product"></div>
                            <div class="order-item-thumb"><img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=150&h=180&fit=crop&q=80" alt="Product"></div>
                        </div>
                        <div class="order-bottom-row">
                            <div class="order-total">₹8,256</div>
                            <div class="order-actions">
                                <button class="btn-order-action" onclick="if(typeof showToast==='function') showToast('Reorder added to cart!')"><i class="bi bi-arrow-repeat me-1"></i> Reorder</button>
                                <button class="btn-order-action primary"><i class="bi bi-eye me-1"></i> View Details</button>
                            </div>
                        </div>
                    </div>

                    <!-- Order 2 -->
                    <div class="order-card">
                        <div class="order-header">
                            <div class="order-id-group">
                                <div class="order-id">Order #AXV-2026-001632</div>
                                <div class="order-date">Placed on June 12, 2026 · 2 items</div>
                            </div>
                            <span class="order-status-badge badge-shipped"><i class="bi bi-truck"></i> Shipped</span>
                        </div>
                        <div class="order-items-row">
                            <div class="order-item-thumb"><img src="https://images.unsplash.com/photo-1618354691373-d851c5c3a990?w=150&h=180&fit=crop&q=80" alt="Product"></div>
                            <div class="order-item-thumb"><img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=150&h=180&fit=crop&q=80" alt="Product"></div>
                        </div>
                        <div class="order-bottom-row">
                            <div class="order-total">₹4,698</div>
                            <div class="order-actions">
                                <button class="btn-order-action primary"><i class="bi bi-geo me-1"></i> Track Order</button>
                            </div>
                        </div>
                    </div>

                    <!-- Order 3 -->
                    <div class="order-card">
                        <div class="order-header">
                            <div class="order-id-group">
                                <div class="order-id">Order #AXV-2026-001298</div>
                                <div class="order-date">Placed on May 28, 2026 · 1 item</div>
                            </div>
                            <span class="order-status-badge badge-processing"><i class="bi bi-clock"></i> Processing</span>
                        </div>
                        <div class="order-items-row">
                            <div class="order-item-thumb"><img src="https://images.unsplash.com/photo-1620799140408-edc6dcb6d633?w=150&h=180&fit=crop&q=80" alt="Product"></div>
                        </div>
                        <div class="order-bottom-row">
                            <div class="order-total">₹2,199</div>
                            <div class="order-actions">
                                <button class="btn-order-action" style="color:#ef4444;border-color:#fee2e2;" onclick="if(typeof showToast==='function') showToast('Cancellation requested')"><i class="bi bi-x-circle me-1"></i> Cancel</button>
                                <button class="btn-order-action primary"><i class="bi bi-eye me-1"></i> View Details</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===== ADDRESSES PANEL ===== -->
                <div class="account-panel" id="panel-addresses">
                    <div class="panel-card" style="padding-bottom:12px;">
                        <h2 class="panel-title">Saved Addresses</h2>
                        <p class="panel-subtitle">Manage your delivery addresses</p>
                    </div>
                    <div class="address-grid">
                        <!-- Address 1 (Default) -->
                        <div class="address-card default">
                            <span class="address-default-badge"><i class="bi bi-check-circle-fill"></i> Default</span>
                            <div class="address-type"><i class="bi bi-house-door"></i> Home</div>
                            <div class="address-name">Navneet Kumar</div>
                            <div class="address-text">
                                123 Fashion Avenue, Sector 44<br>
                                Gurugram, Haryana — 122001
                            </div>
                            <div class="address-phone"><i class="bi bi-telephone me-1"></i> +91 99999 88888</div>
                            <div class="address-actions">
                                <button class="btn-address-action" onclick="if(typeof showToast==='function') showToast('Edit address')"><i class="bi bi-pencil me-1"></i> Edit</button>
                                <button class="btn-address-action delete" onclick="if(typeof showToast==='function') showToast('Address removed')"><i class="bi bi-trash3 me-1"></i> Delete</button>
                            </div>
                        </div>

                        <!-- Address 2 -->
                        <div class="address-card">
                            <div class="address-type"><i class="bi bi-building"></i> Office</div>
                            <div class="address-name">Navneet Kumar</div>
                            <div class="address-text">
                                Tower B, 5th Floor, Cyber Hub<br>
                                DLF Cyber City, Gurugram — 122002
                            </div>
                            <div class="address-phone"><i class="bi bi-telephone me-1"></i> +91 99999 77777</div>
                            <div class="address-actions">
                                <button class="btn-address-action" onclick="if(typeof showToast==='function') showToast('Edit address')"><i class="bi bi-pencil me-1"></i> Edit</button>
                                <button class="btn-address-action delete" onclick="if(typeof showToast==='function') showToast('Address removed')"><i class="bi bi-trash3 me-1"></i> Delete</button>
                            </div>
                        </div>

                        <!-- Add New -->
                        <div class="add-address-card" onclick="if(typeof showToast==='function') showToast('Add new address form')">
                            <i class="bi bi-plus-circle"></i>
                            <span>Add New Address</span>
                        </div>
                    </div>
                </div>

                <!-- ===== WISHLIST PANEL ===== -->
                <div class="account-panel" id="panel-wishlist">
                    <div class="panel-card" style="padding-bottom:12px;">
                        <h2 class="panel-title">My Wishlist</h2>
                        <p class="panel-subtitle">Items you've saved for later</p>
                    </div>
                    <div class="wishlist-grid">
                        <div class="wishlist-card">
                            <div class="wishlist-img">
                                <img src="https://images.unsplash.com/photo-1614975058789-41316d0e2e9c?w=400&h=400&fit=crop&q=80" alt="Cotton Cable Shirt">
                                <button class="wishlist-remove-btn" onclick="this.closest('.wishlist-card').style.display='none'; if(typeof showToast==='function') showToast('Removed from wishlist')"><i class="bi bi-x-lg"></i></button>
                            </div>
                            <div class="wishlist-info">
                                <div class="wishlist-name">Cotton Cable Shirt</div>
                                <div class="wishlist-price">₹1,299 <span class="old-price">₹2,599</span></div>
                                <button class="btn-move-cart" onclick="if(typeof showToast==='function') showToast('Moved to cart!')"><i class="bi bi-cart-plus"></i> Move to Cart</button>
                            </div>
                        </div>
                        <div class="wishlist-card">
                            <div class="wishlist-img">
                                <img src="https://images.unsplash.com/photo-1556821840-3a63f95609a7?w=400&h=400&fit=crop&q=80" alt="Skyline Hoodie">
                                <button class="wishlist-remove-btn" onclick="this.closest('.wishlist-card').style.display='none'; if(typeof showToast==='function') showToast('Removed from wishlist')"><i class="bi bi-x-lg"></i></button>
                            </div>
                            <div class="wishlist-info">
                                <div class="wishlist-name">Skyline Zip-Up Hoodie</div>
                                <div class="wishlist-price">₹1,999 <span class="old-price">₹3,499</span></div>
                                <button class="btn-move-cart" onclick="if(typeof showToast==='function') showToast('Moved to cart!')"><i class="bi bi-cart-plus"></i> Move to Cart</button>
                            </div>
                        </div>
                        <div class="wishlist-card">
                            <div class="wishlist-img">
                                <img src="https://images.unsplash.com/photo-1543163521-1bf539c55dd2?w=400&h=400&fit=crop&q=80" alt="Running Shoes">
                                <button class="wishlist-remove-btn" onclick="this.closest('.wishlist-card').style.display='none'; if(typeof showToast==='function') showToast('Removed from wishlist')"><i class="bi bi-x-lg"></i></button>
                            </div>
                            <div class="wishlist-info">
                                <div class="wishlist-name">Classic Running Shoes</div>
                                <div class="wishlist-price">₹4,599 <span class="old-price">₹7,999</span></div>
                                <button class="btn-move-cart" onclick="if(typeof showToast==='function') showToast('Moved to cart!')"><i class="bi bi-cart-plus"></i> Move to Cart</button>
                            </div>
                        </div>
                        <div class="wishlist-card">
                            <div class="wishlist-img">
                                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=400&h=400&fit=crop&q=80" alt="Summer Dress">
                                <button class="wishlist-remove-btn" onclick="this.closest('.wishlist-card').style.display='none'; if(typeof showToast==='function') showToast('Removed from wishlist')"><i class="bi bi-x-lg"></i></button>
                            </div>
                            <div class="wishlist-info">
                                <div class="wishlist-name">Linen Summer Dress</div>
                                <div class="wishlist-price">₹2,499 <span class="old-price">₹4,999</span></div>
                                <button class="btn-move-cart" onclick="if(typeof showToast==='function') showToast('Moved to cart!')"><i class="bi bi-cart-plus"></i> Move to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===== CHANGE PASSWORD PANEL ===== -->
                <div class="account-panel" id="panel-password">
                    <div class="panel-card">
                        <h2 class="panel-title">Change Password</h2>
                        <p class="panel-subtitle">Update your password to keep your account secure</p>

                        <form class="password-form" onsubmit="event.preventDefault(); if(typeof showToast==='function') showToast('Password updated successfully!');">
                            <div class="password-field-group">
                                <label class="password-field-label">Current Password</label>
                                <div class="password-input-wrapper">
                                    <input type="password" class="password-input" placeholder="Enter current password" required>
                                    <button type="button" class="password-toggle" onclick="togglePasswordVisibility(this)"><i class="bi bi-eye"></i></button>
                                </div>
                            </div>
                            <div class="password-field-group">
                                <label class="password-field-label">New Password</label>
                                <div class="password-input-wrapper">
                                    <input type="password" class="password-input" id="newPasswordInput" placeholder="Create new password" required oninput="checkPasswordStrength(this.value)">
                                    <button type="button" class="password-toggle" onclick="togglePasswordVisibility(this)"><i class="bi bi-eye"></i></button>
                                </div>
                                <div class="password-strength" id="passwordStrength">
                                    <div class="strength-bar" id="str1"></div>
                                    <div class="strength-bar" id="str2"></div>
                                    <div class="strength-bar" id="str3"></div>
                                    <div class="strength-bar" id="str4"></div>
                                </div>
                                <div class="strength-text" id="strengthText"></div>
                            </div>
                            <div class="password-field-group">
                                <label class="password-field-label">Confirm New Password</label>
                                <div class="password-input-wrapper">
                                    <input type="password" class="password-input" placeholder="Re-enter new password" required>
                                    <button type="button" class="password-toggle" onclick="togglePasswordVisibility(this)"><i class="bi bi-eye"></i></button>
                                </div>
                            </div>
                            <button type="submit" class="btn-save-profile"><i class="bi bi-shield-check me-1"></i> Update Password</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
    // ===== Sidebar Tab Switching =====
    document.querySelectorAll('.sidebar-nav a[data-panel]').forEach(link => {
        link.addEventListener('click', function() {
            // Update active nav
            document.querySelectorAll('.sidebar-nav a').forEach(a => a.classList.remove('active'));
            this.classList.add('active');

            // Switch panel
            const panelId = this.getAttribute('data-panel');
            document.querySelectorAll('.account-panel').forEach(p => {
                p.classList.remove('active');
                p.style.display = 'none';
            });
            const target = document.getElementById('panel-' + panelId);
            if (target) {
                target.classList.add('active');
                target.style.display = 'block';
                // Re-trigger animation
                target.style.animation = 'none';
                target.offsetHeight; // trigger reflow
                target.style.animation = '';
            }
        });
    });

    // ===== Handle URL query param for initial tab =====
    const urlParams = new URLSearchParams(window.location.search);
    const initialTab = urlParams.get('tab');
    if (initialTab) {
        const matchingLink = document.querySelector(`.sidebar-nav a[data-panel="${initialTab}"]`);
        if (matchingLink) {
            matchingLink.click();
        }
    }

    // ===== Password Visibility Toggle =====
    function togglePasswordVisibility(btn) {
        const input = btn.previousElementSibling;
        const icon = btn.querySelector('i');
        if (input.type === 'password') {
            input.type = 'text';
            icon.className = 'bi bi-eye-slash';
        } else {
            input.type = 'password';
            icon.className = 'bi bi-eye';
        }
    }

    // ===== Password Strength Checker =====
    function checkPasswordStrength(password) {
        const bars = [document.getElementById('str1'), document.getElementById('str2'), document.getElementById('str3'), document.getElementById('str4')];
        const text = document.getElementById('strengthText');
        let strength = 0;

        if (password.length >= 6) strength++;
        if (password.length >= 10) strength++;
        if (/[A-Z]/.test(password) && /[a-z]/.test(password)) strength++;
        if (/[0-9]/.test(password) && /[^A-Za-z0-9]/.test(password)) strength++;

        bars.forEach((bar, i) => {
            bar.className = 'strength-bar';
            if (i < strength) {
                bar.classList.add('active');
                if (strength <= 1) bar.classList.add('weak');
                else if (strength <= 2) bar.classList.add('medium');
                else bar.classList.add('strong');
            }
        });

        const labels = ['', 'Weak', 'Fair', 'Good', 'Strong'];
        const colors = ['', '#ef4444', '#f59e0b', '#059669', '#059669'];
        text.textContent = labels[strength] || '';
        text.style.color = colors[strength] || '';
    }
</script>
@endsection
