@extends('layouts.app')

@section('style')
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<style type="text/css">
		body {
			font-family: 'Oswald', sans-serif;
			font-size: 18px;
		}
	</style>
@endsection

@section('content')
	<div class="container">
		<div class="well">
			<div class="row">
				<div class="col-md-2 col-md-offset-1 col-sm-12 col-xs-12">
					<strong>Quiz</strong>
				</div>
				<div class="col-md-9 col-sm-12 col-xs-12">
					{{ ucwords($quiz->title) }}
				</div>
				<div class="col-xs-12">&nbsp;</div>
			</div>
			<div class="row">
				<div class="col-md-2 col-md-offset-1  col-sm-12 col-xs-12">
					<strong>Description</strong>
				</div>
				<div class="col-md-9  col-sm-12 col-xs-12">
					{{ $quiz->description }}
				</div>
				<div class="col-xs-12">&nbsp;</div>
			</div>
			<div class="row">
				<div class="col-md-2 col-md-offset-1  col-sm-12 col-xs-12">
					{{ ucwords($result->player->name) }} Scored {{ $result->score }}%
				</div>
				<div class="col-md-9  col-sm-12 col-xs-12">
					
				</div>
				<div class="col-xs-12">&nbsp;</div>
			</div>
		</div>
		<div class="well">
			<div class="row">
				<div class="col-md-9 col-md-offset-1 col-sm-12 col-xs-12" id="website-url">{{ url('result/quiz/' . $quiz->quiz_slug . '/play/' . $result->play_unique) }}</div>
				<div class="col-md-2 col-sm-12 col-xs-12">
					<button class="btn btn-primary pull-right" id="copy-url-btn">Copy to Clipboard</button>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {

			$('#copy-url-btn').on('click' ,function(){

				var $temp = $("<input>");
				$("body").append($temp);
				$temp.val($('#website-url').text()).select();
				document.execCommand("copy");
				$temp.remove();
				$(this).removeClass('btn-primary').addClass('btn-danger').text('Copied..!');
				setTimeout(function() {
					$('#copy-url-btn').removeClass('btn-danger').addClass('btn-primary').text('Copy to Clipboard');
				} , 3000);
			});
		});
	</script>
@endsection