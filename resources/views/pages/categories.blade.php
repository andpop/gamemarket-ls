@foreach($categories as $category)
    <li class="sidebar-category__item">
        <a href="{{route('category.show', $category->id)}}" class="sidebar-category__item__link">{{$category->name}}</a>
    </li>
@endforeach
