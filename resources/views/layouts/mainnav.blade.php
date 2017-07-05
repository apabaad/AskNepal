<style type="text/css">
/*css for navbar search *https://bootsnipp.com/snippets/featured/custom-search-input**/
#custom-search-input{
    padding: 2px;
    border: solid 1px #E4E4E4;
    border-radius: 8px;
    background-color: #fff;
}

#custom-search-input input{
    border: 0;
    box-shadow: none;
}

#custom-search-input button{
    margin: 2px 0 0 0;
    background: none;
    box-shadow: none;
    border: 0;
    color: #666666;
    padding: 0 8px 0 10px;
    border-left: solid 1px #ccc;
}

#custom-search-input button:hover{
    border: 0;
    box-shadow: none;
    border-left: solid 1px #ccc;
}

#custom-search-input .glyphicon-search{
    font-size: 15px;

}
</style>

<nav class="navbar navbar-default navbar-static-top">

  
<div class="container-fluid">  
        

           

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                     <a class="navbar-brand" href="{{url('asknepal')}}">AskNepal</a>
                   
                    <ul class="nav navbar-nav">
                                 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp    
                    </ul>
                     

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                    @if(Auth::user())
                    <li><a href="{{url('ask')}}"><strong>Ask?</strong></a></li>
                    @endif
                       <li><a href="{{url('asknepal')}}"></b></a></li>
                        <li>
                        <form method="get" action="{{url('asknepal')}}" class="navbar-form">
    
                            <div id="custom-search-input">
                                <div class="input-group col-md-12">
                                    <input type="text" class="form-control" id="search" name="search" placeholder="Search..." />
                                    <span class="input-group-btn">
                                        <button class="btn btn-default-sm" type="submit">
                                         <a href="{{url('asknepal')}}">   <i class="glyphicon glyphicon-search"></i></a>
                                        </button>
                                    </span>
                                </div>
                                  <!-- {{ csrf_field() }} -->
                            </div>
                        </form>
                        </li>
                        
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        

                            <li class="dropdown" id="markasread" onclick="markasread()">
                                

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-bell"></span> Notifications <span class="badge">{{count(auth()->user()->unreadNotifications)}}</span>
                                </a>


                                <ul class="dropdown-menu" role="menu">
                                  <li>
                                  @forelse(auth()->user()->unreadNotifications as $notification)
                                    @include('pages.'.snake_case(class_basename($notification->type)))
                                    @empty
                                        <a href="#">No unread notifications.</a> 
                                  @endforelse
                                   </li>
                                </ul>
                            </li>
                            
                            
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> {{Auth::user()->name}}  <span class="caret"></span>
                                </a>


                                <ul class="dropdown-menu" role="menu">
                                    

                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           <i class="glyphicon glyphicon-log-out"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <!-- <li>
                                        <a href="{{url('DeleteUser/'.Auth()->user()->id)}}">Delete account</a>
                                    --> </li>
                                    <li>
                                        <a href="{{url('user/profile/'.Auth::user()->id)}}">
                                            <i class="glyphicon glyphicon-user"></i> My Profile
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

</nav>



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="public/js/defined.js"></script>
    <script type="text/javascript">
        function markasread(){
            $.get('markasread');
        }
    </script>
   

