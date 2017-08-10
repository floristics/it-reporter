@if ($user)
    <li class="dropdown user user-menu" style="margin-right: 20px;">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            <img width=80 height=59 src="/{{ $user->image_url}} " alt="Eror"  class="user-image" />
            <span class="hidden-xs">
             {!!explode(' ',$user->name)[0]!!}
             {!!mb_substr((explode(' ',$user->name)[1]),0,1)!!}.
             {!!mb_substr((explode(' ',$user->name)[2]),0,1)!!}.
            </span>
        </a>
        <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
                
            <img  class="img-circle"  src="/{{$user->image_url}}" alt="Eror">
            <!-- <form action="" method="post" enctype="multipart/form-data">
            <input type="file"  value="обзор">
            <input type="submit" value="ok">
                </form>-->
                <p>
                    {{ $user->name }}
         </p>                             
                 <small>@lang('')</small>
                
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
                <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-btn fa-sign-out"></i> @lang('sleeping_owl::lang.auth.logout')
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>
@endif