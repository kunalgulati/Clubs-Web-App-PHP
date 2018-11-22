@extends('main_layout')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/2.3.3/fabric.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.0.4/jscolor.min.js"></script>
<script src="{{ URL::asset("js/blackboard.js") }}"></script>
<link rel="stylesheet" href="{{ URL::asset("css/blackboard.css") }}">



<div id='abosulte' style="float: top; margin: 10px;">
		<input type="text" id="maintitle"
			style="font-size: 20px; margin: auto; text-align: center; width: 100%; border: 3px solid #fff; padding: 10px;"
			placeholder="Title of the post" required />
		
	</div>




	<div id='float-left' style="float: left; margin-right: 15px;">

		<div class="panel panel-default"
			style="width: 220px; margin-left: 30px;">
			<div class="panel-heading clearfix">
				<b class="panel-title">Text to Add</b>
			</div>

			<div class="form-group" style="margin-left: 15px;">
				<br />
				<textarea rows="4" cols="12" class="input" id="atext"
					style="width: 160px; height: 110px;"></textarea>
				<button id="text" name="text">+</button>
				<br />
			</div>
		</div>

		<div class="panel panel-default"
			style="width: 220px; margin-left: 30px;">
			<div class="panel-heading clearfix">
				<b class="panel-title">Default images</b>
			</div>

			<div class="form-group">
				<div id="images"
					style="width: 218px; height: 100px; overflow-y: scroll;">
					<img draggable="true"
						src="{{ URL::asset('image/1001.png') }}" width="84"
						height="84"> 
					<img draggable="true"
						src="{{ URL::asset('image/1002.png') }}" width="84"
						height="84"></img> 
					<img draggable="true"
						src="{{ URL::asset('image/1003.png') }}" width="84"
						height="84"></img> 
					<img draggable="true"
						src="{{ URL::asset('image/1004.png') }}" width="84"
						height="84"></img> 
				    <img draggable="true"
						src="{{ URL::asset('image/1005.png') }}" width="84"
						height="84"></img> 
				    <img draggable="true"
						src="{{ URL::asset('image/1006.png') }}" width="84"
						height="84"></img>

				</div>
			</div>

	

		</div>

		<div class="panel panel-default"
			style="width: 220px; margin-left: 30px;">
			<div class="panel-heading clearfix">
				<b class="panel-title">Upload image</b>
			</div>
			<div class="form-group">

				<form id="uploadImg">
					<input type="file" id="uploadedImg"
						style="width: 180px; font-size: 12px; margin: 10px" />
				</form>

			</div>

			

		</div>

		<div class="panel panel-default"
			style="width: 220px; margin-left: 30px;">
			<div class="panel-heading clearfix">
				<b class="panel-title">Shaped to add</b>
			</div>
			<div class="form-group">

				<div class="btn-group btn-group-vertical" role="group"
					aria-label="..." style="margin-left: 58px; margin-top: 20px">
					<button type="button" id="rectangle" class="btn btn-default">Rectangle</button>
					<button type="button" id="square" class="btn btn-default">Square</button>
					<button type="button" id="triangle" class="btn btn-default">Triangle</button>
					<button type="button" id="circle" class="btn btn-default">Circle</button>
				</div>

			</div>

			

		</div>


	</div> 

	<div id='right' style="float: right;">

	<div id='center' style="float: left">
		<div id="canvas-container">
			<canvas id="canvas" width="1000px" height="625px"></canvas>
		</div>

	</div>

	<div id='center1' style="float: left">
		<div class="panel panel-default"
			style="width: 220px; margin-left: 30px;">
			<div class="panel-heading clearfix">
				<b class="panel-title">Options</b>
			</div>
			<div class="form-group">
				<div class="btn-group" role="group" aria-label="..."
					style="margin: 10px 0 0 50px; height: 24px;">
					<button data-toggle="tooltip" data-placement="bottom" id="remove"
						title="delete the element" type="button" class="btn btn-outline-danger"
						style="background: url({{ ('image/trash.png')}}) no-repeat; height: 24px;">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</button>
					<button data-toggle="tooltip" data-placement="bottom" id="toback"
						title="Bring to back" type="button" class="btn btn-outline-primary"
						style="background: url( {{ ('image/toback.png')}}) no-repeat; height: 24px;">
						<i class="fa fa-level-down" aria-hidden="true"></i>
					</button>
					<button data-toggle="tooltip" data-placement="bottom"
						title="Bring to front" type="button" id="tofront"
						class="btn btn-outline-primary"
						style="background: url( {{('image/tofront.png')}}) no-repeat; height: 24px;">
						<i class="fa fa-level-up" aria-hidden="true"></i>
					</button>
					<button data-toggle="tooltip" data-placement="bottom" title="Copy"
						id="copy" type="button" class="btn btn-outline-primary"
						style="background: url( {{('image/copy.png')}}) no-repeat; height: 24px;">
						<i class="fa fa-clone" aria-hidden="true"></i>
					</button>
					<button data-toggle="tooltip" data-placement="bottom" id="unselect"
						title="Selection Cancel" type="button" class="btn btn-outline-primary"
						style="background: url( {{('image/cancel.png')}}) no-repeat; height: 24px;">
						<i class="fa fa-remove" aria-hidden="true"></i>
					</button>
				</div>
			</div>
		</div>
		<div class='showD'>
			<div class="panel panel-default"
				style="width: 220px; margin-left: 30px;">
				<div class="panel-heading clearfix">
					<b class="panel-title">Background setting</b>
				</div>

				<div class="form-group" style="margin: 10px;">
					Background Color <br /> <input type="text" id='bgColor' class="jscolor"
						placeholder="#fff"><br /> Backgraound Image(Url) <br /> <input
						type="text" id='bgUrl' class="input" placeholder="http://... .png"><br />
					Background Color with pattern(Url) <br /> <input type="text" id='bgUrl2'
						class="input" placeholder="http://... .png"><br /> <br />
				</div>
			</div>
		</div>

		<div class="showT">
			<div class="panel panel-default"
				style="width: 220px; margin-left: 30px;">
				<div class="panel-heading clearfix">
					<b class="panel-title">Text</b>
				</div>

				<div class="form-group" style="margin: 10px;">
					<div class="custom-item-title">Text Opacity</div>
					<input type="range" id="textOpacity" step="0.1" min="0" max="1">



					<div class="custom-item-title">Text Color</div>
					<input type="text" id='textColor' class="jscolor"
						placeholder="#fff">



					<div class="custom-item-title">Font</div>

					<select id='textFontFamily'>
						<option class="rg" value="Renga">Renga</option>
						<option class="if" value="Indie Flower">Indie Flower</option>
						<option class="ps" value="PT sans">PT sans</option>
						<option class="fd" value="Federant">Federant</option>
						<option class="pf" value="Pacifico">Pacifico</option>
						<option class="ls" value="Lobster">Lobster</option>
						<option class="sc" value="Syncopate">Syncopate</option>
						<option class="rb" value="Reenie Beanie">Reenie Beanie</option>
						<option class="al" value="Allura">Allura</option>
						<option class="yt" value="Yellowtail">Yellowtail</option>
						<option class="mn" value="Monoton">Monoton</option>
                  <option class="gv" value="Great Vibes">Great Vibes</option>
                  <option class="ks" value="Kaushan Script">Kaushan Script</option>
                        <option class="ot" value="Orbitron">Orbitron</option>
                        <option class="cvt" value="Caveat">Caveat</option>
                        <option class="sil" value="Shadows Into Light">Shadows Into Light</option>
                        <option class="ds" value="Dancing Script">Dancing Script</option>
                        <option class="gh" value="Gloria Hallelujah">Gloria Hallelujah</option>
                        <option class="cg" value="Courgette">Courgette</option>

					</select>


					<div class="custom-item">
						<div class="custom-item-title">Text Align</div>
						<div class="custom-item-body text-center">
							<div class="btn-group" role="group" aria-label="..."
								style="margin: 10px">
								<button id="leftP" type="button" class="btn btn"
									style="background: url({{('image/left.png')}}) no-repeat">
									<i class="fa fa-align-left"
										style="background: url( {{('image/toback.png')}}) no-repeat;"></i>
								</button>
								<button id="centerP" type="button" class="btn btn"
									style="background: url( {{('image/center.png')}}) no-repeat;">
									<i class="fa fa-align-center"></i>
								</button>
								<button id="rightP" type="button" class="btn btn"
									style="background: url( {{('image/right.png')}}) no-repeat;">
									<i class="fa fa-align-right"></i>
								</button>
								<button id="justifyP" type="button" class="btn btn"
									style="background: url( {{('image/justify.png')}}) no-repeat;">
									<i class="fa fa-align-justify"></i>
								</button>
							</div>
						</div>
					</div>
					<div class="custom-item">
						<div class="custom-item-title">Style</div>
						<div class="custom-item-body text-center">
							<div class="btn-group" role="group" aria-label="...">
								<button id="bold" type="button" class="btn btn"
									style="background: url( {{('image/bold.png')}}) no-repeat;">
									<i class="fa fa-bold"></i>
								</button>
								<button id="italic" type="button" class="btn btn"
									style="background: url( {{('image/italic.png')}}) no-repeat;">
									<i class="fa fa-italic"></i>
								</button>
								<button id="underline" type="button" class="btn btn"
									style="background: url( {{('image/underline.png')}}) no-repeat;">
									<i class="fa fa-underline"></i>
								</button>
							</div>
						</div>
					</div>

					<div class="custom-item-title">Font Size</div>
					<input id="fontSize" type="range" step="1" min="1" max="120">



					<div class="custom-item-title">line spacing</div>
					<input id="fontHeight" type="range" step="0.1" min="0" max="10">



					<div class="custom-item-title">word spacing</div>
					<input id="charSpacing" type="range" step="10" min="-200" max="800">

				</div>
			</div>



		</div>

		<div class="showF">
			<div class="panel panel-default"
				style="width: 220px; margin-left: 30px;">

				<div class="panel-heading clearfix">
					<b class="panel-title">Shape Setting</b>
				</div>
				<div class="form-group" style="margin: 10px;">
					<div class="custom-item">
						<div class="custom-item-title">Opacity</div>
						<div class="custom-item-body">
							<input type="range" id="fOpacity" min="0" max="1" step='0.01'>
						</div>
					</div>
					<div class="custom-item">
						<div class="custom-item-title">Color</div>
						<div class="custom-item-body">
							<input type="text" id='fColor' class="jscolor" placeholder="#fff">
						</div>
					</div>
				</div>

			</div>
		</div>

		<div class="showI">
			<div class="panel panel-default"
				style="width: 220px; margin-left: 30px;">
				<div class="panel-heading clearfix">
					<b class="panel-title">Image setting</b>
				</div>
				<div class="form-group" style="margin: 10px;">

					<div class="custom-item-title">Opacity</div>
					<div class="custom-item-body">
						<input type="range" id="imageOpacity" min="0" max="1" step='0.01'>
					</div>

				</div>
			</div>
		</div>
		<div>
		<form id="saveJSON" method="POST" style = "margin-left:30px">
		<input type="hidden" name="_token" value="{{ csrf_token()}}">
			<input type='hidden' id='hiddenField' name='title'/> 
            <input type='hidden' id='hiddenField2' name='json'/>
            <input type='hidden' id='hiddenField3' name='description'/>
			<button id="toJSONF" class="btn btn-outline-default btn-rounded waves-effect">Save</button>
		</form>
		</div>
		
	</div>
    </div>
    <div id='abosulte' style="float: bottom; margin: 11px;">
		<textarea id="description" rows="10" cols="93"
			style="font-size: 20px; margin: auto; border: 3px solid #fff; padding: 10px;"
			placeholder="Description of the post" required></textarea>
		
	</div>

@endsection