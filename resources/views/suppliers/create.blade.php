@extends('dashboard.body.main')

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Agregar proveedor</h4>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('suppliers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <!-- begin: Input Image -->
                        <div class="form-group row align-items-center">
                            <div class="col-md-12">
                                <div class="profile-img-edit">
                                    <div class="crm-profile-img-edit">
                                        <img class="crm-profile-pic rounded-circle avatar-100" id="image-preview" src="{{ asset('assets/images/user/1.png') }}" alt="profile-pic">
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
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="shopname">Nombre de la tienda <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('shopname') is-invalid @enderror" id="shopname" name="shopname" value="{{ old('shopname') }}" required>
                                @error('shopname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Correo electrónico del proveedor <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Teléfono del proveedor <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                                @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="account_holder">Titular de la cuenta</label>
                                <input type="text" class="form-control @error('account_holder') is-invalid @enderror" id="account_holder" name="account_holder" value="{{ old('account_holder') }}">
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

                                    <optgroup label="Bancos de Colombia">
                                        <option value="Bancolombia" {{ old('bank_name') == 'Bancolombia' ? 'selected' : '' }}>Bancolombia</option>
                                        <option value="Banco de Bogotá" {{ old('bank_name') == 'Banco de Bogotá' ? 'selected' : '' }}>Banco de Bogotá</option>
                                        <option value="Davivienda" {{ old('bank_name') == 'Davivienda' ? 'selected' : '' }}>Davivienda</option>
                                        <option value="Banco de Occidente" {{ old('bank_name') == 'Banco de Occidente' ? 'selected' : '' }}>Banco de Occidente</option>
                                        <option value="BBVA Colombia" {{ old('bank_name') == 'BBVA Colombia' ? 'selected' : '' }}>BBVA Colombia</option>
                                        <option value="Banco Popular" {{ old('bank_name') == 'Banco Popular' ? 'selected' : '' }}>Banco Popular</option>
                                        <option value="Scotiabank Colpatria" {{ old('bank_name') == 'Scotiabank Colpatria' ? 'selected' : '' }}>Scotiabank Colpatria</option>
                                    </optgroup>
                            
                                    <optgroup label="Bancos Internacionales">
                                        <option value="Citibank" {{ old('bank_name') == 'Citibank' ? 'selected' : '' }}>Citibank</option>
                                        <option value="HSBC" {{ old('bank_name') == 'HSBC' ? 'selected' : '' }}>HSBC</option>
                                        <option value="Santander" {{ old('bank_name') == 'Santander' ? 'selected' : '' }}>Santander</option>
                                        <option value="Bank of America" {{ old('bank_name') == 'Bank of America' ? 'selected' : '' }}>Bank of America</option>
                                        <option value="JP Morgan Chase" {{ old('bank_name') == 'JP Morgan Chase' ? 'selected' : '' }}>JP Morgan Chase</option>
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
                                <input type="text" class="form-control @error('account_number') is-invalid @enderror" id="account_number" name="account_number" value="{{ old('account_number') }}">
                                @error('account_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bank_branch">Sucursal bancaria</label>
                                <input type="text" class="form-control @error('bank_branch') is-invalid @enderror" id="bank_branch" name="bank_branch" value="{{ old('bank_branch') }}">
                                @error('bank_branch')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="city">Ciudad proveedora <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') }}" required>
                                @error('city')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="type">Tipo de proveedor <span class="text-danger">*</span></label>
                                <select class="form-control @error('type') is-invalid @enderror" name="type" required>
                                    <option value="">Seleccione tipo de proveedor...</option>

                                    <option value="Distributor">Distribuidor</option>
                                    <option value="Wholesaler">Mayorista</option>
                                    <option value="Manufacturer">Fabricante</option>
                                    <option value="Retailer">Minorista</option>
                                    <option value="Service Provider">Proveedor de Servicios</option>
                                    <option value="Importer">Importador</option>
                                    <option value="Exporter">Exportador</option>
                                    <option value="Freelancer">Freelancer</option>
                                    <option value="Contractor">Contratista</option>
                                    <option value="Consultant">Consultor</option>
                                   
                                </select>

                                @error('type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="address">Dirección del proveedor <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" required>{{ old('address') }}</textarea>
                                @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- end: Input Data -->
                        <div class="mt-2">
                            <button type="submit" class="btn" style="background-color: #28a745; color: white;">Guardar</button>
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
