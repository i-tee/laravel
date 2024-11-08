<?php

namespace App\Orchid\Screens;

use App\Models\User;
use App\Models\Skill;
use App\Models\Skillgroup;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class SkillEditScreen extends Screen
{

    public $skill;

    public function query(Skill $skill): array
    {
        return [
            'skill' => $skill
        ];
    }

    public function name(): ?string
    {
        return $this->skill->exists ? 'Edit skill' : 'Creating a new skill';
    }

    public function description(): ?string
    {
        return "Skills list";
    }

    public function commandBar(): array
    {
        return [
            Button::make('Create skill')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->skill->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->skill->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->skill->exists),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('skill.name')
                    ->title('Name')
                    ->placeholder('Attractive but mysterious title')
                    ->help('Specify a short descriptive title for this skill.'),

                Input::make('skill.percent')
                    ->title('Percent expirience')
                    ->help('1 - 100'),

                Relation::make('skill.developer_id')
                    ->title('Developer')
                    ->fromModel(User::class, 'name'),

                Relation::make('skill.category_id')
                    ->title('Skill category')
                    ->fromModel(Skillgroup::class, 'title')
            ])
        ];
    }

    public function createOrUpdate(Request $request)
    {
        $this->skill->fill($request->get('skill'))->save();

        Alert::info('You have successfully created a skill.');

        return redirect()->route('platform.skill.list');
    }

    public function remove()
    {
        $this->skill->delete();

        Alert::info('You have successfully deleted the skill.');

        return redirect()->route('platform.skill.list');
    }

}
