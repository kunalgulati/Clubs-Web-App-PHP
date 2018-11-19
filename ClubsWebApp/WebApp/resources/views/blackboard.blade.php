@extends('main_layout')

@section('content')

<html>

<head>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/2.3.3/fabric.min.js"></script>

<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.min.js"></script>
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/ClubsWebApp/WebApp/resources/js/blackboard.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.0.4/jscolor.min.js"></script>

<script>
$(document).ready(function() {
   
   $('.showF').hide();
   $('.showT').hide();
   $('.showI').hide();
   $('.showD').show();

   var canvas = new fabric.Canvas('canvas');


   canvas.on({
      'object:moving' : (e) => {
      },
      'object:modified' : (e) => {
         if (e.target !== null) {
            let selectedObject = e.target;
            if (selectedObject.type !== 'group' && selectedObject) {
               console.log("modi");

               switch (selectedObject.type) {
               
               case 'rect':
               case 'circle':
               case 'triangle':
                  $('.showF').show();
                  $('.showT').hide();
                  $('.showI').hide();
                  $('.showD').hide();
                  $('#fOpacity').val(selectedObject.opacity);
                  var fill = selectedObject.fill;
                  var ofill = fill.slice(1,fill.length);
                  $('#fColor').val(ofill);
                  $('#fColor').css('background-color',fill);
                  break;
               case 'text':
                  $('.showF').hide();
                  $('.showT').show();
                  $('.showI').hide();
                  $('.showD').hide();
                  $('#textOpacity').val(selectedObject.opacity);
                  var fill = selectedObject.fill;
                  var ofill = fill.slice(1,fill.length);
                  $('#textColor').val(ofill);
                  $('#textFontFamily').val(selectedObject.fontFamily);
                  $('#textFontSize').val(selectedObject.fontSize);
                  $('#fontHeight').val(selectedObject.lineHeight);
                  $('#charSpacing').val(selectedObject.charSpacing);
                  $('#textColor').css('background-color',fill);
                  break;      
               case 'image':
                  $('.showF').hide();
                  $('.showT').hide();
                  $('.showI').show();
                  $('.showD').hide();
                  $('#imageOpacity').val(selectedObject.opacity);
                  var fill = selectedObject.fill;
                  break;
               }
            }
         }
      },
      'mouse:down' : (e) => {
         if (e.target !== null) {
            let selectedObject = e.target;
            if (selectedObject.type !== 'group' && selectedObject) {
               console.log("down" + selectedObject.opacity);
               
               switch (selectedObject.type) {
               case 'rect':
               case 'circle':
               case 'triangle':
                  $('.showF').show();
                  $('.showT').hide();
                  $('.showI').hide();
                  $('.showD').hide();
                  $('#fOpacity').val(parseFloat(selectedObject.opacity));
                  var fill = selectedObject.fill;
                  var ofill = fill.slice(1,fill.length);
                  $('#fColor').val(ofill);
                  $('#fColor').css('background-color',fill);
                  
                  break;
               case 'text':
                  $('.showF').hide();
                  $('.showT').show();
                  $('.showI').hide();
                  $('.showD').hide();
                  $('#textOpacity').val(parseFloat(selectedObject.opacity));
                  var fill = selectedObject.fill;
                  var ofill = fill.slice(1,fill.length);
                  $('#textColor').val(ofill);
                  $('#textFontFamily').val(selectedObject.fontFamily);
                  $('#textFontSize').val(parseFloat(selectedObject.fontSize));
                  $('#fontHeight').val(parseFloat(selectedObject.lineHeight));
                  $('#charSpacing').val(parseFloat(selectedObject.charSpacing));
                  $('#textColor').css('background-color',fill);
                  break;      
               case 'image':
                  $('.showF').hide();
                  $('.showT').hide();
                  $('.showI').show();
                  $('.showD').hide();
                  $('#imageOpacity').val(parseFloat(selectedObject.opacity));
                  var fill = selectedObject.fill;
                  break;
               }
            }
         }

      },
      'object:selected' : (e) => {

         let selectedObject = e.target;
         selectedObject.hasRotatingPoint = true;
         selectedObject.transparentCorners = false;



         if (selectedObject.type !== 'group' && selectedObject) {
            console.log("select");

            switch (selectedObject.type) {
            
            case 'rect':
            case 'circle':
            case 'triangle':
               $('.showF').show();
               $('.showT').hide();
               $('.showI').hide();
               $('.showD').hide();
               $('#fOpacity').val(selectedObject.opacity);
               var fill = selectedObject.fill;
               var ofill = fill.slice(1,fill.length);
               $('#fColor').val(ofill);
               $('#fColor').css('background-color',fill);
               break;
            case 'text':
               $('.showF').hide();
               $('.showT').show();
               $('.showI').hide();
               $('.showD').hide();
               $('#textOpacity').val(selectedObject.opacity);
               var fill = selectedObject.fill;
               var ofill = fill.slice(1,fill.length);
               $('#textColor').val(ofill);
               $('#textFontFamily').val(selectedObject.fontFamily);
               $('#textFontSize').val(selectedObject.fontSize);
               $('#fontHeight').val(selectedObject.lineHeight);
               $('#charSpacing').val(selectedObject.charSpacing);
               $('#textColor').css('background-color',fill);
               break;      
            case 'image':
               $('.showF').hide();
               $('.showT').hide();
               $('.showI').show();
               $('.showD').hide();
               $('#imageOpacity').val(selectedObject.opacity);
               var fill = selectedObject.fill;
               break;
            }
         }
      },

      'selection:cleared' : (e) => {
      
         $('.showF').hide();
         $('.showT').hide();
         $('.showI').hide();
         $('.showD').show();

      }
   });


   //배경화면 설정
   $('#bgColor').change(backgroundColor);
   function backgroundColor() {
      console.log($(this).val());
      canvas.backgroundColor = '#' + $(this).val();
      canvas.renderAll();
   }

   $('#bgUrl').click(bgUrl);
   function bgUrl() {
      var url = prompt("Input Url address")
      canvas.setBackgroundImage(url, canvas.renderAll.bind(canvas), {
         backgroundImageOpacity : 0.5,
         backgroundImageStretch : false
         //width:canvas.width,
         //height:canvas.height

      });
      canvas.renderAll();
   }

   $('#bgUrl2').click(bgUrl2);
   function bgUrl2() {
      var url = prompt("Input Url address")
      canvas.setBackgroundColor({
         source : url,
         repeat : 'repeat'
      }, function() {
         // self.props.canvasFill = '';
         canvas.renderAll();
      });
   }


   //addText
   function addText() {
      var textToAdd = $('#atext').val();
      console.log(textToAdd);
      canvas.add(new fabric.Text(textToAdd, {
         left : 0, //Take the block's position
         top : 0,
         fill : 'black'
      }));
   }

   $('#text').click(addText);

   //image upload function
   document.getElementById('uploadedImg').addEventListener("change", function(e) {
      var file = e.target.files[0];
      var reader = new FileReader();
      reader.onload = function(f) {
         var data = f.target.result;
         fabric.Image.fromURL(data, function(img) {
            var oImg = img.set({
               left : 0,
               top : 0,
               angle : 0
            });
            canvas.add(oImg).renderAll();
            var a = canvas.setActiveObject(oImg);
            var dataURL = canvas.toDataURL({
               format : 'png',
               quality : 0.8
            });
         },{ crossOrigin: 'anonymous'});
      };
      reader.readAsDataURL(file);
   });


   //sub canvas에 images 폴더 파일들을 올려놓는 function
   function handleDragStart(e) {
      [].forEach.call(images, function(img) {
         img.classList.remove('img_dragging');
      });
      this.classList.add('img_dragging');
   }

   function handleDragOver(e) {
      if (e.preventDefault) {
         e.preventDefault(); // Necessary. Allows us to drop.
      }

      e.dataTransfer.dropEffect = 'copy'; // See the section on the DataTransfer object.


      return false;
   }

   function handleDragEnter(e) {
      // this / e.target is the current hover target.
      this.classList.add('over');
   }

   function handleDragLeave(e) {
      this.classList.remove('over'); // this / e.target is previous target element.
   }

   function handleDrop(e) {
      // this / e.target is current target element.

      if (e.stopPropagation) {
         e.stopPropagation(); // stops the browser from redirecting.
      }

      var img = document.querySelector('#images img.img_dragging');

      console.log('event: ', e);

      var newImage = new fabric.Image(img, {
         width : 84,
         height : 84,
         left : e.layerX,
         top : e.layerY
      });

      canvas.add(newImage);
      canvas.setActiveObject(newImage);
      canvas.renderAll();
      return false;
   }

   function handleDragEnd(e) {
      // this/e.target is the source node.
      [].forEach.call(images, function(img) {
         img.classList.remove('img_dragging');
      });
   }



   // Bind the event listeners for the image elements
   var images = document.querySelectorAll('#images img');
   [].forEach.call(images, function(img) {
      img.addEventListener('dragstart', handleDragStart, false);
      img.addEventListener('dragend', handleDragEnd, false);
   });
   // Bind the event listeners for the canvas
   var canvasContainer = document.getElementById('canvas-container');
   canvasContainer.addEventListener('dragenter', handleDragEnter, false);
   canvasContainer.addEventListener('dragover', handleDragOver, false);
   canvasContainer.addEventListener('dragleave', handleDragLeave, false);
   canvasContainer.addEventListener('drop', handleDrop, false);

   //Add shapes
   $("#rectangle").click(addFigure);
   $("#triangle").click(addFigure);
   $("#circle").click(addFigure);
   $("#square").click(addFigure);
   function addFigure() {
      var figure = $(this).attr('id');
      console.log('figure: ' + figure);
      switch (figure) {
      //var any;
      case 'rectangle':
         add = new fabric.Rect({
            width : 200,
            height : 100,
            left : 10,
            top : 10,
            angle : 0,
            fill : '#3f51b5'
         });
         break;
      case 'square':
         add = new fabric.Rect({
            width : 100,
            height : 100,
            left : 10,
            top : 10,
            angle : 0,
            fill : '#4caf50'
         });
         break;
      case 'triangle':
         add = new fabric.Triangle({
            width : 100,
            height : 100,
            left : 10,
            top : 10,
            fill : '#2196f3'
         });
         break;
      case 'circle':
         add = new fabric.Circle({
            radius : 50,
            left : 10,
            top : 10,
            fill : '#ff5722'
         });
         break;
      }

      canvas.add(add);
      canvas.setActiveObject(add);
      canvas.renderAll();
   }


   //Options
   $("#remove").click(removeSelected);
   function removeSelected() {
      activeGroup = canvas.getActiveObjects();

      if (activeGroup.length > 0) {
         canvas.discardActiveObject();
         activeGroup.forEach(function(object) {

            console.log(object);
            canvas.remove(object);
            canvas.renderAll();
         });
      }
   // this.textString = ''
   }
   $("#toback").click(putToBack);
   function putToBack() {
      activeGroup = canvas.getActiveObjects();

      if (activeGroup) {

         canvas.discardActiveObject();
         activeGroup.forEach((object) => {

            object.sendToBack();
            canvas.renderAll();
         });
      }
   }

   $("#tofront").click(putToFront);
   function putToFront() {
      activeGroup = canvas.getActiveObjects();

      if (activeGroup) {

         canvas.discardActiveObject();
         activeGroup.forEach((object) => {

            object.bringToFront();
            canvas.renderAll();
         });
      }
   }

   $('#copy').click(copy);
   function copy() {
      let activeObject = canvas.getActiveObject();


      if (activeObject) {
         let clone;
         switch (activeObject.type) {
         case 'rect':
            clone = new fabric.Rect(activeObject.toObject());
            break;
         case 'circle':
            clone = new fabric.Circle(activeObject.toObject());
            break;
         case 'triangle':
            clone = new fabric.Triangle(activeObject.toObject());
            break;
         case 'i-text':
            clone = new fabric.IText('', activeObject.toObject());
            break;
         case 'image':
            clone = fabric.util.object.clone(activeObject);
            break;
         }
         if (clone) {
            clone.set({
               left : 10,
               top : 10
            });
            canvas.add(clone);
            canvas.setActiveObject(clone);
            canvas.renderAll();
         }
      }

   }

   $('#unselect').click(unselect);
   function unselect() {
      canvas.discardActiveObject();
      canvas.renderAll();

   }

   //for the Image Panel

   $(document).on('input', "#imageOpacity", function() {

      console.log($('#imageOpacity').val());
      var text = canvas.getActiveObject();
      text.set({
         opacity : $('#imageOpacity').val()
      });
      canvas.renderAll();
   });

   //for the Figure Panel

   $(document).on('input', "#fOpacity", function() {


      var text = canvas.getActiveObject();
      text.set({
         opacity : $('#fOpacity').val()
      });
      canvas.renderAll();
   });

   $(document).on('change', "#fColor", function() {
      console.log('#' + $('#fColor').val());

      var text = canvas.getActiveObject();
      text.set({
         fill : '#' + $('#fColor').val()
      });
      canvas.renderAll();
   });

   //for the text panel 

   $(document).on('input', "#textOpacity", function() {


      var text = canvas.getActiveObject();
      text.set({
         opacity : $('#textOpacity').val()
      });
      canvas.renderAll();
   });

   $(document).on('change', "#textColor", function() {


      var text = canvas.getActiveObject();
      text.set({
         fill : '#' + $('#textColor').val()
      });
      canvas.renderAll();
   });

   $(document).on('change', "#textFontFamily", function() {
      canvas.getActiveObject().set("fontFamily", this.value);
      canvas.renderAll();
   });

   $(document).on('change', "#fontSize", function() {
      canvas.getActiveObject().set("fontSize", this.value);
      canvas.renderAll();
   });

   $(document).on('change', "#fontHeight", function() {
      canvas.getActiveObject().set("lineHeight", this.value);
      canvas.renderAll();
   });

   $(document).on('change', "#charSpacing", function() {
      canvas.getActiveObject().set("charSpacing", this.value);
      canvas.renderAll();
   });

   $(document).on('click', "#bold", function() {

      var object = canvas.getActiveObject();
      if(object.fontWeight == 'bold'){
         canvas.getActiveObject().set("fontWeight", 'normal');
         canvas.renderAll();
      }else{
         canvas.getActiveObject().set("fontWeight", 'bold');
         canvas.renderAll();
      }
      
   });

   $(document).on('click', "#italic", function() {

      var object = canvas.getActiveObject();
      if(object.fontStyle == 'italic'){
         canvas.getActiveObject().set("fontStyle", 'normal');
         canvas.renderAll();
      }else{
         canvas.getActiveObject().set("fontStyle", 'italic');
         canvas.renderAll();
      }
   });

   $(document).on('click', "#underline", function() {
      var object = canvas.getActiveObject();
      if(object.underline == false){
         canvas.getActiveObject().set("underline", true);
         canvas.renderAll();
      }else{
         canvas.getActiveObject().set("underline", false);
         canvas.renderAll();
      }

   });
   
   $(document).on('click', "#leftP", function() {
      
      canvas.getActiveObject().set("textAlign", "left");
      canvas.renderAll();
      

   });

   $(document).on('click', "#centerP", function() {
      
         canvas.getActiveObject().set("textAlign", "center");
      canvas.renderAll();
      

   });
   
   $(document).on('click', "#rightP", function() {
      
      canvas.getActiveObject().set("textAlign", "right");
      canvas.renderAll();
      

   });
   
   $(document).on('click', "#justifyP", function() {
      
      canvas.getActiveObject().set("textAlign", "justify");
      canvas.renderAll();
      

   });
   
   $(document).on('click', "#toJSONF", function() {
      event.preventDefault();
      var title = $('#maintitle').val();
      $('#hiddenField').val(title);
      console.log(title);
      json = JSON.stringify(canvas.toJSON());
      $('#hiddenField2').val(json);
      var description = $('#description').val();
      $('#hiddenField3').val(description);
      
      if(title!=""){
         $('#saveJSON').attr('action','saveBlackBoard');
         $("#saveJSON").submit();
         canvas.clear();
      }else{
         alert("Please write the title of the post!");
      }
      
      

   });   
   
}); // end document.ready()


