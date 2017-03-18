<div class="form-group">
	{!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', null, ['class' => 'form-control', 'autofocus', 'value' => 'bar']) !!} <!-- (name/id, value, anything else in an array) -->
</div>

<!-- Body Form Input -->
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<!-- Published_at Form Input -->
<div class="form-group">
    {!! Form::label('published_at', 'Publish On:') !!}
	{!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<!-- Tags Form Input -->
<div class="form-group">
    {!! Form::label('tag_list', 'Tags:') !!}
    {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
    <!-- name, array of options, selected options, others(e.g. class) -->
    <!-- typically I'd use something like $article->getTagsList() or a $tagList var passed from controller to set
    	 selected options but with form model binding it will be unnecesary - set a mutator in the article model
    	 and use that attribute for the dropdown to automatically set selected -->
</div>

<!-- Add Article Form Input -->
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@section('footer')

<script type="text/javascript">
  $('#tag_list').select2({
  	 placeholder: "Choose a tag",
  	 // tags: true,
  	 // data: [
  	 // 	{ id: 'one', text: 'One'},
  	 // 	{ id: 'two', text: 'Two'}
  	 // ]
  	 // ajax: {
  	 // 	dataType: 'json',
  	 // 	url: 'api/tags',
  	 // 	delay: 250,
  	 // 	data: function(params) {
  	 // 		return {
  	 // 			q: params.term
  	 // 		}
  	 // 	},
  	 // 	prosessResults: function(data) {
  	 // 		return { results: data}
  	 // 	}
  	 // }
  });
</script>

@endsection