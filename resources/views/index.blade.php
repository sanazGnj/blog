@extends('welcome')
@section('content')

	<div class="content">
		<ul>
			@foreach($sanaz as $p)
				<li>
			  	<a href="/edit/{{$p->id}}">

                    <img src="/images/{{$p->img}}" width="200" height="200">
                    <p> name: {{$p->name}}</p>
                    <p> id: {{$p->id}}</p>
                    <a href ="/delete/{{$p->id}}">delet image</a>
                   
                        
                </a>
                </li>
                          
			@endforeach
	    </ul>
     </div>


@endsection

    