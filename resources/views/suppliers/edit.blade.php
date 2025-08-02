@extends('dashboard.body.main')

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Editar proveedor</h4>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                        <!-- begin: Input Image -->
                        <div class="form-group row align-items-center">
                            <div class="col-md-12">
                                <div class="profile-img-edit">
                                    <div class="crm-profile-img-edit">
                                        <img class="crm-profile-pic rounded-circle avatar-100" id="image-preview" src="{{ $supplier->photo ? asset('storage/suppliers/'.$supplier->photo) : asset('assets/images/user/1.png') }}" alt="profile-pic">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-group mb-4 col-lg-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="image" name="photo" accept="image/*" onchange="previewImage();">
                                    <label class="custom-file-label" for="photo">Elegir archivo</label>
                                </div>
                                @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- end: Input Image -->
                        <!-- begin: Input Data -->
                        <div class=" row align-items-center">
                            <div class="form-group col-md-6">
                                <label for="name">Nombre del proveedor <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $supplier->name) }}" required>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="shopname">Nombre de la tienda <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('shopname') is-invalid @enderror" id="shopname" name="shopname" value="{{ old('shopname', $supplier->shopname) }}" required>
                                @error('shopname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Correo electrónico del proveedor <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $supplier->email) }}" required>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Teléfono del proveedor <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $supplier->phone) }}" required>
                                @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="account_holder">Titular de la cuenta</label>
                                <input type="text" class="form-control @error('account_holder') is-invalid @enderror" id="account_holder" name="account_holder" value="{{ old('account_holder', $supplier->account_holder) }}">
                                @error('account_holder')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bank_name">Nombre del banco</label>
                                <select class="form-control @error('bank_name') is-invalid @enderror" name="bank_name">
                                    <option value="">Seleccionar nombre del banco...</option>

                            <!-- Bancos de Colombia -->
                            <optgroup label="Bancos de Colombia">
                                <option value="Bancolombia" @if(old('bank_name', $supplier->bank_name) == 'Bancolombia') selected="selected" @endif>Bancolombia</option>
                                <option value="Banco de Bogotá" @if(old('bank_name', $supplier->bank_name) == 'Banco de Bogotá') selected="selected" @endif>Banco de Bogotá</option>
                                <option value="Davivienda" @if(old('bank_name', $supplier->bank_name) == 'Davivienda') selected="selected" @endif>Davivienda</option>
                                <option value="Banco de Occidente" @if(old('bank_name', $supplier->bank_name) == 'Banco de Occidente') selected="selected" @endif>Banco de Occidente</option>
                                <option value="BBVA Colombia" @if(old('bank_name', $supplier->bank_name) == 'BBVA Colombia') selected="selected" @endif>BBVA Colombia</option>
                                <option value="Banco Popular" @if(old('bank_name', $supplier->bank_name) == 'Banco Popular') selected="selected" @endif>Banco Popular</option>
                                <option value="Scotiabank Colpatria" @if(old('bank_name', $supplier->bank_name) == 'Scotiabank Colpatria') selected="selected" @endif>Scotiabank Colpatria</option>
                            </optgroup>

                            <!-- Bancos Internacionales -->
                            <optgroup label="Bancos Internacionales">
                                <option value="Citibank" @if(old('bank_name', $supplier->bank_name) == 'Citibank') selected="selected" @endif>Citibank</option>
                                <option value="HSBC" @if(old('bank_name', $supplier->bank_name) == 'HSBC') selected="selected" @endif>HSBC</option>
                                <option value="Santander" @if(old('bank_name', $supplier->bank_name) == 'Santander') selected="selected" @endif>Santander</option>
                                <option value="Bank of America" @if(old('bank_name', $supplier->bank_name) == 'Bank of America') selected="selected" @endif>Bank of America</option>
                                <option value="JP Morgan Chase" @if(old('bank_name', $supplier->bank_name) == 'JP Morgan Chase') selected="selected" @endif>JP Morgan Chase</option>
                            </optgroup>
                                </select>

                                @error('bank_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="account_number">Número de cuenta</label>
                                <input type="text" class="form-control @error('account_number') is-invalid @enderror" id="account_number" name="account_number" value="{{ old('account_number', $supplier->account_number) }}">
                                @error('account_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bank_branch">Sucursal bancaria</label>
                                <input type="text" class="form-control @error('bank_branch') is-invalid @enderror" id="bank_branch" name="bank_branch" value="{{ old('bank_branch', $supplier->bank_branch) }}">
                                @error('bank_branch')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="city">Ciudad proveedora <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city', $supplier->city) }}" required>
                                @error('city')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="type">Tipo de proveedor <span class="text-danger">*</span></label>
                                <select class="form-control @error('type') is-invalid @enderror" name="type" required>
                                    <option value="">Seleccionar tipo de proveedor...</option>

                                    <option value="Distribuidor" @if(old('type', $supplier->type) == 'Distribuidor') selected="selected" @endif>Distribuidor</option>
                                    <option value="Mayorista" @if(old('type', $supplier->type) == 'Mayorista') selected="selected" @endif>Mayorista</option>
                                    <option value="Fabricante" @if(old('type', $supplier->type) == 'Fabricante') selected="selected" @endif>Fabricante</option>
                                    <option value="Minorista" @if(old('type', $supplier->type) == 'Minorista') selected="selected" @endif>Minorista</option>
                                    <option value="Proveedor de Servicios" @if(old('type', $supplier->type) == 'Proveedor de Servicios') selected="selected" @endif>Proveedor de Servicios</option>
                                    <option value="Importador" @if(old('type', $supplier->type) == 'Importador') selected="selected" @endif>Importador</option>
                                    <option value="Exportador" @if(old('type', $supplier->type) == 'Exportador') selected="selected" @endif>Exportador</option>
                                    <option value="Freelancer" @if(old('type', $supplier->type) == 'Freelancer') selected="selected" @endif>Freelancer</option>
                                    <option value="Contratista" @if(old('type', $supplier->type) == 'Contratista') selected="selected" @endif>Contratista</option>
                                    <option value="Consultor" @if(old('type', $supplier->type) == 'Consultor') selected="selected" @endif>Consultor</option>

                                </select>

                                @error('type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="address">Supplier Address <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" required>{{ old('address', $supplier->address) }}</textarea>
                                @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- end: Input Data -->
                        <div class="mt-2">
                            <button type="submit" class="btn" style="background-color: #28a745; color: white;">Actualizar</button>
                            <a class="btn" href="{{ route('suppliers.index') }}"style="background-color: #ff6f6f; color: white;">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Page end  -->
</div>

@include('components.preview-img-form')
@endsection
