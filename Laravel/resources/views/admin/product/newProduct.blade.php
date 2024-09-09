@extends('admin.partials.main-layout')

@section('content-header')
<!-- /.content-header -->
@endsection

@section('body')
<!-- Main row -->
<div class="row">
    <div class="container-fluid">
        <div class="container-fluid">
            <a href="{{ route('productAdmin') }}" class="btn btn-primary">Retour</a>
        </div>
    </div>
    <div class="container mt-5">
        <h2 class="mb-4">Ajouter un produit</h2>
        <form action="{{ route('newProduct') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="productName">Nom du produit</label>
                <input type="text" class="form-control" id="productName" name="name" placeholder="Entrez le nom du produit" value="{{ old('name') }}">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="productDescription">Description</label>
                <textarea class="form-control" id="productDescription" name="description" rows="3" placeholder="Entrez la description du produit">{{ old('description') }}</textarea>
                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="productPrice">Prix</label>
                <input type="number" class="form-control" id="productPrice" name="price" placeholder="Entrez le prix du produit" value="{{ old('price') }}">
                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="productImage">Image</label>
                <input type="file" class="form-control-file" id="productImage" name="image" accept=".png, .jpg, .jpeg, .webp" onchange="previewImage(this)">
                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="avatar-preview">
                <div id="imagePreview" style="background-image: url('{{url('/img/default.jpg') }}'); width: 100px; height: 100px; background-size: cover; background-position: center;"></div>
            </div>
            <div class="form-group">
                <label for="productCategory">Catégorie</label>
                <select class="form-control" id="productCategory" name="category_id">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="btn btn-success">Ajouter le produit</button>
        </form>
    </div>
</div>
<!-- /.row (main row) -->
@endsection


<script type="text/javascript">
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').style.backgroundImage = 'url(' + e.target.result + ')';
                document.getElementById('imagePreview').style.display = 'none';
                document.getElementById('imagePreview').style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


<style>
    .avatar-preview {
        position: relative;
        max-width: 205px;
    }
    .avatar-preview > div {
        width: 100%;
        height: 100%;
        border-radius: 3%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>