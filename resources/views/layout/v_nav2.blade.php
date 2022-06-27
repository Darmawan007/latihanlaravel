<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="{{request() ->is('/') ? 'active' : ''}}"><a href="/"><i class="fa fa-home"></i> <span>Home</span></a></li>
    @if(auth()->user()->level==1)
    <li class="{{request() ->is('guru') ? 'active' : ''}}"><a href="/guru"><i class="fa fa-user-secret"></i> <span>Guru</span></a></li>
    <li class="{{request() ->is('siswa') ? 'active' : ''}}"><a href="/siswa"><i class="fa fa-user"></i> <span>Siswa</span></a></li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-folder"></i> <span>Multilevel</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
        </ul>
    </li>
    @endif
    @if(auth()->user()->level==2)
    <li class="{{request() ->is('user') ? 'active' : ''}}"><a href="/user"><i class="fa fa-users"></i> <span>User</span></a></li>
    @endif
    @if(auth()->user()->level==3)
    <li class="{{request() ->is('koprasi') ? 'active' : ''}}"><a href="/koprasi"><i class="fa fa-money"></i> <span>Koperasi</span></a></li>
    @endif
</ul>