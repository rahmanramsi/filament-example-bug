<?php

namespace App\Http\Livewire;

use Filament\Forms;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class FilamentForm extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public User $user;

    public function mount(): void
    {
        $this->form->fill();
    }

    public function render()
    {
        return view('livewire.filament-form');
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\TextInput::make('email')->type('email')->required(),
            Forms\Components\TextInput::make('password')
                ->type('password')
                ->required()
                ->same('passwordConfirmation')
                ->dehydrateStateUsing(fn ($state) => Hash::make($state)),
            Forms\Components\TextInput::make('passwordConfirmation')
                ->type('password')
                ->required()
                ->dehydrated(false),
            Forms\Components\BelongsToManyMultiSelect::make('roles')->relationship('roles', 'name'),
            Forms\Components\SpatieMediaLibraryFileUpload::make('avatar'),
        ];
    }

    protected function getFormModel(): string
    {
        return User::class;
    }

    public function submit()
    {
        $user =   User::create($this->form->getState());
        $this->form->model($user)->saveRelationships();
    }
}
