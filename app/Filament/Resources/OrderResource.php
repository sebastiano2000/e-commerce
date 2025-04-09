<?php

namespace App\Filament\Resources;

use App\Models\Order;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Forms;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('customer_name')->disabled(),
                Forms\Components\TextInput::make('email')->disabled(),
                Forms\Components\TextInput::make('quantity'),
                Forms\Components\TextInput::make('total_price')->disabled(),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending'   => 'Pending',
                        'cancelled' => 'Cancelled',
                        'completed' => 'Completed',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(function (Builder $query) {
                // Only show orders for the authenticated customer
                return $query->where('customer_id', Auth::guard('customer')->id());
            })
            ->columns([
                Tables\Columns\TextColumn::make('customer_name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('total_price'),
                Tables\Columns\TextColumn::make('status'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => \App\Filament\Resources\OrderResource\Pages\ListOrders::route('/'),
            'edit'   => \App\Filament\Resources\OrderResource\Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
