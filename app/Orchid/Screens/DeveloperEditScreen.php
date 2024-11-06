<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Models\Developer;
use App\Models\User;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;

class DeveloperEditScreen extends Screen
{

    public $developer;

    public function query(Developer $developer): array
    {
        return [
            'developer' => $developer
        ];
    }

    public function name(): ?string
    {
        return $this->developer->exists ? 'Edit' : 'Creat';
    }

    public function description(): ?string
    {
        return "Person info";
    }

    public function commandBar(): array
    {
        return [
            Button::make('Create')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->developer->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->developer->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->developer->exists),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('developer.nikname')
                    ->title('Nick')
                    ->placeholder('nikname'),

                Input::make('developer.fio')
                    ->title('Name'),

                Input::make('developer.city')
                    ->title('City')
                    ->placeholder('Moscow'),

                Quill::make('developer.content')
                    ->title('Text')

            ])
        ];
    }

    public function createOrUpdate(Request $request)
    {
        $this->developer->fill($request->get('developer'))->save();

        Alert::info('You have successfully created a developer.');

        return redirect()->route('platform.developer.edit');
    }

    public function remove()
    {
        $this->developer->delete();

        Alert::info('You have successfully deleted the developer.');

        return redirect()->route('platform.developer.edit');
    }
}
