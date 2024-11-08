<?php

namespace App\Orchid\Layouts;

use App\Models\Skillgroup;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;

class SkillgroupListLayout extends Table
{
    /**
     * Data source.
     *
     * @var string
     */
    public $target = 'skillgroup';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('title', 'Title')
                ->render(function (Skillgroup $skillgroup) {
                    return Link::make($skillgroup->title)
                        ->route('platform.skillgroup.edit', $skillgroup);
                }),
            TD::make('updated_at', 'Last edit')
        ];
    }
}