<li class="nav-item {{request()->routeIs('Home') ? 'active': ''}}">
    <a class="nav-link" href="{{route('Home')}}">Главная</a>
</li>
<li class="nav-item {{request()->routeIs('admin.news.index') ? 'active': ''}}">
    <a class="nav-link" href="{{route('admin.index')}}">Страница администратора</a>
</li>
<li class="nav-item {{request()->routeIs('admin.catalog.index') ? 'active': ''}}">
    <a class="nav-link" href="{{route('admin.categories.index')}}">CRUD категорий</a>
</li>
<li class="nav-item {{request()->routeIs('admin.news.create') ? 'active': ''}}">
    <a class="nav-link" href="{{route('admin.news.index')}}">CRUD новостей</a>
</li>
<li class="nav-item {{request()->routeIs('admin.users.index') ? 'active': ''}}">
    <a class="nav-link" href="{{route('admin.users.index')}}">CRUD пользователей</a>
</li>
<li class="nav-item {{request()->routeIs('admin.resources.index') ? 'active': ''}}">
    <a class="nav-link" href="{{route('admin.resources.index')}}">CRUD источников</a>
</li>



