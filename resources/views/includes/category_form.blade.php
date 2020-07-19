<form action="{{ $route ?? route('category.store') }}" method="POST">
    @csrf
    @if (isset($category))
        @method('PATCH')
    @endif
    <div class="form-group">
        <label for="categoryInputName">Category name</label>
        <input type="text" id="categoryInputName" name="name" class="form-control" placeholder="Name" value="{{ $category->name ?? '' }}">
    </div>
    <div class="form-group">
        <label for="categoryInputSlug">Category slug</label>
        <input type="text" id="categoryInputSlug" name="slug" class="form-control" placeholder="Slug" value="{{ $category->slug ?? '' }}">
    </div>
    <button type="submit" class="btn btn-primary">{{ isset($category) ? 'Edit category' : 'Create new category' }}</button>
</form>