</script>


<style>
<style>
@import url('https://fonts.googleapis.com/css?family=Allura|Black+And+White+Picture|Caveat|Courgette|Dancing+Script|Federant|Gloria+Hallelujah|Great+Vibes|Indie+Flower|Kaushan+Script|Lobster|Monoton|Orbitron|PT+Sans|Pacifico|Ranga|Reenie+Beanie|Sacramento|Shadows+Into+Light|Syncopate|Yellowtail');
.rg {
	font-family: 'Ranga', cursive;
}
.if {
	font-family: 'Indie Flower', cursive;
}
.ps {
	font-family: 'PT Sans', sans-serif;
}
.fd {
	font-family: 'Federant', cursive;
}
.pf {
	font-family: 'Pacifico', cursive;
}
.ls {
	font-family: 'Lobster', cursive;
}
.sc {
	font-family: 'Syncopate', sans-serif;
}
.rb {
	font-family: 'Reenie Beanie', cursive;
}
.al {
	font-family: 'Allura', cursive;
}
.yt {
	font-family: 'Yellowtail', cursive;
}
.mn {
	font-family: 'Monoton', cursive;
}
.sil {
    font-family: 'Shadows Into Light', cursive;
}
.ds{
    font-family: 'Dancing Script', cursive;
}

.gh{
    font-family: 'Gloria Hallelujah', cursive;
}

