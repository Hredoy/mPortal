<?php if(config('settings.googleanalyticsId')): ?>
    
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e(config('settings.googleanalyticsId')); ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '<?php echo e(config('settings.googleanalyticsId')); ?>');
    </script>
<?php endif; ?>
<?php /**PATH D:\laragon\www\mPortal\resources\views/scripts/ga-analytics.blade.php ENDPATH**/ ?>