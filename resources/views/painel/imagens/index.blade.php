@extends('painel.index')
@section('content')

       
        @if (isset($errors) && count($errors) > 0)
                <div class="alert alert-danger">
                     @foreach($errors->all() as $error)
                         <p>{{$error}}</p>
                     @endforeach
                 </div>
        @endif




        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        <img src="/assets/painel/imgs/produtos/{{ Session::get('path') }}">
        @endif

        <form action="{{route('imagens.store')}}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12">
                        <input type="file" name="image" />
                </div>
                <div class="col-md-12">
                        <button type="submit" class="btn btn-success">Upload</button>
                </div>
            </div>
        </form>

  </div>
</div>
@endsection