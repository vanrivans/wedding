<ul class="post__list">

    <?php
    for ($i = 0; $i < 9; $i++) : ?>

    <li class="post__item">
        <div class="post__inner">
            <a href="<?php echo e(base_url('blog')); ?>" class="post__link">
                <div class="post__img-wrap">
                    <div class="post__img">
                        <img src="<?php echo e(base_url('assets/images/home/blog-1.jpeg')); ?>" alt="夏バテを回復するための食事や生活習慣とは？">
                    </div>
                </div>
                <div class="post__content">
                    <h4 class="post__title" title="夏バテを回復するための食事や生活習慣とは？">夏バテを回復するための食事や生活習慣とは？</h4>
                    <span class="post__date">2021.09.17</span>
                    <div class="post__btn">Learn More</div>
                </div>
            </a>
            <a href="<?php echo e(base_url('blogs')); ?>" class="post__name">Healthy Life</a>
        </div>
    </li>

    <?php endfor; ?>

</ul>

<!-- <div class="pagination">
    <a href="https://mygreengrowers.com/blog/" class="pagination__start  disabled"></a>
    <a href="#" class="pagination__prev disabled"></a>
    <ul class="pagination__list">
        <li class="pagination__item">
            <span aria-current="page" class="page-numbers current">1</span>                
        </li>
        <li class="pagination__item">
            <a class="page-numbers" href="https://mygreengrowers.com/blog/page/2/">2</a>                
        </li>                
    </ul>
    <a href="https://mygreengrowers.com/blog/page/2/" class="pagination__next"></a>
    <a href="https://mygreengrowers.com/blog/page/2/" class="pagination__end "></a>
</div> --><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Trainers/views/partial_detail/middle_content.blade.php ENDPATH**/ ?>