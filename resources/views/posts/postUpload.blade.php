<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    @if (count($errors) > 0)

<div class="alert alert-danger">

    <strong>Whoops!</strong> Hubo algunos problemas con el archivo<br><br>

    <ul>

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>
@endif


    <form action="{{route('posts.postUpload', $post)}}" method="post">
      {{csrf_field()}}
      {{method_field('PUT')}}
      titulo
      <input type="text" name="title" value="{{old('title', $post->title)}}">
      <br><br>
      descripcion
      <input type="text" name="description" value="{{old('description',$post->description)}}">
      <br><br>
      <div class="form-group">
            <label for="name">Categoría</label>
            <select name="category_id" class="form-control">
              @foreach($categories as $category)
                @php $selected = ($category->id == $product->category_id)?'selected':'' @endphp
                <option value="{{ $category->id }}" {{$selected}}>{{ $category->value }}</option>
              @endforeach
            </select>
          </div>


      <div class="row cancel">

    <div class="col-md-4">

        {!! Form::file('image', array('class' => 'image')) !!}

    </div>

    <div class="col-md-4">

        <button type="submit" class="btn btn-success">Create</button>

    </div>

</div>
{!! Form::close() !!}

      <button type="submit" name="button">crear post gato</button>


    </form>
  </body>
</html>
