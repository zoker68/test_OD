<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarBooking\SearchRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Models\User;
use Carbon\Carbon;

class CarBookingController extends Controller
{
    public function __invoke(SearchRequest $request)
    {
        $user = User::find(1);

        $comfortCategories = $user->position->comfortCategories;

        $cars = Car::whereIn('comfort_category_id', $comfortCategories->pluck('id'));

        $search = $request->validated();

        if (isset($search['comfort'])) {
            $cars->where('comfort_category_id', '=', $search['comfort']);
        }
        if (isset($search['model'])) {
            $cars->where('model', 'LIKE', "%" . $search['model'] . "%");
        }


        $startDateTime = Carbon::parse($search['start_date']);
        $endDateTime = Carbon::parse($search['end_date']);

        $cars->whereDoesntHave('bookings', function ($query) use ($startDateTime, $endDateTime) {
            $query->where(function ($q) use ($startDateTime, $endDateTime) {
                $q->where('start_date', '>=', $startDateTime)
                    ->where('start_date', '<=', $endDateTime);
            })->orWhere(function ($q) use ($startDateTime, $endDateTime) {
                $q->where('end_date', '>=', $startDateTime)
                    ->where('end_date', '<=', $endDateTime);
            })->orWhere(function ($q) use ($startDateTime, $endDateTime) {
                $q->where('start_date', '<=', $startDateTime)
                    ->where('end_date', '>=', $endDateTime);
            });
        });

        $availableCars = $cars->get();

        return CarResource::collection($availableCars);
    }
}
