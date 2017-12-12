@foreach ($posts as $post)
  <h1>{{$post->title}}</h1>
  <a href="posts/{{$post->id}}">ver</a>
@endforeach
