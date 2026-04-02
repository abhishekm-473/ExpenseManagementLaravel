 @include('partials.header')
 @include('partials.MasterNav')
 @if(Auth::check())
        @php
            $userName = ucwords(strtoLower(Auth::user()->first_name));
            date_default_timezone_set('Asia/Kolkata');
            $hour = date('H');

            if($hour >4 && $hour < 12){
                $greeting = "Good Morning";
            }
            elseif($hour < 17){
                $greeting = "Good Afternoon";
            }
            elseif($hour < 20){
                $greeting = "Good Evening";
            }
            elseif($hour < 23){
                $greeting = "Sleeping Time";
            }
            else{
                $greeting = "You Should Sleep";
            }
        @endphp
        
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                 Hello, {{ $greeting }} <br>{{ $userName }}! Welcome back to your Money Tracker.
            </h2>
        @endif