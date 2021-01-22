@extends("includes.layout")

@section("content")
@include("includes.menu")
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h1>Canais - FutNaTV</h1>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            @include('includes.errors')
            @if(isset($channel) && $channel->id)
            <form action="{{ route('channels-update', ['id' => $channel->id]) }} " method="POST" enctype="multipart/form-data">
                {{ method_field("PUT") }}
                @else
                <form action=" {{ route('channels-store') }}" method="post" enctype="multipart/form-data">
                    @endif
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="nome do canal" value="{{ $channel->name ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" name="logo" id="logo" class="form-control">
                        <div>
                            <p>(Para não alterar o logo não envie nenhuma imagem.)</p>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>

                </form>
        </div>
    </div>
</div>
@endsection