.cg{
    font-family: 'Courgette', cursive;
}

.gv{
    font-family: 'Great Vibes', cursive;
}

.ks{
    font-family: 'Kaushan Script', cursive;
}

.ot{
    font-family: 'Orbitron', sans-serif;
}

.cvt{
    font-family: 'Caveat', cursive;
}

.canvas-container {
	border: 1px dotted LightGrey;
}
.input {
	border: 0;
	outline: 0;
	background: transparent;
	border-bottom: 1px solid LightGrey;
}
#bgColor {
	border: 0;
	outline: 0;
	background: transparent;
	border-bottom: 1px solid LightGrey;
}
.a {
	display: inline-block
}
[draggable] {
	-moz-user-select: none;
	-khtml-user-select: none;
	-webkit-user-select: none;
	user-select: none;
	/* Required to make elements draggable in old WebKit */
	-khtml-user-drag: element;
	-webkit-user-drag: element;
	cursor: move;
}
</style>
</head>
<body>
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
					<img draggable="true">

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
						style="background: url( {{ url('image/trash.png')}} no-repeat; height: 24px;">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</button>
					<button data-toggle="tooltip" data-placement="bottom" id="toback"
						title="Bring to back" type="button" class="btn btn-outline-primary"
						style="background: url( {{ url('image/toback.png')}} no-repeat; height: 24px;">
						<i class="fa fa-level-down" aria-hidden="true"></i>
					</button>
					<button data-toggle="tooltip" data-placement="bottom"
						title="Bring to front" type="button" id="tofront"
						class="btn btn-outline-primary"
						style="background: url( {{ url('image/tofront.png')}} no-repeat; height: 24px;">
						<i class="fa fa-level-up" aria-hidden="true"></i>
					</button>
					<button data-toggle="tooltip" data-placement="bottom" title="Copy"
						id="copy" type="button" class="btn btn-outline-primary"
						style="background: url( {{ url('image/copy.png')}} no-repeat; height: 24px;">
						<i class="fa fa-clone" aria-hidden="true"></i>
					</button>
					<button data-toggle="tooltip" data-placement="bottom" id="unselect"
						title="Selection Cancel" type="button" class="btn btn-outline-primary"
						style="background: url( {{ url('image/cancel.png')}} no-repeat; height: 24px;">
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
									style="background: url('image/left.png' no-repeat">
									<i class="fa fa-align-left"
										style="background: url( {{ url('image/toback.png')}} no-repeat;"></i>
								</button>
								<button id="centerP" type="button" class="btn btn"
									style="background: url( {{ url('image/center.png')}} no-repeat;">
									<i class="fa fa-align-center"></i>
								</button>
								<button id="rightP" type="button" class="btn btn"
									style="background: url( {{ url('image/right.png')}} no-repeat;">
									<i class="fa fa-align-right"></i>
								</button>
								<button id="justifyP" type="button" class="btn btn"
									style="background: url( {{ url('image/justify.png')}} no-repeat;">
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
									style="background: url( {{ url('image/bold.png')}} no-repeat;">
									<i class="fa fa-bold"></i>
								</button>
								<button id="italic" type="button" class="btn btn"
									style="background: url( {{ url('image/italic.png')}} no-repeat;">
									<i class="fa fa-italic"></i>
								</button>
								<button id="underline" type="button" class="btn btn"
									style="background: url( {{ url('image/underline.png')}} no-repeat;">
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
		<form id="saveJSON" method="POST" action="saveJSON" style = "margin-left:30px">
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


</body>
</html>
@endsection