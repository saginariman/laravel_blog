@extends('layouts.app')

@section('title_block')Главная@endsection

@section('content')
	<h1>Home</h1>
	<p>
		Lorem ipsum dolor sit amet consectetur, adipisicing elit. Porro veniam, eaque ex iste sed reiciendis blanditiis modi delectus ratione cupiditate sit neque asperiores adipisci. Quo illo pariatur numquam ipsum error ex soluta tempore officia optio blanditiis laboriosam deleniti, delectus asperiores, cum laborum vitae? Dignissimos error neque eos quasi reprehenderit. Rem.
	</p>
@endsection

@section('aside')
	@parent
	<p>Text only to Home</p>
@endsection