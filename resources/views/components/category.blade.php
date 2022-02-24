<div>
    <h1>{{$category->name}}</h1>
    <x-super-categories :categories="$category->children" />
</div>