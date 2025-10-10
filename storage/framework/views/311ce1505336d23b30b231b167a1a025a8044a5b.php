<?php if (! $__env->hasRenderedOnce('c695d595-0a03-4291-8dde-a4d72a3248b4')): $__env->markAsRenderedOnce('c695d595-0a03-4291-8dde-a4d72a3248b4');
$__env->startPush('styles'); ?>
<style>
    .modern-announcement {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 24px;
        padding: 50px;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(123, 54, 181, 0.1);
        box-shadow:
            0 20px 60px rgba(0, 0, 0, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.6);
    }

    .announcement-glow {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 50% 0%, rgba(123, 54, 181, 0.1) 0%, transparent 50%);
        pointer-events: none;
    }

    .particles-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    .particle {
        position: absolute;
        background: currentColor;
        border-radius: 50%;
        opacity: 0;
    }

    .announcement-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 40px;
        flex-wrap: wrap;
        gap: 20px;
    }

    .icon-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .icon-orb {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #7b36b5, #3c1a55);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 32px;
        position: relative;
        z-index: 3;
        box-shadow: 0 10px 30px rgba(123, 54, 181, 0.3);
    }

    .pulse-ring {
        position: absolute;
        width: 100px;
        height: 100px;
        border: 2px solid #7b36b5;
        border-radius: 50%;
        animation: pulse 2s ease-out infinite;
        z-index: 2;
        left: -9px;
    }

    .pulse-ring.delay-1 {
        animation-delay: 1s;
        width: 120px;
        height: 120px;
        left: -18px;
    }

    .status-tag {
        background: linear-gradient(135deg, #7b36b5, #3c1a55);
        color: white;
        padding: 12px 24px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 14px;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        gap: 8px;
        position: relative;
        overflow: hidden;
    }

    .tag-pulse {
        width: 8px;
        height: 8px;
        background: #ffd700;
        border-radius: 50%;
        animation: blink 2s ease-in-out infinite;
    }

    .announcement-body {
        text-align: center;
        margin-bottom: 40px;
    }

    .main-heading {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 30px;
        position: relative;
    }

    .text-gradient {
        background: linear-gradient(135deg, #7b36b5 0%, #3c1a55 50%, #1f0031 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .heading-underline {
        width: 100px;
        height: 4px;
        background: linear-gradient(90deg, #7b36b5, #3c1a55);
        margin: 20px auto 0;
        border-radius: 2px;
        animation: slideIn 1s ease-out;
    }

    .announcement-message {
        font-size: 1.3rem;
        line-height: 1.6;
        color: #666;
        margin-bottom: 40px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .highlight-text {
        background: linear-gradient(135deg, #7b36b5, #3c1a55);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-weight: 700;
    }

    .progress-section {
        max-width: 400px;
        margin: 40px auto;
    }

    .progress-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        font-weight: 600;
        color: #333;
    }

    .progress-track {
        width: 100%;
        height: 12px;
        background: rgba(123, 54, 181, 0.1);
        border-radius: 10px;
        overflow: hidden;
        position: relative;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #7b36b5, #3c1a55);
        border-radius: 10px;
        width: 0;
        position: relative;
        transition: width 1.5s ease-in-out;
    }

    .progress-shine {
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
        animation: shine 2s infinite;
    }

    .features-showcase {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin: 40px 0;
        flex-wrap: wrap;
    }

    .feature-bubble {
        background: rgba(123, 54, 181, 0.1);
        padding: 20px;
        border-radius: 20px;
        text-align: center;
        min-width: 120px;
        transform: translateY(20px);
        opacity: 0;
        animation: floatUp 0.6s ease-out forwards;
    }

    .bubble-icon {
        font-size: 2rem;
        margin-bottom: 8px;
    }

    .checklist {
        max-width: 400px;
        margin: 40px auto;
        text-align: left;
    }

    .check-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 15px 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        color: #666;
    }

    .check-item:last-child {
        border-bottom: none;
    }

    .check-item.checked {
        color: #7b36b5;
    }

    .check-item.checked i {
        color: #51cf66;
    }

    .check-item.active {
        color: #7b36b5;
        font-weight: 600;
    }

    .check-item.active i {
        color: #7b36b5;
        animation: spin 1s linear infinite;
    }

    .announcement-footer {
        display: flex;
        justify-content: center;
    }

    .countdown-card, .info-card {
        background: rgba(123, 54, 181, 0.05);
        border: 2px solid rgba(123, 54, 181, 0.1);
        border-radius: 16px;
        padding: 25px;
        display: flex;
        align-items: center;
        gap: 15px;
        min-width: 250px;
    }

    .countdown-icon, .info-icon {
        font-size: 2rem;
    }

    .countdown-content, .info-content {
        flex: 1;
    }

    .countdown-label, .info-title {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 5px;
    }

    .countdown-value, .info-desc {
        font-size: 1.1rem;
        font-weight: 600;
        color: #333;
    }

    /* Animations */
    @keyframes pulse {
        0% {
            transform: scale(1);
            opacity: 1;
        }
        100% {
            transform: scale(1.5);
            opacity: 0;
        }
    }

    @keyframes blink {
        0%, 50% {
            opacity: 1;
        }
        51%, 100% {
            opacity: 0.3;
        }
    }

    @keyframes slideIn {
        from {
            width: 0;
        }
        to {
            width: 100px;
        }
    }

    @keyframes shine {
        0% {
            left: -100%;
        }
        100% {
            left: 100%;
        }
    }

    @keyframes floatUp {
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes spin {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }

    /* Status-specific styles */
    .modern-announcement.hold .icon-orb {
        background: linear-gradient(135deg, #ff6b6b, #ee5a24);
    }

    .modern-announcement.hold .status-tag {
        background: linear-gradient(135deg, #ff6b6b, #ee5a24);
    }

    .modern-announcement.hold .pulse-ring {
        border-color: #ff6b6b;
    }

    .modern-announcement.hold .text-gradient {
        background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 50%, #c23616 100%);
        background-clip: text;
    }

    .modern-announcement.hold .heading-underline {
        background: linear-gradient(90deg, #ff6b6b, #ee5a24);
    }

    .modern-announcement.hold .highlight-text {
        background: linear-gradient(135deg, #ff6b6b, #ee5a24);
        background-clip: text;
    }

    .modern-announcement.hold .progress-fill {
        background: linear-gradient(90deg, #ff6b6b, #ee5a24);
    }

    .modern-announcement.hold .countdown-card {
        border-color: rgba(255, 107, 107, 0.2);
        background: rgba(255, 107, 107, 0.05);
    }

    @media (max-width: 768px) {
        .modern-announcement {
            padding: 30px 20px;
            margin: 20px 0;
        }

        .main-heading {
            font-size: 2.2rem;
        }

        .announcement-message {
            font-size: 1.1rem;
        }

        .announcement-header {
            flex-direction: column;
            text-align: center;
        }

        .features-showcase {
            flex-direction: column;
            align-items: center;
        }

        .feature-bubble {
            width: 100%;
            max-width: 200px;
        }
    }
</style>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('82c75388-8318-40cb-b412-6b4257fe8bd7')): $__env->markAsRenderedOnce('82c75388-8318-40cb-b412-6b4257fe8bd7');
$__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add some interactive effects
            const alertBox = document.querySelector('.alert-icon-big');
            if (alertBox) {
                alertBox.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                    this.style.transition = 'all 0.3s ease';
                });

                alertBox.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            }

            // Add typing effect for the announcement text
            const announcementText = "Thank You for pre-registering with LinksCircle. We will start affiliation approvals in <?php echo e(now()->format('F Y')); ?>. Our team will contact you after the launch.";
            const announcementElement = document.querySelector('.announcement-text');

            if (announcementElement) {
                let i = 0;
                const typeWriter = () => {
                    if (i < announcementText.length) {
                        announcementElement.innerHTML += announcementText.charAt(i);
                        i++;
                        setTimeout(typeWriter, 30);
                    }
                };

                // Start typing effect after a delay
                setTimeout(typeWriter, 1000);
            }
        });
    </script>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>

    <?php if(auth()->user()->status == "active"): ?>
        <!-- Active user content can go here -->
    <?php else: ?>
<div class="contents">
    <div class="row">
        <div class="col-lg-12">
            <?php if(auth()->user()->status == \App\Models\User::PENDING): ?>
                <div class="modern-announcement pending">
                    <div class="announcement-glow"></div>
                    <div class="particles-container" id="particles-1"></div>

                    <div class="announcement-header">
                        <div class="icon-wrapper">
                            <div class="icon-orb">
                                <i class="ri-rocket-2-fill"></i>
                            </div>
                            <div class="pulse-ring"></div>
                            <div class="pulse-ring delay-1"></div>
                        </div>
                    </div>

                    <div class="announcement-body">
                        <h1 class="main-heading">
                            <span class="text-gradient">Announcement</span>
                            <div class="heading-underline"></div>
                        </h1>

                        <p class="announcement-message">
                            You're officially on the pre-launch list! We're putting the final touches on LinksCircle
                            to ensure you get the best experience. Launch sequence initiated!
                        </p>

                    </div>

                    <div class="announcement-footer">
                        <div class="countdown-card">
                            <div class="countdown-icon">⏰</div>
                            <div class="countdown-content">
                                <div class="countdown-label">Expected Launch</div>
                                <div class="countdown-value"><?php echo e(now()->format('F Y')); ?></div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php elseif(auth()->user()->status == \App\Models\User::HOLD): ?>
                <div class="modern-announcement hold">
                    <div class="announcement-glow"></div>
                    <div class="particles-container" id="particles-2"></div>

                    <div class="announcement-header">
                        <div class="icon-wrapper">
                            <div class="icon-orb">
                                <i class="ri-search-eye-fill"></i>
                            </div>
                            <div class="pulse-ring"></div>
                            <div class="pulse-ring delay-1"></div>
                        </div>
                        <div class="status-tag">
                            <span class="tag-pulse"></span>
                            UNDER REVIEW
                        </div>
                    </div>

                    <div class="announcement-body">
                        <h1 class="main-heading">
                            <span class="text-gradient">Your account is on Hold.</span>
                            <div class="heading-underline"></div>
                        </h1>

                        <p class="announcement-message">
                            Our team is currently reviewing your application to ensure the best experience for all our partners.
                            This usually takes <span class="highlight-text">2-3 business days</span>. We'll notify you immediately once approved.
                        </p>
                    </div>

                    <div class="announcement-footer">
                        <div class="info-card">
                            <div class="info-icon">💼</div>
                            <div class="info-content">
                                <div class="info-title">What's Next?</div>
                                <div class="info-desc">You'll receive an email with your approval status and next steps.</div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.advertiser.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Downloads\revdb\resources\views/template/advertiser/dashboard.blade.php ENDPATH**/ ?>