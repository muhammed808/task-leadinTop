<div>
    @foreach ($rootcategories as $category)
        <x-category :category="$category" />
    @endforeach
</div>