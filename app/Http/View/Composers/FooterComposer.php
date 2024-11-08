<?php

namespace App\Http\View\Composers;

use App\Models\Developer; // Модель, данные которой нужно отобразить
use Illuminate\View\View;

class FooterComposer
{
    public function compose(View $view)
    {
        // Получаем данные из модели (например, информацию для футера)
        $developer = Developer::first(); // или любой другой метод получения данных

        // Делаем данные доступными во всех шаблонах
        $view->with('developer', $developer);
    }
}
