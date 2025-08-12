<?php

namespace App\Providers;

use App\Enums\Role;
use App\Models\ActivityTicket;
use App\Models\FerryTicket;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use App\Models\Job;
use App\Models\Room;
use App\Models\RoomBooking;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();

        Gate::define('edit-job', function(User $user, Job $job)  {
            return $job->employer->user->is($user);
        });

        Gate::define('destroy-job', function(User $user, Job $job)  {
            return $job->employer->user->is($user);
        });

        Gate::define('create-activity', function(User $user)  {
            return $user->role === Role::PARK_ADMIN || $user->role === Role::SUPER_ADMIN;
        });

        Gate::define('edit-activity', function(User $user)  {
            return $user->role === Role::PARK_ADMIN || $user->role === Role::SUPER_ADMIN;
        });

        Gate::define('delete-activity', function(User $user)  {
            return $user->role === Role::PARK_ADMIN || $user->role === Role::SUPER_ADMIN;
        });
        
        Gate::define('create-ferry', function(User $user)  {
            return $user->role === Role::FERRY_ADMIN || $user->role === Role::SUPER_ADMIN;
        });

        Gate::define('edit-ferry', function(User $user)  {
            return $user->role === Role::FERRY_ADMIN || $user->role === Role::SUPER_ADMIN;
        });

        Gate::define('delete-ferry', function(User $user)  {
            return $user->role === Role::FERRY_ADMIN || $user->role === Role::SUPER_ADMIN;
        });

        Gate::define('create-room', function(User $user)  {
            return $user->role === Role::HOTEL_ADMIN || $user->role === Role::SUPER_ADMIN;
        });

        Gate::define('edit-room', function(User $user)  {
            return $user->role === Role::HOTEL_ADMIN || $user->role === Role::SUPER_ADMIN;
        });

        Gate::define('delete-room', function(User $user)  {
            return $user->role === Role::HOTEL_ADMIN || $user->role === Role::SUPER_ADMIN;
        });

        Gate::define('book-room', function(User $user, Room $room)  {
            return !$room->booked;
        });

        Gate::define('view-activity-ticket', function(User $user, ActivityTicket $activityTicket)  {
            return $activityTicket['visitor_id'] === $user->id || $user->role === Role::PARK_ADMIN || $user->role === Role::SUPER_ADMIN;
        });

        Gate::define('view-ferry-ticket', function(User $user, FerryTicket $ferryTicket)  {
            return $ferryTicket['visitor_id'] === $user->id || $user->role === Role::FERRY_ADMIN || $user->role === Role::SUPER_ADMIN;
        });

        Gate::define('view-room-booking', function(User $user, RoomBooking $roomBooking)  {
            return $roomBooking['visitor_id'] === $user->id || $user->role === Role::HOTEL_ADMIN || $user->role === Role::SUPER_ADMIN;
        });

    }
}
