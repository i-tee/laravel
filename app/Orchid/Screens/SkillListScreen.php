<?php

namespace App\Orchid\Screens;

use App\Orchid\Layouts\SkillListLayout;
use App\Models\Skill;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class SkillListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'skill' => Skill::all()
        ];
    }

    /**
     * The name is displayed on the user's screen and in the headers
     */
    public function name(): ?string
    {
        return 'Skill';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return "All Skills";
    }

    /**
     * Button commands.
     *
     * @return Link[]
     */
    public function commandBar(): array
    {
        return [
            Link::make('Create new')
                ->icon('pencil')
                ->route('platform.skill.edit')
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            SkillListLayout::class
        ];
    }
}
