<?php

namespace App\Orchid\Screens;

use App\Orchid\Layouts\SkillgroupListLayout;
use App\Models\Skillgroup;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class SkillgroupListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'skillgroup' => Skillgroup::paginate()
        ];
    }

    /**
     * The name is displayed on the user's screen and in the headers
     */
    public function name(): ?string
    {
        return 'skill group';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return "All skillgroups";
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
                ->route('platform.skillgroup.edit')
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
            SkillgroupListLayout::class
        ];
    }
}