@include('admin.includes.alerts')

<div class="form-group">
    <lavel class="">Nome:</lavel>
    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $plan->name ?? old('name') }}">
</div>
<div class="form-group">
    <lavel class="">Preço:</lavel>
    <input type="text" name="price" class="form-control" placeholder="Valor:" value="{{ $plan->price ?? old('price') }}">
</div>
<div class="form-group">
    <lavel class="">Descrição:</lavel>
    <input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{ $plan->description ?? old('description') }}">
</div>

<button type="submit" class="btn btn-dark">Salvar Plano</button>
<a href="{{ route('plans.index') }}" class="btn btn-success">Voltar</a>
