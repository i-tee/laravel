<?php

namespace App\Orchid\Screens;

use App\Models\Skillgroup;
use App\Models\User;
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

class SkillgroupEditScreen extends Screen
{
    /**
     * @var Post
     */
    public $skillgroup;

    /**
     * Query data.
     *
     * @param Skillgroup $post
     *
     * @return array
     */
    public function query(Skillgroup $skillgroup): array
    {
        return [
            'skillgroup' => $skillgroup
        ];
    }

    /**
     * The name is displayed on the user's screen and in the headers
     */
    public function name(): ?string
    {
        return $this->skillgroup->exists ? 'Edit skillgroup' : 'Creating a new skillgroup';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return "skillgroups";
    }

    /**
     * Button commands.
     *
     * @return Link[]
     */
    public function commandBar(): array
    {
        return [
            Button::make('Create skillgroup')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->skillgroup->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->skillgroup->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->skillgroup->exists),
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
            Layout::rows([
                Input::make('skillgroup.title')
                    ->title('Title')
            ])
        ];
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Request $request)
    {
        $this->skillgroup->fill($request->get('skillgroup'))->save();

        Alert::info('You have successfully created a skillgroup.');

        return redirect()->route('platform.skillgroup.list');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove()
    {
        $this->skillgroup->delete();

        Alert::info('You have successfully deleted the skillgroup.');

        return redirect()->route('platform.skillgroup.list');
    }
}