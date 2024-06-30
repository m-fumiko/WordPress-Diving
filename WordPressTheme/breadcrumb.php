<div class="breadcrumb breadcrumb-layout <?php if (is_404()) echo 'breadcrumb--not-found'; ?>">
    <div class="breadcrumb__inner inner">
        <?php if (function_exists('bcn_display')) {
            bcn_display();
        } ?>
    </div>
</div>