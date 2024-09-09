@extends('admin.partials.main-layout')

@section('content-header')
    <!-- /.content-header -->
@endsection

@section('body')
    <!-- Main row -->
    <div class="row">
        <div class="container-fluid">
            <div class="container-fluid">
                <a href="{{ route('pedalCustom') }}" class="btn btn-primary">Retour</a>
            </div>
        </div>
        <div class="container mt-5">
            <h2 class="mb-4">Modifier une Pedale</h2>
            <form action="{{ route('updatePedal', $pedal-> id) }}" method="post" class="border p-4 rounded">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label for="productName" class="col-sm-2 col-form-label">Nom de la Pedale :</label>
                    <div class="col-sm-7">
                        <input type="text" value= "{{$pedal->name}}" class="form-control form-control-sm" id="productName" name="name" placeholder="Entrez le nom du produit">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="productColor" class="col-sm-2 col-form-label">Couleur :</label>
                    <div class="col-sm-4">
                        <input type="color" class="form-control form-control-sm" id="productColor" name="color" placeholder="Entrez la couleur du produit" value="{{ old('color') , $pedal->color }}">
                        @error('color') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="productMaterial" class="col-sm-2 col-form-label">material :</label>
                    <div class="col-sm-7">
                        <input type="text" value="{{$pedal->material}}" class="form-control form-control-sm" id="productMaterial" name="material" placeholder="Entrez le materiaux du produit">
                        @error('material') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="productPrice" class="col-sm-2 col-form-label">Prix :</label>
                    <div class="col-sm-7">
                        <input type="number" value="{{$pedal->price}}" class="form-control form-control-sm" id="productPrice" name="price" placeholder="Entrez le prix du produit">
                        @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="productImage" class="col-sm-2 col-form-label">Image :</label>
                    <div class="col-sm-7">
                        <input type="file" class="form-control-file" id="productImage" name="image" accept=".png, .jpg, .jpeg, .webp" onchange="previewImage(this)">
                    </div>
                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
                <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url('{{url('/img/default.jpg') }}'); width: 100px; height: 100px; background-size: cover; background-position: center;"></div>
                </div>
                <div class="form-group row">
                    <label for="productStock" class="col-sm-2 col-form-label">Stock :</label>
                    <div class="col-sm-7">
                        <input type="text" value="{{$pedal->stock}}" class="form-control form-control-sm" id="stock" name="stock" placeholder="Entrez le stock du produit">
                        @error('stock') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Modifier le produit</button>
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


