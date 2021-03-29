<?php

namespace App\Controllers;

use App\Services\View\View;

class ArticleController 
{
    /**
     * List of articles
     *
     * @return void
     */
    public function index()
    {
        $listOfArticles = [
            'articles' => [
                    'https://vrgl.ir/nY2Zz@مفاهیم و کاربردهای شبکه بلاکچین',
                    'https://vrgl.ir/gKn8k@بیت کوین و قورت بده!',
                    'https://vrgl.ir/jbKCQ@واژه ‏ها و اصطلاحات فني و تخصصی بلاکچین',
                    'https://vrgl.ir/efVnX@دو بار خرج کردن در بلاکچین (بیت کوین)',
            ]
        ];

        View::load('article', $listOfArticles);
    }
}