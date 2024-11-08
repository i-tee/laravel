<?php

namespace App\Orchid\Layouts;

use App\Models\Skill;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;

class SkillListLayout extends Table
{
    /**
     * Data source.
     *
     * @var string
     */
    public $target = 'skill';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('name', 'Name')
                ->render(function (Skill $skill) {
                    return Link::make($skill->name)
                        ->route('platform.skill.edit', $skill);
                }),

            TD::make('percent', 'Progress'),
            TD::make('category_id', 'Category'),
            TD::make('developer_id', 'Developer')
        ];
    }
}