@extends('layouts.app')

@section('title', 'Axvero — Seller Dashboard')

@push('styles')
<style>
    .sd-body { background: #f4f5f7; min-height: 80vh; padding: 30px 0 60px; }
    .sd-welcome { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px; margin-bottom: 28px; }
    .sd-welcome h1 { font-size: 1.6rem; font-weight: 800; color: #111827; margin: 0; }
    .sd-welcome h1 small { font-size: 0.9rem; font-weight: 400; color: #6b7280; display: block; }
    .sd-badge { background: #6A0DAD; color: #fff; padding: 6px 18px; border-radius: 50px; font-size: 0.8rem; font-weight: 600; }
    .sd-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 32px; }
    .sd-stat-card { background: #fff; border-radius: 12px; border: 1px solid #e5e7eb; padding: 24px; transition: box-shadow 0.25s; }
    .sd-stat-card:hover { box-shadow: 0 8px 24px rgba(0,0,0,0.06); }
    .sd-stat-icon { width: 44px; height: 44px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; margin-bottom: 16px; color: #fff; }
    .sd-stat-icon.purple { background: #6A0DAD; }
    .sd-stat-icon.green { background: #059669; }
    .sd-stat-icon.blue { background: #2563eb; }
    .sd-stat-icon.orange { background: #ea580c; }
    .sd-stat-number { font-size: 1.6rem; font-weight: 800; color: #111827; margin-bottom: 4px; }
    .sd-stat-label { font-size: 0.85rem; color: #6b7280; }
    .sd-main-row { display: grid; grid-template-columns: 1fr 380px; gap: 24px; align-items: start; }
    .sd-section { background: #fff; border-radius: 12px; border: 1px solid #e5e7eb; padding: 24px; }
    .sd-section-title { font-size: 1rem; font-weight: 700; color: #111827; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid #e5e7eb; display: flex; align-items: center; gap: 8px; }
    .sd-section-title i { color: #6A0DAD; }
    .sd-order-item { display: flex; align-items: center; justify-content: space-between; padding: 14px 0; border-bottom: 1px solid #f3f4f6; }
    .sd-order-item:last-child { border-bottom: none; }
    .sd-order-info h4 { font-size: 0.92rem; font-weight: 700; margin: 0 0 4px; color: #111827; }
    .sd-order-info p { font-size: 0.8rem; color: #6b7280; margin: 0; }
    .sd-order-status { font-size: 0.75rem; font-weight: 700; padding: 4px 12px; border-radius: 50px; text-transform: uppercase; }
    .sd-order-status.processing { background: #fef3c7; color: #92400e; }
    .sd-order-status.shipped { background: #dbeafe; color: #1e40af; }
    .sd-order-status.delivered { background: #d1fae5; color: #065f46; }
    .sd-order-status.cancelled { background: #fee2e2; color: #991b1b; }
    .sd-revenue { text-align: center; padding: 20px 0; }
    .sd-revenue-amount { font-size: 2rem; font-weight: 800; color: #059669; }
    .sd-revenue-label { font-size: 0.85rem; color: #6b7280; margin-top: 4px; }
    .sd-quick-action { display: flex; align-items: center; gap: 14px; padding: 14px 0; border-bottom: 1px solid #f3f4f6; cursor: pointer; transition: color 0.2s; }
    .sd-quick-action:last-child { border-bottom: none; }
    .sd-quick-action:hover { color: #6A0DAD; }
    .sd-quick-action i { width: 36px; height: 36px; border-radius: 8px; background: #f3e8ff; color: #6A0DAD; display: flex; align-items: center; justify-content: center; font-size: 1rem; flex-shrink: 0; }
    .sd-quick-action h4 { font-size: 0.9rem; font-weight: 600; margin: 0 0 2px; color: #111827; }
    .sd-quick-action p { font-size: 0.78rem; color: #6b7280; margin: 0; }
    @media (max-width: 991.98px) { .sd-grid { grid-template-columns: repeat(2, 1fr); } .sd-main-row { grid-template-columns: 1fr; } }
    @media (max-width: 575.98px) { .sd-grid { grid-template-columns: 1fr; } .sd-welcome h1 { font-size: 1.3rem; } }
</style>
@endpush

@section('content')
<div class="sd-body">
    <div class="container">
        <div class="sd-welcome">
            <div>
                <h1>Hello, Navneet <small>Seller Dashboard</small></h1>
            </div>
            <span class="sd-badge"><i class="bi bi-shop me-1"></i> Store: Navneet Fashions</span>
        </div>

        <div class="sd-grid">
            <div class="sd-stat-card">
                <div class="sd-stat-icon purple"><i class="bi bi-bag-check"></i></div>
                <div class="sd-stat-number">24</div>
                <div class="sd-stat-label">Total Orders</div>
            </div>
            <div class="sd-stat-card">
                <div class="sd-stat-icon green"><i class="bi bi-currency-rupee"></i></div>
                <div class="sd-stat-number">₹1,28,490</div>
                <div class="sd-stat-label">Total Revenue</div>
            </div>
            <div class="sd-stat-card">
                <div class="sd-stat-icon blue"><i class="bi bi-truck"></i></div>
                <div class="sd-stat-number">8</div>
                <div class="sd-stat-label">Pending Shipments</div>
            </div>
            <div class="sd-stat-card">
                <div class="sd-stat-icon orange"><i class="bi bi-star"></i></div>
                <div class="sd-stat-number">4.7</div>
                <div class="sd-stat-label">Avg. Rating</div>
            </div>
        </div>

        <div class="sd-main-row">
            <div>
                <div class="sd-section">
                    <div class="sd-section-title"><i class="bi bi-receipt"></i> Recent Orders</div>
                    <div class="sd-order-item">
                        <div class="sd-order-info">
                            <h4>#AXV-2026-0842</h4>
                            <p>Premium Linen Shirt × 2 — ₹2,598</p>
                        </div>
                        <span class="sd-order-status shipped">Shipped</span>
                    </div>
                    <div class="sd-order-item">
                        <div class="sd-order-info">
                            <h4>#AXV-2026-0839</h4>
                            <p>Running Sport Shoes × 1 — ₹3,499</p>
                        </div>
                        <span class="sd-order-status processing">Processing</span>
                    </div>
                    <div class="sd-order-item">
                        <div class="sd-order-info">
                            <h4>#AXV-2026-0831</h4>
                            <p>Leather Crossbody Bag × 1 — ₹2,199</p>
                        </div>
                        <span class="sd-order-status delivered">Delivered</span>
                    </div>
                    <div class="sd-order-item">
                        <div class="sd-order-info">
                            <h4>#AXV-2026-0825</h4>
                            <p>Cotton Cable Knit Polo × 3 — ₹2,997</p>
                        </div>
                        <span class="sd-order-status delivered">Delivered</span>
                    </div>
                    <div class="sd-order-item">
                        <div class="sd-order-info">
                            <h4>#AXV-2026-0818</h4>
                            <p>Linen Long-Sleeve Shirt × 1 — ₹1,200</p>
                        </div>
                        <span class="sd-order-status cancelled">Cancelled</span>
                    </div>
                </div>
            </div>

            <div>
                <div class="sd-section mb-4">
                    <div class="sd-section-title"><i class="bi bi-graph-up"></i> This Month</div>
                    <div class="sd-revenue">
                        <div class="sd-revenue-amount">₹42,350</div>
                        <div class="sd-revenue-label">Revenue</div>
                    </div>
                    <div style="display:flex;justify-content:space-between;padding:12px 0 0;font-size:0.85rem;color:#6b7280;border-top:1px solid #e5e7eb;">
                        <span>Orders: <strong style="color:#111827;">18</strong></span>
                        <span>Conversion: <strong style="color:#111827;">5.2%</strong></span>
                    </div>
                </div>

                <div class="sd-section">
                    <div class="sd-section-title"><i class="bi bi-lightning"></i> Quick Actions</div>
                    <div class="sd-quick-action"><i class="bi bi-plus-lg"></i><div><h4>Add New Product</h4><p>List a new item in your store</p></div></div>
                    <div class="sd-quick-action"><i class="bi bi-box"></i><div><h4>Update Inventory</h4><p>Manage stock levels</p></div></div>
                    <div class="sd-quick-action"><i class="bi bi-tag"></i><div><h4>Create Offer</h4><p>Set up discounts &amp; promotions</p></div></div>
                    <div class="sd-quick-action"><i class="bi bi-bar-chart"></i><div><h4>View Reports</h4><p>Sales &amp; performance analytics</p></div></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
