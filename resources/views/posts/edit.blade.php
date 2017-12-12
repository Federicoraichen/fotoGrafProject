<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="{{route('posts.store', $post)}}" method="post">
      {{csrf_field()}}
      {{method_field('PUT')}}
      titulo
      <input type="text" name="title" value="{{old('title', $post->title)}}">
      <br><br>
      descripcion
      <input type="text" name="description" value="{{old('description',$post->description)}}">
      <br><br>
      <select class="" name="category_id">
        <option value="1">
          categoria grafity
        </option>
      </select>
      <select class="" name="user_id">
        <option value="1">
          usuario
        </option>
      </select>

      <button type="submit" name="button">crear post gato</button>


    </form>
  </body>
</html>
